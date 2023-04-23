<?php
    require_once('config.php');

    $sql = "SELECT * FROM TIPS";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {                                           // Checks if SQL query was successful or not                      
        die(print_r(sqlsrv_errors(), true));                         // Prints out detailed error message
    }

    $rows = array();                                                 // Creates empty array called '$rows'
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {   // While loop fetches current row as '$row', the loop stops when there are no more rows to fetch
        if ($row !== null) {                                         // Makes sure only non-null rows are added to the array
            $rows[] = $row;                                          // '$row' array is appended to '$rows'
        }
    }

    // Check if any data was returned
    if (count($rows) > 0) {
        // Start building the HTML table
        $table = '';

        foreach ($rows as $row) {
            $TID = $row["T_ID"];
            $T_DES_ENG = $row["T_DESC_ENGLISH"];
            $T_DES_ENG_WORDS = explode(" ", $T_DES_ENG);
            $T_DES_ENG_SHORT = implode(" ", array_slice($T_DES_ENG_WORDS, 0, 10));
            $table .= '<li><a class="dropdown-item" data-value="' . $TID  . '" href="#">(' . $TID . ') ' . $T_DES_ENG_SHORT .'</a></li>';
        }

        // Output the table as the response
        echo $table;
    } else {
        // No data was returned
        echo 'No results found.';
    }
?>