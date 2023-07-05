<?php
$con = mysqli_connect('localhost', 'root', '','home');



$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$usertype =$_POST['usertype'];

$result = mysqli_query($con,"INSERT INTO `signup`(`user name`, `email`, `password`, `usertype`) VALUES ('$username','$email','$password','$usertype')");

echo ' <meta http-equiv="refresh" content="3; URL=login.html" />';
?>