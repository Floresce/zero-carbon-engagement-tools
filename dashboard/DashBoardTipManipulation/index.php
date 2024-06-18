<!DOCTYPE html>
<html>
<?php include '../index.php'; ?>

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

        <!-- Old tabs inside tip modification
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Tips')">Tips</button>
        <button class="tablinks" onclick="openTab(event, 'Categorie')">Category</button>
        <button class="tablinks" onclick="openTab(event, 'Sub-Category')">Sub-Category</button>
    </div>
    -->

        <!-- Pop up modal normally hidden, shown when edit button is clicked -->
        <div id="edit-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <form>
                    <label for="tid-input">TID:</label>
                    <input type="text" name="tid" id="tid-input" value="#TID" readonly>
                    <label for="tip-desc-input">English Description:</label>
                    <input type="text" name="tip-desc" id="tip-desc-input">
                    <label for="spanish-desc-input">Spanish Description:</label>
                    <input type="text" name="spanish-desc" id="spanish-desc-input">
                    <label for="rate-input">Rate:</label>
                    <input type="text" name="rate" id="rate-input">
                    <label for="category-input">Category:</label>
                    <input type="text" name="category" id="category-input">
                    <label for="sub-category-input">Subcategory:</label>
                    <input type="text" name="sub-category" id="sub-category-input">
                    <label for="category-input">Primary links related to the tip:</label>
                    <input type="text" id="PLinks" name="category"><br>
                    <label for="category-input">Secondary links related to the tip:</label>
                    <input type="text" id="SLinks" name="category"><br>
                    <div class="button-wrapper">
                        <button type="button" id="deleteButtn">Delete</button>
                        <button type="button" id="modal-Save">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tips tab all corresponding fields -->
        <div id="Tips" class="tabcontent">
            <div id="tableDiv"></div>
            <div id="resultsTableTIPS" class="results-container"></div>
            <button id="refreshButton">Refresh</button>

            <!-- Adding new tips -->
            <button id="addTipButton">Add Tip</button>
            <div class="addTIPmodal" id="addTipModal">
                <div class="modal-content">
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
                    <label for="category-input">Primary links related to the tip:</label>
                    <input type="text" id="PLinks" name="category"><br>
                    <label for="category-input">Secondary links related to the tip:</label>
                    <input type="text" id="SLinks" name="category"><br>
                    <button type="addTip" id="TIPADD">SAVE</button>
                    <br> <br>
                </div>
            </div>
        </div>

        <!-- Category tab and corresponding fields-->
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

        <!-- Sub-Category tab and corresponding fields -->
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

    <!-- Beginning of scripts: ajax calls and lisenters-->
    <script>
        // Scipt to save input fields on modal when called
        $("#modal-Save").on("click", function () {
            // get values from input fields in modal
            var Tid = $("#tid-input").val();
            var ENdescription = $("#tip-desc-input").val();
            var ESdescription = $("#spanish-desc-input").val();
            var Category = $("#category-input").val();
            var Subcategory = $("#sub-category-input").val();
            var Rate = $("#rate-input").val();
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
                url: 'php/updateTip.php',
                method: 'POST',
                data: {
                    Tid: Tid,
                    ENdescription: ENdescription,
                    ESdescription: ESdescription,
                    Category: Category,
                    Subcategory: Subcategory,
                    Rate: Rate,
                    PLinks: PLinks,
                    SLinks: SLinks,                    

                },
                success: function (data) {
    if (data === "Your Tip Has Been Edited") {
        // Tip was successfully added, close the modal
        document.getElementById('edit-modal').style.display = 'none';
    } else {
        // Display an error message to the user
        
        alert(data);
    }
}

            });
        });

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
                        if (data === "Your Tip Has Been Added") {
        // Tip was successfully added, close the modal
        document.getElementById('modal').style.display = 'none';
     
    } else {
        // Display an error message to the user
        alert(data);
    }                    }

                });         clearModal();

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

            // AJAX for deleting TIP button
            $("#deleteButtn").click(function () {
                var Tid = $("#tid-input").val();

                $.ajax({
                    url: 'php/DELTIP.php',
                    method: 'POST',
                    data: {
                        Tid: Tid,
                    },
                    success: function (data) {
                        alert(data);
                        document.getElementById('edit-modal').style.display = 'none';// hide modal after deleting
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
                    url: 'php/DELCAT.php',
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
                    url: 'php/DELSUB.php',
                    method: 'POST',
                    data: {
                        name: name,
                    },
                    success: function (data) {
                        alert(data);

                    }
                });
            });

            // displays CATEGORIES 
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

            const closeBtn = document.querySelector('.close-btn');
            closeBtn.addEventListener('click', () => {
                // code to close the modal
                document.getElementById('edit-modal').style.display = 'none';
            });
            const addTipButton = document.getElementById("addTipButton");
            const addTipModal = document.getElementById("addTipModal");

            addTipButton.addEventListener("click", function () {
                addTipModal.style.display = "block";
            });

            window.addEventListener("click", function (event) {
                if (event.target == addTipModal) {
                    addTipModal.style.display = "none";
                }
            });

            // Function to close the modal and reset the input fields
            function clearModal() {
                // Reset the input values
                document.getElementById("ENdescription").value = "";
                document.getElementById("ESdescription").value = "";
                document.getElementById("Category").value = "";
                document.getElementById("Subcategory").value = "";
                document.getElementById("Rate").value = "";
                document.getElementById("PLinks").value = "";
                document.getElementById("SLinks").value = "";

                // Hide the modal
                addTipModal.style.display = "none";
            }

            document.getElementById("defaultTab").click();
        })
        
    </script>

    <script src="js\DashBoardTab.js"></script>

</body>