<?php
		include_once("index-connect.php");
		
		$query="select * from contributordata";

		$table=mysqli_query($dbRef,$query);
				
		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
		echo json_encode($ary);	
				
			
			?> 