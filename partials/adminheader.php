<style>
.logo_pic {
 /* Frame */

  position: absolute;
  height: 50px;
  left: 5px;

  }
    /*
    ADDITIONAL DEMO STYLE, NOT IMPORTANT TO MAKE THINGS WORK BUT TO MAKE IT A BIT NICER :)
*/
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 210px;
  background-color: black;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-align: center;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 210px;
  padding: 30px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}


/* Style the sidenav links and the dropdown button */
.dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: white;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: center;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidebar a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}
/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
  </style>

  

<div class="sidebar">
  <a  href="admindashboard.php">
            <img class="logo_pic" src="images\logo.png"></a><hr>
  <a href="manage_users.php">Manage Users</a>
  <a href="manage_bookings.php">Manage Bookings</a>
  <a href="managedog.php">Manage Dogs</a>
  <a href="add_services.php">Manage Services</a>
  <button class="dropdown-btn">Articles 
    <i class="fa fa-caret-down"></i>
  </button>
    
    <div class="dropdown-container">
      <a href="posts.php">Manage Articles</a>
      <a href="create_post.php">Create a post  </a>

      <a href="topics.php">Manage Topics </a>
    </div>
  <a href="reports.php">Reports</a>
  <a href="manage_contactus.php">Messages</a>

  <a href="logout.php">Logout</a>
</div>


     <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>   