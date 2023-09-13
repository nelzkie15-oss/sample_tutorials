<?php

require 'connection.php';

  class class_php {
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


          // registration
          public function add_user($fullname, $emailaddress, $username, $password){

                   $role = "user";

                   $stmt = $this->pdo->prepare("INSERT INTO `tbl_members` (`fullname`, `emailaddress`, `username`, `password`, `role`)VALUES(?,?,?,?,?)");
                   $true = $stmt->execute([$fullname, $emailaddress, $username, $password, $role]);
                  if($true == true){
                   	 return true;
                   }else{
                   	  return false;
             }

          }

        // end registration

          //login

          public function login_user($emailaddress, $password){

             session_start();

              $stmt1 = $this->pdo->prepare("SELECT * FROM `tbl_members` WHERE `emailaddress` = :umail AND `password` = :upass AND `role` = :urole");
              $stmt1->execute(array(':umail' => $emailaddress, ':upass' => $password, ':urole' => 'Admin' ));
              $row = $stmt1->fetch(PDO::FETCH_ASSOC);

              $stmt2 = $this->pdo->prepare("SELECT * FROM `tbl_members` WHERE `emailaddress` = :umail AND `password` = :upass AND `role` = :urole");
              $stmt2->execute(array(':umail' => $emailaddress, ':upass' => $password, ':urole' => 'User' ));
              $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);


              if($stmt1->rowCount() > 0){
                $_SESSION['userid'] = htmlentities($row['member_id']);
                $_SESSION['logged_in'] = true;
               echo '1';
              }else if($stmt2->rowCount() > 0){
                $_SESSION['userid2'] = htmlentities($row2['member_id']);
                $_SESSION['logged_in2'] = true;
                echo '2';
                
                exit();
              }else{
                echo "<div class='alert alert-danger'>Incorrect Email Address or Password</div>";
              }
          }

       //end login

          // get session ID for admin

          public function fetch_adminsessionId($getsessionID){
             
               $query = $this->pdo->prepare("SELECT * FROM `tbl_members` WHERE `member_id` =  ?");
               $query->execute([$getsessionID]);
               return $query->fetchAll();


          }

          // end get session ID for admin 



         // get session ID for admin

          public function fetch_usersessionId($getsessionID){
             
               $query = $this->pdo->prepare("SELECT * FROM `tbl_members` WHERE `member_id` =  ?");
               $query->execute([$getsessionID]);
               return $query->fetchAll();


          }
    // end get session ID for admin 


         // add category


          public function add_category($category){
            $query = $this->pdo->prepare("INSERT INTO `tbl_category`(`category`)VALUES(?)");
            $true = $query->execute([$category]);
            if($true == true){
               return true;
            }else{
              return false;
            }

          }

          // end add category

      

          // get all category
              
        public function getallCategory(){
              $query = $this->pdo->prepare("SELECT * FROM `tbl_category` ORDER BY category_id  DESC");
               $query->execute();
               return $query->fetchAll();

        }

          // end get all category

        //row category

        public function row_category($category_id){
            $query = $this->pdo->prepare("SELECT * FROM `tbl_category` WHERE category_id  = ?");
            $query->execute([$category_id]);
            $row = $query->fetch();
            echo json_encode($row);

        }


        // end row category


        // edit category


        public function edit_category($category, $category_id){
            $query = "UPDATE `tbl_category` SET  `category` = ? WHERE category_id = ?";
             $update = $this->pdo->prepare($query)->execute([$category, $category_id]);
            if($update == true){
               return true;
            }else{
              return false;
            }

          }

        // end edit category


       //delete category


          public function delete_category($category_id){
          
            $query = $this->pdo->prepare("DELETE FROM `tbl_category` WHERE category_id  = ?");
            $delete =  $query->execute([$category_id]);
         if($delete == true){
               return true;
            }else{
              return false;
            }

          }

        //end delete category


   


  }
 ?>