<?php
	include("connect.php");

	session_start();
	
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('location:login.php');
	exit;
}



	//on the second page you check if that session is true, else redirect to the login page  
	//  if($_SESSION['loggedin'])
	//  {
	
	//  }
	// 	 //allow
	//  else{
	// 	 //redirect to the login page
	// 	 header('location:login.php');
	// 	}
	// if (isset($_POST['btn'])) {
	// 	$date=$_POST['idate'];
	// 	$q="select * from bookstb where Date='$date'";
	// 	$query=mysqli_query($con,$q);
	// }
	// else {
		$q= "select * from bookstb";
		$query=mysqli_query($con,$q);
	// }

	//set the session on the login page
	
?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>View List</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
</head>

<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Library Management System</h1>
				<a href="index.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="issuedbooks.php"><i class="fas fa-sign-out-alt"></i>Issued books</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">

	<div class="container mt-5">
	<div class="row">
        <a href="add.php">
		<button class="btn btn-success" Type="submit" >
          Add books
        </button>
		</a>
	</div>


		<!-- Grocery Cards -->
		<div class="row mt-4">
			<?php
				while ($qq=mysqli_fetch_array($query))
				{
			?>

			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo $qq['bookTitle']; ?>
						</h5>
						<h6 class="card-subtitle mb-2 text-muted">
						Qty : <?php echo
							$qq['bookQty']; ?>
						</h6><br>
						<h6 class="card-subtitle mb-2 text-muted"> &#8377;
							<?php echo
							$qq['bookPrice']; ?>
						</h6>
						<?php
						if($qq['bookQty'] >0) {
						?>
						<p class="text-info">AVAILABLE</p>

						
						<?php } else { ?>
						<p class="text-danger">NOT AVAILABLE</p>

						<?php } ?>
						<a href="delete.php?id=<?php echo $qq['bookId']; ?>" class="card-link">
							Delete
						</a>
						<a href= "update.php?id=<?php echo $qq['bookId']; ?>" class="card-link">
							Update
						</a>
					</div>
				</div><br>
			</div>
			<?php
			}
			?>
		</div>
	</div>
		</div>
</body>

</html>
