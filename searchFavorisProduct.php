<?php
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){
    if(!empty($_POST['searchText'])){
        $search=$_POST['searchText'];
        $sql="SELECT product_men.* from product_men,favoris_men
        where product_men.idPro=favoris_men.idPro
        and product_men.marque like '%$search%'";
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
                                <h4 class="product-price"><a href="productdescription.php?idMen='.$line['idPro'].'">See More!</a></h4><br/>
                                <h4 class="product-price" style="color:red"><a href="javascript:void(0)" onclick="removefavorisMen('.$line['idPro'].');">Remove</a></h4>
                        </div>
                </div>
        </div>
                
                ';
            }
        }
    }
}

?>