<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>{{ $title ?? 'Feedbacker' }}</title>
    @livewireStyles
</head>

<body>
    <script src="{{ mix('js/app.js') }}"></script>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
