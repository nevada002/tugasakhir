<div class="navbar navbar-expand-lg" style="width: 100%; padding-left: 42px; padding-right: 50px;">
    <h1 class="navbar-brand mb-0 text-light">@yield('title')</h1>
    <div class="navbar-nav me-auto"></div>
    <div class="navbar-nav dropdown-center">
        <a 
            id="navbarProfile" 
            href="#" 
            class="nav-link dropdown-toggle link-light" 
            role="button"
            data-bs-toggle="dropdown" 
            aria-expanded="false"
        >
            Selamat Datang, {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile">
            <li>
                <a class="dropdown-item text-end" href="{{ route('admin.profile.edit') }}">Edit Profil</a>
            </li>
            <li>
                <a class="dropdown-item text-end" href="#" id="logout">Logout</a>
            </li>
        </ul>
    </div>
</div>
