<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Add List</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
</head>

<body class="loggedin">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbarbgnew" >
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
	<div class="container mt-5">
		<h1>Add book</h1>
		<form action="add.php" method="POST">
        <div class="form-group">
				<label>ID</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="book_Id" required>
			</div>
			<div class="form-group">
				<label>Book title</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="book_Title" required/>
			</div>

			<div class="form-group">
				<label>Item quantity</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="book_Qty" required />
			</div>

			
			<div class="form-group">
				<label>price</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="book_Price" required>
			</div>

			<div class="form-group">
				<label>Language ID</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="language_Id" required>
			</div>

			<div class="form-group">
				<label>Publisher ID</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="publisher_Id" required>
			</div>

			<div class="form-group">
				<label>Published Date</label>
				<input type="date"
					class="form-control"
					placeholder=""
					name="published_Date" required>
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
			$bookId=$_POST['book_Id'];
            $bookTitle=$_POST['book_Title'];
			$bookQty=$_POST['book_Qty'];
			$bookPrice=$_POST['book_Price'];
			$languageId=$_POST['language_Id'];
			$publisherId=$_POST['publisher_Id'];
			$publishedDate=$_POST['published_Date'];
			
	

			$q="insert into bookstb(bookId,
			bookTitle,bookQty,bookPrice,languageId,publisherId,
			publishedDate)
			values('$bookId','$bookTitle',
			'$bookQty','$bookPrice','$languageId',
			'$publisherId','$publishedDate')";

			mysqli_query($con,$q);
			header("location:index.php");
		}
		
		
	?>
</body>

</html>
