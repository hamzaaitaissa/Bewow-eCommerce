<?php
session_start();
/*if(empty( $_SESSION['idadmin'])){
    header('location:loginadmin.php');
}*/
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if (!isset($_SESSION['idadmin'])) {
  header('location:loginadmin.php');
}
if ($conn) {
  if (isset($_POST['submit'])) {
    if (!empty($_POST['marque']) and !empty($_POST['description']) and !empty($_POST['titre']) and !empty($_POST['taille']) and !empty($_POST['sex']) and !empty($_POST['prix']) and !empty($_FILES['image'])) {
      $marque = mysqli_real_escape_string($conn, $_POST['marque']);
      $titre = mysqli_real_escape_string($conn, $_POST['titre']);
      $taille = mysqli_real_escape_string($conn, $_POST['taille']);
      $sex = mysqli_real_escape_string($conn, $_POST['sex']);
      $prix = mysqli_real_escape_string($conn, $_POST['prix']);
      $description = mysqli_real_escape_string($conn, $_POST['description']);
      $img_name = $_FILES['image']['name'];
      $img_size = $_FILES['image']['size'];
      $img_error = $_FILES['image']['error'];
      $tmp_name = $_FILES['image']['tmp_name'];
      if ($sex == 'men') {
        //men product table
        if ($img_error === 0) {
          if ($img_size < 1250000) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_lc, $allowed_exs)) {
              $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
              $img_upload_path = 'uploads/' . $new_img_name;
              move_uploaded_file($tmp_name, $img_upload_path);
              $sql = "INSERT INTO product_men (marque,titre,taille,prix,image,description) VALUES ('$marque','$titre','$taille','$prix','$new_img_name','$description')";
              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              if ($result > 0) {
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
      } else {
        //women product table
        if ($img_error === 0) {
          if ($img_size < 1250000) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
            if (in_array($img_ex_lc, $allowed_exs)) {
              $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
              $img_upload_path = 'uploads/' . $new_img_name;
              move_uploaded_file($tmp_name, $img_upload_path);
              $sql = "INSERT INTO product_women (marque,titre,taille,prix,image,description) VALUES ('$marque','$titre','$taille','$prix','$new_img_name','$description')";
              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              if ($result > 0) {
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
    } else {
      header('location:adminaddproduct.php?fill');
    }
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bewow</title>
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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    li {
      letter-spacing: 2px;
      padding-right: 20px;
      padding-left: 20px;
    }

    .navbar-nav {
      margin-left: auto;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    .both {
      width: 100%;
      display: flex;
      flex-direction: row;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
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
              Add
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="adminaddproduct.php">Add Product</a>
              <a class="dropdown-item" href="adminadddeliver.php">Add Deliver</a>
            </div>
          </div>

          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style=" padding-right:20px; padding-left: 20px;color: rgba(255,255,255,.5); letter-spacing: 2px;">
              Update
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="adminupdateproduct.php">Update Product</a>
              <a class="dropdown-item" href="adminupdatedeliver.php">Update Deliver</a>
            </div>
          </div>
          <li class="nav-item " style="letter-spacing: 2px; padding-right:20px; padding-left: 20px;">
            <a class="nav-link " href="adminStatistics.php">Statistics</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="loginadmin.php?logout">Log out</a>
          </li>
          <?php
          $idAdmin = $_SESSION['idadmin'];
          $sqlPic = "SELECT image,nom FROM ADMIN WHERE idAdmin=$idAdmin";
          $resultPic = mysqli_query($conn, $sqlPic) or die(mysqli_error($conn));
          if (mysqli_num_rows($resultPic) > 0) {
            $linePic = mysqli_fetch_assoc($resultPic);
          ?>
            <img src="uploadsAdmin/<?php echo $linePic['image'] ?>" alt="" style="width:30px;height:30px;border-radius:50%;border:1px solid #34e718">
            <span style="margin:3px;color:white;"><?php echo strtoupper($linePic['nom']) ?></span>
          <?php
          }
          ?>
        </div>
      </ul>

    </nav>
    <form action="adminaddproduct.php" method="POST" enctype="multipart/form-data">
      <div class="container">
        <h2>Add a Product</h1>
          <table class="table">

            <tr>
              <td><label for="marque">Brand:</label></td>
              <td><input type="text" name="marque" id="name" class="form-control" autocomplete="off" placeholder="Enter brand"></td>

            </tr>
            <tr>
              <!--Remember titre ghaykoon dyal wach hoodie jeans shoes i guess-->
              <td><label for="titre">Title:</label></td>
              <td><select name="titre" id="" class="browser-default custom-select custom-select-lg mb-3">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="Hoodies">Hoodie</option>
                  <option value="T-Shirts">T-Shirts</option>
                  <option value="Jeans">Jeans</option>
                  <option value="Snicker">Snickers</option>
                  <option value="Jacket">Jacket</option>
                </select></td>
            </tr>
            <tr>
              <td><label for="taille">Size:</label></td>
              <td><select name="taille" id="" class="browser-default custom-select custom-select-lg mb-3">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                </select></td>

            </tr>
            <tr>
              <td><label for="taille">Sex:</label></td>
              <td><select name="sex" id="" class="browser-default custom-select custom-select-lg mb-3">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="men">Men</option>
                  <option value="women">Women</option>
                </select></td>

            </tr>
            <tr>
              <td><label for="prix">Price:</label></td>
              <td><input type="number" name="prix" class="form-control" id="psd" autocomplete="off" placeholder="Enter price"></td>
            </tr>
            <tr>
              <td><label for="prix">Description:</label></td>
              <td><textarea type="text" name="description" class="form-control" id="psd" autocomplete="off" placeholder="Enter description"></textarea></td>
            </tr>
            <tr>
              <td><label for="image">Image</label></td>
              <td>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="validatedCustomFile" required name="image">
                  <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                  <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
              </td>
            </tr>

            <tr>
              <td></td>
              <td><input type="submit" class="btn btn-outline-primary" name="submit"></td>
            </tr>
          </table>
      </div>
      <?php
      if (isset($_GET["success"])) {
        echo '<div class="alert alert-success alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Success!</strong> Product Added.
        </div>';
      }
      if (isset($_GET["error"])) {
        echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Danger!</strong> An error has occured.
    </div>';
      }
      if (isset($_GET["fill"])) {
        echo '<div class="alert alert-warning alert-dismissible" id="alerts" >
    <button type="button" class="close" data-dismiss="alert" >&times;</button>
    <strong>Warning!</strong> Fill all the fields.
      </div>';
      }

      if (isset($_GET["wrongext"])) {
        echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Danger!</strong> We dont upload files of this extension.
    </div>';
      }
      if (isset($_GET["bigfile"])) {
        echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Danger!</strong> This file is too big.
    </div>';
      }
      if (isset($_GET["errorupload"])) {
        echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Danger!</strong> Error while uploading :(.
    </div>';
      }
      ?>
    </form>

  </body>

  </html>
<?php } ?>