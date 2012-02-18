<?php

	require("constants.php");
	
	$connection = mysql_connect(MYSQL_SERVER, DB_NAME, DB_PASS)
		or print "connect failed because ".mysql_error();
		
	mysql_select_db(DATABASE, $connection)
		or print "select failed because ".mysql_error();
		
	
	$decoded = json_decode($_POST['json']);
	
	$managerID = $decoded["managerID"];

	$json = array();
	
	// Check if is manager
	if ($managerID == 1000) {
		$json["isManager"] = true;
		$json["voters"] = array();
		
		
		$query = "SELECT * from voters";
		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
		
		while ($row = mysql_fetch_assoc($result)) {
			$voter = array();
			$voter["voterID"]=$row["voter_id"];
			$voter["hasVoted"]=$row["has_voted"];
			array_push($json["voters"], $voter);
		}
	}
	else {
		$json["isManager"] = false;
	}
	
	return json_encode($json);

?>