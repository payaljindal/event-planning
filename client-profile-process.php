<?php

include_once("index-connect.php");

$uid=$_POST["uid"];
$name=$_POST["name"];
$mobile=$_POST["mobile"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$address=$_POST["address"];
$city=$_POST["city"];
$occupation=$_POST["occupation"];
$btn=$_POST["btn"];

//image
	
if($btn=="save")
{
    if($_FILES["ppic"]["name"]=="")
    {
     $pic="noimage.png";
    }
    else
    {
    $pic=$_FILES["ppic"]["name"];
	$temp_name=$_FILES["ppic"]["tmp_name"];
	move_uploaded_file($temp_name,"uploads/".$pic);
    }

    
	//$pwd=md5($pwd);
	$query="insert into clientdata values('$uid','$pic','$name','$mobile', '$email' , '$dob' , '$address' , '$city', '$occupation')";
	mysqli_query($dbRef,$query);
	$msg=mysqli_error($dbRef);
	if($msg=="")
      	//echo "Record Saved!";
       header("location:clientReturn.php?msg=Record saved!");
	else
			echo $msg;
	
}
else{
    
    $pic=$_FILES["ppic"]["name"];
	$hdn=$_POST["hdn"];
	

	$temp_name=$_FILES["ppic"]["tmp_name"];
	
	if($pic=="")
		$pic=$hdn;
	else
		move_uploaded_file($temp_name,"uploads/".$pic);

    
    $query="update  clientdata set pic='$pic',name='$name',mobile='$mobile',email='$email' ,dob='$dob' ,address='$address' , city='$city',occupation= '$occupation'";
	mysqli_query($dbRef,$query);
	$msg=mysqli_error($dbRef);
	if($msg=="")
               header("location:clientReturn.php?msg=Record updated!");
       //echo "Data Updated";
        else
			echo $msg;
	
    
    
}


?>
