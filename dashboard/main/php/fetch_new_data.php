<?php
require_once('config.php');

// Fetch initial data
$sql = "SELECT * FROM user_behavior";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>