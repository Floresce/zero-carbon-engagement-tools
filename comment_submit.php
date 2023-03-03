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

if (isset($_POST['tipId']) && isset($_POST['comment']) && isset($_POST['date'])) {
    // Retrieve the values from $_POST array
    $tipId = $_POST['tipId'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];

    echo $tipId, $comment, $date;            // Check if the values retrieved are correct

} else {
    // Handle the case when one or more POST variables are not set
    echo 'Error: One or more POST variables not set';
}
?>
