<?php

require_once('database.php');

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