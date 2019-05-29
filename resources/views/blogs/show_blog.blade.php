@extends('layouts.master')

@section('title') blog title @endsection

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

        <nav aria-label="breadcrumb bg-white">
          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a  
              href="{{ route('search_by_category', $blog->category->id) }}" title="{{ $blog['category']->category }}">
              @if(strlen($blog['category']->category)>30)
                  {{substr($blog['category']->category , 0, 30)}}...
              @else 
                  {{ $blog['category']->category }}
              @endif
            </a></li>            

            <li class="breadcrumb-item"><a href="{{ route('show_by', $blog->theme->id) }}" title="{{ $blog['theme']->theme }}">
            @if(strlen($blog['theme']->theme)>30)
                {{substr($blog['theme']->theme , 0, 30)}}...
            @else 
                {{ $blog['theme']->theme }}
            @endif
            </a>

            <li class="breadcrumb-item active" aria-current="page">

                @if(strlen($blog['title'])>60)
                    {{substr($blog['title'] , 0, 60)}}...
                @else 
                    {{ $blog['title'] }}
                @endif

            </li>
          </ol>
        </nav>


        <div class="container mt-5">
          <h1 class="text-center"> {{ $blog['title'] }} </h1>          
          
          <div class="text-center mt-2 mb-4">
            <i class="fas fa-tags"></i>
            @foreach($blog->tags as $tg)
            <a href="{{route('show_by_tag', $tg->id)}}">
                <span class="badge badge-dark">{{ $tg->tag}}</span></a>
            @endforeach
          </div>

          <div class="text-center mt-2 mb-2">

            <p class="h4"> 
              Author: <a href="{{ route('show_author', $blog->biog['id']) }}" style="text-decoration:none;" class="text-info">{{ $blog->biog['name']}}</a></p>

             
          </div>
          
          
          <div class="container py-2 text-center">
              <img src="{{ $blog['image_path'] }}" alt="{{ $blog['title'] }}" style="max-width:100%;">
          </div>
         
          <div class="text-justify h4">
            <p>
                {!! $blog['body'] !!}
            </p>
          </div>

        </div>    


        <div class="container mt-5">
          <nav aria-label="">
              <ul class="pagination">
                @if($previous != "None")
                  <li class="page-item">
                @else
                  <li class="page-item disabled">
                @endif
                    <a class="page-link" href="{{ route('show_blog', $previous) }}" tabindex="-1">Previous</a>
                </li>

                <li class="page-item"><a class="page-link" 
                  href="{{ route('show_all_blogs') }}">Back to all posts</a>
                </li>
                

                @if($following != "None")
                  <li class="page-item">
                @else
                  <li class="page-item disabled">
                @endif
                  <a class="page-link" href="{{ route('show_blog', $following) }}">Next</a>
                </li>
              </ul>
            </nav>
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