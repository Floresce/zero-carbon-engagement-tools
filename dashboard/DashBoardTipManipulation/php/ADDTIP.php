<?php
require_once('../../../config.php');


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

// Insert TIP with C_ID and SUB_ID
$sql = "SELECT MAX(T_ID) AS max_seq FROM TIPS";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}

// Get max ID from collum code repurposed from TIPS.php, credits to Ann
$sql = "SELECT MAX(T_ID) AS max_seq FROM TIPS";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
$maxSeq = $row['max_seq'];
$newSeq = $maxSeq + 1;
$newSeqF = $maxSeq + 1;
$T_DESC_ENGLISH = $_POST['ENdescription'];
$T_DESC_SPANISH = $_POST['ESdescription'];
$RATE = $_POST['Rate'];
$PRIMARY_LINK = $_POST['PLinks'];
$SECONDARY_LINK = $_POST['SLinks'];

$sql = "INSERT INTO TIPS(T_ID, T_DESC_ENGLISH ,T_DESC_SPANISH, RATE, PRIMARY_LINK, SECONDARY_LINK, C_ID, SUB_ID) VALUES (?,?,?,?,?,?,?,?)";
$params = array($newSeq, $T_DESC_ENGLISH, $T_DESC_SPANISH, $RATE, $PRIMARY_LINK, $SECONDARY_LINK, $C_ID, $SUB_ID);
$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
} else {
    echo " Your Tip Has Been Added";
}


$sql_feedback = "INSERT INTO TIP_FEEDBACK(T_ID, TIP_LIKES, TIP_DISLIKES) VALUES (?,?,?)";
$params_feedback = array($newSeqF, 0, 0);
$stmt_feedback = sqlsrv_query($conn, $sql_feedback, $params_feedback);

// Check if the SQL statement for TIP_FEEDBACK executed successfully
if ($stmt_feedback === false) {
    echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
    exit;
}

?>