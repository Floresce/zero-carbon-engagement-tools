$(document).ready(function() {
  loadCategories();
});

function loadCategories() {
  $.ajax({
      url: 'tips_dropdown_menu.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        console.log(data.subcategories.length);
          var categoryDropdown = $('#category');
          categoryDropdown.empty();
          categoryDropdown.append('<option value="" disabled selected>Choose a category</option>');
          categoryDropdown.append('<option value="All Categories">All Categories</option>');
          $.each(data.categories, function(index, category) {
              categoryDropdown.append('<option value="' + category + '">' + category + '</option>');
          });
              
          var subcategoryDropdown = $('#subcategory');
          subcategoryDropdown.append('<option value="" disabled selected>Choose a category first</option>');
          categoryDropdown.on('change', function() {
              var category = $(this).val();
              if (category !== '') {
                  subcategoryDropdown.empty();
                  subcategoryDropdown.append('<option value="All Subcategories">All Subcategories</option>');
                  $.each(data.subcategories[category], function(index, subcategory) {
                      subcategoryDropdown.append('<option value="' + subcategory + '">' + subcategory + '</option>');
                  });
              }

              if(category == 'All Categories'){
                  subcategoryDropdown.empty();
                  subcategoryDropdown.append('<option value="All Subcategories">All Subcategories</option>');
                  for (let i = 0; i < data.allsub.length; i++) {
                      subcategoryDropdown.append($('<option></option>').val(data.allsub[i]).html(data.allsub[i]));
                  }
              }



          });
      },
      error: function(xhr, status, error) {
          console.log('Error: ' + error);
      }
  });
}
