<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul ?? env('APP_NAME') }}</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/themes/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/themes/dist/css/adminlte.min.css">
    <script src="/themes/plugins/sweetalert2/sweetalert.min.js"></script>
    @yield('css')
</head>
<body class="hold-transition login-page">
@yield('content')

<script src="/themes/plugins/jquery/jquery.min.js"></script>
<script src="/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themes/dist/js/adminlte.min.js"></script>
<script src="/themes/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/themes/plugins/jquery-validation/additional-methods.min.js"></script>
@include('sweet::alert')
@yield('js')
</body>
</html>
