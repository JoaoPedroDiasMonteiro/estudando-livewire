<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>{{ $title ?? 'Feedbacker' }}</title>
</head>

<body>
    <main>
        {{ $slot }}
    </main>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>