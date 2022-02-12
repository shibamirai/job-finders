<x-app-layout>
    <x-slot name="header">
        就職者さんデータ入力フォーム
    </x-slot>

    <x-job-finder :jobFinder="$job_finder" editing="true" />

    <form action="{{ route('works.store', $job_finder) }}" method="POST">
        @csrf
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded px-10 py-8 mb-4">

            <h1 class="text-xl text-cyan-500 text-center font-bold">成果物（ポートフォリオ）について</h1>

            <!-- 作品の内容 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="content" value="作品の内容" />

                <x-input id="content" class="col-span-5" type="text" name="content" :value="old('content')" placeholder="旅行サイト、ポートフォリオサイトなど" autofocus />

                <x-error name="content" class="col-start-2 col-span-5" />
            </div>

            <!-- 作品名 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="title" value="作品名" />

                <x-input id="title" class="col-span-5" type="text" name="title" :value="old('title')" placeholder="旅行サイト、ポートフォリオサイトなど" />

                <x-error name="title" class="col-start-2 col-span-5" />
            </div>

            <!-- URL -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="url" value="URL" />

                <x-input id="url" class="col-span-5" type="text" name="url" :value="old('url')" />

                <x-error name="url" class="col-start-2 col-span-5" />
            </div>

            <!-- 使用言語 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="languages" value="使用言語" />

                <x-input id="languages" class="col-span-5" type="text" name="languages" :value="old('languages')" placeholder="PHP、JAVAなど" />

                <x-error name="languages" class="col-start-2 col-span-5" />
            </div>

            <!-- 制作期間 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="creation_time" value="制作期間" />

                <x-input id="creation_time" class="col-start-2" type="number" name="creation_time" min="0" :value="old('creation_time')" /><div class="ml-2">ヶ月</div>

                <x-error name="creation_time" class="col-start-2 col-span-5" />
            </div>

            <!-- 自由記入 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="description" value="自由記入" />

                <x-textarea
                    name="description" id="description" class="col-span-5 h-48" placeholder="頑張った点など自由に記入してください"
                >{{ old('description') }}</x-textarea>

                <x-error name="description" class="col-start-2 col-span-5" />
            </div>
        </div>
        <div class="text-center pt-5 pb-10">
            <div class="">
                <input id="continue" name="continue" type="checkbox" checked
                       class="text-gray-800 border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                >
                <label class="ml-2 mr-4 ">さらにポートフォリオを入力する</label>
            </div>
            <button class="
                inline-flex justify-center px-4 py-2 mt-4 w-48
                bg-gray-800
                border border-transparent
                rounded-full
                text-white uppercase tracking-widest
                hover:bg-gray-700
                active:bg-gray-900
                focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 focus:ring-opacity-50
                disabled:opacity-25
                transition ease-in-out duration-150
            ">
                OK
            </button>
        </div>
    </form>
</x-app-layout>
