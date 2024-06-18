<?php
    require_once('../../../config.php');

    $id = $_GET["id"];

    $sql = "
    SELECT T.T_ID, T.T_DESC_ENGLISH, T.C_ID, T.SUB_ID, TF.TIP_LIKES, TF.TIP_DISLIKES, TF.TIP_ADDTOPLAN
    FROM TIPS T
    JOIN TIP_FEEDBACK TF
    ON T.T_ID = TF.T_ID
    WHERE T.T_ID = " . $id . ";";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {                                           // Checks if SQL query was successful or not
        die(print_r(sqlsrv_errors(), true));                         // Prints out detailed error message
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    $table = '';

    $TID = $row["T_ID"];
    $T_DES_ENG = $row["T_DESC_ENGLISH"];

    $C_ID = $row["C_ID"];
    $category_query = "SELECT C_NAME FROM CATEGORY WHERE C_ID = $C_ID";
    $category_result = sqlsrv_query($conn, $category_query);
    $category_row = sqlsrv_fetch_array($category_result);
    $C_NAME = $category_row["C_NAME"];

    $SUB_ID = $row["SUB_ID"];
    $subcategory_query = "SELECT SUB_NAME FROM SUBCATEGORY WHERE SUB_ID = $SUB_ID";
    $subcategory_result = sqlsrv_query($conn, $subcategory_query);
    $subcategory_row = sqlsrv_fetch_array($subcategory_result);
    $SUB_NAME = $subcategory_row["SUB_NAME"];

    $TIP_LIKES = $row["TIP_LIKES"];
    $TIP_DISLIKES = $row["TIP_DISLIKES"];
    $TIP_ADDTOPLAN = $row["TIP_ADDTOPLAN"];

    $table .= '<div class="container"><div class="row"><div class="col"><h4>Tip ID: </h4><p>' . $TID . '</p>';
    $table .= '<h4>Tip Description: </h4><p>' . $T_DES_ENG . '</p>';
    $table .= '<h4>Tip Category: </h4><p>' . $C_NAME . '</p>';
    $table .= '<h4>Tip Sub-Category: </h4><p>' . $SUB_NAME . '</p></div>';

    $table .= '
    <div class="col">
    <script>
    var ctx' . $TID . ' = document.getElementById("myChart");

    new Chart(ctx' . $TID . ', {
        type: "bar",
        data: {
            labels: ["Likes", "Dislikes", "Add to Plan"],
            datasets: [{
                data: ['. $TIP_LIKES .', '. $TIP_DISLIKES .', '. $TIP_ADDTOPLAN .'],
                backgroundColor: [
                    "rgba(112, 175, 185, 1)",
                    "rgba(193, 211, 43, 1)",
                    "rgba(141, 137, 165, 1)"
                ],
                borderColor: [
                    "rgb(112, 175, 185)",
                    "rgb(193, 211, 43)",
                    "rgb(141, 137, 165)"
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: "y",
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    </script>

    <canvas id="myChart"></canvas>
    </div>
    </div>
    </div>
    ';


    echo $table;
?>