<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{ $judul }}</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/themes/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/themes/dist/css/adminlte.min.css">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h1 class="m-0">{{ $judul }}</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>


    @include('components.footer')
    <form action="{{url('/logout')}}" method="post" id="form-logout">
        @csrf
    </form>
</div>


<script src="/themes/plugins/jquery/jquery.min.js"></script>
<script src="/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themes/dist/js/adminlte.min.js"></script>
<script>
    const token = $('meta[name="csrf-token"]').attr('content');
</script>
<script src="/js/common.js"></script>
</body>
</html>
