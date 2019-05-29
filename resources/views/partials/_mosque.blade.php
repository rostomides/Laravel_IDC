
<div class="row mx-4">   

    <div  class="card col-md-3 col-sm-5 mx-auto mb-2" style="max-width:18rem !important;">
        <img class="card-img-top mt-3" src="../img/courses.jpg" alt="Card image cap" style="max-width:16rem;">
        <div class="card-body">
            <p class="card-text">
                <p class="text-info text-center h4">Courses</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis nam iste modi esse nisi error molestias placeat odio et ipsa!</p>                                        
            </p>
            <div class="card-footer text-center">
                <a href="{{ route('courses') }}" class="text-info">Read more</a><br>
            </div>
            
        </div>
    </div>

    <div  class="card col-md-3  col-sm-5 mb-2 mx-auto" style="max-width:18rem !important;">
        <img class="card-img-top mt-3" src="../img/prayer.jpg" alt="Card image cap" style="max-width:16rem;">
        <div class="card-body">
            <p class="card-text">
                <p class="text-info text-center h4">Daily prayers</p>
                <p>We hold the five daily prayers at the prescribed times.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, sed.</p>                   
            </p>
            <div class="card-footer text-center">
                <a href="{{ route('daily_prayers') }}" class="text-info">Read more</a><br>
            </div>
            
        </div>
    </div>


    <div  class="card col-md-3 offset-sm-3 col-sm-6 offset-sm-3 mb-2 mx-auto" style="max-width:18rem !important;">
        <img class="card-img-top mt-3" src="../img/jumuaa.jpg" alt="Card image cap" style="max-width:16rem;">
        <div class="card-body">
            <p class="card-text">
                <p class="text-info text-center h4">Jumua prayer</p>
                <p>We hold the five daily prayers at the prescribed times.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, sed.</p>                   
            </p>

            <div class="card-footer text-center">
                <a href="{{ route('jumuaa_prayer') }}" class="text-info">Read more</a><br>
            </div>            
            
        </div>
    </div>   
    
    <div class="col-md-3 col-sm-12 mx-auto">
        @include("partials._prayer_times")
        
        <div class="jumbotron bg-info text-white text-justify h5">
            Adhan is performed 15mn before iqamah except for maghrib. Iqamah for maghrib is perform directly after adhan.
        </div>
    </div>
</div>   
 



    