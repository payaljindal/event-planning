<?php
session_start();

include_once("index-connect.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
//echo $name.$pwd.$type;

$query="select * from project1 where uid='$uid' and pwd='$pwd'";


$table=mysqli_query($dbRef,$query);
$count=mysqli_num_rows($table);

if($count==1)
{
    while($row=mysqli_fetch_array($table))
          {
            $_SESSION["uid"]=$uid;
        
             echo $row["type"];
          }  
}
else
   
    echo "Incorrect Uid/Password";
?>
