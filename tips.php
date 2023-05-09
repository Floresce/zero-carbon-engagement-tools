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
  
  $categoryName = $_POST['category'];
  $subcategoryName = $_POST['subcategory'];

// All Categories and any/or all subcategories
  switch ($categoryName . '-' . $subcategoryName) {

        // ALL the tips
        case 'All Categories-All Subcategories':
                $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID;";
                $stmt = sqlsrv_query($conn, $sql);
        break;
      
        // ALL the category and specific subcategory
        case 'All Categories-' . $subcategoryName:
                $sql = "SELECT T.T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE S.SUB_NAME = '$subcategoryName';";
                $stmt = sqlsrv_query($conn, $sql);
        break;

        // Specific category and ALL the subcategories
        case $categoryName . '-All Subcategories':
                $sql = "SELECT T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE C.C_NAME = '$categoryName';";
                $stmt = sqlsrv_query($conn, $sql);
        break;

        // Specific category and Specific subcategory
        default:
                $sql = "SELECT T_ID, T_DESC_ENGLISH, C_NAME, SUB_NAME, PRIMARY_LINK
                FROM TIPS T
                JOIN CATEGORY C ON T.C_ID = C.C_ID
                JOIN SUBCATEGORY S ON T.SUB_ID = S.SUB_ID
                WHERE S.SUB_NAME = '$subcategoryName' AND C.C_NAME = '$categoryName';";
                $stmt = sqlsrv_query($conn, $sql);
        break;

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

function generateAddToPlanButton($tipId) {
  $result = '<a href="#" onclick="return false;" class="btn btn-atp atpBtn" id="atpBtn-' . $tipId . '">Add to Plan</a>';
  $result .= '<div class="tipsCart" id="atpDiv-' . $tipId . '">';
  $result .= '</div></div></div><br><br>';

  return $result;
}

function generateLikeDislikeButton($tipId) {
  // id="likeBtn-' . $tipId . '" sets the id attribute of the button to a unique string that includes the tips's ID, T_ID
  // i.e. likeBtn-12 corresponds to the like button for tip 12
  $result = '<button id="likeBtn-' . $tipId . '" class="btn btn-success likeBtn" style="margin-left: 1em;">';
  $result .= '<span class="material-symbols-rounded">thumb_up</span></button>';
  $result .= '<button id="dislikeBtn-' . $tipId . '" class="btn btn-danger dislikeBtn">';
  $result .= '<span class="material-symbols-rounded">thumb_down</span></button>';
  
  return $result;
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

    // Like and dislike button
    $buttonFeedback = '<div class="btnfeedback">';
    $buttonFeedback .= '<p class="d-inline-flex align-items-center mb-0">Was this information helpful?';
    $buttonFeedback .= generateLikeDislikeButton($tipId);
    echo $buttonFeedback;

    // Creates a modal that allows for user comments
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

    // Add to plan button
    $buttonAddToPlan = generateAddToPlanButton($tipId);
    echo $buttonAddToPlan;
  }   
}

// Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn); 
}

//-----------------------------------------------
//-----------------------------------------------
//-----------------------------------------------

function getMaxCommentSeq($tipId, $conn) {
  // Prepare the SQL statement with placeholders
  $sql = "SELECT MAX(COMMENT_SEQ) AS max_seq FROM TIP_COMMENT WHERE T_ID = ?";

  // Create a statement object and bind the parameters
  $stmt = sqlsrv_prepare($conn, $sql, array(&$tipId));

  // Check if the statement prepared successfully
  if ($stmt === false) {
    echo "Error (sqlsrv_prepare): " . print_r(sqlsrv_errors(), true);
    exit;
  }

  // Execute the statement
  if (sqlsrv_execute($stmt) === false) {
    echo "Error (sqlsrv_execute): " . print_r(sqlsrv_errors(), true);
    exit;
  }

  // Fetch the result of the query and extract the maximum COMMENT_SEQ value:
  $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
  $maxSeq = $row['max_seq'];

  // Free statement resources
  sqlsrv_free_stmt($stmt);

  // Return the maximum COMMENT_SEQ value
  return $maxSeq;
}

function sanitizeInput($comment) {
  // Remove unwanted characters from input
  $comment = trim($comment); 								// Remove trailing white spaces
  $comment = preg_replace('/[^\w\s]+/', '', $comment); 		// Remove special characters except spaces
  
  return $comment;
}

function addComment($tipId, $comment, $date, $conn) {
  // Sanitize and validate the input
  $comment = sanitizeInput($comment);

  // Prepare the SQL statement with placeholders
  $sql = "INSERT INTO TIP_COMMENT (T_ID, COMMENT_SEQ, COMMENT, TIP_DATE) VALUES (?, ?, ?, ?)";

  // Create a statement object and bind the parameters
  $stmt = sqlsrv_prepare($conn, $sql, array(&$tipId, &$commentSeq, &$comment, &$date));

  // Check if the statement prepared successfully
  if ($stmt === false) {
    echo "Error (sqlsrv_prepare): " . print_r(sqlsrv_errors(), true);
    exit;
  }

  // Set the values for the bound parameters
  $commentSeq = getMaxCommentSeq($tipId, $conn) + 1;

  // Execute the statement
  if (sqlsrv_execute($stmt) === false) {
    echo "Error (sqlsrv_execute): " . print_r(sqlsrv_errors(), true);
    exit;
  }

  echo "<br>Comment added successfully.";

  // Free statement resources
  sqlsrv_free_stmt($stmt);
}

// POST parameters submitted from comment_modal.html
// Check if tipId, comment, and date are set in the POST request
if (isset($_POST['tipId']) && isset($_POST['comment']) && isset($_POST['date'])) {
  // Retrieve the values from $_POST array
  $tipId = $_POST['tipId'];
  $comment = $_POST['comment'];
  $date = $_POST['date'];

  echo 'tipId: ', $tipId, '<br>comment: ', $comment, '<br>date: ', $date;            // Check if the values retrieved are correct

  addComment($tipId, $comment, $date, $conn);

  // Free connection resources
  sqlsrv_close($conn);
}

//-----------------------------------------------
//-----------------------------------------------
//-----------------------------------------------
//Function that adds a like or dislike to the database
//Parameters are the tip ID and a boolean, $feedback where True is a like
//and False is a dislike
function addFeeback($tID, $feedback){
        //check if like or dislike and create sql statement
        if($feedback == TRUE){
                $sql = "UPDATE TIP_FEEDBACK SET TIP_LIKES = TIP_LIKES+1 WHERE T_ID = ?;";
                 
        } else{
                $sql = "UPDATE TIP_FEEDBACK SET TIP_DISLIKES = TIP_DISLIKES+1 WHERE T_ID = ?;";
        }

        //prepare and execute statement
        $stmt = sqlsrv_prepare($conn, $sql, $tID); 
        if ($stmt === false) {
                echo "Error (sqlsrv_prepare): " . print_r(sqlsrv_errors(), true);
                exit;
              }
        
              if (sqlsrv_execute($stmt) === false) {
                echo "Error (sqlsrv_execute): " . print_r(sqlsrv_errors(), true);
                exit;
              }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
}

function getLikes($tID){
        $sql = "SELECT TIP_LIKES FROM TIP_FEEDBACK WHERE T_ID = ?;";
        //prepare and execute statement
        $stmt = sqlsrv_prepare($conn, $sql, $tID); 
        if ($stmt === false) {
                echo "Error (sqlsrv_prepare): " . print_r(sqlsrv_errors(), true);
                exit;
              }
        
              if (sqlsrv_execute($stmt) === false) {
                echo "Error (sqlsrv_execute): " . print_r(sqlsrv_errors(), true);
                exit;
              }else{
                if (sqlsrv_fetch($stmt)) {
                  $count = sqlsrv_get_field($stmt, 0);
                  return $count;
                }
              }
              
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
            return -1;
}

function getDislikes($tID){
        $sql = "SELECT TIP_DISLIKES FROM TIP_FEEDBACK WHERE T_ID = ?;";
        //prepare and execute statement
        $stmt = sqlsrv_prepare($conn, $sql, $tID); 
        if ($stmt === false) {
                echo "Error (sqlsrv_prepare): " . print_r(sqlsrv_errors(), true);
                exit;
              }
        
              if (sqlsrv_execute($stmt) === false) {
                echo "Error (sqlsrv_execute): " . print_r(sqlsrv_errors(), true);
                exit;
              } else{
                if (sqlsrv_fetch($stmt)) {
                  $count = sqlsrv_get_field($stmt, 0);
                  return $count;
                }
              }
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
            return -1;
}

if (isset($_POST['function_name']) && isset($_POST['args'])){
        $funcName = $_POST['function_name'];
        $tID = $_POST['args'];

       switch($funcName){
          case 'addLike': 
                addFeeback($tID, TRUE);
                break;
          case 'addDislike':
                addFeeback($tID, FALSE);
                break;
          case 'getLikes':
                getLikes($tID);
                break;
          case 'getDislikes':
                getDislikes($tID);
                break;
           default:
                //do nothing
       }
}

?>
