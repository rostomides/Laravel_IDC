@extends('layouts.dashboard')


@section('title') Update donation @endsection

@section('dashboard_title') Update donations @endsection

@section('dashboard_content')
<div class="container">       
    <div class="col-md-6  mx-auto">    
        <form method="POST" action="{{ route('update_donation') }}" > 
            @csrf
            <div class="form-group">
                <label for="total_cost" class="col-form-label">Current estimation of the project</label>
                <input type="number" class="form-control {{ $errors->has('total_cost') ? ' is-invalid' : '' }}" name="total_cost" value="{{ $expansion['total_cost'] }}" required>
                @if ($errors->has('total_cost'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('total_cost') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="current_donation">Current donations amount</label>
                <input type="number" class="form-control{{ $errors->has('current_donation') ? ' is-invalid' : '' }}" name="current_donation" value="{{ $expansion['current_donation'] }}" required>
                @if ($errors->has('current_donation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('current_donation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="submit" value="Update">  
            </div>
        </form>
    </div>

    <div class="text-center text-info mt-3">
                      
        <div class="h3">
        Progress ({{ round(($expansion['current_donation'] / $expansion['total_cost']) * 100, 2) }}%)
        </div>
        <div class="text-left d-inline h1">
            <i class="far fa-building"></i>               
        </div> 

        <div class="w-75 d-inline-block">
        <div class="progress">                      
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($expansion['current_donation'] / $expansion['total_cost']) * 100 }}% !important;">
            </div>                                  
        </div>
        </div>

        <div class="text-right d-inline h1">
            <i class="fas fa-building"></i>
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