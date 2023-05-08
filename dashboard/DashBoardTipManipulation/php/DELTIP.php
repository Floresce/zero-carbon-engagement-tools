<?php
require_once('../../../config.php');


$T_ID = $_POST['Tid'];

// delete feedback 
$sql = "DELETE FROM TIP_FEEDBACK WHERE T_ID = ?";
$params = array($T_ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}
// delete comments, necessary for sql logic
$sql = "DELETE FROM TIP_COMMENT WHERE T_ID = ?";
$params = array($T_ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}

// Delete the tip from the database
$sql = "DELETE FROM TIPS WHERE T_ID = ?";
$params = array($T_ID);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
} else {
    echo "Tip with ID $T_ID has been deleted along with feedback and comments ";
}