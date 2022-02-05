@props(['name', 'items'])

<x-form.field name="{{ $name }}">
    <div class="md:w-1/6">
        <label
            for="{{ $name }}"
            class="block mb-1 md:mb-0 pr-4"
        >
            {{ $slot }}
        </label>
    </div>
    <div class="md:w-5/6 flex flex-wrap items-center">
        @foreach ($items as $key => $value)
            <div class="flex">
                <input
                    type="radio"
                    name="{{ $name }}"
                    class="text-cyan-500 shadow appearance-none border border-gray-200"
                    {{ $attributes }}
                    value="{{ $key }}"
                    @if ($loop->first || old($name) == $key)
                        checked
                    @endif
                >
                <label class="ml-2 mr-4 ">{{ $value }}</label>
            </div>
        @endforeach
        <x-form.error name="{{ $name }}" />
    </div>
</x-form.field>
