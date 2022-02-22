<?php
include 'conn.php';
require_once "Mail.php";

if(isset($_POST['name']))
{    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $details = $_POST['details'];
      echo $name;
      echo $email;
      echo $details;

      
      $host = "https://email-smtp.ap-south-1.amazonaws.com";
      $username = "AKIA5XYOU3SH626A7QNY";
      $password = "BOSGx0izgJrvGW5x5FH52kH7Ys8WkpcH1kFaxrgBKzSY";
      $port = "465";
      $to = "altmashr55@gmail.com";
      $email_from = "fp@pufdemo.tk";
      $email_subject = "Subject Line Here:" ;
      $email_body = "whatever you like" ;
      $email_address = "fp@pufdemo.tk";
      
      $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
      $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
      $mail = $smtp->send($to, $headers, $email_body);
      
      
      if (PEAR::isError($mail)) {
      echo("<p>" . $mail->getMessage() . "</p>");
      } else {
      echo("<p>Message successfully sent!</p>");
      }

     $sql = "INSERT INTO help_request (name,email,details)
     VALUES ('$name','$email','$details')";
     if (mysqli_query($conn, $sql)) {
      header("Location:Portfolio/index.html");
     }

     mysqli_close($conn);
}
?>
