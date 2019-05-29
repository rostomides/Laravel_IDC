<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info" style="font-size:1.5rem !important; font-family: 'Raleway', sans-serif !important;">
    <a class="navbar-brand" href="#" title="The Islamic Information & Dawah Centre International">
        
        <img src="../img/Logo.jpg" width="auto" height="50" alt="IIDCI">      
    
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('show_all_blogs') }}">Blogs</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('show_all_events') }}">Events</a>
          </li>        

      @if(!Auth::check())
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Administration</a>
          </li>
      @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Welcome {{ Auth::user()->name }} <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
              <a class="dropdown-item" href="#" onClick="document.getElementById('logout-form').submit();">Logout</a>  
              <form method="POST" id="logout-form" action="{{ route('logout') }}">
                  @csrf                               
              </form>               
              </div>           
          </li>
      @endif 
      
      <li class="nav-item">
            <a class="nav-link" href="{{ route('donation') }}">Donate</a>
        </li>

      </ul>
    </div>         
      
  </nav>