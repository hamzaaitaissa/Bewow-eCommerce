<?php
session_start();
if(empty($_SESSION['userid'])){
    header('Location:login.php');
}
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Invoice</title>
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
    font-family: 'Poppins',sans-serif;
    color: #444444;
}

   li {
            letter-spacing: 2px;
            padding-right: 20px;
            padding-left: 20px;
        }

        .navbar-nav {
            margin-left: auto;
        }
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #2e323c;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #9fa8b9;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #f5f6fa;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #ffffff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #9fa8b9;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #f5f6fa;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}


.custom-table {
    border: 1px solid #e0e3ec;
}
.custom-table thead {
    background: #007ae1;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
}
.custom-table > tbody tr:hover {
    background: #fafafa;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #ffffff;
}
.custom-table > tbody td {
    border: 1px solid #e6e9f0;
}


.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.text-success {
    color: #00bb42 !important;
}

.text-muted {
    color: #9fa8b9 !important;
}

.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}

.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
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
                        <a class="nav-link " href="PhpSheets/logout.php" style="color:white">Log out <i class="fas fa-door-open"></i></a>
                    </li>
            </ul>
            </div>
        </nav>
        <?php
        
        $userId=$_SESSION['userid'];
        if(isset($_GET['idProMen'],$_GET['idCmd'])){
            $idPro=$_GET['idProMen'];
            $idCmd=$_GET['idCmd'];
            $sql="SELECT users.userName,users.userLastName,users.userEmail,users.adresse,users.userId,
            commande.idCmd,commande.qte,commande.prix as 'totalPrix',
            product_men.idPro,product_men.prix,product_men.titre,product_men.description,product_men.marque
            from commande ,users,product_men
            where commande.idCmd=$idCmd
            and product_men.idPro=$idPro
            and users.userId=$userId";
            $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            if(mysqli_num_rows($result)>0){
                $line1=mysqli_fetch_assoc($result);
            
        
        
        ?>
<div class="container">
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="custom-actions-btns mb-5">
										<a href="#" class="btn btn-secondary"onclick="window.print()">
											<i class="icon-printer"></i> Print
										</a>
									</div>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<a href="index.html" class="invoice-logo">
										Invoice
									</a>
								</div>
                                
								<div class="col-lg-6 col-md-6 col-sm-6">
									<address class="text-right"> <!-- adresse -->
										<?php echo $line1['adresse'];?>
									</address>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<address>
                                        <?php echo "#Id: ".$line1['userId']?><br>
                                        <?php echo $line1['userName']." ".$line1['userLastName'];?><br> <!-- userName and email -->
                                        <?php echo $line1['userEmail'];?>
										</address>
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<div class="invoice-num">
											<div class="dateNow">Today's Date: </div> <!-- order Date -->
										</div>
									</div>													
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Items</th>
													<th>Product ID</th>
													<th>Quantity</th>
													<th>Sub Total</th>
                                                    <th>Grand Total</th>
												</tr>
											</thead>
											<tbody>
												
												<tr>
													<td> <!-- titre de produit -->
                                                    <?php echo $line1['titre']." <br/>Brand: ".$line1['marque'];?>
														<p class="m-0 text-muted">
                                                        <?php echo $line1['description'];?>
														</p>
													</td>
													<td><?php echo $line1['idPro'];?></td><!-- product ID -->
													<td><?php echo $line1['qte'];?></td> <!-- Quantity -->
													<td><?php echo $line1['prix'];?></td> <!-- subTotal -->
                                                    <td><?php echo $line1['totalPrix'];?></td> <!-- Grandtotal -->
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-footer">
							Thank you for your Business.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
            }
        ?>
        <?php }else if(isset($_GET['idProWomen'],$_GET['idCmd'])){
             $idPro=$_GET['idProWomen'];
             $idCmd=$_GET['idCmd'];
             $sql="SELECT users.userName,users.userLastName,users.userEmail,users.adresse,users.userId,
             commande.idCmd,commande.qte,commande.prix as 'totalPrix',
             product_women.idPro,product_women.prix,product_women.titre,product_women.description,product_women.marque
             from commande ,users,product_women
             where commande.idCmd=$idCmd
             and product_women.idPro=$idPro
             and users.userId=$userId";
             $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
             if(mysqli_num_rows($result)>0){
                 $line1=mysqli_fetch_assoc($result);
                 ?>
                 
                 <div class="container">
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="custom-actions-btns mb-5">
										<a href="#" class="btn btn-secondary"onclick="window.print()">
											<i class="icon-printer"></i> Print
										</a>
									</div>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<a href="index.html" class="invoice-logo">
										Invoice
									</a>
								</div>
                                
								<div class="col-lg-6 col-md-6 col-sm-6">
									<address class="text-right"> <!-- adresse -->
										<?php echo $line1['adresse'];?>
									</address>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<address>
                                        <?php echo "#Id: ".$line1['userId']?><br>
                                        <?php echo $line1['userName']." ".$line1['userLastName'];?><br> <!-- userName and email -->
                                        <?php echo $line1['userEmail'];?>
										</address>
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<div class="invoice-num">
											<div class="dateNow">Today's Date: </div> <!-- order Date -->
										</div>
									</div>													
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Items</th>
													<th>Product ID</th>
													<th>Quantity</th>
													<th>Sub Total</th>
                                                    <th>Grand Total</th>
												</tr>
											</thead>
											<tbody>
												
												<tr>
													<td> <!-- titre de produit -->
                                                    <?php echo $line1['titre']." <br/>Brand: ".$line1['marque'];?>
														<p class="m-0 text-muted">
                                                        <?php echo $line1['description'];?>
														</p>
													</td>
													<td><?php echo $line1['idPro'];?></td><!-- product ID -->
													<td><?php echo $line1['qte'];?></td> <!-- Quantity -->
													<td><?php echo $line1['prix'];?></td> <!-- subTotal -->
                                                    <td><?php echo $line1['totalPrix'];?></td> <!-- Grandtotal -->
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-footer">
							Thank you for your Business.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
                 
                 
                 <?php
             }
        }
?>
<script>
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); 
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    document.querySelector('.dateNow').innerHTML+=today;
</script>
</body>
</html>
<?php
}
?>