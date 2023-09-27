<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();

  	    $fullname = htmlentities(strip_tags(stripcslashes(trim($_POST['fullname']))));
        $emailaddress = htmlentities(strip_tags(stripcslashes(trim($_POST['emailaddress']))));
        $username = htmlentities(strip_tags(stripcslashes(trim($_POST['username']))));
        $password = htmlentities(strip_tags(stripcslashes(trim($_POST['password']))));

        $files = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $photo ="../uploads/". addslashes($_FILES['photo']['name']);
        $file_size =  $_FILES['photo']['size'];
        move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/sample_tutorials/uploads/" .   addslashes($_FILES["photo"]["name"]));


        $add = $conn->add_admin($fullname, $emailaddress, $username, $password, $photo);
         
         if($add == TRUE){
         	echo "<div class='alert alert-success' role='alert' id='msg'>Added Admin Successfully</div><script> setTimeout(function(){location.replace('admin');}, 1000);</script>";
           }else{
           	echo "<div class='alert alert-danger' role='alert' id='msg'>Added Admin Failed</div><script> setTimeout(function(){location.replace('admin');}, 1000);</script>";
           }


     }

 ?>