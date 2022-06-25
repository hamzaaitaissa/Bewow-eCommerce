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
    <title>Sign Up</title>
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
    font-family: 'Poppins',sans-serif;
}
    li{
        letter-spacing: 2px;
        padding-right:20px; padding-left: 20px;
    }
    .navbar-nav{margin-left: auto;}
   
</style>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--nav bar is here-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;background-color:#080808 !important">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="HomePage.php" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>
        
        <!-- Links -->
       
        <ul class="navbar-nav" > 
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
<h1 class="display-3">Sign in</h1>

<table class="table">
    <form action="Phpsheets/signinPHPCode.php" method="POST" enctype="multipart/form-data">
    <tr>
        <td><label for="name">Name:</label></td>
        <td><input type="text" name="name" id="name" class="form-control" autocomplete="off"></td>

    </tr>
    <tr>
        <td><label for="name">Last Name:</label></td>
        <td><input type="text" name="lname" id="lname" class="form-control" autocomplete="off"></td>

    </tr>
    <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="email" name="email" class="form-control" id="email" autocomplete="off"></td>
    </tr>
    <tr>
        <td><label for="name">UserName</label></td>
        <td><input type="text" name="uid" id="user" class="form-control" placeholder="Add a user-name" autocomplete="off"></td>

    </tr>
    <tr>
        <td><label for="name">Adresse</label></td>
        <td><input type="text" name="adresse" id="adresseId" class="form-control"  autocomplete="off"></td>

    </tr>
    <tr>
        <td><label for="Password">Password:</label></td>
        <td><input type="password" name="password" class="form-control" id="psd" autocomplete="off"></td>
    </tr>
    <tr>
        <td><label for="PasswordRepeat">Confirm Password:</label></td>
        <td><input type="password" name="passwordrepeat" class="form-control" id="psdrep" autocomplete="off"></td>
    </tr>
    <!--NEW-->
    <tr>
        <td><label for="image">Upload a profile picture (Optional)</label></td>
        <td><input type="file" name="image" class="form-control" id="image" autocomplete="off"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" class="btn btn-outline-primary" name="submit"></td>
    </tr>
</form>
</table>
<?php
//with get we checking for the data that we can see in the url hna fin ghandiro error messages 
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Warning!</strong> Make sure all the fields are filled.
    </div>';
    
    }else if($_GET["error"]== "invaliduid"){
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Warning!</strong> The username is invalid.
    </div>';
    }else if($_GET["error"]== "invalidemail"){
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Warning!</strong> The email is invalid.
        </div>';
    }else if($_GET["error"]== "passwordsdontmatch"){
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Warning!</strong> The passwords dont match.
        </div>';
    }else if($_GET["error"]== "usernametaken"){
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Warning!</strong> the username is taken.
        </div>';
    }else if($_GET["error"]== "stmtfailed"){
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Warning!</strong> Something went wrong, try again!
        </div>';
    }
    else if($_GET["error"]== "none"){
        echo '<div class="alert alert-success alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Success!</strong> You have signed up!
        </div>';
    }else
        if($_GET["error"]=="wrongext"){
            echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Warning!</strong> We dont upload this type of a file.
        </div>';
        
        }else if($_GET["error"]=="filetoobig"){
            echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Warning!</strong> Sorry :( the file is too big.
        </div>';
        }else if($_GET["error"]=="errorupload"){
            echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Warning!</strong> There was an error uploading your photo.
        </div>';
        }

        
    }
?>
</div>

</body>

</html>