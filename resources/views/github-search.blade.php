<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tech Test</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Github Username Search ({{$version}})</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

        </ul>
        <form method="get" action="" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" name="username" value="{{$username}}" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <div class="col">
            @if(empty($username))
                <h2>Please enter a search term</h2>
                <p class="lead">Content will be shown here.</p>
            @else
                <h3>Username: {{$username}}</h3>

                @if(!empty($userInfo))
                    <ul>
                        @foreach($userInfo as $key => $value)
                            <li><b>{{$key}}:</b> {{$value}}</li>
                        @endforeach
                    </ul>
                @endif
            @endif
        </div>
        <div class="col">
            @if(!empty($starredRepositories))
                <h3>Starred Repositories</h3>
                    <ul>
                        @foreach($starredRepositories as $repo)
                            @if(!empty($repo->full_name) && !empty($repo->html_url))
                            <li><a href="{{$repo->html_url}}">{{$repo->full_name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
            @endif
        </div>

    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

</body>
</html>
