<?php

$servername = "BOOKPRO";        // Subject to change depending on server name (Anne: DESKTOP-UK8K0FD, Leo: MineHarth)
$database = "master";                     // Subject to change depending on database name
$username = "admin";
$password = "admin";

$connectionInfo = array(
    "Database" => $database,
    "UID" => $username,
    "PWD" => $password
);
 // sqlsrv_connect function is called to establish connection to Microsoft SQL Server database
$conn = sqlsrv_connect($servername, $connectionInfo);
    
    if( $conn === false ) {
        echo "Connection could not be established.\n";
        die( print_r( sqlsrv_errors(), true));
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
    $T_DESC_ENGLISH = $_POST['ENdescription'];
    $T_DESC_SPANISH = $_POST['ESdescription'];
    $RATE = $_POST['Rate'];
    $PRIMARY_LINK = $_POST['PLinks'];
    $SECONDARY_LINK = $_POST['SLinks'];

    $sql = "INSERT INTO TIPS(T_ID, T_DESC_ENGLISH ,T_DESC_SPANISH, RATE, PRIMARY_LINK, SECONDARY_LINK) VALUES (?,?,?,?,?,?)";
    $params = array($newSeq, $T_DESC_ENGLISH, $T_DESC_SPANISH, $RATE, $PRIMARY_LINK, $SECONDARY_LINK);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }




?>
