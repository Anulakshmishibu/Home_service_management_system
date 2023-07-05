<?php
// Retrieve the form data
$name = $_POST['name'];
$age = $_POST['age'];
$experience = $_POST['experience'];
$area = $_POST['area'];
$email = $_POST['email'];
$phn_no = $_POST['phn_no'];

// Save the application to the database (you need to set up your database connection)
$con = mysqli_connect('localhost', 'root', '', 'home');

if ($con === false) {
  die("Error: Could not connect to the database");
}

// Prepare the insert statement
$stmt = mysqli_prepare($con, "INSERT INTO apply (name, age, experience, area, email, phn_no) VALUES (?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
  die("Error: " . mysqli_error($con));
}

// Bind the parameters and execute the statement
mysqli_stmt_bind_param($stmt, "sissss", $name, $age, $experience, $area, $email, $phn_no);
mysqli_stmt_execute($stmt);

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);

// Redirect back to the signup form with a success message
header("Location: apply.html?success=true");
echo '<meta http-equiv="refresh" content="3; URL=worker.html" />';
exit();
?>
