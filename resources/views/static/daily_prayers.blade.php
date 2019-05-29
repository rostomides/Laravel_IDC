@extends('layouts.master')

@section('title') Daily prayers @endsection

@section('content')

<div class="container mt-3">
    <div class="row">               

            @include('partials._caroussel')     

    </div><!-- <div class="row"> -->           
</div><!-- <div class="container mt-5"> -->



<div class="container pt-5">
    <!-- Example row of columns -->
    <div class="row">   
      <div class="col-md-9">

        <h1> MASJID/COMMUNITY CENTRE</h1>
        
        <p class="text-justify h4">
          It was not our intention to set up a place for prayer. However, in the Toronto area prayer places are few and far from each other. Therefore, many Muslims often have to travel some distance to reach a masjid. When we began renting premises for the purpose of meeting and training for dawah, and for welcoming new-Muslims and non-Muslims, the Muslims in the area began pleading with us to open it also for daily and Friday (jumu`ah) prayers. We did.
          <br> <br> <br>

          It turns out that opening the facility thus serves the dawah indirectly in two ways. First, by holding prayers we have a captive audience to hear from us about the importance of dawah, and we are able to train them through our khutbahs to deliver the message to others. Second, we receive their regular donations for the purpose of not only supporting the place of worship, but also to further the dawah mission.
          <br>
          <br>
          <br>
          With this experience, it is therefore within our vision to set up more such centres which will serve the dual purpose of mosque and dawah centre. Many other mosques fulfil many needs of the community, but they lack a focused dawah mission such as we intend. Therefore, we prefer to concentrate on the dawah mission and not get sidetracked by community needs which are already fulfilled by other mosques. For example, we have not undertaken to provide burial services which, though essential to Muslim communities in Canada, are already offered by many mosques in Toronto.
          <br>
          <br>
          <br>
          However, Muslims praying at the Dawah Centre naturally need to learn their religious precepts in addition to learning about dawah. For this reason, we often hold classes and mini-lectures for adults after the daily prayers; and we hold summer school and evening school for children.
          </p>
        
          
      </div>  


    @include('partials._recentBlogs')     
    </div>
    <hr>

</div> <!-- <div class="container mt-3"> -->

 @include('partials._footer')

@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection