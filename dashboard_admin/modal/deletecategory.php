<!-- Modal -->
    <div class="modal fade" id="deletecategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST">
            <div id="msg4"></div>
          <div class="modal-body">
            <div class="form-group">
              <h6>Are you sure you want to delete it? </h6>
          </div>
        </div>
          <div class="modal-footer">
            <input type="hidden" id="delete_categoryid" name="">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary" id="btn-deletecategory">Yes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <script>
       document.addEventListener('DOMContentLoaded', () => {
          let btn = document.querySelector('#btn-deletecategory'); 
          btn.addEventListener('click', (e) => {

             
             const category_id = document.querySelector('input[id=delete_categoryid]').value;
             console.log("==============category_id===========");
             console.log(category_id);

             var row = new FormData(this.form);
                 row.append('category_id', category_id);


                 $.ajax({

                         url: '../config/delete_category.php',
                          type: "POST",
                          data: row,
                          processData: false,
                          contentType: false,
                          async: false,
                          cache: false,
                      success: function(res){
                        console.log('==================res===========');
                        console.log(res);
                        $('#msg4').html(res);

                    },error: function(res){
                      console.log("Failed Insert");
                    }

                  });

             


         });
       });
    </script>
