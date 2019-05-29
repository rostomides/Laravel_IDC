 
  <div class="container table-responsive"  id="table">
      <table class="table table-striped table-sm">
          <thead>
            
            <tr colspan="3" class="">
                <p  class="text-center font-weight-bold bg-secondary p-0 m-0 text-white">
                    Prayer times :<br> 
                    {{ date('l d M Y') }}
                </p>
            </tr>  
            <tr>
              <th>Prayer</th>                  
              <th>Time</th>
              <th>Iqamah</th>            
            </tr>
          </thead>
          <tbody>            
              <tr>                
                <td>Fajr</td>
                <td>{{ $current['fajr'] }}</td>
                <td>{{ $current_iqamah['fajr'] }}</td>
              </tr>
              <tr>
                  <td>Sunrise</td><td>{{ $current['sunrise'] }}</td>
                  <td>-</td>
              </tr>
              <tr>
                  <td>Duhr</td>
                  <td>{{ $current['duhr'] }} </td>
                  <td> {{ $current_iqamah['duhr'] }}</td>
              </tr>
              <tr>
                  <td>Asr</td>
                  <td>{{ $current['asr'] }}</td>
                  <td> {{ $current_iqamah['asr'] }}</td>
              </tr>
              <tr>
                  <td>Maghrib</td>
                  <td>{{ $current['maghrib'] }}</td>
                  <td> {{ $current_iqamah['maghrib'] }}</td>
              </tr>
              <tr>           
                  <td>Isha</td>
                  <td>{{ $current['isha'] }}</td>
                  <td> {{ $current_iqamah['isha'] }}</td>
              </tr>                       
          </tbody>
        </table>
  </div>