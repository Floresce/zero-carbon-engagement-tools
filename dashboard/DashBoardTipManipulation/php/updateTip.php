<?php

require_once('database.php');

// Get T_ID to edit from POST data
$T_ID = $_POST['Tid'];

// Get Category ID from C_NAME
$C_NAME = $_POST['Category'];
$sql = "SELECT C_ID FROM CATEGORY WHERE C_NAME = ?";
$params = array($C_NAME);
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
if (!$row) {
    // Alert if category name does not exist
    echo "Category name does not match any category";
    exit;
}
$C_ID = $row['C_ID'];

// Get Subcategory ID from SUB_NAME
$SUB_NAME = $_POST['Subcategory'];
$sql = "SELECT SUB_ID FROM SUBCATEGORY WHERE SUB_NAME = ?";
$params = array($SUB_NAME);
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    echo "Subcategory does not match";
    exit;
}
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
if (!$row) {
    // Alert if category name does not exist
    echo "SUBCATEGORY name does not match any category";
    exit;
}
$SUB_ID = $row['SUB_ID'];

// Update TIP with matching T_ID
$T_DESC_ENGLISH = $_POST['ENdescription'];
$T_DESC_SPANISH = $_POST['ESdescription'];
$RATE = $_POST['Rate'];
$PRIMARY_LINK = $_POST['PLinks'];
$SECONDARY_LINK = $_POST['SLinks'];

$sql = "UPDATE TIPS SET T_DESC_ENGLISH = ?, T_DESC_SPANISH = ?, RATE = ?, PRIMARY_LINK = ?, SECONDARY_LINK = ?, C_ID = ?, SUB_ID = ? WHERE T_ID = ?";
$params = array($T_DESC_ENGLISH, $T_DESC_SPANISH, $RATE, $PRIMARY_LINK, $SECONDARY_LINK, $C_ID, $SUB_ID, $T_ID);
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
} else {
    echo "Your Tip Has Been Edited";
}
?> 
