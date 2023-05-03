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

    $sql = "SELECT * FROM TIPS";
    $stmt = sqlsrv_query($conn, $sql);

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


    $sql = "SELECT SUB_NAME FROM SUBCATEGORY";
    $stmt = sqlsrv_query($conn, $sql);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    
    // Create the dropdown menu
    echo '<select name="sub_category">';
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '<option value="' . $row['SUB_NAME'] . '">' . $row['SUB_NAME'] . '</option>';
    }
    echo '</select>';
    
    // Close the database connection
    sqlsrv_close($conn);
    ?>