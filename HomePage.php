<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {


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

    * {
      margin: 0;
      box-sizing: border-box;
      text-decoration: none;
      list-style-type: none;
      letter-spacing: 1.2px;
      -webkit-font-smoothing: antialiased;
    }

    li {
      letter-spacing: 2px;
      padding-right: 20px;
      padding-left: 20px;
    }

    body {
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
      overflow-y: scroll;
    }

    .navbar-nav {
      margin-left: auto;
    }

    .both {
      width: 100%;
      display: flex;
      flex-direction: row;
      height: 100vh;
      position: relative;
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
      font-family: 'Heebo', sans-serif;
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
      font-family: 'Heebo', sans-serif;
      font-size: 20px;
    }

    .btnGirl:hover {
      background-color: #DE9EBB;
    }

    .wrapper {
      position: absolute;
      top: 500px;
      left: 25%;
      transform: translate(-50%, -50%);
    }

    .link_wrapper {
      position: relative;
    }

    .a {
      display: block;
      width: 180px;
      height: 50px;
      line-height: 50px;
      font-weight: bold;
      text-decoration: none;
      background: #333;
      text-align: center;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 1px;
      border: 3px solid #333;
      transition: all .35s;
    }

    .icon {
      width: 50px;
      height: 50px;
      border: 3px solid transparent;
      position: absolute;
      transform: rotate(45deg);
      right: 0;
      top: 0;
      z-index: -1;
      transition: all .35s;
    }

    .icon svg {
      width: 30px;
      position: absolute;
      top: calc(50% - 15px);
      left: calc(50% - 15px);
      transform: rotate(-45deg);
      fill: #2ecc71;
      transition: all .35s;
    }

    .a:hover {
      width: 200px;
      border: 3px solid #2ecc71;
      background: transparent;
      color: #2ecc71;
    }

    .a:hover+.icon {
      border: 3px solid #2ecc71;
      right: -25%;
    }

    .wrapper2 {
      position: absolute;
      top: 500px;
      left: 75%;
      transform: translate(-50%, -50%);
    }

    .link_wrapper {
      position: relative;
    }

    .a {
      display: block;
      width: 180px;
      height: 50px;
      line-height: 50px;
      font-weight: bold;
      text-decoration: none;
      background: #333;
      text-align: center;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 1px;
      border: 3px solid #333;
      transition: all .35s;
    }

    .icon {
      width: 50px;
      height: 50px;
      border: 3px solid transparent;
      position: absolute;
      transform: rotate(45deg);
      right: 0;
      top: 0;
      z-index: -1;
      transition: all .35s;
    }

    .icon svg {
      width: 30px;
      position: absolute;
      top: calc(50% - 15px);
      left: calc(50% - 15px);
      transform: rotate(-45deg);
      fill: #2ecc71;
      transition: all .35s;
    }

    .a:hover {
      width: 200px;
      border: 3px solid #2ecc71;
      background: transparent;
      color: #2ecc71;
    }

    .a:hover+.icon {
      border: 3px solid #2ecc71;
      right: -25%;
    }

    svg {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%)
    }

    .welcome {
      position: absolute;
      top: 5%;
      left: 50%;
      transform: translate(-50%, -50%)
    }

    #right-hand {
      animation: jiggle 1s ease-in-out infinite alternate;
      transform-origin: center;
      transform-box: fill-box;
    }

    @keyframes jiggle {
      from {
        transform: rotateZ(0deg);
      }

      to {
        transform: rotateZ(10deg);
      }
    }

    #left-hand {
      animation: jiggle2 1s ease-in-out infinite alternate;
      transform-origin: center;
      transform-box: fill-box;
    }

    @keyframes jiggle2 {
      from {
        transform: rotateZ(0deg);
      }

      to {
        transform: rotateZ(10deg);
      }
    }

    #confetti {
      animation: UP 1s ease-in-out infinite alternate;
      transform-origin: center;
      transform-box: fill-box;
    }

    @keyframes UP {
      from {
        transform: rotateX(0deg);
      }

      to {
        transform: rotateX(40deg);
      }
    }

    .scroll-container {

      scroll-behavior: smooth;
    }

    .btnOk {
      width: 30px;
      height: 30px;
      background-color: red;
      text-align: center;
      border: none;
      border-radius: 50%;
    }

    @media only screen and (max-width: 700px) {

      /* For mobile phones: */
      .welcome {
        font-size: 20px;
        top: 10%
      }

      svg {
        width: 168px;
        height: 353px;
      }

      .home-testimonial-bottom {
        height: 600px !important;
      }

      .first-page {
        visibility: hidden;
        display: none;
      }


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

    .section-products #product-1 .part-1::before {
      background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
      background-size: cover;
      transition: all 0.3s;
    }

    .section-products #product-2 .part-1::before {
      background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
      background-size: cover;
    }

    .section-products #product-3 .part-1::before {
      background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
      background-size: cover;
    }

    .section-products #product-4 .part-1::before {
      background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
      background-size: cover;
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

    .home-testimonial {
      background-color: #231834;
      height: 380px;

    }

    .home-testimonial-bottom {
      background-color: #f8f8f8;
      transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
      margin-top: 20px;
      margin-bottom: 0px;
      position: relative;
      height: 130px;
      top: 190px
    }

    .home-testimonial h3 {
      color: var(--orange);
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase
    }

    .home-testimonial h2 {
      color: white;
      font-size: 28px;
      font-weight: 700
    }

    .testimonial-inner {
      position: relative;
      top: -174px;
    }

    .testimonial-pos {
      position: relative;
      top: 24px
    }

    .testimonial-inner .tour-desc {
      border-radius: 5px;
      padding: 40px
    }

    .color-grey-3 {
      font-family: "Montserrat", Sans-serif;
      font-size: 14px;
      color: #6c83a2
    }

    .testimonial-inner img.tm-people {
      width: 60px;
      height: 60px;
      -webkit-border-radius: 50%;
      border-radius: 50%;
      -o-object-fit: cover;
      object-fit: cover;
      max-width: none
    }

    .link-name {
      font-family: "Montserrat", Sans-serif;
      font-size: 14px;
      color: #6c83a2
    }

    .link-position {
      font-family: "Montserrat", Sans-serif;
      font-size: 12px;
      color: #6c83a2
    }

    .first-page {
      height: 100vh;
      color: black;
      display: flex;
      align-items: center;
      justify-content: space-around;
    }

    .first-page img {
      height: 100%;
    }

    /* new testimonial */
    .heading {
      text-align: center;
      color: #454343;
      font-size: 30px;
      font-weight: 700;
      position: relative;
      margin-bottom: 70px;
      text-transform: uppercase;
      z-index: 999;
    }

    .white-heading {
      color: #ffffff;
    }

    .heading:after {
      content: ' ';
      position: absolute;
      top: 100%;
      left: 50%;
      height: 40px;
      width: 180px;
      border-radius: 4px;
      transform: translateX(-50%);
      background: url(img/heading-line.png);
      background-repeat: no-repeat;
      background-position: center;
    }

    .white-heading:after {
      background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);
      background-repeat: no-repeat;
      background-position: center;
    }

    .heading span {
      font-size: 18px;
      display: block;
      font-weight: 500;
    }

    .white-heading span {
      color: #ffffff;
    }

    /*-----Testimonial-------*/

    .testimonial:after {
      position: absolute;
      top: -0 !important;
      left: 0;
      content: " ";
      background: url(img/testimonial.bg-top.png);
      background-size: 100% 100px;
      width: 100%;
      height: 100px;
      float: left;
      z-index: 99;
    }

    .testimonial {
      min-height: 375px;
      position: relative;
      background-image: url('img/testimonials.jpg');
      padding-top: 50px;
      padding-bottom: 50px;
      background-position: center;
      background-size: cover;
    }

    #testimonial4 .carousel-inner:hover {
      cursor: -moz-grab;
      cursor: -webkit-grab;
    }

    #testimonial4 .carousel-inner:active {
      cursor: -moz-grabbing;
      cursor: -webkit-grabbing;
    }

    #testimonial4 .carousel-inner .item {
      overflow: hidden;
    }

    .testimonial4_indicators .carousel-indicators {
      left: 0;
      margin: 0;
      width: 100%;
      font-size: 0;
      height: 20px;
      bottom: 15px;
      padding: 0 5px;
      cursor: e-resize;
      overflow-x: auto;
      overflow-y: hidden;
      position: absolute;
      text-align: center;
      white-space: nowrap;
    }

    .testimonial4_indicators .carousel-indicators li {
      padding: 0;
      width: 14px;
      height: 14px;
      border: none;
      text-indent: 0;
      margin: 2px 3px;
      cursor: pointer;
      display: inline-block;
      background: #ffffff;
      -webkit-border-radius: 100%;
      border-radius: 100%;
    }

    .testimonial4_indicators .carousel-indicators .active {
      padding: 0;
      width: 14px;
      height: 14px;
      border: none;
      margin: 2px 3px;
      background-color: #9dd3af;
      -webkit-border-radius: 100%;
      border-radius: 100%;
    }

    .testimonial4_indicators .carousel-indicators::-webkit-scrollbar {
      height: 3px;
    }

    .testimonial4_indicators .carousel-indicators::-webkit-scrollbar-thumb {
      background: #eeeeee;
      -webkit-border-radius: 0;
      border-radius: 0;
    }

    .testimonial4_control_button .carousel-control {
      top: 175px;
      opacity: 1;
      width: 40px;
      bottom: auto;
      height: 40px;
      font-size: 10px;
      cursor: pointer;
      font-weight: 700;
      overflow: hidden;
      line-height: 38px;
      text-shadow: none;
      text-align: center;
      position: absolute;
      background: transparent;
      border: 2px solid #ffffff;
      text-transform: uppercase;
      -webkit-border-radius: 100%;
      border-radius: 100%;
      -webkit-box-shadow: none;
      box-shadow: none;
      -webkit-transition: all 0.6s cubic-bezier(0.3, 1, 0, 1);
      transition: all 0.6s cubic-bezier(0.3, 1, 0, 1);
    }

    .testimonial4_control_button .carousel-control.left {
      left: 7%;
      top: 50%;
      right: auto;
    }

    .testimonial4_control_button .carousel-control.right {
      right: 7%;
      top: 50%;
      left: auto;
    }

    .testimonial4_control_button .carousel-control.left:hover,
    .testimonial4_control_button .carousel-control.right:hover {
      color: #000;
      background: #fff;
      border: 2px solid #fff;
    }

    .testimonial4_header {
      top: 0;
      left: 0;
      bottom: 0;
      width: 550px;
      display: block;
      margin: 30px auto;
      text-align: center;
      position: relative;
    }

    .testimonial4_header h4 {
      color: #ffffff;
      font-size: 30px;
      font-weight: 600;
      position: relative;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .testimonial4_slide {
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 70%;
      margin: auto;
      padding: 20px;
      position: relative;
      text-align: center;
      height: 400px;
    }

    .testimonial4_slide img {
      top: 0;
      left: 0;
      right: 0;
      width: 136px;
      height: 136px;
      margin: auto;
      display: block;
      color: #f2f2f2;
      font-size: 18px;
      line-height: 46px;
      text-align: center;
      position: relative;
      border-radius: 50%;
      box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
      -moz-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
      -o-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
      -webkit-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    }

    .testimonial4_slide p {
      color: #ffffff;
      font-size: 20px;
      line-height: 1.4;
      margin: 40px 0 20px 0;
    }

    .testimonial4_slide h4 {
      color: #ffffff;
      font-size: 22px;
    }

    .testimonial .carousel {
      padding-bottom: 50px;
    }

    .testimonial .carousel-control-next-icon,
    .testimonial .carousel-control-prev-icon {
      width: 35px;
      height: 35px;
    }

    /* ------testimonial  close-------*/

    /* scrolltrigger */
    .top,
    .footer {
      color: #181818;
      height: 300px;
      width: 100%;
    }

    .main {
      padding: 60px;
      height: 70vh;
      position: relative;
      width: 100%;

    }

    .h1Scroll {
      text-align: center;
      font-size: 60px;
      padding: 80px;
    }

    .h1Scroll2 {
      text-align: center;
      font-size: 60px;
      padding: 80px;
    }

    .filled-text {
      position: absolute;
      color: #181818;
      top: 200px;
      left: 100px;
      z-index: 1;
      font-size: 100px;
      font-weight: 600;

    }

    .outline-text {
      position: absolute;
      top: 200px;
      left: 100px;
      z-index: 3;
      font-size: 100px;
      font-weight: 600;
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: #181818;
      color: transparent;

    }

    .filled-text2 {
      position: absolute;
      color: #fff;
      top: 200px;
      left: 100px;
      z-index: 1;
      font-size: 100px;
      font-weight: 600;

    }

    .outline-text2 {
      position: absolute;
      top: 200px;
      left: 100px;
      z-index: 3;
      font-size: 100px;
      font-weight: 600;
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: ghostwhite;
      color: transparent;

    }

    .imgScroll {
      position: absolute;
      filter: brightness(70%);
      top: 50px;
      left: 600px;
      z-index: 2;
      height: 400px;
      width: auto;
    }

    .imgScroll2 {
      position: absolute;
      filter: brightness(70%);
      top: 50px;
      left: 600px;
      z-index: 2;
      height: 400px;
      width: auto;
    }
  </style>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

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
            <a class="nav-link " href="contact.php" style="color:white !important">Contact Us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="abtus.php" style="color:white !important">About us</a>
          </li>
          <?php
          if (!empty($_SESSION['userid'])) {
          ?>
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
          <?php
          }
          ?>
          <?php if (!empty($_SESSION['userid'])) {
          ?>
            <li class="nav-item ">
              <a class="nav-link " href="PhpSheets/logout.php" style="color:white !important">Log out <i class="fas fa-door-open"></i></a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php" style="color:white">Log In <i class="fas fa-door-open"></i></a>
            </li>
          <?php
          } ?>




      </ul>
      </div>
    </nav>
    <div id="greeting" style="position: absolute;left: 50%;top: 50%;width:50%;height:50%;z-index:99;border-radius:30px;display:none;
transform: translate(-50%, -50%);background: #6190E8; background: -webkit-linear-gradient(to bottom, #A7BFE8, #6190E8); background: linear-gradient(to bottom, #A7BFE8, #6190E8);">
      <h2 class="welcome">Welcome To our Store :D</h2>
      <svg width="198" height="383" viewBox="0 0 298 483" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="undraw_celebrating_rtuv 1" clip-path="url(#clip0_1_2)">
          <path id="Vector" d="M144.92 254.031C168.456 254.031 187.536 234.952 187.536 211.415C187.536 187.879 168.456 168.799 144.92 168.799C121.384 168.799 102.304 187.879 102.304 211.415C102.304 234.952 121.384 254.031 144.92 254.031Z" fill="#6C63FF" />
          <g id="left-hand">
            <path id="Vector_2" d="M41.2732 315.113C40.3703 314.68 39.6005 314.012 39.0446 313.179C38.4886 312.347 38.167 311.38 38.1134 310.38L37.4935 298.644C37.417 297.168 37.9292 295.722 38.9176 294.624C39.906 293.525 41.2899 292.863 42.7656 292.784L140.582 287.616C142.058 287.54 143.504 288.052 144.603 289.04C145.701 290.029 146.363 291.413 146.442 292.888L147.062 304.625C147.139 306.1 146.627 307.546 145.638 308.645C144.65 309.743 143.266 310.405 141.79 310.485L43.9738 315.652C43.0425 315.703 42.1137 315.517 41.2732 315.113V315.113Z" fill="#6C63FF" />
            <path id="Vector_3" d="M108.704 315.343C107.752 314.882 106.95 314.162 106.391 313.265C105.833 312.367 105.54 311.33 105.547 310.273L105.431 288.176C105.436 287.444 105.586 286.72 105.871 286.045C106.157 285.37 106.572 284.759 107.094 284.245C107.616 283.731 108.234 283.325 108.913 283.05C109.592 282.776 110.319 282.637 111.051 282.644L155.675 286.578C156.856 286.585 158.347 288.415 159.546 289.884C159.922 290.345 160.247 290.743 160.484 290.984C160.588 291.09 160.687 291.2 160.781 291.312C161.634 292.327 162.096 293.614 162.084 294.94L161.986 306.691C161.972 308.169 161.372 309.581 160.319 310.617C159.265 311.653 157.844 312.23 156.366 312.219L111.109 315.892C110.276 315.889 109.455 315.702 108.704 315.343Z" fill="#2F2E41" />
          </g>
          <path id="Vector_4" d="M136.612 482.027H124.86C123.382 482.025 121.965 481.437 120.92 480.392C119.875 479.348 119.288 477.931 119.286 476.453V376.907C119.288 375.43 119.875 374.013 120.92 372.968C121.965 371.923 123.382 371.335 124.86 371.333H136.612C138.09 371.335 139.507 371.923 140.552 372.968C141.597 374.013 142.185 375.43 142.186 376.907V476.453C142.185 477.931 141.597 479.348 140.552 480.392C139.507 481.437 138.09 482.025 136.612 482.027V482.027Z" fill="#6C63FF" />
          <path id="Vector_5" d="M167.612 482.027H155.86C154.382 482.025 152.965 481.437 151.92 480.392C150.875 479.348 150.288 477.931 150.286 476.453V376.907C150.288 375.43 150.875 374.013 151.92 372.968C152.965 371.923 154.382 371.335 155.86 371.333H167.612C169.09 371.335 170.507 371.923 171.552 372.968C172.597 374.013 173.185 375.43 173.186 376.907V476.453C173.185 477.931 172.597 479.348 171.552 480.392C170.507 481.437 169.09 482.025 167.612 482.027V482.027Z" fill="#6C63FF" />
          <path id="Vector_6" d="M150.593 227.21L150.637 225.618C147.674 225.535 145.062 225.349 143.1 223.916C142.543 223.486 142.086 222.941 141.759 222.319C141.431 221.697 141.242 221.012 141.204 220.31C141.169 219.881 141.234 219.45 141.393 219.05C141.552 218.65 141.802 218.293 142.121 218.005C143.424 216.905 145.521 217.261 147.049 217.961L148.367 218.566L145.84 200.1L144.262 200.316L146.411 216.024C145.531 215.697 144.584 215.596 143.655 215.73C142.726 215.863 141.846 216.227 141.094 216.789C140.588 217.23 140.191 217.783 139.934 218.404C139.677 219.024 139.567 219.696 139.612 220.366C139.659 221.309 139.911 222.23 140.351 223.066C140.791 223.901 141.409 224.63 142.16 225.202C144.682 227.045 147.959 227.136 150.593 227.21Z" fill="#2F2E41" />
          <path id="Vector_7" d="M136.459 201.67H127.882V203.263H136.459V201.67Z" fill="#2F2E41" />
          <path id="Vector_8" d="M163.532 201.67H154.955V203.263H163.532V201.67Z" fill="#2F2E41" />
          <path id="Vector_9" d="M193.472 353.339L154.137 274.901H154.692C156.064 274.899 157.38 274.353 158.35 273.383C159.32 272.413 159.866 271.097 159.868 269.725V268.132C159.866 266.76 159.32 265.444 158.35 264.474C157.38 263.504 156.064 262.958 154.692 262.956H137.174C135.801 262.958 134.486 263.504 133.516 264.474C132.545 265.444 131.999 266.76 131.998 268.132V269.725C132.002 270.991 132.471 272.211 133.315 273.154C134.16 274.097 135.321 274.697 136.579 274.84L97.1312 353.382C95.2552 357.117 94.366 361.27 94.5482 365.446C94.7304 369.622 95.9781 373.682 98.1724 377.239C100.367 380.797 103.435 383.734 107.085 385.771C110.734 387.808 114.845 388.878 119.025 388.878H171.536C175.722 388.878 179.837 387.807 183.492 385.768C187.147 383.729 190.22 380.789 192.418 377.227C194.616 373.666 195.867 369.601 196.051 365.42C196.236 361.239 195.348 357.08 193.472 353.339Z" fill="#2F2E41" />
          <g id="right-hand">
            <path id="Vector_10" d="M146.761 292.653L235.487 251.152C236.826 250.527 238.359 250.459 239.748 250.963C241.137 251.466 242.27 252.501 242.898 253.839L247.877 264.484C248.501 265.823 248.569 267.356 248.066 268.745C247.562 270.134 246.528 271.267 245.19 271.895L156.463 313.396C155.124 314.021 153.591 314.089 152.202 313.585C150.813 313.081 149.68 312.047 149.053 310.709L144.073 300.063C143.762 299.401 143.584 298.683 143.552 297.952C143.52 297.22 143.633 296.49 143.885 295.802C144.081 295.257 144.362 294.746 144.715 294.287C145.257 293.587 145.958 293.026 146.761 292.653Z" fill="#6C63FF" />
            <path id="Vector_11" d="M143.718 292.397L182.781 269.113C184.113 268.474 185.643 268.389 187.037 268.877C188.431 269.365 189.575 270.386 190.218 271.716L200.069 291.507C200.387 292.169 200.572 292.887 200.612 293.621C200.651 294.354 200.546 295.088 200.301 295.781C200.056 296.474 199.676 297.111 199.184 297.656C198.692 298.201 198.096 298.644 197.432 298.958L155.704 315.078C154.611 315.603 152.466 314.62 150.742 313.829C150.202 313.581 149.735 313.367 149.416 313.256C149.275 313.206 149.138 313.152 149.004 313.093C147.791 312.557 146.81 311.606 146.236 310.41L141.142 299.82C140.694 298.886 140.514 297.846 140.622 296.816C140.73 295.786 141.123 294.806 141.756 293.986C142.277 293.31 142.949 292.766 143.718 292.397V292.397Z" fill="#2F2E41" />
          </g>
          <path id="Vector_12" d="M111.261 189.25C110.691 189.248 110.144 189.021 109.741 188.617C109.338 188.214 109.111 187.668 109.11 187.098C109.107 186.928 109.126 186.759 109.166 186.595L120.305 137.531C120.39 137.162 120.569 136.821 120.827 136.543C121.084 136.265 121.41 136.059 121.772 135.946C122.134 135.834 122.519 135.818 122.889 135.901C123.259 135.984 123.6 136.163 123.879 136.419L160.808 170.616C161.085 170.873 161.291 171.199 161.403 171.561C161.515 171.923 161.53 172.308 161.447 172.678C161.364 173.047 161.185 173.389 160.929 173.667C160.673 173.946 160.348 174.153 159.986 174.267L111.908 189.153C111.698 189.217 111.48 189.25 111.261 189.25Z" fill="#3F3D56" />
          <path id="Vector_13" d="M141.465 153.383L118.269 148.767L118.634 147.156L139.141 151.233L141.465 153.383Z" fill="white" />
          <path id="Vector_14" d="M159.73 170.303L115.38 161.478L115.745 159.859L157.405 168.144L159.73 170.303Z" fill="white" />
          <path id="Vector_15" d="M143.864 178.738L140.535 179.767L112.499 174.188L112.864 172.569L143.864 178.738Z" fill="white" />
          <path id="Vector_16" d="M234 230C236.761 230 239 227.761 239 225C239 222.239 236.761 220 234 220C231.239 220 229 222.239 229 225C229 227.761 231.239 230 234 230Z" fill="#E6E6E6" />
          <g id="confetti">
            <path id="Vector_17" d="M252 182C255.866 182 259 178.866 259 175C259 171.134 255.866 168 252 168C248.134 168 245 171.134 245 175C245 178.866 248.134 182 252 182Z" fill="#6C63FF" />
            <path id="Vector_18" d="M162 10C164.761 10 167 7.76142 167 5C167 2.23858 164.761 0 162 0C159.239 0 157 2.23858 157 5C157 7.76142 159.239 10 162 10Z" fill="#FF6584" />
            <path id="Vector_19" d="M53 165C55.7614 165 58 162.761 58 160C58 157.239 55.7614 155 53 155C50.2386 155 48 157.239 48 160C48 162.761 50.2386 165 53 165Z" fill="#FF6584" />
            <path id="Vector_20" d="M228 140C230.761 140 233 137.761 233 135C233 132.239 230.761 130 228 130C225.239 130 223 132.239 223 135C223 137.761 225.239 140 228 140Z" fill="#6C63FF" />
            <path id="Vector_21" d="M76 216C78.7614 216 81 213.761 81 211C81 208.239 78.7614 206 76 206C73.2386 206 71 208.239 71 211C71 213.761 73.2386 216 76 216Z" fill="#6C63FF" />
            <path id="Vector_22" d="M190 44C192.761 44 195 41.7614 195 39C195 36.2386 192.761 34 190 34C187.239 34 185 36.2386 185 39C185 41.7614 187.239 44 190 44Z" fill="#CCCCCC" />
            <path id="Vector_23" d="M1.01672 106.977C6.25223 107.307 11.3351 108.872 15.8485 111.546C20.362 114.219 24.1777 117.925 26.9827 122.357C27.7688 123.614 28.795 124.995 28.2509 126.542C28.0613 127.135 27.6761 127.646 27.1583 127.992C26.6405 128.338 26.0207 128.498 25.4002 128.446C24.6266 128.279 23.9292 127.863 23.4157 127.261C22.9022 126.659 22.6011 125.904 22.5588 125.114C22.5164 124.324 22.7353 123.542 23.1815 122.888C23.6277 122.235 24.2766 121.746 25.028 121.498C28.6591 119.949 32.3226 122.343 35.2804 124.253C42.02 128.606 49.4329 132.543 57.5994 133.039C65.1553 133.498 73.2579 130.535 77.4606 123.983C78.1958 122.837 76.3703 121.777 75.6386 122.918C71.4705 129.416 63.0445 131.75 55.7182 130.746C51.3522 130.057 47.1364 128.626 43.2535 126.514C41.2398 125.469 39.2867 124.31 37.3732 123.093C35.5523 121.822 33.6223 120.716 31.6057 119.786C28.2427 118.405 23.7907 118.513 21.4416 121.693C19.25 124.661 20.9437 129.601 24.6092 130.435C25.4133 130.594 26.2442 130.55 27.0273 130.309C27.8105 130.067 28.5214 129.635 29.0964 129.051C29.6715 128.467 30.0926 127.749 30.3221 126.962C30.5516 126.176 30.5822 125.344 30.4113 124.543C30.0456 122.795 28.7298 121.085 27.7113 119.657C24.6512 115.352 20.6643 111.789 16.0443 109.229C11.4244 106.669 6.28906 105.179 1.0166 104.867C-0.340667 104.8 -0.337127 106.91 1.0166 106.977L1.01672 106.977Z" fill="#CCCCCC" />
            <path id="Vector_24" d="M296.728 162.848C293.22 160.589 290.297 157.531 288.199 153.925C286.101 150.319 284.887 146.267 284.657 142.101C284.598 140.923 284.421 139.566 285.398 138.703C285.76 138.364 286.226 138.159 286.719 138.119C287.213 138.08 287.705 138.209 288.116 138.486C288.589 138.901 288.912 139.461 289.035 140.078C289.158 140.695 289.075 141.336 288.798 141.901C288.521 142.466 288.066 142.924 287.503 143.205C286.94 143.486 286.3 143.574 285.681 143.455C282.559 143.123 280.943 140.041 279.629 137.568C276.636 131.932 273.014 126.325 267.534 122.814C262.465 119.567 255.689 118.484 250.23 121.405C249.275 121.916 250.133 123.36 251.083 122.851C256.497 119.954 263.253 121.599 267.952 125.136C270.717 127.307 273.09 129.935 274.968 132.907C275.962 134.413 276.869 135.975 277.726 137.562C278.498 139.151 279.409 140.667 280.45 142.094C282.25 144.357 285.384 146.008 288.248 144.71C288.886 144.379 289.438 143.904 289.86 143.322C290.282 142.741 290.562 142.068 290.677 141.359C290.793 140.65 290.741 139.923 290.525 139.238C290.31 138.552 289.937 137.926 289.437 137.411C288.94 136.989 288.346 136.697 287.708 136.561C287.071 136.425 286.409 136.45 285.784 136.633C285.158 136.815 284.587 137.15 284.123 137.608C283.658 138.065 283.315 138.631 283.123 139.254C282.828 140.718 282.822 142.227 283.104 143.694C283.561 147.869 284.948 151.89 287.165 155.458C289.381 159.027 292.37 162.053 295.911 164.313C296.827 164.886 297.643 163.419 296.728 162.848L296.728 162.848Z" fill="#CCCCCC" />
            <path id="Vector_25" d="M124.191 32.4056C120.027 32.1433 115.985 30.8979 112.395 28.7715C108.805 26.6451 105.77 23.6983 103.539 20.1725C102.914 19.173 102.098 18.0746 102.531 16.8444C102.682 16.3726 102.988 15.966 103.4 15.691C103.812 15.4159 104.304 15.2887 104.798 15.3301C105.413 15.4626 105.968 15.7938 106.376 16.2727C106.785 16.7516 107.024 17.3515 107.058 17.98C107.092 18.6085 106.918 19.2306 106.563 19.7504C106.208 20.2702 105.692 20.6588 105.094 20.8562C102.206 22.0881 99.2922 20.1843 96.9398 18.6648C91.5794 15.2027 85.6836 12.0716 79.1883 11.6771C73.1788 11.3121 66.7345 13.6684 63.3918 18.8798C62.807 19.7916 64.259 20.6341 64.8409 19.7268C68.156 14.5583 74.8576 12.7021 80.6846 13.5009C84.157 14.0489 87.5101 15.1872 90.5984 16.8667C92.2 17.6979 93.7533 18.6193 95.2752 19.5878C96.7234 20.5984 98.2585 21.4784 99.8624 22.2175C102.537 23.3162 106.078 23.2304 107.946 20.7007C108.343 20.1012 108.593 19.4173 108.678 18.7037C108.763 17.9901 108.679 17.2666 108.435 16.591C108.19 15.9153 107.79 15.3063 107.268 14.8127C106.746 14.319 106.115 13.9544 105.427 13.748C104.788 13.6219 104.127 13.6565 103.504 13.8487C102.881 14.0408 102.315 14.3846 101.858 14.849C101.401 15.3135 101.066 15.8842 100.883 16.51C100.701 17.1357 100.676 17.797 100.812 18.4345C101.269 19.8571 101.998 21.177 102.96 22.3203C105.394 25.7442 108.565 28.5784 112.239 30.6143C115.914 32.6502 119.998 33.8358 124.191 34.0838C125.271 34.1372 125.268 32.4589 124.191 32.4056L124.191 32.4056Z" fill="#CCCCCC" />
            <path id="Vector_26" d="M128 85.5714H123V102H128V85.5714Z" fill="#CCCCCC" />
            <path id="Vector_27" d="M47.1569 74.1066L50.6317 70.6317L39.2143 59.2143L35.7394 62.6892L47.1569 74.1066Z" fill="#B3B3B3" />
            <path id="Vector_28" d="M187.739 100.632L191.214 104.107L202.632 92.6892L199.157 89.2143L187.739 100.632Z" fill="#B3B3B3" />
            <path id="Vector_29" d="M45.7394 250.632L49.2143 254.107L60.6317 242.689L57.1568 239.214L45.7394 250.632Z" fill="#FF6584" />
          </g>
        </g>
        <defs>
          <clipPath id="clip0_1_2">
            <rect width="297.128" height="482.027" fill="white" />
          </clipPath>
        </defs>
      </svg>
      <button class="btnOk" id="cancel" onclick="cancelGreeting();"><i class="fas fa-window-close" style="color: white;"></i></button>
    </div>
    <div class="scroll-container">




      <div class="both">
        <div class="boy">
          <a href="men.php"><img src="img/fashion-man-model.jpeg" alt="" style="object-fit:cover;width:100%;height:100%"></a>
          <!--<div class="btn1">
                  <button class="btnBoy">Boys Section</button>
                </div>-->
          <div class="wrapper">
            <div class="link_wrapper">
              <a href="men.php" class="a">Boys Section!</a>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                  <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z" />
                </svg>
              </div>
            </div>

          </div>
        </div>
        <div class="girl">
          <a href="women.php"><img src="img/fashion-woman-model.jpeg" alt="" style="object-fit:cover;width:100%;height:100%"></a>
          <!--<div class="btn2">
        <button class="btnGirl">Girls Section</button>
      </div>-->
          <div class="wrapper2">
            <div class="link_wrapper">
              <a href="women.php" class="a">Girls Section!</a>
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                  <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z" />
                </svg>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <section class="testimonial text-center">
      <div class="container">

        <div class="heading white-heading">
          Testimonial
        </div>
        <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="testimonial4_slide">
                <img class="tm-people" src="img/blank.png" alt="">
                <p>I really like this website as well as how easy it is to navigate through it Keep it UP!</p>
                <h4>Lamiaa</h4>
              </div>
            </div>
            <?php
            $sqlReviews = "SELECT messages.*,users.userId,users.image,users.userName from users,messages
                  WHERE messages.userid=users.userId
                  ORDER BY messages.id DESC limit 3";
            $resultreviews = mysqli_query($conn, $sqlReviews) or die(mysqli_error($conn));
            if (mysqli_num_rows($resultreviews) > 0) {
              while ($lineReviews = mysqli_fetch_assoc($resultreviews)) {



            ?>
                <div class="carousel-item ">
                  <div class="testimonial4_slide">
                    <?php if ($lineReviews['image'] == NULL) { ?>
                      <img class="tm-people" src="img/blank.png" alt="">
                    <?php } else { ?>
                      <img class="tm-people" src="uploadsUser/<?php echo $lineReviews['image'] ?>" alt="">
                    <?php } ?>
                    <p><?php echo $lineReviews['message'] ?></p>
                    <h4><?php echo $lineReviews['userName'] ?></h4>
                  </div>
                </div>
            <?php
              }
            }
            ?>

          </div>
          <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#testimonial4" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>

        </div>
      </div>
    </section>

    <!-- scrolltrigger header -->

    <!-- <section class="top">
      <h1 class="h1Scroll">This is your time to shine 🌞</h1>
    </section> -->
    <section class="main">
      <div class="container">
        <h2 class="filled-text">THIS IS YOUR TIME TO SHINE</h2>
        <h2 class="outline-text">THIS IS YOUR TIME TO SHINE</h2>
        <img src="img/coolGirl.jpeg" class="imgScroll">
      </div>
    </section>
    <section class="main" style="background-color: #121212;">
      <div class="container">
        <h2 class="filled-text2">BEWOW FITS YOU</h2>
        <h2 class="outline-text2">BEWOW FITS YOU</h2>
        <img src="img/coolGuy.jpeg" class="imgScroll2">
      </div>
    </section>
    <!-- <section class="footer">
      <h1 class="h1Scroll2">Menswear Founded on Fit, Built on Service, and Focused on Style. However You Fit, Bonobos Fits You.</h1>
    </section> -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>

    <script type="text/javascript">
      gsap.to(".filled-text, .outline-text", {
        scrollTrigger: {
          trigger: ".filled-text, .outline-text",
          start: "top bottom",
          end: "bottom top",
          scrub: 1
        },
        x: 300
      })

      gsap.to(".imgScroll", {
        scrollTrigger: {
          trigger: ".imgScroll",
          start: "top bottom",
          end: "bottom top",
          scrub: 1,

        },
        x: -250,

      })

      gsap.to(".filled-text2, .outline-text2", {
        scrollTrigger: {
          trigger: ".filled-text2, .outline-text2",
          start: "top bottom",
          end: "bottom top",
          scrub: 1
        },
        x: -100
      })

      gsap.to(".imgScroll2", {
        scrollTrigger: {
          trigger: ".imgScroll2",
          start: "top bottom",
          end: "bottom top",
          scrub: 1,

        },
        x: 250,

      })



      gsap.to(".h1Scroll", {
        scrollTrigger: {
          trigger: ".h1Scroll",
          start: "bottom top",
          end: "top bottom",
          scrub: 1,

        },
        y: 250,

      })
    </script>




  </body>
  <script src="js/jquery-3.6.0.js"></script>
  <script>
    var visited = localStorage.getItem("visited");
    if (!visited) {
      $('#greeting').css('display', 'block');
      localStorage.setItem("visited", true);
    }

    function cancelGreeting() {
      $('#greeting').remove();
    }
  </script>

  </html>
<?php
}
?>