<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

// First we check if the form was submitted.
if (isset($_POST['reset-request-submit'])) {

  /* The first thing you should know about reset password scripts, is that we need to make it as secure as possible. To help do this we will be creating "tokens" to ensure that it is the correct user who tries to reset their password.

  Tokens are used to make sure it is the correct user that is trying to reset their password. I will explain more on this later.

  When we create the two tokens, we use random_bytes() and bin2hex(), which are build-in functions in PHP. random_bytes() generates cryptographically secure pseudo-random bytes, which we then convert to hexadecimal values so we can actually use it. Right now we are only going to use the bin2hex() on the "selector" because later we need to insert the "token" into the database in binary.

  // Later we will also include these tokens into a link which we then send the user by mail so they can reset their password. */

  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);

  // The reason we need to have a "selector" and a "token" is to prevent timing attacks, which is when we limit the speed at which a hacker can attempt to hack our script. I will get more into this later in the next script.

  // Then we create the URL link which we will send the user by mail so they can reset their password.
  // Notice that we convert the "token" to hexadecimals here as well, to make the URL usable.
  $url = "http://localhost/RRV2/ruralretreat/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token) ;

  // Then we need to define when the tokens should expire. We do this for security reasons to make sure the same token can't be used for more than an hour.

  // Then we set the timestamp and add another hour to the current time, and then pass it into the format we defined.
  $expires = date("U") + 1800;

  // Next we delete any existing tokens that might be in the database. We don't want to fill up our database with unnecessary data we don't need anymore.

  // First we need to get our database connection.
  require 'dbh.inc.php';

  // Then we grab the e-mail the user submitted from the form.
  $userEmail = $_POST["email"];

  // Finally we delete any existing entries.
  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }

  // Here we then insert the info we have regarding the token into the database. This means that we have something we can use to check if it is the correct user that tries to change their password.
  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    // Here we also hash the token to make it unreadable, in case a hacker accessess our database.
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  // Here we close the statement and connection.
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  // The last thing we need to do is to format an e-mail and send it to the user, so they can click a link that allow them to reset their password.

  // Who are we sending it to.
  $to = $userEmail;

  // Subject
  $subject = 'Reset your password for Rural Retreat';

  // Message
  $message = '<strong>Hello</strong>, We received a password reset request. 
    The link to reset your password is below. 
    
    Here is your password reset link:
    '. $url .'
    If you did not make this request, you can ignore this email';
echo '<br>';

  $headers = "From: Rural Retreat <ruralretreat123@gmail.com>\r\n";

  // Send e-mail
//  if (mail($to, $subject, $message, $headers)){ 

//  echo "succesfully sent";

//   // Finally we send them back to a page telling them to check their e-mail.
//   header("Location: ../reset-password.php?reset=success");
// } else {
//   echo 'error!';

//   exit();
// }




$mail = new PHPMailer(true);


try {
//Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ruralretreat123@gmail.com';                     // SMTP username
    $mail->Password   = '123rural';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ruralretreat123@gmail.com', 'Rural Retreat');
    // var_dump($_SESSION['email']);

    $mail->addAddress(''.$userEmail.'', 'test');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    echo '
    <script>
      alert("Message has been sent");
      window.location = "../index.php";
    </script>;
   ';


    }   catch (Exception $e) {
    echo "<script>console.log('mail not sent')</script>";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo '
    <script>
      alert("Message could not be sent. Mailer Error: {'.$mail->ErrorInfo.'}");
      window.location = "../index.php";
    </script>
  ';
    }



}
?>