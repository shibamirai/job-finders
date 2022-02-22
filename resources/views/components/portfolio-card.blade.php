<article class="mb-8">
    <div class="flex items-center">
        <svg viewBox="0 0 48 48" class="w-6 stroke-cyan-500">
            <rect x="10" y="5" width="28" height="38" fill="none" stroke-linejoin="round" stroke-width="4"/>
            <line x1="18" y1="15" x2="30" y2="15" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
            <line x1="18" y1="23" x2="30" y2="23" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
        </svg>
        <h1 class="font-bold text-lg ml-1">
            {{ $work->content }}{{ $work->title ? '「' . $work->title . '」' : ''}}
        </h1>
    </div>
    <a href="{{ $work->url }}" class="text-cyan-500 mt-1">{{ $work->url }}</a>
    <h1 class="font-semibold mt-1">{{ $work->languages }}／{{ $work->period_of_creation }}</h1>
    <p class="text-sm leading-5 mt-2 whitespace-pre-wrap">{{ $work->description }}</p>
</article>
