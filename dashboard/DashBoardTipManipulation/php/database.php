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

?>