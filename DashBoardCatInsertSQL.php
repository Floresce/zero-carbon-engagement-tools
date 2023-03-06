<?php
if (isset($_POST['submit'])) {
    // Get the category from the form data

    $servername = "DESKTOP-UK8K0FD";        // Subject to change depending on server name
    $database = "Tips";                     // Subject to change depending on database name
    $username = "";
    $password = "";
    
    $connectionInfo = array(
        "Database" => $database,
        "UID" => $username,
        "PWD" => $password
    );
} 
    // sqlsrv_connect function is called to establish connection to Microsoft SQL Server database
    $conn = sqlsrv_connect($servername, $connectionInfo);
    
    if( $conn === false ) {
        echo "Connection could not be established.\n";
        die( print_r( sqlsrv_errors(), true));
    }  
  
if (isset($_POST['submitCAT'])) {

  $res_student = mysql_query("SELECT student_id FROM $tbl_name WHERE student_id='$student_id' LIMIT 1 ") or die(mysql_error());
  if($row_student = mysql_fetch_assoc($res_student))
  {
      $error1 = "Record is already exists ... ";
  }
  else
  {
      $student = mysql_query("INSERT INTO $tbl_name (student_id, comp_name, comp_supervisor, comp_tel, comp_address, comp_city, intake_date, ass_status) VALUES('".$student_id."','".$comp_name."','".$comp_supervisor."','".$comp_tel."','".$comp_address."','".$comp_city."','".$intake_date."','".$ass_status."')") or die("Query failed:4 ".mysql_error());
      $error1=" Record has been added... ";
  }   

  // Construct the query and execute it
  $sql = "INSERT INTO category (c_name) VALUES ('$category')";
  if (mysqli_query($conn, $sql)) {
    echo "Category added successfully";
  } else {
    echo "Error adding category: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
if (isset($_POST['submitSUB'])) {

    // Construct the query and execute it
    $sql = "INSERT INTO subcategory (sub_name) VALUES ('$category')";
    if (mysqli_query($conn, $sql)) {
      echo "Subcategory added successfully";
    } else {
      echo "Error adding subcategory: " . mysqli_error($conn);
    }
  
    mysqli_close($conn);
  }

if (isset($_POST['deleteCAT'])) {

    // Construct the query and execute it
    $sql = "DELETE FROM category (c_name) VALUES ('$category')";
    if (mysqli_query($conn, $sql)) {
      echo "Category removed successfully";
    } else {
      echo "Error removing category: " . mysqli_error($conn);
    }
  
    mysqli_close($conn);
  }
if (isset($_POST['deleteSUB'])) {

    // Construct the query and execute it
    $sql = "DELETE FROM subcategory (sub_name) VALUES ('$category')";
    if (mysqli_query($conn, $sql)) {
      echo "Sub category removed successfully";
    } else {
      echo "Error removing subcategory: " . mysqli_error($conn);
    }
  
    mysqli_close($conn);
  }
/?>
