<?php
    require_once('../../../config.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM TIPS WHERE T_ID = " . $id;
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {                                           // Checks if SQL query was successful or not                      
        die(print_r(sqlsrv_errors(), true));                         // Prints out detailed error message
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    $table = '';

    $TID = $row["T_ID"];
    $T_DES_ENG = $row["T_DESC_ENGLISH"];

    $C_ID = $row["C_ID"];
    $category_query = "SELECT C_NAME FROM CATEGORY WHERE C_ID = $C_ID";
    $category_result = sqlsrv_query($conn, $category_query);
    $category_row = sqlsrv_fetch_array($category_result);
    $C_NAME = $category_row["C_NAME"];

    $SUB_ID = $row["SUB_ID"];
    $subcategory_query = "SELECT SUB_NAME FROM SUBCATEGORY WHERE SUB_ID = $SUB_ID";
    $subcategory_result = sqlsrv_query($conn, $subcategory_query);
    $subcategory_row = sqlsrv_fetch_array($subcategory_result);
    $SUB_NAME = $subcategory_row["SUB_NAME"];

    $table .= '<h4>Tip ID: </h4><p>' . $TID . '</p>';
    $table .= '<h4>Tip Description: </h4><p>' . $T_DES_ENG . '</p>';
    $table .= '<h4>Tip Category: </h4><p>' . $C_NAME . '</p>';
    $table .= '<h4>Tip Sub-Category: </h4><p>' . $SUB_NAME . '</p>';

    echo $table;
?>