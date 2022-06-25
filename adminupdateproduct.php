<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if (!isset($_SESSION['idadmin'])) {
  header('location:loginadmin.php');
}
if ($conn) {
  if (isset($_GET['idProDELMEN'])) {
    $idPro = $_GET['idProDELMEN'];
    $sql2 = "DELETE FROM product_men where idPro=$idPro";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
      header('location:adminupdateproduct.php?success');
    } else {
      header('location:adminupdateproduct.php?error');
    }
  }

  if (isset($_GET['idProDELWOMEN'])) {
    $idPro = $_GET['idProDELWOMEN'];
    $sql2 = "DELETE FROM product_women where idPro=$idPro";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) > 0) {
      header('location:adminupdateproduct.php?success');
    } else {
      header('location:adminupdateproduct.php?error');
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <!-- Latest compiled and minified CSS -->

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

    .search-container input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    .search-container select {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: #ddd;
      font-size: 17px;
      border: none;
      cursor: pointer;
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
    <div class="container" style="    display: flex;align-items: center;justify-content: center;padding:10px;margin-bottom:20px">
      <div class="form-outline">
        <input type="search" id="search" class="form-control" placeholder="Search By id.." onkeyup="search()" />
        <select class="selectpicker" id="selectedTable" style="border:none !important;outline:none !important;margin-top:10px;">
          <option value="men">Men</option>
          <option value="women">Women</option>
        </select>
      </div>
    </div>
    <div class="container" id="here"></div>
    <div class="container" style="display: flex;position: sticky;top:0; position: -webkit-sticky">
      <div class="gotomen" style="width: 50%;margin:20px">
        <div class="span4">
          <a class="btn btn-large  btn-info" href="#men">GO TO MEN PRODUCT</a>
        </div>
      </div>
      <div class="gotowomen" style="width: 50%;margin:20px">
        <div class="span4">
          <a class="btn btn-large  btn-secondary" href="#women">GO TO WOMEN PRODUCT</a>
        </div>
      </div>
    </div>

    <!-- <?php
          // if (isset($_POST['searchbtn'])) {
          //   if (!empty($_POST['search']) and !empty($_POST['sex'])) {
          //     $search = mysqli_real_escape_string($conn, $_POST['search']);
          //     $tblname = mysqli_real_escape_string($conn, $_POST['sex']);
          //     $sql3 = "SELECT * FROM $tblname WHERE titre like '%$search%'";
          //     $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

          ?>
        <div class="container">
          <h2 style="text-align:center;">Your search </h2>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Marque</th>
                <th scope="col">Titre</th>
                <th scope="col">Taille</th>
                <th scope="col">Prix</th>


              </tr>
            </thead>

        <?php

        //     if (mysqli_num_rows($result3) > 0) {
        //       while ($line3 = mysqli_fetch_assoc($result3)) {
        //         echo '<tbody><tr>

        //   <td align="center">' . $line3['idPro'] . '</td>
        //   <td align="center"><img src="uploads/' . $line3['image'] . '" style="margin:0;width:100px;height:150px" alt=""></td>
        //   <td align="center">' . $line3['marque'] . '</td>
        //   <td align="center">' . $line3['titre'] . '</td>
        //   <td align="center">' . $line3['taille'] . '</td>
        //   <td align="center">' . $line3['prix'] . '.00DH</td>
        //   <tr>
        //   </tr></tbody>';
        //       }
        //     }
        //   }
        // }
        ?> -->
    </table>
    </div>

    <form action="adminupdateproduct.php" method="POST">
      <div class="container" style="margin-top: 50px;">
        <h2 id="men">MEN PRODUCT</h2>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Marque</th>
              <th scope="col">Titre</th>
              <th scope="col">Taille</th>
              <th scope="col">Prix</th>


            </tr>
          </thead>

          <?php
          $sql = "SELECT * FROM product_men ";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) {
            while ($line = mysqli_fetch_assoc($result)) {
              echo '<tbody><tr>
            
            <td align="center">' . $line['idPro'] . '</td>
            <td align="center"><img src="uploads/' . $line['image'] . '" style="margin:0;width:100px;height:150px" alt=""></td>
            <td align="center">' . $line['marque'] . '</td>
            <td align="center">' . $line['titre'] . '</td>
            <td align="center">' . $line['taille'] . '</td>
            <td align="center">' . $line['prix'] . '.00DH</td>
            <tr>
            <td align="center" colspan=6><a href="updatespecificproduct.php?idProUPMEN=' . $line['idPro'] . '&name=product_men">Update</a> <a href="adminupdateproduct.php?idProDELMEN=' . $line['idPro'] . '" style="color:red;margin-left:50px">Delete</a></td></tr>
            </tr></tbody>';
            }
          }

          ?>
        </table>
      </div>
      <div class="container" style="margin-top: 50px;">
        <h2 id="women">WOMEN PRODUCT</h2>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Marque</th>
              <th scope="col">Titre</th>
              <th scope="col">Taille</th>
              <th scope="col">Prix</th>


            </tr>
          </thead>

          <?php
          $sql = "SELECT * FROM product_women ";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) {
            while ($line = mysqli_fetch_assoc($result)) {
              echo '<tbody><tr>
            
            <td align="center">' . $line['idPro'] . '</td>
            <td align="center"><img src="uploads/' . $line['image'] . '" style="margin:0;width:100px;height:150px" alt=""></td>
            <td align="center">' . $line['marque'] . '</td>
            <td align="center">' . $line['titre'] . '</td>
            <td align="center">' . $line['taille'] . '</td>
            <td align="center">' . $line['prix'] . '.00DH</td>
            <tr>
            <td align="center" colspan=6><a href="updatespecificproduct.php?idProUPWOMEN=' . $line['idPro'] . '&name=product_women">Update</a> <a href="adminupdateproduct.php?idProDELWOMEN=' . $line['idPro'] . '" style="color:red;margin-left:50px">Delete</a></td></tr>
            </tr></tbody>';
            }
          }

          ?>
        </table>
      </div>
    </form>
    <?php
    if (isset($_GET["success"])) {
      echo '<div class="alert alert-success alert-dismissible" id="alerts" >
      <button type="button" class="close" data-dismiss="alert" >&times;</button>
      <strong>Success!</strong> Product Deleted.
  </div>';
    }
    if (isset($_GET["error"])) {
      echo '<div class="alert alert-danger alert-dismissible" id="alerts" >
  <button type="button" class="close" data-dismiss="alert" >&times;</button>
  <strong>Danger!</strong> Error.
</div>';
    }

    ?>
  </body>
  <script src="js/jquery-3.6.0.js"></script>
  <script>
    function search() {
      let selectedTable = $('#selectedTable').val()
      let idPro = $('#search').val();
      if (idPro != '' && selectedTable != '') {
        $.post("adminSearchProduct.php", {
            idPro: idPro,
            selectedTable: selectedTable
          },
          (result, status) => {
            if (result == 1) {
              alert(`The id ${idPro} doesnt exist in ${selectedTable} table`)
            } else {
              $('#here').html(result);
            }
          })
      } else if (idPro == '') {
        $('#here').empty();
      }


    }
  </script>

  </html>
<?php } ?>