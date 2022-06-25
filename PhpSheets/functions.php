<?php
function emptyInputSignup($name,$lastname,$email,$username,$pwd,$pwdrep,$adresse){
    //hadi hia li ghatrajae true or false
    $result=false;
    if(empty($name) || empty($lastname) || empty($email) || empty($username) || empty($pwd) || empty($pwdrep)|| empty($adresse)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUid($username){
   //hadi hia li ghatrajae true or false
   $result=false;
   /*preg-match a function that make sure a variable has a certain 
   variables and matches a certain schema */
  if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    $result=true;
  }
  else{
      $result=false;
  }
  return $result;
}

function invalidEmail($email){
    //hadi hia li ghatrajae true or false
    $result=false;
    /*FILTER_VALIDATE_EMAIL check if the email is valid */
   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $result=true;
   }
   else{
       $result=false;
   }
   return $result;
 }

 function pwdMatch($pwd,$pwdrep){
    //hadi hia li ghatrajae true or false
    $result=false;
    /*nchofo wach both matches or not*/
   if($pwd!==$pwdrep){
     $result=true;
   }
   else{
       $result=false;
   }
   return $result;
 }

 function uidExists($conn,$username,$email){
    //hadi hia li ghatrajae true or false
    //? raha gha placeholder bach manjiwch nichan and insert the values f database thats not a good idea
   $sql="SELECT * FROM users WHERE userUid=? OR userEmail=?;";
   /*had stmt db the user is able bach ydkhol sign in o ykteb some code o yeqder dak code could destroy our database hadik
   stmt to prepare l hadchi to make it more secure  */
   $stmt=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
    //if there is an error ghanrejeo l user the sign in page b a error message
    header("location: ../signin.php?error=stmtfailed");
    exit();
   }

   //if this is not failed
   //ss hit eandna username o email both are strings bghina nchofo wach they already exist
   mysqli_stmt_bind_param($stmt,"ss",$username,$email);
   //this is grabbing data from database if there is data so email and usename exist in the database
   mysqli_stmt_execute($stmt);
   $resultData=mysqli_stmt_get_result($stmt);
   //lets check if there is result!!
   if($row=mysqli_fetch_assoc($resultData)){
    return $row;
    //returning all the data from the databse if he exists we gonna use it f login script
   }
   else{
       $result=false;
       return $result;
    }
    mysqli_stmt_close($stmt);
 }

 function  createUser($conn,$name,$lastname,$email,$username,$pwd,$adresse){

   $sql="INSERT INTO users (userName,userLastName,userEmail,userUid,userPwd,adresse) VALUES (?,?,?,?,?,?);";
   
   $stmt=mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ../signin.php?error=stmterror");
    exit();
   }
   /*hashing the password ghadi nkhaliw password yban mkherbeq bach ila thaka website dyalna maymchiwch accounts
   */
  $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);


   mysqli_stmt_bind_param($stmt,"ssssss",$name,$lastname,$email,$username,$hashedPwd,$adresse);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../signin.php?error=none");
   exit();
 }

 //------------*****-----------
 //LOGIN FUNCTIOOONS
 function emptyInputLogin($username,$pwd){
    //hadi hia li ghatrajae true or false
    $result=false;
    if(empty($username) || empty($pwd)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function loginUser($conn, $username,$pwd){
    /*to login we need either a username or a en email since we dont have a way to get the email the proper way 
    it just blend in the second username variable*/
    $uidExists= uidExists($conn,$username,$username);

    if($uidExists===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    //we need to check the password even if it is hashed
    $pwdHashed=$uidExists["userPwd"];
    $checkPwd=password_verify($pwd,$pwdHashed);

    if($checkPwd===false){
        //incorrect password
        header("location: ../login.php?error=wronglogin");
        exit();

    }else if($checkPwd===true){
        //password correct
        //now we talking ela session 
        session_start();
        $_SESSION["userid"]=$uidExists["userId"];
        $_SESSION["userUid"]=$uidExists["userUid"];
        header("location: ../HomePage.php");
        exit();
    }

}
/*---------------CONTACT--------------*/
function emptyContact($message){
    $result=false;
    if(empty($message)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}




 