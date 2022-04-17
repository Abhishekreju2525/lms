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
