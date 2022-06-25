<?php
session_start();
/*if(!empty($_SESSION['idAdmin'])){

}*/
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
  $reponse = '';
  if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['adminUid']) and !empty($_POST['password']) and !empty($_POST['code']) and !empty($_FILES['image'])) {
      if ($_POST['code'] == 123) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $adminUid = mysqli_real_escape_string($conn, $_POST['adminUid']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $img_error = $_FILES['image']['error'];
        $tmp_name = $_FILES['image']['tmp_name'];
        if ($img_error === 0) {
          if ($img_size < 1250000) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpeg', 'png', 'jpg');
            if (in_array($img_ex_lc, $allowed_exs)) {
              $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
              $img_upload_path = 'uploadsAdmin/' . $new_img_name;
              move_uploaded_file($tmp_name, $img_upload_path);
              $sql2 = "SELECT * FROM admin WHERE adminUid='$adminUid'";
              $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
              if (mysqli_num_rows($result2) == 0) {
                $sql = "INSERT INTO admin (nom,email,adminUid,password,image) VALUES ('$name','$email','$adminUid','$password','$new_img_name')";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if ($result > 0) {
                  header('location:signinadmin.php?success');
                } else {
                  //$reponse = "<span style='color:white;background-color:red;border-radius:25px;padding:1rem;'>Unknown Error</span><br>";
                  header('location:signinadmin.php?error');
                }
              } else {
                header('location:signinadmin.php?uidexists');
              }
            } else {
              header('location:signinadmin.php?wrongex');
            }
          } else {
            header('location:signinadmin.php?filetoobig');
          }
        } else {
          header('location:signinadmin.php?errorupload');
        }
      } else {
        header('location:signinadmin.php?wrongcode');
        //$reponse = "<span style='color:white;background-color:red;border-radius:25px;padding:1rem;'>Wrong Code!</span><br>";
      }
    } else {
      header('location:signinadmin.php?fill');
      //$reponse = "<span style='color:white;background-color:red;border-radius:25px;padding:1rem;'>Fill all the fields</span><br>";
    }
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeWoW</title>
  </head>
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="HomePage.php" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>

      <!-- Links -->

      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link " href="loginadmin.php">Log In <i class="fas fa-door-open"></i></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="signinadmin.php">Sign In <i class="fas fa-user-plus"></i></a>
        </li>
      </ul>
      </div>
    </nav>
    <div class="container">
      <form action="signinadmin.php" method="POST" enctype="multipart/form-data">
        <h1 class="display-3">Admin Sign In</h1>
        <table class="table">

          <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" name="name" id="name" class="form-control" autocomplete="off"></td>

          </tr>
          <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" class="form-control" id="email" autocomplete="off"></td>
          </tr>
          <tr>
            <td><label for="name">UserName</label></td>
            <td><input type="text" name="adminUid" id="user" class="form-control" placeholder="Add a user-name" autocomplete="off"></td>

          </tr>
          <tr>
            <td><label for="Password">Password:</label></td>
            <td><input type="password" name="password" class="form-control" id="psd" autocomplete="off"></td>
          </tr>
          <tr>
            <td><label for="image">Image:</label></td>
            <td>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </td>
          </tr>
          <tr>
            <td><label for="Password">BeWoW Pass</label></td>
            <td><input type="password" name="code" class="form-control" id="psd" autocomplete="off"></td>
          </tr>

          <tr>
            <td></td>
            <td><input type="submit" class="btn btn-outline-primary" name="submit"></td>
          </tr>
        </table>
        <?php
        if (isset($_GET["success"])) {
          echo '<div class="alert alert-success alert-dismissible" id="alerts" >
            <button type="button" class="close" data-dismiss="alert" >&times;</button>
            <strong>Success!</strong> You have been Signed Up.
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
        if (isset($_GET["wrongcode"])) {
          echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
      <button type="button" class="close" data-dismiss="alert" >&times;</button>
      <strong>Danger!</strong> Wrong Code!
        </div>';
        }
        if (isset($_GET["uidexists"])) {
          echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
        <button type="button" class="close" data-dismiss="alert" >&times;</button>
        <strong>Danger!</strong> UserName already exists.
    </div>';
        }
        if (isset($_GET["wrongex"])) {
          echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
    <button type="button" class="close" data-dismiss="alert" >&times;</button>
    <strong>Danger!</strong> Unsupported Extension.
</div>';
        }
        if (isset($_GET["filetoobig"])) {
          echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
  <button type="button" class="close" data-dismiss="alert" >&times;</button>
  <strong>Danger!</strong> File too large.
</div>';
        }
        if (isset($_GET["errorupload"])) {
          echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
  <button type="button" class="close" data-dismiss="alert" >&times;</button>
  <strong>Danger!</strong> There was an error uploading your image.
</div>';
        }
        ?>
      </form>
    </div>

  </body>

  </html>
<?php } ?>