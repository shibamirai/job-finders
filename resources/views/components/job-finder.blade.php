@props(['jobFinder', 'editing' => false])

<div class="lg:flex border border-white">
    <div class="flex-1 lg:px-10 py-8">
        <div class="pl-4">
            @if ($editing)
                <div class="flex items-center">
                    <img src="{{ asset('avatar/' . $jobFinder->avatar) }}" alt="" class="rounded-full mr-4 w-16 border border-gray-00">
                    <div>
                        <div class="flex items-center">
                            <p class="text-xl font-bold mr-4">{{ $jobFinder->name }}</p>
                            <p class="text-sm">{{ $jobFinder->age }}歳 {{ $jobFinder->gender_str }}</p>
                        </div>
                        <p class="text-xl font-bold text-cyan-500 tracking-wider">{{ $jobFinder->occupation }}</p>
                    </div>
                </div>
            @else
                <img src="{{ asset('avatar/' . $jobFinder->avatar) }}" alt="" class="rounded-full w-48 border-4 border-gray-500">
                <p class="relative left-14">{{ $jobFinder->age }}歳 {{ $jobFinder->gender_str }}</p>
                <p class="text-2xl font-bold text-cyan-500 tracking-wider py-1">{{ $jobFinder->occupation }}</p>
            @endif
            <p class="">{{ $jobFinder->description }}</p>
        </div>
        <div class="mt-6">
            <table class="w-full">
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">障害</th>
                    <td>
                        {{ $jobFinder->handicaps }}
                        (手帳{{ $jobFinder->has_certificate ? 'あり' : 'なし'}})
                    </td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">利用期間</th>
                    <td>{{ $jobFinder->period_of_use }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">就職時期</th>
                    <td>{{ date('Y年m月', strtotime($jobFinder->hired_at)) }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">習得スキル</th>
                    <td>{{ $jobFinder->skills }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">雇用形態</th>
                    <td>
                        {{ $jobFinder->employment_pattern_str }}
                        ({{ $jobFinder->is_handicaps_opened ? 'オープン' : 'クローズ' }}就労)
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="flex-1 lg:px-10 py-8">
        @foreach ($jobFinder->works as $work)
            <x-portfolio-card :work="$work" />
        @endforeach
    </div>
</div>
