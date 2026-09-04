<?php

include('dbcon.php');

header('Content-Type: application/json');

if (!isset($_GET['program_id']) || !is_numeric($_GET['program_id'])) {
    echo json_encode([
        'success' => false,
        'packages' => []
    ]);
    exit();
}

$program_id = (int) $_GET['program_id'];

$stmt = mysqli_prepare(
    $con,
    "SELECT id, name, description, price, sessions, duration_days
     FROM program_packages
     WHERE program_id = ?
     AND status = 'Active'
     ORDER BY sort_order ASC, name ASC"
);

mysqli_stmt_bind_param($stmt, "i", $program_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$packages = [];

while ($row = mysqli_fetch_assoc($result)) {

    $packages[] = [
        'id' => (int) $row['id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'price' => $row['price'],
        'sessions' => $row['sessions'],
        'duration_days' => $row['duration_days']
    ];
}

echo json_encode([
    'success' => true,
    'packages' => $packages
]);

mysqli_stmt_close($stmt);