@extends('layouts.dashboard')

@section('title') Manage Themes @endsection

@section('dashboard_title') Manage Themes @endsection

@section('dashboard_content')


<div class="container">
  @if(isset($success))
  <ul class="list-group">
      <li class="list-group-item list-group-item-success">{{$success}}</i>
  </ul
  @endif
  <div class="row">
      <div class="col-md-3 ml-auto">
          <form method="POST" action="{{ route('store_theme') }}"> 
            @csrf
            <div class="form-group">
              <label for="theme">Create a new theme</label>
              <input type="text" class="form-control{{ $errors->has('theme') ? ' is-invalid' : '' }}" name="theme" placeholder="Enter your new theme"
              value="{{ old('theme') }}">
              @if ($errors->has('theme'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('theme') }}</strong>
                    </span>
                @endif
            </div>    
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      
      <div class="col-md-5 mr-auto">
        @if(count($themes)<=0)
          <h2>Please create new themes</h2>
          <hr>
        @else
        <h2>List of available themes</h2>
          <hr>
        <div class="container">
          <table class="mx-auto">
              @foreach($themes as $theme)   
                <tr>
                  <th>{{$theme['theme']}}</th>
                  <td>  | </td>                                    
                  <td> 
                    <a  href="{{ route('edit_theme', $theme['id'])}}"><i class="far fa-edit"></i></a>

                    @if(Auth()->user()->cheikh == 3)
                      <a href="#" onClick="document.getElementById('deletetheme{{$theme['id']}}').submit();">
                        <i class="far fa-trash-alt"></i>
                      </a>
                      <form action="{{ route('delete_theme', $theme['id'])}}" method="POST" id="deletetheme{{$theme['id']}}">
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