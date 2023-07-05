<?php
// Retrieve search keyword from form submission
$keyword = $_GET['keyword'];

// Perform search operation using the keyword
// Fetch job listings based on the search criteria from a database or API
$jobListings = searchJobListings($keyword);

// Redirect back to the main page with search results
header("Location: index.php?keyword=" . urlencode($keyword));
exit;
?>
