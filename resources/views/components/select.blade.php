@props(['name', 'items', 'selected' => '', 'disabled' => false])

@foreach ($items as $key => $value)
    <div class="">
        <input
            {{ $disabled ? 'disabled' : '' }}
            {{ (old($name, $selected) == $key) ? 'checked' : '' }}
            {!!
                $attributes->merge([
                    'class' => 'text-cyan-500 border-gray-300 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50'
                ])
            !!}
            name="{{ $name }}"
            value="{{ $key }}"
        >
        <label class="ml-2 mr-4 ">{{ $value }}</label>
    </div>
@endforeach
