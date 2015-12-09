@extends('layout')

@section('content')
    <div class="container">
        <h3>Register</h3>
        <hr />
        <div class="row">
            <div class="col-xs-6">
                <form method="POST" action="{!! action('Auth\AuthController@postRegister') !!}">
                  {!! csrf_field() !!}
                  <div class="form-group {{ $errors->has('name') ? 'has-warning' : '' }}">
                    <label for="nameInput">Name</label>
                    <input type="name" name="name" class="form-control" id="nameInput" placeholder="Email" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="help-block">
                            {{$errors->first('name')}}
                        </span>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('email') ? 'has-warning' : '' }}">
                    <label for="emailInput">Email address</label>
                    <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="help-block">
                            {{$errors->first('email')}}
                        </span>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('password') ? 'has-warning' : '' }}">
                    <label for="passwordInput">Password</label>
                    <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
                    @if($errors->has('password'))
                        <span class="help-block">
                            {{$errors->first('password')}}
                        </span>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('password_confirmation') ? 'has-warning' : '' }}">
                    <label for="passwordConfirmationInput">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmationInput" placeholder="Password">
                    @if($errors->has('password_confirmation'))
                        <span class="help-block">
                            {{$errors->first('password_confirmation')}}
                        </span>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="col-xs-6">
                <h4>Open Auth</h4>
                <hr />

                <a class="btn btn-default" href="{!! action('Auth\SocialAuthController@redirectToProvider', ['provider' => 'google']) !!}">Google+</a>

                <a class="btn btn-default" href="{!! action('Auth\SocialAuthController@redirectToProvider', ['provider' => 'github']) !!}">Github</a>
            </div>
        </div>
    </div>
@endsection