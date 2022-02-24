@props(['jobFinder' => null, 'work' => null])

<div class="max-w-4xl mx-auto bg-white shadow-md rounded px-10 py-8 mb-4">
    <h1 class="text-xl text-cyan-500 text-center font-bold">成果物（ポートフォリオ）について</h1>

    @if ($work)
    <form action="{{ route('job-finders.works.update', ['job_finder' => $jobFinder, 'work' => $work]) }}" method="POST">
        @method('PATCH')
    @else
    <form action="{{ route('job-finders.works.store', $jobFinder) }}" method="POST">
    @endif

        @csrf

        <!-- 作品の内容 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="content" value="作品の内容" />

            <x-input class="col-span-5" id="content" name="content"
                :value="old('content', optional($work)->content)"
                placeholder="旅行サイト、ポートフォリオサイトなど"
                required autofocus
            />

            <x-error name="content" class="col-start-2 col-span-5" />
        </div>

        <!-- 作品名 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="title" value="作品名" />

            <x-input id="title" name="title"
                class="col-span-5"
                :value="old('title', optional($work)->title)"
                placeholder="旅行サイト、ポートフォリオサイトなど"
            />

            <x-error name="title" class="col-start-2 col-span-5" />
        </div>

        <!-- URL -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="url" value="URL" />

            <x-input id="url" name="url"
                class="col-span-5"
                :value="old('url', optional($work)->url)"
            />

            <x-error name="url" class="col-start-2 col-span-5" />
        </div>

        <!-- 使用言語 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="languages" value="使用言語" />

            <x-input id="languages" name="languages"
                class="col-span-5"
                :value="old('languages', optional($work)->languages)"
                placeholder="PHP、JAVAなど"
                required
            />

            <x-error name="languages" class="col-start-2 col-span-5" />
        </div>

        <!-- 制作期間 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="creation_time" value="制作期間" />

            <x-input type="number" id="creation_time" name="creation_time" min="0"
                class="col-start-2"
                :value="old('creation_time', optional($work)->creation_time)" />
            <div class="ml-2">ヶ月</div>

            <x-error name="creation_time" class="col-start-2 col-span-5" />
        </div>

        <!-- 自由記入 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="description" value="自由記入" />

            <x-textarea id="description" name="description"
                class="col-span-5 h-48"
                placeholder="頑張った点など自由に記入してください"
            >{{ old('description', optional($work)->description) }}</x-textarea>

            <x-error name="description" class="col-start-2 col-span-5" />
        </div>

        <div class="mt-8 text-center">

            @if ($work)

            <x-button class="rounded-full w-36">更新</x-button>
            <x-button class="rounded-full w-36" form="delete-{{ $work->id }}">削除</x-button>

            @else

            <x-button class="rounded-full w-36">追加</x-button>

            @endif
        </div>
    </form>

    @if ($work)
    <form id="delete-{{ $work->id }}" method="POST"
        action="{{ route('job-finders.works.destroy', ['job_finder' => $jobFinder, 'work' => $work]) }}"
    >
        @method('DELETE')
        @csrf
    </form>
    @endif
</div>
