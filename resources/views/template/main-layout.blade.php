<!DOCTYPE html>
<html ng-app="app">
  <head>
    <meta charset="utf-8">
    <title>@yield('title') - Business Finder</title>
    @include('template.styles-partial')
  </head>
  <body ng-cloak>
    <div class="container">
      <div class="row">
        <h1 class="app-header text-center">Business Finder</h1>
      </div>
      @yield('content')
    </div>
    @include('template.scripts-partial')
  </body>
</html>
