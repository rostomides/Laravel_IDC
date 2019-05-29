@extends('layouts.master')

@section('content')
    
    <div class="container-fluid pt-5 mt-5">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky pt-5">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>

              @if(Auth()->user()->cheikh == '3')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage_users') }}">
                      <span data-feather="file"></span>
                      Manage Users
                    </a>
                  </li>
              @endif
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Blogs</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span data-feather="plus-circle"></span>
                </a>
              </h6>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_authors') }}">
                  <span data-feather="file"></span>
                  Manage Authors
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_categories') }}">
                  <span data-feather="layers"></span>
                  Manage Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{ route('manage_themes') }}">
                  <span data-feather="bar-chart-2"></span>
                  Manage Themes
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_tags') }}">
                  <span data-feather="file"></span>
                  Manage Tags
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('create_blog') }}">
                  <span data-feather="shopping-cart"></span>
                  Create a new Blog
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_blogs') }}">
                  <span data-feather="users"></span>
                  Manage Blogs
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Events</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('create_event') }}">
                  <span data-feather="file-text"></span>
                  Create new Event
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_events') }}">
                  <span data-feather="file-text"></span>
                  Manage Events
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_celebrations') }}">
                  <span data-feather="file-text"></span>
                  Manage celebration messages
                </a>
              </li>

              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Others</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="plus-circle"></span>
                  </a>
                </h6>
                
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_prayers') }}">
                  <span data-feather="file-text"></span>
                  Manage prayer times
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_ressources') }}">
                  <span data-feather="file-text"></span>
                  Manage ressources
                </a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('manage_donation') }}">
                  <span data-feather="file-text"></span>
                  Update donation
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield("dashboard_title")</h1>

          </div>
            @yield('dashboard_content')

            
        </main>
      </div>
    </div> 
  
@endsection



@section("modal")


@endsection



@section('css')

@yield('dashboard_css')
<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
<style>
  .modal-lg {
    max-width: 70% !important;
    max-height: 70% !important;
  }

  body {
  font-size: .875rem;
}

.feather {
  width: 16px;
  height: 16px;
  vertical-align: text-bottom;
}

/*
 * Sidebar
 */

.sidebar {
  position: fixed !important;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 0;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
}

.sidebar-sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 48px; /* Height of navbar */
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

.sidebar .nav-link {
  font-weight: 500;
  color: #333;
}

.sidebar .nav-link .feather {
  margin-right: 4px;
  color: #999;
}

.sidebar .nav-link.active {
  color: #007bff;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: inherit;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}

/*
 * Utilities
 */

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }
</style>


@endsection
