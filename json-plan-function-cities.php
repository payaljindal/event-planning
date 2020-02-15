<?php
		include_once("index-connect.php");
$state=$_GET["state"];
		$query="select distinct city from contributordata where state='$state'";

		$table=mysqli_query($dbRef,$query);
				

		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
		echo json_encode($ary);	
				
			
?>