<x-app-layout>
    <x-slot name="header">
        就職者さんのデータ・ポートフォリオ
    </x-slot>

    <div class="bg-white rounded-lg px-10 py-8">
        <x-job-finder :jobFinder="$jobFinder" />
        <div class="flex justify-center">
            <a href="{{ route('index') }}">
                <x-button type="button" class="rounded-full w-48">
                    一覧へ戻る
                </x-button>
            </a>
        </div>
    </div>
</x-app-layout>
