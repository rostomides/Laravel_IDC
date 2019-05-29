@extends('layouts.dashboard')

@section('title') Manage celebrations @endsection

@section('dashboard_title') Manage celebrations @endsection

@section('dashboard_content')

<h2>List of available Events</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>          
          <th>Title</th>
          <th>to publish from</th>
          <th>to publish to</th>          
          <th>Last updated</th>
        </tr>
      </thead>
      <tbody>
        @foreach($celebrations as $celeb)
          <tr>
            <td>{{ $celeb['id'] }}</td>
            <td><a href="{{ route('show_celebration', $celeb['id']) }}">{{ $celeb['title'] }}</a></td>
            <td>{{ Carbon\Carbon::parse($celeb['publish_start'])->format('d-m-Y') }} </td>

            <td>{{ Carbon\Carbon::parse($celeb['publish_end'])->format('d-m-Y') }}</td> 

            <td>{{ Carbon\Carbon::parse($celeb['updated_at'])->format('d-m-Y \a\t h:i A') }}</td>
            
            <td>                     
              <a href="{{ route('edit_celebration', $celeb['id']) }}" title="Click to edit">
                <i class="far fa-edit"></i>
              </a>


              <a href="#" onClick="document.getElementById('deleteCeleb{{ $celeb['id'] }}').submit();" title="Click to delete">
                <i class="far fa-trash-alt"></i>
              </a>
              <form action="{{ route('delete_celebration', $celeb['id']) }}" method="POST" id="deleteCeleb{{ $celeb['id'] }}">
                @csrf
                {{ method_field('DELETE') }}                
              </form>             

        @endforeach
      </tbody>
    </table>
  </div>


  <div class="container">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <a class="btn btn-info btn-lg btn-block text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                  
                        Add a new Celebration message <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                <form method="POST" action="{{ route('store_celebration') }}"> 
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="publish_start">Publish from</label>
                        <input type="date" class="form-control" id="publish_start"
                        name='publish_start' 
                        value="{{ old('publish_start') }}" required  onchange="TestDates();">
                        @if ($errors->has('publish_start'))
                            <span class="help-block">
                                <strong>{{ $errors->first('publish_start') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="publish_end">Publish to</label>
                        <input type="date" class="form-control" id="publish_end"
                        name='publish_end' 
                        value="{{ old('publish_end') }}" required  onchange="TestDates();">
                        @if ($errors->has('publish_end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('publish_end') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="body">Message</label>
                        <textarea class="form-control" id="body" name='body' rows="20"></textarea>
                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="image_path" >
                        @if ($errors->has('image_path'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image_path') }}</strong>
                            </span>
                        @endif
        
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('javascript')

  @include('partials._tinymce')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

    
    <script>
        //   Testing the date input
        function TestDates(){
            var start= new Date(document.getElementById("publish_start").value);
            var end= new Date(document.getElementById("publish_end").value);
            if (end < start){
                alert("Start date cannot be anterior to the end date ");
                document.getElementById("publish_start").value = "";
                document.getElementById("publish_end").value = "";
            }
        }                                                      
    
    </script>
    
    
    </script>





@endsection


@section('dashboard_css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        
@endsection






