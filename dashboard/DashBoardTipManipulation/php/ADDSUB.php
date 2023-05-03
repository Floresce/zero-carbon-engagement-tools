<?php

require_once('database.php');

// Get the current maximum COMMENT_SEQ value for the given T_ID
    $sql = "SELECT MAX(SUB_ID) AS max_seq FROM SUBCATEGORY";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }
    
    // Get max ID from collum code repurposed from TIPS.php, credits to Ann
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $maxSeq = $row['max_seq'];
    $name = $_POST['name'];

    $newSeq = $maxSeq + 1;
    $sql = "INSERT INTO SUBCATEGORY(SUB_ID, SUB_NAME) VALUES (?,?)";
    $params = array($newSeq, $name);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }
    else{
        echo" Your Sub-Category Has Been Added";
    }
    
?>