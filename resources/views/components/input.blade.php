@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!!
        $attributes->merge([
            'class' => 'w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50'
        ])
    !!}>
