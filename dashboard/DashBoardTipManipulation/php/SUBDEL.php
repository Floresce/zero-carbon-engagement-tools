<?php

require_once('database.php');
     
     $name = $_POST['name'];
     
     // Check if category exists
     $sql_check = "SELECT COUNT(*) AS count FROM SUBCATEGORY WHERE SUB_NAME = '$name'";
     $stmt_check = sqlsrv_query($conn, $sql_check);
     if ($stmt_check === false) {
         echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
         exit;
     }
     $row_check = sqlsrv_fetch_array($stmt_check, SQLSRV_FETCH_ASSOC);
     $count = $row_check['count'];
     
     if ($count == 0) {
         echo "Category does not exist.";
     } else {
         // Delete category
         $sql = "DELETE FROM SUBCATEGORY WHERE SUB_NAME = '$name'";
         $stmt = sqlsrv_query($conn, $sql);
         if ($stmt === false) {
             echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
             exit;
         }
         else{
             echo "Removed from Sub-category";
         }
     }
    
?>