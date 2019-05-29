<div class="col-md-12 pt-4 mt-5 container">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
      </ol>      
      <div class="carousel-inner" style="width:100%; height:400px !important;">
        <?php $count  = 1 ?> 

        @foreach($master_blogs as $blog)
          @if($count == 1)
            <div class="carousel-item active">
            
          @else
            <div class="carousel-item">
            
          @endif
            <a href="{{ route('show_blog', $blog['id'])}}"><img class="d-block w-100" alt="{{ $blog['title'] }}" src="{{ $blog['image_path'] }}" data-holder-rendered="true" height="400px" ></a>
            <div class="carousel-caption d-none d-md-inline">
              
            <a href="{{ route('show_blog', $blog['id'])}}" class="text-white" style="text-decoration: none;">
              <h5 class="display-3 text-white text-weight-bold">
                  {{ $blog['title'] }}
              </h5>            
            </a>
            <p class=" h5 text-white text-weight-bold">
                by 
                <a href="{{ route('show_author', $blog->biog->id) }}"
                    style="text-decoration: none;" class="text-white">                    
                    {{$blog->biog->name}}
                </a>
            </p>    
                          
            </div>
          </div>

          @if($count==3)
            @break
          @endif

          <?php $count++ ?>
        @endforeach        
        
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
</div>