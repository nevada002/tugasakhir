<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.nav')
    @yield('content')
    <div class="mt-5"
        style="background-position: center; background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">
        <img src="assets/img/background.svg" alt="">
    </div>
    @include('layout.partials.footer')
</body>

</html>
