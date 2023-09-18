<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();

  	    $password = htmlentities(strip_tags(stripcslashes(trim($_POST['password']))));
        $confirm_password = htmlentities(strip_tags(stripcslashes(trim($_POST['confirm_password']))));
        $code = htmlentities(strip_tags(stripcslashes(trim($_POST['code']))));

        $add = $conn->change_password($password, $code);
         
         if($add == TRUE){
         	echo "<div class='alert alert-success' role='alert' id='msg'>Change Password Successfully</div><script> setTimeout(function(){location.replace('login');}, 1000);</script>";
           }else{
           	echo "<div class='alert alert-danger' role='alert' id='msg'>Change Password Failed</div><script> setTimeout(function(){location.replace('login');}, 1000);</script>";
           }


     }

 ?>