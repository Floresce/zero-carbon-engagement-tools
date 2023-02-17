<!-- This is a PHP script that establishes a connection to a Microsoft SQL Server database,
     retrieves information from the database, and displays it on a webpage. -->
<?php
$servername = "DESKTOP-UK8K0FD";        // Subject to change depending on server name
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

// The SQL query selects data from the TIPS and CATEGORY tables in the database
$sql = "SELECT T.T_ID, T.T_DESC_ENGLISH, T.RATE, T.PRIMARY_LINK, T.C_ID, T.SUB_ID, C.C_NAME 
        FROM TIPS T
        JOIN CATEGORY C
        ON T.C_ID = C.C_ID";

// sqlsrv_query function is called to execute the query on the database
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$rows = array();                                                         // Creates empty array called '$rows'
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {           // While loop fetches current row as '$row', the loop stops when there are no more rows to fetch
    $rows[] = $row;                                                      // '$row' array is appended to '$rows'
}

if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<div class="tip">';                                        // In this loop, for each row, it
        echo '<h2>' . $row["C_NAME"] . '</h2>';                          // generates HTML markup that displays the
        echo '<p>' . $row["T_DESC_ENGLISH"] . '</p>';                    // category name, tip description, and two buttons for users to give feedback on the tip
        echo '<div class="feedback">';
        echo '<p class="d-inline-flex align-items-center mb-0">Was this information helpful?';

        // id="yesBtn-' . $row["T_ID"] . '" sets the id attribute of the button to a unique string that includes the tips's ID, T_ID
        // i.e. yesBtn-12 corresponds to the Yes button for Tip 12
        echo '<button id="yesBtn-' . $row["T_ID"] . '" class="btn btn-success yesBtn" style="margin-left: 1em;">Yes</button>';      // yesBtn is a custom class used to idenfity the button in JavaScript code
        echo '<button id="noBtn-' . $row["T_ID"] . '" class="btn btn-danger noBtn" style="margin-left: 1em;">No</button>';
        
        echo '</p></div></div>';
    }
}
sqlsrv_free_stmt($stmt);        // Free the statement resource
sqlsrv_close($conn);            // Close the database connection
?>
<!-- This is the end of feedback_database.php script -->


