<?php
$con = mysqli_connect('localhost', 'root', '','home');
$name = $_POST['name'];
$mobileno =$_POST['mobileno'];
$email = $_POST['email'];
$planning = $_POST['planning'];
$area = $_POST['area'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['bin'];
$result = mysqli_query($con,"INSERT INTO `order`(`name`, `mobile no`, `email`, `planning`, `area`, `city`, `state`, `bin`) VALUES ('$name','$mobileno','$email','$planning','$area','$city','$state','$pin')");

echo ' <meta http-equiv="refresh" content="9; URL=confirm.html" />';
?>