@extends('template.main-layout')

@section('title', "$business->title details")

@section('content')

  @if (Auth::check())
    <div class="row">
      <div class="col-md-4">
        @if (Auth::check() && Route::currentRouteName() == 'business.detail')
          <a href="{{ route('business.edit', ['id' => $business->id]) }}" class="btn btn-default">Edit Business</a>
        @endif
        <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      <h1>{{ $business->title }}</h1>
      <h4 style="font-family: Raleway">in
        @foreach ($business->categories as $c)
          <a href="#">{{$c->name}}</a>{{$loop->last ? '.' : ','}}
        @endforeach
      </h4>
    </div>
  </div>

  <h1>About</h1>
  <div class="row">
    <div class="col-md-12">
      <p>{{ $business->description }}</p>
      <p><b>Address:</b> {{ $business->address }}</p>
      <p><b>Phone:</b> {{ $business->phone }}</p>
    </div>
  </div>



@endsection
