<?php
include_once("SMS_OK_sms.php");
include_once("index-connect.php");
$number=$_GET["number"];
$clientnum=$_GET["clientnum"];

        $resp=SendSMS($number,"A client wants to hire you.\n Contact : ".$clientnum);
        echo $resp;
  

?>






