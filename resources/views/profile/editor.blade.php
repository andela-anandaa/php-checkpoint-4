@extends('layout')

@section('content')
    <div class="container">
        <h3>Profile Settings</h3>
        <hr />
        <div class="row">
            <div class="col-xs-6">
                <h4>Change Profile</h4>
                <hr />
                <form method="POST" action="{!! action('User\ProfileController@postEditProfile') !!}" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="form-group {{ $errors->has('name') ? 'has-warning' : '' }}">
                    <label for="NameInput">First Name</label>
                    <input name="name" class="form-control" id="NameInput" placeholder="John Doe" value="{{ Auth::user()->name }}">
                    @if($errors->has('name'))
                        <span class="help-block">
                            {{$errors->first('name')}}
                        </span>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('avatar') ? 'has-warning' : '' }}">
                    <label for="AvatarInput">Upload a new avatar</label>
                    <input type="file" name="avatar" class="form-control" id="AvatarInput"">
                    @if($errors->has('avatar'))
                        <span class="help-block">
                            {{$errors->first('avatar')}}
                        </span>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary" >Update </button>
                </form>
            </div>
            <div class="col-xs-6">
                <h4>{{ Auth::user()->name }}</h4>
                <hr />

                <img class="img-rounded" src="{{ Auth::user()->avatar }}" />
            </div>
        </div>
    </div>
@endsection