<div class="navbar navbar-default navbar-fixed-top navbar-transparent">
  <div class="container">
    <div class="navbar-header">
      <a href="../" class="navbar-brand"><img src="/build/img/logo-nav.png">Langtal</a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li>
          <a href="../">Home</a>
        </li>
        <li>
          <a href="../">About</a>
        </li>
        <li>
          <a href="../">Contact</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://builtwithbootstrap.com/" target="_blank">Cart</a></li>
        
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
        @endif
      </ul>
    </div>
  </div>
</div>

<div class="splash">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- <div><img class="logo" src="assets/img/logo.png"></div> -->
        <h1>Welcome to Langtal</h1>
        <a class="btn btn-primary" href="{{ url('/register') }}">Register</a>
      </div>
    </div>
  </div>
</div>