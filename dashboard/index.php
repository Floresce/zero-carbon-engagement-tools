<html>
    <?php include 'index2.php';?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        
        <!--jQuery 3.6.0-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--Bootstrap 5.3-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <!--SMUD's main.css: (partial)Bootstrap 3.3.7, normalize.css v3.0.3, html5-boilerplate v5.1.0-->
        <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
        <!--Lato and Zilla Slab fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato|Zilla+Slab&display=swap" rel="stylesheet">
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