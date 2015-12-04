@extends('layout')

@section('content')
    <div class="container">
        <h3>Dashboard</h3>
        <hr />
        <a class="btn btn-default" href="{!! action('Resource\\DashboardController@getCreate') !!}">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Resource
        </a>
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