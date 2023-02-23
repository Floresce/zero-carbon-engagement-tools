
	$(document).ready(function() {
		$('#tips_form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: 'tips.php',
				data: $(this).serialize(),
				success: function(response)
				{
					$('#result').html(response);
				}
			});
		});
	});
