<?php
	require("constants.php");
	
	$connection = mysql_connect(MYSQL_SERVER, DB_NAME, DB_PASS)
		or print "connect failed because ".mysql_error();
		
	mysql_select_db(DATABASE, $connection)
		or print "select failed because ".mysql_error();
		
	$userIDs = array();

	for ($i = 1001; $i <= 1049; $i++) {
		//print $i . "<br />";
		array_push($userIDs, $i);
	}

	
	shuffle($userIDs);
	
	for ($i = 0; $i < count($userIDs); $i++) {
		$query = "INSERT INTO voters VALUES ($userIDs[$i],false)";
		
		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
		
		print $result;
	}
	
	

	
	
?>