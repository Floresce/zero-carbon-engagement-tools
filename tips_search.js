$(document).ready(function() {

  // Bind a submit event handler to the form
  $('#search_form').on('submit', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get the form data
    var formData = $(this).serialize();

    // Store the reference to the form
    var form = this;

    // Make an AJAX request to the PHP file
    $.ajax({
      type: 'POST',
      url: 'search.php',
      data: formData,
      dataType: 'html',
      success: function(response) {
        // Handle the response
        $("#search-results").html(response);

        // Update the URL query parameter with the current search query
        const searchQuery = $(form).find('[name=query]').val();
        const url = new URL(window.location.href);
        url.searchParams.set('query', searchQuery);
        window.history.pushState({}, '', url.toString());
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText);
      }
    });
  });
}); // End of $(document).ready(function() {
