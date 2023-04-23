<?php
include "config.php";

if(isset($_GET['search'])){
	$search = mysqli_real_escape_string($con,trim($_GET['search']));

	$data = array();
	if(!empty($search)){

		// Fetch 5 records
		$result = mysqli_query($con,"select * from users where fullname like '%".$search."%' limit 5");
		
		while ($row = mysqli_fetch_array($result)) {
		  	$data[] = array(
		  			"id" => $row['id'],
		  			"name"=>$row['fullname']
		  		);
		}
	}

	echo json_encode($data);
	exit;
}
