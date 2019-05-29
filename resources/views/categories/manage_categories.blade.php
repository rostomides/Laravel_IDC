@extends('layouts.dashboard')

@section('title') Manage Categories @endsection

@section('dashboard_title') Manage Categories @endsection

@section('dashboard_content')


<div class="container">
  @if(isset($success))
  <ul class="list-group">
      <li class="list-group-item list-group-item-success">{{$success}}</i>
  </ul
  @endif
  <div class="row">
      <div class="col-md-3 ml-auto">
          <form method="POST" action="{{ route('store_category') }}"> 
            @csrf
            <div class="form-group">
              <label for="category">Create a new category</label>
              <input type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" placeholder="Enter your new category"
              value="{{ old('category') }}">
              @if ($errors->has('category'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                @endif
            </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
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

                    @if(Auth()->user()->cheikh == 3)
                      <a href="#" onClick="document.getElementById('deletecategory{{$category['id']}}').submit();">
                        <i class="far fa-trash-alt"></i>
                      </a>
                      <form action="{{ route('delete_category', $category['id'])}}" method="POST" id="deletecategory{{$category['id']}}">
                        @csrf
                        {{ method_field('DELETE') }}                        
                      </form>
                    @endif
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