<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){


  	  $conn = new classSample();

  	    $fullname = $_POST['fullname'];
  	    $emailaddress = $_POST['emailaddress'];
  	    $username = $_POST['username'];
  	    $password = $_POST['password'];


        $add = $conn->add_member($fullname, $emailaddress, $username, $password);
         
         if($add == TRUE){
         	echo "<div class='alert alert-success' role='alert' id='msg'>Added Member Successfully</div><script> setTimeout(function(){location.replace('index.php');}, 1000);</script>";
           }else{
           	echo "<div class='alert alert-danger' role='alert' id='msg'>Added Member Failed</div><script> setTimeout(function(){location.replace('index.php');}, 1000);</script>";
           }


     }

 ?>