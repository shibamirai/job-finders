<x-app-layout>
    <x-slot name="header">
        就職者さんのデータ・ポートフォリオ
    </x-slot>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($job_finders as $job_finder)
            <x-job-finder-card :jobFinder="$job_finder" />
        @endforeach
    </div>
    {{ $job_finders->links() }}
</x-app-layout>
