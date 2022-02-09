<button
     {{
        $attributes->merge([
            'type' => 'submit',
            'class' => 'inline-flex justify-center px-4 py-2
                        bg-cyan-500
                        border border-transparent
                        rounded-md
                        text-white uppercase tracking-widest
                        hover:bg-cyan-600
                        active:bg-cyan-700
                        focus:outline-none focus:border-cyan-300 focus:ring ring-cyan-200 focus:ring-opacity-50
                        disabled:opacity-25
                        transition ease-in-out duration-150'
        ])
    }}>
    {{ $slot }}
</button>
