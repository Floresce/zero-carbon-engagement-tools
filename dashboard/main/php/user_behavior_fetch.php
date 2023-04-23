<?php
require_once('config.php');

// Load SQL query from file
$sql = "SELECT * FROM TIPS";

// Execute query
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$data = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}

$data2 = array();

foreach ($data as $row) {

    $T_DES_ENG = $row["T_DESC_ENGLISH"];
    $T_DES_ENG_WORDS = explode(" ", $T_DES_ENG);
    $T_DES_ENG_SHORT = implode(" ", array_slice($T_DES_ENG_WORDS, 0, 10));
    $row["T_DESC_ENGLISH"];

    // Get category name based on C_ID from the CATEGORY table
    $C_ID = $row["C_ID"];
    $category_query = "SELECT C_NAME FROM CATEGORY WHERE C_ID = $C_ID";
    $category_result = sqlsrv_query($conn, $category_query);
    $category_row = sqlsrv_fetch_array($category_result);
    $C_NAME = $category_row["C_NAME"];
    $row["C_ID"] = $C_NAME;
    
    // Get subcategory name based on SUB_ID from the SUBCATEGORY table
    $SUB_ID = $row["SUB_ID"];
    $subcategory_query = "SELECT SUB_NAME FROM SUBCATEGORY WHERE SUB_ID = $SUB_ID";
    $subcategory_result = sqlsrv_query($conn, $subcategory_query);
    $subcategory_row = sqlsrv_fetch_array($subcategory_result);
    $SUB_NAME = $subcategory_row["SUB_NAME"];
    $row["SUB_ID"] = $SUB_NAME;

    $data2[] = $row;
}

echo json_encode(array("data" => $data2));

sqlsrv_close($conn);
?>