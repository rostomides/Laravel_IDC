@extends('layouts.dashboard')

@section('title') Manage Prayers @endsection

@section('dashboard_title') Manage Prayers @endsection

@section('dashboard_content')

<div class="container col-md-6">
  <p class="h2">Upload the prayer times for this year</p>
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
      <input class="form-check-input" type="checkbox" value="remove_past_dates" id="remove_past_dates" name="remove_past_dates">
      <label class="form-check-label" for="remove_past_dates">
        Remove past dates
      </label>
    </div>
    
    <div class="form-group">
      <input type="submit" class="form-control-file" value="Upload">
    </div>
  </form>
</div>


<div class="container col-md-8 text-center">
  <h3 calss=>Prayers time are currently:</h3>
  <div class="container table-responsive col-md-3"  id="table"></div>
</div>

<div class="container">
  <hr>
  <h2>Input a new date for prayer time change</h2>
    <form action="{{ route('store_prayer') }}" method='POST' class="form-inline">
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


<div class="accordion" id="PrayerTimeThisYear">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Collapsible Group Item #1
          </button>
        </h5>
      </div>

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
        @foreach($prayers as $prayer)
          <tr>
            <td>{{ $prayer['id'] }}</td>
            <td>{{ $prayer['date'] }}</td>
            <td>{{ $prayer['fajr'] }}</td>
            <td>{{ $prayer['duhr'] }} </td>
            <td>{{ $prayer['asr'] }}</td>
            <td>{{ $prayer['maghrib'] }}</td>            
            <td>{{ $prayer['isha'] }}</td>
            
            <td>                     
              <a href="{{ route('edit_prayer', $prayer['id']) }}" title="Click to edit">
                <i class="far fa-edit"></i>
              </a>

              <a href="#" onClick="document.getElementById('deletePrayer{{ $prayer['id'] }}').submit();" title="Click to delete">
                <i class="far fa-trash-alt"></i>
              </a>
              <form action="{{ route('delete_prayer', $prayer['id']) }}" method="POST" id="deletePrayer{{ $prayer['id'] }}">
                @csrf
                {{ method_field('DELETE') }}                
              </form>              

        @endforeach

      </tbody>
    </table>
  </div>
@endsection


@section('javascript')
<script src="{{asset('js/PrayTimes.js')}}"></script>

<script>
  prayTimes.setMethod('ISNA');  

  var date = new Date(); // today
	var times = prayTimes.getTimes(date, [43.7001100, 79.4163000], 175);
	var list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];

  var iquama = ["<?php echo $current['fajr'] ?>",
                "-",
                "<?php echo $current['duhr'] ?>",
                "<?php echo $current['asr'] ?>",
                "<?php echo $current['maghrib'] ?>",
                "<?php echo $current['isha'] ?>",
                ];
  

	var html = '<table class="table table-striped table-sm" id="timetable">';
	// html += '<tr><th colspan="3">'+ date.toLocaleDateString()+ '</th></tr>';
  html += '<tr><th>Prayer</th><th>Time</th><th>Iqamah</th></tr>';
	for(var i in list)	{
		html += '<tr><td>'+ list[i]+ '</td>';
		html += '<td>'+ times[list[i].toLowerCase()]+ '</td>';
    html += '<td>'+ iquama[i]+ '</td></tr>';
	}
	html += '</table>';
	document.getElementById('table').innerHTML = html;



</script>
@endsection

    



