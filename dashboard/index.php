<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <!--Bootstrap 5.3.0-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <!--Lato and Zilla Slab fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato|Zilla+Slab&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

        <link rel="stylesheet" type="text/css" href="/dashboard/css/dashboard.css">
    </head>

    <body>
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/dashboard/">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">

            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">
                        <i class="bi bi-door-closed"></i>
                        Sign out
                    </a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">

                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">

                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], '/main/') !== false && basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" aria-current="page" href="http://localhost/dashboard/main/">
                                    <i class="bi bi-activity"></i>
                                    Telemetry
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], '/DashBoardTipManipulation/') !== false && basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" aria-current="page" href="http://localhost/dashboard/DashBoardTipManipulation/">
                                    <i class="bi bi-sliders"></i>
                                    Modify Tips
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>

            </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        </main>
    </body>
</html>