
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    


    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    @yield('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">  
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

       
    
   
    


  </head>

  <body>

    @include('partials._navbar')

    
    <main role="main">
            
            @yield('content')

    </main>

    
    @yield('modal')


    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.carousel').carousel({
            interval: 3000
        })    
    </script>

    @yield('javascript')

    </body>
</html>