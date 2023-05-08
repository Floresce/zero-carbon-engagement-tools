$(document).ready(function() {
    // Get all tips and populate them on the page
    $.ajax({
      type: 'POST',
      url: 'tips.php', // Replace with the actual URL to fetch data from the database
      data: {
        category: 'All Categories',
        subcategory: 'All Subcategories'
      },
      success: function(response) {
        // Populate the retrieved HTML response to the element with id 'result'
        $('#result').html(response);
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(error);
      }
    });
      
  // Submit form
  $('#tips_form').submit(function(e) {
      e.preventDefault();
      // AJAX request
      $.ajax({
          type: 'POST',
          url: 'tips.php',
          data: $(this).serialize(),
          success: function(response) {
              $('#result').html(response);

              // Bind the click event to dynamically generate like and dislike buttons
              $('.likeBtn').on('click', function() {
                  // Expected format of button id is 'likeBtn-1', where the number represents the tip id
                  // split("-") method is used to split the id string at the "-" character, 
                  // creating an array with two elements: 'likeBtn' and the tip id
                  // The [1] index is used to select the second element of the array
                  var tipId = this.id.split("-")[1];                                              // Get the tip id from the button id
                  
                  console.log("User clicked 'Like' for Tip " + tipId);                          // Check if event listener is working, prints in web browser console log
                  callLikeFunction(tipId);

                  // Disable the 'like' button for this tip
                  // Disabled 'like' button then acts as a visual highlight when clicked 
                  var dislikeBtn = document.getElementById("dislikeBtn-" + tipId);
                  this.disabled = true;                                                           // Like button is disabled and cannot be clicked again
                  dislikeBtn.style.pointerEvents = 'none';                                        // Dislike button cannot be interacted with

                  // Store the state of this tip in sessionStorage
                  sessionStorage.setItem("tip-" + tipId, "like");
                  
              });
              
              $('.dislikeBtn').on('click', function() {
                  // Expected format of button id is 'dislikeBtn-1', where the number represents the tip id
                  // split("-") method is used to split the id string at the "-" character, 
                  // creating an array with two elements: 'dislikeBtn' and the tip id
                  // The [1] index is used to select the second element of the array
                  var tipId = this.id.split("-")[1];                                              // Get the tip id from the button id
                  callDislikeFunction(tipId);
                  //console.log("User clicked 'Dislike' for Tip " + tipId);                       // Check if event listener is working, prints in web browser console log
                  
                  // Disable the 'dislike' button for this tip
                  // Disabled 'dislike' button then acts as a visual highlight when clicked 
                  var likeBtn = document.getElementById("likeBtn-" + tipId);
                  this.disabled = true;                                                           // Dislike button is disabled and cannot be clicked again
                  likeBtn.style.pointerEvents = 'none';                                           // Like button cannot be interacted with
                  
                  // Store the state of this tip in sessionStorage
                  sessionStorage.setItem("tip-" + tipId, "dislike");
              });

                // add to plan button functionality under each tip
                $('.atpBtn').on('click', function() {
                    // Expected format of button id is 'atpBtn-1', where the number represents the tip id
                    var tipId = this.id.split("-")[1];                                              // Get the tip id from the button id
                
                    //console.log("User clicked 'Add To Plan' for Tip " + tipId);                     // Check if event listener is working, prints in web browser console log
                    var atpBtn = document.getElementById("atpBtn-" + tipId);
                    var atpDiv = document.getElementById("atpDiv-" + tipId);
                    
                    // modify session storage to reflect tips plan
                    const tipsPlan = (sessionStorage.getItem("tipsPlan") != null) ? JSON.parse(sessionStorage.getItem("tipsPlan")) : [];
                    tipsPlan.push(tipId);
                    const tipsPlanJSON = JSON.stringify(tipsPlan);
                    sessionStorage.setItem("tipsPlan", tipsPlanJSON);
                    sessionStorage.setItem("atpBtn-" + tipId, "disabled");
                    sessionStorage.setItem("atpDiv-" + tipId, "Added to plan!");
    
                    // change visibility of add to plan button
                    this.style.visibility = "hidden";
                    // retrieve added to plan div text in session storage
                    atpDiv.innerText = sessionStorage.getItem("atpDiv-" + tipId);
    
                    showCart(tipsPlan, true);

                    $.ajax({
                        url: '/dashboard/main/php/increment_addtoplan.php?id=' + tipId,
                        method: 'POST'
                    })
    
                });

              // Retrieve the state of each tip from sessionStorage
              $('.likeBtn').each(function() {
                  var tipId = this.id.split("-")[1];
                  var state = sessionStorage.getItem("tip-" + tipId);
                  if (state === "like") {
                      this.disabled = true;
                      var dislikeBtn = document.getElementById("dislikeBtn-" + tipId);
                      dislikeBtn.style.pointerEvents = 'none';
                  } else if (state === "dislike") {
                      var dislikeBtn = document.getElementById("dislikeBtn-" + tipId);
                      dislikeBtn.disabled = true;
                      this.style.pointerEvents = 'none';
                  }
              });

              $('.dislikeBtn').each(function() {
                  var tipId = this.id.split("-")[1];
                  var state = sessionStorage.getItem("tip-" + tipId);
                  if (state === "dislike") {
                      this.disabled = true;
                      var likeBtn = document.getElementById("likeBtn-" + tipId);
                      likeBtn.style.pointerEvents = 'none';
                  } else if (state === "like") {
                      var likeBtn = document.getElementById("likeBtn-" + tipId);
                      likeBtn.disabled = true;
                      this.style.pointerEvents = 'none';
                  }
              });

              $('.atpBtn').each(function() {
                var tipId = this.id.split("-")[1];
                var state = sessionStorage.getItem("atpBtn-" + tipId);
                if (state === "disabled") {
                    this.style.visibility = "hidden";
                } else {
                    this.style.visibility = "visible";
                }
              });

          } // End of success: function(response) {
      }); // End of ajax $.ajax({
  }); // End of $('#tips_form').submit(function(e) {

  // check plan button functionality
  $('#planBtn').on('click', function() {

    const tipsPlan = (sessionStorage.getItem("tipsPlan") != null) ? JSON.parse(sessionStorage.getItem("tipsPlan")) : [];

    showCart(tipsPlan, false);
  });

}); // End of $(document).ready(function() {

      //ToDo: add error handling to below functions
  //calls addDislike() in tips.php which increments dislike count in DB
  function callDislikeFunction(id) {
    // $.ajax({
    //     url: "tips.php",
    //     type: "POST",
    //     data: {
    //         function_name: 'addDislike',
    //         args: [id]
    //     }
    // });   
    $.ajax({
        url: '/dashboard/main/php/increment_dislike.php?id=' + id,
        method: 'POST'
    })
}

//calls addLike() in tips.php which increments like count in DB
function callLikeFunction(id) {
    // $.ajax({
    //     url: "tips.php",
    //     type: "POST",
    //     data: {
    //         function_name: 'addLike',
    //         args: [id]
    //     }
    // });    
    $.ajax({
        url: '/dashboard/main/php/increment_like.php?id=' + id,
        method: 'POST'
    })
  }

function showCart(tipsPlan, makeVisible)
{
    if (sessionStorage.getItem("tipsPlan") != null) {
        // make print button visible
        $('#printBtn').prop('disabled', false);

        // grab tips plan from session storage
        //var tipsPlan = JSON.parse(sessionStorage.getItem("tipsPlan"));
        for (let tip in tipsPlan) {
            $('#tipsPlanStart').html("");

            // query database for the tip id & description using an Id
            $.ajax({
                type: "GET",
                data: { tipId: tipsPlan[tip] },
                url: "tipsPlan.php",
                success: function (response) {
                    // if successful, append the data to the tips canvas body
                    var planRowContents = `<button type="button" class="btn btn-success trashBtn" id="trashBtn-${tipsPlan[tip]}" aria-label="RemoveFromPlan"><span class="material-symbols-rounded">delete</span></button>`;
                    planRowContents += " - ";
                    planRowContents += response[0].T_DESC_ENGLISH;
                    planRowContents += "<br><br>";

                    var planRow = document.createElement('div');
                    planRow.setAttribute("id", `tipsCanvasDiv-${tipsPlan[tip]}`);
                    planRow.setAttribute("style", 'line-height:2');
                    planRow.innerHTML = planRowContents;
                    $('#tipsPlanStart').append(planRow);

                    // trash button listener
                    $(`#trashBtn-${tipsPlan[tip]}`).on('click', function() {
                      var trashBtnTipId = this.id.split("-")[1];
                      var trashTipsPlan = (sessionStorage.getItem("tipsPlan") != null) ? JSON.parse(sessionStorage.getItem("tipsPlan")) : [];
                      if(trashTipsPlan.length > 0)
                      {
                          // remove associated tip from session storage
                          var trashIndex = trashTipsPlan.indexOf(trashBtnTipId);
                          if (trashIndex > -1) {
                              trashTipsPlan.splice(trashIndex, 1);
                          }
                          console.log("After: " + trashTipsPlan);
                          const trashTipsPlanJSON = JSON.stringify(trashTipsPlan);
                          sessionStorage.setItem("tipsPlan", trashTipsPlanJSON);
                          sessionStorage.setItem("atpBtn-" + trashBtnTipId, "enabled");
                          sessionStorage.setItem("atpDiv-" + trashBtnTipId, "");

                          // modify html page to reflect changes
                          $(`#atpDiv-${trashBtnTipId}`).text(sessionStorage.getItem("atpDiv-" + trashBtnTipId));
                          $(`#atpBtn-${trashBtnTipId}`).css("visibility", "visible");
                          $(`#tipsCanvasDiv-${trashBtnTipId}`).remove();
                      }
                      trashTipsPlan = (sessionStorage.getItem("tipsPlan") != null) ? JSON.parse(sessionStorage.getItem("tipsPlan")) : [];
                      if(trashTipsPlan <= 0)
                      {
                        isEmptyCart();
                      }
                    });

                    // show the canvas if makeVisible = true
                    if(makeVisible)
                    {
                        $('#tipsCanvasRight').offcanvas('show');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Error code
                    console.log(textStatus + ": " + errorThrown);
                }
            });
        }
    }
}

function isEmptyCart()
{
        // if the plan is empty on session storage, provide a message saying so on the tips canvas
        var planRowContents = "No tips added to plan yet! Check back when you have added some.<br>";
        var planRow = document.createElement('div');
        planRow.setAttribute("style", 'line-height:2');
        planRow.innerHTML = planRowContents;

        $('#tipsPlanStart').html("");
        $('#tipsPlanStart').append(planRow);
        $('#printBtn').prop('disabled', true);
}