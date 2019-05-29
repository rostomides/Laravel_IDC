@extends('layouts.master')

@section('title') blog title @endsection

@section('content')

<div class="container">
    <div class="row">
            @include('partials._caroussel')  
    </div><!-- <div class="row"> -->           
</div><!-- <div class="container mt-5"> -->

<div class="container pt-3"> 

    <div class="row">   
      <div class="col-md-9">
        <h1 class="text-center">Upcoming events</h1>
        <hr>
      </div>

      <?php $upcoming=0?>
      <div class="col-md-9">
        @foreach($events as $event)
            @if(time() - strtotime($event['date'])<= 0) 
            <?php $upcoming++?>     
          
            <div class="container">        
                    <h1 class="h1 text-center"> {{ $event['title'] }} </h1>
            
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
            @endif 
        @endforeach

        @if($upcoming==0)
            <div class="container" style="min-height:50%">
                <h2> There are no upcoming events. Please visit our site later to be informed about our future events </h2> 
            </div>
        @endif

        <hr>

        <h2 class="text-center">List of past events</h2>
        

        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>                       
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>                        
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
            @if(time() - strtotime($event['date'])> 0) 
                <tr>                
                <td><a href="{{ route('show_event', $event['id']) }}">{{ $event['title'] }}</a></td>
                <td>{{ $event['date'] }} </td>
                <td>{{ $event['time'] }}</td>
                <td>{{ $event['location'] }}</td>
            @endif 
            @endforeach   
            </tbody>
        </table>
        </div>      
    </div> 

        @include('partials._recentBlogs_main')
        
    </div>
  

</div> <!-- <div class="container mt-3"> -->

@include('partials._footer')

@endsection



@section('javascript')

@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
        
@endsection