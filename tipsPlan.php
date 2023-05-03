<?php
// Database connection
include 'config.php';

$tipId = 0;

//NEW (05/01/23)- updated the query to now get the cat name and sub cat name
// Prepare and execute SQL statement with variable
$sql = "SELECT *  
FROM dbo.TIPS, dbo.CATEGORY, dbo.SUBCATEGORY  WHERE T_ID = ?";
$stmt = sqlsrv_prepare($conn, $sql, array(&$tipId));

if( !$stmt ) {
    die( print_r( sqlsrv_errors(), true));
}

$tipId = $_GET['tipId'];


sqlsrv_execute($stmt);

// SQL query error check
if ($stmt === false) {                                           // Checks if SQL query was successful or not                      
    die(print_r(sqlsrv_errors(), true));                         // Prints out detailed error message
}

// Retrieve database information
$rows = array();                                                 // Creates empty array called '$rows'
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {   // While loop fetches current row as '$row', the loop stops when there are no more rows to fetch
    if ($row !== null) {                                         // Makes sure only non-null rows are added to the array
        $rows[] = $row;                                          // '$row' array is appended to '$rows'
  }                                                      
}

// Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn); 

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($rows);
?>