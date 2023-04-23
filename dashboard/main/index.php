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
    </head>

    <body>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">

                <div class="row d-flex align-items-center border-bottom my-3">
                    <div class="col-9 d-flex flex-row ">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-3 d-flex flex-row-reverse ">
                        <button class="btn btn-danger" id="button">
                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span> Export data
                        </button>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col p-5 border shadow" style="background-color: #EDEAE8">
                        <h2 class="text-center">Popular Tip</h2>
                        <h3 class="text-center">Change your air filter</h3>
                        <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                    </div>
                    <div class="col p-5 mx-4 border shadow" style="background-color: #EDEAE8">
                        <h2 class="text-center">Most used browser</h2>
                        <h3 class="text-center">Google Chrome</h3>
                        <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                    </div>
                    <div class="col p-5 border shadow" style="background-color: #EDEAE8">
                        <h2 class="text-center">Total Pageviews</h2>
                        <h3 class="text-center">500,000,000,000</h3>
                        <p class="text-center">(As of 03/16/2023 00:00:00)</p>
                    </div>
                </div>

                <div class="row border my-4 shadow">
                    <div class="btn-group my-3" role="group">
                        <div class="btn-group dropdown-center w-100" id="tuning-options" role="group">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown button
                            </button>
                            <ul id="tipsList" class="dropdown-menu">
                            </ul>
                        </div>

                        <button id="refreshbtn"class="btn btn-secondary" type="button" aria-expanded="false">
                            <i class="bi bi-arrow-clockwise"></i>
                        </button>
                    </div>
                    <div id="selected-content">
                    </div>
                </div>

                

                <div class="row border my-4 shadow">
                    <!--User Behavior table (start)-->
                    <?php include 'php/user_behavior.php';?>
                    <!--User Behavior table (end)-->
                </div>

                <div class="row my-4">
                    <div class="col p-3 me-2 border shadow">
                        <h2>Reset data</h2>
                        <p>Click button to reset shit</p>
                        <button class="btn btn-danger" id="resetdelete">
                            Reset
                        </button>
                    </div>
                    <div class="col p-3 ms-2 mx-2 border shadow">
                        <h2>Delete data</h2>
                        <p>Click button to delete shit</p>
                        <button class="btn btn-warning" id="deletedelete">
                            Delete
                        </button>
                    </div>
                    <div class="col p-3 mx-2 me-2 border shadow">
                        <h2>Test</h2>
                        <p>Test</p>
                    </div>
                    <div class="col p-3 ms-2 border shadow">
                        <h2>Test</h2>
                        <p>Test</p>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    $(document).ready(function(){
                        $.ajax({
                            url: 'php/fetch_tips_table.php',
                            method: 'POST',
                            success: function (response) {
                                $("#tipsList").html(response);
                            }
                        });
                    });
                    
                    //Fade buttons
                    $('#fadebutton').on('click', function () {
                        document.getElementById("fademe").className = "d-flex alert alert-dismissible alert-success show";
                        document.getElementById("fademe").style.opacity = 1;
                    })
                    $('#resetdelete').on('click', function () {
                        $.ajax({
                            url: 'php/data_reset.php',
                            method: 'POST'
                        });
                    })
                    $('#deletedelete').on('click', function () {
                        $.ajax({
                            url: 'php/data_delete.php',
                            method: 'POST'
                        });
                    })
                    $('#refreshbtn').on('click', function () {
                        $.ajax({
                            url: 'php/fetch_tips_table.php',
                            method: 'POST',
                            success: function (response) {
                                $("#tipsList").html(response);
                            }
                        })
                    })
                    
                    $('#tuning-options').on('hide.bs.dropdown', ({ clickEvent }) => {
                        if (clickEvent?.target) {
                            var id = $(clickEvent.target).data('value');
                            if (id != undefined) {
                                $.ajax({
                                    url: 'php/fetch_tips_list.php?id=' + id,
                                    method: 'GET',
                                    success: function (response) {
                                        $('#selected-content').html(response);
                                    }
                                })
                            }
                        }
                    })


                    const ctx = document.getElementById('myChart');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                        }
                    });
                </script>
            </div>
        </main>
    </body>
</html>