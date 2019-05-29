@extends('layouts.master')

@section('title') Jumuaa prayer @endsection

@section('content')

<div class="container mt-3">
    <div class="row">               

            @include('partials._caroussel')     

    </div><!-- <div class="row"> -->           
</div><!-- <div class="container mt-5"> -->



<div class="container pt-5">
    <!-- Example row of columns -->
    <div class="row">   
      <div class="col-md-9">

        <p class="text-center h1"> Jumuaa Prayer</p>
        <br><br>
        <p class="text-justify h4">
            We hold weekly gatherings on Fridays, generally at 1:00 p.m. during the winter months and at 1:30 p.m. during the summer months. The sermon lasts for approximately 30 minutes, followed by the congregational prayers lasting for a few minutes.

            <br><br><br>

            Our sermons are delivered by a roster of speakers including Dr. Shabir Ally. Some of our sermons are live-streamed on Facebook and recorded for later viewing on the internet.           

        </p>
        
          
      </div>  


      @include('partials._recentBlogs')     
    </div>
    <hr>

</div> <!-- <div class="container mt-3"> -->


@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection