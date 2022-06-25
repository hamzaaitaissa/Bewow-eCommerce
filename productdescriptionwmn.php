<?php
session_start();
if (empty($_SESSION['userid'])) {
    header('location:login.php');
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bewow';
try {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $exception) {
    exit('Failed to connect to database');
}
if(isset($_POST['save'])){
    $userId=$_SESSION['userid'];
                $ratedIndex=$_POST['ratedIndex'];
                $idPro=$_POST['idPro']; 
                $ratedIndex++;
                $sql2="SELECT * from reviewwmn where userId=? and idPro=?";
                $stmt2=$pdo->prepare($sql2);
                $stmt2->execute([$userId,$idPro]);
                $nbre=$stmt2->rowCount();
                if($nbre==0){
                    $sql3="INSERT INTO reviewwmn(idPro,userId,rateIndex) values(?,?,?)";
                    $stmt3=$pdo->prepare($sql3);
                    $stmt3->execute([$idPro,$userId,$ratedIndex]);

                }else{
                     $sql="UPDATE reviewwmn set rateIndex=? where idPro=?";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([$ratedIndex,$idPro]);
                }
               
        
           
            exit(json_encode(array('id'=>$idPro)));
            

}
$idPro=$_GET['idWmn'];
$sql4="SELECT id from reviewwmn where idPro=?";
$stmt4=$pdo->prepare($sql4);
$stmt4->execute([$idPro]);
$nbrID=$stmt4->rowCount();
$sql5="SELECT sum(rateIndex) as 'total'from reviewwmn where idPro=?";
$stmt5=$pdo->prepare($sql5);
$stmt5->execute([$idPro]);
$line5=$stmt5->fetch(PDO::FETCH_ASSOC);
$totale=$line5['total'];
if($nbrID!=0){
    $avg=$totale/$nbrID;
}else{
    $avg=0;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product description</title>
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
    body{
        font-family: 'Poppins',sans-serif;
    }
    li {
        letter-spacing: 2px;
        padding-right: 20px;
        padding-left: 20px;
    }

    .navbar-nav {
        margin-left: auto;
    }

    .thumbnail {
        width: auto;
        height: 40vh;
        z-index: 999;
        cursor: pointer;
        -webkit-transition-property: all;
        -webkit-transition-duration: 0.3s;
        -webkit-transition-timing-function: ease;
    }

    .thumbnail:hover {
        transform: scale(2.5);
        margin-top: 350px;
    }

    #animatedObjects {
        animation: jiggle 1s ease-in-out infinite alternate;
        transform-origin: center;
        transform-box: fill-box;
    }

    @keyframes jiggle {
        from {
            transform: translateY(10%);
        }

        to {
            transform: translateY(110%);
        }
    }

    @media (min-width: 0) {
        .g-mr-15 {
            margin-right: 1.07143rem !important;
        }
    }

    @media (min-width: 0) {
        .g-mt-3 {
            margin-top: 0.21429rem !important;
        }
    }

    .g-height-50 {
        height: 50px;
    }

    .g-width-50 {
        width: 50px !important;
    }

    @media (min-width: 0) {
        .g-pa-30 {
            padding: 2.14286rem !important;
        }
    }

    .g-bg-secondary {
        background-color: #fafafa !important;
    }

    .u-shadow-v18 {
        box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
    }

    .g-color-gray-dark-v4 {
        color: #777 !important;
    }

    .g-font-size-12 {
        font-size: 0.85714rem !important;
    }

    .media-comment {
        margin-top: 20px
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
                        <a class="dropdown-item" href="men.php" ><i class="fas fa-user"></i> My account</a>
                        <a class="dropdown-item" href="favoritePage.php"><i class="fas fa-heart"></i> Favorites</a>
                        <a class="dropdown-item" href="myOrders.php"><i class="fas fa-cash-register"></i> Orders</a>
                    </div>
                    </div>
                <li class="nav-item ">
                    <a class="nav-link " href="PhpSheets/logout.php" style="color:white">Log out <i class="fas fa-door-open"></i></a>
                </li>
        </ul>
        </div>
    </nav>
    <div class="container" style="height: 100vh;display:flex;align-items:center;justify-content:center">
        <h2>See more information about the product you selected down below</h2>
        <svg width="665" height="534" viewBox="0 0 465 334" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="undraw_web_shopping_re_owap 1" clip-path="url(#clip0_2_2)">
                <path id="Rectangle 338" d="M341.163 0.193054H0.145447V218.586H341.163V0.193054Z" fill="#E6E6E6" />
                <path id="Rectangle 339" d="M331.412 27.5849H9.89691V205.666H331.412V27.5849Z" fill="white" />
                <path id="Rectangle 340" d="M341.018 0H0V14.4869H341.018V0Z" fill="#6C63FF" />
                <path id="Ellipse 513" d="M10.7665 10.0922C12.2496 10.0922 13.4519 8.88993 13.4519 7.40689C13.4519 5.92385 12.2496 4.7216 10.7665 4.7216C9.28337 4.7216 8.08107 5.92385 8.08107 7.40689C8.08107 8.88993 9.28337 10.0922 10.7665 10.0922Z" fill="white" />
                <path id="Ellipse 514" d="M20.9585 10.0922C22.4416 10.0922 23.6439 8.88993 23.6439 7.40689C23.6439 5.92385 22.4416 4.7216 20.9585 4.7216C19.4754 4.7216 18.2731 5.92385 18.2731 7.40689C18.2731 8.88993 19.4754 10.0922 20.9585 10.0922Z" fill="white" />
                <path id="Ellipse 515" d="M31.1506 10.0922C32.6337 10.0922 33.836 8.88993 33.836 7.40689C33.836 5.92385 32.6337 4.7216 31.1506 4.7216C29.6675 4.7216 28.4652 5.92385 28.4652 7.40689C28.4652 8.88993 29.6675 10.0922 31.1506 10.0922Z" fill="white" />
                <path id="Rectangle 341" d="M112.339 42.2326H49.4554V110.453H112.339V42.2326Z" fill="#E6E6E6" />
                <path id="Rectangle 342" d="M202.095 42.2326H139.212V110.453H202.095V42.2326Z" fill="#E6E6E6" />
                <path id="Rectangle 343" d="M291.852 42.2326H228.968V110.453H291.852V42.2326Z" fill="#E6E6E6" />
                <path id="Rectangle 344" d="M112.339 122.801H49.4554V191.021H112.339V122.801Z" fill="#E6E6E6" />
                <path id="Rectangle 345" d="M202.095 122.801H139.212V191.021H202.095V122.801Z" fill="#E6E6E6" />
                <path id="Rectangle 346" d="M291.852 122.801H228.968V191.021H291.852V122.801Z" fill="#E6E6E6" />
                <path id="Path 2643" d="M154.411 140.334L165.9 135.791L167.237 158.502C167.237 158.502 169.641 165.449 168.84 168.121C168.84 168.121 169.374 172.663 168.038 172.931C166.702 173.198 162.96 173.732 162.696 173.465C162.431 173.197 162.429 172.396 162.429 172.396C162.429 172.396 159.756 174.266 159.489 176.403C159.489 176.403 148.267 179.877 148 176.67C147.733 173.464 153.611 170.792 153.611 170.792L158.153 163.845L154.411 140.334Z" fill="white" />
                <path id="Path 2644" d="M178.727 140.334L190.215 135.791L191.551 158.502C191.551 158.502 193.956 165.449 193.154 168.121C193.154 168.121 193.689 172.663 192.353 172.931C191.016 173.198 187.275 173.732 187.01 173.465C186.746 173.197 186.743 172.396 186.743 172.396C186.743 172.396 184.071 174.266 183.804 176.403C183.804 176.403 172.581 179.877 172.314 176.67C172.047 173.464 177.925 170.792 177.925 170.792L182.468 163.845L178.727 140.334Z" fill="white" />
                <path id="Path 2645" d="M179.85 52.6321C179.85 52.6321 177.403 59.4677 180.238 62.5502L177.875 70.6706C177.875 70.6706 186.271 95.8585 183.872 99.3768C183.872 99.3768 174.916 103.855 157.002 97.7774L164.279 69.5509L163.239 57.6366L164.679 52.0392L167.877 51.7218C167.877 51.7218 165.958 58.9182 169.477 60.0379C172.995 61.1576 176.427 51.9016 176.427 51.9016L179.85 52.6321Z" fill="#3F3D56" />
                <path id="Path 2646" d="M66.8685 96.7577L69.9559 98.0207L84.691 78.6556L89.3218 101.388L92.4092 100.827C94.3895 81.2283 96.0059 61.238 94.023 51.7832L82.5858 51.2918L77.3938 67.8526L74.8676 79.0788L66.8685 96.7577Z" fill="white" />
                <path id="Path 2647" d="M254.247 51.6282C254.247 51.6282 250.034 57.4854 250.24 59.8491C250.445 62.2128 253.117 100.748 253.117 100.748L259.386 101.057L257.535 73.311L259.076 65.8094L262.879 100.748L270.586 100.954L263.701 55.6363L262.365 51.6287L254.247 51.6282Z" fill="white" />
                <path id="Path 2648" d="M278.061 145.989C276.942 144.647 275.019 143.921 273.173 143.529C273.226 143.361 267.557 142.19 267.46 142.431L265.323 140.728L258.755 144.138L255.065 141.626L253.35 142.234C253.42 141.932 248.029 142.866 248.029 142.866C246.999 142.903 245.683 142.967 244.211 143.08C239.054 143.477 238.657 156.832 238.657 156.832C241.03 155.861 243.559 155.332 246.122 155.269L247.516 171.242C254.684 170.628 262.203 171.343 269.995 173.093L273.65 160.537L282.16 157.228C282.16 157.228 280.706 149.162 278.061 145.989Z" fill="#3F3D56" />
                <path id="Path 2649" d="M95.4416 138.383C94.5196 137.277 92.9355 136.679 91.4137 136.356C91.4592 136.217 86.7861 135.252 86.7062 135.451L84.9449 134.049L79.5344 136.858L76.4935 134.789L75.0813 135.29C75.1389 135.041 70.6964 135.81 70.6964 135.81C69.8501 135.841 68.7637 135.893 67.5508 135.987C63.3019 136.314 62.975 147.317 62.975 147.317C64.93 146.517 67.0144 146.081 69.126 146.029L70.2743 178.247C76.1809 177.74 82.3758 178.33 88.795 179.773L91.8057 150.37L98.8178 147.644C98.8178 147.644 97.6203 140.999 95.4416 138.383Z" fill="white" />
                <path id="Path 2682" d="M396.41 146.959H426.56V130.827C426.56 126.829 424.971 122.995 422.144 120.168C419.317 117.341 415.483 115.753 411.485 115.753C407.487 115.753 403.653 117.341 400.826 120.168C397.999 122.995 396.41 126.829 396.41 130.827V146.959Z" fill="#2F2E41" />
                <path id="Path 2683" d="M382.952 326.442H376.467L373.382 301.429H382.953L382.952 326.442Z" fill="#FFB6B6" />
                <path id="Path 2684" d="M384.606 324.325H371.834C369.676 324.325 367.606 325.182 366.08 326.708C364.554 328.234 363.697 330.304 363.696 332.462V332.727H384.606V324.325Z" fill="#2F2E41" />
                <path id="Path 2685" d="M460.469 317.789L454.822 320.976L439.839 300.713L448.173 296.008L460.469 317.789Z" fill="#FFB6B6" />
                <path id="Path 2686" d="M460.868 315.132L449.748 321.408C447.868 322.469 446.487 324.233 445.908 326.313C445.33 328.392 445.601 330.616 446.662 332.495L446.792 332.726L465 322.447L460.868 315.132Z" fill="#2F2E41" />
                <path id="Path 2687" d="M419.025 213.958L419.525 216.459C419.525 216.459 421.026 217.961 420.276 218.711C419.525 219.462 419.776 222.965 419.776 222.965C420.195 229.352 428.542 265.244 430.034 272.253C430.034 272.253 441.544 279.759 450.551 294.521C459.558 309.282 459.807 313.035 459.807 313.035L449.801 317.289L424.782 287.015C424.782 287.015 417.777 282.762 415.274 279.009C412.772 275.257 397.257 236.475 397.257 236.475L388.497 277.007C388.497 277.007 388.998 291.769 386.746 301.276C385.362 307.276 384.524 313.39 384.244 319.541L372.484 318.29C372.484 318.29 373.235 282.762 374.486 279.009C374.486 279.009 369.232 235.725 379.74 218.461L388.21 195.883L396.504 192.691L419.025 213.958Z" fill="#2F2E41" />
                <path id="Path 2688" d="M411.641 119.697C395.853 119.966 395.856 143.448 411.641 143.716C427.427 143.446 427.424 119.964 411.641 119.697Z" fill="#FFB8B8" />
                <path id="Path 2689" d="M399.49 131.083H402.174L402.904 129.256L402.539 131.083H417.214L416.738 127.261L420.305 131.083H423.863V129.012C423.864 127.412 423.55 125.827 422.939 124.348C422.328 122.869 421.431 121.525 420.3 120.393C419.169 119.261 417.827 118.362 416.349 117.749C414.871 117.136 413.286 116.819 411.686 116.818C410.086 116.817 408.501 117.131 407.022 117.742C405.543 118.354 404.199 119.25 403.067 120.381C401.935 121.512 401.036 122.854 400.423 124.332C399.809 125.81 399.493 127.394 399.492 128.995V129.012L399.49 131.083Z" fill="#2F2E41" />
                <path id="Path 2690" d="M395.361 150.728L425.193 150.97L418.89 214.924C418.89 214.924 384.002 213.083 383.98 202.434L387.249 192.972L395.361 150.728Z" fill="#3F3D56" />
                <path id="Vector_2" d="M207.414 263.789L208.279 304.905L234.898 318.972L283.374 310.316L284.564 267.576L253.834 256.756L207.414 263.789Z" fill="white" />
                <path id="Vector_3" d="M234.829 319.416L207.86 305.164L206.981 263.425L253.875 256.32L253.975 256.355L284.998 267.278L283.789 310.673L234.829 319.416ZM208.699 304.646L234.967 318.527L282.959 309.958L284.131 267.874L253.793 257.192L207.847 264.153L208.699 304.646Z" fill="#CACACA" />
                <path id="Vector_4" d="M234.304 274.937L234.2 274.896L207.257 264.184L207.57 263.394L234.41 274.064L284.506 267.155L284.623 267.997L234.304 274.937Z" fill="#CACACA" />
                <path id="Vector_5" d="M234.782 274.496L233.932 274.506L234.473 318.977L235.323 318.966L234.782 274.496Z" fill="#CACACA" />
                <path id="Vector_6" d="M228.546 271.841L221.187 268.872L267.942 261.422L275.301 264.391L228.546 271.841Z" fill="#CACACA" />
                <path id="Vector_7" d="M207.582 275.716L207.246 276.497L218.51 281.347L218.846 280.566L207.582 275.716Z" fill="#CACACA" />
                <path id="Vector_8" d="M212.683 289.743L212.346 290.524L223.611 295.374L223.947 294.593L212.683 289.743Z" fill="#6C63FF" />
                <path id="Vector_9" d="M253.658 269.426L254.663 317.156L285.563 333.485L341.835 323.436L343.217 273.823L307.544 261.262L253.658 269.426Z" fill="#6C63FF" />
                <path id="Vector_10" d="M285.482 334L254.175 317.456L253.155 269.004L307.592 260.756L307.708 260.797L343.72 273.477L342.317 323.851L285.482 334ZM255.149 316.855L285.643 332.969L341.353 323.021L342.714 274.169L307.496 261.768L254.16 269.849L255.149 316.855Z" fill="#3F3D56" />
                <path id="Vector_11" d="M284.873 282.368L284.752 282.32L253.475 269.885L253.84 268.968L284.995 281.354L343.149 273.334L343.284 274.311L284.873 282.368Z" fill="#3F3D56" />
                <path id="Vector_12" d="M285.428 281.855L284.441 281.867L285.069 333.49L286.056 333.478L285.428 281.855Z" fill="#3F3D56" />
                <path id="Vector_13" d="M278.69 278.796L269.646 275.327L323.921 266.679L332.965 270.148L278.69 278.796Z" fill="#3F3D56" />
                <path id="Vector_14" d="M253.853 283.272L253.462 284.179L266.539 289.808L266.929 288.902L253.853 283.272Z" fill="#3F3D56" />
                <path id="Vector_15" d="M259.774 299.555L259.384 300.461L272.46 306.091L272.85 305.185L259.774 299.555Z" fill="white" />
                <path id="Path 2693" d="M426.475 221.107C426.016 220.545 425.687 219.89 425.509 219.187C425.331 218.484 425.309 217.751 425.445 217.039C425.582 216.326 425.872 215.653 426.297 215.065C426.721 214.477 427.27 213.99 427.903 213.637L426.607 202.378L433.257 199.921L434.864 215.848C435.383 216.951 435.48 218.205 435.137 219.375C434.794 220.545 434.034 221.548 433.001 222.195C431.968 222.843 430.734 223.09 429.531 222.889C428.329 222.688 427.242 222.054 426.475 221.107Z" fill="#FFB6B6" />
                <path id="Path 2694" d="M421.27 156.479L425.195 150.993C425.195 150.993 427.882 150.397 431.056 154.099C434.229 157.802 436.08 204.081 436.08 204.081L424.444 206.726L417.568 173.933L421.27 156.479Z" fill="#3F3D56" />
                <g id="animatedObjects">
                    <path id="Vector" d="M382.93 262.293L355.961 248.042L355.083 206.302L401.977 199.197L402.077 199.232L433.1 210.156L431.891 253.55L382.93 262.293ZM356.801 247.524L383.069 261.405L431.061 252.835L432.233 210.752L401.895 200.069L355.948 207.031L356.801 247.524Z" fill="#CACACA" />

                    <path id="Vector_16" d="M355.516 206.667L356.381 247.783L383 261.849L431.476 253.193L432.666 210.454L401.936 199.633L355.516 206.667Z" fill="white" />
                    <path id="Vector_17" d="M382.406 217.815L382.302 217.773L355.359 207.061L355.672 206.272L382.512 216.942L432.608 210.033L432.724 210.875L382.406 217.815Z" fill="#CACACA" />
                    <path id="Vector_18" d="M382.884 217.373L382.034 217.383L382.575 261.854L383.425 261.844L382.884 217.373Z" fill="#CACACA" />
                    <path id="Vector_19" d="M379.001 215.686L369.289 211.749L416.044 204.299L425.756 208.236L379.001 215.686Z" fill="#CACACA" />
                    <path id="Vector_20" d="M355.684 218.594L355.347 219.375L366.612 224.224L366.948 223.444L355.684 218.594Z" fill="#CACACA" />
                    <path id="Vector_21" d="M360.784 232.621L360.448 233.401L371.713 238.251L372.049 237.47L360.784 232.621Z" fill="#6C63FF" />
                </g>
                <path id="Path 2691" d="M370.608 213.465C371.264 213.157 371.845 212.709 372.309 212.152C372.774 211.596 373.11 210.944 373.295 210.243C373.481 209.542 373.51 208.809 373.381 208.096C373.253 207.382 372.969 206.705 372.551 206.113L378.592 196.524L373.66 191.432L365.318 205.093C364.371 205.862 363.738 206.952 363.54 208.157C363.342 209.361 363.593 210.596 364.245 211.628C364.897 212.66 365.905 213.417 367.077 213.756C368.25 214.094 369.506 213.991 370.608 213.466V213.465Z" fill="#FFB6B6" />
                <path id="Path 2692" d="M399.945 153.249L395.617 150.397C395.617 150.397 392.277 151.146 388.724 157.978C385.172 164.811 370.846 195.357 370.846 195.357L376.735 201.334L392.444 177.37L399.945 153.249Z" fill="#3F3D56" />
            </g>
            <defs>
                <clipPath id="clip0_2_2">
                    <rect width="465" height="334" fill="white" />
                </clipPath>
            </defs>
        </svg>


    </div>
    <?php
    if (isset($_GET['idWmn'])) {
        $idPro = $_GET['idWmn'];
        $sql = "SELECT * FROM product_women where idPro=:idPro";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['idPro' => $idPro]);
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '
            <div class = "shadow p-3 mb-5 bg-white rounded">
    <div class="container-fluid" style="color:white;height: 100vh;display:flex;align-items:center;justify-content:center;background-color:#F7CAC9;flex-direction:column">
    
    <img src="uploads/' . $data['image'] . '" alt="" class="thumbnail">

        <h4 >Brand</h4>
        <p>' . $data['marque'] . '</p><br>
        <h4 for="">Title</h4>
        <p>' . $data['titre'] . '</p><br>
        <h4 for="">Size</h4>
        <p>' . $data['taille'] . '</p><br>
        <h4 for="">Price</h4>
        <p>' . $data['prix'] . ' DH</p><br>
        <h4 for="">Description</h4>
        <p>' . $data['description'] . '</p>

    
        
    </div>
</div>
            
            ';
        }
    } 

    ?>
    <div class="container-fluid" style="position:relative;height:30vh;top:40px;">
    <form action="productdescription.php" method="POST">
    <h2>Rate this Product</h2>
    <div class="container">
    <div  class="shadow p-3 mb-5 bg-body rounded" style="display:flex;justify-content:center;align-items:center">
    <i class="fas fa-star" style="font-size: 2rem;padding:1rem" data-index="0"></i>
    <i class="fas fa-star" style="font-size: 2rem;padding:1rem" data-index="1"></i>
    <i class="fas fa-star" style="font-size: 2rem;padding:1rem" data-index="2"></i>
    <i class="fas fa-star" style="font-size: 2rem;padding:1rem" data-index="3"></i>
    <i class="fas fa-star" style="font-size: 2rem;padding:1rem" data-index="4"></i>
    <br></br><br> 
    <span style="font-size: 2rem;position:absolute;top:58%;left:40%">Average Rating This Product Is: <?php echo round($avg,precision:2);?></span>
</div> </div>
    </form>
    </div>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        var avg=0;
        var ratedIndex=-1;
        var idPro=<?php  if(isset($_GET['idWmn'])){
       echo $_GET['idWmn']; }else{echo 0;}?>;
      
    
        $(document).ready(function(){
            resetStarColors();
            <?php
            $idPro=$_GET['idWmn'];
            $userId=$_SESSION['userid'];
            $sql="SELECT rateIndex from reviewwmn where idPro=? and userId=?";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$idPro,$userId]);
            $line=$stmt->fetch(PDO::FETCH_ASSOC);
            
            ?>
            setStars(parseInt(<?php echo $line['rateIndex'] ?? 0;?>-1));


              
                
            $('.fa-star').on('click',function(){
                ratedIndex=parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex',ratedIndex);
                saveToTheDB();
            });
            $('.fa-star').mouseover(function(){
                resetStarColors();
                var currentIndex=parseInt($(this).data('index'));
                setStars(currentIndex);
            });
            $('.fa-star').mouseleave(function(){
                resetStarColors();
                if(ratedIndex!=-1){
                    setStars(ratedIndex);
                }
                

            });
            function saveToTheDB(){
                $.ajax({
                    url:"productdescriptionwmn.php",
                    method:"POST",
                    dataType:"json",
                    data:{
                        save:1,
                        idPro:idPro,
                        avg:avg,
                        ratedIndex: ratedIndex
                    }, success: function(r){
                        idPro=r.id;
                        localStorage.setItem('idPro',idPro);

                    }
                })
            }

            function setStars(max){
                for(var i=0;i<= max;i++){
                    $('.fa-star:eq('+i+')').css('color','gold');
                }
            }

            function resetStarColors(){
                $('.fa-star').css('color','black');
            }
        });
    </script>
    

</div>

    
</body>

</html>