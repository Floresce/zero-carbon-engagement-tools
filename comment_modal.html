<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Modal for leaving comments -->
<div class="modal fade" id="commentModal-<?php echo $tipId; ?>" tabindex="-1" aria-labelledby="commentModalLabel-<?php echo $tipId; ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalLabel-<?php echo $tipId; ?>">Leave a Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" id="comment-<?php echo $tipId; ?>" rows="3"></textarea>
          </div>
          <div class="form-group" id="commentSuccess-<?php echo $tipId; ?>" style="display:none;">
            <p class="text-success">Comment submitted successfully!</p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="commentBtn-<?php echo $tipId; ?>" data-tipid="<?php echo $tipId; ?>">Comment</button>
      </div>
    </div>
  </div>
</div>

<!-- Button to trigger the modal -->
<button type="button" class="btn btn-link" id="openCommentModal-<?php echo $tipId; ?>" data-tipid="<?php echo $tipId; ?>">Leave a Comment</button>

<script>
$(document).ready(function() {
  // Add a click event listener to the button that opens the modal
  $('#openCommentModal-<?php echo $tipId; ?>').click(function() {
    // Show the modal when the button is clicked
    $('#commentModal-<?php echo $tipId; ?>').modal('show');
  });

  $('#commentBtn-<?php echo $tipId; ?>').click(function() {
    var tipId = $(this).data('tipid');
    var comment = $('#comment-' + tipId).val();
    var submitBtn = $(this);
    var currentDate = new Date();
    var formattedDate = currentDate.toISOString();            // Format date as string in ISO format

    console.log('tipId:', tipId);                             // Check if values are correct, prints in web browser console log
    console.log('comment:', comment);
    console.log('date:', formattedDate);

    $.ajax({
        url: 'comment_submit.php',
        type: 'post',
        data: {tipId: tipId, comment: comment, date: formattedDate},
        success: function(response) {
            // Handle success response from server
            submitBtn.remove();                                   // Remove the Comment button
            $('#commentSuccess-' + tipId).show();
            sessionStorage.setItem('comment-' + tipId, comment);  // Save comment text
            sessionStorage.setItem('success-' + tipId, 'true');   // Save success message state
        },
        error: function(xhr, status, error) {
            // Handle error response from server
            console.log('Error: ' + error);
        }
    });
  });
});
</script>

