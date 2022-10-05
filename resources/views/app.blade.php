<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title></title>
    <meta name="theme-color" content="#7952b3">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Bootstrap core CSS -->
    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href=" {{ asset('css/my.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset("js/bootstrap.bundle.min.js") }}"  crossorigin="anonymous"></script>
{{--    <script src="{{ asset("js/feather.min.js") }}" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
{{--    <script src="dashboard.js"></script>--}}
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
@inertia
</body>
</html>
