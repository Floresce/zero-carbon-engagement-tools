<html>
    <?php include '../index.php';?>
    <head>
        <style>
            .middle-top-bar {
                background-color: #D3D2D2;
            }
        </style>
    </head>

    <body>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">

                <div class="row d-flex align-items-center">
                    <div class="col-9 d-flex flex-row p-3">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-3 d-flex flex-row-reverse p-3">
                        <button class="btn btn-danger" id="fadebutton">
                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Export data
                        </button>
                    </div>
                </div>

                <div class="row middle-top-bar">
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

                <!--Tips Report Telementry table (start)-->
                <?php include 'php/tips_telemetry.php';?>
                <!--Tips Report Telementry table (end)-->

                <!--User Behavior table (start)-->
                <?php include 'php/user_behavior.php';?>
                <!--User Behavior table (end)-->

                <script>
                    //Fade buttons
                    $('#fadebutton').on('click', function () {
                        document.getElementById("fademe").className = "d-flex alert alert-dismissible alert-success show";
                        document.getElementById("fademe").style.opacity = 1;
                    })
                </script>
            </div>
        </main>
    </body>
</html>