<?php
session_start();
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){
    if(!empty($_POST['idPro']) and !empty($_POST['userId'])){
        $userId=$_POST['userId'];
        $idPro=$_POST['idPro'];
        $sql1="SELECT * from cart where idProWomen=$idPro and userId=$userId";
        $result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        if(mysqli_num_rows($result1)>0){
            echo 0;
        }else{
            $sql2="INSERT INTO cart(idProWomen,userId) values($idPro,$userId)";
            $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            if($result2>0){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
}

?>