<?php

$servername = "BOOKPRO";        // Subject to change depending on server name (Anne: DESKTOP-UK8K0FD, Leo: MineHarth)
$database = "master";                     // Subject to change depending on database name
$username = "admin";
$password = "admin";

$connectionInfo = array(
    "Database" => $database,
    "UID" => $username,
    "PWD" => $password
);
// sqlsrv_connect function is called to establish connection to Microsoft SQL Server database
$conn = sqlsrv_connect($servername, $connectionInfo);
if( $conn === false ) {
    echo "Connection could not be established.\n";
    die( print_r( sqlsrv_errors(), true));
}  

$ID = $_POST['ID'];

// Check if the tip ID exists in the database
$sql = "SELECT * FROM TIPS WHERE T_ID = ?";
$params = array($ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}

$rows = sqlsrv_has_rows($stmt);

if ($rows === false) {
    echo "Error: Tip with ID $ID does not exist.";
    exit;
}

// Delete the tip from the database
$sql = "DELETE FROM TIPS WHERE T_ID = ?";
$params = array($ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}
else{
    echo "Tip with ID $ID has been deleted";
}