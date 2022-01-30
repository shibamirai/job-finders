<div class="col-span-2 mx-4 mb-6">
    <p class="text-gray-600 text-sm font-semibold">2022/01/14</p>

    <div class="bg-white rounded-2xl px-6 py-6">
        <header class="flex items-center">
            <img src="https:/i.pravatar.cc/60?u={{ $jobFinder->id }}" alt="" class="rounded-full mr-4">
            <div>
                <p class="text-sm">{{ $jobFinder->name }}<span class="text-xs">さん</span>／30代前半</p>
                <p class="text-xl font-bold">{{ $jobFinder->occupation }}</p>
                <p class="text-sm">{{ $jobFinder->description }}</p>
            </div>
        </header>

        <div class="mt-6 text-sm">
            <table class="w-full">
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">障害</th>
                    <td>{{ $jobFinder->handicaps }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">利用期間</th>
                    <td>1年6ヶ月</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">習得スキル</th>
                    <td>{{ $jobFinder->skills }}</td>
                </tr>
                <tr class="border-y-2">
                    <th class="text-left font-bold px-4 py-2">雇用形態</th>
                    <td>アルバイト（オープン就労）</td>
                </tr>
            </table>
        </div>

        <a href="">
            <button class="mt-8 bg-cyan-400 rounded-full text-center py-3 w-full text-white"
                >
                    詳細を見る
            </button>
        </a>
    </div>
</div>
