<?php
// Database connection
include 'config.php';

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
