<!DOCTYPE html>
<html>
<head>
  <title>Admin Page - View/Delete Services</title>
  <style>
    /* Add your CSS styles here */
  </style>
</head>
<body>
<header>

        <div class="container">
        <h1>View/Delete Services</h1>
            <div class="logo">
                <a href="#home"><img src="2023-04-01.png" alt="logo" height="50" width="50"></a>
            </div>
            <i class="fas fa-bars menu-bar"></i>
            <nav>
                <ul>
                    <li><a href="aserv.html" class="active">Add</a></li>
                   
                </ul>
            </nav>
        </div>
    </header>
  

    <table>
      <tr>
        <th>Service Name</th>
        <th>Description</th>
        <th>Job Requirements</th>
        <th>Action</th>
      </tr>
      <style>/* styles.css */

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
      <?php
      // Database connection
      $con = mysqli_connect('localhost', 'root', '', 'home');

      if ($con === false) {
        die("Error: Could not connect to the database");
      }

      // Retrieve services from the database
      $result = mysqli_query($con, "SELECT * FROM adserv");

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['service']."</td>";
          echo "<td>".$row['description']."</td>";
          echo "<td>".$row['requirements']."</td>";
          echo "<td><a href='?delete=".$row['id']."'>Delete</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No services found.</td></tr>";
      }

      // Handle service deletion
      if (isset($_GET['delete'])) {
        $serviceId = $_GET['delete'];

        // Prepare the delete statement
        $stmt = mysqli_prepare($con, "DELETE FROM adserv WHERE services = ?");

        if ($stmt === false) {
          die("Error: " . mysqli_error($con));
        }

        // Bind the service ID as a parameter
        mysqli_stmt_bind_param($stmt, "i", $serviceId);

        // Execute the delete statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        // Redirect back to the admin page
        header("Location: adserv.php");
        exit();
      }

      mysqli_close($con);
      ?>
    </table>
  </div>
</body>
</html>
