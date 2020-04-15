<html>

<head>
    <title>Laravel Crossing - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body style="height: 100%;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Laravel Crossing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            @section('navbar') <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="/annonces/all">Annonces</a>
            </div>
            @show

        </div>
    </nav>

    @section('sidebar')
    @show


    <div class="container">
        @yield('content')
    </div>

    <footer>

<!-- Copyright -->
<div class="footer-copyright text-center py-2 text-light" style=" width: 100%; height: 40px; position:fixed; bottom:0"><small>achetelejeuthéo</small>
</div>
<!-- Copyright -->

</footer>

</body>

</html>