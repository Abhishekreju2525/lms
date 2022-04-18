<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Add publisher</title>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
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
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
	<div class="container mt-5">
		<h1>Add Publisher</h1>
		<form action="addpublisher.php" method="POST">
        <div class="form-group">
				<label>ID :</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="pub_id" required>
			</div>
			<div class="form-group">
				<label>Name :</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="pub_name" required/>
			</div>

			<div class="form-group">
				<label>Address :</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="pub_address" required />
			</div>

			
			<div class="form-group">
				<input type="submit"
					value="Add"
					class="btn btn-danger"
					name="btn">
			</div>
		</form>
	</div>

	<?php
		if(isset($_POST["btn"])) {
			include("connect.php");
			$publisherId=$_POST['pub_id'];
            $publisherName=$_POST['pub_name'];
			$publisherAddress=$_POST['pub_address'];
			
			
	

			$q="insert into publishertb(publisherId,
			publisherName,publisherAddress)
			values('$publisherId','$publisherName',
			'$publisherAddress')";

			mysqli_query($con,$q);
			header("location:publisher.php");
		}
		
		// if(!mysqli_query($con,$q))
		// {
			// echo "Value Not Inserted";
		// }
		// else
		// {
			// echo "Value Inserted";
		// }
	?>
</body>

</html>
