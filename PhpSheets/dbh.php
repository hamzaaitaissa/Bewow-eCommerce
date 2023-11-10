<?php
 $serverName="test";
 $DBusername="test";
 $DBpassword="test";
 $DBname="test";

 $conn=mysqli_connect($serverName,$DBusername,$DBpassword,$DBname);
 if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
 }

