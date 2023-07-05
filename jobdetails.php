<?php
// Retrieve job details based on the ID passed through URL
$jobId = $_GET['id'];

// Fetch job details based on the job ID from a database or API
$jobDetails = getJobDetails($jobId);

// Display the job details on the page
echo '<h2>' . $jobDetails['title'] . '</h2>';
echo '<p>Company: ' . $jobDetails['company'] . '</p>';
echo '<p>Location: ' . $jobDetails['location'] . '</p>';
echo '<p>Description: ' . $jobDetails['description'] . '</p>';
echo '<a href="apply.php?id=' . $jobDetails['id'] . '">Apply</a>';
?>
