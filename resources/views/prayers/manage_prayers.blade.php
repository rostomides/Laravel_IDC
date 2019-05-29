@extends('layouts.dashboard')

@section('title') Manage Prayers @endsection

@section('dashboard_title') Manage Prayers @endsection

@section('dashboard_content')

<div class="container col-md-6">

    <!-- collapsible that shows the prayer times of the current year -->
    <div class="accordion mb-3" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Prayer times of this year
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <div class="table-responsive text-center">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#</th>                  
                      <th>Date</th>
                      <th>Fajr</th>
                      <th>Sunrise</th>
                      <th>Duhr</th>
                      <th>Asr</th>
                      <th>Maghrib</th>  
                      <th>Isha</th>        
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($prayers as $prayer)
                      <tr>
                        <td>{{ $prayer['id'] }}</td>
                        <td>{{ $prayer['date'] }}</td>
                        <td>{{ $prayer['fajr'] }}</td>
                        <td>{{ $prayer['sunrise'] }}</td>
                        <td>{{ $prayer['duhr'] }} </td>
                        <td>{{ $prayer['asr'] }}</td>
                        <td>{{ $prayer['maghrib'] }}</td>            
                        <td>{{ $prayer['isha'] }}</td>
                    @endforeach
                  </tbody>
                </table>      
              </div>
          </div>
        </div>
      </div>
    </div>
<!-- collapsible that shows the prayer times of the current year -->


  <p class="h2">Upload the prayer times for {{  date ("Y")}}</p>
  <form method="Post" action="{{ route('upload_prayer_times') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="selectFile">Select a file</label>
      <input type="file" class="form-control-file" id="selectFile" name="pfile" required>
      @if ($errors->has('pfile'))
          <span class="help-block">
              <strong>{{ $errors->first('pfile') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="1" id="remove_past_dates" name="remove_past_dates">
      <label class="form-check-label" for="remove_past_dates">
        Include only future dates
      </label>
    </div>
    
    <div class="form-group">
      <input type="submit" class="form-control-file" value="Upload">
    </div>
  </form>
  <hr>
</div>


<div class="container text-center col-md-3 mt-5">
  @include("partials._prayer_times")
</div>


<div class="container">
  <hr>
  <h2>Input a new date for prayer time change</h2>
    <form action="{{ route('store_iqamah') }}" method='POST' class="form-inline">
        {{ csrf_field() }}
  
          <div class="form-group">
            <label for="date" class="form-control-label">Date</label>
            <input type="date" class="form-control ml-1" id="date"  name='date' required value="{{ old('date') }}">
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group ml-2">
              <label for="fajr"  class="form-control-label">Fajr</label>
              <input type="time" class="form-control ml-1" id="fajr"  name='fajr' required value="{{ old('fajr') }}">
              @if ($errors->has('fajr'))
                  <span class="help-block">
                      <strong>{{ $errors->first('fajr') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group ml-2">
              <label for="duhr"  class="form-control-label">Duhr</label>
              <input type="time" class="form-control ml-1" id="duhr"  name='duhr' required value="{{ old('duhr') }}">
              @if ($errors->has('duhr'))
                  <span class="help-block">
                      <strong>{{ $errors->first('duhr') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group ml-2">
              <label for="asr" class="form-control-label">Asr</label>
              <input type="time" class="form-control ml-1" id="asr"  name='asr' required value="{{ old('asr') }}">
              @if ($errors->has('asr'))
                  <span class="help-block">
                      <strong>{{ $errors->first('asr') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group ml-2">
              <label for="maghrib" class="form-control-label">Maghrib</label>
              <input type="time" class="form-control ml-1" id="maghrib"  name='maghrib' required value="{{ old('maghrib') }}">
              @if ($errors->has('maghrib'))
                  <span class="help-block">
                      <strong>{{ $errors->first('maghrib') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group ml-2">
              <label for="isha" class="form-control-label">Isha</label>
              <input type="time" class="form-control ml-1" id="isha"  name='isha' required value="{{ old('isha') }}">
              @if ($errors->has('isha'))
                  <span class="help-block">
                      <strong>{{ $errors->first('isha') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group ml-2">              
              <input type="submit" class="form-control" value="Submit">
            </div>
    </form>
    <hr>  
</div>


@if(isset($iqamahs))
  <h2>Calendar of prayer time changes</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>                  
          <th>Date</th>
          <th>Fajr</th>
          <th>Duhr</th>
          <th>Asr</th>
          <th>Maghrib</th>  
          <th>Isha</th>        
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($iqamahs as $iqamah)
          <tr>
            <td>{{ $iqamah['id'] }}</td>
            <td>{{ $iqamah['date'] }}</td>
            <td>{{ $iqamah['fajr'] }}</td>
            <td>{{ $iqamah['duhr'] }} </td>
            <td>{{ $iqamah['asr'] }}</td>
            <td>{{ $iqamah['maghrib'] }}</td>            
            <td>{{ $iqamah['isha'] }}</td>
            
            <td>                     
              <a href="{{ route('edit_iqamah', $iqamah['id']) }}" title="Click to edit">
                <i class="far fa-edit"></i>
              </a>

              <a href="#" onClick="document.getElementById('deletePrayer{{ $iqamah['id'] }}').submit();" title="Click to delete">
                <i class="far fa-trash-alt"></i>
              </a>
              <form action="{{ route('delete_iqamah', $iqamah['id']) }}" method="POST" id="deletePrayer{{ $iqamah['id'] }}">
                @csrf
                {{ method_field('DELETE') }}                
              </form>              

        @endforeach

      </tbody>
    </table>
  </div>
@endif


@endsection



    



