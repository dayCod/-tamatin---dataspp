<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Petugas | @yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css?v=3.2.0') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('petugas.layout.header-script')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @if(request()->segment(2) !== "login" && request()->segment(2) !== "register")
            {{-- Navbar --}}
            @include('petugas.layout.navbar')

            {{-- Sidebar --}}
            @include('petugas.layout.sidebar')
        @endif

        @if(request()->segment(2) !== "login" && request()->segment(2) !== "register")
            <div class="content-wrapper">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>@yield('breadcrumb')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Panel</a></li>
                                    <li class="breadcrumb-item active">@yield('breadcrumb')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container">
                        @yield('content')
                    </div>
                </section>

            </div>
        @else
            <div class="container">
                @yield('content')
            </div>
        @endif

    </div>



    {{-- script --}}
    @include('petugas.layout.footer-script')

    @yield('script')

    <script>
        $(document).ready(function() {
            @if(session('success'))
                alert("{{ session()->get('success') }}")
            @endif
        })
    </script>
</body>

</html>
