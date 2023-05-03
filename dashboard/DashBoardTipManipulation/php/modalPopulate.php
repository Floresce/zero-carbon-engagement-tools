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

// Check if any data was returned
if (count($rows) > 0) {
    // Start building the HTML table
    $table = '<table>';
    $table .= '<tr><th> ID </th><th> TIP DESCRIPTION (10 words) </th><th> SPANISH DESC (10 words) </th><th> RATE </th><th> TIP CATEGORY </th><th> SUB CATEGORY </th></tr>';

    foreach ($rows as $row) {
        $TID = $row["T_ID"];
        $T_DES_ENG = $row["T_DESC_ENGLISH"];
        $T_DES_ENG_WORDS = explode(" ", $T_DES_ENG);
        $T_DES_ENG_SHORT = implode(" ", array_slice($T_DES_ENG_WORDS, 0, 10));
        $T_DES_SPA = $row["T_DESC_SPANISH"];
        $T_DES_SPA_WORDS = explode(" ", $T_DES_SPA);
        $T_DES_SPA_SHORT = implode(" ", array_slice($T_DES_SPA_WORDS, 0, 10));
        $RATE = $row["RATE"];
        
        // Get category name based on C_ID from the CATEGORY table
        $C_ID = $row["C_ID"];
        $category_query = "SELECT C_NAME FROM CATEGORY WHERE C_ID = $C_ID";
        $category_result = sqlsrv_query($conn, $category_query);
        $category_row = sqlsrv_fetch_array($category_result);
        $C_NAME = $category_row["C_NAME"];
        
        // Get subcategory name based on SUB_ID from the SUBCATEGORY table
        $SUB_ID = $row["SUB_ID"];
        $subcategory_query = "SELECT SUB_NAME FROM SUBCATEGORY WHERE SUB_ID = $SUB_ID";
        $subcategory_result = sqlsrv_query($conn, $subcategory_query);
        $subcategory_row = sqlsrv_fetch_array($subcategory_result);
        $SUB_NAME = $subcategory_row["SUB_NAME"];
        
        $table .= '<tr>';
        $table .= '<td>' . str_pad($TID, 2, '0', STR_PAD_LEFT) . ' |</td>';
        $table .= '<td>' . $T_DES_ENG_SHORT . '</td>';
        $table .= '<td>' . $T_DES_SPA_SHORT . '</td>';
        $table .= '<td>' . $RATE . '</td>';
        $table .= '<td>' . $C_NAME . '</td>';
        $table .= '<td>' . $SUB_NAME . '</td>';
        $table .= '<td><button class="edit-btn" data-id="' . $TID . '">Edit</button></td>';
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