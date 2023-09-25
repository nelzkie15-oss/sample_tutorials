<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sample Website</title>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');
      body{
        font-family: 'Ubuntu', sans-serif;
      }
      .d-block{
        width: 100%;
        height: 350px;
      }
      .top{
        margin-top: 10%;
      }
    </style>

    <style>
       #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('assets/loading/Dual Ring-1s-200px.png') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
        }
       
  </style>
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript">
      $(window).on('load', function(){
        setTimeout(function(){
              $('#loader').fadeOut('slow');  
          });
      });
    </script>
  </head>
  <body>
    <div id="loader"></div>
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
     <div class="col-sm-12 col-md-6 col-lg-7">
      <div class="card">
          <div class="card-body">
     

            <!-- slide -->

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="assets/images/91617500-charity-and-donation-background-with-various-icons.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="assets/images/donation-boxes-background-free-vector.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="assets/images/desktop-wallpaper-blood-bank-blood-donation.jpg" class="d-block" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
             <!-- end slide -->
          </div>
        </div>


        </div>
        <!--end div 6 1/2-->

       <!-- div 6 1/2-->
        <div class="col-md-5">
         <div class="card">
           <div class="card-header">Registration Page</div>
           <div class="card-body">
             <form method="POST">
              <div id="msg"></div>

              <div class="form-group">
                 <label>Full Name</label>
                 <input  type="text" class="form-control" id="full_name"  alt="full_name" placeholder="Please enter Full name" autocomplete="off">
                 <span class="fname-error"></span>
               </div>

               <div class="form-group">
                 <label>Email Address</label>
                  <input type="text" class="form-control" id="email_address" alt="email_address" placeholder="Please enter Email Address" autocomplete="off">
                  <span class="email-error"></span>
                  <!-- <label id="msg-emil" style="color:#CC0000;" ></label><br> -->
               </div>

               <div class="form-group">
                 <label>Username</label>
                 <input type="text" class="form-control" id="username" alt="username" placeholder="Please enter Username" autocomplete="off">
                  <span class="uname-error"></span>
               </div>

               <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" alt="password" placeholder="Please enter Password" autocomplete="off">
                    <span class="pass-error"></span>
               </div>

               <div class="form-group mt-2">
                  <button type="button" class="btn btn-primary" value="Submit" id="btn-submit">Submit</button>
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

<!-- <script type="text/javascript">
      $(document).ready(function() {
   
          var timeOut = null; // this used for hold few seconds to made ajax request
   
          var loading_html = '<img src="assets/images/output-onlinegiftools.gif" style="height: 40px; width: 40px;"/>'; // just an loading image or we can put any texts here
   
          //when button is clicked
          $('#email_address').keyup(function(e){
   
              // when press the following key we need not to make any ajax request, you can customize it with your own way
              switch(e.keyCode)
              {
                  //case 8:   //backspace
                  case 9:     //tab
                  case 13:    //enter
                  case 16:    //shift
                  case 17:    //ctrl
                  case 18:    //alt
                  case 19:    //pause/break
                  case 20:    //caps lock
                  case 27:    //escape
                  case 33:    //page up
                  case 34:    //page down
                  case 35:    //end
                  case 36:    //home
                  case 37:    //left arrow
                  case 38:    //up arrow
                  case 39:    //right arrow
                  case 40:    //down arrow
                  case 45:    //insert
                  //case 46:  //delete
                      return;
              }
              if (timeOut != null)
                  clearTimeout(timeOut);
              timeOut = setTimeout(is_available, 500);  // delay delay ajax request for 1000 milliseconds
              $('#msg-emil').html(loading_html); // adding the loading text or image
          });
    });
  function is_available(){
      //get the username
      var email_address = $('#email_address').val();
   
      //make the ajax request to check is email available or not
      $.post("config/check_email.php", { email_address: email_address },
      function(result)
      {
          console.log(result);
          if(result != 0)
          {
            $('#msg-emil').html('Email already exists');
            document.getElementById("btn-submit").disabled = true;
          } else
          {
              $('#msg-emil').html('<span style="color:#006600;">Available</span>');
              document.getElementById("btn-submit").disabled = false;
          }
      });
   
  }
  </script>
 -->
  
  <!-- jquery and javascript -->
<!-- 
    <script>
      $( document ).ready(function() {
         $(".btn-submit").on('click', function(){

         // const fullname = $("#full_name").val(); //get element using jquery
         // console.log("===============fullname===========");
         // console.log(fullname);
            

         // const fullname = document.getElementById("full_name").value;  //get element using javascript
         // console.log("===============fullname===========");
         // console.log(fullname);

        //  const fullname = document.querySelector('input[alt=full_name]').value; //get element using javascript ES6
        // console.log('==========fullname==========')
        // console.log(fullname);



            // alert("click me");
    
         });
     });
    </script>
 -->
    <!--end jquery and javascript -->

  <!-- javascript ES6 -->

 <script type="text/javascript"> 

    document.addEventListener('DOMContentLoaded', () => {
      let btn = document.querySelector('#btn-submit')
          btn.addEventListener('click', (event) => {
              event.preventDefault();

              const fullname = document.querySelector('input[alt=full_name]').value;
              console.log('==========fullname==========')
              console.log(fullname);

              const emailaddress = document.querySelector('input[alt=email_address]').value;
              console.log('==========emailaddress==========')
              console.log(emailaddress);

              const username = document.querySelector('input[alt=username]').value;
              console.log('==========username==========')
              console.log(username);

              const password = document.querySelector('input[alt=password]').value;
              console.log('==========password==========')
              console.log(password);


          function isValidFullname(){
             
             var pattern = /^[a-z A-Z ]+$/;
             var full_name = $("#full_name").val();
             if(pattern.test(full_name) && full_name !== ""){
                $("#full_name").removeClass("is-invalid").addClass("is-valid");
                $(".fname-error").css({
                 "color": "green",
                 "font-size": "14px",
                 "display": "none"
               });
                return true;

             }else if(full_name === ""){
               $("#full_name").removeClass("is-valid").addClass("is-invalid");
               $(".fname-error").html("Required Full Name");
                 $(".fname-error").css({
                   "color": "red",
                   "font-size": "14px"
                 });
             }else{
               $("#full_name").removeClass("is-valid").addClass("is-invalid");
               $(".fname-error").html("Please input Character Only");
                 $(".fname-error").css({
                 "color": "red",
                 "font-size": "14px",
                 "display": "block"
               });

             };

          }


            function isValidUsername(){
           
               var pattern = /^[a-z A-Z 0-9 #_.]+$/;
               var username = $("#username").val();
               if(pattern.test(username) && username !== ""){
                  $("#username").removeClass("is-invalid").addClass("is-valid");
                  $(".uname-error").css({
                   "color": "green",
                   "font-size": "14px",
                   "display": "none"
                 });
                  return true;

               }else if(username === ""){
                 $("#username").removeClass("is-valid").addClass("is-invalid");
                 $(".uname-error").html("Required Username");
                   $(".uname-error").css({
                     "color": "red",
                     "font-size": "14px"
                   });
               }else{
                 $("#username").removeClass("is-valid").addClass("is-invalid");
                 $(".uname-error").html("Please input Character Only");
                   $(".uname-error").css({
                   "color": "red",
                   "font-size": "14px",
                   "display": "block"
                 });

               };

            }

           function isValidEmail(){
             
                 var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
                 var email_address = $("#email_address").val();
                 if(pattern.test(email_address) && email_address !== ""){
                    $("#email_address").removeClass("is-invalid").addClass("is-valid");
                    $(".email-error").css({
                     "color": "green",
                     "font-size": "14px",
                     "display": "none"
                   });
                    return true;

                 }else if(email_address === ""){
                   $("#email_address").removeClass("is-valid").addClass("is-invalid");
                   $(".email-error").html("Required Email address");
                     $(".email-error").css({
                       "color": "red",
                       "font-size": "14px"
                     });
                 }else{
                   $("#email_address").removeClass("is-valid").addClass("is-invalid");
                   $(".email-error").html("Please input Unique Email Address");
                     $(".email-error").css({
                     "color": "red",
                     "font-size": "14px",
                     "display": "block"
                   });

                 };

              }


           function isValidPassword(){
                if($("#password").val() === ""){
                  

                    $($("#password")).addClass("is-invalid");
                    $(".pass-error").html("Please enter Password");
                    $(".pass-error").css({"color" : "red", "font-size" : "14px"})
                  return false;

                 }else{

                   $("#password").removeClass("is-invalid").addClass("is-valid");
                   $(".pass-error").html("");

                  return true;
           
                }
              }


            isValidFullname();
            isValidEmail();
            isValidUsername();
            isValidPassword();

            var data = new FormData(this.form);

            data.append('fullname', fullname);
            data.append('emailaddress', emailaddress)
            data.append('username', username)
            data.append('password', password)


            if(isValidFullname() === true  && isValidEmail() === true && isValidUsername() === true && isValidPassword() === true){

                 $.ajax({

                         url: 'config/register.php',
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