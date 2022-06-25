<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
    $reponse='';
if(isset($_POST['submit'])){
    $userId=$_SESSION['userid'];
    if(!empty($_POST['email']) and !empty($_POST['adresse'])){
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $adresse=mysqli_real_escape_string($conn,$_POST['adresse']);
        $sql2="UPDATE users set userEmail='$email',adresse='$adresse' where userId=$userId";
        $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0){
            header('location:myAccount.php');
        }else{
            header('location:myAccount.php?error');
        }
    }else{
        header('location:myAccount.php?error');
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

</style>
<body>
<div class="container" style="display:flex;justify-content:center;align-items:center;padding:1rem">
            <a href="myAccount.php"><i class="fas fa-arrow-left"></i> Go Back to my Account</a>
        </div>
        <div class="container" style="margin-top: 10rem;">
            <form action="updatespecificuser.php" method="POST">
                <?php
                if(isset($_GET['userId'])){
                    $userId=$_GET['userId'];
                    $sql="SELECT * FROM users where userId=$userId";
                    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if(mysqli_num_rows($result)>0){
                        $line=mysqli_fetch_assoc($result);
                        
                ?>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" readonly class="form-control" value="<?php echo $line['userName']?>">
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" readonly class="form-control" value="<?php echo $line['userLastName']?>">
                </div>
                <div class="form-group">
                    <label for="">UID</label>
                    <input type="text" name="uid" readonly class="form-control" value="<?php echo $line['userUid']?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $line['userEmail']?>">
                </div>
                <div class="form-group">
                    <label for="">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="<?php echo $line['adresse']?>">
                </div>
                <button type="submit" name="submit"class="btn btn-primary">Update</button>
                
           
            
                <?php 
                
                  }
                }
                ?>
            </form>
            
        </div>

</body>
</html>
<?php
}
?>