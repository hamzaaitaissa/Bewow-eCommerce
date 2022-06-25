<?php
 $serverName="localhost";
 $DBusername="root";
 $DBpassword="";
 $DBname="bewow";

 $conn=mysqli_connect($serverName,$DBusername,$DBpassword,$DBname);
 if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
 }

