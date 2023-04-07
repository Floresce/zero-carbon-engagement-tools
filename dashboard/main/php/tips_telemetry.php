<div class="col table-responsive p-4">
    <h3>Tips Report Telemetry</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Tip ID</th>
                <th>Tip Description</th>
                <th>Likes</th>
                <th>Dislikes</th>
                <th># Added to Plans</th>
                <th>View count</th>
                <th>Unique viewcount</th>
                <th>% Exit</th>
            </tr>
        <?php
        require_once('config.php');
        
        // Load SQL query from file
        $sql = "SELECT * FROM telemetry_table";
        
        // Execute query
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['tip_id']."</td>";
            echo "<td>".$row['tip_description']."</td>";
            echo "<td>".$row['likes']."</td>";
            echo "<td>".$row['dislikes']."</td>";
            echo "<td>".$row['added_plans']."</td>";
            echo "<td>".$row['viewcount']."</td>";
            echo "<td>".$row['unique_viewcount']."</td>";
            echo "<td>".$row['exit_percent']."</td>";
            echo "</tr>";
        }
        sqlsrv_close($conn);
        ?>
        </tbody>
    </table>
</div>

<script>
    //Using DataTables to sort tables
    $(document).ready( function () {
        $('#myTable1').DataTable();
    });
</script>