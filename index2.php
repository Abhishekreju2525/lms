<?php
	include("connect.php");

	session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('location:home.php');
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

		$p= "select * from membertb";
		$query1=mysqli_query($con,$p);
		$pp=mysqli_fetch_array($query1);

		
		$memberid=$pp['memberId'];
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
<center><div class="container mt-5">
	<div class="row ">
       <h2>Available books</h2> 
	</div></center>
	


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
						
					
							
					</div>
					<a href="bookview.php?bookid=<?php echo $qq['bookId'];?>">
							<input class="btn btn-dark buttonbg" style="width:100%;"  type="button" value="Borrow" <?php if($qq["bookQty"]>0){}else{echo ' disabled=disabled ';}?>/>
						
							</a>
				</div>
					<br>
					
			</div>
			<?php
			}
			?>
		</div>
	</div>
		</div>
</body>

</html>
