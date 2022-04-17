
<?php
	include("connect.php");
	$id = $_GET['issueid'];
	$q = "update returntb set paymentStatus='YES' where issueId=$id ";
	mysqli_query($con,$q);
	// header('location:index.php');
?>