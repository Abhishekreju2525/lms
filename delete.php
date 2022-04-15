
<?php
	include("connect.php");
	$id = $_GET['id'];
	$q = "delete from bookstb where bookId = $id ";
	mysqli_query($con,$q);
	header('location:index.php');
?>