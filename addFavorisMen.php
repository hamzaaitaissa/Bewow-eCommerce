<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
    if (!empty($_POST['idPro']) and !empty($_POST['userId'])) {
        $idPro = $_POST['idPro'];
        $userId = $_POST['userId'];
        $sql2 = "SELECT * FROM favoris_men where idPro=$idPro and userId=$userId";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if (mysqli_num_rows($result2) > 0) {
            $sql3 = "DELETE from favoris_men where idPro=$idPro and userId=$userId";
            $result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn)) {
                echo 3;
            }
        } else {
            $sql = "INSERT INTO favoris_men (idPro,userId) VALUES ($idPro,$userId)";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($result > 0) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}
