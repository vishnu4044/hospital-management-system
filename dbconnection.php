<?php
// Create connection
$con=mysqli_connect("sql312.byethost.com","b8_25309335","sai224418","b8_25309335_hmsdb");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>