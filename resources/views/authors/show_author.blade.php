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
                @if($bio['image_path']=="")
                    src="{{ url('/img/alt-no-user.png') }}"
                @else
                    src="{{ $bio['image_path'] }}"
                @endif
                alt="{{ $bio['name'] }}" style="max-width:200px;" >
            </div>

            <h1 class="h2 text-center "> {{ $bio['name'] }} </h1>  
           
           
            
            <div class="container py-auto text-justify">
              <p>
                  {!! $bio['body'] !!}
              </p>
            </div>

            <div class="container text-right">
                <p class="h4">
                    <a href="{{ route("search_by_author", $bio['id']) }}" class="text-info">Browse all publications of {{ $bio['name'] }} <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
                </p>
            </div> 






        </div>
        
        
      </div>  


    @include('partials._recentBlogs_main')     
    </div>
    <hr>

</div> <!-- <div class="container mt-3"> -->

@include('partials._footer')

@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection