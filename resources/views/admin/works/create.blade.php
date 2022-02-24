<x-app-layout>
    <x-slot name="header">
        就職者さんデータ入力フォーム
    </x-slot>

    <x-job-finder :jobFinder="$jobFinder" editing="true" />

    <x-work-form :jobFinder="$jobFinder" />
</x-app-layout>
