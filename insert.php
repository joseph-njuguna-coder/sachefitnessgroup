<?php

include('dbcon.php');

// Get form data
$fullname = mysqli_real_escape_string($con, $_POST['fullname']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = md5($_POST['password']); 

$gender  = mysqli_real_escape_string($con, $_POST['gender']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$address = mysqli_real_escape_string($con, $_POST['address']);

$services = mysqli_real_escape_string($con, $_POST['services']);
$plan     = mysqli_real_escape_string($con, $_POST['plan']);
$amount   = mysqli_real_escape_string($con, $_POST['amount']);
$p_year   = mysqli_real_escape_string($con, $_POST['p_year']);
$paid_date = mysqli_real_escape_string($con, $_POST['paid_date']);

$today = date('Y-m-d');

// Check if username exists
$check = mysqli_query($con, "SELECT * FROM members WHERE username='$username'");

if(mysqli_num_rows($check) > 0) {
    echo "<script>
            alert('Username already exists');
            window.location='registration.php';
          </script>";
    exit();
}

// Insert into database (added the 'role' column)
$query = mysqli_query($con, "
INSERT INTO members (
    fullname,
    username,
    password,
    gender,
    dor,
    services,
    amount,
    paid_date,
    p_year,
    plan,
    address,
    contact,
    status,
    role,            -- Added role column
    attendance_count,
    ini_weight,
    curr_weight,
    ini_bodytype,
    curr_bodytype,
    progress_date,
    reminder
)
VALUES (
    '$fullname',
    '$username',
    '$password',
    '$gender',
    '$today',
    '$services',
    '$amount',
    '$paid_date',
    '$p_year',
    '$plan',
    '$address',
    '$contact',
    'Pending',
    'Customer',      -- Hardcoded default role for safety
    '0',
    '0',
    '0',
    'N/A',
    'N/A',
    '$today',
    '0'
)
");

// Result handling
if($query) {
    // Redirected to index.php (landing page) instead of customer/index.php
    echo "<script>
            alert('Registration Submitted Successfully! Your account is pending admin approval.');
            window.location='index.php'; 
          </script>";
} else {
    echo "Error: " . mysqli_error($con);
}

?>