<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    <div class="grid-user">
        <section class="navbar-user">
            @include('layout.partials.nav')
        </section>
        <section class="main-user">
            @yield('content')
        </section>
        <section class="footer-user">
            @include('layout.partials.footer')
        </section>
    </div>
</body>

</html>
