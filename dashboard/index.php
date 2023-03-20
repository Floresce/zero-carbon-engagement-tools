<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <!--jQuery 3.6.0-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <!--SMUD's main.css: (partial)Bootstrap 3.3.7, normalize.css v3.0.3, html5-boilerplate v5.1.0-->
        <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
        <link rel="stylesheet" type="text/css" href="css/css-theme.css">
        <link rel="stylesheet" type="text/css" href="css/css-app.css">
        <!--Lato and Zilla Slab fonts-->
        <link href=""href="https://fonts.googleapis.com/css?family=Lato|Zilla+Slab&display=swap" rel="stylesheet">
        <!--DataTables 1.13.2-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

        <style>
            h1 {
                
                font-family: 'Lato';
            }
            h2 {
                margin-top: 16px;
            }
            h3 {
                font-family: 'Lato';
            }
            #fademe {
                font-family: 'Lato';
                opacity: 0;
                transition: 1s;
            }
            .show {
                display: block !important;
            }
            .hidden {
                display: none !important;
            }
            .main-top-bar {
                /*background-color: #777;*/
            }
            .middle-top-bar {
                background-color: #D3D2D2;
                margin-bottom: 30px;
            }
            .top-bar {
                margin-left: 100px;
                margin-right: 100px;
            }
            :root {
                background-color: #EDEAE8;
            }
        </style>
    </head>

    <body class="ab-xl ab-desktop">
        <div class="main-content">

            <div class="main-top-bar">
                <div class="row top-bar">
                    <div class="col-12 col-md-9">
                        <h1 id="page-title">
                            <span class="glyphicon glyphicon-console" aria-hidden="true"></span> Dashboard
                        </h1>
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-danger btn-block btn-h1 active" id="fadebutton">
                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Export data
                        </button>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-body">
                    <div class="container">
                        <div class="d-flex alert alert-dismissible alert-success hidden" id="fademe">
                            <div class="alert-brand">
                            </div>
                            <div class="alert-content px-3">
                                <span class="glyphicon glyphicon-saved" aria-hidden="true"></span> File automatically downloading...
                            </div>
                            <div class="alert-close">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">x</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section middle-top-bar">
                <div class="section-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-4 abstract-item center-block border-right">
                                    <h2 class="text-center">Popular Tip</h2>
                                    <h3 class="text-center">Change your air filter</h3>
                                    <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                                </div>
                                <div class="col-sm-4 abstract-item center-block border-right border-left">
                                    <h2 class="text-center">Most used browser</h2>
                                    <h3 class="text-center">Google Chrome</h3>
                                    <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                                </div>
                                <div class="col-sm-4 abstract-item center-block border-left">
                                    <h2 class="text-center">Total Pageviews</h2>
                                    <h3 class="text-center">500,000,000,000</h3>
                                    <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-body">
                    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!--Tips Report Telementry table (start)-->
                        <div class="panel-heading">Tips Report Telemetry</div>
                        <?php include 'php/tips_telemetry.php';?>
                        <!--Tips Report Telementry table (end)-->
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-body">
                    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!--User Behavior table (start)-->
                        <?php include 'php/user_behavior.php';?>
                        <!--User Behavior table (end)-->
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            //Fade buttons
            $('#fadebutton').on('click', function () {
                document.getElementById("fademe").className = "d-flex alert alert-dismissible alert-success show";
                document.getElementById("fademe").style.opacity = 1;
            })
        </script>
    </body>
</html>