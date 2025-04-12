
<nav class="navbar navbar-inverse navbar-custom-dark" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if (Auth::check())

          @if(Auth::user()->roles()->first()->id>1)
          <a class="navbar-brand" href="/admin/dash">
          <i class="material-icons">local_airport</i>AwayGames</a>
          @else
          <a class="navbar-brand" href="/dashboard">
          <i class="material-icons">local_airport</i>AwayGames</a>
          @endif
        
      @else
      <a class="navbar-brand" href="/">
        <i class="material-icons">local_airport</i>AwayGames
      </a>
      @endif


    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-top-collapse" id="bs-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-left">

       @if(Auth::check())
       
          @if(Auth::user()->roles()->first()->id>1)
          <li>
          <a href="/admin/dash" class="navbar-brand">
            <i class="material-icons">home</i> Home</a>
          </li>
          @else
          <li>
          <a href="/dashboard" class="navbar-brand">
            <i class="material-icons">home</i> Home</a>
          </li>
          @endif
          
        @else

          <li>
          <a href="/" class="navbar-brand">
            <i class="material-icons">home</i> Home 
          </a>
          </li>
          
        @endif

        <li>
          <a href="/about" >
            <i class="material-icons">supervisor_account</i> About AwayGames
          </a>
        </li>

        <li>
          <a href="/faq">
            <i class="material-icons">question_answer</i> FAQs 
          </a>
         
        </li>

        <li>
          <a href="/contact">
            <i class="material-icons">contact_mail</i> Contact Us 
          </a>
          
        </li>


      </ul>

      <ul class="nav navbar-nav navbar-right">

      @if (Auth::check())

        <li class="navbar-brand">Welcome {{ Auth::user()->firstname }} </li>

        <li class="navbar-btn-container">
          <a href="{{ route('logout') }}" type="button" class="btn btn-primary navbar-btn">
            <i class="material-icons">supervisor_account</i>
            Logout
          </a>
        </li>
        

        @else
        <li class="navbar-btn-container">
          <a href="{{ route('login') }}" type="button" class="btn btn-primary navbar-btn">
            <i class="material-icons">supervisor_account</i>
            Sign In
          </a>
        </li>

        @endif
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- container -->
</nav>

