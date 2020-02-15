<?php
include_once("SMS_OK_sms.php");
include_once("index-connect.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$type=$_GET["type"];
$mobile=$_GET["mobile"];
//echo $name.$pwd.$type;

$query="insert into project1 values('$uid','$pwd' ,'$mobile','$type')";
   mysqli_query($dbRef,$query);
   $msg=mysqli_error($dbRef);
	if($msg=="")
    {
        $resp=SendSMS($mobile,"Hi ".$uid.". Thanks for being a part of event planning website.");
        echo "Record Saved\n";
    }
    
	else
        echo $msg;
	


?>
