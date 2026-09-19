<?php
// Retrieve database credentials from Render environment variables
$host = getenv('DB_HOST') ?: "127.0.0.1";
$user = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: "";
$database = getenv('DB_NAME') ?: "gymnsb";

$con = mysqli_connect($host, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?><!-- Visit codeastro.com for more projects -->
