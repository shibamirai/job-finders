@foreach ($items as $value)
    <div class="text-center mr-2">
        <img src="{{ asset('avatar/' . $value) }}" alt="avatar" class="w-16 rounded-full">
        <input
            type="radio"
            {{ $disabled ? 'disabled' : '' }}
            {{ (old($name, $selected) == $value) ? 'checked' : '' }}
            {!! $attributes->merge(['class' => 'text-cyan-500 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
            name="{{ $name }}"
            value="{{ $value }}"
        >
    </div>
@endforeach
