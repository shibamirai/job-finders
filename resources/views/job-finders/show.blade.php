<x-app-layout>
    <x-slot name="header">
        就職者さんのデータ・ポートフォリオ
    </x-slot>

    <div class="bg-white rounded-lg px-10 py-8">
        <div class="lg:flex">
            <div class="flex-1 lg:px-10 py-8">
                <div class="pl-4">
                    <img src="{{ asset('avatar/' . $job_finder->avatar) }}" alt="" class="rounded-full w-48 border-4 border-gray-500">
                    <p class="relative left-14">{{ $job_finder->age }}歳 {{ $job_finder->gender_str }}</p>
                    <p class="text-2xl font-bold text-cyan-500 tracking-wider py-1">{{ $job_finder->occupation }}</p>
                    <p class="">{{ $job_finder->description }}</p>
                </div>
                <div class="mt-6">
                    <table class="w-full">
                        <tr class="border-y-2">
                            <th class="text-left font-bold px-4 py-2">障害</th>
                            <td>
                                {{ $job_finder->handicaps }}
                                @if ($job_finder->has_certificate)
                                    (手帳あり)
                                @else
                                    (手帳なし)
                                @endif
                            </td>
                        </tr>
                        <tr class="border-y-2">
                            <th class="text-left font-bold px-4 py-2">利用期間</th>
                            <td>{{ $job_finder->period_of_use }}</td>
                        </tr>
                        <tr class="border-y-2">
                            <th class="text-left font-bold px-4 py-2">就職時期</th>
                            <td>{{ date('Y年m月', strtotime($job_finder->hired_at)) }}</td>
                        </tr>
                        <tr class="border-y-2">
                            <th class="text-left font-bold px-4 py-2">習得スキル</th>
                            <td>{{ $job_finder->skills }}</td>
                        </tr>
                        <tr class="border-y-2">
                            <th class="text-left font-bold px-4 py-2">雇用形態</th>
                            <td>
                                {{ $job_finder->employment_pattern_str }}
                                @if ($job_finder->is_handicaps_opened)
                                    (オープン就労)
                                @else
                                    (クローズ就労)
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="flex-1 lg:px-10 py-8">
                @for ($i = 0; $i < 3; $i++)
                    <x-portfolio-card />
                @endfor
            </div>
        </div>
        <div class="flex">
            <a href="/job-finders" class="mx-auto bg-cyan-400 text-white font-semibold uppercase py-2 px-20 rounded-full hover:bg-cyan-500">
                一覧へ戻る
            </a>
        </div>
    </div>
</x-app-layout>
