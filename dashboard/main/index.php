<html>
    <?php include '../index.php';?>
    <head>
        <!--jQuery 3.6.0-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--Main CSS-->
        <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
        <!--DataTables 1.13.2-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

        <style>
            .middle-top-bar {
                background-color: #D3D2D2;
            }
        </style>
    </head>

    <body>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">

                <div class="row d-flex align-items-center border-bottom my-3">
                    <div class="col-9 d-flex flex-row ">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-3 d-flex flex-row-reverse ">
                        <button class="btn btn-danger" id="fadebutton">
                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Export data
                        </button>
                    </div>
                </div>

                <div class="row middle-top-bar border shadow">
                    <div class="col p-5 border-end">
                        <h2 class="text-center">Popular Tip</h2>
                        <h3 class="text-center">Change your air filter</h3>
                        <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                    </div>
                    <div class="col p-5 border-top border-end">
                        <h2 class="text-center">Most used browser</h2>
                        <h3 class="text-center">Google Chrome</h3>
                        <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                    </div>
                    <div class="col p-5 border-top">
                        <h2 class="text-center">Total Pageviews</h2>
                        <h3 class="text-center">500,000,000,000</h3>
                        <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                    </div>
                </div>

                <div class="row border my-4 shadow">
                    <!--Tips Report Telementry table (start)-->
                    <?php include 'php/tips_telemetry.php';?>
                    <!--Tips Report Telementry table (end)-->
                </div>

                <div class="row border my-4 shadow">
                    <!--User Behavior table (start)-->
                    <?php include 'php/user_behavior.php';?>
                    <!--User Behavior table (end)-->
                </div>

                <div class="row my-4">
                    <div class="col p-3 border shadow">
                        <h2>Reset data</h2>
                        <p>Click button to reset shit</p>
                        <button class="btn btn-danger" id="resetdelete">
                            Delete
                        </button>
                    </div>
                    <div class="col p-3 mx-4 border shadow">
                        <h2>Test</h2>
                        <p>Test</p>
                    </div>
                    <div class="col p-3 mx-4 border shadow">
                        <h2>Test</h2>
                        <p>Test</p>
                    </div>
                    <div class="col p-3 border shadow">
                        <h2>Test</h2>
                        <p>Test</p>
                    </div>
                </div>

                <script>
                    //Fade buttons
                    $('#fadebutton').on('click', function () {
                        document.getElementById("fademe").className = "d-flex alert alert-dismissible alert-success show";
                        document.getElementById("fademe").style.opacity = 1;
                    })
                    $('#resetdelete').on('click', function () {
                        $.ajax({
                            url: 'php/reset_data.php',
                            method: 'POST'
                        });
                    })
                </script>
            </div>
        </main>
    </body>
</html>