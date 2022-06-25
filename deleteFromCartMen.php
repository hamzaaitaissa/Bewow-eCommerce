<?php
session_start();
$conn=mysqli_connect('localhost','root','','bewow') or die(mysqli_error($conn));
if($conn){
    if(!empty($_POST['idPro']) and !empty($_POST['userId'])){
        $idProMen=$_POST['idPro'];
        $userId=$_POST['userId'];
        $sql="DELETE from cart where idProMen=$idProMen and userId=$userId";
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if(mysqli_affected_rows($conn)>0){
            echo 1;
        }else{
            echo 0;
        }
    }
}
?>