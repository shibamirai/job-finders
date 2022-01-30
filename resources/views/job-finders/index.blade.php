<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <h1 class="text-xl font-bold text-center mb-6">就職者さんの作品・データ</h1>

                        <div class="lg:grid lg:grid-cols-6">
                            @foreach ($job_finders as $job_finder)
                                <x-job-finder-card :jobFinder="$job_finder" />
                            @endforeach
                        </div>

                        {{ $job_finders->links() }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
