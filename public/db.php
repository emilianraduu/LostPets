<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("127.0.0.1","lostpets_account","pass","lost_pets");
// echo json_encode($con);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else {
      echo "ok1";
  }
?>