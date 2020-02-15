<?php


include_once("index-connect.php");
$uid=$_POST["uid"];
$name=$_POST["name"];
$mobile=$_POST["mobile"];
$firmname=$_POST["firmname"];
$estd=$_POST["estd"];
$firmaddress=$_POST["firmaddress"];
$officemob=$_POST["officemob"];
$state=$_POST["state"];
$city=$_POST["city"];
$btn=$_POST["btn"];

if($btn=="save")
{
    if($_FILES["ppic1"]["name"]=="")
    {
     $pic1="noimageavailable.png";
    }
    else
    {
     $pic1=$_FILES["ppic1"]["name"];
	$temp_name1=$_FILES["ppic1"]["tmp_name"];
	move_uploaded_file($temp_name1,"cont-images/".$pic1);
  
    }
    
    if($_FILES["ppic2"]["name"]=="")
    {
     $pic2="noimageavailable.png";
    }
    else
    {
    $pic2=$_FILES["ppic2"]["name"];
	$temp_name2=$_FILES["ppic2"]["tmp_name"];
	move_uploaded_file($temp_name2,"cont-images/".$pic2);
  
    }
    
    
    if($_FILES["ppic3"]["name"]=="")
    {
     $pic3="noimageavailable.png";
    }
    else
    {
     $pic3=$_FILES["ppic3"]["name"];
	$temp_name3=$_FILES["ppic3"]["tmp_name"];
	move_uploaded_file($temp_name3,"cont-images/".$pic3);
    }
    
    $query="insert into contributordata values('$uid','$name','$mobile', '$firmname' , '$estd' , '$firmaddress' , '$officemob', '$state','$city','$pic1','$pic2','$pic3')";
	mysqli_query($dbRef,$query);
	$msg=mysqli_error($dbRef);
	if($msg=="")
    {
        //echo "Record Saved!";
    header("location:contributorReturn.php?msg=Record saved!");
    }
	else
			echo $msg;

    
}

else
{
    $pic1=$_FILES["ppic1"]["name"];
    
    $hdn1=$_POST["hdn1"];
    
	$temp_name1=$_FILES["ppic1"]["tmp_name"];
	if($pic1=="")
    $pic1=$hdn1;
    
    else
    move_uploaded_file($temp_name1,"cont-images/".$pic1);
  
	 $pic2=$_FILES["ppic2"]["name"];
    $hdn2=$_POST["hdn2"];
	$temp_name2=$_FILES["ppic2"]["tmp_name"];
    if($pic2=="")
    $pic2=$hdn2;
     
    else
	move_uploaded_file($temp_name2,"cont-images/".$pic2);
  
     $pic3=$_FILES["ppic3"]["name"];
     $hdn3=$_POST["hdn3"];
	$temp_name3=$_FILES["ppic3"]["tmp_name"];
    if($pic3=="")
        $pic3=$hdn3;
    else
	move_uploaded_file($temp_name3,"cont-images/".$pic3);
    
    
      $query="update contributordata set name='$name',mobile='$mobile',firmname= '$firmname' ,estd= '$estd' ,firmaddress= '$firmaddress',officemob='$officemob',state= '$state',city='$city',picname1='$pic1',picname2='$pic2',picname3='$pic3' where uid='$uid'";
	mysqli_query($dbRef,$query);
	$msg=mysqli_error($dbRef);
	if($msg=="")
            header("location:contributorReturn.php?msg=Record updated!");
			//echo "Data updated!";
	else
			echo $msg;

    
    
    
    
}

?>
