@props(['name'])

<x-form.field name="{{ $name }}">
    <div class="md:w-1/6">
        <label
            for="{{ $name }}"
            class="block mb-1 md:mb-0 pr-4"
        >
            {{ $slot }}
        </label>
    </div>
    <div class="md:w-5/6">
        <input
            name="{{ $name }}" id="{{ $name }}"
            {{ $attributes->merge([
                'class' => 'shadow appearance-none border border-gray-200 rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline',
                'value' => old($name)
            ]) }}
        >
        <x-form.error name="{{ $name }}" />
    </div>
</x-form.field>
