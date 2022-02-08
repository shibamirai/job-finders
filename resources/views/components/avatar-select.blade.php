@foreach ($items as $value)
    <div class="text-center mr-2">
        <img src="http://localhost/avatar/{{ $value }}" alt="avatar" class="w-16 rounded-full">
        <input
            type="radio"
            {{ $disabled ? 'disabled' : '' }}
            {{ (old($name, $selected) == $value) ? 'checked' : '' }}
            {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
            name="{{ $name }}"
            value="{{ $value }}"
        >
    </div>
@endforeach
