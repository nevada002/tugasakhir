<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    <div class="grid-admin">
        <section class="logo-admin d-flex align-items-center">
            @include('layout.partials.logo')
        </section>
        <section class="navbar-admin">
            @include('layout.partials.header')
        </section>
        <section class="sidebar-admin ">
            @include('layout.partials.side')
        </section>
        <section class="body-admin">
            <div class="container my-5">
                @yield('content')
            </div>
        </section>
        <section class="footer-admin">
            @include('layout.partials.footer')
        </section>
    </div>
</body>

</html>
