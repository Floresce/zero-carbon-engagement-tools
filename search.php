<?php
$serverName = "DESKTOP-VR2E7HE\\sqlexpress"; 
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

?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Energy Tips</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="app.js"></script>
        <script src="tips_script.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Navbar to have continous searching -->
    <body>
    <div id="navlist">
                <div class="search">
                    <form action="search.php" method = "POST" id = "search_form"> 
                        <input type=" text" placeholder=" Keyword Tip Search" name="query"/>
                        <button type="submit" value="Search">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <div id="results"></div>
                </div>
        </div> 
    </head>
     <!-- Button to return to Main Energy Savings Tip page -->
     <div><br><br>
        <button type="button" class="btn btn-primary" id= "Home" onclick="location.href='http://localhost/zero-carbon-engagement-tools/index.html'">Energy Savings Tips 
        </button>
    </div>
    <?php

    $query = $_POST['query'];
    //keyword must be at least 2 characters long
    $min_length = 2;

if (strlen($query) >= $min_length) {

    $query = htmlspecialchars($query);

    $parameters = array("%$query%", "%$query%");

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

// Checks whether the '$rows' array has any elements then the 'foreach' loop will execute
// 'foreach' loop iterates over each element of the '$rows' array, assigning each element to the variable '$row'
// Allows to access the values of the current row's columns (in the current iteration of the loop) using the keys of the '$row'(C_NAME, SUB_NAME, T_DESC_ENGLISH) array
if (count($rows) > 0) {
    foreach ($rows as $row) {
        $tipDescription = $row["T_DESC_ENGLISH"];
        $categoryName = $row["C_NAME"];
        $subcategoryName = $row["SUB_NAME"];
        $tipId = $row["T_ID"];

          
        

        //will print the following result on to search page
        // The '.=' operator concatenates strings in PHP
        $result = '<div class="tips">';     
        $result .= '<br><br><br><h2>' . $categoryName . ', ' . $subcategoryName . '</h2>';
        $result .= '<br><p>' . $tipDescription . '</p>';  
        $result .= '</div';                             
    
        echo $result;
        // if statement for each tip to display correct Primary link as a clickable button if any 
        // placement here also assures that a button will not appear for every single tip in the while loop 
        // despite not having a link
        if (!empty($row['PRIMARY_LINK'])) {
            echo ' <br> <form action="' . $row['PRIMARY_LINK'] . '"target="_blank">
                  <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                  </form> <br>';
        }    
} 
}  
else {
    echo "<script>alert('No results. Please try again');</script>";
    die(print_r(sqlsrv_errors(), true));
}

}

    sqlsrv_free_stmt($stmt);

} 
else {
    echo "<script>alert('Minimum keyword length is 2. Please try again');</script>";
}
?>

</body>
</html>
