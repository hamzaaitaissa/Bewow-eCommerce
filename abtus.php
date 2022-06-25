<?php
session_start();
/* if(empty($_SESSION['userid'])){
  header('location:login.php');
} */
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/f9e1cc71ab.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
body{
  font-family: 'Poppins', sans-serif;
}
    li{
        letter-spacing: 2px;
        padding-right:20px; padding-left: 20px;
    }
    .navbar-nav{margin-left: auto;}
    .heading{
      display: flex;
      flex-direction: row;
      width: 100%;
      height:40vh;
      background-color:#5f81aa ;
      align-items: center;


    }
    .img2{
      width: 200px;
      margin-left: auto;
      margin-right: auto;
      top: 50%;
    }
    .social-link {
  width: 30px;
  height: 30px;
  border: 1px solid #ddd;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #666;
  border-radius: 50%;
  transition: all 0.3s;
  font-size: 0.9rem;

}

.social-link:hover,
.social-link:focus {
  background: #ddd;
  text-decoration: none;
  color: #555;
}
.list-inline-item{
  margin:0;
  padding: 0;
}
   
</style>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;;background-color:#080808 !important">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="HomePage.php" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>
        
        <!-- Links -->
       
        <ul class="navbar-nav"> 
            <!--the burger menu-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">     
            <!--the dropdown menu-->  
            <div class="btn-group">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px;color:white !important; padding-left: 20px;color: rgba(255,255,255,.5); letter-spacing: 2px;">
                   Fashion 
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="men.php">Men-fashion</a>
                  <a class="dropdown-item" href="women.php">Women-fashion</a>
                </div>
              </div>
                  
            <li class="nav-item ">
                <a class="nav-link " href="contact.php" style="color:white">Contact Us</a>
              </li>
            <li class="nav-item ">
                <a class="nav-link " href="abtus.php" style="color:white">About us</a>
              </li>
              <?php
        if(!empty($_SESSION['userid'])){
          ?>
          <div class="btn-group">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px;color:white !important; padding-left: 20px;color: rgba(255,255,255,.5); letter-spacing: 2px;">
            My space
          </button>
          <div class="dropdown-menu" >
            <a class="dropdown-item" href="myAccount.php" ><i class="fas fa-user"></i> My account</a>
            <a class="dropdown-item" href="favoritePage.php"><i class="fas fa-heart"></i> Favorites</a>
            <a class="dropdown-item" href="myOrders.php"><i class="fas fa-cash-register"></i> Orders</a>
          </div>
        </div>
          <?php
        }
        ?>
           <?php if(!empty($_SESSION['userid'])){
          ?>
          <li class="nav-item ">
          <a class="nav-link " href="PhpSheets/logout.php" style="color:white !important">Log out <i class="fas fa-door-open"></i></a>
        </li>
          <?php
          }else{
            ?>
             <li class="nav-item">
            <a class="nav-link" href="login.php" style="color:white">Log In <i class="fas fa-door-open"></i></a>
          </li>
            <?php
          }?>
         
         
        </ul>
        </div>
    </nav>

 <div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">About us page</h1><p></p>

        <p class="lead text-muted mb-0">BeWoW is a moroccan clothing retailer.Founded by <strong>Hamza ait aissa</strong> 
        in 2020 BeWoW has taken its place among the leading brands in clothing and fashion industry in Morocco.
         With its experienced designer team and business partnerships,</p>
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="img/logo.png" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Our Objectif</h2>
        <p class="font-italic text-muted mb-4">We are glad to open up to our customers and achieve whay is called customer satisfacrion. We believe that If anybody ever called our number, it would be picked up in less than 2 rings with a friendly voice answering, “BeWoW” From 7 am to 10 pm, there was always somebody to pick up a call in 2 rings. No voice mail system; no routing to different departments. We treated our customers like our best friends. You don’t route your best friend’s call to an automated system!</p>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Why Us</h2>
        <p class="font-italic text-muted mb-4">As BeWoW group, we aimed to offer quality products to our customers at affordable prices with the motto of "Everybody Deserves to Dress Well",
           and we carried out our first quality studies with the consultancy of our professional team and in this direction we created serious control stages in our production process.</p>
      </div>
    </div>
  </div>
</div>

<div class="bg-light py-5">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">Our team</h2>
        <p class="font-italic text-muted">Our team will be listening to you on different plateforms!</p>
      </div>
    </div>

    <div class="row text-center">
      <!-- Team item-->
      <?php
      $sql="SELECT * FROM admin";
      $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      if(mysqli_num_rows($result)>0){
        while($line=mysqli_fetch_assoc($result)){
          echo'
          <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="uploadsAdmin/'.$line['image'].'" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">'.$line['nom'].'</h5><h6 class="small text-uppercase text-muted">'.$line['email'].'</h6><span class="small text-uppercase text-muted">CEO - Founder</span>
            <ul class="social mb-0 list-inline mt-3" style="display:flex;align-items:center;position:relative;left:40px">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
          ';
        
      ?>
     
      <?php 
      }
      }
      ?>
      <!-- End-->

      <!-- Team item-->
      
      
      <!-- End-->

      <!-- Team item-->
      
      <!-- End-->

      <!-- Team item-->
      
      <!-- End-->

    </div>
  </div>
</div>


<footer class="bg-light pb-5">
  <div class="container text-center">
    <p class="font-italic text-muted mb-0">&copy; Copyrights bewow.com All rights reserved.</p>
  </div>
</footer>
    
</body>
</html>
<?php } ?>