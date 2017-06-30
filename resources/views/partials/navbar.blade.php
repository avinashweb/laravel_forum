<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">Forum</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="{{ route('home') }}">Home</a></li>
        @if(Auth::check())
        <li class="{{ (Request::is('ask-question') ? 'active' : '') }}"><a href="{{ route('ask_question') }}">Ask Question</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">View Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">User Settings</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
        @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Account<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('signup') }}">Sign up</a></li>
                <li><a href="{{ route('signin') }}">Sing in</a></li>
              </ul>
            </li>
        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>