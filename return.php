
<?php
	include("connect.php");
	$issueid = $_GET['issueid'];
	echo $_GET['issueid'];
	$q = "update issuetb set returned='YES' where issueId=$issueid";
	mysqli_query($con,$q);
	$r = "update bookstb set bookQty=bookQty+1 where bookId=(select bookId from issuetb where issueId=$issueid)";

	mysqli_query($con,$r);

	// $s = "select returnDate from issuetb where issueId=$issueid";
	// $query=mysqli_query($con,$s);
	// $ss=mysqli_fetch_array($query);
	// $actualreturnDate=$ss['returnDate'];
	//  echo $ss['$returnDate'];


	$stmt = $con->prepare('SELECT returnDate,returned from issuetb where issueId=?');

	// In this case we can use the account ID to get the account info.
	$stmt->bind_param('i', $_GET['issueid']);
	$stmt->execute();
	$stmt->bind_result($returnDate,$returned);
	$stmt->fetch();
	$stmt->close();
	
echo $returnDate;
$s="SELECT DATEDIFF(returnDate, curdate()) as dayDiff from issuetb where returnDate<curdate() and issueId=$issueid";
$s="SELECT '0' as dayDiff from issuetb where returnDate>=curdate()";

$query=mysqli_query($con,$s);
 $ss=mysqli_fetch_array($query);

	if(is_null($ss['dayDiff'])){
		$lateDays='0';
	}
else{
	$lateDays=$ss['dayDiff'];
}
$u="CREATE TRIGGER finetrigger BEFORE INSERT ON returntb FOR EACH ROW BEGIN 
 	set new.lateDays='$lateDays';
	IF(new.lateDays=0) THEN set new.lateFee=0;set new.paymentStatus='NO FINE';
	ELSEIF(new.lateDays>30) THEN set new.lateFee=new.lateDays*10;set new.paymentStatus='NO';
	ELSE set new.lateFee=(select Amount from feeruletb where $lateDays>fromDays and $lateDays<=toDays);set new.paymentStatus='NO';
	END IF;
	END";


	$t= "insert into returntb(issueId,returnedDate,lateDays) values($issueid,curdate(),$lateDays)";
	mysqli_query($con,$u);
	mysqli_query($con,$t);
	$v="DROP TRIGGER finetrigger";
	mysqli_query($con,$v);
	// echo 
	header("location:returncheckout.php?issueid=$issueid");
?>