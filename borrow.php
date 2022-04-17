
<?php
	include("connect.php");
    $id = $_GET['id'];
    $book_id = $_GET['bookid'];
    
	$q = "insert into issuetb(issueDate,returnDate,bookId,memberId,returned) values(curdate(),DATE_ADD(now(),interval 14 day),'$book_id','$id','NO') ";
    $r="update bookstb set bookQty=bookQty-1 where bookId='$book_id'";
	mysqli_query($con,$q);
    mysqli_query($con,$r);
	header('location:index2.php');
   
?>