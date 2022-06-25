<?php
session_start();
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if(!isset($_SESSION['idadmin'])){
  header('location:loginadmin.php');
}
if($conn){
if(isset($_POST['submit'])){
    if(!empty($_POST['email']) and !empty(!empty($_POST['tel']))){
        $idDeliver=$_POST['idDeliver'];
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $tel=mysqli_real_escape_string($conn,$_POST['tel']);
        $sqlUP="UPDATE deliver SET email='$email',tel='$tel' WHERE idDeliver=$idDeliver";
        $resultUP=mysqli_query($conn,$sqlUP) or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0){
            header('location:adminupdatedeliver.php');
        }else{
            header('location:adminupdatedeliver.php?error');
        }
    }else{
        header('location:adminupdatedeliver.php?fill');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

    li {
      letter-spacing: 2px;
      padding-right: 20px;
      padding-left: 20px;
    }

    .navbar-nav {
      margin-left: auto;
    }

    .both {
      width: 100%;
      display: flex;
      flex-direction: row;
      height: 100vh;
    }

    .boy {
      width: 50%;
      height: 100%;
      float: left;
      background-color: red;
    }

    .girl {
      width: 50%;
      height: 100%;
      float: left;
      background-color: pink
    }

    .btn1 {
      display: flex;
      align-items: center;
      flex-direction: column;
      margin: auto;
      width: 50%;

    }

    .btnBoy {
      position: absolute;
      top: 500px;
      border-radius: 25px;
      border: none;
      width: 200px;
      background-color: khaki;
      height: 40px;
      transition: ease 0.3s;
      font-family: 'Montserrat', sans-serif;
      font-size: 20px;
    }

    .btnBoy:hover {
      background-color: #FFD433;
    }

    .btn2 {
      display: flex;
      align-items: center;
      flex-direction: column;
      margin: auto;
      width: 50%;

    }

    .btnGirl {
      position: absolute;
      top: 500px;
      border-radius: 25px;
      border: none;
      width: 200px;
      background-color: #EBBFD3;
      height: 40px;
      transition: ease 0.3s;
      font-family: 'Montserrat', sans-serif;
      font-size: 20px;
    }

    .btnGirl:hover {
      background-color: #DE9EBB;
    }
  </style>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>

            <!-- Links -->

            <ul class="navbar-nav">
                <!--the burger menu-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px; padding-left: 20px;color: rgba(255,255,255,.5); letter-spacing: 2px;">
                            ADD
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="adminaddproduct.php">Add Product</a>
                            <a class="dropdown-item" href="adminadddeliver.php">Add Deliver</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px; padding-left: 20px;color: rgba(255,255,255,.5); letter-spacing: 2px;">
                            UPDATE
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="adminupdateproduct.php">Update Product</a>
                            <a class="dropdown-item" href="adminupdatedeliver.php">Update Deliver</a>
                        </div>
                    </div>
                    <li class="nav-item ">
                        <a class="nav-link " href="loginadmin.php?logout">Log out</a>
                    </li>
                   </div> 
            </ul>
            
        </nav>
    <form action="updatespecificdeliver.php" method="POST">
        <?php
        if(isset($_GET['idDeliver'])){
            $idDeliver=$_GET['idDeliver'];
            $sql="SELECT * FROM deliver where idDeliver=$idDeliver";
            $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            if(mysqli_num_rows($result)>0){
                $line=mysqli_fetch_assoc($result);
            }
        }
        ?>
    <div class="container" style="margin-top: 50px;">
                <h2>Update Deliver</h2>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="" name="idDeliver" value="<?php echo $line['idDeliver'] ?>">
                    <label for="nom">Name</label>
                    <input type="text" class="form-control" id="" name="nom" value="<?php echo $line['nom'] ?>" readonly>

                </div>
                <div class="form-group">
                    <label for="prenom">Last Name</label>
                    <input type="text" class="form-control" name="prenom" value="<?php echo $line['prenom'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $line['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="tel">Phone Number</label>
                    <input type="number" class="form-control" name="tel" value="<?php echo $line['tel'] ?>">
                </div>
                
                <input type="submit" name="submit" id="" class="btn btn-primary" value="Update">
            </div>
    </form>
    <?php
     if (isset($_GET["error"])) {
        echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
      <button type="button" class="close" data-dismiss="alert" >&times;</button>
      <strong>Danger!</strong> An error has occured.
  </div>';
      }
      if (isset($_GET["fill"])) {
        echo '<div class=""></div><div class="alert alert-warning alert-dismissible" id="alerts" >
  <button type="button" class="close" data-dismiss="alert" >&times;</button>
  <strong>Warning!</strong> Fill all the fields.
    </div>';
      }
    ?>
    
</body>
</html>
<?php }?>