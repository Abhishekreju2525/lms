<?php
	include("connect.php");

	session_start();
if (!isset($_SESSION['loggedin'])) {
	header('location:login.php');
	exit;
}

		$q= "select * from issuetb";
		$query=mysqli_query($con,$q);

		$p= "select * from membertb";
		$query1=mysqli_query($con,$p);
		$pp=mysqli_fetch_array($query1);
        $memberid=$pp['memberId'];
		$query2 = "SELECT * FROM issuetb right JOIN returntb on issuetb.issueId=returntb.issueId order by issuetb.issueId DESC";
		
        $prepared = $con->prepare($query2);
$prepared->execute();
$result = $prepared->get_result();
	
?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Returned books</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
</head>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:0.5px;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:center;vertical-align:top}
.table{
    align-items: center;
    align-self: center;
    justify-content: center;
    width:100%;
}
th{
    background-color:#144E6A;
	color:white;
	font-weight:normal;
	text-transform: uppercase;
}
</style>
<body class="loggedin">
<nav class="navbar navbar-expand-lg navbar-dark bg-success navbarbgnew">
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
	


		<!-- Grocery Cards -->
		<div class="row mt-4">
        <table border="1" cellspacing="0" cellpadding="10" class="table">
  <tr>
    <th>S.N</th>
    <th>Issue ID</th>
    <th>Issued Date</th>
    <th>Return due date</th>
    <th>Book ID</th>
    <th>Member ID</th>
	<th>Returned date</th>
	<th>Late days</th>
	<th>Fine Amount</th>
	<th>Payment status</th>
	<th>Mark as paid</th>
    
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
   <td><?php echo $data['returnedDate']; ?> </td>
   <td><?php echo $data['lateDays']; ?> </td>

   <td><?php echo $data['lateFee']; ?> </td>
   <td><?php echo $data['paymentStatus']; ?> </td>
   <?php  $status=$data['paymentStatus'] ?>
   <td>
       <a href="feePaid.php?issueid=<?php echo $data['issueId'];?>">
							<input  type="button" value="Paid" <?php if($status=='NO'){echo ' class="btn btn-success" ';}
                            else {echo ' disabled=disabled class="btn btn-secondary" ';}?>/>
						
							</a></td>

   
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
