
<?php require_once 'header_sidebar/menu.php';?>
    <div id="layoutSidenav_content">
        <main>
            
            <div class="container-fluid px-4">
                <h1 class="mt-4">Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>
    
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">

                           </div>
                           <div class="col-md-2 mb-2">
                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminModal" value="New Admin">New Admin</button>

                           </div>
                            <hr>
                     </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                             <?php foreach($getalladmin as $row){

                                

                              ?>
                                <tr>
                                    <th><img src="<?= $row['photo'] ;?>" width="50" height="50"></th>
                                    <th><?= $row['fullname'] ;?></th>
                                    <th><?= $row['emailaddress'] ;?></th>
                                    <th><?= $row['username'] ;?></th>
                                    <th><?= $row['password'] ;?></th>
                                    <th style="width: 15%"><div class="d-flex"><div class="flex-1"><button type="button" class="btn btn-primary btn-sm btn-editcat" data-id="<?php echo $row['admin_id'] ;?>">Edit</button></div>&nbsp; <div class="flex-1"><button type="button" class="btn btn-danger btn-sm btn-delerecat" data-del="<?php echo $row['admin_id'] ;?>">Delete</button></div></div></th>

                                </tr>                                
                           <?php  } ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
         
            </div>
        </main>


         <?php include "modal/adminmodal.php";?>
         <?php include "modal/editcategory.php";?>
         <?php include "modal/deletecategory.php";?>

        <script>
            
       $(document).ready(function() {   
           load_data();    
           var count = 1; 
           function load_data() {
               $(document).on('click', '.btn-editcat', function() {
                  $('#editcategoryModal').modal('show');
                    var category_id = $(this).data("id");
                    console.log(category_id);
                      get_delId(category_id); //argument    
             
               });
            }

             function get_delId(category_id) {
                  $.ajax({
                      type: 'POST',
                      url: '../config/row_category.php',
                      data: {
                          category_id: category_id
                      },
                      dataType: 'json',
                      success: function(response2) {
                      console.log(response2);
                      $('#edit_categoryid').val(response2.category_id);
                      $('#edit_category').val(response2.category);
                   }
                });
             }
       
       });
        
  </script>


<script>
            
       $(document).ready(function() {   
           load_data();    
           var count = 1; 
           function load_data() {
               $(document).on('click', '.btn-delerecat', function() {
                  $('#deletecategoryModal').modal('show');
                    var category_id = $(this).data("del");
                    console.log(category_id);
                      get_delIds(category_id); //argument    
             
               });
            }

             function get_delIds(category_id) {
                  $.ajax({
                      type: 'POST',
                      url: '../config/row_category.php',
                      data: {
                          category_id: category_id
                      },
                      dataType: 'json',
                      success: function(response3) {
                      console.log(response3);
                      $('#delete_categoryid').val(response3.category_id);
                   }
                });
             }
       
       });
        
  </script>

        </script>
     <?php require_once 'footer/footer.php';?>