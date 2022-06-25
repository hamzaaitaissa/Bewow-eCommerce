<?php
/*first thing is going ahead and check if the user actually 
got to this page the proper way which is by hitting the submit 
button hqach yeqder ykteb f url smiya of this file and hack the 
shit out of you */
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $lastname=$_POST["lname"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["password"];
    $pwdrep=$_POST["passwordrepeat"];
    $hashedPwd2=password_hash($pwd,PASSWORD_DEFAULT);
    $image=$_FILES['image'];
    $adresse=$_POST['adresse'];

    /*now we doing error handeling like if the user nssa chi haja 
    so ghandiro chi bunch of functions f functions.php*/
    require_once 'dbh.php';
    require_once 'functions.php';
    /*the first thing is trying to catch the fact that if the user 
    nssa chi field khawya*/
    if(emptyInputSignup($name,$lastname,$email,$username,$pwd,$pwdrep,$adresse)!==false){
        //getting false from the function means that there are no mistakes
        //else getting true means there are
        //and if there are send the user to the signin page
        //?error=emptyinput ghansiftoha f url so that the user yearf ach waqae
        //zid eliha bli mn baed ghansifto erro messages based ela had error hadi
        header("location: ../signin.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username)!==false){
        //we gonna check if thereis proper username
        header("location: ../signin.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email)!==false){
        //we gonna check if thereis proper email
        header("location: ../signin.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd,$pwdrep)!==false){
        //we gonna check if the passwords match
        header("location: ../signin.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn,$username,$email)!==false){
        //we gonna check if the username is already taken
        header("location: ../signin.php?error=usernametaken");
        exit();
    }

    //if the user made no mistakes we shouold sign him up lwebsite

         
    
       
    if(!empty($_FILES['image']['name'])){
        $img_name=$_FILES['image']['name'];
        $img_size=$_FILES['image']['size'];
        $img_error=$_FILES['image']['error'];
        $tmp_name=$_FILES['image']['tmp_name'];
        if($img_error===0){
            if($img_size<1250000){
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs=array('jpg','jpeg','png');
                if(in_array($img_ex_lc,$allowed_exs)){
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path='../uploadsUser/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                    $sql="INSERT INTO users (userName,userLastName,userEmail,userUid,userPwd,image,adresse) VALUES ('$name','$lastname','$email','$username','$hashedPwd2','$new_img_name','$adresse');";
                    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if($result>0){
                        header('location: ../signin.php?error=none');
                    }else{
                        header('location: ../signin.php?error=stmtfailed');
                    }
                }else{
                    header('location: ../signin.php?error=wrongext');
                }
            }else{
                header('location: ../signin.php?error=filetoobig');
            }
        }else{
            header('location: ../signin.php?error=errorupload');
        }
    }else{
        createUser($conn,$name,$lastname,$email,$username,$pwd,$adresse);
    }
    

}else{
    header("location: ../signin.php");
    exit();
}
