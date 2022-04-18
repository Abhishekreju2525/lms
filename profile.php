<?php
// We need to use sessions, so you should always start sessions using the below code.
include("connect.php");
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, adminEmail FROM admintb WHERE adminId = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $adminEmail);
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body class="loggedin">
	<nav class="navbar navbar-expand-lg navbar-dark bg-success navbarbgnew">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">LMS</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mr-2">
      <li class="nav-item  active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="issuedbooks.php">Issued books</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="returnedbooks.php">Returned books</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="publisher.php">Publishers</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="language.php">Languages</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="profile.php">Profile</a>
      </li>
	  <li class="nav-item active mr-xl-4 mr-lg-2 mr-sm-2 navhover ">
	  <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$adminEmail?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>