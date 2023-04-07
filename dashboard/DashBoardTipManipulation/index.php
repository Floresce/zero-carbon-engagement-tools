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
    
    <!--
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Tips')">Tips</button>
        <button class="tablinks" onclick="openTab(event, 'Categorie')">Category</button>
        <button class="tablinks" onclick="openTab(event, 'Sub-Category')">Sub-Category</button>
    </div>
    -->

    <div id="Tips" class="tabcontent">
        <div id="tableDiv"></div>
        <div id="resultsTableTIPS" class="results-container"></div>
        <button id="refreshButton">Refresh</button>
        <br> <br>
        <label for="text"><span class="required">(* is required)</span></label>
        <br>
        <label for="category-input">English description of tip:<span class="required">(*)</span></label>
        <input type="text" id="ENdescription" name="category" required><br>
        <label for="category-input">Spanish description of tip:</label>
        <input type="text" id="ESdescription" name="category"><br>
        <label for="category-input">Category of tip:<span class="required">(*)</span></label>
        <input type="text" id="Category" name="category" required><br>
        <label for="category-input">Sub-Category of tip:<span class="required">(*)</span></label>
        <input type="text" id="Subcategory" name="category" required><br>
        <label for="category-input">Rate of tip:</label>
        <input type="text" id="Rate" name="category"><br>
        <label for="category-input">Primary links related to the tip: a</label>
        <input type="text" id="PLinks" name="category"><br>
        <label for="category-input">Secondary links related to the tip: a</label>
        <input type="text" id="SLinks" name="category"><br>
        <button type="submit" id="TIPADD">SAVE</button>
        <br> <br>
        <label for="category-input">Enter ID of TIP to remove:</label>
        <input type="text" id="DELTIPname" name="removeTIP" required>
        <br>
        <button type="submit" id="TIPDEL">DELETE</button>
    </div>

    <div id="Categorie" class="tabcontent">

        <div id="tableDiv"></div>
        <div id="resultsTableCAT" class="results-container"></div>
        <button id="refreshButtonCAT">Refresh</button>
        <br>
        <label for="category-input">Enter a Category to add:</label>
        <input type="text" id="CATname" name="submitCAT" required>
        <button type="submit" id="CATADD">SAVE</button>
        <br>
        <label for="category-input">Enter a Category to remove:</label>
        <input type="text" id="DELCATname" name="submitCAT" required>
        <button type="submit" id="CATDEL">SAVE</button>

    </div>

    <div id="Sub-Category" class="tabcontent">

        <div id="tableDiv"></div>
        <div id="resultsTableSUB" class="results-container"></div>
        <button id="refreshButtonSUB">Refresh</button>
        <br>

        <label for="category-input">Enter a Sub-category to add:</label>
        <input type="text" id="SUBname" name="submitSUB" required>
        <button type="submit" id="SUBADD">SAVE</button>
        <br>
        <label for="category-input">Enter a Sub-category to remove:</label>
        <input type="text" id="DELSUBname" name="submitSUB" required>
        <button type="submit" id="SUBDEL">SAVE</button>

    </div>

    </main>


    <script>
        $(document).ready(function () {
            //AJAX for adding TIP
            $("#TIPADD").click(function () {
                var ENdescription = $("#ENdescription").val();
                var ESdescription = $("#ESdescription").val();
                var Category = $("#Category").val();
                var Subcategory = $("#Subcategory").val();
                var Rate = $("#Rate").val();
                var PLinks = $("#PLinks").val();
                var SLinks = $("#SLinks").val();

                // check if required fields are empty
                if (ENdescription.trim() === "" || Category.trim() === "" || Subcategory.trim() === "") {
                    alert("Please fill all required fields");
                    return;
                }

                // set empty string for fields that are not filled
                if (ESdescription.trim() === "") {
                    ESdescription = "";
                }
                if (Rate.trim() === "") {
                    Rate = "";
                }
                if (PLinks.trim() === "") {
                    PLinks = "";
                }
                if (SLinks.trim() === "") {
                    SLinks = "";
                }

                // send AJAX request with data
                $.ajax({
                    url: 'php/ADDTIP.php',
                    method: 'POST',
                    data: {
                        ENdescription: ENdescription,
                        ESdescription: ESdescription,
                        Category: Category,
                        Subcategory: Subcategory,
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

                if (name.trim() === "") {
                    alert("Please enter a value");
                    return;
                }

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
                if (name.trim() === "") {
                    alert("Please enter a value");
                    return;
                }
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

            //AJAX for deleting TIP
            $("#TIPDEL").click(function () {
                var ID = $("#DELTIPname").val();
                if (ID.trim() === "") {
                    alert("Please enter a value");
                    return;
                }
                if (!$.isNumeric(ID)) {
                    alert("Please enter a valid integer");
                    return;
                }
                $.ajax({
                    url: 'php/TIPDEL.php',
                    method: 'POST',
                    data: {
                        ID: ID,
                    },
                    success: function (data) {
                        alert(data);
                    }
                });
            });

            //AJAX for deleting CATEGORY
            $("#CATDEL").click(function () {
                var name = $("#DELCATname").val();
                if (name.trim() === "") {
                    alert("Please enter a value");
                    return;
                }
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
                if (name.trim() === "") {
                    alert("Please enter a value");
                    return;
                }
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


            function displaySUB() {
                $.ajax({
                    url: 'php/displaySUB.php',
                    method: 'POST',
                    success: function (response) {
                        $("#resultsTableSUB").html(response);
                    }
                });
            }
            // Call the function on page load
            displaySUB();

            // Attach click event to the refresh button
            $("#refreshButtonSUB").click(function () {
                displaySUB();
            });

            function displayCAT() {
                $.ajax({
                    url: 'php/displayCAT.php',
                    method: 'POST',
                    success: function (response) {
                        $("#resultsTableCAT").html(response);
                    }
                });
            }
            // Call the function on page load
            displayCAT();

            // Attach click event to the refresh button
            $("#refreshButtonCAT").click(function () {
                displayCAT();
            });

            function displayTIPS() {
                $.ajax({
                    url: 'php/displayTIPS.php',
                    method: 'POST',
                    success: function (response) {
                        $("#resultsTableTIPS").html(response);
                    }
                });
            }
            // Call the function on page load
            displayTIPS();

            // Attach click event to the refresh button
            $("#refreshButton").click(function () {
                displayTIPS();
            });
        });


    </script>
    
    <script src="js\DashBoardTab.js"></script>

</body>