<!--jQuery 3.6.0-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--DataTables 1.13.2-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


<div class="table-responsive p-4">
    <h3>Tips Telemetry</h3>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Likes</th>
                <th>Dislikes</th>
                <th>Added to Plan</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!-- <button id="add-data-button">Add Data</button> -->
</div>

<script>
    $(document).ready( function () {
        setInterval(function() {
            $('#myTable').DataTable().ajax.reload();
        }, 1000);

        $('#myTable').DataTable({
            "ajax": "php/tips_telemetry_fetch.php",
            "columns": [
                { "data": "T_ID" },
                { "data": "T_DESC_ENGLISH"},
                { "data": "C_ID" },
                { "data": "SUB_ID"},
                { "data": "TIP_LIKES"},
                { "data": "TIP_DISLIKES"},
                { "data": "TIP_ADDTOPLAN"},
                { "data": "COMMENT_COUNT"}
            ]
        });
    });

    // document.getElementById("add-data-button").addEventListener("click", function() {
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             //alert("Data added successfully!");
    //         }
    //     };
    //     xhttp.open("GET", "php/data_add.php", true);
    //     xhttp.send();
    // });
</script>