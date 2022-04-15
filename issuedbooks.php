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
		$q= "select * from issuetb";
		$query=mysqli_query($con,$q);

		$p= "select * from membertb";
		$query1=mysqli_query($con,$p);
		$pp=mysqli_fetch_array($query1);
        $memberid=$pp['memberId'];
		$query2 = "SELECT issueId, issueDate, returnDate, bookId, memberId FROM issuetb";
		
        $prepared = $con->prepare($query2);
$prepared->execute();
$result = $prepared->get_result();
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

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:center;vertical-align:top}
.table{
    align-items: center;
    align-self: center;
    justify-content: center;
    width:100%;
}
th{
    background-color: skyblue;
}
</style>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Library Management System User profile</h1>
				<a href="index.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="issuedbooks.php"><i class="fas fa-user-circle"></i>Issued books</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			
			</div>
		</nav>
		<div class="content">

	<div class="container mt-5">
	


		<!-- Grocery Cards -->
		<div class="row mt-4">
        <table border="1" cellspacing="0" cellpadding="10" class="table">
  <tr>
    <th>S.N</th>
    <th>Issue ID</th>
    <th>Issued Date</th>
    <th>Return date</th>
    <th>Book ID</th>
    <th>Member ID</th>
    
  </tr>
			

<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['issueId']; ?> </td>
   <td><?php echo $data['issueDate']; ?> </td>
   <td><?php echo $data['returnDate']; ?> </td>
   <td><?php echo $data['bookId']; ?> </td>
   <td><?php echo $data['memberId']; ?> </td>
   
 <tr>
 <?php
  $sn++;}
} else { 
  ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
</table>


			
		</div>
	</div>
		</div>
</body>

</html>