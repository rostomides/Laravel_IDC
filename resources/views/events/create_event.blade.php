@extends('layouts.dashboard')

@section('title') Create event @endsection

@section('dashboard_title') Create a new Event @endsection

@section('dashboard_content')

<div class="container">
  <form action="{{ route('store_event') }}" method='POST'>
      {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Event title</label>
          <input type="text" class="form-control" id="title" placeholder="Title of the event" name='title' required value="{{ old('title') }}">
          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" value="" name='date'  required value="{{ old('date') }}" onchange="TestDates();">

            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" value="" name='time' required value="{{ old('time') }}" >
            @if ($errors->has('time'))
                <span class="help-block">
                    <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" placeholder="Specify a location" name='location' required value="{{ old('location') }}">
            @if ($errors->has('location'))
                <span class="help-block">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
          <label for="body">Event description</label>
          <textarea class="form-control" id="body" name='body' rows="20"></textarea>
          @if ($errors->has('body'))
              <span class="help-block">
                  <strong>{{ $errors->first('body') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group">
            <label class="radio-inline mr-5">
              <input type="radio" name="publish" value="0" checked>Don't publish yet
            </label>
            
            <label class="radio-inline ml-5">
              <input type="radio" name="publish" value="1">Publish</label>
              @if ($errors->has('publish'))
                <span class="help-block">
                    <strong>{{ $errors->first('publish') }}</strong>
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
            <input type="submit" class="form-control" value='submit'>        
        </div>

      </form>
  </div>
</div>

@endsection


@section('javascript')

  @include('partials._tinymce')
  <script src="{{ asset('js/select2.min.js')}}"></script>

  <script>
      $(".select2-multi").select2();
  </script>

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

    
    <script>
        //   Testing the date input
        function TestDates(){
            var date= new Date(document.getElementById("date").value);
            if (date< new Date()){
                alert("The date cannot be anterior to today's date");
                document.getElementById("date").value = "";
            }
        }                                                      
    
    </script>
    
    
    </script>





@endsection


@section('dashboard_css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        
@endsection
