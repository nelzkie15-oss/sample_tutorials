<?php

     require 'connection.php';

  class classSample
     {
      private $server = DB_HOST;
      private $user   = DB_USER;
      private $pass   = DB_PASS;
      private $db     = DB_NAME;
      private $pdo; 

      public function __construct()
      {
           $this->db_connect();
      }

   public function db_connect()//connection OOP PDO
        {
        	$this->pdo = null;
          try{
              $this->pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->user, $this->pass);
             	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              if(!$this->pdo){
              	return false;
              }	
          }catch(PDOException $e){
             echo $e->getMessage();
          }
        }


          public function add_member($fullname, $emailaddress, $username, $password){

                   $stmt = $this->pdo->prepare("INSERT INTO `tbl_members` (`fullname`, `emailaddress`, `username`, `password`)VALUES(?,?,?,?)");
                   $true = $stmt->execute([$fullname, $emailaddress, $username, $password]);
                  if($true == true){
                   	 return true;
                   }else{
                   	  return false;
                   }

          }




     }



 ?>