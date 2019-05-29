@extends('layouts.dashboard')

@section('dashboard_content')
<div class="container">
        <?php $role = ["","Editor", "Manager", "Admin"]?>
        <h2>List of available Blogs</h2>
        <div class="table-responsive  mb-5">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>          
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Creation date</th>                        
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if(isset($users))
              @foreach($users as $user)
                <tr>
                  <td>{{ $user['id'] }}</td>
                  <td>{{ $user['name'] }}</td>
                  <td>{{ $user['email'] }} </td>
                  <td>{{ $role[$user['cheikh']] }}</td>                             
                  <td>{{ Carbon\Carbon::parse($user['created_at'])->format('d-m-Y \a\t h:i A') }}</td>
                  
                  <td>     
                    <a href="#" onClick="document.getElementById('deleteBlog{{ $user['id'] }}').submit();" title="Click to delete">
                      <i class="far fa-trash-alt"></i>
                    </a>
                    <form action="{{ route('delete_user', $user['id']) }}" method="POST" id="deleteBlog{{ $user['id'] }}">
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
                            Create new user <i class="fas fa-arrow-alt-circle-right"></i>
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">





                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                    
                    
                            <div class="form-group row">
                                <label for="user_type" class="col-md-4 col-form-label text-md-right">User Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" id='user_type' name='user_type'>
                                        <option value="1">Basic user</option>
                                        <option value="2">Admin user</option>
                                        <option value="3">Super Admin user</option>   
                                    </select>
                                </div>
                            </div>
                    
                    
                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

