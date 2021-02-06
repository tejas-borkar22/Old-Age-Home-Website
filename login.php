<?php
//This script will handle login
$username=$password=$dbUsname=$dbPassword="";
$_SESSION['loggedin'] = '';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    header("location: retrieve.php");
}

else if(isset($_POST["username"]))
{
  
  $dbUsname = "root11";
  $dbPassword = "Root@1234";
  $uid = "0001";
  
  $username = ($_POST['username']);
  $password = ($_POST['pwd']);

    if( $username == $dbUsname && $password == $dbPassword)
    {
      // this means the password is corrct. Allow user to login
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["id"] = $uid;
      $_SESSION["loggedin"] = true;
      //Redirect user to retrieve page
      header("Location: retrieve.php");   
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.5.2-dist\css\bootstrap.min.css" >
    <link rel="stylesheet" href="fontawesome-free-5.15.0-web/css/all.css" >

    <!-- Custom css style sheet--->
    <link rel="stylesheet" href="CSS/styles.css" >
    <link rel="stylesheet" href="CSS/form-style.css" >
    <title>Login Page</title>
<style>
    nav ul li a{
    font-size: 1.17rem;
    font-weight: 500;
    }

</style>
  
  <!-- xs<576 | 576<sm<768 | 768<md<992 | 992<lg<1200 | 1200<xl -->
  </head>

  <body>
  <!--START: Top Header -->
  <header>
    <div class="p-1" id="topheader">
      <div class="container">
        <div class="row">
          <div class="col-12 text-right ">
          <a class="p-1" href="tel:+91 9011001190"> <i class="fas fa-phone-square"> </i> +(91) 9011001190</a>
          <a class="p-1" href="mailto:+inq.shashwati101@gmail.com"> <i class="fas fa-envelope-open"> </i> +inq.shashwati101@gmail.com</a>
          </div>
        </div>
      </div>
    </div>
    <!--END: Top Header -->

    <!--START:  Bottom Header -->
    <div id="bottomHeader">
      <div class="container-fluid">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md" >
          <a class="navbar-brand" href="">
            <img src="Images/Icons/shashwati2.jpg" width="170px" alt="shashwati-logo" class="img-fluid">
          </a>
          <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="default.html">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">Our care & Services</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="homes.html">Our Homes</a>
                    <a class="dropdown-item" href="food.html">Our Food</a>
                    <a class="dropdown-item" href="facilities.html">Our Facilities</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Dementia & Parkinsons</a>
                </div>
 
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="faq.html">FAQ</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
          </div>
        </div>
        </nav>
      </div>
    </div>
  </header>
<!--END:  Bottom Header -->

  <!--START : BREADCRUMBS SECTION--->
  <section class="breadcrumbs-section" style="background-color: rgb(223, 219, 219);">
    <div class="container pl-3 p-sm-3">
      <div class="row">
        <div class="col-12">
          <h2> Login Form</h2>
          <ol class="breadcrumb" style="font-weight: 600;">
            <li class="breadcrumb-item"><a href="default.html">Home</a></li>
            <li class="breadcrumb-item active">Login</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!--END : BREADCRUMBS SECTION--->

   <!--START : Login Form-->
  <div class="d-flex justify-content-center align-items-center login-container">
    <form action="" method="POST" class="login-form text-center card p-3 ">
        <h1 class="mb-5 font-weight-light text-uppercase" style="font-family: 'Poppins', sans-serif; ">Login</h1>
        <?php
          if(($username != $dbUsname && $password != $dbPassword))
          {
            echo"<p class='text-center' style='font-weight:500; color: #f02424;'>Wrong Credentials <br>
            Please enter correct username and password.</h4>";
          }
          if(($username != $dbUsname && $password == $dbPassword))
          {
            echo"<p class='text-center' style='font-weight:500; color: #f02424;'>
            Please enter correct username.</h4>";
          }
          if(($username == $dbUsname && $password != $dbPassword))
          {
            echo"<p class='text-center' style='font-weight:500; color: #f02424'>
            Please enter correct password.</h4>";
          }
        ?>
        <div class="form-group">
          <input type="text" name="username"  class="form-control rounded-pill form-control-lg" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="password" name="pwd" id="contact-pwd" class="form-control rounded-pill form-control-lg" placeholder="Password" required onkeyup="validatePwd()"> 
          <span class='error-message' id='pwd-error'></span>
        </div>
        <div class="forgot-link form-group d-flex justify-content-between align-items-center">
          <a href="#" class="pl-4">Forgot Password?</a>
        </div>
        <button onclick="return validateForm()" type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
        <span class='error-message' id='submit-error'></span>
    </form>
  </div>
  
  <!--Top Footer -->
  <footer class="footer-full">
    <div class="container top-footer p-md-3 p-1" >
      <div class="row">
        <div class="col-md-3 pl-4 pr-4">
          <img src="Images/Icons/shashwati2.jpg"  class="img-fluid" alt="shashwati-logo" width="120px">
          <p>
            Shashwati Old Age Home is a secure, happy and relaxed home offering a high standard of care to the elderly. 
            We provide the best facilities and services for you
            <a href="#">Read more...</a>
          </p>
          <a style="color: silver;"href="#" class="p-1"> <i class="fab fa-2x fa-facebook-square"></i></a>
          <a style="color: silver;"href="#" class="p-1"> <i class="fab fa-2x fa-instagram"></i></a>
          <a style="color: silver;"href="#" class="p-1"> <i class="fab fa-2x fa-twitter"></i></a>
        </div>
        <div class="col-md-3 pl-4 pr-4">
          <h3>Important Links</h3>
          <a href="#">Our Policies</a><br>
          <a href="#">Registartion Details</a><br>
          <a href="#">Donate</a><br>
          <a href="#">News,Articles</a><br>
          <a href="#">Testimonals</a>
        </div>
        <div class="col-md-3 pl-4 pr-4">
          <h3>Our Services</h3>
          <a href="#">Our Homes</a><br>
          <a href="#">Our Food</a><br>
          <a href="#">Our Facilities</a>
        </div>
        <div class="col-md-3 pl-4 pr-4">
          <h3>Contact Us</h3>
          <a class="p-1" href="tel:+91 9011001190"> <i class="fas fa-phone-square"> </i> +(91) 9011001190</a><br>
          <a class="p-1" href="mailto:+inq.shashwati101@gmail.com"> <i class="fas fa-envelope-open"> </i> +inq.shashwati101@gmail.com</a>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242118.14199917082!2d73.72287827306846!3d18.524564857810876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1601896227453!5m2!1sen!2sin" frameborder="0"></iframe>   
          </div>
        </div>
      </div>
    </div>

    <!--Bottom Footer -->
    <div class="container-fluid bottom-footer pt-2">
      <div class="row">
        <div class="col-12 text-center">
          <p>Copyrigts © 2020 -All Rights Reserved</p>
        </div>
      </div>
    </div>

  </footer>
    <!-- Optional JavaScript -->
    <script src="bootstrap-4.5.2-dist\js\form_valids.js" ></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-4.5.2-dist\js\jquery-3.5.1.slim.min.js" ></script>
    <script src="bootstrap-4.5.2-dist\js\popper.min.js" ></script>
    <script src="bootstrap-4.5.2-dist\js\bootstrap.min.js" ></script>
  </body>
</html>