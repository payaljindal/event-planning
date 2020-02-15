<?php

include_once("index-connect.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
//echo $name.$pwd.$type;

$query="select * from admin where uid='$uid' and pwd='$pwd'";


$table=mysqli_query($dbRef,$query);
  $count=mysqli_num_rows($table);

if($count==1)
{
   
    echo "correct";
}
else
    echo "Incorrect Uid/Password";


?>
