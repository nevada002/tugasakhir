<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    <div class="grid">
        <section class="navbar">
            @include('layout.partials.nav')
        </section>
        <section class="main">
            @yield('content')
        </section>
        <section class="footer">
            @include('layout.partials.footer')
        </section>
    </div>
</body>

</html>
