<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link rel="stylesheet" href="{{ asset('assents/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assents/fontawesome/css/all.css') }}">

    <script src="{{ asset('assents/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assents/fontawesome/js/all.js') }}"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body style="background: #f7f7f7">

    @yield('content')

    @livewireScripts
</body>

</html>
