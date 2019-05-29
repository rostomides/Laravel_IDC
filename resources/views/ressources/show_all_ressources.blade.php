@extends('layouts.master')

@section('title') blog title @endsection

@section('content')

<div class="container mt-5">
    <div class="row">               

            @include('partials._caroussel')                

                            

    </div><!-- <div class="row"> -->           
</div><!-- <div class="container mt-5"> -->


<div class="container pt-3">
    <!-- Example row of columns -->
    <div class="row">   
      <div class="col-md-9">
        <div class="container">

             
        @if(isset($ressources))
        @foreach($ressources as $ressource)
            
            <div class="container py-5 text-center">
                <img 
                @if($ressource['image_path']=="")
                    src="{{ url('img/ressource_alt.jpg') }}"
                @else
                    src="{{ $ressource['image_path'] }}"
                @endif
                alt="{{ $ressource['title'] }}" style="max-width:400px;" >
            </div>

            <p class="h2 text-center "><a href="{{ route('show_ressource', $ressource['id']) }}">{{ $ressource['title'] }}</a></p>
            <h1 class="h2 text-center "> 
                <a href="{{ $ressource['file_path'] }}"><i class="fas fa-download"></i></a>
            </h1>             
           
           
            
            <div class="text-justify h4">
              <p>
                  {!! $ressource['body'] !!}
              </p>  
            </div>  
            <hr>
        @endforeach
        @endif

        </div>      
        
      </div>  


    @include('partials._recentBlogs')     
    </div>
    

</div> <!-- <div class="container mt-3"> -->

@include('partials._footer')

@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection