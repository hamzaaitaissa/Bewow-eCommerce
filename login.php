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

  <title>Log In</title>
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

  body {
    font-family: 'Poppins', sans-serif;
  }

  li {
    letter-spacing: 2px;
    padding-right: 20px;
    padding-left: 20px;
  }

  .navbar-nav {
    margin-left: auto;
  }
</style>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <!--nav bar is here-->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;background-color:#080808 !important">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="HomePage.php" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>

    <!-- Links -->

    <ul class="navbar-nav">
      <!--the burger menu-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">


        <li class="nav-item ">
          <a class="nav-link " href="signin.php" style="color:white">sign in <i class="fas fa-user-plus"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php" style="color:white">Log In <i class="fas fa-door-open"></i></a>
        </li>

      </div>
  </nav>
  <!--content goes here-->
  <div class="container">

    <form action="PhpSheets/loginPHPCode.php" method="POST">
      <section class="h-100 h-custom" style="background-color: #476c95;">
        <div class="container py-5 h-100" style="background-color: white;">
          <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: white;">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <img src="img/login.jpeg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo" height="300px">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Info</h3>

                  <form class="px-md-2">

                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example1q" class="form-control" placeholder="Enter username" name="uid" />
                      <label class="form-label" for="form3Example1q">UserName</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form3Example1q" class="form-control" placeholder="Enter password" name="pwd" autocomplete="off" />
                      <label class="form-label" for="form3Example1q">Password:</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg mb-1" name="submit">Submit</button>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- <div class="form-group">
            <label for="uid">UserName:</label>
            <input type="text" class="form-control" id="uid" placeholder="Enter username" name="uid" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" autocomplete="off">
          </div>
         
          <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button> -->
    </form>
    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Warning!</strong> Make sure all the fields are filled.
        </div>';
      } else if ($_GET["error"] == "wronglogin") {
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
          <button type="button" class="close" data-dismiss="alert" >&times;</button>
          <strong>Warning!</strong> Incorrect Login.
      </div>';
      }
    }
    ?>
  </div>


</body>

</html>