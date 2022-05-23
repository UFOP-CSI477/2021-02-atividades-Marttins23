<!doctype html>
<html lang=pt-BR>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }} - TO-DO List</title>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1> {{ $title }}</h1>
    </div>

    {{ $slot }}

</div>
<script src="https://kit.fontawesome.com/91cdb689ba.js" crossorigin="anonymous"></script>
</body>
</html>
