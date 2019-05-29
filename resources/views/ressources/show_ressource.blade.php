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
            
            <div class="container py-5 text-center">
                <img 
                @if($ressource['image_path']=="")
                    src="{{ url('/img/ressource_alt.png') }}"
                @else
                    src="{{ $ressource['image_path'] }}"
                @endif
                alt="{{ $ressource['title'] }}" style="max-width:400px;" >
            </div>

            <h1 class="h2 text-center "> {{ $ressource['title'] }} </h1> 
            <h1 class="h2 text-center "> 
                <a href="{{ $ressource['file_path'] }}"><i class="fas fa-download"></i></a>
            </h1> 
           
           
            
            <div class="container py-auto text-justify h4">
              <p>
                  {!! $ressource['body'] !!}
              </p>

              <div class="container text-right">
                <p class="h4">
                    <a href="{{ route("show_all_ressources") }}" class="text-info">Browse all ressources <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
                </p>
            </div> 

              
            </div>
        </div>
      </div>  


    @include('partials._recentBlogs')     
    </div>
    <hr>

</div> <!-- <div class="container mt-3"> -->

@include('partials._footer')

@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection