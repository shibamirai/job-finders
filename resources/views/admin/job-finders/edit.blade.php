<x-app-layout>
    <x-slot name="header">
        就職者さんデータ編集フォーム
    </x-slot>

    <nav class="max-w-4xl mx-auto">
        <ul class="flex text-center">
            <li @class([
                'flex-1', 'py-2', 'rounded-t-md', 'text-sm', 'font-medium',
                'bg-white' => ($open ?? -1) == -1,
                'bg-gray-200' => ($open ?? -1) != -1,
                'text-gray-400' => ($open ?? -1) != -1,
                'hover:text-gray-700' => ($open ?? -1) != -1])
            >
                <a href="{{ route('job-finders.edit', $jobFinder) }}">
                    {{ $jobFinder->name }}さんについて
                </a>
            </li>

            @foreach ($jobFinder->works as $work)
                <li @class([
                    'flex-1', 'py-2', 'rounded-t-md', 'text-sm', 'font-medium',
                    'bg-white' => ($open ?? -1) == $work->id,
                    'bg-gray-200' => ($open ?? -1) != $work->id,
                    'text-gray-400' => ($open ?? -1) != $work->id,
                    'hover:text-gray-700' => ($open ?? -1) != $work->id])
                >
                    <a href="{{ route('job-finders.works.edit', ['job_finder' => $jobFinder, 'work' => $work]) }}">
                        作品「{{ Str::limit($work->content, 10, '...') }}」
                    </a>
                </li>
            @endforeach

            <li @class([
                'flex-1', 'py-2', 'rounded-t-md', 'text-sm', 'font-medium',
                'bg-white' => ($open ?? -1) == 0,
                'bg-gray-200' => ($open ?? -1) != 0,
                'text-gray-400' => ($open ?? -1) != 0,
                'hover:text-gray-700' => ($open ?? -1) != 0])
            >
                <a href="{{ route('job-finders.works.create', $jobFinder) }}">
                    ポートフォリオ追加
                </a>
            </li>
        </ul>
    </nav>

    <div>
        @isset($open)
            @if ($open == 0)
                <x-work-form :jobFinder="$jobFinder" />
            @else
                @foreach ($jobFinder->works as $work)
                    @if ($open == $work->id)
                        <x-work-form :jobFinder="$jobFinder" :work="$work" />
                    @endif
                @endforeach
            @endif
        @else
            <x-job-finder-form :jobFinder="$jobFinder" />
        @endisset
    </div>
</x-app-layout>
