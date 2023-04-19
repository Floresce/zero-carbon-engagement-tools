<?php

require_once('database.php');

    $sql = "SELECT * FROM SUBCATEGORY";
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

// Check if any data was returned
if (count($rows) > 0) {
    // Start building the HTML table
    $table = '<table>';
    $table .= '<tr><th>Subcategory ID</th><th>Subcategory Name</th></tr>';

    // Loop through each row and append it to the table
    foreach ($rows as $row) {
        $subcategoryID = $row["SUB_ID"];
        $subcategoryName = $row["SUB_NAME"];

        $table .= '<tr>';
        $table .= '<td>' . $subcategoryID . '</td>';
        $table .= '<td>' . $subcategoryName . '</td>';
        $table .= '</tr>';
    }

    $table .= '</table>';

    // Output the table as the response
    echo $table;
} else {
    // No data was returned
    echo 'No results found.';
}
?>