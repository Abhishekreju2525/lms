<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'librarydb';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
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

	
	


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link rel="stylesheet" href="css/indexstyle.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
			<h1>Library Management System</h1>
				<a href="index2.php"><i class="fas fa-user-circle"></i>Home</a>
                <a href="userprofile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
				</table>
                <a href="borrow.php?bookid=<?php echo $_GET['bookid'];?>&id=<?php echo $_SESSION['id'];?>">
							<button class="btn btn-success">Borrow </button>
						
							</a>
			</div>
		</div>
	</body>
</html>