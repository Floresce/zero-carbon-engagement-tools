<!-- This is a PHP script that establishes a connection to a Microsoft SQL Server database,
     retrieves information from the database, and displays it on a webpage. -->
<?php
// Database connection
include 'config.php';

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

    case 'All Categories-Electric vehicles':
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
    
    case 'Around Your Home-All Subcategories':
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
        
        case 'Cooking-All Subcategories':
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
        
        case 'On Vacation-All Subcategories':
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
    case 'Around Town-Habit Changing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 2 AND S.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break;

        case 'Around Town-All Subcategories':
                $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                        FROM TIPS T
                        JOIN CATEGORY C ON T.C_ID = C.C_ID
                        JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                        JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                        WHERE S.SUB_ID = 2;";
                $stmt = sqlsrv_query($conn, $sql);
                break;

    case 'Around Town-Electric vehicles':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
               WHERE C.C_ID = 2 AND S.SUB_ID = 6;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Around Town-N/A':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 2 AND S.SUB_ID = 14;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

// Around Your Home and all its subcategories
    case 'Around Your Home-Appliances':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 7;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around Your Home-Maintenance':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 8;";
        $stmt = sqlsrv_query($conn, $sql);
        break;
        
    case 'Around Your Home-Insulation & Sealing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 9;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around Your Home-Habit Changing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 2;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around Your Home-Sealing':
        $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                JOIN TIP_SEASON TS ON T.T_ID = TS.T_ID
                WHERE C.C_ID = 3 AND S.SUB_ID = 13;";
        $stmt = sqlsrv_query($conn, $sql);
        break; 

    case 'Around Your Home-Pools & Spas':
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
    echo '<link rel="stylesheet" href="style.css?v=1.1">';    // Version control parameter that can be used to force the browser to load the latest version of the stylesheet file
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />';   // Enables use of thumbs up/down icons from Google

    foreach ($rows as $row) {
        $categoryName = $row["C_NAME"];
        $subcategoryName = $row["SUB_NAME"];
        $tipDescription = $row["T_DESC_ENGLISH"];
        $tipId = $row["T_ID"];
        
        $result = '<div class="row"> <div class="col-md-6"> <img src="img/Appliance.jpg" 
        alt="Appliance" width="90%" height="auto"></div>';
        // The '.=' operator concatenates strings in PHP
        $result .= '<div class="col-md-6">';
        //$result .= '<h2>' . $categoryName . ', ' . $subcategoryName . '</h2>';      // Generates HTML markup that displays
        $result .= '<p>' . $tipDescription . '</p>';                                // the categoryName, subcategoryName, and the tipDescription     
        //$result .= '</div>';
        
        echo $result;

        $result2 = '<div class="btnfeedback">';
        $result2 .= '<p class="d-inline-flex align-items-center mb-0">Was this information helpful?';

        // id="likeBtn-' . $tipId . '" sets the id attribute of the button to a unique string that includes the tips's ID, T_ID
        // i.e. likeBtn-12 corresponds to the like button for tip 12
        $result2 .= '<button id="likeBtn-' . $tipId . '" class="btn btn-success likeBtn" style="margin-left: 1em;">
        <span class="material-symbols-rounded">thumb_up</span></button>';
        $result2 .= '<button id="dislikeBtn-' . $tipId . '" class="btn btn-danger dislikeBtn">
        <span class="material-symbols-rounded">thumb_down</span></button>';
        echo $result2;

        // Creates a modal that acts as a hyperlink
        // Includes the code for the modal element
        include 'comment_modal.html';
        echo '</p></div>';

        // if statement for each tip to display correct Primary link as a clickable button if any 
        // placement here also assures that a button will not appear for every single tip in the while loop 
        // despite not having a link
        if (!empty($row['PRIMARY_LINK'])) {
                echo '<form action="' . $row['PRIMARY_LINK'] . '"target="_blank">
                      <button type="submit" id="link" class="btn btn-default">Instant rebates</button>
                      </form> <br>';
        }

        echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">';
        // Add button to add to plan
        $result3 = '<div id="atpDiv-' . $tipId . '">';
        $result3 .= '<a href="#" onclick="return false;" class="btn btn-atp atpBtn" id="atpBtn-' . $tipId . '">Add to Plan</a>';
        $result3 .= '</div></div></div><br><br>';

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

// POST parameters submitted from comment_modal.html
// Check if tipId, comment, and date are set in the POST request
if (isset($_POST['tipId']) && isset($_POST['comment']) && isset($_POST['date'])) {
    // Retrieve the values from $_POST array
    $tipId = $_POST['tipId'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];

    echo 'tipId: ', $tipId, '<br>comment: ', $comment, '<br>date: ', $date;            // Check if the values retrieved are correct

    // Sanitize the input to remove any potential HTML tags or SQL injection attempts
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    $comment = str_replace(['<', '>', ';', '--', "'", '&#39'], '', $comment);
	
    // Decode HTML entities and remove HTML tags
    $comment = strip_tags(htmlspecialchars_decode($comment));
     
    // Get the current maximum COMMENT_SEQ value for the given T_ID
    $sql = "SELECT MAX(COMMENT_SEQ) AS max_seq FROM TIP_COMMENT WHERE T_ID = ?";       // '?' is a placeholder for a parameter in the SQL query
    $params = array($tipId);                                                           // Create an array of values to be used as parameters in the query
    $stmt = sqlsrv_query($conn, $sql, $params);                                        // Prepare the statement using the SQL and parameter array 
    if ($stmt === false) {                                                             // Check if the statement executed successfully
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }

    // Fetch the result of the query and extract the maximum COMMENT_SEQ value:
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $maxSeq = $row['max_seq'];
    
    // Increment the maximum COMMENT_SEQ value and insert the new comment
    $newSeq = $maxSeq + 1;
    $sql = "INSERT INTO TIP_COMMENT (T_ID, COMMENT_SEQ, COMMENT, TIP_DATE) VALUES (?, ?, ?, ?)";
    $params = array($tipId, $newSeq, $comment, $date);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }
    
    echo "<br>Comment added successfully.";
    
    // Free statement and connection resources
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
} 
if (isset($_POST['function_name']) && isset($_POST['tipId'])){
        $funcName = $_POST['function_name'];
        $tID = $_POST['tipId'];
        
       switch($funcName){
          case 'addLike':
                $sql = "UPDATE TIP_FEEDBACK SET TIP_LIKES = TIP_LIKES+1 WHERE T_ID = $tID;";
                $result = sqlsrv_query($conn,$sql);
                break;
          case 'addDislike':
                $sql = "UPDATE TIP_FEEDBACK SET TIP_DISLIKES = TIP_DISLIKES+1 WHERE T_ID = $tID;";
                $result = sqlsrv_query($conn,$sql);
                break;
          case 'getLikes':
                $sql = "SELECT TIP_LIKES FROM TIP_FEEDBACK WHERE T_ID = $tID;";
                $result = sqlsrv_query($conn,$sql);
                break;
          case 'getDislikes':
                $sql = "SELECT TIP_DISLIKES FROM TIP_FEEDBACK WHERE T_ID = $tID;";
                $result = sqlsrv_query($conn,$sql);
           default:
                //do nothing
       }
       if ($result === false) {                                           // Checks if SQL query was successful or not                      
        echo "Error (sqlsrv_query): " . print_r(sqlsrv_errors(), true);
        exit;
    }
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

?>
