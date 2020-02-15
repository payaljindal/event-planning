<?php
		include_once("index-connect.php");
$functions=$_GET["functions"];
		$query="select services from planner where functions='$functions'";

		$table=mysqli_query($dbRef,$query);
				

		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
		echo json_encode($ary);	
				
			
?>