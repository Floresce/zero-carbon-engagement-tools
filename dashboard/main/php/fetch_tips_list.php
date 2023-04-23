<?php
    require_once('config.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM TIPS WHERE T_ID = " . $id;
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {                                           // Checks if SQL query was successful or not                      
        die(print_r(sqlsrv_errors(), true));                         // Prints out detailed error message
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    echo $row["T_ID"];
?>