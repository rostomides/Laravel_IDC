@extends('layouts.master')

@section('title') blog title @endsection

@section('content')

<div class="container mt-5">
    <div class="row">
            @include('partials._caroussel')  
    </div><!-- <div class="row"> -->           
</div><!-- <div class="container mt-5"> -->

    <div class="container pt-3"> 
        <!--Search bar -->
        <div class="row">  
            <div class="col-md-9">
                <hr>
                <nav class="navbar justify-content-between">
                    <a class="navbar-brand">Search</a>
                    
                    <form method="GET" action="{{ route('search_by') }}" class="form-inline my-2 my-lg-0">
                        <select class="form-control" id='theme_seach' name='theme'>
                            <option>Select a theme</option>
                            @foreach($themes as $theme)                
                                <option value="{{ $theme['id'] }}"> {{ $theme['theme'] }}</option>               
                            @endforeach            
                        </select> 

                        
                        <select class="form-control" id='theme_seach' name='category'>
                            <option>Select a category</option>
                            @foreach($categories as $category)                
                                <option value="{{ $category['id'] }}"> {{ $category['category'] }}</option>               
                            @endforeach            
                        </select>                        
                                                
                        <select class="form-control select2-multi" name='tags[]' id='tags' multiple="multiple" style="overflow:scroll;">
                            
                            @foreach($tags as $tag)
                                <option value={{$tag['id']}} >{{$tag['tag']}}</option>
                            @endforeach
                        </select>
                        

                        <div class="form-group ml-1">
                            <label for="from_date" class="mx-1">From</label>
                            <input type="date" class="form-control" id="from_date" name="from_date" value="2018-01-01" onchange="TestDates();"> 
                        </div>

                        <div class="form-group ml-1">
                            <label for="to_date" class="mx-1">To</label>
                            <input type="date" class="form-control" id="to_date" name="to_date" value="{{ date("Y-m-d") }}" onchange="TestDates();"> 
                         
                            
                        </div>

                        <button class="btn btn-outline-success ml-1 my-2 my-sm-0" type="submit">Search</button>
                                                 
                    </form>
                </nav>
              <hr>
            </div>                      
        </div>
    </div>


<div class="container pt-3">
    <!-- Example row of columns -->
    <div class="row">  
        <div class="col-md-9">
          <h3>{{ $type }}: {{ $by }}</h3>
          <hr>
        </div>
    </div>

    <?php
    //Count the number of posts per category    
    $cat = array();
    foreach($categories as $category){
        $cat[$category['id']] = 0;        
    }

    foreach($blogs as $blog){
        if(array_key_exists($blog->category['id'], $cat)){
            $cat[$blog->category['id']] ++;
        }        
    }
    ?>

    <div class="row">   
      <div class="col-md-9">            
        <?php $count = 1; ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            @foreach($categories as $category)         
                <li class="nav-item">
                    @if($count == 1)
                    <a class="nav-link active" id="id-{{ $category['id'] }}-tab" data-toggle="tab" href="#id-{{ $category['id'] }}-content" role="tab" aria-controls="id-{{ $category['id'] }}-content" aria-selected="true">
                        {{ $category['category'] }}
                    
                    <?php $count ++; ?>
                    @else

                    <a class="nav-link" id="id-{{ $category['id'] }}-tab" data-toggle="tab" href="#id-{{ $category['id'] }}-content" role="tab" aria-controls="id-{{ $category['id'] }}-content" aria-selected="true">
                            {{ $category['category'] }}


                    @endif
                    @if($cat[ $category['id']]>0)
                        <span class="badge badge-primary">{{$cat[ $category['id']]}}</span>
                    @else
                        <span class="badge badge-danger">{{$cat[ $category['id']]}}</span>
                    @endif
                </a>
                </li>                
            @endforeach 
        </ul>
        <div class="tab-content" id="myTabContent">
            <?php $count = 1; ?>
            @foreach($categories as $category)
            @if($count == 1)
            <div class="tab-pane fade show active" id="id-{{ $category['id'] }}-content" role="tabpanel" aria-labelledby="id-{{ $category['id'] }}-tab">
            <?php $count ++; ?>
            @else
            <div class="tab-pane fade" id="id-{{ $category['id'] }}-content" role="tabpanel" aria-labelledby="id-{{ $category['id'] }}-tab">
            @endif

            @if($cat[$category['id']] == 0)
                There are no publications associated to "{{ $category['category']}}"
                </div>
            @else
                @foreach($blogs as $blog)
                    @if($blog->category['category'] == $category['category'])
                    <div class="card mb-4 mx-auto">
                            <div class="row no-gutters">
                                <div class="col-sm-4 p-2">
                                    <img class="card-img-left" src="{{ $blog['image_path'] }}" alt="Card image cap" style="max-width:100%; height:auto;" class="img-thumbnail">
                                </div>
                            
                                <div class="col-sm-8">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <a class ="text-info"
                                        href="{{ route('show_blog', $blog['id']) }}">{{ $blog['title'] }}</a>
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
                                        <a class="text-info" href="{{ route('show_blog', $blog['id']) }}">Read More &rarr;</a>
                                    </p>                   
                                </div>
                                </div>              
                            </div>            
                            <div class="card-footer text-white bg-secondary text-center">
                                    <i class="fas fa-calendar-alt"></i> 
                                    {{ Carbon\Carbon::parse($blog['updated_at'])->format('d-m-Y') }}
                                    <i class="fas fa-clock ml-2"></i> 
                                    {{ Carbon\Carbon::parse($blog['updated_at'])->format('h:i A') }} 
                            </div>            
                        </div>
                    @endif
                @endforeach
            </div>
            @endif
            @endforeach                    
        </div>
                
    </div> 

    

        @include('partials._recentBlogs')
        
    </div>
  

</div> <!-- <div class="container mt-3"> -->


@endsection



@section('javascript')
  
  <script src="{{ asset('js/select2.min.js')}}"></script>
  <script>
      $(".select2-multi").select2();
  </script>  
  
  <script> 
        //   Testing the date input
        function TestDates(){
            var from= new Date(document.getElementById("from_date").value);
            var to= new Date(document.getElementById("to_date").value);
            //Test if the from date is higher than the to                                        
            if (from > to){
                alert('The starting date can not be higher than the ending date');
                document.getElementById("from_date").value = "2018-01-01";
                document.getElementById("to_date").value = "{{ date("Y-m-d") }}"
            }

            if(document.getElementById("from_date").value==""){
                document.getElementById("from_date").value = "2018-01-01";
            }
            if(document.getElementById("to_date").value=="" || to > new Date()){
                document.getElementById("to_date").value = "{{ date("Y-m-d") }}"
            }

        }                                                      
    
    </script>




@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
        
@endsection