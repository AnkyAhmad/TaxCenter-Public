<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="theme-color" content="" />

    <title>@yield('title')</title>

    {{-- style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body>
    <!-- Awal Navbar -->
    @include('includes.navbar')
    <!-- Akhir Navbar -->

    <!-- Awal Page content -->

    @yield('content')

    <!-- Awal Footer -->
    @include('includes.footer')
    <!-- Akhir Footer -->

    <!-- Akhir Page content -->

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
