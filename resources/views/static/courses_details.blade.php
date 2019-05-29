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

        <h1> Details about courses </h1>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, quis numquam totam aliquid eaque odio deserunt suscipit optio, veniam nam provident atque similique unde, deleniti blanditiis. Sit, nihil, eligendi iure temporibus eum debitis maxime, sequi minus consequatur exercitationem provident error inventore repellendus modi quidem officiis quasi rem ipsam vitae et consequuntur quod! Neque adipisci incidunt facilis. Quam voluptate, earum ipsum magnam dolores est. Minus laudantium facilis esse quidem accusantium nam, ullam harum adipisci, fugiat nulla pariatur laborum, nemo hic nesciunt libero dignissimos magni! Temporibus odio assumenda accusantium ipsam, libero earum obcaecati at ullam eligendi sed repellat explicabo ducimus voluptas commodi!
        
          
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