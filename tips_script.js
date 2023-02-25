$(document).ready(function() {
	// Submit form
	$('#tips_form').submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'tips.php',
			data: $(this).serialize(),
			success: function(response)
			{
				$('#result').html(response);

				// Bind the click event to dynamically generated like and dislike buttons
				$('.likeBtn').on('click', function() {
					// Expected format of button id is 'likeBtn-1', where the number represents the tip id
                    // split("-") method is used to split the id string at the "-" character, 
                    // creating an array with two elements: 'likeBtn' and the tip id
                    // The [1] index is used to select the second element of the array
                    var tipId = this.id.split("-")[1];                                              // Get the tip id from the button id

                    //console.log("User clicked 'Like' for Tip " + tipId);                            // Check if event listener is working, prints in web browser console log
                    
                    // Disable the 'dislike' button for this tip
                    var dislikeBtn = document.getElementById("dislikeBtn-" + tipId);
                    this.disabled = false;                                                          // Like button is not disabled
                    this.style.pointerEvents = 'none';                                              // Like button cannot be clicked again
                    dislikeBtn.disabled = true;                                                     // Dislike button is disabled
                    dislikeBtn.style.pointerEvents = 'none';                                        // Dislike button cannot be clicked again
                    
                    // Store the state of this tip in sessionStorage
                    sessionStorage.setItem("tip-" + tipId, "like");
				});
				
				$('.dislikeBtn').on('click', function() {
					// Expected format of button id is 'dislikeBtn-1', where the number represents the tip id
                    // split("-") method is used to split the id string at the "-" character, 
                    // creating an array with two elements: 'dislikeBtn' and the tip id
                    // The [1] index is used to select the second element of the array
                    var tipId = this.id.split("-")[1];                                              // Get the tip id from the button id

                    //console.log("User clicked 'Dislike' for Tip " + tipId);                         // Check if event listener is working, prints in web browser console log
                    
                    // Disable the 'like' button for this tip
                    var likeBtn = document.getElementById("likeBtn-" + tipId);
                    this.disabled = false;                                                          // Dislike button is not disabled
                    this.style.pointerEvents = 'none';                                              // Dislike button cannot be clicked again
                    likeBtn.disabled = true;                                                        // Like button is disabled
                    likeBtn.style.pointerEvents = 'none';                                           // Like button cannot be clicked again
                    
                    // Store the state of this tip in sessionStorage
                    sessionStorage.setItem("tip-" + tipId, "dislike");
				});

				// Retrieve the state of each tip from sessionStorage
				$('.likeBtn').each(function() {
					var tipId = this.id.split("-")[1];
					var state = sessionStorage.getItem("tip-" + tipId);
					if (state === "like") {
						this.disabled = false;
						this.style.pointerEvents = 'none';
						var dislikeBtn = document.getElementById("dislikeBtn-" + tipId);
						dislikeBtn.disabled = true;
						dislikeBtn.style.pointerEvents = 'none';
					} else if (state === "dislike") {
						var dislikeBtn = document.getElementById("dislikeBtn-" + tipId);
						dislikeBtn.disabled = false;
						dislikeBtn.style.pointerEvents = 'none';
						this.disabled = true;
						this.style.pointerEvents = 'none';
					}
				});

				$('.dislikeBtn').each(function() {
					var tipId = this.id.split("-")[1];
					var state = sessionStorage.getItem("tip-" + tipId);
					if (state === "dislike") {
						this.disabled = false;
						this.style.pointerEvents = 'none';
						var likeBtn = document.getElementById("likeBtn-" + tipId);
						likeBtn.disabled = true;
						likeBtn.style.pointerEvents = 'none';
					} else if (state === "like") {
						var likeBtn = document.getElementById("likeBtn-" + tipId);
						likeBtn.disabled = false;
						likeBtn.style.pointerEvents = 'none';
						this.disabled = true;
						this.style.pointerEvents = 'none';
					}
				});
			}
		});
	});
});