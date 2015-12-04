@extends('layout')

@section('content')
    <div class="container">
        <h3>Welcome, to KnowTube</h3>
        <hr />
        <a class="btn btn-primary" href="/" >All</a>
        @foreach($categories as $category)
          <a class="btn btn-primary" href="{!! action('Resource\\DashboardController@getIndexByCategory', ['category_id' => $category->id]) !!}">{{$category->title}}</a>
        @endforeach
        <hr />
        <div id="dashboard">
            <div class="row">
            @foreach ($resources as $resource)
                <div class="col-xs-4"">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">{{ $resource->title }}</h3>
                      </div>
                      <div class="panel-body">
                        <div class="embed-responsive embed-responsive-4by3">
                          <iframe class="embed-responsive-item" src="{{ $resource->url }}"></iframe>
                        </div>

                        <a class="btn btn-default" href="{!! action('Resource\\DashboardController@getResource', ['resource_id' => $resource->id]) !!}">read more...</a>
                      </div>
                    </div>
                </div>
          @endforeach
          </div>
        </div>
    </div>
@endsection