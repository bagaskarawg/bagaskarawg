<?php
	include 'config.php';
	// menyimpan data kedalam variabel
	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender	= $_POST['gender'];
	$country= $_POST['country'];
	$subject= $_POST['subject'];
	// query SQL untuk insert data
	$query="INSERT INTO message SET name='$name',email='$email',gender='$gender',country='$country',subject='$subject'";
	mysqli_query($link, $query);
	// mengalihkan ke halaman index.php
	header("location:message.php");
?>