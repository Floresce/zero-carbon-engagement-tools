<?php

$servername = "MineHarth";        // Subject to change depending on server name (Anne: DESKTOP-UK8K0FD, Leo: MineHarth)
$database = "Tips";                     // Subject to change depending on database name
$username = "";
$password = "";

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


// Retrieve categories
$query = "SELECT DISTINCT C_NAME FROM CATEGORY;";
$stmt = sqlsrv_query($conn, $query);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$categories = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $categories[] = $row['C_NAME'];
}

// Retrieve subcategories
$query = "SELECT DISTINCT SUB_NAME FROM SUBCATEGORY;";
$stmt = sqlsrv_query($conn, $query);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$allsub = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $allsub[] = $row['SUB_NAME'];
}

// Retrieve subcategories for each category
$subcategories = array();
foreach ($categories as $category) {
    $query = "  SELECT DISTINCT SUB_NAME 
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID  
                WHERE C_NAME = '$category';";
    $stmt = sqlsrv_query($conn, $query);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $subcategoryList = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $subcategoryList[] = $row['SUB_NAME'];
    }

    $subcategories[$category] = $subcategoryList;
}

// Send categories and subcategories as JSON
$result = array('categories' => $categories, 'subcategories' => $subcategories, 'allsub' => $allsub);
echo json_encode($result);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

?>
