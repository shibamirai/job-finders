@props(['name', 'label'])

<x-form.field name="{{ $name }}">
    <div class="md:w-1/6">
        <label
            for="{{ $name }}"
            class="block mb-1 md:mb-0 pr-4"
        >
            {{ $slot }}
        </label>
    </div>
    <div class="md:w-5/6 flex items-center">
        <input
            type="checkbox"
            name="{{ $name }}"
            class="text-cyan-500 shadow appearance-none border border-gray-200"
            @if (old($name))
                checked
            @endif
        >
        <label class="ml-2 mr-4 ">{{ $label }}</label>
        <x-form.error name="{{ $name }}" />
    </div>
</x-form.field>
