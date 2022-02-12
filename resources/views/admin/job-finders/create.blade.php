<x-app-layout>
    <x-slot name="header">
        就職者さんデータ入力フォーム
    </x-slot>

    <form action="/admin/job-finders" method="POST">
        @csrf
        <x-job-finder-form />
        {{-- <div class="max-w-4xl mx-auto bg-white shadow-md rounded px-10 py-8 mb-4">

            <h1 class="text-xl text-cyan-500 text-center font-bold">利用者さんについて</h1>

            <!-- アバター -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="avatar" value="アバターを選ぶ" />

                <div class="col-span-5 flex flex-wrap items-center">
                    <x-avatar-select id="avatar" name="avatar" />
                </div>

                <x-error name="avatar" class="col-start-2 col-span-5" />
            </div>

            <!-- 名前 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="name" value="名前" />

                <x-input id="name" class="col-span-5" type="text" name="name" :value="old('name')" placeholder="非公開" autofocus />

                <x-error name="name" class="col-start-2 col-span-5" />
            </div>

            <!-- 性別 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="gender" value="性別" />

                <div class="col-span-5 flex flex-wrap items-center">
                    <x-select id="gender" name="gender" type="radio" :items="\App\Enums\Gender::asSelectArray()" />
                </div>

                <x-error name="gender" class="col-start-2 col-span-5" />
            </div>

            <!-- 年齢 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="age" value="年齢" />

                <x-input id="age" class="col-start-2" type="number" name="age" min="18" max="60" :value="old('age')" /><div class="ml-2">歳</div>

                <x-error name="age" class="col-start-2 col-span-5" />
            </div>

            <!-- 障害名 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="handicaps" value="障害名" />

                <x-input id="handicaps" class="col-span-5" type="text" name="handicaps" :value="old('handicaps')" placeholder="うつ病、アスペルガー症候群など" />

                <x-error name="handicaps" class="col-start-2 col-span-5" />
            </div>

            <!-- 手帳有無 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="certificate" value="手帳有無" />

                <div class="col-span-5 flex flex-wrap items-center">
                    <x-select id="certificate" name="certificate" type="checkbox" :items="['on' => '手帳あり']" />
                </div>

                <x-error name="certificate" class="col-start-2 col-span-5" />
            </div>

            <!-- 利用開始日 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="use_from" value="利用開始日" />

                <x-input id="use_from" class="col-span-2" type="date" name="use_from" :value="old('use_from')" />

                <x-error name="use_from" class="col-start-2 col-span-5" />
            </div>

            <!-- 習得スキル -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="skills" value="習得スキル" />

                <x-input id="skills" class="col-span-5" type="text" name="skills" :value="old('skills')" placeholder="PHP, Javaなど" />

                <x-error name="skills" class="col-start-2 col-span-5" />
            </div>

            <h1 class="text-xl text-cyan-500 text-center font-bold mt-10">就職先について</h1>

            <!-- 職種 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="occupation" value="職種" />

                <x-input id="occupation" class="col-span-5" type="text" name="occupation" :value="old('occupation')" placeholder="PHPプログラマー, HTMLコーダー" />

                <x-error name="occupation" class="col-start-2 col-span-5" />
            </div>

            <!-- 仕事内容 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="description" value="仕事内容" />

                <x-input id="description" class="col-span-5" type="text" name="description" :value="old('description')" placeholder="Webサイト構築" />

                <x-error name="description" class="col-start-2 col-span-5" />
            </div>

            <!-- 就労開始日 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="hired_at" value="就労開始日" />

                <x-input id="hired_at" class="col-span-2" type="date" name="hired_at" :value="old('hired_at')" />

                <x-error name="hired_at" class="col-start-2 col-span-5" />
            </div>

            <!-- 雇用形態 -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="employment_pattern" value="雇用形態" />

                <div class="col-span-5 flex flex-wrap items-center">
                    <x-select id="employment_pattern" name="employment_pattern" type="radio" :items="\App\Enums\EmploymentPattern::asSelectArray()" />
                </div>

                <x-error name="employment_pattern" class="col-start-2 col-span-5" />
            </div>

            <!-- 就労スタイル -->
            <div class="mt-4 md:grid md:grid-cols-6 items-center">
                <x-label for="opened" value="就労スタイル" />

                <div class="col-span-5 flex flex-wrap items-center">
                    <x-select id="opened" name="opened" type="checkbox" :items="['on' => 'オープン就労']" />
                </div>

                <x-error name="opened" class="col-start-2 col-span-5" />
            </div>
        </div> --}}
        <div class="text-center pt-5 pb-10">
            <div class="">
                <input id="continue" name="continue" type="checkbox" checked
                    class="text-gray-800 border-gray-300 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                >
                <label class="ml-2 mr-4 ">続いてポートフォリオを入力する</label>
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
