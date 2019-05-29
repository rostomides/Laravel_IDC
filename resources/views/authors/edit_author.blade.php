@extends('layouts.dashboard')

@section('dashboard_content')
<div class="container">
        
        <h2>List of available authors</h2>
        <div class="table-responsive  mb-5">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>          
                <th>Name</th>
                <th>Email</th>                
                <th>Creation date</th>                        
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if(isset($bios))
              @foreach($bios as $biog)
                <tr>
                  <td>{{ $biog['id'] }}</td>
                  <td>{{ $biog['name'] }}</td>
                  <td>{{ $biog['email'] }} </td>
                  <td>{{ Carbon\Carbon::parse($bio['created_at'])->format('d-m-Y \a\t h:i A') }}</td>
                  
                  <td>
                      
                    <a href="{{ route('edit_author', $biog['id']) }}" title="Click to edit">
                        <i class="far fa-edit"></i>
                    </a>



                    <a href="#" onClick="document.getElementById('deleteAuthor{{ $biog['id'] }}').submit();" title="Click to delete">
                      <i class="far fa-trash-alt"></i>
                    </a>
                    <form 
                    action="{{route('delete_author', $biog['id']) }}"  method="POST" id="deleteAuthor{{ $biog['id'] }}">
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
                            Add a new author <i class="fas fa-arrow-alt-circle-right"></i>
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">

                    <form method="POST" action="{{ route('update_author', $bio['id']) }}"> 
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $bio['name'] }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="body">Biography</label>
                            <textarea class="form-control" id="body" name='body' rows="20">
                                {{ $bio['body'] }}
                            </textarea>
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
                            <input id="thumbnail" class="form-control" type="text" name="image_path" 
                            value={{ $bio['image_path'] }}>
                            @if ($errors->has('image_path'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                </span>
                            @endif
            
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">


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
        $('#lfm').filemanager('image');
    </script>
@endsection