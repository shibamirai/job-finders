<x-app-layout>
    <x-slot name="header">
        就職者さんのデータ・ポートフォリオ
    </x-slot>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($jobFinders as $jobFinder)
            <x-job-finder-card :jobFinder="$jobFinder" />
        @endforeach
    </div>
    {{ $jobFinders->links() }}
</x-app-layout>
