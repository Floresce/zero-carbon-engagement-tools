<?php

require_once('database.php');

    // Get max ID from collum code repurposed from TIPS.php, credits to Ann
    $sql = "SELECT MAX(C_ID) AS max_seq FROM CATEGORY";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $maxSeq = $row['max_seq'];
    $name =$_POST['name'];
    $newSeq = $maxSeq + 1;

    $sql = "INSERT INTO CATEGORY(C_ID, C_NAME) VALUES (?,?)";
    $params = array($newSeq, $name);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }
    else{
        echo" Your Tip Has Been Added";
    }




?>
