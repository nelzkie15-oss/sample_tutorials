<?php
  require_once "sample_class.php";

	if(ISSET($_POST)){
	  $conn = new class_php();

		$email_address = htmlspecialchars(strip_tags(stripslashes(trim($_POST['email_address']))));
	
		$check = $conn->check_email($email_address);
		if($check == TRUE){
		      echo $check;
		    
		  }else{
		    echo $check;

	
		}
	}

?>

