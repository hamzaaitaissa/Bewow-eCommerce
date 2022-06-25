<?php
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  session_unset();
  header('location:loginadmin.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
  if (isset($_POST['submit'])) {
    if (!empty($_POST['adminUid']) and !empty($_POST['password']) and !empty($_POST['code'])) {
      if ($_POST['code'] == 123) {
        $adminUid = mysqli_real_escape_string($conn, $_POST['adminUid']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $sql = "SELECT * FROM admin WHERE adminUid='$adminUid' AND password='$password'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
          $line = mysqli_fetch_assoc($result);
          $_SESSION['idadmin'] = $line['idAdmin'];
          $_SESSION['adminuid'] = $line['adminUid'];
          header('location:adminaddproduct.php');
        } else {
          header('location:loginadmin.php?wrongpwdoruid');
        }
      } else {
        header('location:loginadmin.php?wrongcode');
      }
    } else {
      header('location:loginadmin.php?fill');
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
          <a class="nav-link " href="loginadmin.php" style="color:white">Log In <i class="fas fa-door-open"></i></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="signinadmin.php" style="color:white">Sign In <i class="fas fa-user-plus"></i></a>
        </li>
      </ul>
      </div>
    </nav>
    <div class="container">
      <form action="loginadmin.php" method="POST">
        <section class="h-100 h-custom" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                  <img src="img/loginAdmin.png" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                  <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Info</h3>

                    <form class="px-md-2">

                      <div class="form-outline mb-4">
                        <input type="text" id="form3Example1q" class="form-control" placeholder="Enter username" name="adminUid" placeholder="Add a user-name" />
                        <label class="form-label" for="form3Example1q">UserName</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example1q" class="form-control" placeholder="Enter password" name="password" autocomplete="off" />
                        <label class="form-label" for="form3Example1q">Password:</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example1q" class="form-control" placeholder="Enter Bewow Pass" name="code" autocomplete="off" />
                        <label class="form-label" for="form3Example1q">Bewow Pass:</label>
                      </div>

                      <button type="submit" class="btn btn-primary btn-lg mb-1" name="submit">Submit</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- <table class="table">
   <tr>
       <td><label for="name">UserName</label></td>
       <td><input type="text" name="adminUid" id="user" class="form-control" placeholder="Add a user-name" autocomplete="off"></td>

   </tr>
   <tr>
       <td><label for="Password">Password:</label></td>
       <td><input type="password" name="password" class="form-control" id="psd" autocomplete="off" placeholder="Add a password"></td>
   </tr>
   <tr>
       <td><label for="Password">BeWoW Pass</label></td>
       <td><input type="password" name="code" class="form-control" id="psd" autocomplete="off"></td>
   </tr>

   <tr>
       <td></td>
       <td><input type="submit" class="btn btn-outline-primary" name="submit"></td>
   </tr>
 </table> -->
      </form>
    </div>
  </body>

  </html>
<?php } ?>