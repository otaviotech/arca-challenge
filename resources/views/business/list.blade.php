@extends('template.admin')

@section('title', "Business Finder")

@section('content')

  <h1 class="app-header">Business Finder Admin</h1>
  <div class="row">
    <div class="col-md-8">
      <h2 class="app-header-2">Businesses</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <a href="{{ route('business.create') }}" class="btn btn-default">Add Business</a>
      <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    </div>
  </div>

  @include('business.listing')

  <div class="row">
    <div class="col-md-12 text-center">
      {{ $businesses->appends('/admin')->links() }}
    </div>
  </div>
@endsection
