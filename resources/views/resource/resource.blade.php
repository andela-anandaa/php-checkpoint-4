@extends('layout')

@section('content')
    <div class="container">
        <h3>{{ $resource->title }}</h3>
        <hr />

        <div id="resource">
            <div class="row">
                <div class="col-xs-6">
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="{{ $resource->url }}"></iframe>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="actions">
                        <h4>details</h4>
                        <hr />
                        <p>{{$resource->description}}</p>
                        @can('change', $resource)
                        <hr />
                        <a href="{!! action('Resource\\DashboardController@getEditor', ['resource_id' => $resource->id]) !!}" class="btn btn-default btn-primary">edit</a>

                        <form method="POST" action="{!! action('Resource\\DashboardController@postDelete', ['resource_id' => $resource->id]) !!}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-default">delete</button>
                        </form>
                        @endcan

                        <hr />
                        <label>Category:</label> {{$resource->category->title}}
                    </div>
                </div>
            </div>
        </div>
@endsection