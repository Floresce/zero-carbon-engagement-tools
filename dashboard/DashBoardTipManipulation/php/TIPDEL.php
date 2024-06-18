<?php

require_once('database.php');

$T_ID = $_POST['Tid'];



// Delete the tip from the database
$sql = "DELETE FROM TIPS WHERE T_ID = ?";
$params = array($T_ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}
else{
    echo "Tip with ID $T_ID has been deleted";
}