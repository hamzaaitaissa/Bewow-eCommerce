<?php
session_start();
if(empty($_SESSION['userid'])){
    header('location:login.php');
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
        <title>Document</title>
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
        .ms-n5 {
    margin-left: -40px;
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
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" href="myAccount.php" ><i class="fas fa-user"></i> My account</a>
                        <a class="dropdown-item" href="favoritePage.php"><i class="fas fa-heart"></i> Favorites</a>
                        <a class="dropdown-item" href="myOrders.php"><i class="fas fa-cash-register"></i> Orders</a>
                    </div>
                    </div>
         
                    <li class="nav-item ">
                        <a class="nav-link " href="PhpSheets/logout.php" style="color:white">Log out</a>
                    </li>
            </ul>
            </div>
        </nav>
        <div class="container shadow min-vh-30 py-4">
            <div class="row">
            <div class="col-md-5 mx-auto">
            <div class="input-group">
                <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="Search Marque..." id="search" onkeyup="search();">
                
            </div>
            
        </div>
            </div>
        </div>
        <section class="section-products">
            <div class="container">
                
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                    </div>
                </div>
        <div class="row" id="here"></div>
        </div>
        </section>
        <section class="section-products">
            <div class="container">
                
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header">
                            <h2>Favorite Products(Men)</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $userId=$_SESSION['userid'];
                    $sql="SELECT product_men.* 
                    from product_men,favoris_men 
                    where product_men.idPro=favoris_men.idPro
                    and userId=$userId";
                    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if(mysqli_num_rows($result)>0){
                        while($line=mysqli_fetch_assoc($result)){
                            echo'
                            <div class="col-md-6 col-lg-4 col-xl-3" id="product'.$line['idPro'].'">
                            <div id="product-1" class="single-product">
                                    <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
                    transition: all 0.3s;">
                                            <ul style="display:flex;align-items:center;justify-content:center">
                                                    <li><a href="javascript:void(0)" class="a"><i class="fas fa-shopping-cart"></i></a></li>
                                                   
                                            </ul>
                                    </div>
                                    <div class="part-2">
                                    <input type="hidden" value="'.$line['idPro'].'"
                                            <h3 class="product-title">' . $line['titre'] . '</h3><i class="fas fa-heart" id="heart'.$line['idPro'].'" style="margin-left:10px;color:red"></i>
                                            <h3 class="product-title">' . $line['marque'] . '</h3>
                                            <h4 class="product-old-price">800DH</h4>
                                            <h4 class="product-price">' . $line['prix'] . 'DH</h4><br>
                                            <h4 class="product-price"><a href="productdescription.php?idMen='.$line['idPro'].'"style="color:#f77f00">See More!</a></h4><br/>
                                            <h4 class="product-price" style="color:red"><a href="javascript:void(0)" onclick="removefavorisMen('.$line['idPro'].');">Remove</a></h4>
                                    </div>
                            </div>
                    </div>
                            
                            ';
                        }
                    }else{
                        echo'<h3>You dont have any favorite products in men section</h3>';
                    }
                    
                    ?>
                </div>
        </section>
        <section class="section-products">
            <div class="container">
                
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header">
                            <h2>Favorite Products(Women)</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $userId=$_SESSION['userid'];
                    $sql2="SELECT product_women.* 
                    from product_women,favoris_women 
                    where product_women.idPro=favoris_women.idPro
                    and userId=$userId";
                    $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                    if(mysqli_num_rows($result2)>0){
                        while($line=mysqli_fetch_assoc($result2)){
                            echo '
                            <div class="col-md-6 col-lg-4 col-xl-3" id="productW'.$line['idPro'].'">
                            <div id="product-1" class="single-product">
                                    <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
                    transition: all 0.3s;">
                                            <ul style="display:flex;align-items:center;justify-content:center">
                                                    <li><a href="javascript:void(0)" class="a"><i class="fas fa-shopping-cart"></i></a></li>
                                                   
                                            </ul>
                                    </div>
                                    <div class="part-2">
                                    <input type="hidden" value="'.$line['idPro'].'"
                                            <h3 class="product-title">' . $line['titre'] . '</h3><i class="fas fa-heart" id="heart'.$line['idPro'].'" style="margin-left:10px;color:red"></i>
                                            <h3 class="product-title">' . $line['marque'] . '</h3>
                                            <h4 class="product-old-price">800DH</h4>
                                            <h4 class="product-price">' . $line['prix'] . 'DH</h4><br>
                                            <h4 class="product-price"><a href="productdescription.php?idMen='.$line['idPro'].'"style="color:#f77f00">See More!</a></h4><br/>
                                            <h4 class="product-price" style="color:red"><a href="javascript:void(0)" onclick="removefavorisWomen('.$line['idPro'].');">Remove</a></h4>
                                    </div>
                            </div>
                    </div>
                            
                            
                            ';
                        }
                    }else{
                        echo'<h3>You dont have any favorite products in women section</h3>';
                    }
                    ?>
                </div>
        </section>
        <div id="succ" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
    <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Item removed from Your List!
  </div>
    </div>
    <div id="error" style="position: absolute;bottom:0;left:25%;right:25%;display:none">
    <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error</strong> Sorry an error interupting your action :(
  </div>
    </div>

    </body>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        function removefavorisMen(idPro){
            var idPro=idPro;
            var userId=<?php echo $_SESSION['userid'];?>;
            $.post("removeFavorisFromFavorisPage.php",{idPro:idPro,userId:userId},
            function(result,success){
                if(result==1){
                    $('#product'+idPro).remove();
                    $('#succ').css('display','block');
                }else{
                    $('#error').css('display','block');
                    // alert('error');
                }
            });
        }
        function search(){
            var searchText=$('#search').val();
            if(searchText!=''){
                $.post("searchFavorisProduct.php",{searchText:searchText},
                function(result,success){
                    $('#here').html(result);
                });
            }else{
                $('#here').empty();
            }
            
        }
        function removefavorisWomen(idPro){
            var idPro=idPro;
            var userId=<?php echo $_SESSION['userid'];?>;
            $.post("removeFavorisFromFavorisPageWomen.php",{idPro:idPro,userId:userId},
            function(result,success){
                if(result==1){
                    $('#productW'+idPro).remove();
                    $('#succ').css('display','block');
                }else{
                    $('#error').css('display','block');
                    // alert('error');
                }
            })
        }
    </script>

    </html>
<?php
}
?>