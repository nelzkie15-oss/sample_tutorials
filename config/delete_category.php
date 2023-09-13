<?php

  require_once "sample_class.php";

  if(ISSET($_POST)){

  	  $conn = new class_php();
        $category_id = htmlentities(strip_tags(stripcslashes(trim($_POST['category_id']))));

        $del = $conn->delete_category($category_id);
         
         if($del == TRUE){
         	echo "<div class='alert alert-success' role='alert' id='msg'>Deleted category Successfully</div><script> setTimeout(function(){location.replace('category');}, 1000);</script>";
           }else{
           	echo "<div class='alert alert-danger' role='alert' id='msg'>Deleted category Failed</div><script> setTimeout(function(){location.replace('category');}, 1000);</script>";
           }


     }

 ?>