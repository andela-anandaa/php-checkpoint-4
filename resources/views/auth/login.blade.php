@extends('layout')

@section('content')
    <div class="container">
        <h3>Login</h3>
        <hr />
        <div class="row">
            <div class="col-xs-6">
                <form method="POST" action="{!! action('Auth\AuthController@postLogin') !!}">
                  {!! csrf_field() !!}
                  <div class="form-group {{ $errors->has('email') ? 'has-warning' : '' }}">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="help-block">
                            {{$errors->first('email')}}
                        </span>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('password') ? 'has-warning' : '' }}">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @if($errors->has('password'))
                        <span class="help-block">
                            {{$errors->first('password')}}
                        </span>
                    @endif
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember"> Remember me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-default">Login</button>
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