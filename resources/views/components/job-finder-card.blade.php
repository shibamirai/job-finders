<div class="col-span-2 mx-4 mb-6">
    <p class="text-gray-600 text-sm font-semibold">{{ date('Y年m月', strtotime($jobFinder->hired_at)) }}</p>

    <div class="bg-white rounded-2xl px-6 py-6">
        <header class="flex items-center">
            <img src="{{ $jobFinder->avatar }}60?u={{ $jobFinder->id }}" alt="" class="rounded-full mr-4">
            <div>
                <p class="text-sm">{{ $jobFinder->age }}歳 {{ $jobFinder->gender_str }}</p>
                <p class="text-xl font-bold text-cyan-500 tracking-wider">{{ $jobFinder->occupation }}</p>
                <p class="text-sm">{{ Str::limit($jobFinder->description, 32, '...') }}</p>
            </div>
        </header>

        <div class="mt-6 text-sm">
            <table class="w-full">
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">障害</th>
                    <td>
                        {{ $jobFinder->handicaps }}
                        @if ($jobFinder->has_certificate)
                            (手帳あり)
                        @else
                            (手帳なし)
                        @endif
                    </td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">利用期間</th>
                    <td>{{ $jobFinder->period_of_use }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">習得スキル</th>
                    <td>{{ $jobFinder->skills }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">雇用形態</th>
                    <td>
                        {{ $jobFinder->employment_pattern_str }}
                        @if ($jobFinder->is_handicaps_opened)
                            (オープン就労)
                        @else
                            (クローズ就労)
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <a href="/job-finders/{{ $jobFinder->id }}">
            <button class="mt-8 bg-cyan-400 rounded-full text-center py-3 w-full text-white">
                    ポートフォリオを見る
            </button>
        </a>
    </div>
</div>
