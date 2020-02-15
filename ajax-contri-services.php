<?php

include_once("index-connect.php");
$uid=$_GET["uid"];
$functions=$_GET["functions"];

$selservices=$_GET["selservices"];




$query1="select * from contriservices where uid='$uid' and functions='$functions'";

 $table=mysqli_query($dbRef,$query1);
$count=mysqli_num_rows($table);
if($count==1)
{
    echo "function already added! ";
}
else
{
    $query2="insert into contriservices values('$uid','$functions','$selservices')";
   mysqli_query($dbRef,$query2);
    
     
}

?>