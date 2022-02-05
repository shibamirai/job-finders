<x-app-layout>
    <x-slot name="header">
        就職者情報一覧
    </x-slot>
        <div class="bg-white px-10 py-8 text-sm">
                <div class="flex border border-gray-300 mb-4 w-2/3">
                    <div class="flex">
                        <span class="lg:px-3 py-2">
                            <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                    stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <form action="/admin/job-finders" method="GET" class="flex-grow">
                        <input type="text"
                            name="search"
                            class="border-none tracking-wide w-full h-full text-sm"
                            placeholder="検索"
                            value="{{ request('search') }}">
                    </form>
                </div>

                <table class="min-w-full text-left">
                    <thead class="text-cyan-500">
                        <tr class="border-b-2 border-gray-300">
                            <th class="px-6 py-3">名前(年齢)</th>
                            <th class="px-6 py-3">職種</th>
                            <th class="px-6 py-3">就労開始日</th>
                            <th class="px-6 py-3">利用期間</th>
                            <th class="px-6 py-3" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_finders as $job_finder)
                            <tr class="border-b border-gray-300">
                                <td class="px-6 py-3">
                                    {{ $job_finder->name }}({{ $job_finder->age }})
                                </td>
                                <td class="px-6 py-3">
                                    {{ $job_finder->occupation }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $job_finder->hired_at }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $job_finder->period_of_use }}
                                </td>
                                <td class="w-48 px-6 py-3">
                                    <x-button class="">編集</x-button>
                                    <form action="/admin/job-finders/{{ $job_finder->id }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('delete')

                                        <x-button
                                            class=""
                                            onclick="return confirm('削除しますか？');"
                                        >
                                            削除
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $job_finders->links() }}
                </div>

    </div>
</x-app-layout>
