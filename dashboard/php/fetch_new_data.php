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

// Fetch initial data
$sql = "SELECT * FROM user_behavior";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>