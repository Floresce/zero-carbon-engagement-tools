<?php


require_once('database.php');

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