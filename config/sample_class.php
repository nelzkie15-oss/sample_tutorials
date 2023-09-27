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
                   $hashpass = password_hash($password, PASSWORD_DEFAULT);

                   $stmt = $this->pdo->prepare("INSERT INTO `tbl_members` (`fullname`, `emailaddress`, `username`, `password`, `role`)VALUES(?,?,?,?,?)");
                   $true = $stmt->execute([$fullname, $emailaddress, $username, $hashpass, $role]);
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

                $stmt1 = $this->pdo->prepare("SELECT admin_id, password FROM tbl_admin WHERE emailaddress = :uemail AND role = 'Admin'");
                $stmt1->bindParam(':uemail', $emailaddress);
                $stmt1->execute();
                $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

                $stmt2 = $this->pdo->prepare("SELECT member_id, password FROM tbl_members WHERE emailaddress = :uemail AND role = 'User'");
                $stmt2->bindParam(':uemail', $emailaddress);
                $stmt2->execute();
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

                  if($stmt1->rowCount() > 0){

                      if (password_verify($password, $row1['password'])) {
                              $_SESSION['userid'] = htmlentities($row1['admin_id']);
                               $_SESSION['logged_in'] = true;
                               echo '1';

                    }else {
                         echo "<div class='alert alert-danger'>Invalid password!</div>";
                    }

                }else if($stmt2->rowCount() > 0){
                        // Verify the password
                        if (password_verify($password, $row2['password'])) {
                  
                           $_SESSION['userid2'] = htmlentities($row2['member_id']);
                           $_SESSION['logged_in2'] = true;
                           echo '2';

                        }else {
                         echo "<div class='alert alert-danger'>Invalid password!</div>";
                     }          
                
                exit();
              }else{
                echo "<div class='alert alert-warning'>Incorrect Email Address or Password</div>";
              }
           }

       //end login

          // get session ID for admin

          public function fetch_adminsessionId($getsessionID){
             
               $query = $this->pdo->prepare("SELECT * FROM `tbl_admin` WHERE `admin_id` =  ?");
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


   
        public function send_email($code, $email){

          $sql = "UPDATE `tbl_members` SET  `code` = ? WHERE emailaddress = ?";
           $update = $this->pdo->prepare($sql)->execute([$code, $email]);
             if ($update == true) {
                 return true;
              } else {
                 return false;
            }

         }

       public function change_password($password, $code){
           
          $sql = "UPDATE `tbl_members` SET  `password` = ?, `code` = '' WHERE code = ?";
           $update = $this->pdo->prepare($sql)->execute([$password, $code]);
             if ($update == true) {
                 return true;
              } else {
                 return false;
            }

         }



     public function check_email($email_address){

         
          $query = $this->pdo->prepare("SELECT emailaddress FROM tbl_members WHERE emailaddress = ?");
          $query->execute([$email_address]);
          $email = $query->rowCount();
           print($email);  



     }


     public function getallMembers(){

          $query = $this->pdo->prepare("SELECT * FROM `tbl_members` ORDER BY member_id  DESC");
               $query->execute();
               return $query->fetchAll();



     }

     public function add_admin($fullname, $emailaddress, $username, $password, $photo){


                   $role = "Admin";
                   $hashpass = password_hash($password, PASSWORD_DEFAULT);

                   $stmt = $this->pdo->prepare("INSERT INTO `tbl_admin` (`fullname`, `emailaddress`, `username`, `password`, `photo`, `role`)VALUES(?,?,?,?,?,?)");
                   $true = $stmt->execute([$fullname, $emailaddress, $username, $hashpass, $photo, $role]);
                  if($true == true){
                     return true;
                   }else{
                      return false;
             }


     }

     public function getallAdmin(){

               $query = $this->pdo->prepare("SELECT * FROM `tbl_admin` ORDER BY admin_id  DESC");
               $query->execute();
               return $query->fetchAll();
       }



  }
 ?>