<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel pobrań
</a>

<div class="sb-sidenav-menu-heading">Konto</div>
<nav class="sb-sidenav-menu-nested">
    <a class="nav-link" href="{{ route('me.profile') }}">Profil</a>
</nav>

<div class="sb-sidenav-menu-heading">Harmonogram</div>
<nav class="sb-sidenav-menu-nested">
    <a class="nav-link" href="{{ route('lists.POBList') }}">Harmonogram POB</a>
    <a class="nav-link" href="{{ route('lists.myList') }}">Harmonogramy</a>
</nav>

<div class="sb-sidenav-menu-heading">Badania laboratoryjne</div>
<nav class="sb-sidenav-menu-nested">
    <a class="nav-link" href=#>Wytrzymałość betonu</a>
    <a class="nav-link" href=#>Wytrzymałość beleczek</a>
</nav>

<div class="sb-sidenav-menu-heading">Tabele danych</div>
<nav class="sb-sidenav-menu-nested">
    <a class="nav-link" href="{{ route('tables.client') }}">Zleceniodawcy</a>
    <a class="nav-link" href="{{ route('tables.invest') }}">Inwestycje</a>
    <a class="nav-link" href="{{ route('recipes.recipe') }}">Receptury</a>
</nav>

@can('admin-level')
    <div class="sb-sidenav-menu-heading">Admin panel</div>
    <nav class="sb-sidenav-menu-nested">
        <a class="nav-link" href="{{ route('get.users') }}">Użytkownicy</a>
        <a class="nav-link" href=#>Kwerendy</a>
    </nav>
@endcan
