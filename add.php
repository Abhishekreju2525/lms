<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Add List</title>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
</head>

<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="index.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="issuedbooks.php"><i class="fas fa-sign-out-alt"></i>Issued books</a>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
	<div class="container mt-5">
		<h1>Add Grocery List</h1>
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
