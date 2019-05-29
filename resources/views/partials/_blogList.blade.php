
<div class="col-md-9 py-auto">   
  <div class="row no-gutter pl-3">
      <?php $count = 1?>
      @foreach($master_blogs as $blog)          
        @if($count >=4)
        <div class="card mb-4 mx-auto">
            <div class="row no-gutters">
                <div class="col-sm-4 p-2">
                    <img class="card-img-left" src="{{ $blog['image_path'] }}" alt="Card image cap" style="max-width:100%; height:auto;" class="img-thumbnail">
                </div>
            
                <div class="col-sm-8">
                <div class="card-body">
                    <h2 class="card-title">
                        <a class ="text-info"
                        href="{{ route('show_blog', $blog['id']) }}"
                        title=" {{ $blog['title'] }} ">

                        @if(strlen($blog['title'])>30)
                            {{ substr($blog['title']  , 0,30) }}... 
                        @else
                            {{ $blog['title'] }}
                        @endif
                    
                    
                    </a>
                    </h2>
                    <p><i class="fas fa-tags"></i>
                        @foreach($blog->tags as $tg)
                            <a href="{{route('show_by_tag', $tg->id)}}">
                                <span class="badge badge-dark">{{ $tg->tag}}</span></a>
                        @endforeach 
                    </p>
                    <p class="card-text text-justify">
                    
                    @if(strlen($blog['body'])>147)
                        {!! substr($blog['body'] , 3, 150) !!}...
                    @else 
                        {!! $blog['body'] !!}
                    @endif  
                        <a class="text-info" href="{{ route('show_blog', $blog['id']) }}">Read More<i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
                    </p>                   
                </div>
                </div>              
            </div>            
            <div class="card-footer text-white bg-secondary text-center">
                    <i class="fas fa-calendar-alt"></i> 
                    {{ Carbon\Carbon::parse($blog['updated_at'])->format('d-m-Y') }}
                    <i class="fas fa-clock ml-2"></i> 
                    {{ Carbon\Carbon::parse($blog['updated_at'])->format('h:i A') }}

                    <a href="{{ route('show_author', $blog->biog->id) }}"
                        style="text-decoration: none;" class="text-white">
                        <i class="fas fa-user-circle ml-2"></i>
                        {{$blog->biog->name}}
                    </a>
            </div>            
        </div>
        @endif
    
        @if($count>=6)
          @break
        @endif
        
        <?php $count ++ ?>
      @endforeach     
  </div>

    <div class="container text-right">
        <p class="h4">
            <a href="{{ route("show_all_blogs") }}" class="text-info">Browse all blogs <i class="fas fa-arrow-alt-circle-right ml-3"></i></a>
        </p>
    </div> 
  
</div>  

        
      

