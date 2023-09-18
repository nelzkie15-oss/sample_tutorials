<?php
  
  $getcode = $_GET['reset'];

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sample Website</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="login"> <button class="btn btn-outline-success" type="submit">Login</button></a>
      </div>
    </div>
  </div>
</nav>

  <div class="container mt-3"> 
   <div class="card">
    <div class="card-body">

      <div class="row">

       <!-- div 6 1/2-->
        <div class="col-md-6">
         <div class="card">
           <div class="card-header">
             <img src="assets/images/file_1691955135.webp" style="width:100%;height: 200px;">
           </div>
           <div class="card-body">

           </div>
         </div>
        </div>

        <!--end div 6 1/2-->

       <!-- div 6 1/2-->
        <div class="col-md-6">
         <div class="card">
           <div class="card-header">Change Password</div>
           <div class="card-body">
             <form method="POST" id="logform">

              <div id="msg"></div>
               <div class="">
                  <center><span id="myalert2"></span></center>
               </div>
              
               <div class="" id="myalert" style="display: none;">
                     <div class="">
                        <center><span id="alerttext"></span></center>
                     </div>
               </div>

               <div class="" id="myalert3" style="display: none;">
                     <div class="">
                          <div class="alert alert-success" id="alerttext3"></div>
                     </div>
               </div>


               <div class="form-group">
                 <label>New Password</label>
                  <input type="text" class="form-control" id="password2" name="password" placeholder="Please enter New Password" required>
                  <span class="pass3-error"></span>
               </div>

               <div class="form-group">
                 <label>Confirm Password</label>
                  <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Please enter Confirm Password" required>
                  <span class="cpass-error"></span>
               </div>

               <div class="form-group mt-2">
                <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $getcode;?>">
                  <button type="button" class="btn btn-primary" id="btn-changepass" style="float: right;">Change password</button>
               </div>

            </form>

           </div>
         </div>
        </div>

        <!--end div 6 1/2-->

      </div>   


    </div>
  </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript"> 

    document.addEventListener('DOMContentLoaded', () => {
      let btn = document.querySelector('#btn-changepass')
          btn.addEventListener('click', (event) => {
              event.preventDefault();

              const password = document.querySelector('input[id=password2]').value;
              console.log('==========password==========')
              console.log(password);


              const confirm_password = document.querySelector('input[id=confirm_password]').value;
              console.log('==========confirm_password==========')
              console.log(confirm_password);

              const code = document.querySelector('input[id=code]').value;
              console.log('==========code==========')
              console.log(code);



            var data = new FormData(this.form);

            data.append('password', password);
            data.append('confirm_password', confirm_password);
            data.append('code', code);

        function isValidPassword2(){
                if($("#password2").val() === ""){
                  

                    $($("#password2")).addClass("is-invalid");
                    $(".pass3-error").html("Please Change Password");
                    $(".pass3-error").css({"color" : "red", "font-size" : "14px"})
                  return false;

                 }else{

                   $("#password2").removeClass("is-invalid").addClass("is-valid");
                   $(".pass3-error").html("");

                  return true;
           
                }
              }


         function isValidChangePassword(){
                if($("#confirm_password").val() === ""){
                  

                    $($("#confirm_password")).addClass("is-invalid");
                    $(".cpass-error").html("Please Change Password");
                    $(".cpass-error").css({"color" : "red", "font-size" : "14px"})
                  return false;

                 }else{

                   $("#confirm_password").removeClass("is-invalid").addClass("is-valid");
                   $(".cpass-error").html("");

                  return true;
           
                }
              }

           isValidPassword2();
           isValidChangePassword();

            if(isValidPassword2() === true && isValidChangePassword() === true){

                 $.ajax({

                         url: 'config/change_password.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,
                          async: false,
                          cache: false,
                      success: function(res){
                        console.log('==================res===========');
                        console.log(res);
                        $('#msg').html(res);

                    },error: function(res){
                      console.log("Failed Insert");
                    }

                  });

             }

          });
     });
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>