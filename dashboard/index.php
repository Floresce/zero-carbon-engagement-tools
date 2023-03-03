<!DOCTYPE html>

<?php
function OpenConnection()
{
    $serverName = "mssql";
    $connectionOptions = array("Database"=>"tips_telemetry",
        "Uid"=>"sa", "PWD"=>"Programmadelic_123");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false)
        die(FormatErrors(sqlsrv_errors()));

    return $conn;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <!--SMUD's main.css: (partial)Bootstrap 3.3.7, normalize.css v3.0.3, html5-boilerplate v5.1.0-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--Lato and Zilla Slab fonts-->
        <link href=""href="https://fonts.googleapis.com/css?family=Lato|Zilla+Slab&display=swap" rel="stylesheet">
        <!--jQuery 3.6.0-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--DataTables 1.13.2-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

        <style>
            h3 {
                font-family: 'Lato';
            }
            .row {
                margin-top: 15px;
                margin-bottom: 15px;
	            margin-left: 30px;
	            margin-right: 30px
            }
            .panel {
                margin-top: 15px;
            }
            .panel-default {
                margin-top: 10px;
                margin-bottom: 10px;
	            margin-left: 10px;
	            margin-right: 10px
            }
            #fademe {
                font-family: 'Lato';
                opacity: 0;
                transition: 1s;
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div class="panel panel-default">
                <!--Tips Report Telementry table (start)-->
                <div class="panel-heading">Tips Report Telemetry</div>
                <div class="panel-default">
                    <table id="myTable1" class="table">
                        <?php
                        $conn = OpenConnection();
                        
                        // Load SQL query from file
                        $sql = "SELECT * FROM telemetry_table";
                        
                        // Execute query
                        $stmt = sqlsrv_query($conn, $sql);

                        if ($stmt === false) {
                            die(print_r(sqlsrv_errors(), true));
                        }

                        echo "<thead>";

                        echo "<tr><th>Page</th><th>Pageviews</th><th>Unique Pageviews</th><th>Avg. Time on Page</th><th>Entrances</th><th>Bounce Rate</th><th>% Exit</th><th>Page Value</th></tr>";

                        echo "</thead>";

                        echo "<tbody>";

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

                        echo "</tbody>";

                        sqlsrv_close($conn);
                        ?>
                    </table>
                </div>
                <!--Tips Report Telementry table (end)-->
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <!--User Behavior table (start)-->
                <div class="panel-heading">User Behavior</div>
                <div class="panel-heading">ID: 1a79a4d60de6718e8e5b326e338ae533</div>
                <div class="panel-default">
                    <table id="myTable2" class="table">
                    </table>
                </div>
                <!--User Behavior table (end)-->

                <button id="add-data-button">Add Data</button>
            </div>
        </div>

        <div class="row">
            <button type="button" id="fadebutton" class="btn btn-danger" data-toggle="button" aria-pressed="false">
                <span class="glyphicon glyphicon-share" aria-hidden="true"></span> Export
            </button>
            <h4 id = "fademe">File automatically downloading... </h4>
        </div>

        <script>
            setInterval(updateTable, 1000);

            //Fade buttons
            $('#fadebutton').on('click', function () {
                document.getElementById("fademe").style.opacity = 1;
            })
            //Using DataTables to sort tables
            $(document).ready( function () {
                $('#myTable1').DataTable();
                $('#myTable2').DataTable();
            });
            //Convert epoch timestamp to date
            const epochTimestamps = document.querySelectorAll(".epoch-timestamp");

            epochTimestamps.forEach(cell => {
                const epochTimestamp = cell.textContent;
                const date = new Date(epochTimestamp * 1000);
                cell.textContent = date.toLocaleString();
            });

            document.getElementById("add-data-button").addEventListener("click", function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //alert("Data added successfully!");
                    }
                };
                xhttp.open("GET", "php/add_data.php", true);
                xhttp.send();
            });

            function updateTable() {
                $.ajax({
                    url: "php/user_behavior.php",
                    success: function(data) {
                        $("#myTable2").html(data);
                    }
                });
            }

        </script>
    </body>
</html>