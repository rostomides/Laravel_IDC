
<div class="col-md-9 py-auto">   
    <div class="row no-gutter pl-3 text-justify">
        <?php $count=1?>

        <?php $upcoming=0?>

        @if(isset($celebrations))
            @foreach($celebrations as $celeb)
            <?php $upcoming++?>

            <div class="container">        
                <h1 class="h1 text-center"> {{ $celeb['title'] }} </h1>
        
                <div class="py-auto text-center">
                    <img src="{{ $celeb['image_path'] }}" alt="{{ $celeb['title'] }}" style="max-width:100%;">
                </div>
                
                <div class="mt-4 py-1">             
                                
                    <div class="h4">
                        {!! $celeb['body'] !!}
                    </div>
                    
                </div>           
            </div>
            @endforeach
        @endif


        @foreach($events as $event)
            @if(time() - strtotime($event['date'])< 0)
            <?php $upcoming++?>
            <div class="container">        
                <h1 class="h1 text-center"> 
                    <a class="text-info" href="{{ route('show_event', $event['id']) }}">{{ $event['title'] }} 
                    </a>
                </h1>
       
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
                                
                    <div class="h5">
                        {!! $event['body'] !!} <a class="text-info" href="{{ route('show_event', $event['id']) }}">Read more <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
                    </div>
                    
                </div>           
            </div>
            @endif

            @if($count>2)
                @break
            @endif

            <?php $count++?>
        @endforeach

        @if($upcoming==0)
        <div class="container text-center" style="min-height:80%">

            <div class="py-auto text-center">
                <img src="{{ url('/img/no_event.jpg') }}" alt="no current event" style="max-width:600px;">
            </div>


            <p class="h4 text-center mt-5"> Our television broadcast occurs weekly. Please check our last videos.<br> 
                <a href="https://www.youtube.com/user/QuranSpeaks" class="text-info">Take me there<i class="fas fa-arrow-alt-circle-right ml-3"></i></a> 
            </p> 
        </div>
        @endif
    </div>

    <div class="container text-right mt-5">
        <p class="h4">
            <a href="{{ route("show_all_events") }}" class="text-info">Browse all Events <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
        </p>
    </div> 
    
  </div>  