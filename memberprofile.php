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
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT memberName,branchName,rollNumber,memberPhone, memberEmail,MemberDateofjoin,password FROM membertb WHERE memberId=?');

// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($memberName,$branchName,$rollNumber,$memberPhone, $memberEmail,$MemberDateofjoin,$password);
$stmt->fetch();
$stmt->close();



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My profile</title>
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
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index2.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
	  <a class="nav-link" href="mybooks.php">My books</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="userhistory.php">History</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="memberProfile.php">Profile</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
    
  </div>
</nav>
		<div class="content">
			<h2>My profile</h2>
			<div>
				<p>Account details</p>
				<table>

				
				<tr>
						<td>Name</td>
						
					<td><?php echo $_SESSION['name']?></td>
					</tr>
					<tr>
						<td>ID</td>
						
					<td><?php echo $_SESSION['id']?></td>
					</tr>
					<tr>
						<td>Branch</td>
						
					<td><?=$branchName?></td>
					</tr>
					<tr>
						<td>Roll number</td>
						
					<td><?=$rollNumber?></td>
					</tr>
					<tr>
						<td>Phone </td>
						
					<td><?=$memberPhone?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?=$memberEmail?></td>
					</tr>
					<tr>
						<td>Date of join</td>
						
					<td><?=$MemberDateofjoin?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><?php echo $_SESSION['name'] ?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					
                    
				</table>
			</div>
		</div>
	</body>
</html>