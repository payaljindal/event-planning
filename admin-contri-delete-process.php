<?php
		include_once("index-connect.php");
		$uidd=$_GET["uid"];
		$query="delete  from contributordata where uid='$uidd'";

		mysqli_query($dbRef,$query);
				
		if(mysqli_affected_rows($dbRef)==0)
			echo "Invalid id";
		else
			echo "Record Deleted";	
?>