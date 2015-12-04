@extends('modal')

@section('content')
    <div class="container">
        <h3>Add Category</h3>
        <hr />
        <div class="row">
            <form id="category-form" method="POST" action="{!! action('Resource\\CategoryController@postCreateCategory') !!}">
                {!! csrf_field() !!}
                <div class="form-group {{ $errors->has('title') ? 'has-warning' : '' }}">
                  <label for="titleInput">Title</label>
                  <input name="title" class="form-control" id="titleInput" placeholder="Title" value="{{ old('title') }}">
                  @if($errors->has('title'))
                      <span class="help-block">
                          {{$errors->first('title')}}
                      </span>
                  @endif
                </div>

                <button type="submit" class="btn btn-default">Add</button>
            </form>
        </div>
    </div>
@endsection