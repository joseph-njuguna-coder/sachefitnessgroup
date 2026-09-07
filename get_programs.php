<?php

include('dbcon.php');

header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['division_id']) || !is_numeric($_GET['division_id'])) {
    echo json_encode([
        'success' => false,
        'programs' => []
    ]);
    exit;
}

$division_id = (int) $_GET['division_id'];

$stmt = mysqli_prepare(
    $con,
    "SELECT id, name
     FROM programs
     WHERE division_id = ?
     AND status = 'Active'
     ORDER BY sort_order ASC, name ASC"
);

if (!$stmt) {
    echo json_encode([
        'success' => false,
        'programs' => []
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $division_id);

if (!mysqli_stmt_execute($stmt)) {
    echo json_encode([
        'success' => false,
        'programs' => []
    ]);
    mysqli_stmt_close($stmt);
    exit;
}

$result = mysqli_stmt_get_result($stmt);

$programs = [];

while ($row = mysqli_fetch_assoc($result)) {
    $programs[] = [
        'id' => (int) $row['id'],
        'name' => $row['name']
    ];
}

echo json_encode([
    'success' => true,
    'programs' => $programs
]);

mysqli_stmt_close($stmt);
exit;