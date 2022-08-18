<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>
    <div class="grid-admin">
        <section class="logo-admin d-flex justify-content-center align-items-center" style="background-color: #BD4C04">
            @include('layout.partials.logo')
        </section>
        <section class="navbar-admin d-flex justify-content-start align-items-center" style="background-color: #0475BD;">
            @include('layout.partials.header')
        </section>
        <section class="sidebar-admin " style="background-color: #BD4C04">
            @include('layout.partials.side')
        </section>
        <section class="body-admin">
            @yield('content')
        </section>
    </div>
</body>

</html>
