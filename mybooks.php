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
		
$memberid=$_SESSION['id'];

        $q= "select * from issuetb where memberId='$memberid'";
		$query=mysqli_query($con,$q);
		$p= "select * from membertb";
		$query1=mysqli_query($con,$p);
		$pp=mysqli_fetch_array($query1);
	// }
    $stmt = $con->prepare('SELECT issueId,issueDate,returnDate,bookId, memberId FROM issuetb WHERE memberId=?');

// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($issueId,$issueDate,$returnDate,$bookId, $memberId);
$stmt->fetch();
$stmt->close();

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

				<h1>Library Management System User profile</h1>
				<a href="index2.php"><i class="fas fa-user-circle"></i>Home</a>
                <a href="mybooks.php"><i class="fas fa-user-circle"></i>My books</a>
               
				<a href="memberProfile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			
			</div>
		</nav>
		<div class="content">

	<div class="container mt-5">


<div class="row mt-4">
			<?php
				while (($qq=mysqli_fetch_array($query)) && ($qq['memberId']=$_SESSION['id']))
				{
			?>

			<div class="col-lg-4">
				<form>
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">
                        <?php echo
							$qq['issueId']; ?>
						</h5>
						<h6>
						<?php if($qq["returned"]=="NO") {echo 'NOT RETURNED';}else{echo 'RETURNED';}?>
						</h6>
                        <h6 class="card-subtitle mb-2 text-muted"> Book ID : 
							<?php echo
							$qq['issueDate']; ?>
						</h6><br>
						
						<h6 class="card-subtitle mb-2 text-muted">
						Issue date :  <?php echo
							$qq['returnDate']; ?>
						</h6>
						<h6 class="card-subtitle mb-2 text-muted"> Return date : 
                        <?=$returnDate?>
						
						</h6>
						<?php echo $qq['issueId'];?>
                        <a href="return.php?issueid=<?php echo $qq['issueId'];?>" class="card-link">
						<input type="button" value="Return" <?php if($qq["returned"]=="NO"){}else{echo ' disabled=disabled ';}?>/>
						</a>
                        
						
					</div>
				</div>
				</form><br>
			</div>
			<?php
			}
			?>
		</div>
	</div>
		</div>

        
		
		<!-- // if(!mysqli_query($con,$q))
		// {
			// echo "Value Not Inserted";
		// }
		// else
		// {
			// echo "Value Inserted";
		// } -->
	
</body>

</html>
