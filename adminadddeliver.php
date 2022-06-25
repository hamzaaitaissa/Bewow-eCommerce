<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if (!isset($_SESSION['idadmin'])) {
    header('location:loginadmin.php');
}
if (isset($_SESSION['userid'])) {
    header('location:login.php');
}
if ($conn) {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['tel']) and !empty($_FILES['image']) and !empty($_POST['ddn'])) {
            $nom = mysqli_real_escape_string($conn, $_POST['nom']);
            $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $tel = mysqli_real_escape_string($conn, $_POST['tel']);
            $ddn = mysqli_real_escape_string($conn, $_POST['ddn']);
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
                        $img_upload_path = 'uploadsDeliver/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $sql = "INSERT INTO deliver(nom,prenom,email,tel,image,ddn) VALUES ('$nom','$prenom','$email','$tel','$new_img_name','$ddn')";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if ($result > 0) {
                            header('location:adminadddeliver.php?success');
                        } else {
                            header('location:adminadddeliver.php?error');
                        }
                    } else {
                        header('location:adminadddeliver.php?wrongext');
                    }
                } else {
                    header('location:adminadddeliver.php?bigfile');
                }
            } else {
                header('location:adminadddeliver.php?errorupload');
            }
        } else {
            header('location:adminadddeliver.php?fill');
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

        body {
            font-family: 'Poppins', sans-serif;
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
            font-family: 'Poppins', sans-serif;
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

        <form action="adminadddeliver.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h2>Add Deliver</h2>
                <div class="form-group">
                    <label for="nom">Deliver Name</label>
                    <input type="text" class="form-control" name="nom" placeholder="Enter deliver's name...">
                </div>
                <div class="form-group">
                    <label for="nom">Deliver Last Name</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Enter deliver's Last name...">
                </div>
                <div class="form-group">
                    <label for="nom">Deliver Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter deliver's email...">
                </div>
                <div class="form-group">
                    <label for="nom">Deliver Phone Number</label>
                    <input type="number" class="form-control" name="tel" placeholder="Enter deliver's phone number...">
                </div>
                <div class="form-group">
                    <label for="ddn">Deliver Birthday</label>
                    <input type="date" class="form-control" name="ddn" placeholder="Enter deliver's phone number...">
                </div>
                <div class="form-group">
                    <label for="nom">Deliver Photo</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <input type="submit" class="btn btn-outline-primary" name="submit">
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
                echo '<div class=""></div><div class="alert alert-warning alert-dismissible" id="alerts" >
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