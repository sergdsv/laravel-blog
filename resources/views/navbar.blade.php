
<nav class="navbar navbar-expand-md navbar-custom">
        <div class="container">
          <a class="navbar-brand" href="/">
          <h1 class="title"><i class="fa fa-linux"></i> BLOG</h2>
          </a>

        <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
        @auth
          <li class="nav-item dropdown dropdown-menu-right">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if($post->user->avatar)
                <img src="images/{{ $post->user->avatar }}" />
            @else
                <img src="images/user/no_user_avatar.png" style="width: 40px;"/>
            @endif
              <span class="user">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          
          @else
          <li class="nav-item dropdown dropdown-menu-right">
            <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
          </li>
          @endauth
          @endif
        </ul>
      </div>
</nav>
