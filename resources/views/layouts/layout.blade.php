<!DOCTYPE html>
<html>
@include('layouts.head')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('layouts.nav')

    @include('layouts.sidebar')


    <div class="content-wrapper" id="app">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>

        @yield('content')

    </div>
    <footer class="main-footer no-print">
        <strong>CopyLeft © {{\Carbon\Carbon::now()->format('Y')}} <a href="https://www.defaultpath.com">المسار الافتراضي</a>.</strong>
    </footer>

</div>

@include('layouts.footer')
@yield('javascript')
@include('sweetalert::alert')
</body>
</html>
