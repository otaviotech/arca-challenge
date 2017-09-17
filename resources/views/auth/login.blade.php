@extends('template.main-layout')

@section('content')

<div class="row">
  <h3 class="app-header-2 text-center">Please login to access the system</h3>
</div>

<br />
<br />

<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="col-md-4 col-md-offset-4">
            <input id="email" type="email" class="form-control"
                    name="email" required
                    autofocus placeholder="Username">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-4 col-md-offset-4">
            <input id="password" type="password" class="form-control"
                  name="password" required placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 col-md-offset-5 text-center">
            <button type="submit" class="btn btn-default btn-block">
              Login
            </button>
        </div>
    </div>
</form>
@endsection
