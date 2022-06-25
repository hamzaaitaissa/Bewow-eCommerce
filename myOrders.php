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
    <title>My Orders</title>
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
.gradient-custom {
    background: #00B4DB;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
                        <a class="dropdown-item" href="myAccount.php" ><i class="fas fa-user"></i> My account</a>
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

<section class="h-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
              <?php
              $userId=$_SESSION['userid'];
              $sql="SELECT * from users where userId=$userId";
              $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
              if(mysqli_num_rows($result)>0){
                  $line=mysqli_fetch_assoc($result);
                  ?>
                  <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #0083B0;"><?php echo $line['userName']?></span>!</h5> <!--name of user-->
                  <?php
              }
              ?>
          </div>
          <?php 
              $userId=$_SESSION['userid'];
              $sql2="SELECT * FROM commande where userId=$userId";
              $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
              if(mysqli_num_rows($result2)>0){
                  while($line2=mysqli_fetch_assoc($result2)){
                    if($line2['idProWomen']==Null){
                      $sql3="SELECT commande.dateLivraison,product_men.idPro,product_men.image,product_men.marque,product_men.titre,commande.idCmd,commande.qte,commande.prix
                      FROM product_men,commande
                      WHERE product_men.idPro=commande.idProMen AND commande.userId=$userId";
                      $result3=mysqli_query($conn,$sql3) or die(mysqli_fetch_assoc($result3));
                      if(mysqli_num_rows($result3)>0){
                          while($line3=mysqli_fetch_assoc($result3)){

                          
                          ?>
                                    <div class="card-body p-4"> <!--starts from here -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #0083B0;">Order</p>
              
              <p class="small text-muted mb-0">Order ID :<?php echo $line3['idCmd']?></p>
            </div>
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <img src="uploads/<?php echo $line3['image']?>" class="img-fluid" alt="Phone"><!--Image of product-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0"><?php echo $line3['marque']?></p> <!--product marque-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $line3['titre']?></p> <!--product title-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: <?php echo $line3['qte']?></p> <!--quantity-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $line3['prix']?> DH</p> <!--price-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                  <a style="color:#0083B0" class="text mb-0 small" href="myInvoice.php?idProMen=<?php echo $line3['idPro']?>&idCmd=<?php echo $line3['idCmd']?>">Get Invoice</a> <!--get Invoice-->
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <p class="text-muted mb-0 small">Track Order</p>
                  </div>
                  <div class="col-md-10">
                    <div class="progress" style="height: 6px; border-radius: 16px;">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 65%; border-radius: 16px;    background: #00B4DB;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                        aria-valuenow="65"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <div class="d-flex justify-content-around mb-1">
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivery At <?php echo $line3['dateLivraison']?></p> <!--date of delivery-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!--ends here from here -->
                          <?php
                          }
                      }
                    }else if($line2['idProMen']==Null){
                        $sql4="SELECT commande.dateLivraison,product_women.idPro,product_women.image,product_women.titre,product_women.marque,commande.idCmd,commande.prix,commande.qte
                        FROM product_women,commande
                        WHERE commande.idProWomen=product_women.idPro AND commande.userId=$userId";
                        $result4=mysqli_query($conn,$sql4) or die(mysqli_error($conn));
                        if(mysqli_num_rows($result4)>0){
                            while($line4=mysqli_fetch_assoc($result4)){
                                ?>
                                <div class="card-body p-4"> <!--starts from here -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #0083B0;">Order</p>
              
              <p class="small text-muted mb-0">Order ID :<?php echo $line4['idCmd']?></p>
            </div>
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <img src="uploads/<?php echo $line4['image']?>" class="img-fluid" alt="Phone"><!--Image of product-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0"><?php echo $line4['marque']?></p> <!--product marque-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $line4['titre']?></p> <!--product title-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Qty: <?php echo $line4['qte']?></p> <!--quantity-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><?php echo $line4['prix']?> DH</p> <!--price-->
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <a style="color:#0083B0" class="text mb-0 small" href="myInvoice.php?idProWomen=<?php echo $line4['idPro']?>&idCmd=<?php echo $line4['idCmd']?>">Get Invoice</a> <!--get Invoice-->
                  </div>
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                <div class="row d-flex align-items-center">
                  <div class="col-md-2">
                    <p class="text-muted mb-0 small">Track Order</p>
                  </div>
                  <div class="col-md-10">
                    <div class="progress" style="height: 6px; border-radius: 16px;">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: 65%; border-radius: 16px;    background: #00B4DB;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #0083B0, #00B4DB);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #0083B0, #00B4DB); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                        aria-valuenow="65"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                    <div class="d-flex justify-content-around mb-1">
                      <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivery At <?php echo $line4['dateLivraison']?></p> <!--date of delivery-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!--ends here from here -->
                                <?php
                            }
                        }

                    }
                  }
              }
              ?>

      </div>
    </div>
  </div>
</section>
</body>
</html>
<?php
}
?>
<!--MAZAL LIKE TZID WAHED DROP DOWN FIH MES FAVORIS MY ORDERS MY CART AND THE INVOICE-->