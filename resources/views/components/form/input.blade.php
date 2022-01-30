@props(['name', 'placeholder'])

<x-form.field name="{{ $name }}">
    <x-slot name="label">
        {{ $slot }}
    </x-slot>

    <input
        type="text" name="{{ $name }}" id="{{ $name }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="{{ $placeholder }}"
    >
</x-form.field>
