<?php
require_once('config.php');

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to reset the table data
$sql = "
USE tips_telemetry;
DELETE FROM user_behavior WHERE timestamp_date = (SELECT MIN(timestamp_date) FROM user_behavior)
";
$stmt = sqlsrv_query($conn, $sql);

// Check for errors
if (!$stmt) {
    die("Insertion failed: " . sqlsrv_errors());
}

// Close the database connection
mysqli_close($conn);

?>