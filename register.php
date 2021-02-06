<?php

$insert = false;
if(isset($_POST['iname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "sl3p";


    // Create a database connection
    $con = mysqli_connect($server, $username, $password,$database);

    // Check connection was successful or not
    if(!$con){
      die("connection to this database failed due to" . mysqli_connect_error());
    }
    else
      // echo "Successfully connecting to the db";
    
  // Collect post variables
  $Iname = $_POST['iname'];
  $Gname = $_POST['gname'];
  $relation = $_POST['rel'];
  $Iphone = $_POST['i_phone'];
  $Gemail = $_POST['g_email'];
  $Gphone = $_POST['g_phone'];
  $gender = $_POST['i_gender'];
  $address = $_POST['i_addr'];
  $sql = "INSERT INTO `sl3p`.`registration` (	`inmate_name`  ,`g_name` , `relation` , `in_phn_num` , `g_email` , `g_phone_num` , `gender` , `in_address` , `date`) VALUES ('$Iname' , '$Gname' , '$relation' , '$Iphone' , '$Gemail' , '$Gphone' , '$gender' , '$address' , current_timestamp());";
  //echo $sql;

  // Execute the query
  if($con->query($sql) == true){

   // Flag for successful insertion
   $insert = true;
}
else{
   echo "ERROR: $sql <br> $con->error";
}
 
// Close the database connection
$con->close();
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
    <link rel="stylesheet" href="form-style.css" >
    <title>Register - Shashwati Old Age Home </title>
    <style>
      nav ul li a{
      font-size: 1.17rem;
      font-weight: 500;
      }
    </style>
  <!-- xs<576 | 576<sm<768 | 768<md<992 | 992<lg<1200 | 1200<xl -->
  </head>

   <!--START: Top Header -->
   <header>
    <div class="p-1"id="topheader">
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
            <img src="Images/Icons/shashwati2.jpg"  class="img-fluid" alt="shashwati-logo" width="170px">
          </a>
          <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav">
              <li class="nav-item active">
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
                <li class="nav-item">
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
          <h2> Registartion Form</h2>
          <ol class="breadcrumb" style="font-weight: 600;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Register</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!--END : BREADCRUMBS SECTION--->
  <br>
  <?php
        if($insert == true){ ?>
        <div class="alert alert-success alert-dismissable container" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label ="close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p class="m-2 text-center" id="bolder"><?php  echo "<p class='text-center' style='font-weight:500;'>Thank you for registration "."$Iname".". We wish you a warm welcome and hope to see you soon.</p>";?></p>
        </div>
        <?php
        $insert = false;
        }
  ?>

  <!--START: Registration Form-->
  <section class="col-md-12">
    <div class="card bg-light m-5">
      <article class="card-body " style="width: 700px; margin:auto;">
         
          <p class="text-center" style="font-weight: 600; font-size: 1.1rem;">Please fill the following Registration Form. </p>
          
          <p class="divider-text">
            <span class="bg-light"></span>
          </p>
          <form action="register.php" method="POST" class="col-md-12">
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
              <input name="iname" class="form-control" id="contact-name" placeholder="Full name of Inmate*" type="text" onkeyup='validateName()'>
              <span class='error-message' id='name-error'></span>
          </div> <!-- form-group// -->
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
              <input name="gname" class="form-control" id="contact-name" placeholder="Full name of Guardian" type="text" onkeyup='validateName()'>
              <span class='error-message' id='name-error'></span>
          </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
           </div>
          <input name="rel" class="form-control" placeholder="Relation with Guardian" type="text" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <input name="i_phone" id="contact-phone" class="form-control" placeholder="Phone number of Inmate*" type="text" onkeyup='validatePhone()'>
            <span class='error-message' id='phone-error'></span>  
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
           </div>
          <input name="g_email" id="contact-email" class="form-control" placeholder="Email address of Guardian" type="email" onkeyup='validateEmail()'>
          <span class='error-message' id='email-error'></span>
        </div> <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <input name="g_phone" class="form-control" placeholder="Phone number of Guardian" type="text" onkeyup='validatePhone()'>
            <span class='error-message' id='phone-error'></span> 
        </div> <!-- form-group// -->
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fas fa-venus-mars"></i> </span>
              </div>
              <select name="i_gender" class="form-control" required>
                <option selected=""> Select Gender of Inmate</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
          </div> <!-- form-group end.// -->
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-building"></i></span>
          </div>
            <textarea class="form-control" name="i_addr" id="contact-message" rows="3" placeholder="Address of Inmate*" onkeyup='validateMessage()'></textarea>
            <span class='error-message' id='message-error'></span>
          </div> <!-- form-group// -->                                      
          <div class="form-group">
              <button onclick="return validateForm()" type="submit" class="btn btn-primary btn-block"> Register  </button>
              <span class='error-message' id='submit-error'></span>
          </div> <!-- form-group// -->                                                                       
      </form>
      </article>
      </div> <!-- card.// -->
      </section>
    <!--END : Registration Form--->


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