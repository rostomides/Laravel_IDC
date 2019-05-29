@extends('layouts.master')

@section('title') Courses @endsection

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

        <h1> LET THE QURAN SPEAK </h1>
        
        <p class="text-justify">
          For many years, we operated a radio broadcast for the primary purpose of presenting the message of Islam. Then, in the year 2001, we embarked on a television broadcast called “Let the Quran Speak,” which has been airing since then in Canada. To consolidate our funds, we decided to put the radio broadcast on hold and concentrate on the TV show.

 

            The TV show is an essential part of our Dawah, and a major advance from our humble beginnings. We began by distributing leaflets on busy street corners, then we graduated to radio, and finally, to television. However, we need to continue with and expand all of these aspects of our work; the street dawah, the radio program, and the TV program.
            
             
            
            Over 5,000 viewers tune in weekly to watch our television broadcast “Let the Quran Speak.” We offer a free copy of the Quran to our viewers if they would only request it; and each month we get over 45 such requests from our non-Muslim viewers. We have set up a YouTube channel allowing viewers to see past episodes of the TV show, and every month the channel gets over 13,000 views. In addition to that, our website attracts an average of 800 new visitors every month.
          </p>
        
          <div class="container mt-5 text-center">
              <p class="h4">
                  <a href="http://www.quranspeaks.com/" class="text-info">Link to the website <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
              </p>
          </div> 
          <div class="container text-center">
              <p class="h4">
                  <a href="https://www.youtube.com/user/QuranSpeaks" class="text-info">Link to the youtube channel <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
              </p>
          </div> 
          
      </div>  


    @include('partials._recentBlogs')     
    </div>
    <hr>

    
</div> <!-- <div class="container mt-3"> -->


@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection