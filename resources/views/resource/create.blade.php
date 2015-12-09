@extends('layout')

@section('content')
    <div class="container">
        <h3>Add Resource</h3>
        <hr />
        <div class="row">
            <form id="resource-form" method="POST" action="{!! action('Resource\\DashboardController@postCreate') !!}">
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

                <div class="form-group {{ $errors->has('url') ? 'has-warning' : '' }}">
                  <label for="urlInput">Youtube URL</label>
                  <input type="url" name="url" class="form-control" id="urlInput" placeholder="https://www.youtube.com/embed/abcdefgh" value="{{ old('url') }}">
                  @if($errors->has('url'))
                      <span class="help-block">
                          {{$errors->first('url')}}
                      </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-warning' : '' }}">
                  <label for="descriptionInput">Description</label>
                  <textarea name="description" class="form-control" id="descriptionInput" placeholder="description of resource">{{ old('description') }}</textarea>
                  @if($errors->has('description'))
                      <span class="help-block">
                          {{$errors->first('description')}}
                      </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('category_id') ? 'has-warning' : '' }}">
                  <label for="categoryInput">Category</label>

                  <div class="input-group">
                    <select name="category_id" class="form-control" id="categoryInput">
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                    </select>
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"  data-toggle="modal" data-target="#categoryModal">Add</button>
                    </span>
                  </div><!-- /input-group -->


                  
                  @if($errors->has('category_id'))
                      <span class="help-block">
                          {{$errors->first('category_id')}}
                      </span>
                  @endif
                </div>

                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

    @include ('category.modal')
@endsection