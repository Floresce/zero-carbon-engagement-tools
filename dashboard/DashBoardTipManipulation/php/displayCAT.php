<?php

require_once('../../../config.php');


if ($conn === false) {
    echo "Connection could not be established.\n";
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT * FROM CATEGORY";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {                       
    die(print_r(sqlsrv_errors(), true));
}

// Retrieve database information
$rows = array(); 
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) { // While loop fetches current row as '$row', the loop stops when there are no more rows to fetch
    if ($row !== null) { 
        $rows[] = $row; 
    }
}

// Check if any data was returned
if (count($rows) > 0) {
    // Start building the HTML table
    $table = '<table>';
    $table .= '<tr><th>CATEGORY ID</th><th>CATEGORY Name</th></tr>';

    // Loop through each row and append it to the table
    foreach ($rows as $row) {
        $categoryID = $row["C_ID"];
        $categoryName = $row["C_NAME"];

        $table .= '<tr>';
        $table .= '<td>' . $categoryID . '</td>';
        $table .= '<td>' . $categoryName . '</td>';
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