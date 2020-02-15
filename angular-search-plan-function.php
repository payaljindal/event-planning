<?php
		include_once("index-connect.php");
		$functions=$_GET["functions"];
          $selservices=$_GET["selservices"];
        $state=$_GET["state"];
          $cities=$_GET["cities"];
		$query="select * from contributordata where state='$state' and city='$cities' and uid in (SELECT uid  FROM contriservices where functions='$functions' and selservices LIKE '%$selservices%')";
//$query="select *  from contriservices where functions='$functions'"

		$table=mysqli_query($dbRef,$query);

		$ary=array();
		while($row=mysqli_fetch_array($table))
		{
			$ary[]=$row;
		}
		echo json_encode($ary);	

//$msg=mysqli_error($dbRef);
//echo $msg;
				
			
?>
