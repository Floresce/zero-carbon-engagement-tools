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

    $data = '<div class="row border p-4 my-4 shadow"><b>Tip ID: ' . $id . '</b>';

    foreach ($rows as $row) {
        $DATE = $row["TIP_DATE"];
        $DATED = $DATE->format('Y-m-d H:i:s');
        $data .= '<b>' . $DATED . '</b><p>' . $row["COMMENT"] . '</p>';
    }

    $data .= '</div>';

    echo $data;
?>