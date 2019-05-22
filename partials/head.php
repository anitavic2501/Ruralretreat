<meta charset="UTF-8" />
<title>Rural Retreat</title>

<!-- CSS (load bootstrap from a CDN) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway|Rochester" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"  crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css" type="text/css"/>
  <!-- <script src="js/plotly-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/plotly-latest.min.js"></script>

<style>
header.masthead {
    background: no-repeat center center;
    background-attachment: scroll;
    position: relative;
    background-size: 2000px;
    margin-bottom: 50px;
}

header.masthead .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: #212529;
  opacity: 0.5;
}



header.masthead .page-heading,
header.masthead .post-heading,
header.masthead .site-heading {
  padding: 200px 0 150px;
  color: white;
  text-align: center;
}


  body {
     background: #8e9eab;
    background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);
    background: linear-gradient(to right, #eef2f3, #8e9eab); */
    font-family: 'Raleway', sans-serif;
    color: black;
    font-size: 24px;
  }

  h1 {font-family: 'Rochester', cursive;
    font-size: 90px;
    color: white;
  }
   
  .margin-10 {
    margin: 20px;
  }
  footer {
    margin-top : 20px;
  background-color : #FAED26;
  color: #5A5560;
  font-size: 12px;
  align : center;
  display: block;
}

h2{
  font-weight: 800;
  color: #5A5560;
}
b{
  color: #0677A1;
}
</style>
<?php
require_once 'core.php';
require_once 'user.php';

$loginerror = "";
$user = new user();
if (isset($_POST['login'])) {
    if (!$user->login()) {
        $loginerror = "Invalid Username or Password";
        echo '<script>alert("' . $loginerror . ' , Please Try Again ")</script>';
        header('#login');
    }
}

if ($user->loggedin()) {
    $user_id = $_SESSION['users']['user_id'];
    $user_type_id = $_SESSION['users']['user_type_id'];
}
?>