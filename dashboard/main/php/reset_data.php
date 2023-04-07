<?php
require_once('config.php');

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to reset the table data
$sql = "
USE tips_telemetry;
TRUNCATE TABLE user_behavior;

INSERT INTO user_behavior (timestamp_date, liked_tips, disliked_tips, comments, user_agent)
VALUES (1676471890, 'Summer thermostat, Oven efficiency', 'N/A', 'This tips not sucks', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3_1 like Mac OS X) AppleWebKit/604.1'),
        (1673035050, 'N/A', 'Thaw food in your fridge', 'This tips sucks', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36')
";
$stmt = sqlsrv_query($conn, $sql);

// Check for errors
if (!$stmt) {
    die("Insertion failed: " . sqlsrv_errors());
}

// Close the database connection
mysqli_close($conn);

?>