<x-app-layout>
    <x-slot name="header">
        就職者さんデータ入力フォーム
    </x-slot>

    <x-job-finder :jobFinder="$job_finder" editing="true" />

    <x-work-form :jobFinder="$job_finder" />
</x-app-layout>
