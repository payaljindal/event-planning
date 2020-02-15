<?php
		include_once("index-connect.php");
		$uid=$_GET["uid"];
		$query="select * from contributordata where uid='$uid'";
        

		$table=mysqli_query($dbRef,$query);
      
		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}

        echo json_encode($ary);		
?>
