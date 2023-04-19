<?php
$serverName = "programmadelic.database.windows.net"; 
//serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"Tips");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     //echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br /><br />";
     die( print_r( sqlsrv_errors(), true));
}

$query = $_POST['query'];
//keyword must be at least 3 characters long
$min_length = 3;

if (strlen($query) >= $min_length) {

$query = htmlspecialchars($query);

$parameters = array("%$query%");

//Use of prepared statment to help prevent SQL injection
$sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
          FROM TIPS T
          JOIN CATEGORY C ON T.C_ID = C.C_ID
          JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
          WHERE T_DESC_ENGLISH LIKE ?";

$stmt = sqlsrv_prepare($conn, $sql, $parameters);

if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}


if (sqlsrv_execute($stmt)) {

    // $results = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $rows = array();                                                 // Creates empty array called '$rows'
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {   // While loop fetches current row as '$row', the loop stops when there are no more rows to fetch
            if ($row !== null) {                                         // Makes sure only non-null rows are added to the array
                $rows[] = $row;                                          // '$row' array is appended to '$rows'
}                                                      
}


if (count($rows) > 0) {
    $search_results = "";
    foreach ($rows as $row) {
        $tipDescription = $row["T_DESC_ENGLISH"];
        $categoryName = $row["C_NAME"];
        $subcategoryName = $row["SUB_NAME"];
        $tipId = $row["T_ID"];

        $result = '<div class="tips">';     
        $result .= '<h2>' . $categoryName . ', ' . $subcategoryName . '</h2>';
        $result .= '<br><p>' . $tipDescription . '</p>'; 
        
        //if statement for each tip to display correct Primary link as a clickable button if any
        if (!empty($row['PRIMARY_LINK'])) {
            $result .= '<br><form action="' . $row['PRIMARY_LINK'] . '" target="_blank">';
            $result .= '<button type="submit" id="link" class="btn btn-default">Instant Rebate</button>';
            $result .= '</form><br>';
        }
        $result .= '</div>';
        
        //search_results will be used to send results to result.html
        $search_results .= $result;

    }
}

//Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

}

    //search results will be passed as a query parameter in the URL
    header("Location: results.html?search_results=" . urlencode($search_results));
    exit(); // Stop the script execution after sending the header
}
?>
