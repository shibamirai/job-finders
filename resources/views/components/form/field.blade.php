@props(['name'])

<div class="md:flex md:items-center mb-4">
    <div class="md:w-1/6">
        <label
            for="{{ $name }}"
            class="block mb-1 md:mb-0 pr-4"
        >
            {{ $label }}
        </label>
    </div>
    <div class="md:w-5/6">
        {{ $slot }}
        <x-form.error name="{{ $name }}" />
    </div>
</div>
