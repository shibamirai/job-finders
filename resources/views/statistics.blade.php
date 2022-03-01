<x-app-layout>
    <x-slot name="header">
        統計情報
    </x-slot>

    <p class="text-center text-2xl text-gray-700 mb-4">
        のべ就職者数 {{ count($jobFinders) }}人
    </p>

    <div x-data="{ open: 1 }" class="bg-white pb-8">
        <nav class="mx-auto mb-4">
            <ul class="flex text-center">
                <li class="flex-1 py-2 rounded-t-md text-sm font-medium"
                    :class="{
                        'bg-white': open === 1,
                        'bg-gray-200': open !== 1,
                        'text-gray-400': open !== 1,
                        'hover:text-gray-700': open !== 1
                    }"
                    @@click="open = 1"
                >
                    年齢分布
                </li>
                <li class="flex-1 py-2 rounded-t-md text-sm font-medium"
                    :class="{
                        'bg-white': open === 2,
                        'bg-gray-200': open !== 2,
                        'text-gray-400': open !== 2,
                        'hover:text-gray-700': open !== 2
                    }"
                    @@click="open = 2"
                >
                    雇用形態
                </li>
                <li class="flex-1 py-2 rounded-t-md text-sm font-medium"
                    :class="{
                        'bg-white': open === 3,
                        'bg-gray-200': open !== 3,
                        'text-gray-400': open !== 3,
                        'hover:text-gray-700': open !== 3
                    }"
                    @@click="open = 3"
                >
                    就職分野
                </li>
                <li class="flex-1 py-2 rounded-t-md text-sm font-medium"
                    :class="{
                        'bg-white': open === 4,
                        'bg-gray-200': open !== 4,
                        'text-gray-400': open !== 4,
                        'hover:text-gray-700': open !== 4
                    }"
                    @@click="open = 4"
                >
                    習得スキル
                </li>
                <li class="flex-1 py-2 rounded-t-md text-sm font-medium"
                    :class="{
                        'bg-white': open === 5,
                        'bg-gray-200': open !== 5,
                        'text-gray-400': open !== 5,
                        'hover:text-gray-700': open !== 5
                    }"
                    @@click="open = 5"
                >
                    性別
                </li>
                <li class="flex-1 py-2 rounded-t-md text-sm font-medium"
                    :class="{
                        'bg-white': open === 6,
                        'bg-gray-200': open !== 6,
                        'text-gray-400': open !== 6,
                        'hover:text-gray-700': open !== 6
                    }"
                    @@click="open = 6"
                >
                    障害
                </li>
            </ul>
        </nav>
        <div x-show="open === 1">
            <canvas id="ageChart"></canvas>
        </div>
        <div x-show="open === 2">
            <canvas id="employment_patternChart"></canvas>
        </div>
        <div x-show="open === 3">
            <canvas id="genresChart"></canvas>
        </div>
        <div x-show="open === 4">
            <canvas id="skillChart"></canvas>
        </div>
        <div x-show="open === 5">
            <canvas id="genderChart"></canvas>
        </div>
        <div x-show="open === 6">
            <canvas id="handicapChart"></canvas>
        </div>
    </div>

    {{-- グラフ表示処理 --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes"></script>
    <script>
        // 就職者情報取得
        const finders = @js($jobFinders);

        // グラフ表示データの初期化
        const gender = {
            data: new Array(@js(count(\App\Enums\Gender::cases()))).fill(0),
            labels: @js(\App\Enums\Gender::asSelectArray())
        }
        const handicap = {
            data: new Array(@js(count(\App\Enums\Handicap::cases()))).fill(0),
            labels: @js(\App\Enums\Handicap::asSelectArray())
        }
        const employment_pattern = {
            data: new Array(@js(count(\App\Enums\EmploymentPattern::cases()))).fill(0),
            labels: @js(\App\Enums\EmploymentPattern::asSelectArray())
        }
        const skill = {
            data: [0, 0, 0, 0, 0],
            labels: ['Java', 'PHP', 'JavaScript', 'HTML', 'Python'],
        }
        const age = {
            data: [0, 0, 0, 0, 0, 0, 0, 0],
            labels: ['～24歳', '25～30歳', '30～35歳', '35～40歳', '40～45歳', '45～50歳', '50～55歳', '55歳以上'],
        }
        const genres = {
            data: [0, 0],
            labels: ['IT系', 'それ以外'],
        }
    </script>
    <script src="{{ asset('js/statistics-chart.js') }}" defer></script>

</x-app-layout>
