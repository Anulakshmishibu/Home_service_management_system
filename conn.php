<?php
$con = mysqli_connect('localhost', 'root', '', 'home');

$email = $_POST['email'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

$result = mysqli_query($con, "SELECT * FROM `signup` WHERE email='$email' and password='$password'");
$res = mysqli_fetch_assoc($result);
while ($row = mysqli_fetch_assoc($result)){
    $email = $row['email'];
}
if ($res) {
    session_start();
    $_SESSION ['email']=$email;

    if ($usertype == "admin") {
        // Redirect to admin page
        echo '<meta http-equiv="refresh" content="3; URL=admin.html" />';
    } elseif ($usertype == "worker") {
        // Redirect to user page
        echo '<meta http-equiv="refresh" content="3; URL=worker.html" />';
    } elseif ($usertype == "user") {
        // Redirect to worker page
        
        echo '<meta http-equiv="refresh" content="3; URL=services.html" />';
    } else {
        // Invalid user type
        echo 'Invalid user type';
    }
} else {
    echo 'Login not successful';
}
?>
