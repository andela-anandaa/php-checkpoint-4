<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>KnowTube</title>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'>
<link href="{!! secure_asset('/css/app.css') !!}" rel="stylesheet" type="text/css">
</head>
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">KnowTube</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <!--
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>

              <form class="navbar-form navbar-left" role="search">
                <div class="form-groeditup">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form> -->

              <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">welcome, {{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{!! action('Resource\\DashboardController@getPersonal') !!}">Dashboard</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="{!! action('Auth\AuthController@getLogout') !!}">Log out</a></li>
                    </ul>
                  </li>
                @else
                  <li><a href="{!! action('Auth\AuthController@getLogin') !!}">Sign in</a></li>
                  <li><a href="{!! action('Auth\AuthController@getRegister') !!}">Sign up</a></li>
                @endif
              </ul>
            </div> <!--/.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <div id="alerts">
            @if (session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div id="page">
            @yield('content')
        </div>

        <script type="text/javascript" src="{!! secure_asset('/js/jquery-2.1.4.min.js') !!}"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/vue.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
