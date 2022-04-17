
<?php
	include("connect.php");
	$id = $_GET['id'];
	$q = "delete from publishertb where publisherId = $id ";
	mysqli_query($con,$q);
	header('location:index.php');
?>