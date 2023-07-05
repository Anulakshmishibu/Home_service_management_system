<?php
$con = mysqli_connect('localhost', 'root', '','home');
$name = $_POST['name'];
$mobileno =$_POST['mobileno'];
$email = $_POST['email'];
$services = $_POST['services'];
$date = $_POST['date'];
$area = $_POST['area'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pin'];

$result = mysqli_query($con,"INSERT INTO `booking`( `name`, `mobile no`, `email`, `services`, `date`, `area`, `city`, `state`, `pin`) VALUES ('$name','$mobileno','$email','$services','$date','$area','$city','$state','$pin')");

echo ' <meta http-equiv="refresh" content="9; URL=confirm.html" />';
?>