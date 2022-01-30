<x-app-layout>
    <x-slot name="header">
        就職者情報登録
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="w-full bg-white shadow-md rounded px-8 py-8 mb-4">
            <form action="/admin/job-finders" method="POST">
                @csrf

                <x-form.input name="name" placeholder="非公開">お名前</x-form.input>
                <x-form.input name="handicaps" placeholder="うつ病、アスペルガー症候群など">障害名</x-form.input>
                <x-form.input name="skills" placeholder="PHP, Javaなど">習得スキル</x-form.input>
                <x-form.input name="occupation" placeholder="PHPプログラマー, HTMLコーダー">職種</x-form.input>
                <x-form.input name="description" placeholder="Webサイト構築">仕事内容</x-form.input>
                <div class="w-full flex mt-8">
                    <button type="submit" class="mx-auto bg-cyan-400 text-white font-semibold uppercase py-2 px-20 rounded-full hover:bg-cyan-500">
                        O K
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
