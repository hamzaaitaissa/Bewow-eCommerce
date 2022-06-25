<?php
session_start();
if(isset($_POST['submit'])){ 
    $userid=$_SESSION['userid'];
    $email=$_POST['email'];
    $message=$_POST['text'];
    
    require_once 'dbh.php';
    require_once 'functions.php';

    if(emptyContact($message)!==false){
        header("location: ../contact.php?error=emptyinput");
        exit();
    }

   



    $sql='INSERT INTO messages(message,userid) VALUES(?,?);';
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../contact.php?error=sql failed");
    }else{
        mysqli_stmt_bind_param($stmt,"ss",$message,$userid);
        mysqli_stmt_execute($stmt);
    }
    header("location: ../contact.php?success=messageSent");



}