<style>
      

  #mainNav {
  position: relative;
  font-family: 'Raleway', sans-serif;
}

.logo_pic {
 /* Frame */

  position: absolute;
  height: 75px;
  left: 35px;
  top: 33px;

  }

  .responsive {
  width: 100%;
  height: auto;
}


.nav-item:hover .paw {
  display: inline;
  color: white;
}

.paw {
	display: none;
}

#mainNav .navbar-toggler {
  font-size: 12px;
  text-transform: uppercase;
  color: #343a40;
}

#mainNav .navbar-nav > li.nav-item > a {
  font-size: 16px;
  font-weight: bold;
  letter-spacing: 1px;
}

@media only screen and (min-width: 992px) {
  #mainNav {
    background: gray;
  }
  #mainNav .navbar-nav > li.nav-item > a {
    padding: 10px 20px;
    color: #fff;
  }
  #mainNav .navbar-nav > li.nav-item > a:focus, #mainNav .navbar-nav > li.nav-item > a:hover {
    background: #555; 
  }
}

@media only screen and (min-width: 992px) {
  #mainNav {
    -webkit-transition: background-color 0.2s;
    transition: background-color 0.2s;
    /* Force Hardware Acceleration in WebKit */
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    -webkit-backface-visibility: hidden;
  }
  #mainNav.is-fixed {
    /* when the user scrolls down, we hide the header right above the viewport */
    position: fixed;
    top: -67px;
    -webkit-transition: -webkit-transform 0.2s;
    transition: -webkit-transform 0.2s;
    transition: transform 0.2s;
    transition: transform 0.2s, -webkit-transform 0.2s;
    border-bottom: 1px solid white;
    background-color: rgba(255, 255, 255, 0.9);
  }
  #mainNav.is-fixed{
    color: #212529;
  }
  }
  #mainNav.is-fixed .navbar-nav > li.nav-item > a {
    color: #212529;
  }
  #mainNav.is-fixed .navbar-nav > li.nav-item > a:focus, #mainNav.is-fixed .navbar-nav > li.nav-item > a:hover {
    color: #0085A1;
  }
}
      </style>

      

        <div id="headerlogo">
            <table class="responsive">
                <tr>
                    <td id="logo"><a  href="index.php">
            <img class="logo_pic" src="images\logo.png"></td>
                    <td id="headerpic"><img id="headerpic" class="responsive" src="images\headerpic.jpg"></td>
         </tr>
         </table>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" >
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto nav-fill w-100">
        <li class="nav-item">
        <a href="services.php">
        <i class="paw fas fa-paw fa-lg"></i> Our Services </a> 
        </li>
      
        <li class="nav-item">
          <a href="index.php#section3">
          <i class="paw fas fa-paw fa-lg"></i> Contact Us</a>  </li>
        <li class="nav-item">
        <a href="article2.php">
        <i class="paw fas fa-paw fa-lg"></i> Articles</a></li>
         <?php
        
        //   //When the user is a CUSTOMER, then show the SEND FEEDBACK form
        
        if (isset($_SESSION['id']) && $_SESSION['utd']== 3)  {
          echo ' <li class="nav-item"><a href="dashboard.php"> <i class="paw fas fa-paw fa-lg"></i>My dashboard </a></li>';  
            echo ' <li class="nav-item"><a href="edit_customer.php"> <i class="paw fas fa-paw fa-lg"></i> Edit my profile</a></li>';  
            echo ' <li class="nav-item"><a href="doglist.php"><i class="paw fas fa-paw fa-lg"></i> My Dogs</a></li>';
            echo ' <li class="nav-item"><a href="bookinglist.php"><i class="paw fas fa-paw fa-lg"></i> My Bookings </a></li>'; 
            echo ' <li class="nav-item"><a href="booking.php"><i class="paw fas fa-paw fa-lg"></i> Make a Booking</a></li>';
            echo '';
          }
          //When the user is ADMIN, show some options
          else if (isset($_SESSION['id']) && $_SESSION['utd']== 1){
            echo ' <li class="nav-item"><a class="nav-link" href="list_of_users.php">List of users</a></li>';
          }
          else if(isset($_SESSION['id']) && $_SESSION['utd']== 2){
          echo '<li class="nav-item"><a class="nav-link" href="providerdashboard.php"><i class="paw fas fa-paw fa-lg"></i>My Dashboard</a></li>';  
          echo ' <li class="nav-item"><a href="doglist.php"><i class="paw fas fa-paw fa-lg"></i> My Dogs</a></li>';
          echo '<li class="nav-item"><a class="nav-link" href="booking.php"><i class="paw fas fa-paw fa-lg"></i>Make Bookings</a></li>';
            
          }

        //   if($user->loggedin() &&  ($user_type_id == 1 || $user_type_id == 2)){
        //     echo '<li class="nav-item"><a class="nav-link" href="staff_reports.php">Reports</a></li>';
        //     echo '<li class="nav-item"><a class="nav-link" href="manage_reservations.php">Manage reservations</a></li>';
        //   }
        //  if ($user->loggedin() && $user_type_id == 1){
        //   echo '<li class="nav-item"><a class="nav-link" href="signup.php">Add new user</a></li>';
        //  }
        //  if (!$user->loggedin())
        
         
        if (!isset($_SESSION['id'])) {
          echo ' <li class="nav-item dropdown">
          <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
          
          <i class="paw fas fa-paw fa-lg"></i>Log in</a>
        <div class="dropdown-menu">
        <form class="px-4 py-3" action="includes/login.inc.php" method="post">
        
            <div class="form-group"  style="margin-top:20px">
                <label for="Username">Enter your username/email</label>
                <input class="form-control" type="text" id="mailuid" name="mailuid" placeholder="username/email">
            </div>
            <div class="form-group" style="margin-top:20px">
                <label for="inputPassword1">Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group"  style="margin-top:20px">
                <div class="controls">
                    <button style="width: 100px; font-size: 18px" type="submit" name="login-submit" class="btn">Log in</button> 
                </div>
                <div style="margin-top: 20px">
                <a href="reset-password.php" style="font-size: 18px">Forgot password?</a>
                </div>
            </div>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="signup.php">New around here? Sign up</a>
      </div>
      </li>
   ';
        }
        else if (isset($_SESSION['id'])) {
         
         echo '<li class="nav-item"><a href="logout.php"><i class="paw fas fa-paw fa-lg"></i>Log out</a></li>'
          ;}
         ?> 
      </ul>
      </div>
  
        </div>
</nav>
