<?php
	include("connect.php");

	session_start();
	
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('location:home.php');
	exit;
}


		$q= "select * from publishertb";
		$query=mysqli_query($con,$q);

?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Publisher</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
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
	<div class="row">
        <a href="addpublisher.php">
		<button class="btn btn-success buttonbg" Type="submit" >
          Add publisher
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
							<?php echo $qq['publisherName']; ?>
						</h5>
						<h6 class="card-subtitle mb-2 text-muted">
						ID : : <?php echo
							$qq['publisherId']; ?>
						</h6><br>
						<h6 class="card-subtitle mb-2 text-muted"> Address :
							<?php echo
							$qq['publisherAddress']; ?>
						</h6>
						
						<a href="deletepublisher.php?id=<?php echo $qq['publisherId']; ?>" class="card-link">
						<button class=" btn btn-danger">Delete</button>
						</a>
						<a href= "updatepublisher.php?id=<?php echo $qq['publisherId']; ?>" class="card-link">
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
