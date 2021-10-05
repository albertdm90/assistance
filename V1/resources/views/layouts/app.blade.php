<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Menu Digital</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">
  @stack('cssPage')
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.ico') }}" />
  @livewireStyles
</head>

<body class="light light-sidebar theme-white">
  @auth
    @include('layouts.template.auth')
  @endauth
  @guest
    @include('layouts.template.guest')
  @endguest
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery-validation/dist/jquery.validate.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('assets/bundles/jquery-steps/jquery.steps.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js' )}}"></script>
  <!-- Page Specific JS File -->
  @stack('jsPage')
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  @livewireScripts
  <script src="{{ asset('js/livewire.js') }}"></script>
  @stack('js')

</body>

</html>
