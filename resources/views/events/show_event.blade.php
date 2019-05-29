@extends('layouts.master')

@section('title')Event @endsection

@section('content')

<div class="container ">
    <div class="row">               

            @include('partials._caroussel')                

                            

    </div><!-- <div class="row"> -->           
</div><!-- <div class="container mt-5"> -->


<div class="container pt-3">
    <!-- Example row of columns -->
    <div class="row">   
      <div class="col-md-9">
        <div class="container">
            <h1 class="h1 text-center"> {{ $event['title'] }} </h1>
        </div>
      </div>
    </div> 
     
    <div class="row">   
        <div class="col-md-9">
          
          <div class="container">            
      
              <div class="py-auto text-center">
                  <img src="{{ $event['image_path'] }}" alt="{{ $event['title'] }}" style="max-width:100%;">
              </div>
              
              <div class="mt-4 py-1">
                  <p class="h4 text-center">
                      <i class="fas fa-calendar-alt"></i>
                      {{ Carbon\Carbon::parse($event['date'])->format('d-m-Y ') }}  

                      <i class="fas fa-clock ml-2"></i>  
                      {{ $event['time'] }}
                  </p>             
          
                  <p class="h4 text-center mt-2 py-2"><i class="fas fa-map-marker-alt"></i> {{ $event['location'] }}</p>                  
                              
                  <div class="h4 text-justify">
                      {!! $event['body'] !!}
                  </div>
                  
              </div>           
          </div>




      </div>

        
            @include('partials._recentBlogs_main')        
      </div>

        
    
  <hr>

</div> <!-- <div class="container mt-3"> -->

@include('partials._footer')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
        
@endsection