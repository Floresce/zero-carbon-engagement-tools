<div class="table-responsive p-4">
    <h3>Tips Report Telemetry</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Page</th>
                <th>Pageviews</th>
                <th>Unique Pageviews</th>
                <th>Avg. Time on Page</th>
                <th>Entrances</th>
                <th>Bounce Rate</th>
                <th>% Exit</th>
                <th>Page Value</th>
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
            echo "<td>".$row['link']."</td>";
            echo "<td>".$row['pageviews']."</td>";
            echo "<td>".$row['unique_pageviews']."</td>";
            echo "<td>".$row['average_time']."</td>";
            echo "<td>".$row['entrances']."</td>";
            echo "<td>".$row['bounce_rate']."</td>";
            echo "<td>".$row['exit_percent']."</td>";
            echo "<td>".$row['page_value']."</td>";
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