<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
          class="logo-name">Menu Digital</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="{{request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i><span>Inicio</span></a>
      </li>

      @if (Auth::user()->hasAnyPermission([
        'menu.index',
        'visitors.index',
        'geolocalizator.index',
        'recommendation.index',
        'vote.index',
        'favorite.index',
      ]))
        <li class="dropdown{{request()->routeIs([
          'menu.index',
          'menu.edit',
          'menu.editContent',
          'menu.editContent',
          'visitors.index',
          'geolocalizator.index',
          'recommendation.index',
          'vote.index',
          'favorite.index',
          ]) ? ' active' : '' }}">

          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              data-feather="chevrons-down"></i><span>Información</span></a>
          <ul class="dropdown-menu">
            
            @can('menu.create')
              <li class="{{request()->routeIs(['menu.index','menu.edit','menu.editContent',]) ? ' active' : '' }}">
                <a class="nav-link{{request()->routeIs('menu.index') ? ' toggled' : '' }}" href="{{ route('menu.index') }}">Menú Registrado</a>
              </li>
            @endcan
            
            @can('visitors.index')
              <li class="{{request()->routeIs('visitors.index') ? ' active' : '' }}"><a class="nav-link{{request()->routeIs('visitors.index') ? ' toggled' : '' }}" href="{{ route('visitors.index') }}">Visitas</a></li>
            @endcan

            @if (Auth::user()->hasAnyPermission([
              'vote.index',
              'geolocalizator.index',
              'favorite.index',
              'recommendation.index',
            ]))
                <li class="dropdown{{request()->routeIs([
                  'geolocalizator.index',
                  'recommendation.index',
                  'vote.index',
                  'favorite.index',
                  ]) ? ' active' : '' }}">
                  <a href="#" class="has-dropdown">Estadisticas</a>
                  <ul class="dropdown-menu">

                    @can('vote.index')
                      <li class="{{request()->routeIs('vote.index') ? ' active' : '' }}"><a href="{{ route('vote.index') }}">Valoración del Cliente</a></li>
                    @endcan

                    @can('geolocalizator.index')
                      <li class="{{request()->routeIs('geolocalizator.index') ? ' active' : '' }}"><a href="{{ route('geolocalizator.index') }}">Geolocalización</a></li>
                    @endcan

                    @can('favorite.index')
                      <li class="{{request()->routeIs('favorite.index') ? ' active' : '' }}"><a href="{{ route('favorite.index') }}">Comida Favorita</a></li>
                    @endcan
                    
                    @can('recommendation.index')
                      <li class="{{request()->routeIs('recommendation.index') ? ' active' : '' }}"><a href="{{ route('recommendation.index') }}">Recomendaciones</a></li>
                    @endcan

                  </ul>
                </li>
            @endif
            
          </ul>
        </li>

      @endif

      @can('menu.create')
        <li class="menu-header">Menú</li>
        <li class="dropdown{{request()->routeIs([
          'menu.create'
          ]) ? ' active' : '' }}">
          <a href="{{ route('menu.create') }}" class="nav-link"><i data-feather="monitor"></i><span>Menu nuevo</span></a>
        </li>
      @endcan
     
     
    </ul>
  </aside>
</div>