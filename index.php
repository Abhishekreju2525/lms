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

	<title>Home</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>

<body class="loggedin">
	

		<nav class="navbar navbar-expand-lg navbar-dark bg-success navbarbgnew">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">LMS-Admin</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
	  <a class="nav-link" href="issuedbooks.php">Issued books</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="returnedbooks.php">Returned books</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="publisher.php">Publishers</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="language.php">Languages</a>
      </li>
	  <li class="nav-item">
	  <a class="nav-link" href="profile.php">Profile</a>
      </li>
	  <li class="nav-item">
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

	<div class="container mt-5">

	<h1>Book list</h1><br>
	<div class="row">
        <a href="add.php">
		<button class="btn btn-success buttonbg" Type="submit" >
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
							<button class="btn btn-danger">Delete</button>
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
