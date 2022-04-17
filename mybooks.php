<?php
	include("connect.php");

	session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('location:login.php');
	exit;
}

		
$memberid=$_SESSION['id'];

$q= "select * from issuetb where memberId='$memberid' and returned='NO'  order by issueId desc";
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

	<title>My books</title>

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
       <h2>My books</h2> 
	</div></center>

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
                        Issue ID : <?php echo
							$qq['issueId']; ?>
						</h5>
						<h6>
						<?php if($qq["returned"]=="NO") {echo '<font color=red>NOT RETURNED</font>';}
						else{echo '<font color=green>RETURNED</font>';}?>
						</h6>
                        <h6 class="card-subtitle mb-2 text-muted"> Book ID : 
							<?php echo
							$qq['bookId']; ?>
						</h6><br>
						
						<h6 class="card-subtitle mb-2 text-muted">
						Issue date :  <?php echo
							$qq['issueDate']; ?>
						</h6>
						<h6 class="card-subtitle mb-2 text-muted"> Return date : 
                        <?=$returnDate?>
						
						</h6>
						
                       
                        
						
					</div>
				</div> <a href="return.php?issueid=<?php echo $qq['issueId'];?>" class="card-link">
						<input  style="width:100%;" type="button " value="Return" <?php if($qq["returned"]=="NO"){echo '  class="btn btn-danger" ';}else{echo '  class="btn btn-danger" disabled ';}?>/>
						</a>
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
