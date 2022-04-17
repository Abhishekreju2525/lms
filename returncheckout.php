<?php
	include("connect.php");

	session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('location:login.php');
	exit;
}

$issueid=$_GET['issueid'];

		$q= "select * from issuetb where issueId=$issueid";
		$query=mysqli_query($con,$q);
		$qq=mysqli_fetch_array($query);
        
		$p= "select * from returntb where issueId=$issueid";
		$query1=mysqli_query($con,$p);
		$pp=mysqli_fetch_array($query1);
       
?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Return receipt</title>

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

	<div class="container mt-5">

		<div class="row mt-4">
<table>
	<tr><td>Issue ID : </td>
	<td> <?php echo $pp['issueId']; ?> <br></td></tr>


	<tr><td> Issue Date : </td>
	<td> <?php echo $qq['issueDate']; ?> <br></td></tr>


	<tr><td> Expected date of return :</td>
	<td> <?php echo $qq['returnDate']; ?> <br></td></tr>


	<tr><td> Actual date of return :</td>
	<td> <?php echo $pp['returnedDate']; ?> <br></td></tr>


	<tr><td>Book ID :</td>
	<td> <?php echo $qq['bookId']; ?> <br></td></tr>


	<tr><td> Member ID :</td>
	<td> <?php echo $qq['memberId']; ?> <br></td></tr>

	
	<tr><td> No. of days delayed :</td>
	<td> <?php echo $pp['lateDays']; ?> <br></td></tr>


	<tr><td> Payable fine :</td>
	<td> <?php echo $pp['lateFee']; ?> <br></td></tr>
	

</table>
  
 

   

		</div>
	</div>
		</div>
</body>

</html>
