<?php
    require_once('../../../config.php');

    $id = $_GET["id"];
    $sql = "SELECT * FROM TIP_COMMENT WHERE T_ID = $id";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $rows = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($row !== null) {
            $rows[] = $row;
        }
    }

    $data = '<b>Tip ID: ' . $id . '</b><br/><br/>';

    foreach ($rows as $row) {
        $DATE = $row["TIP_DATE"];
        $DATED = $DATE->format('Y-m-d H:i:s');
        $data .= '<b>' . $DATED . '</b><p>' . $row["COMMENT"] . '</p>';
    }

    $data .= '';

    echo $data;
?>