@extends('layouts.dashboard')

@section('title') Edit tag @endsection

@section('dashboard_title') Edit Tag @endsection

@section('dashboard_content')


<div class="container">
  @if(isset($success))
  <ul class="list-group">
      <li class="list-group-item list-group-item-success">{{$success}}</i>
  </ul
  @endif
  <div class="row">
      <div class="col-md-3 ml-auto">
          <form method="POST" action="{{ route('update_tag', $single_tag['id']) }}"> 
            @csrf
            <div class="form-group">
              <label for="tag">Edit Tag</label>
              <input type="text" class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" name="tag" placeholder="Enter your new Tag"
              value={{ $single_tag['tag'] }}>
              @if ($errors->has('tag'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tag') }}</strong>
                    </span>
                @endif
            </div>    
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>

      
      <div class="col-md-5 mr-auto">
        @if(count($tags)<=0)
          <h2>Please create new Tags</h2>
          <hr>
        @else
        <h2>List of available Tags</h2>
          <hr>
        <div class="container">
          <table class="mx-auto">
              @foreach($tags as $tag)   
              <tr>
                  <th>{{$tag['tag']}}</th>
                  <td>  | </td>                                    
                  <td> 
                    <a  href="{{ route('edit_tag', $tag['id'])}}"><i class="far fa-edit"></i></a>
                    <a href="#" onClick="document.getElementById('deleteTag{{$tag['id']}}').submit();">
                      <i class="far fa-trash-alt"></i>
                    </a>
                      <form action="{{ route('delete_tag', $tag['id'])}}" method="POST" id="deleteTag{{$tag['id']}}">
                        @csrf
                        {{ method_field('DELETE') }}                        
                      </form>
                  </td>
                </tr>                
            @endforeach
          </table>  
        @endif  
        <hr>          
      </div>      
    </div>
  </div>      
</div>
@endsection