<!-- This is a PHP script that establishes a connection to a Microsoft SQL Server database,
     retrieves information from the database, and displays it on a webpage. -->
<?php
$servername = "DESKTOP-UK8K0FD";        // Subject to change depending on server name (Anne: DESKTOP-UK8K0FD, Leo: MineHarth)
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

//-----------------------------------------------
//-----------------------------------------------
//-----------------------------------------------

// Execute SQL queries to populate with tips

// Makes sure category and/or subcategory are selected.
if( isset($_POST['category'], $_POST['subcategory'])){
  
// All Categories and any/or all subcategories
  switch ($_POST['category'] . '-' . $_POST['subcategory']) {
    case 'All Categories-All Subcategories':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Smart Home':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 1;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Habit Changing':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 2;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Washer & Dryer':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 3;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

    case 'All Categories-Dishwasher':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 4;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

    case 'All Categories-Refrigerator':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 5;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Electric Vehicles':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 6;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Appliances':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 7;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Maintenance':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 8;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Insulation & Sealing':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 9;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Pools & Spas':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 10;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
      
    case 'All Categories-Thermostat':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 11;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

    case 'All Categories-Fans':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 12;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-Sealing':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 13;";
      $stmt = sqlsrv_query($conn, $sql);
      break;

    case 'All Categories-N/A':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.SUB_ID = 14;";
      $stmt = sqlsrv_query($conn, $sql);
      break;      

// Specific categories and all subcategories
    case 'Appliances-All Subcategories':
      $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
              FROM TIPS T
              JOIN CATEGORY C ON T.C_ID = C.C_ID
              JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
              WHERE T.C_ID = 1;";
      $stmt = sqlsrv_query($conn, $sql);
      break;
    
    case 'Around town-All Subcategories':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE C.C_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
    
    case 'Around your home-All Subcategories':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE T.C_ID = 3;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
    
    case 'Cooking-Habit Changing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE T.C_ID = 4;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Heating & Cooling-All Subcategories':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE T.C_ID = 5;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
    
    case 'On Vacation-Habit Changing':
        $sql = "SELECT T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE T.C_ID = 6;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

// Appliances and all its subcategories
    case 'Appliances-Smart Home':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 1 AND S.SUB_ID = 1;";
        $stmt = sqlsrv_query($conn, $sql);    
        break;
        
    case 'Appliances-Habit Changing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 1 AND S.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);  
        break;
        
    case 'Appliances-Washer & Dryer':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 1 AND S.SUB_ID = 3;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Appliances-Dishwasher':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 1 AND S.SUB_ID = 4;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Appliances-Refrigerator':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 1 AND S.SUB_ID = 5;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Appliances-N/A':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 1 AND S.SUB_ID = 14;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

// Around town and all its subcategories        
    case 'Around town-Habit Changing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 2 AND S.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Around town-Electric Vehicles':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
               WHERE C.C_ID = 2 AND S.SUB_ID = 6;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Around town-N/A':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 2 AND S.SUB_ID = 14;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

// Around your home and all its subcategories
    case 'Around your home-Appliances':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 7;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Maintenance':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 8;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Around your home-Insulation & Sealing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 9;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Habit Changing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Sealing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 13;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around your home-Pools & Spas':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 10;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

// Heating & Cooling and all of its subcategories
    case 'Heating & Cooling-Thermostat':
        $sql = "SELECT DISTINCT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 5 AND S.SUB_ID = 11;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Heating & Cooling-Fans':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 5 AND S.SUB_ID = 12;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Heating & Cooling-Maintenance':
        $sql = "SELECT DISTINCT T.T_ID, T.T_DESC_ENGLISH, C.C_NAME, S.SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 5 AND S.SUB_ID = 8
                ORDER BY T.T_ID ASC";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    case 'Heating & Cooling-Appliances':
        $sql = "SELECT DISTINCT T.T_ID, T.T_DESC_ENGLISH, C.C_NAME, S.SUB_NAME, PRIMARY_LINK 
                FROM TIPS T 
                JOIN CATEGORY C ON T.C_ID = C.C_ID 
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID 
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID 
                WHERE C.C_ID = 5 AND S.SUB_ID = 7 
                ORDER BY T.T_ID ASC";
        $stmt = sqlsrv_query($conn, $sql);
        break;

    default:
      // do nothing
  }

// SQL query error check
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

// Checks whether the '$rows' array has any elements then the 'foreach' loop will execute
// 'foreach' loop iterates over each element of the '$rows' array, assigning each element to the variable '$row'
// Allows to access the values of the current row's columns (in the current iteration of the loop) using the keys of the '$row'(C_NAME, SUB_NAME, T_DESC_ENGLISH) array
if (count($rows) > 0) {
    foreach ($rows as $row) {
        $categoryName = $row["C_NAME"];
        $subcategoryName = $row["SUB_NAME"];
        $tipDescription = $row["T_DESC_ENGLISH"];
        $tipId = $row["T_ID"];
        
        

        // The '.=' operator concatenates strings in PHP
        $result = '<div class="tip">';
        $result .= '<h2>' . $categoryName . ', ' . $subcategoryName . '</h2>';      // Generates HTML markup that displays
        $result .= '<p>' . $tipDescription . '</p>';                                // the categoryName, subcategoryName, and the tipDescription     
        $result .= '</div>';
        
        echo $result;

        // if statement for each tip to display correct Primary link as a clickable button if any 
        // placement here also assures that a button will not appear for every single tip in the while loop 
        // despite not having a link
        if (!empty($row['PRIMARY_LINK'])) {
            echo ' <br> <form action="' . $row['PRIMARY_LINK'] . '"target="_blank">
                  <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                  </form> <br>';
        }
        
        $result2 = '<div class="btnfeedback">';
        $result2 .= '<p class="d-inline-flex align-items-center mb-0">Was this information helpful?';

        echo '<link rel="stylesheet" href="style.css?v=1.1">';    // Version control parameter that can be used to force the browser to load the latest version of the stylesheet file
        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">';   // Enables use of thumbs up/down icons

        // id="likeBtn-' . $tipId . '" sets the id attribute of the button to a unique string that includes the tips's ID, T_ID
        // i.e. likeBtn-12 corresponds to the like button for tip 12
        $result2 .= '<button id="likeBtn-' . $tipId . '" class="btn btn-success likeBtn" style="margin-left: 1em;"><i class="bi bi-hand-thumbs-up"></i></button>';
        $result2 .= '<button id="dislikeBtn-' . $tipId . '" class="btn btn-danger dislikeBtn"><i class="bi bi-hand-thumbs-down"></i></button>';

        // Creates a modal that acts as a hyperlink
        $result2 .= '<a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#commentModal-'. $tipId .'" style="margin-left: 1em;">Comment</a>';
        $result2 .= '</p></div>';
          
        echo $result2;
        
        // Includes the code for the modal element
        include 'comment_modal.php';

        // Add button to add to plan
        $result3 = '<div id="atpDiv-' . $tipId . '">';
        $result3 .= '<a href="#" class="btn btn-info atpBtn" id="atpBtn-' . $tipId . '">Add to Plan</a>';
        $result3 .= '</div><br>';

        echo $result3;
        }   
}

// Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn); 
}

//-----------------------------------------------
//-----------------------------------------------
//-----------------------------------------------

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
