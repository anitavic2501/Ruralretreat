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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/plotly-latest.min.js"></script>

<style>
  
  .alert-warning {
    color: #fcfaf6;
    background-color: #007c11;
    border-color: #063f01;
    text-align: center;
}	

.alert-warning2 {
    color: #fcfaf6;
    background-color: red;
    border-color: #063f01;
    text-align: center;
}	

  body {
     /* background: #8e9eab;
    background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);
    background: linear-gradient(to right, #eef2f3, #8e9eab); */
    font-family: 'Raleway', sans-serif;
    color: black;
    font-size: 18px;
    padding-bottom: 20px;
  }
  .services{
    text-align: center;
    background-color: white;
  }

  h1 {font-family: 'Rochester', cursive;
    font-size: 90px;
  }
  
  #booking{
    text-align: center;
  }

  #booking-form{
    align: center;
  }
  .contact {
    background-color: #FFFA80;
    background-size: 100%;
  }

  footer {
  
  background-color : darkgray;
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
.wrapper-main {
  width: 900px;
  margin: 0 auto;
}

/* signup.php */

.form-signup {
  margin: 0 auto;
  padding-top: 20px;
  width: 400px;
}

.form-signup input {
  width: calc(80% - 10px);
  height: 40px;
  padding: 0 15px;
  margin-bottom: 10px;
  border: 1px solid #CCC;
  border-radius: 4px;
  background-color: lightyellow;
}

.form-signup button {
  display: block;
  height: 40px;
  padding: 0 10px;
  margin: 0 auto;
  border: none;
  border-radius: 4px;
  background-color: #333;
  font-family: arial;
  font-size: 13px;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
}
.signuperror {
  padding-top: 14px;
  font-family: arial;
  font-size: 16px;
  color: red;
  text-align: center;
}

.signupsuccess {
  padding-top: 14px;
  font-family: arial;
  font-size: 16px;
  color: green;
  text-align: center;
}

/*radio button for dog gender*/
/* The container */
.doggender {
  display: block;
  align: center;
  text-align: center;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
}

/* Hide the browser's default radio button */
.doggender input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.doggender:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.doggender input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.doggender input:checked ~ .checkmark:after {
  display: block;
}

.doggender .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 90%;
	background: white;
}

/*booking background*/
.bookingpage{
  background: url(./images/dogbooking.png); 
  background-position: 50% 50%;
  background-origin: border-box;
  background-repeat : no-repeat;
  background-size: 60%;
  color: white;
  width: 1583px;
  height : 884px;

}
/*services page*/

.dogspa{
  padding-right:155px;
  padding-left:155px;
  padding-top:55px; }
/*userprofile*/

.userprofile{
  text-align: center;

}
</style>