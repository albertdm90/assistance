<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
          class="logo-name">Menu Digital</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>

      <li class="{{request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Inicio</span></a>
      </li>
      <li class="{{request()->routeIs('position.index') ? 'active' : '' }}">
        <a href="{{ route('position.index') }}" class="nav-link"><i class="fas fa-user-tag"></i><span>Cargos</span></a>
      </li>
      <li class="{{request()->routeIs('worker.index') ? 'active' : '' }}">
        <a href="{{ route('worker.index') }}" class="nav-link"><i class="fas fa-user-circle"></i><span>Trabajadores</span></a>
      </li>
      <li class="{{request()->routeIs('checkpoint.index') ? 'active' : '' }}">
        <a href="{{ route('checkpoint.index') }}" class="nav-link"><i class="fas fa-location-arrow"></i><span>Puntos de control</span></a>
      </li>
    </ul>
  </aside>
</div>