<?php
require_once('config.php');

// Load SQL query from file
$sql = "SELECT * FROM user_behavior";

// Execute query
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$data = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode(array("data" => $data));

sqlsrv_close($conn);
?>