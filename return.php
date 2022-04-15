
<?php
	include("connect.php");
	$issue_id = $_GET['issueid'];
	echo $_GET['issueid'];
	$q = "update issuetb set returned='YES' where issueId=$issue_id";
	mysqli_query($con,$q);
	$r = "update bookstb set bookQty=bookQty+1 where bookId=(select bookId from issuetb where issueId=$issue_id)";

	mysqli_query($con,$r);
	$s = "select returnDate as Date from issuetb where issueId=$issue_id;insert into returntb(issueId,returnedDate,lateDays,lateFee) values($issue_id,curdate(),Date,'100')";

	mysqli_query($con,$s);
	// echo 
	header('location:mybooks.php');
?>