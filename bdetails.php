<!DOCTYPE html>
<html>
<head>
  <title>Admin Page - workers side</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
<header>
  <div class="container">
    <h1>Booking status</h1>
    <div class="logo">
      <a href="#home"><img src="2023-04-01.png" alt="logo" height="50" width="50"></a>
    </div>
  </div>
</header>

<table>
  <tr>
    <th>Name</th>
    <th>Mobile No</th>
    <th>Email</th>
    <th>Services</th>
    <th>Date</th>
    <th>Area</th>
    <th>City</th>
    <th>State</th>
    <th>Pin</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  // Database connection
  $con = mysqli_connect('localhost', 'root', '', 'home');
  session_start();
  $shilpa = $_SESSION['email'];
  if ($con === false) {
    die("Error: Could not connect to the database");
  }

  // Retrieve services from the database
  $result = mysqli_query($con, "SELECT * FROM booking  where email='$shilpa'");

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['mobile no']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['services']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['area']."</td>";
      echo "<td>".$row['city']."</td>";
      echo "<td>".$row['state']."</td>";
      echo "<td>".$row['pin']."</td>";

      if ($row['status'] == 0) {
        echo "<td>waiting</td>";
      } else {
        echo "<td>approved</td>";
      }

      echo "<td><a href='?delete=".$row['email']."'>delete</a></td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='11'>No services found.</td></tr>";
  }

  // Handle status update
  if (isset($_GET['delete'])) {
    $email = $_GET['delete'];

    // Prepare the update statement
    $stmt = mysqli_prepare($con, "UPDATE booking SET status = 1 WHERE email = ?");

    if ($stmt === false) {
      die("Error: " . mysqli_error($con));
    }

    // Bind the email as a parameter
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the update statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect back to the admin page
    header("Location: bdetails.php");
    exit();
  }

  mysqli_close($con);
  ?>
</table>

</body>
</html>
