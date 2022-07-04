<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Auth app {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    </head>
<body>
<div id="app">
    <div>
        Benvenuto {{ $dati['email'] }} a seguire ecco le informazioni che hai richiesto.<br />
        Token: {{ $dati['token'] }} con id {{ $dati['id'] }} generato
    </div>
</div>
</body>
</html>
