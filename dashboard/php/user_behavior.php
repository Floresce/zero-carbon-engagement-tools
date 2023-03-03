<?php
$serverName = "mssql";
$connectionOptions = array("Database"=>"tips_telemetry",
    "Uid"=>"sa", "PWD"=>"Programmadelic_123");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn == false)
    die(FormatErrors(sqlsrv_errors()));

if (!$conn) {
die("Connection failed: " . sqlsrv_errors());
}

// Load SQL query from file
$sql = "SELECT * FROM user_behavior";

// Execute query
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "<thead>";

echo "<tr><th>Date</th><th>Liked Tips</th><th>Disliked Tips</th><th>Comments</th><th>User Agent</th></tr>";

echo "</thead>";

echo "<tbody id='converted-date'>";

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td class='epoch-timestamp'>".$row['timestamp_date']."</td>";
    echo "<td>".$row['liked_tips']."</td>";
    echo "<td>".$row['disliked_tips']."</td>";
    echo "<td>".$row['comments']."</td>";
    echo "<td><code>".$row['user_agent']."</code></td>";
    echo "</tr>";
}

echo "</tbody>";

sqlsrv_close($conn);
?>