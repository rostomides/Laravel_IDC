@extends('layouts.dashboard')

@section('title') Edit Category @endsection

@section('dashboard_title') Edit category @endsection

@section('dashboard_content')


<div class="container">
  @if(isset($success))
  <ul class="list-group">
      <li class="list-group-item list-group-item-success">{{$success}}</i>
  </ul
  @endif
  <div class="row">
      <div class="col-md-3 ml-auto">
          <form method="POST" action="{{ route('update_category', $single_category['id']) }}"> 
            @csrf
            <div class="form-group">
              <label for="category">Edit category</label>
              <input type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" placeholder="Enter your new category"
              value={{ $single_category['category'] }}>
              @if ($errors->has('category'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                @endif
            </div>    
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>

      
      <div class="col-md-5 mr-auto">
        @if(count($categories)<=0)
          <h2>Please create new categories</h2>
          <hr>
        @else
        <h2>List of available categories</h2>
          <hr>
        <div class="container">
          <table class="mx-auto">
              @foreach($categories as $category)   
              <tr>
                  <th>{{$category['category']}}</th>
                  <td>  | </td>                                    
                  <td> 
                    <a  href="{{ route('edit_category', $category['id'])}}"><i class="far fa-edit"></i></a>
                    <a href="#" onClick="document.getElementById('deletecategory{{$category['id']}}').submit();">
                      <i class="far fa-trash-alt"></i>
                    </a>
                      <form action="{{ route('delete_category', $category['id'])}}" method="POST" id="deletecategory{{$category['id']}}">
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