<!doctype html>
<html lang="en" style="height: 100%;">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

    @yield('scripts')

    <title>Demo Blog - @yield('title')</title>
</head>
<body style="position: relative; min-height: 100%;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Demo Blog - Test Zelty</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="./">Home</a>
                        <a class="nav-link {{ Request::is('articles') ? 'active' : '' }}" href="./articles">Articles</a>
                        <a class="nav-link {{ Request::is('doc-api') ? 'active' : '' }}" href="./doc-api">Doc API</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="container" style="min-height: 100%;">
        @yield('main')
    </main>

    <footer class="footer" style="position: absolute; bottom: 0; width: 100%;">
        <div class="container text-center">
            <br><br>
            <hr>
            <span class="text-muted">© 2021 Sylvain Tricard</span>
            <br><br>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script type="text/javascript" class="init">

        $(document).ready(function() {
            $('#table-paginate').DataTable();
        } );

    </script>
</body>
</html>
