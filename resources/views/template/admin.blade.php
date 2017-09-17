<!DOCTYPE html>
<html ng-app="app">
  <head>
    <meta charset="utf-8">
    <title>@yield('title') - Business Finder</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('template.styles-partial')
  </head>
  <body ng-cloak>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    <div class="container">
      @yield('content')
    </div>
    @include('template.scripts-partial')
    @yield('scripts')
  </body>
</html>
