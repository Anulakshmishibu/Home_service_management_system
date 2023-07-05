<?php
// Retrieve the form data
$id = $_POST['id'];
$service = $_POST['service'];
$description = $_POST['description'];
$requirements = $_POST['requirements'];

// Save the service/job details to the database (you need to set up your database connection)
$con = mysqli_connect('localhost', 'root', '', 'home');

if ($con === false) {
  die("Error: Could not connect to the database");
}

// Prepare the insert statement
$stmt = mysqli_prepare($con, "INSERT INTO adserv (id, service, description, requirements) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
  die("Error: " . mysqli_error($con));
}

// Bind the parameters and execute the statement
mysqli_stmt_bind_param($stmt, "ssss", $id, $service, $description, $requirements);
mysqli_stmt_execute($stmt);

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);

// Redirect back to the admin page with a success message
header("Location: aserv.html?success=true" );
exit();
?>
