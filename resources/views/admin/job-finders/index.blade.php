<x-app-layout>
    <x-slot name="header">
        就職者情報一覧
    </x-slot>

    <div class="bg-white px-10 py-8 text-sm rounded-md">
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
            <form action="{{ route('job-finders.index') }}" method="GET" class="flex-grow">
                <input type="text"
                    name="search"
                    class="border-none tracking-wide w-full h-full text-sm"
                    placeholder="名前または職種で検索"
                    value="{{ request('search') }}">
            </form>
        </div>

        <div class="">
            <table class="w-full text-left">
                <thead class="text-cyan-500">
                    <tr class="border-b-2 border-gray-300">
                        <th class="md:px-6 py-3">名前(年齢)</th>
                        <th class="md:px-6 py-3">職種</th>
                        <th class="px-6 py-3 hidden lg:table-cell">雇用形態</th>
                        <th class="px-6 py-3 hidden md:table-cell">就労開始日</th>
                        <th class="px-6 py-3 hidden lg:table-cell">利用期間</th>
                        <th class="px-6 py-3" ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobFinders as $jobFinder)
                        <tr class="border-b border-gray-300">
                            <td class="md:px-6 py-3">
                                {{ $jobFinder->name }}({{ $jobFinder->age }})
                            </td>
                            <td class="md:px-6 py-3">
                                {{ $jobFinder->occupation }}
                            </td>
                            <td class="px-6 py-3 hidden lg:table-cell">
                                {{ $jobFinder->employment_pattern->label() }}({{ $jobFinder->is_handicaps_opened ? 'オープン' : 'クローズ' }})
                            </td>
                            <td class="px-6 py-3 hidden md:table-cell">
                                {{ $jobFinder->hired_at }}
                            </td>
                            <td class="px-6 py-3 hidden lg:table-cell">
                                {{ $jobFinder->period_of_use }}
                            </td>
                            <td class="flex py-3">
                                <a href="{{ route('job-finders.edit', $jobFinder) }}">
                                    <x-button class="text-xs w-16 mr-1" type="button">編集</x-button>
                                </a>
                                <form action="{{ route('job-finders.destroy', $jobFinder) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('delete')
                                    <x-button class="text-xs w-16" onclick="return confirm('削除しますか？');">削除</x-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $jobFinders->links() }}
        </div>
    </div>
</x-app-layout>
