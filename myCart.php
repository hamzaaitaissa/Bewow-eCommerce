<?php
session_start();
if (empty($_SESSION['userid'])) {
  header('location:login.php');
}
//remeber qte and prix are integers
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
  if (isset($_POST['insertCmd'])) {
    $adresse = '';
    $idDeliver = '';
    if (!empty($_POST['quantityFinal']) and !empty($_POST['priceFinal']) and !empty($_POST['idPro']) and $_POST['sexe']) {
      $qte = $_POST['quantityFinal'];
      $idPro = $_POST['idPro'];
      $prix = $_POST['priceFinal'];
      $userId = $_SESSION['userid'];
      $sex = $_POST['sexe'];
      $sql1 = "SELECT adresse from users where userId=$userId";
      $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
      if (mysqli_num_rows($result1) > 0) {
        $line1 = mysqli_fetch_assoc($result1);
        $adresse = $line1['adresse'];
        $sql2 = "SELECT idDeliver from deliver ORDER BY RAND() LIMIT 1";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if (mysqli_num_rows($result2) > 0) {
          $line2 = mysqli_fetch_assoc($result2);
          $idDeliver = $line2['idDeliver'];
          if ($sex == 'men') {
            $sql3 = "INSERT INTO commande(userId,idProMen,idDeliver,adresseLivraison,dateLivraison,qte,prix)
          VALUES($userId,$idPro,$idDeliver,'$adresse',DATE_ADD(now(), INTERVAL 1 WEEK),$qte,$prix)";
            $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
            if ($result3 > 0) {

              //here delete this product from cart bcz it would be already added
              $sql4 = "DELETE from cart where idProMen=$idPro and userId=$userId";
              $result4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
              if (mysqli_affected_rows($conn) > 0) {
                header('location:myCart.php?success');
              } else {
                header('location:myCart.php?errorDeleting');
              }
            } else {
              header('location:myCart.php?error');
            }
          } else {
            $sql5 = "INSERT INTO commande (userId,idProWomen,idDeliver,adresseLivraison,dateLivraison,qte,prix)
          VALUES($userId,$idPro,$idDeliver,'$adresse',DATE_ADD(now(),INTERVAL 1 WEEK),$qte,$prix)";
            $result5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));
            if ($result5 > 0) {
              $sql6 = "DELETE FROM cart WHERE idProWomen=$idPro and $userId=$userId";
              $result6 = mysqli_query($conn, $sql6) or die(mysqli_error($conn));
              if (mysqli_affected_rows($conn) > 0) {
                header('location:myCart.php?success');
              } else {
                header('location:myCart.php?errorDeleting');
              }
            } else {
              header('location:myCart.php?error');
            }
          }
        }
      }
    }
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
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

    body {
      background-color: #76AEB9;
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
            <div class="dropdown-menu">
              <a class="dropdown-item" href="myAccount.php"><i class="fas fa-user"></i> My account</a>
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

    <section class="h-100">
      <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
              <div>
                <h6 class="mb-0"><i class="fas fa-arrow-left"></i><a href="productMen.php" class="text-body">Continue Shopping </a></h6>
              </div>
            </div>
            <?php
            $userId = $_SESSION['userid'];
            $sqlCheck = "SELECT * FROM cart where userId=$userId";
            $resultCheck = mysqli_query($conn, $sqlCheck) or die(mysqli_error($conn));
            // if (mysqli_num_rows($resultCheck) > 0) {
            // while ($check = mysqli_fetch_assoc($resultCheck)) {
            // if ($check['idProWomen'] == Null) {
            $sexe = "men";
            $sql = "SELECT product_men.* from product_men,cart
              where product_men.idPro=cart.idProMen and cart.userId=$userId";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
              while ($line = mysqli_fetch_assoc($result)) {

            ?>
                <div class="card rounded-3 mb-4" id="product<?php echo $line['idPro'] ?>">
                  <div class="card-body p-4">
                    <div class="row d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="uploads/<?php echo $line['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <p class="lead fw-normal mb-2"><?php echo $line['titre'] ?></p>
                        <p><span class="text-muted"><?php echo $line['marque'] ?>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>

                        <input min="0" name="quantity" value="1" type="number" id="qte" class="form-control form-control-sm" />

                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h5 class="mb-0" id="prix"><?php echo $line['prix'] ?> Dh</h5>
                      </div>

                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="javascript:void(0)" class="text-danger" onclick="deleteFromCart(<?php echo $line['idPro'] ?>);"><i class="fas fa-trash fa-lg"></i></a>
                      </div>

                    </div>
                    <!-- <div class="card">
                <div class="card-body">
                  <h5>Totale <span class="totale">0</span></h5>
                </div>
              </div> -->
                    <div class="card">
                      <div class="card-body">
                        <button type="button" class="btn btn-warning btn-block btn-lg" onclick="addToCmd(<?php echo $line['prix'] ?>,<?php echo $line['idPro'] ?>,'<?php echo $sexe ?>');">Proceed to Pay</button>
                      </div>
                    </div>
                  </div>

                </div>
              <?php
              }
            }
            // } else if ($check['idProMen'] == Null) {
            $sexe = "women";
            $sql = "SELECT product_women.* from product_women,cart
              where product_women.idPro=cart.idProWomen and cart.userId=$userId";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
              while ($line = mysqli_fetch_assoc($result)) {

              ?>
                <div class="card rounded-3 mb-4" id="product<?php echo $line['idPro'] ?>">
                  <div class="card-body p-4">
                    <div class="row d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="uploads/<?php echo $line['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <p class="lead fw-normal mb-2"><?php echo $line['titre'] ?></p>
                        <p><span class="text-muted"><?php echo $line['marque'] ?>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>

                        <input min="0" name="quantity" value="1" type="number" id="qte" class="form-control form-control-sm" />

                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h5 class="mb-0" id="prix"><?php echo $line['prix'] ?> Dh</h5>
                      </div>

                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="javascript:void(0)" class="text-danger" onclick="deleteFromCartW(<?php echo $line['idPro'] ?>);"><i class="fas fa-trash fa-lg"></i></a>
                      </div>

                    </div>
                    <!-- <div class="card">
                <div class="card-body">
                  <h5>Totale <span class="totale">0</span></h5>
                </div>
              </div> -->
                    <div class="card">
                      <div class="card-body">
                        <button type="button" class="btn btn-warning btn-block btn-lg" onclick="addToCmd(<?php echo $line['prix'] ?>,<?php echo $line['idPro'] ?>,'<?php echo $sexe ?>');">Proceed to Pay</button>

                      </div>
                    </div>
                  </div>

                </div>
            <?php
              }
            }
            // }
            // }
            // } else {
            //   echo '<h2 style="text-align:center;margin:10rem 18rem;color:#fd5e53">Your Cart is Empty :(</h3>';
            // }
            ?>



          </div>
        </div>
    </section>
    <div id="succ" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Item deleted Successfully!
      </div>
    </div>

    <div id="error" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
      <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error</strong> Error!
      </div>
    </div>
    <!--Popup begining-->
    <div id="popupId" class="summaryDiv" style="display:none;padding:1rem;position: absolute;top: 100px;width:50%;height:40vh;background: #2b5876;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #4e4376, #2b5876);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #4e4376, #2b5876); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;margin:0 auto;left:25%;right:25%;border-radius:30px">
      <form action="myCart.php" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1" style="color:white">Quantity</label>
          <input type="number" name="quantityFinal" class="form-control" id="qteID" min="1" oninput="this.value = Math.abs(this.value)">
        </div>
        <input type="hidden" id="idPro" readonly name="idPro">
        <input type="hidden" id="sexe" readonly name="sexe" readonly>
        <div class="form-group">
          <label for="exampleInputPassword1" style="color:white">Price</label>
          <input type="number" class="form-control" id="priceId" readonly name="priceFinal">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" style="color:white">Total</label>
          <input type="text" class="form-control" id="total" readonly>
        </div>
        <input type="submit" class="btn btn-primary" value="Order Now!" name="insertCmd">
        <input type="button" class="btn btn-danger" value="Cancel" name="cancel" id="cancel" onclick="cancelPopup();">
      </form>
    </div>

    <!--Popup Ending-->
  </body>
  <script src="js/jquery-3.6.0.js"></script>
  <script>
    function deleteFromCart(idPro) {
      var idPro = idPro;
      var userId = <?php echo $_SESSION['userid']; ?>;
      $.post("deleteFromCartMen.php", {
          idPro: idPro,
          userId: userId
        },
        function(result, success) {
          if (result == 1) {
            $('#product' + idPro).remove();
            $('#succ').css('display', 'block');
          } else {
            $('#error').css('display', 'block');
          }
        });
    }

    function deleteFromCartW(idPro) {
      var idPro = idPro;
      var userId = <?php echo $_SESSION['userid']; ?>;
      $.post("deleteFromCartWmn.php", {
          idPro: idPro,
          userId: userId
        },
        function(result, success) {
          if (result == 1) {
            $('#product' + idPro).remove();
            $('#succ').css('display', 'block');
          } else {
            $('#error').css('display', 'block');
          }
        });
    }

    function addToCmd(price, idPro, sexe) {
      var price = price;
      var sexe = sexe;
      var qte = $('#qte').val();
      $('#popupId').css('display', 'Block');
      $('#qteID').val(qte);
      $('#priceId').val(price);
      $('#idPro').val(idPro);
      if (sexe == "men") {
        $('#sexe').val(sexe);
      } else {
        $('#sexe').val(sexe);
      }
      setInterval(function() {
        var qte2 = $('#qteID').val();
        var price2 = $('#priceId').val();
        var total = price2 * qte2;
        $('#total').val(total + " Dh");
      }, 500);
    }

    function cancelPopup() {
      $('#popupId').fadeOut();
      $('#popupId').css('display', 'none');
    }
    //hayed hadik input dyal men wla women then nsseh column idPro f database f commande o dir bhal cart idProMen o idProWomen o sf o add to commande

    // function calculate(){

    //   var qte=$('input[type=number]').val();
    // var qteInt=parseInt(qte);
    // var prix=$('h5').html();
    // var prixInt=parseInt(prix);
    // $.post("calculateTotale.php",{qteInt:qteInt,prixInt:prixInt},
    // function(result,success){
    //   $('.totale').html(result);
    // })
    // }
  </script>

  </html>
<?php
}
?>