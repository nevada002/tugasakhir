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
        <section class="main-user" style="min-height: 70vh;">
            <div class="container my-5">
                @yield('content')
            </div>
        </section>
        <section class="footer-user">
            @include('layout.partials.footer')
        </section>
    </div>

    @stack('scripts')
</body>

</html>
