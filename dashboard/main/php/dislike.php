<?php
require_once('config.php');

$id = $_GET["id"];

// Update the TIPS table with the corresponding T_ID value
$sql = "UPDATE TIPS SET DISLIKES = DISLIKES + 1 WHERE T_ID = " . $id . ";";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {                                           // Checks if SQL query was successful or not                      
    die(print_r(sqlsrv_errors(), true));                         // Prints out detailed error message
}

// Close the database connection
sqlsrv_close($conn);

// Return a success message to the AJAX call
echo "Tip 1 is liked!";
?>
