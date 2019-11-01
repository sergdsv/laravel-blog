<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .main-section{
                padding:15px;
                background-color: #fff;
            }
            .list-inline-item{
                border-right:1px solid black;
                padding-right:6px;
                line-height:0.4em;
            }
            .list-inline-item:last-child{
                border:none;
            }
            .post-detail ul{
                margin-top:15px;
                font-size: 14px;
                text-align: right;
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="container main-section border">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-5">
                    <img src="https://dummyimage.com/150x150/5a5a5a/ffffff" class="img-thumbnail" width="150px">
                    </div>
                    <div class="col-lg-10 col-sm-10 col-7">
                    <h4 class="text-primary">Post Title</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    </p>  
                    <button class="btn btn-sm btn-dark">Read more</button>
                    </div>
                </div>
                <div class="row post-detail">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <ul class="list-inline">
                        <li class="list-inline-item">
                            <img src="https://dummyimage.com/20x20/a8a1a8/0f0f12" class="rounded-circle" width="20px"> <span>by</span> <span class="text-info">Lisa</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span>Sept 16th,2017</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-comment" aria-hidden="true"></i> <span class="text-info">3 Comments</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i> <span class="text-info">Category: PHP</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Tags:</span>
                            <span class="badge badge-dark">bootstrap 4.0</span>
                            <span class="badge badge-success">laravel</span>
                            <span class="badge badge-danger">html</span>
                            <span class="badge badge-light">css</span>
                        </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-5">
                    <img src="https://dummyimage.com/150x150/5a5a5a/ffffff" class="img-thumbnail" width="150px">
                    </div>
                    <div class="col-lg-10 col-sm-10 col-7">
                    <h4 class="text-primary">Post Title</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    </p>  
                    <button class="btn btn-sm btn-dark">Read more</button>
                    </div>
                </div>
                <div class="row post-detail">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <ul class="list-inline">
                        <li class="list-inline-item">
                            <img src="https://dummyimage.com/20x20/a8a1a8/0f0f12" class="rounded-circle" width="20px"> <span>by</span> <span class="text-info">Lisa</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span>Sept 16th,2017</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-comment" aria-hidden="true"></i> <span class="text-info">3 Comments</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i> <span class="text-info">39 Shares</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Tags:</span>
                            <span class="badge badge-dark">bootstrap 4.0</span>
                            <span class="badge badge-dark">laravel</span>
                            <span class="badge badge-dark">html</span>
                            <span class="badge badge-dark">css</span>
                        </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-5">
                    <img src="https://dummyimage.com/150x150/5a5a5a/ffffff" class="img-thumbnail" width="150px">
                    </div>
                    <div class="col-lg-10 col-sm-10 col-7">
                    <h4 class="text-primary">Post Title</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    </p>  
                    <button class="btn btn-sm btn-dark">Read more</button>
                    </div>
                </div>
                <div class="row post-detail">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <ul class="list-inline">
                        <li class="list-inline-item">
                            <img src="https://dummyimage.com/20x20/a8a1a8/0f0f12" class="rounded-circle" width="20px"> <span>by</span> <span class="text-info">Lisa</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span>Sept 16th,2017</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-comment" aria-hidden="true"></i> <span class="text-info">3 Comments</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i> <span class="text-info">39 Shares</span>
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Tags:</span>
                            <span class="badge badge-dark">bootstrap 4.0</span>
                            <span class="badge badge-dark">laravel</span>
                            <span class="badge badge-dark">html</span>
                            <span class="badge badge-dark">css</span>
                        </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </body>
</html>
