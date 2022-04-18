<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title> 
</head>
<body>
	<?php
		$fID = $_POST['cunyid'];
		$ffname = $_POST['fname'];
		$flname = $_POST['lname'];
		$fpword =  $_POST['pword'];
		$femail = $_POST['email'];
		$fusertype = $_POST['utype'];
		$fstatusID = 0;
		if(empty($fID) || empty($ffname) ||empty($flname) ||empty($fpword) ||empty($femail) || empty($fusertype)){
			echo "Fill out the form";
			exit();
		}
		
		$sql="SELECT userEmail 
		FROM usersDB 
		WHERE userEmail='$femail'";
		$result=$mysqli->query($sql);
		$a=$result->num_rows;

		$sql="SELECT userID 
		FROM usersDB 
		WHERE userID='$fID'";
		$result=$mysqli->query($sql);
		$b=$result->num_rows;
		
		$i=1;


		if($a>=$i || $b>=$i){
			echo "already have an account, please check your cunyID and Email";
		}else{
			$sql = "INSERT INTO usersDB (userID,  userFname, userLname, Pword, userEmail, userType, statusID) VALUES ( '$fID', '$ffname', '$flname', '$fpword', '$femail', '$fusertype', '$fstatusID')";
			$result=$mysqli->query($sql);
			echo 'usesr inserted';
		}




    ?>
</body>
</html>