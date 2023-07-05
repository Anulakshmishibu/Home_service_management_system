<?php
$con = mysqli_connect('localhost', 'root', '','home');
$name = $_POST["name"];
$email = $_POST['email'];
$sub = $_POST['sub'];
$msg = $_POST['msg'];

$result = mysqli_query($con,"INSERT INTO `contact`(`name`, `email`, `sub`, `msg`) VALUES ('$name','$email','$sub','$msg')");

echo ' <meta http-equiv="refresh" content="9; URL=confirm.html" />';
?>