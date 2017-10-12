@extends('layouts.app')
@section('title')
Login
@endsection
@section('content')
<div class="login">
    <h2>Welcome!</h2>
     <form method="POST" action="{{ route('login') }}">
     {{ csrf_field() }}
      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="input-group">
          <input type="text" id="email" name="email" required="required"/>
          <label class="control-label" for="email">Email</label><i class="bar"></i>
        </div>
      </div>
      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="input-group">
          <input type="password" id="password" name="password" required="required"  value="{{ old('email') }}"/>
          <label class="control-label" for="password">Password</label><i class="bar"></i>
        </div>
      </div>
      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between down-container">
        <button class="btn btn-primary" type="submit">
          Log In
        </button>
        <a href="{{route('register')}}" class="link"> Create account</a>
      </div>
    </form>
</div>
@endsection
