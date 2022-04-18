<?php
	include("connect.php");

	session_start();
	
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('location:home.php');
	exit;
}


		$q= "select * from publishertb";
		$query=mysqli_query($con,$q);

?>

<html>

<head>
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">

	<title>Publisher</title>

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
		<div class="content">

	<div class="container mt-5">
	<h2>Publisher list</h2><br>
	<div class="row">
        <a href="addpublisher.php">
		<button class="btn btn-success buttonbg" Type="submit" >
          Add publisher
        </button>
		</a>
	</div>


		<!-- Grocery Cards -->
		<div class="row mt-4">
			<?php
				while ($qq=mysqli_fetch_array($query))
				{
			?>

			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo $qq['publisherName']; ?>
						</h5>
						<h6 class="card-subtitle mb-2 text-muted">
						ID : : <?php echo
							$qq['publisherId']; ?>
						</h6><br>
						<h6 class="card-subtitle mb-2 text-muted"> Address :
							<?php echo
							$qq['publisherAddress']; ?>
						</h6>
						
						<a href="deletepublisher.php?id=<?php echo $qq['publisherId']; ?>" class="card-link">
						<button class=" btn btn-danger">Delete</button>
						</a>
						<a href= "updatepublisher.php?id=<?php echo $qq['publisherId']; ?>" class="card-link">
							Update
						</a>
					</div>
					<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 600" 
					xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
					<defs><linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" 
					stop-color="#002bdc88"></stop><stop offset="95%" stop-color="#32ded488"></stop></linearGradient>
				</defs><path d="M 0,600 C 0,600 0,200 0,200 C 64.65071770334927,155.55980861244018 129.30143540669854,
				111.11961722488039 234,125 C 338.69856459330146,138.8803827751196 483.444976076555,211.08133971291863 
				590,239 C 696.555023923445,266.91866028708137 764.9186602870814,250.55502392344496 864,242 C 963.0813397129186,
				233.44497607655504 1092.8803827751196,232.69856459330146 1194,227 C 1295.1196172248804,221.30143540669854 
				1367.55980861244,210.65071770334927 1440,200 C 1440,200 1440,600 1440,600 Z" stroke="none" stroke-width="0" 
				fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0"></path><defs>
					<linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" stop-color="#002bdcff">

					</stop><stop offset="95%" stop-color="#32ded4ff"></stop></linearGradient></defs><path d="M 0,600 C 0,600 0,400 0,400 C 100.66985645933013,369.8755980861244 201.33971291866027,339.7511961722488 303,347 C 404.66028708133973,354.2488038277512 507.3110047846891,398.8708133971292 598,423 C 688.6889952153109,447.1291866028708 767.4162679425837,450.76555023923447 866,424 C 964.5837320574163,397.23444976076553 1083.0239234449762,340.066985645933 1182,331 C 1280.9760765550238,321.933014354067 1360.4880382775118,360.96650717703346 1440,400 C 1440,400 1440,600 1440,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-1"></path></svg>
				</div><br>
			</div>
			<?php
			}
			?>
		</div>
	</div>
		</div>
</body>

</html>
