<?php
session_start();

if (isset($_SESSION['error'])) {
   $error = $_SESSION['error']; // Retrieve error message from session
   unset($_SESSION['error']); // Clear the error message after displaying it
} else {
   $error = null; // Initialize error variable if not set
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Login</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="index.php">Home</a>
                  <a href="login.php">login</a>
                  <a href="register.php">Register</a>
                  <a href="about.php">About</a>
                  <a href="contact.php">Contact</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
               <a class="logo" href="index.php"><img src="images/logo.png"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li><a href="#"><img src="images/user-icon.png"></a></li>
                        <li><a href="#"><img src="images/bag-icon.png"></a></li>
                        <li><a href="#"><img src="images/search-icon.png"></a></li>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="contact_taital">Login</h1>
                  <p class="contact_text">Provide your credentials to purchase</p>
               </div>
               <div class="col-md-6">
                  <div class="contact_main">
                     <div class="form">
                        <form action="php/login.php" method="POST">
                           <div class="form-group">
                              <input type="email" class="form-control" placeholder="Email.." name="email" require>   
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control" placeholder="Password.." name="password" require>
                           </div>
                           <div class="form-group">
                              <input type="submit" class="form-control btn-info" value="Login" name="login">
                           </div>
                           <!-- display error message -->
                           <div class="form-group">
                              <?php if(!empty($error)) { ?>
                                 <div class="alert alert-danger" role="alert" style="text-align: center; margin-top: 10px;">
                                    <?php echo $error; ?>
                                 </div>
                              <?php } ?>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- register section end -->
      <!-- footer section start -->
      <?php include 'footer.php'; ?>
      <!-- footer section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
   </body>
</html>