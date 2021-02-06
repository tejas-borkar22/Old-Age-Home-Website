<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

// Connecting to the Database
$server = "localhost";
$username = "root";
$password = "";
$database = "sl3p";

// Create a connection
$con = mysqli_connect($server, $username, $password, $database);
//Check connection was successful or not 
if (!$con){
    die("Sorry we failed to connect: ". mysqli_connect_error());  //. is for concatenation 
}
else{
    // echo "Connection was successful<br>";
}

$sql = "SELECT * FROM `contacts`";
$result1 = mysqli_query($con, $sql);

$sql = "SELECT * FROM `registration`";
$result2 = mysqli_query($con, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result1);
// echo $num;
//echo"<br>";
$num2 = mysqli_num_rows($result2);
//echo $num2;

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
    <title>Retrieve - Shashwati Old Age Home </title>
    <style>
    td{
      font-weight: 500;
    }

    nav ul li a{
    font-size: 1.17rem;
    font-weight: 500;

    </style>
  <!-- xs<576 | 576<sm<768 | 768<md<992 | 992<lg<1200 | 1200<xl -->
  </head>

  <body>
  <header>
    <!--Top Header -->
    <div class="p-1"id="topheader">
      <div class="container">
        <div class="row">
          <div class="col-12 text-right">
          <a class="p-1" href="tel:+91 9011001190"> <i class="fas fa-phone-square"></i> +(91) 9011001190 </a>
          <a class="p-1" href="mailto:+inq.shashwati101@gmail.com"> <i class="fas fa-envelope-open"> </i> +inq.shashwati101@gmail.com</a>
          </div>
        </div>
      </div>
    </div>

<!--START:  Bottom Header -->
<div id="bottomHeader">
  <div class="container-fluid">
    <nav class="navbar navbar-dark bg-dark navbar-expand-md" >
      <button data-toggle="collapse" data-target="#navbarToggler" type="button" class="navbar-toggler">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="default.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="retrieve.php">Retrieve Data</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
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
        <h4> Contact Us & Registration :</h4>
      </div>
    </div>
  </div>
</section>
<!--END : BREADCRUMBS SECTION--->
<br>
<div class="alert alert-success alert-dismissable container col-10" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label ="close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p class="m-2 text-center" id="bolder"><?php echo"You have logged In Successfully."?></p>
</div>
<div class="container col-10">
  <h4>Contact Us</h4>
  <table class="table">
    <thead>
      <tr>
        <th>SR.No</th>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Message</th>
        <th>Email</th>
        <th>Subject</th>
        <th>City</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if($num> 0){
      while($row = mysqli_fetch_assoc($result1)){ 
      echo"<tr>"; ?>
         <td> <?php echo $row['srno'] ?></td>
         <td> <?php echo $row['name'] ?></td>
         <td> <?php echo $row['phone_num'] ?></td>
         <td> <?php echo $row['msg'] ?></td>
         <td> <?php echo $row['email'] ?></td>
         <td> <?php echo $row['subject'] ?></td>
         <td> <?php echo $row['city'] ?></td>
         <td> <?php echo $row['date'] ?></td>
      <?php
      echo"</tr>";
      }
    }
    ?>
    </tbody>
  </table>
</div> <br>


<div class="container col-10">
  <h4>Registration</h4>
  <table class="table">
    <thead>
      <tr>
        <th>SR.No</th>
        <th>Inmate Name</th>
        <th>Guardian Name</th>
        <th>Relation</th>
        <th>Inmate Phone No.</th>
        <th>Guardian Email</th>
        <th>Guardian Phone No.</th>
        <th>Inmate Gender</th>
        <th>Inmate Address</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if($num2> 0){
      while($row = mysqli_fetch_assoc($result2)){ 
      echo"<tr>"; ?>
         <td> <?php echo $row['srno'] ?></td>
         <td> <?php echo $row['inmate_name'] ?></td>
         <td> <?php echo $row['g_name'] ?></td>
         <td> <?php echo $row['relation'] ?></td>
         <td> <?php echo $row['in_phn_num'] ?></td>
         <td> <?php echo $row['g_email'] ?></td>
         <td> <?php echo $row['g_phone_num'] ?></td>
         <td> <?php echo $row['gender'] ?></td>
         <td> <?php echo $row['in_address'] ?></td>
         <td> <?php echo $row['date'] ?></td>
      <?php
      echo"</tr>";
      }
    }
    ?>
    </tbody>
  </table>
</div><hr>

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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-4.5.2-dist\js\jquery-3.5.1.slim.min.js" ></script>
    <script src="bootstrap-4.5.2-dist\js\popper.min.js" ></script>
    <script src="bootstrap-4.5.2-dist\js\bootstrap.min.js" ></script>
  </body>
</html>


