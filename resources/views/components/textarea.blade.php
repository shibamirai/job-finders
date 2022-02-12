@props(['disabled' => false])

<textarea
    {{ $disabled ? 'disabled' : '' }}
    {!!
        $attributes->merge([
            'class' => 'w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50'
        ])
    !!}
>{{ $slot }}</textarea>
