<?php

$servername = "BOOKPRO";        // Subject to change depending on server name (Anne: DESKTOP-UK8K0FD, Leo: MineHarth)
$database = "master";                     // Subject to change depending on database name
$username = "admin";
$password = "admin";

$connectionOptions = array(
    "Database" => $database,
    "UID" => $username, 
    "PWD" => $password
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn == false)
    die(FormatErrors(sqlsrv_errors()));

if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}
?>