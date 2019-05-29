<div class="col-md-3">
    <div>
    <ul class="list-group" >
        <li class="list-group-item bg-info">
          <h2 class="h5 text-white text-center">Older Posts</h2></li>
        <?php $count=1 ?>
        @foreach($master_blogs as $blog)          
          @if($count >=7)        
              <li class="list-group-item bg-secondary">
                <a class ="text-white" 
                title="{{ $blog['title'] }}"
                href="{{ route('show_blog', $blog['id']) }}">

                @if(strlen($blog['title'])>50)
                  {{ substr($blog['title'], 0, 50) }} ...
                @else
                  {{ $blog['title'] }}
                @endif

                </a>
              </li>        
          @endif       
          <?php $count++ ?>
        @endforeach
        
        <li class="list-group-item bg-info">
            <a class ="text-white"         
            href="{{ route("show_all_blogs") }}"> Browse all <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
          </li> 
    </ul>
  </div>
  
  <div class="mt-2">
      <ul class="list-group">
          <li class="list-group-item bg-info">
            <h2 class="text-white h5 text-center">Blog Themes</h2></li>          
          @foreach($themes as $theme)

          <li class="list-group-item bg-secondary">
            <a class ="text-white" title="{{ $theme['theme'] }}"         
            href="{{ route("show_by" , $theme['id']) }}">
            @if(strlen($theme['theme'])>50)
                  {{ substr($theme['theme'], 0, 50) }} ...
            @else
              {{ $theme['theme'] }}
            @endif
          </li> 
            
          @endforeach         
          <li class="list-group-item bg-info">
            <a class ="text-white"         
            href="{{ route("show_all_blogs") }}"> Browse all <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
          </li> 
      </ul>
    </div>   
    

    <div class="card mt-2">
      <div class="card-header text-white h5 text-center bg-info">
        Tags
      </div>
      <div class="card-body">
        @foreach($tags as $tag)
          <a href="{{ route('show_by_tag', $tag['id']) }}" class="text-info">{{$tag['tag']}}</a>
        @endforeach
        
      </div>
    </div> 

  </div>



  

