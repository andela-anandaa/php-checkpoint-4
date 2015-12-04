@extends('layout')

@section('content')
    <div class="container">
        <h3>Dashboard</h3>
        <hr />
        <div id="dashboard">
            <div class="row">
                <div class="col-xs-4" v-for="resource in resources">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">{{ $resource.title }}</h3>
                      </div>
                      <div class="panel-body">
                        <div class="embed-responsive embed-responsive-4by3">
                          <iframe class="embed-responsive-item" src="{{ $resource.url }}"></iframe>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection