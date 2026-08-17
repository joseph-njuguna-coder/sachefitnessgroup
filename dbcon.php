<?php
// Changed "localhost" to "127.0.0.1" to bypass local IPv6 resolution blocks
$con = mysqli_connect("127.0.0.1","root","","gymnsb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?><!-- Visit codeastro.com for more projects -->