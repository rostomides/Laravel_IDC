@extends('layouts.master')

@section('title') blog title @endsection

@section('content')

<!--<div class="container mt-5">
    <div class="row">               

            {{-- @include('partials._caroussel')                 --}}

                            

    </div>        
</div> <div class="container mt-5"> -->



<!-- <div class="container pt-5">
    
    <div class="row">   
      <div class="col-md-9">

        donation



      </div>  


    {{-- @include('partials._recentBlogs')      --}}
    </div>
    <hr>

</div> <div class="container mt-3"> -->



<!-- add parallax effect -->


<div class="jumbotron donation1 mt-5 pt-5">
    <div class="ptext text-center text-white font-weight-bold" style="font-size:1.75rem !important;">
      <blockquote class="blockquote pt-5">
        <p>O ye who believe! Spend out of (the bounties) We have provided for you, before the Day comes when no bargaining (will avail), nor friendship nor intercession.Those who reject Faith they are the wrong-doers. </p>
        <footer class="blockquote-footer">(Surah al-Baqara, 254)</footer>
      </blockquote>
    </div>
</div> 


<div class="album py-5 bg-light">
    <div class="container">

        <div class="row justify-content-between d-flex align-items-stretch">            
            <div class="card col-md-3">
                <div class="h2 card-header text-center font-weight-bold text-white bg-secondary mt-3" style="min-height: 40px;">
                    General Donation
                </div>
                <div class="card-body">                  
                  <p class="card-text text-justify">Funding our efforts to spread the message of Islam.</p>

                </div>

                <div class="card-footer text-muted text-center">
                  <a class="btn btn-info" data-toggle="collapse" href="#collapseGD" role="button" aria-expanded="false" aria-controls="collapseGD"
                  >
                  Learn more</a>
                  <a href="https://donate.micharity.com/IIDC/4071904780/General-Donation/1/donate" class="btn btn-secondary">Donate</a>
                </div>
              </div>

              <div class="card col-md-3">
                <div class="h2 card-header text-center font-weight-bold text-white bg-secondary mt-3" style="min-height: 90px !important; top:50% !important;">
                   Zakat
                </div>
                <div class="card-body text-justify">                  
                  <p class="card-text">Funds to be distributed according to Quran 9:60.</p>

                </div>
                
                <div class="card-footer text-muted text-center">
                <a class="btn btn-info" data-toggle="collapse" href="#collapseZakat" role="button" aria-expanded="false" aria-controls="collapseZakat" 
                >
                  Learn more</a>                  
                  <a href="https://donate.micharity.com/IIDC/4071904780/zakat/2/donate" class="btn btn-secondary">Donate</a>
                </div>
              </div>

              <div class="card col-md-3">
                <div class="h2 card-header text-center font-weight-bold text-white bg-secondary mt-3" style="min-height: 90px !important; top:50% !important;">
                    Building Expansion
                </div>
                <div class="card-body text-justify">                  
                  <p class="card-text">Extending of our existing premises: Projected Cost $1.5 million.</p>                  
                </div>

                <div class="card-footer text-muted text-center">
                <a class="btn btn-info" data-toggle="collapse" href="#collapseExpension" role="button" aria-expanded="false" aria-controls="collapseExpension">
                  Learn more</a>
                  <a href="https://donate.micharity.com/IIDC/4071904780/building-expansion-fund/4/donate" class="btn btn-secondary">Donate</a>
                </div>
              </div>
        </div>


        <div class="row mt-2" id="donate-panel">
            <div class="collapse" id="collapseGD" data-parent="#donate-panel">
              <div class="card card-body text-justify">
                <p class="text-center h2">CHALLENGES of the Dawah Mission</p>
      
                <p> Funding. Funding remains a major challenge to the mission. All of the above described activities require a steady influx of funds: the printing of materials; the operation of our television program, and even the maintenance and improvement, and expansion of our mission base.</p>
      
       
                <p> Human Resources. Due to limited funds, we are unable to attract and retain some of the more talented persons to serve the mission. We rely largely on volunteers and on such few persons as would devote themselves to the mission for its great rewards in the life hereafter while content with moderate remuneration in this life.</p>
      
      
                <p class="text-center h2">FUNDING the Dawah Mission</p>
      
                <p>The Quran (9:60) specifies that zakaat may be spent in the way of Allah (fee sabeel Allaah). Based on this, many scholars rule that zakaat can be spent on our missionary activities for, today, the battle is not with swords but with information; it is not on the battlefield, but in the media. We are counting on you to help us win this battle. May Allah bless you and your loved ones in this life and the life hereafter.
                </p>

                <div class="mt-3">
                <a href="https://donate.micharity.com/IIDC/4071904780/General-Donation/1/donate" class="btn btn-info btn-block">Donate</a>
                </div>
              </div>
              
            </div>
          


            <div class="collapse" id="collapseZakat" data-parent="#donate-panel">
              <div class="card card-body">
                <p class="text-center">Zakat</p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magnam beatae, rerum earum dolorum accusamus similique nisi odit molestias ullam soluta dicta obcaecati maxime sed aliquam sequi commodi. Fugit aut, doloribus id voluptate cumque temporibus quo tempore eveniet at alias, ducimus laudantium cum qui optio deleniti, accusamus asperiores? Amet, ipsum enim, eos ad provident accusamus ipsa, maxime possimus omnis sapiente libero exercitationem tenetur harum iusto facilis cum temporibus nisi velit ea maiores qui recusandae eius fugiat hic! A id dolores nostrum, aliquam magnam repellendus accusamus maxime doloribus fugit ullam quisquam dolore fugiat vel culpa illo necessitatibus quae? Saepe, hic nihil?

                <div class="mt-3">
                  <a href="https://donate.micharity.com/IIDC/4071904780/zakat/2/donate" class="btn btn-info btn-block">Donate</a>
                </div>
              </div>
            </div>
            

            <div class="collapse" id="collapseExpension" data-parent="#donate-panel">
                <div class="card card-body">
                  <p class="text-center">Building expension</p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magnam beatae, rerum earum dolorum accusamus similique nisi odit molestias ullam soluta dicta obcaecati maxime sed aliquam sequi commodi. Fugit aut, doloribus id voluptate cumque temporibus quo tempore eveniet at alias, ducimus laudantium cum qui optio deleniti, accusamus asperiores? Amet, ipsum enim, eos ad provident accusamus ipsa, maxime possimus omnis sapiente libero exercitationem tenetur harum iusto facilis cum temporibus nisi velit ea maiores qui recusandae eius fugiat hic! A id dolores nostrum, aliquam magnam repellendus accusamus maxime doloribus fugit ullam quisquam dolore fugiat vel culpa illo necessitatibus quae? Saepe, hic nihil?


                  <div class="text-center text-info mt-3">
                    <a href="{{ url('files/Masjid-design.pdf') }}"  style="text-decoration:none !important;"> 
                      <i class="fas fa-image"></i>
                      See the extention plan 
                    </a>

                    <div class="mt-3">
                      <div class="h3">
                        Progress
                      </div>
                      <div class="text-left d-inline h1">
                          <i class="far fa-building"></i>               
                      </div> 

                      <div class="w-75 d-inline-block">
                        <div class="progress">                      
                          <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50% !important;">
                          </div>                                  
                        </div>
                      </div>

                      <div class="text-right d-inline h1">
                          <i class="fas fa-building"></i>
                      </div>                     
                  </div>
                  <div class="mt-3">
                    <a
                    href="https://donate.micharity.com/IIDC/4071904780/building-expansion-fund/4/donate" class="btn btn-info btn-block">Donate</a>
                  </div>
                </div>
              </div>
          </div>

    </div>
  </div>

</div>

  <div class="container my-5">
    <hr>
      <div class="row justify-content-center d-flex">
        <p class="h1 text-center"> Other ways to donate </p>
      </div>
    <hr>

  <div class="row  justify-content-between d-flex align-items-stretch">
    <div class="card col-md-5">
      <h5 class="h2 card-header text-center font-weight-bold text-white bg-secondary mt-3"> Donate by cheque</h5>
      <div class="card-body">        
        <p class="card-text">Please make cheques payable to:</p>
        <p class="card-text text-center h5">Islamic Information & Dawah Centre International.</p>
        <p class="card-text text-center"> 
          
          1168 Bloor Street West<br>
      
          Toronto, Ontario<br>
            
          Canada M6H 1N1<br>
        </p>       
      </div>
    </div>


    <div class="card col-md-5">
        <h5 class="h2 card-header text-center font-weight-bold text-white bg-secondary mt-3"> Bank deposite</h5>
        <div class="card-body">
          <p class="card-text text-center">
              Name of Account: <b>Islamic Information & Dawah Centre International.</b><br>
            
                Bank:<b> Bank of Montreal</b> <br>
                  Swift Code: <b>BOFMCAM2</b> <br>
      
                    Bank Code:<b> 0001</b> <br>
      
                      Branch Transit #:<b> 03882</b> <br>
      
                      Account #: <b>1019-855</b> <br>        
          </p>         
        </div>
      </div>   
    </div>    

</div>









@endsection

@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection

