@extends('layouts.master')

@section('title') Welcome @endsection

@section('content')   

    
    <div class="container mt-3">           

        <div class="row">
                @include('partials._caroussel') 
        </div><!-- <div class="row"> -->           
    </div><!-- <div class="container mt-5"> -->

    
    <div class="container mb-4 mt-4">
        <div class="row container">
            <div class="text-center">
                <p class="h1">Recent posts</p>
            </div>
        </div>
        <!-- Example row of columns -->
        <div class="row">
            @include('partials._blogList')  
    
            @include('partials._recentBlogs_main')          
        
        </div>  
    </div>

    <div class="jumbotron pimage1">
        <div class="ptext text-center h4">
            <p class="text-info"></p>          
        </div>
    </div>    

    <div class="container mb-4 mt-4">
        <div class="row">
            @include('partials._event_list')
            @include("partials._other_events") 
        </div>
    </div> 


    <div class="jumbotron pimage2">
        <div class="ptext">
            <span class="p-border">
                Ressources
            </span>
        </div>
    </div> 
    

    <div class="container mb-4 mt-4">        
        <div class="row">
            @include('partials._ressources')                      
                    
        </div> 

    </div> <!-- <div class="container mt-3"> -->
    
    <div class="jumbotron pimage3">
        <div class="ptext">
            <span class="p-border">
                Mosque
            </span>
        </div>
    </div> 
    

    <div class="mb-4 mt-4">
        
            @include('partials._mosque')  
         
    </div> <!-- <div class="container mt-3"> -->
            

    <div class="jumbotron pimage4">
            <div class="ptext">
                <span class="p-border">
                   Contact us
                </span>
            </div>
        </div> 
        
    
        <div class="container mb-4 mt-4">
            
        <div class="jumbotron bg-info text-white text-center h5">
            If you have any question please feel free to send it to Dr Shabir Ally using the form below.
        </div>

    
        </div> <!-- <div class="container mt-3"> -->  
            
            



        <div class="container">
            <form>            
                <div class="form-group">
                    <label for="inputAddress">Please enter you Email</label>
                    <input type="email" class="form-control" id="inputAddress" placeholder="xxx@xxxxx.xxx"
                    name="emailQuestion">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Subject of the question</label>
                    <input type="text" class="form-control" name="subjectQuestion">
                </div>
                
                <div class="form-group">
                    <textarea name="bodyQuestion" style="width:100%" rows="20"></textarea>
                </div>
                <button class="btn btn-outline-primary btn-block ml-1 my-2 my-sm-0" type="submit">Search</button>
            </form>

        </div>


        

        
        @include('partials._footer')

@endsection   

   
@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection


@section('javascript')

@endsection
