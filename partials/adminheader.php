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
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
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
  margin-left: 200px;
  padding: 1px 16px;
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
  </style>

  

<div class="sidebar">
  <a  href="admindashboard.php">
            <img class="logo_pic" src="images\logo.png"></a><hr>
  <a href="manage_users.php">Manage Users</a>
  <a href="manage_bookings.php">Manage Bookings</a>
  <a href="managedog.php">Manage Dogs</a>
  <a href="add_services.php">Manage Services</a>
  <a href="manage_articles.php">Manage Articles</a>
  <a href="reports.php">Reports</a>
  <a href="messages.php">Messages</a>

  <a href="logout.php">Logout</a>
</div>
        