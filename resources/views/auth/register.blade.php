@extends('layouts.app')

@section('content')
<div class="login">
     <form method="POST" action="{{route('register')}}">
     {{ csrf_field() }}
     <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <div class="input-group">
          <input type="text" id="username" name="username" value="{{ old('username') }}" required="required"/>
          <label class="control-label" for="email">Username</label><i class="bar"></i>
        </div>
      </div>
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="input-group">
          <input type="text" id="name" name="name" value="{{ old('fullname') }}" required="required"/>
          <label class="control-label" for="name">Full Name</label><i class="bar"></i>
        </div>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="input-group">
          <input type="text" id="email" name="email" value="{{ old('email') }}" required="required"/>
          <label class="control-label" for="email">Email</label><i class="bar"></i>
        </div>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="input-group">
          <input type="password" id="password" name="password" required="required"/>
          <label class="control-label" for="password">Password</label><i class="bar"></i>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="text" id="confirm-password" name="password_confirmation" required="required"/>
          <label class="control-label" for="email">Confirm Password</label><i class="bar"></i>
        </div>
      </div>
      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between down-container">
        <button class="btn btn-primary" type="submit">
          Register
        </button>
        <a href="{{route('login')}}" class="link"> Log In</a>
      </div>
    </form>
</div>
@endsection
