<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Administration - Air conditioners - IT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS And JavaScript -->
        <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/technologicals">ADMINAC</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/buildings">PANEL</a></li>
                    <li><a href="/airs">INVENTARIO A/C</a></li>
                    <li><a href="/sensors">INVENTARIO SENSORES</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                        @endforeach
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </body>
</html>