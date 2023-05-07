<?php
require_once('../../../config.php');

// Execute query to retrieve data from TIPS and TIPS_FEEDBACK table
$tips_query = "
SELECT T.T_ID, T.T_DESC_ENGLISH, T.C_ID, T.SUB_ID, TF.TIP_LIKES, TF.TIP_DISLIKES, TF.TIP_ADDTOPLAN
FROM TIPS T
JOIN TIP_FEEDBACK TF
ON T.T_ID = TF.T_ID;
";
$tips_stmt = sqlsrv_query($conn, $tips_query);
if ($tips_stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
$tips_data = array();
while ($row = sqlsrv_fetch_array($tips_stmt, SQLSRV_FETCH_ASSOC)) {
    $tips_data[] = $row;
}

$data = array();
foreach ($tips_data as $row) {
    $T_ID = $row["T_ID"];

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

    $TIP_LIKES = $row["TIP_LIKES"];

    $TIP_DISLIKES = $row["TIP_DISLIKES"];

    $TIP_ADDTOPLAN = $row["TIP_ADDTOPLAN"];

    $data[] = $row;
}

echo json_encode(array("data" => $data));

sqlsrv_close($conn);
?>