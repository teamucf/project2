<?php
	require_once("constants.php");
	require_once("Candidate.php");
	

	$connection = mysql_connect(MYSQL_SERVER, DB_NAME, DB_PASS)
		or print "connect failed because ".mysql_error();
		
	mysql_select_db(DATABASE, $connection)
		or print "select failed because ".mysql_error();
		
	$query = "SELECT * from candidates";
	
	$result = mysql_query($query, $connection)
		or print "Showhistory query '$query' failed because ".mysql_error();
	
	$json = array();
	$json["candidate"] = array();
	$json["canVote"] = true;
	
	while($row = mysql_fetch_assoc($result)){
        $candidate = new Candidate();
		$candidate->name = $row["candidate_name"];
		$candidate->id = $row["id"];
		$candidate->description = $row["candidate_description"];
		$candidate->imageURL = $row["image_url"];
		$candidate->voteCount = $row["total_votes"];
		array_push($json["candidate"], $candidate);
    }    
	
	// Check if can vote
	if (isset($_SESSION['voter_id'])) {
		$voterID = $_SESSION['voter_id'];
		
		$query = "SELECT * from voters WHERE voters.voter_id=$voterID";
		$result = mysql_query($query, $connection)
			or print "Showhistory query '$query' failed because ".mysql_error();
		$row = mysql_fetch_assoc($result);
		
		// Check if already voted
		if ($row["has_voted"] == 1) {
			$json["canVote"] = false;
		}
	}
	return json_encode($json);
?>