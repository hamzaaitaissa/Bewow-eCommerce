<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('location:login.php');

}
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
    body{
      font-family: 'Poppins',sans-serif;
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
<body>
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
                    <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px;color:white !important; padding-left: 20px;color: rgba(255,255,255,.5); letter-spacing: 2px;">
                        My space
                    </button>
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" href="men.php" ><i class="fas fa-user"></i> My account</a>
                        <a class="dropdown-item" href="favoritePage.php"><i class="fas fa-heart"></i> Favorites</a>
                        <a class="dropdown-item" href="myOrders.php"><i class="fas fa-cash-register"></i> Orders</a>
                    </div>
                    </div>
                    <li class="nav-item ">
                        <a class="nav-link " href="PhpSheets/logout.php" style="color:white">Log out <i class="fas fa-door-open"></i></a>
                    </li>
            </ul>
            </div>
        </nav>


    <form action="monCompte.php" method="POST">
        <?php
        $userId=$_SESSION['userid'];
        $sql="SELECT * FROM users WHERE users.userId=$userId";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if(mysqli_num_rows($result)>0){
            $line=mysqli_fetch_assoc($result);
        
        ?>
<div class="container" style="height:40vh;background-color:gray;display:flex;align-items:center;justify-content:center">
                <?php
                if($line['image']==Null){
                    ?>
                    <img src="img/blank.png" alt="" class="rounded-circle" style="width:250px; height: 250px;">
                    <?php
                    
                   
                }else{
                    ?>
                    <img src="uploadsUser/<?php echo $line['image']?>" alt="" class="rounded-circle" style="width:250px; height: 250px;">
                    <?php
                }
                 ?>
                
        </div>
        <div class="container" style="height:50vh;background-color:lavender;display:flex;align-items:center;justify-content:center;flex-direction:column;margin-bottom:30px">
                <h3 for="nom">Name:</h3> <span name="nom" for="" class="text-nowrap"><?php echo $line['userName']?></span>
                <h3 for="prenom">Last Name:</h3> <span for="" class="text-nowrap"><?php echo $line['userLastName']?></span>
                <h3 for="email">Email:</h3> <span for="" class="text-nowrap"><?php echo $line['userEmail']?></span>
                <h3 for="email">UserName:</h3> <span for="" class="text-nowrap"><?php echo $line['userUid']?></span>
                <h3 for="email">Adresse:</h3> <span for="" class="text-nowrap"><?php echo $line['adresse']?></span>
                <div style="width:100%; display:flex; align-items:center;;justify-content:center;margin-left:0 auto;flex-direction:row;flex:1"> 
                   <a href='updatespecificuser.php?userId=<?php echo $line['userId']?>' class="btn btn-outline-info">Update</a> 
                </div>

        </div>
        <?php 
        }
        ?>
    </form>
    
</body>
</html>
<?php 
}
?>