<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}


include("connect.php");
	// $book_id = $_GET['bookid'];
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT bookId,bookTitle,bookQty,bookPrice,languageId,publisherId,publishedDate FROM bookstb WHERE bookId=?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_GET['bookid']);
$stmt->execute();
$stmt->bind_result($bookId,$bookTitle,$bookQty,$bookPrice,$languageId,$publisherId,$publishedDate);
$stmt->fetch();
$stmt->close();

$q= "select * from publishertb where publisherId=$publisherId";
		$query=mysqli_query($con,$q);
		$qq=mysqli_fetch_array($query);
		

		$publisherName=$qq['publisherName'];
		$publisherAddress=$qq['publisherAddress'];

$p= "select * from languagetb where languageId=$languageId";
		$query1=mysqli_query($con,$p);
		$pp=mysqli_fetch_array($query1);
		

$languageName=$pp['langName'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link rel="stylesheet" href="css/indexstyle.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body class="loggedin">
	<nav class="navbar navbar-expand-lg navbar-dark bg-success navbarbgnew" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">LMS</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  <ul class="navbar-nav ml-auto mr-2">
      <li class="nav-item  active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
        <a class="nav-link" href="index2.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="mybooks.php">My books</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="userhistory.php">History</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="memberProfile.php">Profile</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
    
  </div>
</nav>
		<div class="content">
			<h2>View book</h2>
			<div>
				<p>Book details</p>
				<table>
					<tr>
						<td>ID:</td>
                        
                      
						<td><?=$bookId?></td>
					</tr>
					<tr>
						<td>Title :</td>
						<td><?=$bookTitle?></td>
                        
					</tr>
					<tr>
						<td>Price :</td>
						<td><?=$bookPrice?></td>
					</tr>
                    <tr>
						<td>Available quantity :</td>
						<td><?=$bookQty?></td>
					</tr>
					<tr>
						<td>Publisher Id :</td>
						<td><?=$publisherId?></td>
					</tr>
					<tr>
						<td>Publisher Name :</td>
						<td><?=$publisherName?></td>
					</tr>
					<tr>
						<td>Publisher Address :</td>
						<td><?=$publisherAddress?></td>
					</tr>
					<tr>
						<td>Language ID :</td>
						<td><?=$languageId?></td>
					</tr>
					<tr>
						<td>Language Name :</td>
						<td><?=$languageName?></td>
					</tr>
				</table>
				
                <a href="borrow.php?bookid=<?php echo $_GET['bookid'];?>&id=<?php echo $_SESSION['id'];?>">
							<button class="btn btn-success">Borrow </button>
						
							</a>
			</div>
		</div>
	</body>
</html>