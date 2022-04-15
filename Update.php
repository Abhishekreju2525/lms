<?php
	include("connect.php");
	
	if(isset($_POST['btn']))
	{
		

		$book_title=$_POST['book_Title'];
        $book_qty=$_POST['book_Qty'];
		$book_price=$_POST['book_Price'];
		$language_id=$_POST['language_Id'];
		$publisher_id=$_POST['publisher_Id'];
		$published_date=$_POST['publisher_Date'];
		
		$id=$_GET['id'];
		$q= "update bookstb set bookTitle='$book_title',
		bookQty='$book_qty',bookPrice='$book_price',
		languageId='$language_id',publisherId='$publisher_id',publishedDate='$published_date' where bookId=$id";
		$query=mysqli_query($con,$q);
		header('location:index.php');
	}
	else if(isset($_GET['id']))
	{
		$q = "SELECT * FROM bookstb WHERE bookId='".$_GET['id']."'";
		$query=mysqli_query($con,$q);
		$res= mysqli_fetch_array($query);
	}
?>
<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">
	
	<title>Update List</title>

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/indexstyle.css">
</head>

<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Library management system</h1>
				<a href="index.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="issuedbooks.php"><i class="fas fa-sign-out-alt"></i>Issued books</a>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
			</div>
		</nav>
	<div class="container mt-5">
		<h1>Update Book List</h1>
	
        
        <form method="post">
        <div class="form-group">
				<label>ID</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="id" value="<?php echo $res['bookId'];?>" />
			</div>
			<div class="form-group">
                    <label>Item name</label>
                    <input type="text" class="form-control"
					 name="book_Title" placeholder=""
					  value="<?php echo $res['bookTitle'];?>"/>
                </div>

			<div class="form-group">
				<label>Item quantity</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="book_Qty" value="<?php echo $res['bookQty'];?>" />
			</div>

			
			<div class="form-group">
				<label>Price</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="book_Price" value="<?php echo $res['bookPrice'];?>" />
			</div>
           

			<div class="form-group">
				<label>Language ID</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="language_Id" value="<?php echo $res['languageId'];?>" />
			</div>
           

			<div class="form-group">
				<label>Publisher ID</label>
				<input type="text"
					class="form-control"
					placeholder=""
					name="publisher_Id" value="<?php echo $res['publisherId'];?>" />
			</div>
           

			<div class="form-group">
				<label>Published Date</label>
				<input type="date"
					class="form-control"
					placeholder=""
					name="published_Date" value="<?php echo $res['publishedDate'];?>" />
			</div>
           
			<div class="form-group">
				<input type="submit"
					value="Update"
					class="btn btn-danger"
					name="btn">
			</div>
		</form>




	</div>
</body>

</html>
