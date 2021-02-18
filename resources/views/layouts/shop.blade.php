<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
<div class="flex-shrink-0">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Demo Eshop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3 my-4">

                <div class="list-group">

                    <a href="#" class="list-group-item list-group-item-action active">
                        Cras justo odio
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>

                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <a href="#" class="flex-fill">
                                Cras justo odio
                            </a>
                            <button type="button" class="btn btn-sm dropdown-toggle" onclick="$('.submenu-2').toggle()">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                        </div>
                        <div class="submenu-2" style="display: none">
                            <a href="#" class="list-group-subitem">
                                Cras justo odio
                            </a>

                            <div class="list-group-subitem">
                                <div class="d-flex">
                                    <a href="#" class="flex-fill">
                                        Cras justo odio
                                    </a>
                                    <button type="button" class="btn btn-sm dropdown-toggle" onclick="$('.submenu-2-5').toggle()">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                </div>

                                <div class="submenu-2-5" style="display: none">
                                    <a href="#" class="list-group-subitem">
                                        Cras justo odio
                                    </a>
                                    <a href="#" class="list-group-subitem">Dapibus ac facilisis in</a>
                                </div>

                            </div>

                            <a href="#" class="list-group-subitem">Dapibus ac facilisis in</a>
                        </div>
                    </div>

                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <!-- content -->
                @yield('content')
                <!-- /content -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- Footer -->
<footer class="footer py-5 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>