<?php

  require_once "sample_class.php";

  if(ISSET($_POST['category_id'])){

  	  $conn = new class_php();
  	    $category_id = $_POST['category_id'];
        $conn->row_category($category_id);
   

     }

 ?>