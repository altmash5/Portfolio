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

      
       $sql = "INSERT INTO help_request (name,email,details)
     VALUES ('$name','$email','$details')";
     if (mysqli_query($conn, $sql)) {
      header("Location:/Portfolio/index.html");
     }

     mysqli_close($conn);
}
?>
