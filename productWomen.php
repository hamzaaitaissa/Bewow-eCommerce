<?php
session_start();
// if (empty($_SESSION['userid'])) {
//     header('location:login.php');
// }
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
    if (isset($_GET['type'])) {
        $titre = $_GET['type'];
    } else {
        $titre = "walo";
    }
    if (!empty($_SESSION['userid'])) {
        $userIdC = $_SESSION['userid'];
        $sqlC = "SELECT * from cart where userId=$userIdC";
        $resultC = mysqli_query($conn, $sqlC) or die(mysqli_error($conn));
        $num = mysqli_num_rows($resultC);


        $sqlH = 'SELECT * from product_women where titre="Hoodies"';
        $resultH = mysqli_query($conn, $sqlH) or die(mysqli_error($conn));
        $numH = mysqli_num_rows($resultH);


        $sqlJ = 'SELECT * from product_women where titre="jeans"';
        $resultJ = mysqli_query($conn, $sqlJ) or die(mysqli_error($conn));
        $numJ = mysqli_num_rows($resultJ);


        $sqlS = 'SELECT * from product_women where titre="Snicker"';
        $resultS = mysqli_query($conn, $sqlS) or die(mysqli_error($conn));
        $numS = mysqli_num_rows($resultS);


        $sqlT = 'SELECT * from product_women where titre="T-Shirts"';
        $resultT = mysqli_query($conn, $sqlT) or die(mysqli_error($conn));
        $numT = mysqli_num_rows($resultT);


        $sqlJA = 'SELECT * from product_women where titre="Jacket"';
        $resultJA = mysqli_query($conn, $sqlJA) or die(mysqli_error($conn));
        $numJA = mysqli_num_rows($resultJA);
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

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <script src="https://kit.fontawesome.com/f9e1cc71ab.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">


    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            color: #444444;
        }

        .a,
        .a:hover {
            text-decoration: none;
            color: inherit;
        }

        .section-products {
            padding: 80px 0 54px;
        }

        .section-products .header {
            margin-bottom: 50px;
        }


        .section-products .header h2 {
            font-size: 2.2rem;
            font-weight: 400;
            color: #444444;
            text-align: center;
        }

        .section-products .single-product {
            margin-bottom: 26px;
        }

        .section-products .single-product .part-1 {
            position: relative;
            height: 290px;
            max-height: 290px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .section-products .single-product .part-1::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: all 0.3s;
        }

        .section-products .single-product:hover .part-1::before {
            transform: scale(1.2, 1.2) rotate(5deg);
        }


        .section-products #product-1 .part-1::before {
            background-size: cover;
            transition: all 0.3s;
        }

        .section-products .single-product .part-1 .discount,
        .section-products .single-product .part-1 .new {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #ffffff;
            background-color: #fe302f;
            padding: 2px 8px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .section-products .single-product .part-1 .new {
            left: 0;
            background-color: #444444;
        }

        .section-products .single-product .part-1 ul {
            position: absolute;
            bottom: -41px;
            left: 20px;
            margin: 0;
            padding: 0;
            list-style: none;
            opacity: 0;
            transition: bottom 0.5s, opacity 0.5s;
        }

        .section-products .single-product:hover .part-1 ul {
            bottom: 30px;
            opacity: 1;
        }

        .section-products .single-product .part-1 ul li {
            display: inline-block;
            margin-right: 4px;
        }

        .section-products .single-product .part-1 ul li a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #ffffff;
            color: #444444;
            text-align: center;
            box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
            transition: color 0.2s;
        }

        .section-products .single-product .part-1 ul li a:hover {
            color: #fe302f;
        }

        .section-products .single-product .part-2 .product-title {
            font-size: 1rem;
        }

        .section-products .single-product .part-2 h4 {
            display: inline-block;
            font-size: 1rem;
        }

        .section-products .single-product .part-2 .product-old-price {
            position: relative;
            padding: 0 7px;
            margin-right: 2px;
            opacity: 0.6;
        }

        .section-products .single-product .part-2 .product-old-price::after {
            position: absolute;
            content: "";
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #444444;
            transform: translateY(-50%);
        }

        li {
            letter-spacing: 2px;
            padding-right: 20px;
            padding-left: 20px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        /*here*/
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            color: #444444;
        }

        a,
        a:hover {
            text-decoration: none;
            color: inherit;
        }

        .section-products {
            padding: 80px 0 54px;
        }

        .section-products .header {
            margin-bottom: 50px;
        }

        .section-products .header h3 {
            font-size: 1rem;
            color: #fe302f;
            font-weight: 500;
        }

        .section-products .header h2 {
            font-size: 2.2rem;
            font-weight: 400;
            color: #444444;
        }

        .section-products .single-product {
            margin-bottom: 26px;
        }

        .section-products .single-product .part-1 {
            position: relative;
            height: 290px;
            max-height: 290px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .section-products .single-product .part-1::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            transition: all 0.3s;
        }

        .section-products .single-product:hover .part-1::before {
            transform: scale(1.2, 1.2) rotate(5deg);
        }





        .section-products .single-product .part-1 .discount,
        .section-products .single-product .part-1 .new {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #ffffff;
            background-color: #fe302f;
            padding: 2px 8px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .section-products .single-product .part-1 .new {
            left: 0;
            background-color: #444444;
        }

        .section-products .single-product .part-1 ul {
            position: absolute;
            bottom: -41px;
            left: 5px;
            margin: 0;
            padding: 0;
            list-style: none;
            opacity: 0;
            transition: bottom 0.5s, opacity 0.5s;
        }

        .section-products .single-product:hover .part-1 ul {
            bottom: 30px;
            opacity: 1;
        }

        .section-products .single-product .part-1 ul li {
            display: inline-block;
            margin-right: 4px;
        }

        .section-products .single-product .part-1 ul li a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #ffffff;
            color: #444444;
            text-align: center;
            box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
            transition: color 0.2s;
        }

        .section-products .single-product .part-1 ul li a:hover {
            color: #fe302f;
        }

        .section-products .single-product .part-2 .product-title {
            font-size: 1rem;
        }

        .section-products .single-product .part-2 h4 {
            display: inline-block;
            font-size: 1rem;
        }

        .section-products .single-product .part-2 .product-old-price {
            position: relative;
            padding: 0 7px;
            margin-right: 2px;
            opacity: 0.6;
        }

        .section-products .single-product .part-2 .product-old-price::after {
            position: absolute;
            content: "";
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #444444;
            transform: translateY(-50%);
        }

        .cartDiv {
            width: 50px;
            position: fixed;
            right: 0;
            top: 100px;
            height: 50px;
            border-radius: 50%;
            background-color: #7cb9e8;

        }

        #cart {
            margin-top: 10px;
            margin-left: 5px;
            font-size: 2rem;
        }

        .spanDiv {
            position: relative;
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            margin-top: -50px;
            margin-left: 0px;

        }

        .numberOrder {
            position: absolute;
            color: white;
            right: 6px;

        }

        @media only screen and (max-width: 1800px) {
            .filter {
                display: none;
            }

            .cartDiv {
                top: 200px;
            }
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
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="color:white; padding-right:20px; padding-left: 20px; letter-spacing: 2px;">
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
                    <?php if (!empty($_SESSION['userid'])) { ?>
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
                    <?php } ?>

                    <?php if (!empty($_SESSION['userid'])) { ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="PhpSheets/logout.php" style="color:white">Log out <i class="fas fa-door-open"></i></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="login.php" style="color:white">Log In <i class="fas fa-door-open"></i></a>
                        </li>
                    <?php } ?>
            </ul>
            </div>
        </nav>
        <div class="cartDiv" style="<?php if (empty($_SESSION['userid'])) { ?>pointer-events: none;background-color:grey<?php } ?>">
            <a href="myCart.php" style="color:white"><i class="fas fa-shopping-cart" id="cart"></i></a>
            <div class="spanDiv">
                <span class="numberOrder" id="itemsNum"><?php echo $num; ?></span>

            </div>

        </div>
        <?php if (!empty($_SESSION['userid'])) { ?>
            <div class="container shadow min-vh-30 py-4">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="Search Marque.." id="search" onkeyup="search();">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <section class="section-products">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                    </div>
                </div>
                <div class="row" id="here"></div>
            </div>
        </section>
        <?php if (!empty($_SESSION['userid'])) { ?>
            <div class="filter" style="position:absolute;width:400px;right:79%;margin:0 !important;padding:0 !important">
                <div class="container">
                    <div class="py-3">
                        <h5 class="font-weight-bold">Categories</h5>
                        <ul class="list-group">
                            <a href="productWomen.php?type=T-Shirts">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> T-shirts <span class="badge badge-primary badge-pill"><?php echo $numT; ?></span> </li>
                            </a>
                            <a href="productWomen.php?type=Jeans">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Jeans <span class="badge badge-primary badge-pill"><?php echo $numJ; ?></span> </li>
                            </a>
                            <a href="productWomen.php?type=Hoodies">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Hoodies <span class="badge badge-primary badge-pill"><?php echo $numH; ?></span> </li>
                            </a>
                            <a href="productWomen.php?type=Snicker">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Snickers <span class="badge badge-primary badge-pill"><?php echo $numS; ?></span> </li>
                            </a>
                            <a href="productWomen.php?type=Jacket">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Jackets <span class="badge badge-primary badge-pill"><?php echo $numJA; ?></span> </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (!empty($_SESSION['userid'])) { ?>
            <div class="filter" style="position:absolute;width:400px;right:79%;margin:0 !important;padding:0 !important;top:65%">
                <div class="container">
                    <div class="py-3">
                        <h5 class="font-weight-bold">Prices</h5>
                        <ul class="list-group">
                            <a href="javascript:void(0)" onclick="filterPrice(100,200);">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Between 100->200 </li>
                            </a>
                            <a href="javascript:void(0)" onclick="filterPrice(200,300);">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Between 200->300 </li>
                            </a>
                            <a href="javascript:void(0)" onclick="filterPrice(300,400);">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Between 300->400 </span> </li>
                            </a>
                            <a href="javascript:void(0)" onclick="filterPrice(500,600);">
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> Between 500->600 </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!--Start displaying profucts-->
        <section class="section-products" id="filterId" style="display: none;">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header" id="headId" style="display: none;">
                            <h2>Filtered by Price</h2>
                        </div>
                    </div>
                </div>
                <div class="row" id="here2"></div>
            </div>
        </section>
        <section class="section-products">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header">
                            <h2>Popular Products</h2>
                            <?php if (empty($_SESSION['userid'])) { ?>
                                <div class="alert alert-warning">
                                    <strong>Warning!</strong> Since you are not signed up you CANNOT order, search, filter...
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if (isset($_GET['type'])) {
                        $type = $_GET['type'];
                        $sql = "SELECT * FROM product_women WHERE titre = '$type'";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if (!empty($_SESSION['userid'])) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($line = mysqli_fetch_assoc($result)) {
                                    echo '					
                <div class="col-md-6 col-lg-4 col-xl-3">
                <div id="product-1" class="single-product">
                        <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
		transition: all 0.3s;">
                                <ul style="display:flex;align-items:center;justify-content:center">
                                        <li><a href="javascript:void(0)" class="a" onclick="addToCart(' . $line['idPro'] . ')"><i class="fas fa-shopping-cart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="a" onclick="addFavoris(' . $line['idPro'] . ');"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="a"><i class="fas fa-expand"></i></a></li>
                                </ul>
                        </div>
                        <div class="part-2">
                                <h3 class="product-title">' . $line['titre'] . '</h3><i class="fas fa-heart" id="heart' . $line['idPro'] . '" style="margin-left:10px;display:none;color:red"></i>
                                <h3 class="product-title">' . $line['marque'] . '</h3>
                                <h4 class="product-old-price">800DH</h4>
                                <h4 class="product-price">' . $line['prix'] . 'DH</h4><br/>
                                <h4 class="product-price"><a href="productdescriptionwmn.php?idWmn=' . $line['idPro'] . '"style="color:#f77f00">See More!</a></h4>
                        </div>
                </div>
        </div>
        ';
                                }
                            }
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                                while ($line = mysqli_fetch_assoc($result)) {
                                    echo '					
                <div class="col-md-6 col-lg-4 col-xl-3">
                <div id="product-1" class="single-product">
                        <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
		transition: all 0.3s;">
                                
                        </div>
                        <div class="part-2">
                                <h3 class="product-title">' . $line['titre'] . '</h3><i class="fas fa-heart" id="heart' . $line['idPro'] . '" style="margin-left:10px;display:none;color:red"></i>
                                <h3 class="product-title">' . $line['marque'] . '</h3>
                                <h4 class="product-old-price">800DH</h4>
                                <h4 class="product-price">' . $line['prix'] . 'DH</h4><br/>
                                <h4 class="product-price"><a href="productdescriptionwmn.php?idWmn=' . $line['idPro'] . '"style="color:#f77f00">See More!</a></h4>
                        </div>
                </div>
        </div>
        ';
                                }
                            }
                        }
                    } else {
                        $sql = "SELECT * FROM product_women";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if (!empty($_SESSION['userid'])) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($line = mysqli_fetch_assoc($result)) {
                                    echo '					
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div id="product-1" class="single-product">
                                            <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
                            transition: all 0.3s;">
                                                    <ul style="display:flex;align-items:center;justify-content:center">
                                                            <li><a href="javascript:void(0)" class="a" onclick="addToCart(' . $line['idPro'] . ')"><i class="fas fa-shopping-cart"></i></a></li>
                                                            <li><a href="javascript:void(0)" class="a" onclick="addFavoris(' . $line['idPro'] . ');"><i class="fas fa-heart"></i></a></li>
                                                            <li><a href="javascript:void(0)" class="a"><i class="fas fa-expand"></i></a></li>
                                                    </ul>
                                            </div>
                                            <div class="part-2">
                                                    <h3 class="product-title">' . $line['titre'] . '</h3><i class="fas fa-heart" id="heart' . $line['idPro'] . '" style="margin-left:10px;display:none;color:red"></i>
                                                    <h3 class="product-title">' . $line['marque'] . '</h3>
                                                    <h4 class="product-old-price">800DH</h4>
                                                    <h4 class="product-price">' . $line['prix'] . 'DH</h4><br/>
                                                    <h4 class="product-price"><a href="productdescriptionwmn.php?idWmn=' . $line['idPro'] . '"style="color:#f77f00">See More!</a></h4>
                                            </div>
                                    </div>
                            </div>
                            ';
                                }
                            }
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                                while ($line = mysqli_fetch_assoc($result)) {
                                    echo '					
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div id="product-1" class="single-product">
                                            <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
                            transition: all 0.3s;">
                                                   
                                            </div>
                                            <div class="part-2">
                                                    <h3 class="product-title">' . $line['titre'] . '</h3><i class="fas fa-heart" id="heart' . $line['idPro'] . '" style="margin-left:10px;display:none;color:red"></i>
                                                    <h3 class="product-title">' . $line['marque'] . '</h3>
                                                    <h4 class="product-old-price">800DH</h4>
                                                    <h4 class="product-price">' . $line['prix'] . 'DH</h4><br/>
                                                    <h4 class="product-price"><a href="productdescriptionwmn.php?idWmn=' . $line['idPro'] . '"style="color:#f77f00">See More!</a></h4>
                                            </div>
                                    </div>
                            </div>
                            ';
                                }
                            }
                        }
                    }
                    ?></div>

            </div>
        </section>
        <div id="succCart" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Item Added Successfully!
            </div>
        </div>

        <div id="errorCart" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error</strong> Error!
            </div>
        </div>

        <div id="warningCart" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning</strong> This item is already in Your Cart!
            </div>
        </div>

        <div id="succFav" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Thank you for sharing love!
            </div>
        </div>

        <div id="succFav2" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Product Removed From your Favorite List!
            </div>
        </div>

        <div id="errorFav" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error</strong> Error!
            </div>
        </div>


    </body>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        function search() {
            var searchText = $('#search').val();
            var titre = '<?php echo $titre; ?>';
            if (searchText != '') {
                $.post("searchProductWmn.php", {
                        searchText: searchText,
                        titre: titre
                    },
                    function(result, success) {
                        $('#here').html(result);
                    });

            } else {
                $('#here').empty();
            }

        }

        function addFavoris(idPro) {
            var idPro = idPro;
            var userId = <?php echo $_SESSION['userid'] ?>;
            $.post("addFavorisWmn.php", {
                    idPro: idPro,
                    userId: userId
                },
                function(result, success) {
                    if (result == 1) {
                        // alert("Product Added successfully");
                        $('#succFav').css('display', 'block');
                        $('$heart' + idPro).css('display', 'inline');
                    } else if (result == 2) {
                        alert("error");
                        $('#errorFav').css('display', 'block');
                    } else if (result == 3) {
                        // alert("Product Removed successfully");
                        $('#succFav2').css('display', 'block');
                        $('$heart' + idPro).css('display', 'none');
                    }
                })
        }

        function addToCart(idPro) {
            var idPro = idPro;
            var userId = <?php echo $_SESSION['userid']; ?>;
            var span = $('#itemsNum').text();
            var number = parseInt(span);
            $.post("addToCartWomen.php", {
                    idPro: idPro,
                    userId: userId
                },
                function(result, success) {
                    if (result == 0) {
                        // alert("product Already exists in Your cart!");
                        $('#warningCart').css('display', 'block');

                    } else if (result == 1) {
                        // alert("product Added to Your cart!");
                        $('#succCart').css('display', 'block');
                        var span = $('#itemsNum').html();
                        var number = parseInt(span);
                        number++;
                        $('#itemsNum').html(number);
                    } else if (result == 2) {
                        // alert('error');
                        $('#errorCart').css('display', 'block');
                    }
                })
        }

        function filterPrice(a, b) {
            var price1 = a;
            var price2 = b;
            var titre = "<?php echo $titre ?>";
            $.post("filterPriceWmn.php", {
                    price1: price1,
                    price2: price2,
                    titre: titre
                },
                function(result, success) {
                    $('#filterId').css('display', 'block');
                    $('#headId').css('display', 'block');
                    $('#here2').html(result);
                })
        }
    </script>

    </html>
<?php } ?>