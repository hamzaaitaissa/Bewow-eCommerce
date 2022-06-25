<?php
session_start();
if (empty($_SESSION['idadmin'])) {
    header('Location:loginadmin.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Statistics</title>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        #li1 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li1:hover {
            background-color: #301934;
        }

        #li2 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li2:hover {
            background-color: #301934;
        }

        #li3 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li3:hover {
            background-color: #301934;
        }

        #li4 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li4:hover {
            background-color: #301934;
        }

        #li5 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li5:hover {
            background-color: #301934;
        }

        #li6 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li6:hover {
            background-color: #301934;
        }

        #li7 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li7:hover {
            background-color: #301934;
        }

        #li8 {
            background-color: #5D3FD3;
            border-radius: 30px;
            transition: 0.3s ease;
            text-align: center;
            margin: 0px 10px;
            padding: 7px;
        }

        #li8:hover {
            background-color: #301934;
        }

        @media only screen and (max-width: 720px) {

            #li1,
            #li2,
            #li3,
            #li4,
            #li5,
            #li6,
            #li7,
            #li8 {
                margin-top: 10px;
            }

            #a,
            #b {
                padding: 10px;
                text-align: center;
                width: 50%
            }

            #yes {
                flex-direction: column;
                justify-content: space-around;
                width: 100%;
            }
        }

        #users {
            text-align: center;
        }

        .circle-tile {
            margin-bottom: 15px;
            text-align: center;
        }

        .circle-tile-heading {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 100%;
            color: #FFFFFF;
            height: 80px;
            margin: 0 auto -40px;
            position: relative;
            transition: all 0.3s ease-in-out 0s;
            width: 80px;
        }

        .circle-tile-heading .fa {
            line-height: 80px;
        }

        .circle-tile-content {
            padding-top: 50px;
        }

        .circle-tile-number {
            font-size: 26px;
            font-weight: 700;
            line-height: 1;
            padding: 5px 0 15px;
        }

        .circle-tile-description {
            text-transform: uppercase;
        }

        .circle-tile-footer {
            background-color: #5D3FD3;
            color: rgba(255, 255, 255, 0.5);
            display: block;
            padding: 5px;
            transition: all 0.3s ease-in-out 0s;
        }

        .circle-tile-footer:hover {
            background-color: rgba(0, 0, 0, 0.2);
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
        }

        .circle-tile-heading.green:hover {
            background-color: #138F77;
        }

        .circle-tile-heading.orange:hover {
            background-color: #DA8C10;
        }

        .circle-tile-heading.blue:hover {
            background-color: #2473A6;
        }

        .circle-tile-heading.red:hover {
            background-color: #CF4435;
        }

        .circle-tile-heading.purple:hover {
            background-color: #7F3D9B;
        }

        .tile-img {
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
        }

        .dark-blue {
            background-color: #5D3FD3;
        }

        .green {
            background-color: #16A085;
        }

        .blue {
            background-color: #2980B9;
        }

        .orange {
            background-color: #F39C12;
        }

        .red {
            background-color: #E74C3C;
        }

        .purple {
            background-color: #8E44AD;
        }

        .dark-gray {
            background-color: #7F8C8D;
        }

        .gray {
            background-color: #95A5A6;
        }

        .light-gray {
            background-color: #BDC3C7;
        }

        .yellow {
            background-color: #F1C40F;
        }

        .text-dark-blue {
            color: #34495E;
        }

        .text-green {
            color: #16A085;
        }

        .text-blue {
            color: #2980B9;
        }

        .text-orange {
            color: #F39C12;
        }

        .text-red {
            color: #E74C3C;
        }

        .text-purple {
            color: #8E44AD;
        }

        .text-faded {
            color: white;
        }

        #a {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
            border: #5D3FD3 1px solid;
            flex-direction: column;
            margin: 0px 10px
        }

        #b {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
            border: #5D3FD3 1px solid;
            flex-direction: column;
            margin: 0px 10px
        }

        .productsMen,
        .productsWmn {
            text-align: center;
        }

        #store {
            font-size: 40px;
            background-color: #5D3FD3;
            padding: 10px;
            border-radius: 50%;
            color: white;
            transition: 0.3s ease-in-out;
        }

        #store:hover {
            transform: scale(0.7);
        }

        #store2 {
            font-size: 40px;
            background-color: #5D3FD3;
            padding: 10px;
            border-radius: 50%;
            color: white;
            transition: 0.3s ease-in-out;
        }

        #store2:hover {
            transform: scale(0.7);
        }

        .proNumber {
            font-size: 1.3rem;
            margin: 5px 0px;
        }
    </style>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="min-height: 8vh;background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#" style="padding: 5px;"><img src="img/logo.png" alt="logo" style="width: 40px;"></a>

            <!-- Links -->

            <ul class="navbar-nav" style="margin-left: auto;">
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
                    <li class="nav-item " style="letter-spacing: 2px;padding-right:20px; padding-left: 20px;">
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
        <!-- subMenu -->
        <nav class="navbar navbar-expand-sm bg-light justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item" id="li1">
                    <a class="nav-link" href="#users" style="color:white">Users</a>
                </li>
                <li class="nav-item" id="li2">
                    <a class="nav-link" href="#products" style="color:white">Products</a>
                </li>
                <li class="nav-item" id="li3">
                    <a class="nav-link" href="#mostM" style="color:white">Most Less Sold Men</a>
                </li>
                <li class="nav-item" id="li4">
                    <a class="nav-link" href="#mostW" style="color:white">Most Less Sold Women</a>
                </li>
                <li class="nav-item" id="li5">
                    <a class="nav-link" href="#orders" style="color:white">Orders</a>
                </li>
                <li class="nav-item" id="li6">
                    <a class="nav-link" href="#cart" style="color:white">In Cart</a>
                </li>
                <li class="nav-item" id="li7">
                    <a class="nav-link" href="#earned" style="color:white">Earned</a>
                </li>
                <li class="nav-item" id="li8">
                    <a class="nav-link" href="#categories" style="color:white">Categories</a>
                </li>
            </ul>
        </nav>
        <!-- users -->
        <div class="container" style="margin-top:80px;">
            <h2 id="users">Users Count</h2>
            <div class="row">
                <?php
                $sql = "SELECT COUNT(userId) as 's' FROM users";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) > 0) {
                    $line2 = mysqli_fetch_assoc($result);
                    $numUsers = $line2['s'];
                }

                ?>
                <div class="col">
                    <div class="circle-tile ">
                        <a href="#">
                            <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded"> Users</div>
                            <div class="circle-tile-number text-faded "><?php echo $numUsers ?></div>
                            <a class="circle-tile-footer" href="adminUsers.php">More Info <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- products -->
        <div class="container" style="margin-top:80px">
            <h2 id="products" style="text-align: center;">Products</h2>
            <div style="display: flex;justify-content:center;align-items:center" id="yes">
                <div id="a">
                    <h3 class="productsMen">Product Men</h3>
                    <i class="fas fa-store" id="store"></i>
                    <?php
                    $sql2 = "SELECT count(idPro) as 'y' from product_men";
                    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                    if (mysqli_num_rows($result2) > 0) {
                        $line = mysqli_fetch_assoc($result2);
                        $proNum = $line['y'];
                    }
                    ?>
                    <p class="proNumber">There are <?php echo $proNum ?> products</p>
                </div>
                <div id="b">
                    <h3 class="productsWmn">Product Women</h3>
                    <i class="fas fa-store" id="store2"></i>
                    <?php
                    $sql3 = "SELECT count(idPro) as 'w' FROM product_women";
                    $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                    if (mysqli_num_rows($result3) > 0) {
                        $line3 = mysqli_fetch_assoc($result3);
                        $proNumW = $line3['w'];
                    }
                    ?>
                    <p class="proNumber">There are <?php echo $proNumW ?> products</p>
                </div>
            </div>

        </div>
        <!-- number of categories -->
        <div class="container" style="margin-top:80px;">
            <h2 id="categories">categories</h2>
            <div class="row">

                <div class="col">
                    <div class="circle-tile ">
                        <a href="#">
                            <div class="circle-tile-heading dark-blue"><i class="fas fa-book-reader fa-fw fa-3x" style="margin-top:13px"></i></div>
                        </a>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded"> Categories</div>
                            <div class="circle-tile-number text-faded ">5 categories</div>
                            <p class="circle-tile-footer">Jeans, Jackets, T-shirts, Snickers and hoodies <i class="fas fa-check"></i></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Most Less -->
        <div class="container" style="margin-top:80px">
            <h2 id="mostM" style="text-align: center;">Most Less Men</h2>
            <div style="display: flex;justify-content:center;align-items:center" id="yes">
                <div id="a">
                    <h3 class="productsMen">Most Sold In Men</h3>
                    <?php
                    $sql4 = "SELECT product_men.* ,count(commande.idProMen)
                    FROM product_men,commande
                    WHERE product_men.idPro=commande.idProMen
                    GROUP BY commande.idProMen
                    ORDER BY count(commande.idProMen) DESC limit 0,1";
                    $result4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
                    if (mysqli_num_rows($result4) > 0) {
                        while ($line4 = mysqli_fetch_assoc($result4)) {


                    ?>
                            <img src="uploads/<?php echo $line4['image'] ?>" alt="" width="50px" height="60px">
                            <p class="proNumber">ID: <?php echo $line4['idPro'] ?></p>
                            <p class="proNumber">Title: <?php echo $line4['titre'] ?></p>
                            <p class="proNumber">Brand: <?php echo $line4['marque'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div id="b">
                    <h3 class="productsWmn">Less Sold In Men</h3>
                    <?php
                    $sql5 = "SELECT product_men.* ,count(commande.idProMen)
                    FROM product_men,commande
                    WHERE product_men.idPro=commande.idProMen
                    GROUP BY commande.idProMen
                    ORDER BY count(commande.idProMen) ASC limit 0,1";
                    $result5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));
                    if (mysqli_num_rows($result5) > 0) {
                        while ($line5 = mysqli_fetch_assoc($result5)) {

                    ?>
                            <img src="uploads/<?php echo $line5['image'] ?>" alt="" width="50px" height="60px">
                            <p class="proNumber">ID: <?php echo $line5['idPro'] ?></p>
                            <p class="proNumber">Title: <?php echo $line5['titre'] ?></p>
                            <p class="proNumber">Brand: <?php echo $line5['marque'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
        <!-- Most Less Wmn -->
        <div class="container" style="margin-top:80px">
            <h2 id="mostW" style="text-align: center;">Most Less Women</h2>
            <div style="display: flex;justify-content:center;align-items:center" id="yes">
                <div id="a">
                    <h3 class="productsMen">Most Sold In Women</h3>
                    <?php
                    $sql6 = "SELECT product_women.* ,count(commande.idProWomen)
                    FROM product_women,commande
                    WHERE product_women.idPro=commande.idProWomen
                    GROUP BY commande.idProWomen
                    ORDER BY count(commande.idProWomen) DESC limit 0,1";
                    $result6 = mysqli_query($conn, $sql6) or die(mysqli_error($conn));
                    if (mysqli_num_rows($result6) > 0) {
                        while ($line6 = mysqli_fetch_assoc($result6)) {


                    ?>
                            <img src="uploads/<?php echo $line6['image'] ?>" alt="" width="50px" height="60px">
                            <p class="proNumber">ID: <?php echo $line6['idPro'] ?></p>
                            <p class="proNumber">Title: <?php echo $line6['titre'] ?></p>
                            <p class="proNumber">Brand: <?php echo $line6['marque'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div id="b">
                    <h3 class="productsWmn">Less Sold In Women</h3>
                    <?php
                    $sql7 = "SELECT product_women.* ,count(commande.idProWomen)
                    FROM product_women,commande
                    WHERE product_women.idPro=commande.idProWomen
                    GROUP BY commande.idProWomen
                    ORDER BY count(commande.idProWomen) ASC limit 0,1";
                    $result7 = mysqli_query($conn, $sql7) or die(mysqli_error($conn));
                    if (mysqli_num_rows($result7) > 0) {
                        while ($line7 = mysqli_fetch_assoc($result7)) {

                    ?>
                            <img src="uploads/<?php echo $line7['image'] ?>" alt="" width="50px" height="60px">
                            <p class="proNumber">ID: <?php echo $line7['idPro'] ?></p>
                            <p class="proNumber">Title: <?php echo $line7['titre'] ?></p>
                            <p class="proNumber">Brand: <?php echo $line7['marque'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
        <!-- earned -->
        <div class="container" style="margin-top:80px;">
            <h2 id="earned">Earned</h2>
            <div class="row">
                <?php
                $sql8 = "SELECT SUM(prix) as 'somme' FROM commande";
                $result8 = mysqli_query($conn, $sql8) or die(mysqli_error($conn));
                if (mysqli_num_rows($result8) > 0) {
                    $line8 = mysqli_fetch_assoc($result8);
                    $sum = $line8['somme'];
                }

                ?>
                <div class="col">
                    <div class="circle-tile ">
                        <a href="#">
                            <div class="circle-tile-heading dark-blue"><i class="fas fa-money-bill fa-fw fa-3x" style="margin-top:13px"></i></div>
                        </a>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded"> Total Money Earned</div>
                            <div class="circle-tile-number text-faded "><?php echo $sum ?>.00DH</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- orders -->
        <div class="container" style="margin-top:80px;">
            <h2 id="orders">Orders</h2>
            <div class="row">
                <?php
                $sql9 = "SELECT count(idCmd) as 'count' FROM commande";
                $result9 = mysqli_query($conn, $sql9) or die(mysqli_error($conn));
                if (mysqli_num_rows($result9) > 0) {
                    $line9 = mysqli_fetch_assoc($result9);
                    $count = $line9['count'];
                }

                ?>
                <div class="col">
                    <div class="circle-tile ">
                        <a href="#">
                            <div class="circle-tile-heading dark-blue"><i class="fas fa-shopping-basket fa-fw fa-3x" style="margin-top:13px"></i></div>
                        </a>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded">Orders</div>
                            <div class="circle-tile-number text-faded "><?php echo $count ?> Orders</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } ?>