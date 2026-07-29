<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Sweet Cake Bakery</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background:#fff8f3;
        }

        .content{
            padding:30px;
        }

        .alert{
            border-radius:12px;
        }

    </style>

</head>
        <body>

            @if (!request()->routeIs('login'))
                @include('layouts.navbar')
            @endif

<div class="content">

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>