<?php

// Sanitize and set hash variable
$hash = filter_var($_GET["hash"], FILTER_SANITIZE_STRING);

// check for SHA1 (40 Hex Characters)
if (preg_match('/^[0-9a-f]{40}$/i', $hash)) {
	// SQL Connection
	$con = mysqli_connect("localhost", "passcheck", "vXqDp83xuQfHhc96", "Hash");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	// Query converts the hash to binary string, then attempts to select from the db
	$query = "SELECT * FROM SHA WHERE SHA1 LIKE unhex('$hash') LIMIT 0,1";
	// Runs query, sets count to number of returned results (0 or 1)
	$count = mysqli_num_rows(mysqli_query($con, $query));

	// Close db connection
	mysqli_close($con);

	// Return result (0 or 1)
	echo $count;
} else { //Return Bad Requst Error
	header(':', true, 400);
}
?>
