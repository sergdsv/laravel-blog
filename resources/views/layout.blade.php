<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Blog</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/pace.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="/images/favicon.png">

</head>

<body>

<div id="app">

    @include('navbar')
    <div class="container main-section border animated fadeIn">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-9">
                @yield('content')
            </div>
            <div class="col-lg-3 col-sm-3 col-3">
                @include('posts.sidebar')
            </div>
        </div>
    </div>

</div>

<!-- js files -->
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/pace.min.js"></script>
<!-- <script type="text/javascript" src="/js/front.js"></script> -->
</body>
</html>
