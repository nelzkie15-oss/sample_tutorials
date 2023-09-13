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
           <div class="card-header">Login Page</div>
           <div class="card-body">
             <form method="POST" id="logform">

              <div id="msg_login"></div>
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
                 <label>Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Please enter Email Address" required>
                  <span class="email-error"></span>
               </div>


               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Please enter Password" required>
                    <span class="pass-error"></span>
               </div>

               <div class="form-group mt-2">
                  <button type="button" class="btn btn-primary" id="login-button" style="float: right;">Sign In</button>
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

<script>
  
// Wait for document to load
        $(document).ready(() => {
            $('#logform').on('submit', () => {

                // prevents default behaviour
                // Prevents event propagation
                return false;
            });
        });
        $('#logform').keypress((e) => {

            // Enter key corresponds to number 13
            if (e.which === 13) {
                $('#logform').submit();
                console.log('form submitted');
            }
        })


        $(document).on('click', '#login-button', function() {

            if ($('#emailaddress').val() != '' && $('#password').val() != '') {

                // $('#login-button').html(' Loading...');
                $('#myalert').slideUp();
                $('#myalert3').slideUp();
                var logform = $('#logform').serialize();
                setTimeout(function() {
                    $.ajax({
                        method: 'POST',
                        url: 'config/login.php',
                        data: logform,
                        //   beforeSend: function() {

                        //    $('#login-button').html(' Loading...');
                        //    $('#login-button').html('');
                        // },
                        success: function(data) {
                            if (data == 1) {

                                $('#myalert3').slideDown();
                                $('#alerttext3').html(data);
                                $('#alerttext3').html('<i class="fa fa-check"></i> Login Successful. User Verified!');
                                $('#login-button').text('Login');
                                $('#logform')[0].reset();
                                $('#myalert').hide();
                                $('#alerttext').hide();
                                $('#myalert2').hide();
                                $('#alerttext2').hide();
                                setTimeout(function() {
                                    window.location = '/sample_tutorials/dashboard_admin/home.php';
                                }, 1000);
                            }  else if (data == 2) {

                                $('#myalert3').slideDown();
                                $('#alerttext3').html(data);
                                $('#alerttext3').html('<i class="fa fa-check"></i> Login Successful. User Verified!');
                                $('#login-button').text('Login');
                                $('#logform')[0].reset();
                                $('#myalert').hide();
                                $('#alerttext').hide();
                                $('#myalert2').hide();
                                $('#alerttext2').hide();
                                setTimeout(function() {
                                    window.location = '/sample_tutorials/dashboard_user/home.php';
                                }, 1000);
                            } else {
                                $('#myalert').slideDown();
                                $('#alerttext').html(data);
                                $('#logtext').text('Login');
                                $('#logform')[0].reset();
                                $('#myalert2').hide();
                                $('#alerttext3').hide();

                            }
                        }
                    });
                }, 1000);
            } else {
                $('#myalert2').slideDown();
                $('#myalert').hide();
                $('#alerttext3').hide();
                $('#myalert2').html('<div class="alert alert-warning err_msg"><i class="fa fa-info"></i> Please input both fields/select to Login</div>');
                $('#logtext').text('Login');
                $('#logform')[0].reset();

            }
        });


</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>