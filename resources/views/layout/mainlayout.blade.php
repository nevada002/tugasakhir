<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.nav')
    @yield('content')
    @include('layout.partials.footer')
</body>

</html>