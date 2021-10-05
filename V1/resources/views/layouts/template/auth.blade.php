<div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('layouts.auth.navbar')
      @include('layouts.auth.sidebar')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <section class="section">
            @yield('content')
            </section>
          </div>
        </section>
        {{-- @include('layouts.auth.settingsSidebar') --}}
        @yield('modal')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          {{-- <a href="templateshub.net">Templateshub</a></a> --}}
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>