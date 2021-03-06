@extends('layouts.dashboard')

@section('dashboard_content')
<div class="container">
        
        <h2>List of downloadable items</h2>
        <div class="table-responsive  mb-5">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>          
                <th>title</th>                                
                <th>Creation date</th> 
              </tr>
            </thead>
            <tbody>
              @if(isset($ressources))
              @foreach($ressources as $res)
                <tr>
                  <td>{{ $res['id'] }}</td>
                  <td><a href="{{ route('show_ressource', $res['id']) }}">{{ $res['title'] }}</td>                  
                  <td>{{ Carbon\Carbon::parse($res['created_at'])->format('d-m-Y \a\t h:i A') }}</td>
                  
                  <td>
                      
                    <a href="{{ route('edit_ressource', $res['id']) }}" title="Click to edit">
                        <i class="far fa-edit"></i>
                    </a>


                    <a href="#" onClick="document.getElementById('deleteRessource{{ $res['id'] }}').submit();" title="Click to delete">
                      <i class="far fa-trash-alt"></i>
                    </a>
                    <form 
                    action="{{route('delete_ressource', $res['id']) }}"  method="POST" id="deleteRessource{{ $res['id'] }}">
                      @csrf
                      {{ method_field('DELETE') }}                
                    </form>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>

        
        <div class="container">

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <a class="btn btn-info btn-lg btn-block text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                  
                            Update a Ressource <i class="fas fa-arrow-alt-circle-right"></i>
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                    <form method="POST" action="{{ route('update_ressource', $ressource['id']) }}"> 
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $ressource['title'] }}" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea class="form-control" id="body" name='body' rows="20">
                                {{ $ressource['body'] }}
                            </textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm-img" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose image
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="image_path" 
                            value="{{ $ressource['image_path'] }}">
                            @if ($errors->has('image_path'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                </span>
                            @endif
            
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">



                        <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm-file" data-input="file" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose a file
                                    </a>
                                </span>
                                <input id="file" class="form-control" type="text" name="file_path" 
                                value="{{ $ressource['file_path'] }}">
                                @if ($errors->has('file_path'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file_path') }}</strong>
                                    </span>
                                @endif
                
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
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
        $('#lfm-img').filemanager('image');
        $('#lfm-file').filemanager('file');
    </script>
@endsection