@extends('layouts.master')

@section('title') blog title @endsection

@section('content')
 

<!-- add parallax effect -->


<div class="jumbotron donation1 mt-5 pt-5">
    <div class="ptext text-center text-black font-weight-bold" style="font-size:1.75rem !important;">
      <blockquote class="blockquote pt-5">
        <p>O ye who believe! Spend out of (the bounties) We have provided for you, before the Day comes when no bargaining (will avail), nor friendship nor intercession.Those who reject Faith they are the wrong-doers. </p>
        <footer class="blockquote-footer" style="color:white !important;">(Surah al-Baqara, 254)</footer>
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
                  <a class="btn btn-info" data-toggle="modal" href="#general-donation" 
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
                <a class="btn btn-info" data-toggle="modal" href="#zakat" 
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
                <a class="btn btn-info" data-toggle="modal" href="#expension">
                  Learn more</a>
                  <a href="https://donate.micharity.com/IIDC/4071904780/building-expansion-fund/4/donate" class="btn btn-secondary">Donate</a>
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



<!-- Button to Open the Modal -->
@include('partials._footer')
@endsection

@section("modal")

  
  <!-- General donation modal -->
  <div class="modal" id="general-donation">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">General donation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          
            <p class="h5 text-center">CHALLENGES of the Dawah Mission</p>
            <p> Funding. Funding remains a major challenge to the mission. Our efforts to spread the message of our faith requires a steady influx of funds: the printing of literature for free distribution; the operation of our television program, and the maintenance, improvement, and expansion of our mission base.</p>
            <br><br><br>
      
       
  
            <p class="h5 text-center">FUNDING the Dawah Mission</p>
  
            <p>The Quran (9:60) specifies that zakaat may be spent in the way of Allah (fee sabeelAllaah). Based on this, many scholars rule that zakaat can be spent on our missionary activities for, today, the battle is not with swords but with information; it is not on the battlefield, but in the media. We are counting on you to help us win this battle. May Allah bless you and your loved ones in this life and the life hereafter.
            </p>

            <div class="mt-3">
            <a href="https://donate.micharity.com/IIDC/4071904780/General-Donation/1/donate" class="btn btn-info btn-block">Donate</a>
            </div>
          </div>
         
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
  <!-- END General donation modal -->


  <!-- Zakat modal -->

  <div class="modal" id="zakat">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Zakat</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
           

              <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magnam beatae, rerum earum dolorum accusamus similique nisi odit molestias ullam soluta dicta obcaecati maxime sed aliquam sequi commodi. Fugit aut, doloribus id voluptate cumque temporibus quo tempore eveniet at alias, ducimus laudantium cum qui optio deleniti, accusamus asperiores? Amet, ipsum enim, eos ad provident accusamus ipsa, maxime possimus omnis sapiente libero exercitationem tenetur harum iusto facilis cum temporibus nisi velit ea maiores qui recusandae eius fugiat hic! A id dolores nostrum, aliquam magnam repellendus accusamus maxime doloribus fugit ullam quisquam dolore fugiat vel culpa illo necessitatibus quae? Saepe, hic nihil?</p>

              
              <div class="mt-3">
                <a href="https://donate.micharity.com/IIDC/4071904780/zakat/2/donate" class="btn btn-info btn-block">Donate</a>
              </div>
            </div>

    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
    
        </div>
      </div>
    </div>
  <!-- END  nZakat modal -->


  <!-- Zakat expansion -->

  <div class="modal" id="expension">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Building expansion </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
           
              <p class="text-justify">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magnam beatae, rerum earum dolorum accusamus similique nisi odit molestias ullam soluta dicta obcaecati maxime sed aliquam sequi commodi. Fugit aut, doloribus id voluptate cumque temporibus quo tempore eveniet at alias, ducimus laudantium cum qui optio deleniti, accusamus asperiores? Amet, ipsum enim, eos ad provident accusamus ipsa, maxime possimus omnis sapiente libero exercitationem tenetur harum iusto facilis cum temporibus nisi velit ea maiores qui recusandae eius fugiat hic! A id dolores nostrum, aliquam magnam repellendus accusamus maxime doloribus fugit ullam quisquam dolore fugiat vel culpa illo necessitatibus quae? Saepe, hic nihil?
              </p>


              <div class="text-center text-info mt-3">
                <a href="{{ url('files/Masjid-design.pdf') }}"  style="text-decoration:none !important;"> 
                  <i class="fas fa-image"></i>
                  See the expansion plan 
                </a>

                <div class="mt-3">
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
              <div class="mt-3">
                <a
                href="https://donate.micharity.com/IIDC/4071904780/building-expansion-fund/4/donate" class="btn btn-info btn-block">Donate</a>
              </div>
            </div>
          </div>
        </div>
      
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
    
        </div>
      </div>
    </div>
  <!-- END expansion modal -->




@endsection




@section("css")

<link rel="stylesheet" href="{{ asset('css/css/fontawesome-all.min.css') }}">
@endsection



