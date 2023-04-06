<!DOCTYPE html>
<html>
    <?php include '../index.php';?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Adding Removing dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/DashBoardTab.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Tips')">Tips</button>
        <button class="tablinks" onclick="openTab(event, 'Categorie')">Category</button>
        <button class="tablinks" onclick="openTab(event, 'Sub-Category')">Sub-Category</button>
        <button class="tablinks" onclick="openTab(event, 'DIsplayTips')">Sub-Category</button>
    </div>

    <div id="Tips" class="tabcontent">
        <div class="tabPanel">Adding Tip
            <centre>
                <label for="category-input">English description of tip:</label>
                <input type="text" id="ENdescription" name="category" required><br>
                <label for="category-input">Spanish description of tip:</label>
                <input type="text" id="ESdescription" name="category" ><br>
                <label for="category-input">Category of tip:</label>
                <input type="text" id="Category" name="category" required><br>
                <label for="category-input">Sub-Category of tip:</label>
                <input type="text" id="Subcategory" name="category" required><br>
                <label for="category-input">Season of tip:</label>
                <input type="text" id="Season" name="category" required><br>
                <label for="category-input">Rate of tip:</label>
                <input type="text" id="Rate" name="category" ><br>
                <label for="category-input">Primary links related to the tip: a</label>
                <input type="text" id="PLinks" name="category" ><br>
                <label for="category-input">Secondary links related to the tip: a</label>
                <input type="text" id="SLinks" name="category" ><br>
                <button type="submit" id="TIPADD">SAVE</button>
            </centre>
        </div>
    </div>

    <div id="Categorie" class="tabcontent">
        <label for="category-input">Enter a Category to add:</label>
        <input type="text" id="CATname" name="submitCAT" required>
        <button type="submit" id="CATADD">SAVE</button>
        <br>
        <label for="category-input">Enter a Sub-category to add:</label>
        <input type="text" id="SUBname" name="submitSUB" required>
        <button type="submit" id="SUBADD">SAVE</button>
    </div>

    <div id="Sub-Category" class="tabcontent">
        <label for="category-input">Enter a Category to remove:</label>
        <input type="text" id="DELCATname" name="submitCAT" required>
        <button type="submit" id="CATDEL">SAVE</button>
        <br>
        <label for="category-input">Enter a Sub-category to remove:</label>
        <input type="text" id="DELSUBname" name="submitSUB" required>
        <button type="submit" id="SUBDEL">SAVE</button>
    </div>


    <div id="DIsplayTips" class="tabcontent">
        <div id="tableDiv"></div>
        <div id="resultsTable"></div>
        <button id="refreshButton">Refresh</button>
    </div>

    </main>


    <script>
        $(document).ready(function () {
            //AJAX for adding TIP
            $("#TIPADD").click(function () {
                var name = $("#ENdescription").val();
                var name = $("#ESdescription").val();
                var name = $("#Category").val();
                var name = $("#Subcategory").val();
                var name = $("#Rate").val();
                var name = $("#PLinks").val();
                var name = $("#SLinks").val();
                $.ajax({
                    url: 'php/ADDTIP.php',
                    method: 'POST',
                    data: {
                        ENdescription: ENdescription,
                        ESdescription: ESdescription,
                        Category : Category,
                        Subcategory: Subcategory,
                        Season: Season,
                        Rate: Rate,
                        PLinks: PLinks,
                        SLinks: SLinks,
                    },
                    success: function (data) {
                        alert(data);
                    }
                });
            });

            //AJAX for adding CATEGORY
            $("#CATADD").click(function () {
                var name = $("#CATname").val();
                $.ajax({
                    url: 'php/ADDCAT.php',
                    method: 'POST',
                    data: {
                        name: name,
                    },
                    success: function (data) {
                        alert(data);
                    }
                });
            });

            //AJAX for adding SUBCATEGORY
            $("#SUBADD").click(function () {
                var name = $("#SUBname").val();
                $.ajax({
                    url: 'php/ADDSUB.php',
                    method: 'POST',
                    data: {
                        name: name,
                    },
                    success: function (data) {
                        alert(data);
                    }
                });
            });

            //AJAX for deleting CATEGORY
            $("#CATDEL").click(function () {
                var name = $("#DELCATname").val();
                $.ajax({
                    url: 'php/CATDEL.php',
                    method: 'POST',
                    data: {
                        name: name,
                    },
                    success: function (data) {
                        alert(data);
                    }
                });
            });

            //AJAX for deleting SUBCATEGORY
            $("#SUBDEL").click(function () {
                var name = $("#DELSUBname").val();
                $.ajax({
                    url: 'php/SUBDEL.php',
                    method: 'POST',
                    data: {
                        name: name,
                    },
                    success: function (data) {
                        alert(data); // lets you know if worked

                    }
                });
            });


            function displayTips() {
                $.ajax({
                    url: 'php/displayTips.php',
                    method: 'POST',
                    success: function (response) {
                        $("#resultsTable").html(response);
                    }
                });
            }

            // Call the function on page load
            displayTips();

            // Attach click event to the refresh button
            $("#refreshButton").click(function () {
                displayTips();
            });

        });

    </script>
    
    <script>
        // Get the form element
        var form = document.getElementById("Tips");
    
        // Add an event listener to the form's submit button
        form.addEventListener("submit", function(event) {
            // Get the required input fields
            var ENdescription = document.getElementById("ENdescription");
            var Category = document.getElementById("Category");
            var Subcategory = document.getElementById("Subcategory");
            var Season = document.getElementById("Season");
    
            // Check if the required fields are empty
            if (ENdescription.value.trim() === "" || Category.value.trim() === "" || Subcategory.value.trim() === "" || Season.value.trim() === "") {
                // Prevent the form from submitting
                event.preventDefault();
    
                // Display an error message
                alert("Please fill in all required fields.");
            }
        });
    </script>
    
    <script src="js\DashBoardTab.js"></script>

</body>

</html>