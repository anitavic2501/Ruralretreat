
<!DOCTYPE html>
<html lang="en">

 <head>
 <?php
  include_once './partials/head.php';
?> 

</head> 

  <nav>
  <?php
     include_once './partials/header.php';
  ?>
  
</nav>


<header class="masthead" style="background-image: url('images/dogbeach.jpg')">
<br><div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Welcome</h1>
          </div>
        </div>
      </div>
    </div>

</header>

  

<body style="margin-bottom: 10px">
  <div id="share"></div>
  <main>
      <div class="row">
        <div class="col-12" style="text-align: center;">
        <br><br>
          <br>
          <i class="fas fa-paw"></i>
        <p> Are you looking a place for your dog while you are away? You have come to the right place. 
        <br>
           Rural Retreat is facilitate with unquestionable quality of services, your lovely one will enjoy
           their staying in our place. <br> We always made them feel at home and loved.</p>
          <br>
          
          <div class="img-fluid">
          <img src="./images/2.jpg" class="rounded-circle" alt="dogs" width="300">
          <br>

          <p style="font-size: 40px;">
          <b>“Dogs are not our whole life, <br> 
          but they make our lives whole.” </b>
          </p>
        </div>

        <div class="row">
          <div class="col-4"></div>
        <div id="section2" class="col-4">
          <br>
        <h2> Take a look at our Quality Services </h2>
        
        <i class="fas fa-users fa-7x" style="color:white"></i>

        <br>

              <b>Professionalism</b>
              <p>Professionalism and dedication are at the heart of everyone associated with Rural Retreat.
               Years of experience in the automobile industry enable us to provide you unrivalled 
               services with high extent of dedication and professionalism.
               <br> <br>

               <i class="fas fa-heart fa-7x" style="color:white"></i>
               <br>
              <b>Exceptional Customer service</b>
              <p>Our customers always take the priority by us. Making your sale/purchase experience 
              a hassle free process is our responsibility. We try our best to bring solutions to 
              your all related concerns with high-end customer service since we believe in building 
              long lasting relationship with our clients.

</div><div class="col-4"></div></div>
<div class="jumbotron" style="text-align: center;">
<div class="container" id="section3">
        
        
        <section class="form" >
                         <form name="contactform">
            <div class="col-12">
                                    <br><br>
                                    <h2>CONTACT US</h2>
                                    <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" name="field" class="form-control" id="email" placeholder="Enter email" onchange="input_check(this.id)">
                                        </div>
                                        <div class="form-group">
                                                <label for="firstname">First Name:</label>
                                                <input type="text" name="field" class="form-control" id="firstname" placeholder="Enter firstname" onchange="input_check(this.id)">
                                            </div>
                                            <div class="form-group">
                                                    <label for="message">Message:</label>
                                                    <textarea type="text" name="field" class="form-control rounded-0" id="textarea" rows="3" onchange="input_check(this.id)"></textarea>
                                                </div>
                                    
                                        <input type="button" class="btn btn-info" value="Submit Button" onclick="sub_bt()">
                                
                                        <input type="reset" class="btn btn-danger" value="Reset">
                                        <br><br>
                                        
                                    </div>
                        </form>
                    </section>     </div></div>  </div></div>
                    
    <div class="jumbotron" style="text-align: center;">
            <div class="col-12" id="section1">
        <i class="fas fa-map-marker-alt fa-2x"></i> <h2>Our location</h2>
        <p style="font-size:10;"> Silverdale, Hibiscus Coast, Auckland, New Zealand</p>
        <i class="fas fa-phone fa-1x"></i> 022-345-7890
    <!--The div element for the map -->
    <div id="map" style="display: block; margin: auto"></div>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {
                lat: -36.845386,
                lng: 174.763701
            };
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 13,
                    center: uluru
                });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });

            var infowindow = new google.maps.InfoWindow({
                content: '<iframe title="YouTube video player" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/41p1_dPCOwQ" frameborder="0"></iframe>'
            });

            google.maps.event.addListener(marker, 'click', function initialize() {

                infowindow.open(map, marker);
            });
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwm2E_OjJYenUuoA9oLDrsZ7o8W9aSKr4&callback=initMap">
    </script>
        </div></div>
          
        </div>
       
      </div>
    </div></div>
  </main>
  <footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
</body>

</html>