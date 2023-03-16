<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Новостной портал</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/album.css') }}" rel="stylesheet">
</head>

<body>

<div class="wrapper">
    <div class="top d-flex flex-column">

        <x-header></x-header>

        <main role="main" class="flex-grow-1 d-flex">

            <div class="album py-5 bg-light flex-grow-1">
                @yield('content')
            </div>

        </main>

    </div>

    <x-footer></x-footer>

</div>
</body>
</html>

