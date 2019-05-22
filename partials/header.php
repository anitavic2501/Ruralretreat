
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" >
  <!-- <div class="container-fluid"> -->
    <!-- <div class="navbar-header"> -->
    <style>
      

  #mainNav {
  position: absolute;
  border-bottom: 1px solid #e9ecef;
  background-color: white;
  font-family: 'Raleway', sans-serif;
}

#mainNav .navbar-brand {
  font-weight: 800;
  color: #343a40;
}

#mainNav .navbar-toggler {
  font-size: 12px;
  font-weight: 800;
  padding: 13px;
  text-transform: uppercase;
  color: #343a40;
}

#mainNav .navbar-nav > li.nav-item > a {
  font-size: 16px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
}

@media only screen and (min-width: 992px) {
  #mainNav {
    border-bottom: 1px solid transparent;
    background: transparent;
  }
  #mainNav .navbar-brand {
    padding: 10px 20px;
    color: #fff;
  }
  #mainNav .navbar-brand:focus, #mainNav .navbar-brand:hover {
    color: rgba(255, 255, 255, 0.8);
  }
  #mainNav .navbar-nav > li.nav-item > a {
    padding: 10px 20px;
    color: #fff;
  }
  #mainNav .navbar-nav > li.nav-item > a:focus, #mainNav .navbar-nav > li.nav-item > a:hover {
    text-decoration-line: underline;
    background: #555; 
  display: block; 
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
  #mainNav.is-fixed .navbar-brand {
    color: #212529;
  }
  #mainNav.is-fixed .navbar-brand:focus, #mainNav.is-fixed .navbar-brand:hover {
    color: #0085A1;
  }
  #mainNav.is-fixed .navbar-nav > li.nav-item > a {
    color: #212529;
  }
  #mainNav.is-fixed .navbar-nav > li.nav-item > a:focus, #mainNav.is-fixed .navbar-nav > li.nav-item > a:hover {
    color: #0085A1;
  }
  #mainNav.is-visible {
    /* if the user changes the scrolling direction, we show the header */
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}
      </style>

      <a class="navbar-brand" href="index.php">
            <img src="images\logo.png" width="250px">
      
        <?php
        
        //to show the name of the user when logged in
        if ($user->loggedin()) {
        echo  'Welcome ';
        echo $_SESSION['users']['fname'];

        }
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a  class="nav-link" href="products.php">Our Services</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="show_map.php">Our location</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="">Booking DEMO</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link" href="index.php#section3">Contact Us</a> </li>
        <?php

          //When the user is a CUSTOMER, then show the SEND FEEDBACK form
          if ($user->loggedin() && $user_type_id == 3){
            echo ' <li class="nav-item"><a class="nav-link" href="edit_customer.php">Edit my profile</a></li>';  
            echo ' <li class="nav-item"><a class="nav-link" href="feedback.php">Send feedback</a></li>';
            echo ' <li class="nav-item"><a class="nav-link" href="customer_reservations.php">My Reservations</a></li>';
            echo '';
          }
          //When the user is ADMIN, show some options
          if ($user->loggedin() && $user_type_id == 1){
            echo ' <li class="nav-item"><a class="nav-link" href="list_of_users.php">List of users</a></li>';
          }
          if($user->loggedin() && ($user_type_id == 1 || $user_type_id == 2))
            echo '<li class="nav-item"><a class="nav-link" href="add_car.php">Add new car</a></li>';
          
          if($user->loggedin() &&  ($user_type_id == 1 || $user_type_id == 2)){
            echo '<li class="nav-item"><a class="nav-link" href="staff_reports.php">Reports</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="manage_reservations.php">Manage reservations</a></li>';
          }
         if ($user->loggedin() && $user_type_id == 1){
          echo '<li class="nav-item"><a class="nav-link" href="register.php">Add new user</a></li>';
         }
         if (!$user->loggedin())
         echo '
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                Log in</a>
              <div class="dropdown-menu">
              <form class="px-4 py-3" action="index.php" method="POST">
                  
                  <div class="form-group"  style="margin-top:20px">
                      <label for="Username">Username</label>
                      <input class="form-control" type="text" id="Username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group" style="margin-top:20px">
                      <label for="inputPassword1">Password</label>
                      <input class="form-control" type="password" name="password" id="inputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group"  style="margin-top:20px">
                      <div class="controls">
                          <button style="width: 100px; font-size: 18px" type="submit" name="login" class="btn">Sign in</button> 
                      </div>
                      <div style="margin-top: 20px">
                      <a href="forget_password.php" style="font-size: 18px">Forgot password?</a>
                      </div>
                  </div>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="register.php">New around here? Sign up</a>
              <a class="dropdown-item" href="forget_password.php">Forgot password?</a>
            </div>
            </li>
         ';
         
         if ($user->loggedin())
         echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>';
        ?>
      </ul>
      </div>
  <!-- </div> -->

</nav>
