<?php

$serverName = "mssql";
    $connectionOptions = array("Database"=>"tips_telemetry",
        "Uid"=>"sa", "PWD"=>"Programmadelic_123");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
        die(FormatErrors(sqlsrv_errors()));

if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}

$ts = time();

$sql = "INSERT INTO user_behavior (timestamp_date, liked_tips, disliked_tips, comments, user_agent) VALUES ($ts, 'value2', 'value3', 'value4', 'value6')";
$stmt = sqlsrv_query($conn, $sql);

// Check for errors
if (!$stmt) {
    die("Insertion failed: " . sqlsrv_errors());
}

// Close the connection
sqlsrv_close($conn);

?>