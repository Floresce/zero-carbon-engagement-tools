<!--jQuery 3.6.0-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--DataTables 1.13.2-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>


<div class="table-responsive p-4">
    <h3>User Behavior</h3>
    <table id="myTable2" class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Liked Tips</th>
                <th>Disliked Tips</th>
                <th>Comments</th>
                <th>User Agent</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <button id="add-data-button">Add Data</button>
</div>

<script>
    setInterval(function() {
    $('#myTable2').DataTable().ajax.reload();
    }, 1000);

    //Using DataTables to sort tables
    $(document).ready( function () {
        $('#myTable2').DataTable({
            "ajax": "php/user_behavior_fetch.php",
            "columns": [
                {   "data": "timestamp_date",
                    "render": function(data) {
                        var date = new Date(data * 1000);
                        return date.toLocaleString();
                    }
                },
                { "data": "liked_tips" },
                { "data": "disliked_tips" },
                { "data": "comments" },
                { "data": "user_agent" }
            ]
        });
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
</script>