<html>

<head>
    <title>Laravel Crossing - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/css.css') }}">

</head>

<body class="h-100 w-100 overflow-hidden">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="{{ URL::asset('img/logo.png') }}" height="100" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            @section('navbar') <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="/annonces/all">Annonces</a>
                <a class="nav-item nav-link" href="/messages">Messages</a>@if (session('newmessage'))
                <div class="bg-danger rounded-pill p-2"> !</div>
                @endif




            </div>
            @show

        </div>
    </nav>
    <div class="h-100 container-fluid p-0">
        <div class="row h-100 m-0">
            <div class="bg-img col-2">
                <div class="bg-light p-3 m-3 rounded-lg">
                    @section('sidebar')
                    @show

                </div>
            </div>
            <div class="col-8 m-0">
                @yield('content')
            </div>
            <div class="bg-img col-2"></div>
        </div>
    </div>
    </div>

</body>

</html>