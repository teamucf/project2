<?php

	require("constants.php");
	
	$connection = mysql_connect(MYSQL_SERVER, DB_NAME, DB_PASS)
		or print "connect failed because ".mysql_error();
		
	mysql_select_db(DATABASE, $connection)
		or print "select failed because ".mysql_error();
		
	
	$decoded = json_decode($_POST['json']);

	$candidateID = $decoded["candidateID"];
	$voterID = $decoded["voterID"];
	
	
	// This was for quick testing. 
	//$candidateID = 1;
	//$voterID = 1004;
	$voteState = array();
	
	if ($voterID >= 1001 && $voterID <= 1049) {
		$query = "SELECT * from voters WHERE voters.voter_id=$voterID";

		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
		
		$row = mysql_fetch_assoc($result);
	}
	
	// Invalid voter number
	else {
		$voteState["voteState"] = 2;
		return json_encode($voteState);
	}
	
	
	
	
	// Already voted
	if ($row["has_voted"] == 1) {
		$voteState["voteState"] = 3;
	}
	// Invalid candidate
	else if ($candidateID < 1 || $candidateID > 3) {
		$voteState["voteState"] = 2;
	}
	
	// Valid vote (go ahead and vote)
	else {
		// Clear an old session
		session_destry();
		session_start();
		$_SESSION['voter_id'] = $voterID;
		
		$voteState["voteState"] = 1;
		
		// Set the user to voted
		$query = "UPDATE voters SET has_voted = 1 WHERE voter_id =$voterID";

		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
			
		// Log which they voted for
		$query = "UPDATE voters SET voted_for = $candidateID WHERE voter_id =$voterID";

		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
			
		// Increment the vote count for that candidate
		$query = "UPDATE candidates SET total_votes=total_votes+1 WHERE id=$candidateID";

		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
	}
	
	print json_encode($voteState);

?>