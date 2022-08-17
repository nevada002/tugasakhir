<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.nav')
    <div class="container my-5 py-5">
        @yield('content')
    </div>
    @include('layout.partials.footer')
</body>

</html>
