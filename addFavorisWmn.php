<?php
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){
    if(!empty($_POST['userId']) and !empty($_POST['idPro'])){
        $userId=$_POST['userId'];
        $idPro=$_POST['idPro'];
        $sql="SELECT * FROM favoris_women where userId=$userId and idPro=$idPro";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if(mysqli_num_rows($result)>0){
            $sql2="DELETE from favoris_women where idPro=$idPro and userId=$userId";
            $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            if(mysqli_affected_rows($conn)>0){
                echo 3;
            }
        }else{
            $sql3="INSERT INTO favoris_women(idPro,userId) values($idPro,$userId)";
            $result3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            if($result3>0){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
}


?>