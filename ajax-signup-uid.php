<?php

include_once("index-connect.php");
$uid=$_GET["uid"];


$query="select * from project1 where uid='$uid'";


$table=mysqli_query($dbRef,$query);
$count=mysqli_num_rows($table);

if($count==1)
    echo "Id already exists - Try new";

  else
      echo "*";





?>


