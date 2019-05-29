@extends('layouts.dashboard')

@section('title') Create blog @endsection

@section('dashboard_title') Create a new Blog @endsection

@section('dashboard_content')

<div class="container">
  <form action="{{ route('store_blog') }}" method='POST'>
      {{ csrf_field() }}


      <div class="form-group">
            <label for="author">Author</label>
            <select class="form-control" id='author' name='author' required>
                <option></option>
            @foreach($bios as $bio)                
                <option value="{{ $bio['id'] }}"> {{ $bio['name'] }}</option>                
            @endforeach            
            </select>
            @if ($errors->has('author'))
                <span class="help-block">
                    <strong>{{ $errors->first('author') }}</strong>
                </span>
            @endif
        </div> 
        

        <div class="form-group">
          <label for="title">Blog title</label>
          <input type="text" class="form-control" id="title" placeholder="Title of the blog" name='title'  required value="{{ old('title') }}">
          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group">
            <label for="theme">Theme</label>
            <select class="form-control" id='theme' name='theme' required>
                    <option></option>
                @foreach($themes as $theme)                    
                    <option> {{ $theme['theme'] }}</option>                 
                @endforeach                
            </select>
            @if ($errors->has('theme'))
                <span class="help-block">
                    <strong>{{ $errors->first('theme') }}</strong>
                </span>
            @endif
        </div>   
        
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id='category' name='category' required>
                <option></option>
            @foreach($categories as $category)                
                <option> {{ $category['category'] }}</option>                
            @endforeach            
            </select>
            @if ($errors->has('category'))
                <span class="help-block">
                    <strong>{{ $errors->first('category') }}</strong>
                </span>
            @endif
        </div>  


        <div class="form-group">
            <label for="tags">Tags</label>          
            <select class="form-control select2-multi" name='tags[]' id='tags' required multiple="multiple">
                @foreach($tags as $tag)
                    <option value={{$tag['id']}} >{{$tag['tag']}}</option>
                @endforeach
            </select>
            @if ($errors->has('tags'))
              <span class="help-block">
                  <strong>{{ $errors->first('tags') }}</strong>
              </span>
          @endif
        </div>            

        <div class="form-group">
          <label for="body">Body of the blog</label>
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
                    <strong>{{ $errors->first('publish') }}</strong>
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
@endsection


@section('dashboard_css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        
@endsection
