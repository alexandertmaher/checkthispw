<?php
// SQL Connection
$con = mysqli_connect("localhost","passcheck","vXqDp83xuQfHhc96","Hash");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Query for hash
$hash = $_POST["hash"];
$query = "SELECT * FROM SHA WHERE SHA1 LIKE unhex('$hash') LIMIT 0,5";
$count = mysqli_num_rows(mysqli_query($con,$query));

// Close db connection
mysqli_close($con);
echo $count;
?>
