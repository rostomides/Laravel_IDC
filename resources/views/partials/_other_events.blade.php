<div class="col-md-3 py-auto">
  <div>
    
      <ul class="list-group" style="width:103%;">
          <li class="list-group-item bg-info">
            <h2 class="h5 text-white text-center">Other upcoming Events</h2></li>        
          <?php $count=1 ?>        
          @foreach($events as $event)
          @if(time() - strtotime($event['date'])< 0)          
            @if($count >2)                    
                <li class="list-group-item bg-secondary">
                  <a class ="text-white" 
                  title="{{ $event['title'] }}"
                  href="{{ route('show_event', $event['id']) }}">

                  @if(strlen($event['title'])>50)
                    {{ substr($event['title'], 0, 50) }} ...
                  @else
                    {{ $event['title'] }}
                  @endif

                  </a>
                </li>        
            @endif       
            <?php $count++ ?>
          @endif
          @endforeach               
          
          <li class="list-group-item bg-info">
            <a class ="text-white"         
            href="{{ route("show_all_events") }}"> Browse all <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
          </li> 
      </ul>
      
  </div>
  
  <div class="mt-2">
      <ul class="list-group" style="width:103%;">
          <li class="list-group-item bg-info">
            <h2 class="text-white h5 text-center">Past events</h2></li>          
          @foreach($events as $event)
          @if(time() - strtotime($event['date'])> 0)
            <li class="list-group-item bg-secondary">
              <a class ="text-white" title="{{ $event['title'] }}"         
              href="{{ route("show_event" , $event['id']) }}">
              @if(strlen($event['title'])>50)
                    {{ substr($event['title'], 0, 50) }} ...
              @else
                {{ $event['title'] }}
              @endif
            </li> 
          @endif
          @endforeach         
            <li class="list-group-item bg-info">
              <a class ="text-white"         
              href="{{ route("show_all_events") }}"> Browse all <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
            </li> 
          
      </ul>
    </div>   
    

        

  </div>



  

