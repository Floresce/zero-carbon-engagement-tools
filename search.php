<?php
// Database connection
include 'config.php';

//request both GET and POST requests
$query = isset($_REQUEST['query']) ? $_REQUEST['query'] : '';

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
    $count = count($rows);
    $title = "";
    $title .= 'Search results for "<span style="background-color: #fcf8e3">' . $query . '</span>" returned the following '. $count . ' results';
    echo '<div id="title" style="text-align: center;"><p>' . $title . '</p></div><br>'; 
    
    foreach ($rows as $row) {
        $tipDescription = $row["T_DESC_ENGLISH"];
        //highlight feature that will highlight the keyword regardless of case sensitivity
        //stripos finds the postion of the first occurence of the case-insensitive 'query'
        $pos = stripos($tipDescription, $query);
        //while loop to find/highlight all matches in a description 
        while ($pos !== false) {
            $match = substr($tipDescription, $pos, strlen($query));
            $highlighted = '<span style="background-color: #fcf8e3">' . $match . '</span>';
            $tipDescription = substr_replace($tipDescription, $highlighted, $pos, strlen($query));
            
            $pos = stripos($tipDescription, $query, $pos + strlen($highlighted));
        }
        $categoryName = $row["C_NAME"];
        $subcategoryName = $row["SUB_NAME"];
        $tipId = $row["T_ID"];
        
        
        $result = '<div class="row" style="margin-bottom: 40px;">
        <div class="col-md-6">
            <img src="img/Appliance.jpg" alt="Appliance" width="90%" height="auto">
        </div>
        <div class="col-md-6">
            <h2>' . $categoryName . ', ' . $subcategoryName . '</h2>
            <br><p>' . $tipDescription . '</p>';


        //if statement for each tip to display correct Primary link as a clickable button if any
        if (!empty($row['PRIMARY_LINK'])) {
            $result .= '<form action="' . $row['PRIMARY_LINK'] . '"target="_blank">
            <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
            </form> <br>';
        } 
        
        $result .= '</div></div>';
        echo $result;
        $json_result = json_encode($rows);
     
    }
}
  
else {
    echo 'No results found for "' . $query . '".';
   // echo "No results. Please try again";
    die(print_r(sqlsrv_errors(), true));
}

}

 
//Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

}
else {
    echo "Please enter at least 3 characters to perform a search.";
}

?>
