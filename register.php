<?php
		if(isset($_POST["btn"])) {
			include("connect.php");
			$memberName=$_POST['member_name'];
            $branchName=$_POST['branch_name'];
			$rollNumber=$_POST['roll_number'];
			$memberPhone=$_POST['member_phone'];
			$memberEmail=$_POST['member_email'];
			
			$username=$_POST['username'];
            echo $password=$_POST['password'];

			echo $memberName;
  

  echo $hash = password_hash($password, 
          PASSWORD_DEFAULT);
  
  // Print the generated hash
  echo "Generated hash: ".$hash;
	

			$q="insert into membertb(memberName,
			branchName,rollNumber,memberPhone,memberEmail,
			username,password)
			values('$memberName','$branchName',
			'$rollNumber','$memberPhone','$memberEmail',
			curdate()','$username','$password')";

			mysqli_query($con,$q);
			// header("location:index.php");
		}
		
		
	?>