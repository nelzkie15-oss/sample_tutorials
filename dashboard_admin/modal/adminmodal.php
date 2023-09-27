
<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   <form method="POST">
      <div class="modal-body">
         <div id="msg_a"></div>
        <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="" id="fullname">
                  <span class="name-error"></span>
               </div>
           </div>
             <div class="col-md-6">
               <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="" id="emailaddress">
                    <span class="mail-error"></span>
               </div>
           </div>
        </div>

          <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="" id="username">
                    <span class="user-error"></span>
               </div>
           </div>
             <div class="col-md-6">
               <div class="form-group">
                  <label>Password</label>
                  <input type="email" class="form-control" name="" id="password">
                    <span class="pass-error"></span>

               </div>
           </div>
        </div>

         <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                  <label>Upload Image</label>
                  <img id="imgPlaceholder" src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-business-user-profile-vector-png-image_1541960.jpg" width="150px" height="150px" style="border:1px solid gray;margin-bottom: 3px;">
                  <input type="file" accept=".jpg, .png, .gif" id="chooseFile" class="form-control" name="">
                  <span class="pic-error"></span>
               </div>
           </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-admin">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <script>
       document.addEventListener('DOMContentLoaded', () => {
          let btn = document.querySelector('#btn-admin'); 
          btn.addEventListener('click', (e) => {
            // alert("click");

             
             const fullname = document.querySelector('input[id=fullname]').value;
             console.log("==============fullname===========");
             console.log(fullname);

             const emailaddress = document.querySelector('input[id=emailaddress]').value;
             console.log("==============emailaddress===========");
             console.log(emailaddress);

             const username = document.querySelector('input[id=username]').value;
             console.log("==============username===========");
             console.log(username);

             const password = document.querySelector('input[id=password]').value;
             console.log("==============password===========");
             console.log(password);

             const photo = document.querySelector('input[id=chooseFile]').value;
             console.log("===============photo==========");
             console.log(photo);



             var data = new FormData(this.form);
                 data.append('fullname', fullname);
                 data.append('emailaddress', emailaddress);
                 data.append('username', username);
                 data.append('password', password);
                 data.append('photo', $('#chooseFile')[0].files[0]);


             function isValidFullName(){
               if($("#fullname").val() === ""){
                  $("#fullname").addClass("is-invalid");
                  $(".name-error").html("Please input Fullname");
                  $(".name-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#fullname").removeClass("is-invalid").addClass("is-valid");
                   $(".name-error").css({"display":"none"});
                    return true;
                 }
           

             };


             function isValidEmail(){
               if($("#emailaddress").val() === ""){
                  $("#emailaddress").addClass("is-invalid");
                  $(".mail-error").html("Please input Email address");
                  $(".mail-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#emailaddress").removeClass("is-invalid").addClass("is-valid");
                   $(".mail-error").css({"display":"none"});
                    return true;
                 }
           

             };


            function isValidUserName(){
               if($("#username").val() === ""){
                  $("#username").addClass("is-invalid");
                  $(".user-error").html("Please input Username");
                  $(".user-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#username").removeClass("is-invalid").addClass("is-valid");
                   $(".user-error").css({"display":"none"});
                    return true;
                 }
           

             };


             function isValidPassword(){
               if($("#password").val() === ""){
                  $("#password").addClass("is-invalid");
                  $(".pass-error").html("Please input Password");
                  $(".pass-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#password").removeClass("is-invalid").addClass("is-valid");
                   $(".pass-error").css({"display":"none"});
                    return true;
                 }
           

             };


              function isValidPassword(){
               if($("#password").val() === ""){
                  $("#password").addClass("is-invalid");
                  $(".pass-error").html("Please input Password");
                  $(".pass-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#password").removeClass("is-invalid").addClass("is-valid");
                   $(".pass-error").css({"display":"none"});
                    return true;
                 }
           

             };

          function isValidPhoto(){
               if($("#chooseFile").val() === ""){
                  $("#chooseFile").addClass("is-invalid");
                  $(".pic-error").html("Please Upload Photo");
                  $(".pic-error").css({"color":"red", "font-size":"14px"});
                  return false;

               }else{

                  $("#chooseFile").removeClass("is-invalid").addClass("is-valid");
                   $(".pic-error").css({"display":"none"});
                    return true;
                 }
           

             };


             isValidFullName();
             isValidEmail();
             isValidUserName();
             isValidPassword();
             isValidPhoto();


               if(isValidFullName() === true && isValidEmail() === true && isValidUserName() === true
                  && isValidPassword() === true && isValidPhoto() === true){

                 $.ajax({

                         url: '../config/add_admin.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,
                          async: false,
                          cache: false,
                      success: function(response){
                        console.log('==================response===========');
                        console.log(response);
                        $('#msg_a').html(response);

                    },error: function(response){
                      console.log("Failed Insert");
                    }

                  });

             }


         });
       });
    </script>


   <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    $("#chooseFile").change(function () {
      readURL(this);
    });
  </script>