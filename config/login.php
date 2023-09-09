<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();

  	    $emailaddress = $_POST['emailaddress'];
  	    $password = $_POST['password'];
        $conn->login_user($emailaddress, $password);
   


     }

 ?>