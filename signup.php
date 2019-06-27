<?php
 session_start();
 // "require" creates an error message and stops the script. "include" creates an error and continues the script.
 require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
  include_once './partials/head.php';
?>
</head>

    <header>
        <?php
     include_once './partials/header.php';
  ?>
    </header>

    <body>
        <section class="section-default">
        <div class="containerform" style="background-color:creme;">
            <div class="col-xl" style="text-align: center">
          <h1>Signup</h1>
          <?php
          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if ($_GET["error"] == "invaliduidmail") {
              echo '<p class="signuperror">Invalid username and e-mail!</p>';
            }
            else if ($_GET["error"] == "invaliduid") {
              echo '<p class="signuperror">Invalid username!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="signuperror">Invalid e-mail!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<p class="signuperror">Username is already taken!</p>';
            }
          }
          // Here we create a success message if the new user was created.
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Signup successful!</p>';
            }
          }
          ?>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
            <?php
            // Here we check if the user already tried submitting data.

            // We check username.
            if (!empty($_GET["username"])) {
              echo '<input type="text" name="username" placeholder="Username" value="'.$_GET["username"].'"required>';
            }
            else {
              echo '<input type="text" name="username" placeholder="Username"required>';
            }

            // We check e-mail.
            if (!empty($_GET["email"])) {
              echo '<input type="text" name="email" placeholder="E-mail" value="'.$_GET["email"].'"required>';
            }
            else {
              echo '<input type="text" name="email" placeholder="E-mail"required>';
            }
            ?>
            <input type="password" name="password" placeholder="Password"required>
            <input type="password" name="pwd-repeat" placeholder="Repeat password"required>
            <button type="submit" name="signup-submit">Signup</button>
          </form>
          <!--
          NOTES FOR ME BEFORE DOING PHP!
          <form class="form-signup" action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
          </form>
          -->
          </div>
        </section>
      </div>
    </body>

    <footer>
<?php
     include_once './partials/footer.php';
  ?>
      </footer>
      </html>