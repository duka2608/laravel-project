<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">
<div class="wrapper">@include('fixed.admin.head')
@include('fixed.admin.navigation')
@include('fixed.admin.aside')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('header-title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('header-title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @yield('content')
    </div>
@include('fixed.admin.footer')
</div>
<!-- ./wrapper -->

@include('fixed.admin.scripts')
</body>
</html>

