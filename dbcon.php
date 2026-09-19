<?php
// Retrieve database credentials from Render environment variables with Aiven defaults
$host = getenv('DB_HOST') ?: "mysql-nida-jnjugunam8-081d.e.aivencloud.com";
$user = getenv('DB_USER') ?: "avnadmin";
$password = getenv('DB_PASS') ?: ""; // Use your Aiven password or env var
$database = getenv('DB_NAME') ?: "gymnsb";
$port = (int)(getenv('DB_PORT') ?: 15975); // Aiven custom port from your screenshot

$con = mysqli_connect($host, $user, $password, $database, $port);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?><!-- Visit codeastro.com for more projects -->
