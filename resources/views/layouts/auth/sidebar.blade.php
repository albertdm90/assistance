<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
          class="logo-name">SCR</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>

      <li class="{{request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Inicio</span></a>
      </li>
      <li class="{{request()->routeIs('device.index') ? 'active' : '' }}">
        <a href="{{ route('device.index') }}" class="nav-link"><i class="fas fa-tablet"></i><span>Dispositivos</span></a>
      </li>
      <li class="{{request()->routeIs([
        'worker.index',
        'worker.create',
        'worker.edit',
        'worker.show',
      ]) ? 'active' : '' }}">
        <a href="{{ route('worker.index') }}" class="nav-link"><i class="fas fa-user-circle"></i><span>Empleado</span></a>
      </li>
      <li class="{{request()->routeIs('checkpoint.index') ? 'active' : '' }}">
        <a href="{{ route('checkpoint.index') }}" class="nav-link"><i class="fas fa-location-arrow"></i><span>Puntos de control</span></a>
      </li>
      <li class="{{request()->routeIs(['round.index', 'round.show']) ? 'active' : '' }}">
        <a href="{{ route('round.index') }}" class="nav-link"><i class="fab fa-dochub"></i><span>Reportes de rondas</span></a>
      </li>
    </ul>
  </aside>
</div>