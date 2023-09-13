<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();

  	    $category = htmlentities(strip_tags(stripcslashes(trim($_POST['category']))));

        $add = $conn->add_category($category);
         
         if($add == TRUE){
         	echo "<div class='alert alert-success' role='alert' id='msg'>Added category Successfully</div><script> setTimeout(function(){location.replace('category');}, 1000);</script>";
           }else{
           	echo "<div class='alert alert-danger' role='alert' id='msg'>Added category Failed</div><script> setTimeout(function(){location.replace('category');}, 1000);</script>";
           }


     }

 ?>