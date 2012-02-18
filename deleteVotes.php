<?php

	require("constants.php");
	

	$connection = mysql_connect(MYSQL_SERVER, DB_NAME, DB_PASS)
		or print "connect failed because ".mysql_error();
		
	mysql_select_db(DATABASE, $connection)
		or print "select failed because ".mysql_error();
	
	$decoded = json_decode($_POST['json']);
	$voterIDs = $decoded["voterIDs"];
	
	//$voterIDs = "1001,1002,1003";
	
	// If * found delete all
	if ($voterIDs == "*") {
		//print "got";
		// Log which they voted for
		for ($i = 1001; $i <= 1049; $i++) deleteVote($connection, $i);
	}
	
	// If it's a set 
	else {
		$voterIDs = explode(",",$voterIDs);
		foreach ($voterIDs as $voterID) {
			deleteVote($connection, $voterID);
		}
	}
	
	return true;
			
	function deleteVote($connection, $voterID) {
		$query = "SELECT * from voters WHERE voters.voter_id=$voterID";
		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
		$row = mysql_fetch_assoc($result);
		$votedFor = $row["voted_for"];
		$hasVoted = $row["has_voted"];
		
		if ($hasVoted == 1) {
			
			// Decrement the vote count for that candidate
			$query = "UPDATE candidates SET total_votes=total_votes-1 WHERE id=$votedFor";

			$result = mysql_query($query, $connection)
				or print "Showhistory query '$query' failed because ".mysql_error();
			
			// Clear the voters vote
			$query = "UPDATE voters SET voted_for = 0, has_voted = 0 WHERE voter_id=$voterID";

			$result = mysql_query($query, $connection)
				or print "Showhistory query '$query' failed because ".mysql_error();
		}
	}
?>