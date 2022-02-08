@props(['name', 'items', 'selected' => '', 'disabled' => false])

@foreach ($items as $key => $value)
    <div class="">
        <input
            {{ $disabled ? 'disabled' : '' }}
            {{ (old($name, $selected) == $key) ? 'checked' : '' }}
            {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
            name="{{ $name }}"
            value="{{ $key }}"
        >
        <label class="ml-2 mr-4 ">{{ $value }}</label>
    </div>
@endforeach
