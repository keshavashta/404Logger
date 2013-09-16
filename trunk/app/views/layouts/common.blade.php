<!doctype html>
<html lang="en" ng-app="app">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Green Apple Solutions - 404 Logger</title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->

    <%HTML::style('http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css')%>
    <%HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,700')%>
    <% HTML::style('css/screen.css') %>
    <% HTML::style('css/app.css') %>

    <!--Scripts-->
    <%HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js')%>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <%HTML::script('js/jquery.validate.min.js')%>
    <%HTML::script('js/additional-methods.min.js')%>


</head>
<body>
<body>

<!-- Wrap all page content here -->
<div id="wrap">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">404 Logger</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>

                </ul>
                @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<% URL::to("/user/logout") %>"><i class="icon-signout"></i>Logout</a></li>
                </ul>
                @endif
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>


    <div class="container">
        @yield('content')
    </div>
</div>

<div id="footer">
    <div class="container">
        <p class="text-muted credit">&copy; <a href="http://greenapplesolutions.com">Green Apple Solutions</a></p>
    </div>
</div>

</body>
</html>