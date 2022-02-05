<x-app-layout>
    <x-slot name="header">
        就職者さんデータ入力フォーム
    </x-slot>

    <form action="/admin/job-finders" method="POST">
        @csrf
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded px-10 py-8 mb-4">

            <h1 class="text-xl text-cyan-500 text-center font-bold">利用者さんについて</h1>

            <x-form.input name="name" class="w-full" placeholder="非公開">名前</x-form.input>
            <x-form.radio name="gender" :items="\App\Enums\Gender::asSelectArray()">性別</x-form.radio>
            <x-form.input name="age" type="number">年齢</x-form.input>
            <x-form.input name="handicaps" class="w-full" placeholder="うつ病、アスペルガー症候群など">障害名</x-form.input>
            <x-form.s-check name="certificate" label="手帳あり">手帳有無</x-form.s-check>
            <x-form.input name="use_from" type="date">利用開始日</x-form.input>
            <x-form.input name="skills" class="w-full" placeholder="PHP, Javaなど">習得スキル</x-form.input>

            <h1 class="text-xl text-cyan-500 text-center font-bold mt-10">就職先について</h1>

            <x-form.input name="occupation" class="w-full" placeholder="PHPプログラマー, HTMLコーダー">職種</x-form.input>
            <x-form.input name="description" class="w-full" placeholder="Webサイト構築">仕事内容</x-form.input>
            <x-form.input name="hired_at" type="date">就労開始日</x-form.input>
            <x-form.radio name="employment_pattern" :items="\App\Enums\EmploymentPattern::asSelectArray()">雇用形態</x-form.radio>
            <x-form.s-check name="opened" label="オープン就労">就労スタイル</x-form.s-check>
        </div>
        <div class="text-center pt-5 pb-10">
            <x-button class="rounded-full px-16">OK</x-button>
        </div>
    </form>
</x-app-layout>
