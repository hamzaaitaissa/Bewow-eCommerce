<?php 
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){
    if(!empty($_POST['titre']) and !empty($_POST['price1']) and !empty($_POST['price2'])){
        $titre=$_POST['titre'];
        $price1=$_POST['price1'];
        $price2=$_POST['price2'];
        if($titre!="walo"){
            $sql="SELECT * FROM product_women where titre='$titre' and prix between $price1 and $price2";
            $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            if(mysqli_num_rows($result)>0){
                while($line=mysqli_fetch_assoc($result)){
                    echo'<div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-1" class="single-product">
                            <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
            transition: all 0.3s;">
                                    <ul style="display:flex;align-items:center;justify-content:center">
                                            <li><a href="javascript:void(0)" class="a"><i class="fas fa-shopping-cart"></i></a></li>
                                            <li><a href="javascript:void(0)" class="a" onclick="addFavoris(' . $line['idPro'] . ');"><i class="fas fa-heart"></i></a></li>
                                            <li><a href="javascript:void(0)" class="a"><i class="fas fa-expand"></i></a></li>
                                    </ul>
                            </div>
                            <div class="part-2">
                                    <h3 class="product-title">' . $line['titre'] . '</h3>
                                    <h3 class="product-title">' . $line['marque'] . '</h3>
                                    <h4 class="product-old-price">800DH</h4>
                                    <h4 class="product-price">' . $line['prix'] . 'DH</h4>
                                    <h4 class="product-price"><a href="productdescription.php?idMen=' . $line['idPro'] . '"style="color:#f77f00">See More!</a></h4>
                            </div>
                    </div>
            </div>';
                }
            }
        }else if($titre=="walo"){
            $sql2="SELECT * FROM product_women where prix between $price1 and $price2";
            $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            if(mysqli_num_rows($result2)>0){
                echo'<div class="col-md-6 col-lg-4 col-xl-3">
                <div id="product-1" class="single-product">
                        <div class="part-1" style="background: url(uploads/' . $line['image'] . ') no-repeat center;    background-size: cover;
        transition: all 0.3s;">
                                <ul style="display:flex;align-items:center;justify-content:center">
                                        <li><a href="javascript:void(0)" class="a"><i class="fas fa-shopping-cart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="a" onclick="addFavoris(' . $line['idPro'] . ');"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="javascript:void(0)" class="a"><i class="fas fa-expand"></i></a></li>
                                </ul>
                        </div>
                        <div class="part-2">
                                <h3 class="product-title">' . $line['titre'] . '</h3>
                                <h3 class="product-title">' . $line['marque'] . '</h3>
                                <h4 class="product-old-price">800DH</h4>
                                <h4 class="product-price">' . $line['prix'] . 'DH</h4>
                                <h4 class="product-price"><a href="productdescription.php?idMen=' . $line['idPro'] . '"style="color:#f77f00">See More!</a></h4>
                        </div>
                </div>
        </div>';
            }
        }
    }
}
?>