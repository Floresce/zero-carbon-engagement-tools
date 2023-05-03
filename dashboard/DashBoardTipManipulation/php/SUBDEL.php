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
     
     $name = $_POST['name'];
     
     // Check if category exists
     $sql_check = "SELECT COUNT(*) AS count FROM SUBCATEGORY WHERE SUB_NAME = '$name'";
     $stmt_check = sqlsrv_query($conn, $sql_check);
     if ($stmt_check === false) {
         echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
         exit;
     }
     $row_check = sqlsrv_fetch_array($stmt_check, SQLSRV_FETCH_ASSOC);
     $count = $row_check['count'];
     
     if ($count == 0) {
         echo "Category does not exist.";
     } else {
         // Delete category
         $sql = "DELETE FROM SUBCATEGORY WHERE SUB_NAME = '$name'";
         $stmt = sqlsrv_query($conn, $sql);
         if ($stmt === false) {
             echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
             exit;
         }
         else{
             echo "Removed from Sub-category";
         }
     }
    
?>