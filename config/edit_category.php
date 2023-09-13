<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();

  	    $category = htmlentities(strip_tags(stripcslashes(trim($_POST['category']))));
        $category_id = htmlentities(strip_tags(stripcslashes(trim($_POST['category_id']))));

        $edit = $conn->edit_category($category, $category_id);
         
         if($edit == TRUE){
         	echo "<div class='alert alert-success' role='alert' id='msg'>Updated category Successfully</div><script> setTimeout(function(){location.replace('category');}, 1000);</script>";
           }else{
           	echo "<div class='alert alert-danger' role='alert' id='msg'>Updated category Failed</div><script> setTimeout(function(){location.replace('category');}, 1000);</script>";
           }


     }

 ?>