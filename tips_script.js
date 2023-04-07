$(document).ready(function() {
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

                  //console.log("User clicked 'Dislike' for Tip " + tipId);                       // Check if event listener is working, prints in web browser console log
                  
                  // Disable the 'dislike' button for this tip
                  // Disabled 'dislike' button then acts as a visual highlight when clicked 
                  var likeBtn = document.getElementById("likeBtn-" + tipId);
                  this.disabled = true;                                                           // Dislike button is disabled and cannot be clicked again
                  likeBtn.style.pointerEvents = 'none';                                           // Like button cannot be interacted with
                  
                  // Store the state of this tip in sessionStorage
                  sessionStorage.setItem("tip-" + tipId, "dislike");
                  callDislikeFunction(tipId);
              });

              $('.atpBtn').on('click', function() {
                  // Expected format of button id is 'atpBtn-1', where the number represents the tip id
                  var tipId = this.id.split("-")[1];                                              // Get the tip id from the button id
              
                  console.log("User clicked 'Add To Plan' for Tip " + tipId);                     // Check if event listener is working, prints in web browser console log
                  
                  // Disable the 'atp' button for this tip
                  var atpBtn = document.getElementById("atpBtn-" + tipId);
                  var atpDiv = document.getElementById("atpDiv-" + tipId);
                  
                  const tipsPlan = (sessionStorage.getItem("tipsPlan") != null) ? JSON.parse(sessionStorage.getItem("tipsPlan")) : [];

                  if(tipsPlan.length < 5)
                  {
                     tipsPlan.push(tipId);
                     const tipsPlanJSON = JSON.stringify(tipsPlan);
                     sessionStorage.setItem("tipsPlan", tipsPlanJSON); 
                     sessionStorage.setItem("atpBtn-" + tipId, "disabled");
                     sessionStorage.setItem("atpDiv-" + tipId, "Added to plan!");
                     this.style.visibility = "hidden";
                     atpDiv.innerText = sessionStorage.getItem("atpDiv-" + tipId);
                     console.log(tipsPlan);
                     console.log(sessionStorage.getItem("tipsPlan"));
                  }
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

    if(sessionStorage.getItem("tipsPlan") != null) 
    {
        // make print button visible
        $('#printBtn').prop('disabled', false);

        // grab tips plan from session storage
        var tipsPlan = JSON.parse(sessionStorage.getItem("tipsPlan"));
        console.log(tipsPlan);
        for(var i = 0; i < tipsPlan.length; i++)
        {
            $('#tipsPlanStart').html("");
            var tipId = tipsPlan[i];

            // query database for the tip id & description using an Id
            $.ajax({
                type: "GET",
                data: {tipId: tipId},
                url: "tipsPlan.php",
                success: function(response) {
                    // if successful, append the data to the modal body
                    console.log(response);
                    var planRowContents = "-";
                    planRowContents += response[0].T_DESC_ENGLISH;
                    planRowContents += "<br><br>";
                    var planRow = document.createElement('div');
                    planRow.innerHTML = planRowContents;
                    $('#tipsPlanStart').append(planRow);
                     $('#tipsModal').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Error code
                    console.log(textStatus + ": " + errorThrown);
                }
            });
        }
    }
    else
    {
        // if the plan is empty on session storage, provide a message saying so on the modal
        console.log("tips plan null");
        var planRowContents = "No tips added to plan yet! Check back when you have added some.<br>";
        var planRow = document.createElement('div');
        planRow.innerHTML = planRowContents;
    
        $('#tipsPlanStart').html("");
        $('#tipsPlanStart').append(planRow);
        $('#printBtn').prop('disabled', true);
        $('#tipsModal').modal('show');
    }
  });

}); // End of $(document).ready(function() {

      //ToDo: add error handling to below functions
  //calls addDislike() in tips.php which increments dislike count in DB
  function callDislikeFunction(id) {
    $.ajax({
        url: "tips.php",
        type: "POST",
        data: {
            function_name: 'addDislike',
            arguments: [id]
        }, 
        success: function(id){
            console.log("JS working for id " + id);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Error code
            console.log(textStatus + ": " + errorThrown);
        }
    });   
}

//calls addLike() in tips.php which increments like count in DB
function callLikeFunction(id) {
    console.log("calling like function for tip" + id);
	$.ajax({
		url: "tips.php",
		type: "POST",
		data: {
			function_name: ['addLike'],
			tId: [id]
		},
	});   
  }
  
  //calls getLikes() in tips.php which gets the current like count from the DB
//   function callGetLikesFunction(id) {
// 	  var count = 0;
// 	  $.ajax({
// 		  url: "tips_feedback.php",
// 		  type: "POST",
// 		  data: {
// 			  function_name: "getLikes",
// 			  arguments: id
// 		  },
// 		  success: function(data) {
// 			  count = data;
// 		  },
//           error: function(jqXHR, textStatus, errorThrown) {
//             // Error code
//             console.log(textStatus + ": " + errorThrown);
//         }
// 	  });   
// 	  return count;
// 	}
	
// 	//calls getDislikes() in tips.php which gets the current dislike count from the DB
// 	function callGetDislikesFunction(id) {
// 	  var count = 0;
// 	  $.ajax({
// 		  url: "tips_feedback.php",
// 		  type: "POST",
// 		  data: {
// 			  function_name: "getDislikes",
// 			  arguments: [id]
// 		  },
// 		  success: function(data) {
// 			  count = data;
// 		  },
//           error: function(jqXHR, textStatus, errorThrown) {
//             // Error code
//             console.log(textStatus + ": " + errorThrown);
//         }
// 	  });
// 	  return count;  
	  
// 	}

