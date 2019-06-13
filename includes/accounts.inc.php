<?php
// Here we check whether the user got to this page by clicking the proper signup button.
session_start();
if (isset($_POST['submit-account_info'])) {
  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';

  // We grab all the data which we passed from the signup form so we can use it later.
  $username = $_SESSION['email'];
  $LN = $_POST['LN'];
  $FN = $_POST['FN'];
  $MN = $_POST['MN'];
  $CN = $_POST['CN'];
  $ECN =$_POST['ECN'];

	

   // Then we perform a bit of error handling to make sure we catch any errors made by the user. Here you can add ANY error checks you might think of! I'm just checking for a few common errors in this tutorial so feel free to add more. If we do run into an error we need to stop the rest of the script from running, and take the user back to the signup page with an error message. As an additional feature we will also send all the data back to the signup page, to make sure all the fields aren't empty and the user won't need to type it all in again.

  // We check for any empty inputs. (PS: This is where most people get errors because of typos! Check that your code is identical to mine. Including missing parenthesis!)
  if (empty($LN) || empty($FN) || empty($MN)|| empty($CN)|| empty($ECN)) {
    header("Location: ../accounts.php?error=emptyfields&uid=".$LN."&email=".$FN);
    exit();
 
   } else {
        // If we got to this point, it means the user didn't make an error! :)

        // Next thing we do is to prepare the SQL statement that will insert the users info into the database. We HAVE to do this using prepared statements to make this process more secure. DON'T JUST SEND THE RAW DATA FROM THE USER DIRECTLY INTO THE DATABASE!

        // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
        $sql = "UPDATE users SET userlname = ? , userfname= ? , contact_number = ? , emrgcontactname_1 = ? ,emrgcontactnumber_1= ? WHERE email = ? ";
	  $stmt = mysqli_prepare($conn, $sql);

	  mysqli_stmt_bind_param($stmt, "ssssss", $val1,$val2, $val3,$val4, $val5, $val6);

	    $val1 = $LN;
	    $val2 = $FN;
	    $val3 = $MN;
	    $val4 = $CN;
	    $val5 = $ECN;
	    $val6 = $username;
	  

        // Then we prepare our SQL statement AND check if there are any errors with it.
        if ( !mysqli_stmt_execute($stmt)) {
          // If there is an error we send the user back to the signup page.
         // header("Location: ../account	s.php?errorupdate=sqlerror");
          exit();
        }
        else {
          header("Location: ../accounts.php?accountupdate=success");
          exit();

        }
      }
  // Then we close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../accounts.php");
  exit();
}
