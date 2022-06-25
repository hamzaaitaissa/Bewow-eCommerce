<?php
session_start();
//which means in every page inside our page we have our user logged in in every page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    @media only screen and (max-width: 768px) {
      #c1{
        width:100% !important;
      }
      #c2{
        width: 100% !important;
      }
      #c0{
        flex-direction: column;
      }
}
</style>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--nav bar is here-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;;background-color:#080808 !important">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="HomePage.php" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>
        
        <!-- Links -->
       
        <ul class="navbar-nav" > 
            <!--the burger menu-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">     
            <!--the dropdown menu-->  
            <div class="btn-group">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px;color:white !important; padding-left: 20px;color: black; letter-spacing: 2px;">
                   Fashion 
                </button>
                <div class="dropdown-menu" >
                  <a class="dropdown-item" href="men.php">Men-fashion</a>
                  <a class="dropdown-item" href="women.php">Women-fashion</a>
                </div>
              </div>
                  
            <li class="nav-item ">
                <a class="nav-link " href="contact.php" style="color: black;color:white !important;">Contact Us</a>
              </li>
            <li class="nav-item ">
                <a class="nav-link " href="abtus.php"style="color: black;color:white !important;">About us</a>
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

 

    <!--content goes here-->
    <div class="container-fluid" style="display: flex;" id="c0">
    <div class="container" style="width:40%;padding:1rem;border:1px solid black;border-radius:30px;margin:1rem 0rem 1rem 0rem;text-align:center;display:flex;flex-direction:column;justify-content:space-between;align-items:center" id="c1">
    <span style="font-size: 30px;font-weight:bold">Our Socials:</span>
    <span style="font-size: 20px;"><i class="fas fa-envelope"></i> hamzaaitaissa8@gmail.com</span>
    <span style="font-size: 20px;"><i class="fas fa-phone-alt"></i> 0644203651</span>
    <span style="font-size: 20px;"><i class="fab fa-facebook"></i> Facebook.com</span>
    <span style="font-size: 20px;"><i class="fab fa-instagram"></i> Instagram.com</span>
    </div>
      <div class="container" style="width: 60%;padding:1rem" id="c2">
        <form action="Phpsheets/contactPHPCode.php" method="POST">
            <div class="form-group">
                <h3 class="display-4">WE'RE READY, LET'S TALK.</h3>
                <label for="email">NOTE THAT</label>
                <div class="alert alert-warning">
                  <strong>Warning!</strong> This Message will be viewed by our admins so please consider being Nice :D.
                </div>
              </div>
              <div class="form-group">
                <label for="pwd">Message:<?php 
                if(empty($_SESSION['userid'])){
                  ?>(Make sure You are signed Up)<?php
                }
                ?></label>
                <textarea class="form-control" rows="5" id="comment" maxlength="150" name="text"<?php if(empty($_SESSION['userid'])){?>readonly<?php }?>></textarea>
              </div>
              <div id="count">150 remaining characters</div>
              <button class="btn btn-outline-primary" type="submit" name="submit"<?php if(empty($_SESSION['userid'])){?>disabled<?php }?>>Submit</button>
        </form><?php
        if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Warning!</strong> Make sure all the fields are filled.
            </div>';
        }else if($_GET["error"]== "emailInvalid"){
            echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Warning!</strong> The email is invalid.
            </div>';
        }
      }
      
      if(isset($_GET["success"])){
        if($_GET["success"]== "messageSent"){
          echo '<div class="alert alert-success alert-dismissible" id="alerts" >
          <button type="button" class="close" data-dismiss="alert" >&times;</button>
          <strong>Success!</strong> Thank You!
          </div>';
        }
      }
    ?>
    </div>
   
    
    </div>
    <div class="container-fluid" style="margin: 5rem 0rem 0rem 0rem;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.4899886797225!2d-7.687259334505507!3d33.54064340196298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62cbc850601f1%3A0x4120cb8aefac8128!2sQuartier%20Zoubair%2C%20Casablanca!5e0!3m2!1sen!2sma!4v1647170570405!5m2!1sen!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
</body>
<script>
  let textArea=document.querySelector('#comment');
  let count=document.querySelector('#count');
  textArea.addEventListener('keyup',function(){
    var str=this.value;
    var textLength=str.length;
    if(textLength<=150){
      var remaingChars=150-textLength;
      if(remaingChars<50 && remaingChars>10){
        count.style="color:orange";
      }else if(remaingChars<=10){
        count.style="color:red";
      }else{
        count.style="color:green";
      }
      count.innerHTML=remaingChars+" remaining characters";
     
    }
    
  })
</script>
</html>