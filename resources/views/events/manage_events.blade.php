@extends('layouts.dashboard')

@section('title') Manage events @endsection

@section('dashboard_title') Manage Events @endsection

@section('dashboard_content')

<h2>List of available Events</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>          
          <th>Title</th>
          <th>Date</th>
          <th>Time</th>
          <th>Location</th>
          <th>Last updated</th>          
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($events as $event)
          <tr>
            <td>{{ $event['id'] }}</td>
            <td><a href="{{ route('show_event', $event['id']) }}">{{ $event['title'] }}</a></td>
            <td>{{ $event['date'] }} </td>
            <td>{{ $event['time'] }}</td>
            <td>{{ $event['location'] }}</td>            
            <td>{{ Carbon\Carbon::parse($event['updated_at'])->format('d-m-Y \a\t h:i A') }}</td>
            
            <td>          
                <form action="{{ route('toggle_event', $event['id']) }}" method="POST" id="Toggle-Event-{{ $event['id'] }}">@csrf</form>      
              @if($event['publish'])                
                <a href="#" title="Click to Unpublish" onClick="document.getElementById('Toggle-Event-{{ $event['id'] }}').submit();">
                  <i class="far fa-eye"></i>
                </a>
              @else
                <a href="#" title="Click to publish" onClick="document.getElementById('Toggle-Event-{{ $event['id'] }}').submit();">
                  <i class="far fa-eye-slash"></i>
                </a>
              @endif
                
                                     
              <a href="{{ route('edit_event', $event['id']) }}" title="Click to edit">
                <i class="far fa-edit"></i>
              </a>


              <a href="#" onClick="document.getElementById('deleteEvent{{ $event['id'] }}').submit();" title="Click to delete">
                <i class="far fa-trash-alt"></i>
              </a>
              <form action="{{ route('delete_event', $event['id']) }}" method="POST" id="deleteEvent{{ $event['id'] }}">
                @csrf
                {{ method_field('DELETE') }}                
              </form>

              

        @endforeach



      </tbody>
    </table>
  </div>
@endsection





