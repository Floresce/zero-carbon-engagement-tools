$(document).ready(function() {

const searchBox = document.getElementById("search-box");
const min_length = 3;

function submitSearch(event) {
  event.preventDefault(); //Prevents form submission and will give an alert 
  const query = searchBox.value.trim();
    if (query.length < min_length) {
      alert("Search keyword must be at least " + min_length + " characters long.");
      return;
  }
  //if the minimum keyword length meets the requirments, then the form will be set to search.php and submitted
    else{
      const form = document.getElementById("search_form");
      form.action = "search.php"; 
      form.submit(); 
  }
}

//Add event listener to the form element
const searchForm = document.getElementById("search_form");
searchForm.addEventListener("submit", submitSearch);


  //will allow the search results to pass in the URL
  /*Have to check if search-results exsists before setting the innerHTML
  If it doesn't then the code will not execute, preventing a 
  "Cannot set properties of null (setting 'innerHTML')" error in the index.html 
  The innerHTML exsists in the results.html file and will execute the code*/
const searchResultsElement = document.getElementById("search-results");
  if (searchResultsElement !== null) {
    let searchResults = new URLSearchParams(window.location.search).get('search_results');
    searchResultsElement.innerHTML = searchResults;


  //If there are 0 results for a search, then a message will be displayed
  if (searchResults == 0) {
    const searchResultsElement = document.getElementById("search-results");
    searchResultsElement.innerHTML = "No results found for your search, please try again.";
    searchResultsElement.style.fontSize = "24px"; 
  }

  const titleElement = document.getElementById("title");
    let title = new URLSearchParams(window.location.search).get('title');
    titleElement.innerHTML = title;
  }
  
}); // End of $(document).ready(function() {
