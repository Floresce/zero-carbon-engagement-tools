<?php
/*
Windows Authentication, connect to the local server and specify the Tips database as the database in use. 
For example: $serverName = "localhost";
SQL Server Authentication, set values for the "UID" and "PWD" attributes in the $connectionInfo parameter. 
For example: $connectionInfo = array("UID" => $uid, "PWD" => $pwd, "Database"=>"Tips");
*/
$serverName = "MineHarth";
$connectionInfo = array( "Database"=>"master");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}
//-----------------------------------------------
// Execute a query to populate with tips


//make sure category and/or subcategory are selected.
if( isset($_POST['category'], $_POST['subcategory'])){
  
//All Categories and any/or all subcategories

  switch ($_POST['category'] . '-' . $_POST['subcategory']) {
    case 'All Categories-All Subcategories':
      $sql = "SELECT T_DESC_ENGLISH FROM TIPS";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Smart Home':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 1;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Habit Changing':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 2;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Washer & Dryer':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 3;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

    case 'All Categories-Dishwasher':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 4;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

    case 'All Categories-Refrigerator':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 5;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Electric Vehicles':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 6;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Appliances':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 7;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Maintenance':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 8;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Insulation & Sealing':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 9;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Pools & Spas':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 10;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Thermostat':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 11;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

    case 'All Categories-Fans':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 12;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Sealing':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 13;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-N/A':
      $sql = "SELECT * FROM TIPS t
      JOIN SUBCATEGORY s 
      ON t.SUB_ID = s.SUB_ID
      WHERE t.SUB_ID = 14;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

// Specific categories and all subcategories
    case 'Appliances-All Subcategories':
      $sql = "SELECT T_DESC_ENGLISH FROM TIPS t 
      JOIN CATEGORY c 
      ON t.C_ID = c.C_ID
      WHERE t.C_ID = 1;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
    
    case 'Around town-All Subcategories':
        $sql = "SELECT T_DESC_ENGLISH FROM TIPS t 
        JOIN CATEGORY c 
        ON t.C_ID = c.C_ID
        WHERE c.C_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
    
    case 'Around your home-All Subcategories':
        $sql = "SELECT T_DESC_ENGLISH FROM TIPS t 
        JOIN CATEGORY c 
        ON t.C_ID = c.C_ID
        WHERE t.C_ID = 3;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
    
    case 'Cooking-Habit Changing':
        $sql = "SELECT T_DESC_ENGLISH FROM TIPS t 
        JOIN CATEGORY c 
        ON t.C_ID = c.C_ID
        WHERE t.C_ID = 4;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Heating & Cooling-All Subcategories':
        $sql = "SELECT T_DESC_ENGLISH FROM TIPS t 
        JOIN CATEGORY c 
        ON t.C_ID = c.C_ID
        WHERE t.C_ID = 5;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
    
    case 'On Vacation-Habit Changing':
        $sql = "SELECT T_DESC_ENGLISH FROM TIPS t 
        JOIN CATEGORY c 
        ON t.C_ID = c.C_ID
        WHERE t.C_ID = 6;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

// Appliances and all its subcategories
    case 'Appliances-Smart Home':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 1 AND sc.SUB_ID = 1;";
        $stmt = sqlsrv_query($conn, $sql);    
        break;
        
    case 'Appliances-Habit Changing':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 1 AND sc.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);  
        break;
        
    case 'Appliances-Washer & Dryer':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 1 AND sc.SUB_ID = 3;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Appliances-Dishwasher':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 1 AND sc.SUB_ID = 4;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Appliances-Refrigerator':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 1 AND sc.SUB_ID = 5;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Appliances-N/A':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 1 AND sc.SUB_ID = 14;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

//Around town and all its subcategories        
    case 'Around town-Habit Changing':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 2 AND sc.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Around town-Electric Vehicles':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 2 AND sc.SUB_ID = 6;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Around town-N/A':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 2 AND sc.SUB_ID = 14;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

//Around your home and all its subcategories
    case 'Around your home-Appliances':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 3 AND sc.SUB_ID = 7;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Maintenance':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 3 AND sc.SUB_ID = 8;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Around your home-Insulation & Sealing':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 3 AND sc.SUB_ID = 9;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Habit Changing':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 3 AND sc.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Sealing':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 3 AND sc.SUB_ID = 13;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Pools & Spas':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 3 AND sc.SUB_ID = 10;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

//Heating & Cooling and all of its subcategories
    case 'Heating & Cooling-Thermostat':
        $sql = "SELECT DISTINCT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 5 AND sc.SUB_ID = 11;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Heating & Cooling-Fans':
        $sql = "SELECT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 5 AND sc.SUB_ID = 12;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Heating & Cooling-Maintenance':
        $sql = "SELECT DISTINCT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 5 AND sc.SUB_ID = 8;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Heating & Cooling-Appliances':
        $sql = "SELECT DISTINCT T_DESC_ENGLISH, C_NAME, SUB_NAME FROM TIPS t
        JOIN TIP_SEASON ts ON
        t.T_ID = ts.T_ID
        JOIN CATEGORY c ON
        c.C_ID = t.C_ID 
        JOIN SUBCATEGORY sc ON
        sc.SUB_ID = t.SUB_ID
        WHERE c.C_ID = 5 AND sc.SUB_ID = 7;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    default:
      // do nothing
  }
  
  // Retrieve database information
  while( $row = sqlsrv_fetch_array( $stmt)) {
    echo $row["T_DESC_ENGLISH"]. str_repeat('<br><br>', 1);
  }

  /* Free statement and connection resources. */  
  sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn); 
}
if (isset($_POST['function_name']) && function_exists($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  $arguments = $_POST['arguments'];
  $result = call_user_func_array($function_name, $arguments);
  echo $result;
}
function addLike($tID) {
  $sql = "UPDATE TIP_FEEDBACK SET TIP_LIKES = TIP_LIKES+1 WHERE T_ID = $tID";
  $result = sqlsrv_query($conn,$sql) or die(sqlsrv_errors());
}

function addDislike($tID) {
  $sql = "UPDATE TIP_FEEDBACK SET TIP_DISLIKES = TIP_DISLIKES+1 WHERE T_ID = $tID";
  $result = sqlsrv_query($conn,$sql) or die(sqlsrv_errors());
}

function getLikes($tID){
  $sql = "SELECT TIP_LIKES FROM TIP_FEEDBACK WHERE T_ID = $tID";
  $result = sqlsrv_query($conn,$sql) or die(sqlsrv_errors());
  return $result;
}

function getDislikes($tID){
  $sql = "SELECT TIP_DISLIKES FROM TIP_FEEDBACK WHERE T_ID = $tID";
  $result = sqlsrv_query($conn,$sql) or die(sqlsrv_errors());
  return $result;
}
?>
