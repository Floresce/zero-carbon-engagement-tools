<!DOCTYPE html>
<html data-bs-theme="light">
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
        <nav class="navbar navbar-dark sticky-top d-flex p-0 shadow">

            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/dashboard/">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>

            <div class=" flex-nowrap">
                <?php
                if (strpos($_SERVER['REQUEST_URI'], '/DashBoardTipManipulation/') !== false && basename($_SERVER['PHP_SELF']) == 'index.php') {
                    echo '
                    <div class=" flex-nowrap">
                        <ul class="nav">
                            <li class="tab nav-item active py-1">
                                <a class="custom-topbar nav-link px-3" href="#" onclick="openTab(event, \'Tips\')">Tips</a>
                            </li>
                            <li class="tab nav-item py-1">
                                <a class="custom-topbar nav-link px-3" href="#" onclick="openTab(event, \'Categorie\')">Category</a>
                            </li>
                            <li class="tab nav-item py-1">
                                <a class="custom-topbar nav-link px-3" href="#" onclick="openTab(event, \'Sub-Category\')">Sub-Category</a>
                            </li>
                            <li class="tab nav-item py-1">
                                <a class="custom-topbar nav-link px-3" href="#" onclick="openTab(event, \'DIsplayTips\')">Sub-Category</a>
                            </li>
                        </ul>
                    </div>
                    ';
                }
                ?>
            </div>

            <div class="navbar-nav py-1">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">
                        <i class="bi bi-door-closed"></i>
                        Sign out
                    </a>
                </div>
            </div>

        </nav>

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">

                <ul class="nav flex-column mx-3">

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

                    <li class="nav-item">
                        <a class="nav-link" onclick="toggleTheme()" href="#">
                            Toggle Theme
                        </a>
                    </li>

                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php
            if ($_SERVER['REQUEST_URI'] == '/dashboard/' && basename($_SERVER['PHP_SELF']) == 'index.php') {
                include 'wut.php';
            }
            ?>
        </main>

        <script>
            function toggleTheme() {
                const htmlTag = document.querySelector('html');;
                const theme = htmlTag.getAttribute('data-bs-theme');

                if (theme === 'light') {
                    htmlTag.setAttribute('data-bs-theme', 'dark');
                } else {
                    htmlTag.setAttribute('data-bs-theme', 'light');
                }

                console.log(theme);
		    }
        </script>

    </body>
</html>