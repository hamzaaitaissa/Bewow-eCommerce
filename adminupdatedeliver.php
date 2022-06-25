<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if (!isset($_SESSION['idadmin'])) {
    header('location:loginadmin.php');
}
if ($conn) {
    if (isset($_GET['idDeliver'])) {
        $_idDeliver = $_GET['idDeliver'];
        $sql2 = "DELETE FROM deliver WHERE idDeliver=$_idDeliver";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            header('location:adminupdatedeliver.php?success');
        } else {
            header('location:adminupdatedeliver.php?error');
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

        <form action="adminupdatedeliver.php" method="POST">
            <?php
            $sql = "SELECT * FROM deliver";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
                while ($line = mysqli_fetch_assoc($result)) {


            ?>
                    <div class="container" style="height:40vh;background-color:gray;display:flex;align-items:center;justify-content:center">
                        <img src="uploadsDeliver/<?php echo $line['image'] ?>" alt="" class="rounded-circle" style="width:250px; height: 250px;">
                    </div>
                    <div class="container" style="height:50vh;background-color:lavender;display:flex;align-items:center;justify-content:center;flex-direction:column;margin-bottom:30px">
                        <h3 for="nom">Name:</h3> <span name="nom" for="" class="text-nowrap"><?php echo $line['nom'] ?></span>
                        <h3 for="prenom">Last Name:</h3> <span for="" class="text-nowrap"><?php echo $line['prenom'] ?></span>
                        <h3 for="email">Email:</h3> <span for="" class="text-nowrap"><?php echo $line['email'] ?></span>
                        <h3 for="email">Phone number:</h3> <span for="" class="text-nowrap"><?php echo $line['tel'] ?></span>
                        <h3 for="email">Birthday</h3> <span for="" class="text-nowrap"><?php echo $line['ddn'] ?></span>
                        <h3 for="email">Age</h3> <span for="" class="text-nowrap"><?php
                                                                                    $today = new DateTime();
                                                                                    $birthdate = new DateTime($line['ddn']);
                                                                                    $interval = $today->diff($birthdate);
                                                                                    echo $interval->format('%y years');
                                                                                    ?></span>


                        <div style="width:50%; display:flex; align-items:center;;justify-content:space-between;margin-left:0 auto;flex-direction:row">
                            <a href='adminupdatedeliver.php?idDeliver=<?php echo $line['idDeliver'] ?>' class="btn btn-outline-danger">Delete</a>
                            <a href='updatespecificdeliver.php?idDeliver=<?php echo $line['idDeliver'] ?>' class="btn btn-outline-info">Update</a>
                        </div>

                    </div>
            <?php
                }
            }
            ?>
        </form>
        <?php
        if (isset($_GET["success"])) {
            echo '<div class="alert alert-success alert-dismissible" id="alerts" >
          <button type="button" class="close" data-dismiss="alert" >&times;</button>
          <strong>Success!</strong> Deliver has been deleted.
      </div>';
        }
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