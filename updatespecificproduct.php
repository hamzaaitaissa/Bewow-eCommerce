<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if(!isset($_SESSION['idadmin'])){
  header('location:loginadmin.php');
}
if ($conn) {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['marque']) and !empty($_POST['titre']) and !empty($_POST['prix']) and !empty($_POST['taille'])) {
            $marque = mysqli_real_escape_string($conn, $_POST['marque']);
            $titre = mysqli_real_escape_string($conn, $_POST['titre']);
            $prix = mysqli_real_escape_string($conn, $_POST['prix']);
            $taille = mysqli_real_escape_string($conn, $_POST['taille']);
            $idPro = $_POST['idPro'];
            $tablename = $_POST['tablename'];
            if ($tablename == 'product_men') {
                $sql3 = "UPDATE product_men SET marque='$marque',titre='$titre',prix='$prix',taille='$taille' where idPro=$idPro";
                $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn) > 0) {
                    header('location:adminupdateproduct.php');
                } else {
                    header('location:updatespecificproduct.php?error');
                }
            } else if ($tablename == 'product_women') {
                $sql3 = "UPDATE product_women SET marque='$marque',titre='$titre',prix='$prix',taille='$taille' where idPro=$idPro";
                $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn) > 0) {
                    header('location:adminupdateproduct.php');
                } else {
                    header('location:updatespecificproduct.php?error');
                }
            }
        } else if (!empty($_POST['marque']) and !empty($_POST['titre']) and !empty($_POST['prix']) and !empty($_POST['taille']) and !empty($_FILES['image'])) {
            // with image now
            $marque = mysqli_real_escape_string($conn, $_POST['marque']);
            $titre = mysqli_real_escape_string($conn, $_POST['titre']);
            $prix = mysqli_real_escape_string($conn, $_POST['prix']);
            $taille = mysqli_real_escape_string($conn, $_POST['taille']);
            $idPro = $_POST['idPro'];
            $tablename = $_POST['tablename'];
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $img_error = $_FILES['image']['error'];
            $tmp_name = $_FILES['image']['tmp_name'];
            if ($img_error === 0) {
                if ($img_size < 1250000) {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array('jpg', 'jpeg', 'png');
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_upload_path = 'uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        if ($tablename == 'product_men') {
                            $sql3 = "UPDATE product_men SET marque='$marque',titre='$titre',prix='$prix',taille='$taille',image='$new_img_name' where idPro=$idPro";
                            $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                        } else {
                            $sql3 = "UPDATE product_women SET marque='$marque',titre='$titre',prix='$prix',taille='$taille',image='$new_img_name' where idPro=$idPro";
                            $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                        }

                        if (mysqli_affected_rows($conn) > 0) {
                            header('location:adminaddproduct.php?success');
                        } else {
                            header('location:adminaddproduct.php?error');
                        }
                    } else {
                        header('location:adminaddproduct.php?wrongext');
                    }
                } else {
                    header('location:adminaddproduct.php?bigfile');
                }
            } else {
                header('location:adminaddproduct.php?errorupload');
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
        <title>Bewow</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
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

        <form action="updatespecificproduct.php" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_GET['idProUPMEN'], $_GET['name'])) {
                $idPro = $_GET['idProUPMEN'];
                $tablename = $_GET['name'];
                $sql = "SELECT * FROM product_men WHERE idPro=$idPro";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result)) {
                    $line = mysqli_fetch_assoc($result);
                }
            } else if (isset($_GET['idProUPWOMEN'], $_GET['name'])) {
                $idPro = $_GET['idProUPWOMEN'];
                $tablename = $_GET['name'];
                $sql = "SELECT * FROM product_women WHERE idPro=$idPro";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result)) {
                    $line = mysqli_fetch_assoc($result);
                }
            }
            ?>
            <div class="container" style="margin-top: 50px;">
                <h2>Update Product</h2>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="" name="idPro" value="<?php echo $line['idPro'] ?>">
                    <input type="hidden" class="form-control" id="" name="tablename" value="<?php echo $tablename ?>">
                    <label for="marque">Marque</label>
                    <input type="text" class="form-control" id="" name="marque" value="<?php echo $line['marque'] ?>">

                </div>
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="titre" value="<?php echo $line['titre'] ?>">
                </div>
                <div class="form-group">
                    <label for="taille">Taille</label>
                    <input type="text" class="form-control" name="taille" value="<?php echo $line['taille'] ?>">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name="prix" value="<?php echo $line['prix'] ?>">
                </div>
                <div class="form-group">
                    <label for="prix">Image (optional)</label>
                    <input type="file" class="form-control" name="image" value="<?php echo $line['image'] ?>">
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
        ?>
    </body>

    </html>
<?php } ?>