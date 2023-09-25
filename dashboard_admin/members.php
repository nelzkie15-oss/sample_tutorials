
<?php require_once 'header_sidebar/menu.php';?>
    <div id="layoutSidenav_content">
        <main>
            
            <div class="container-fluid px-4">
                <h1 class="mt-4">Members</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                    <li class="breadcrumb-item active">Members</li>
                </ol>
    
                <div class="card mb-4">
                    <div class="card-header">
                     </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                             <?php foreach($getalluser as $row){ ?>
                                <tr>
                                    <th><?= $row['member_id'] ;?></th>
                                    <th><?= $row['fullname'] ;?></th>
                                    <th><button type="button" class="btn btn-primary btn-sm btn-editcat" data-id="<?php echo $row['member_id'] ;?>">Edit</button> <button type="button" class="btn btn-danger btn-sm btn-delerecat" data-del="<?php echo $row['member_id'] ;?>">Delete</button></th>

                                </tr>                                
                           <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
         
            </div>
        </main>

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