@props(['jobFinder' => null])

<div class="max-w-4xl mx-auto bg-white shadow-md rounded px-10 py-8">
    <h1 class="text-xl text-cyan-500 text-center font-bold">利用者さんについて</h1>

    @if ($jobFinder)
    <form action="{{ route('job-finders.update', $jobFinder) }}" method="POST">
        @method('PATCH')
    @else
    <form action="{{ route('job-finders.store') }}" method="POST">
    @endif

        @csrf

        <!-- アバター -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="avatar" value="アバターを選ぶ" />

            <div class="col-span-5 flex flex-wrap items-center">
                <x-avatar-select id="avatar" name="avatar" :selected="optional($jobFinder)->avatar" autofocus />
            </div>

            <x-error name="avatar" class="col-start-2 col-span-5" />
        </div>

        <!-- 名前 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="name" value="名前" />

            @if ($jobFinder)
                <x-input id="name" class="col-span-5" type="text" name="name" :value="old('name', optional($jobFinder)->name)" placeholder="非公開" disabled />
            @else
                <x-input id="name" class="col-span-5" type="text" name="name" :value="old('name', optional($jobFinder)->name)" placeholder="非公開" requied />
            @endif

            <x-error name="name" class="col-start-2 col-span-5" />
        </div>

        <!-- 性別 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="gender" value="性別" />

            <div class="col-span-5 flex flex-wrap items-center">
                <x-select id="gender" name="gender" type="radio" :items="\App\Enums\Gender::asSelectArray()" :selected="optional($jobFinder)->gender" />
            </div>

            <x-error name="gender" class="col-start-2 col-span-5" />
        </div>

        <!-- 年齢 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="age" value="年齢" />

            <x-input id="age" class="col-start-2" type="number" name="age" :value="old('age', optional($jobFinder)->age)" requied />
            <div class="ml-2">歳</div>

            <x-error name="age" class="col-start-2 col-span-5" />
        </div>

        <!-- 障害 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="handicap" value="障害" />

            <div class="col-span-5 flex flex-wrap items-center">
                <x-select id="handicap" name="handicap" type="radio" :items="\App\Enums\Handicap::asSelectArray()" :selected="optional($jobFinder)->handicap" />
            </div>

            <x-error name="handicap" class="col-start-2 col-span-5" />
        </div>

        <!-- 手帳有無 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="certificate" value="手帳有無" />

            <div class="col-span-5 flex flex-wrap items-center">
                <x-select id="certificate" name="certificate" type="checkbox" :items="['on' => '手帳あり']" :selected="optional($jobFinder)->has_certificate ? 'on' : ''" />
            </div>

            <x-error name="certificate" class="col-start-2 col-span-5" />
        </div>

        <!-- 利用開始日 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="use_from" value="利用開始日" />

            <x-input id="use_from" class="col-span-2" type="date" name="use_from" :value="old('use_from', optional($jobFinder)->use_from)" requied />

            <x-error name="use_from" class="col-start-2 col-span-5" />
        </div>

        <!-- 習得スキル -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="skills" value="習得スキル" />

            <x-input id="skills" class="col-span-5" type="text" name="skills" :value="old('skills', optional($jobFinder)->skills)" placeholder="PHP, Javaなど" />

            <x-error name="skills" class="col-start-2 col-span-5" />
        </div>

        <h1 class="text-xl text-cyan-500 text-center font-bold mt-10">就職先について</h1>

        <!-- 職種 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="occupation" value="職種" />

            <x-input id="occupation" class="col-span-5" type="text" name="occupation" :value="old('occupation', optional($jobFinder)->occupation)" placeholder="PHPプログラマー, HTMLコーダー" requied />

            <x-error name="occupation" class="col-start-2 col-span-5" />
        </div>

        <!-- 仕事内容 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="description" value="仕事内容" />

            <x-input id="description" class="col-span-5" type="text" name="description" :value="old('description', optional($jobFinder)->description)" placeholder="Webサイト構築" />

            <x-error name="description" class="col-start-2 col-span-5" />
        </div>

        <!-- 就労開始日 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="hired_at" value="就労開始日" />

            <x-input id="hired_at" class="col-span-2" type="date" name="hired_at" :value="old('hired_at', optional($jobFinder)->hired_at)" requied />

            <x-error name="hired_at" class="col-start-2 col-span-5" />
        </div>

        <!-- 雇用形態 -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="employment_pattern" value="雇用形態" />

            <div class="col-span-5 flex flex-wrap items-center">
                <x-select id="employment_pattern" name="employment_pattern" type="radio" :items="\App\Enums\EmploymentPattern::asSelectArray()" :selected="optional($jobFinder)->employment_pattern" />
            </div>

            <x-error name="employment_pattern" class="col-start-2 col-span-5" />
        </div>

        <!-- 就労スタイル -->
        <div class="mt-4 md:grid md:grid-cols-6 items-center">
            <x-label for="opened" value="就労スタイル" />

            <div class="col-span-5 flex flex-wrap items-center">
                <x-select id="opened" name="opened" type="checkbox" :items="['on' => 'オープン就労']" :selected="optional($jobFinder)->is_handicaps_opened ? 'on' : ''" />
            </div>

            <x-error name="opened" class="col-start-2 col-span-5" />
        </div>

        <div class="text-center mt-8">
            @if ($jobFinder)
                <x-button class="rounded-full px-16">更新</x-button>
            @else
                <x-button class="rounded-full px-16">登録</x-button>
            @endif
        </div>
    </form>
</div>
