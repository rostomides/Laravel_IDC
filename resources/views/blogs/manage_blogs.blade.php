@extends('layouts.dashboard')

@section('title') Manage blogs @endsection

@section('dashboard_title') Manage Blogs @endsection

@section('dashboard_content')

<h2>Lis of available Blogs</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Author</th>          
          <th>Title</th>
          <th>Theme</th>
          <th>Category</th>
          <th>Tags</th>
          <th>Last updated</th>          
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($blogs as $blog)
          <tr>
            <td>{{ $blog['biog']->name }}</td>
            <td><a href="{{ route('show_blog', $blog['id']) }}">{{ $blog['title'] }}</a></td>
            <td>{{ $blog->theme->theme }} </td>
            <td>{{ $blog->category['category'] }}</td>
            <td> 
              @foreach($blog['tags'] as $tag)
              <span class="badge badge-secondary"><a href="#" style="text-decoration: none; color: white;"> {{ $tag['tag'] }}</a></span>
              @endforeach
            </td>            
            <td>{{ Carbon\Carbon::parse($blog['updated_at'])->format('d-m-Y \a\t h:i A') }}</td>
            
            <td>          
                <form action="{{ route('toggle_blog', $blog['id']) }}" method="POST" id="Toggle-Blog-{{$blog['id']}}">@csrf</form>      
              @if($blog['publish'] == 1)                
                <a href="#" title="Click to Unpublish" onClick="document.getElementById('Toggle-Blog-{{$blog['id']}}').submit();">
                  <i class="far fa-eye"></i>
                </a>
              @else
                <a href="#" title="Click to publish" onClick="document.getElementById('Toggle-Blog-{{$blog['id']}}').submit();">
                  <i class="far fa-eye-slash"></i>
                </a>
              @endif
                
                                     
              <a href="{{ route('edit_blog', $blog['id']) }}" title="Click to edit">
                <i class="far fa-edit"></i>
              </a>

              @if(Auth()->user()->cheikh == 3)
                <a href="#" onClick="document.getElementById('deleteBlog{{ $blog['id'] }}').submit();" title="Click to delete">
                  <i class="far fa-trash-alt"></i>
                </a>
                <form action="{{ route('delete_blog', $blog['id']) }}" method="POST" id="deleteBlog{{ $blog['id'] }}">
                  @csrf
                  {{ method_field('DELETE') }}                
                </form>
              @endif

              

        @endforeach



      </tbody>
    </table>
  </div>
@endsection





