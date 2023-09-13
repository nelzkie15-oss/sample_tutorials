<!-- Modal -->
    <div class="modal fade" id="editcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST">
            <div id="msg2"></div>
          <div class="modal-body">
            <div class="form-group">
               <label>Category</label>
               <input type="text" id="edit_category" name="category" class="form-control" placeholder="Enter Category">
               <span class="cat2-error"></span>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="edit_categoryid" name="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-editcategory">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', () => {
          let btn = document.querySelector('#btn-editcategory'); 
          btn.addEventListener('click', (e) => {

             
             const category = document.querySelector('input[id=edit_category]').value;
             console.log("==============category===========");
             console.log(category);

             const category_id = document.querySelector('input[id=edit_categoryid]').value;
             console.log("==============category_id===========");
             console.log(category_id);

             var row = new FormData(this.form);
                 row.append('category', category);
                 row.append('category_id', category_id);


             function isValidCategory2(){
               if($("#edit_category").val() === ""){
                  $("#edit_category").addClass("is-invalid");
                  $(".cat2-error").html("Please input category");
                  $(".cat2-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#edit_category").removeClass("is-invalid").addClass("is-valid");
                   $(".cat2-error").css({"display":"none"});
                    return true;
                 }
           

             };

             isValidCategory2();


               if(isValidCategory2() === true){

                 $.ajax({

                         url: '../config/edit_category.php',
                          type: "POST",
                          data: row,
                          processData: false,
                          contentType: false,
                          async: false,
                          cache: false,
                      success: function(res){
                        console.log('==================res===========');
                        console.log(res);
                        $('#msg2').html(res);

                    },error: function(res){
                      console.log("Failed Insert");
                    }

                  });

             }


         });
       });
    </script>
