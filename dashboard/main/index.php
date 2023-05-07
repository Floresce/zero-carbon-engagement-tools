<html>
    <?php include '../index.php';?>
    <head>
        <!--jQuery 3.6.0-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--DataTables 1.13.2-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        <!--Chart.js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">

                <div class="row d-flex align-items-center my-3">
                    <div class="col-9 d-flex flex-row ">
                        <h1>Dashboard</h1>
                    </div>
                </div>

                <div class="row border shadow">
                    <div class="btn-group my-3" role="group">
                        <div class="btn-group dropdown-center w-100" id="tuning-options" role="group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #635550">
                                Tip Details
                            </button>
                            <ul id="tipsList" class="dropdown-menu" style="height: 300px; overflow-y: scroll;">
                            </ul>
                        </div>

                        <button id="refreshbtn"class="btn btn-secondary" type="button" aria-expanded="false" style="background-color: #635550">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>

                    <div id="selected-content">
                    </div>
                </div>

                <!-- User Behavior table -->
                <div class="row border my-4 shadow">
                    <?php include 'php/tips_telemetry.php';?>
                </div>

                <div id="comment-content">
                </div>

                <script>
                    $(document).ready(function(){
                        // Always refresh data for dropdown
                        $.ajax({
                            url: 'php/tips_details_dropdown.php',
                            method: 'POST',
                            success: function (response) {
                                $("#tipsList").html(response);
                            }
                        });
                    });

                    // Dropdown Listener
                    $('#tuning-options').on('hide.bs.dropdown', ({ clickEvent }) => {
                        if (clickEvent?.target) {
                            var id = $(clickEvent.target).data('value');
                            if (id != undefined) {
                                $.ajax({
                                    url: 'php/tips_details_info.php?id=' + id,
                                    method: 'GET',
                                    success: function (response) {
                                        $('#selected-content').html(response);
                                    }
                                })
                            }
                        }
                    })

                    // Refresh Button Listener for Dropdown
                    $('#refreshbtn').on('click', function () {
                        $.ajax({
                            url: 'php/tips_details_dropdown.php',
                            method: 'POST',
                            success: function (response) {
                                $("#tipsList").html(response);
                            }
                        })
                    })

                </script>
            </div>
        </main>
    </body>
</html>