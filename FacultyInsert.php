<?php
include("database.php");
session_start();
$id = $_SESSION["SID"];
?>

<!DOCTYPE html>
<html>
<head>
    <title></title> 
</head>
<body>
    <?php
    $SpringTermGPA = $_POST['SpringTermGPA'];
	$CumulativeGPA = $_POST['CumulativeGPA'];
    $SpringCreditsAttempted = $_POST['SpringCreditsAttempted'];
    $SpringCreditsCompleted = $_POST['SpringCreditsCompleted'];
    $comments = $_POST['comments'];
    $Term = $_POST['Term'];
    $Session = $_POST['Session'];
    $Standing = $_POST['Standing'];
    $Limit = $_POST['Limit'];
    $Appt = $_POST['Appt'];
    $Indicator = $_POST['Indicator'];
    $status = $_POST['status'];
    $DateReviewed = $_POST['DateReviewed'];
    $Email = $_POST['Email'];

   

    $sql = "UPDATE FORM 
            SET S_GPA = '$SpringTermGPA', C_GPA = '$CumulativeGPA' , S_CREDITS_ATTEMPTED = '$SpringCreditsAttempted', S_CREDITS_COMPLETED = '$SpringCreditsCompleted', COMMENTS = '$comments', TERM = '$Term', SSION = '$Session', STANDING= '$Standing', Lmt = '$Limit', APPT= '$Appt', INDICATOR = '$Indicator',STATUS= '$status',REVIEW_DATE = '$DateReviewed', FAC_EMAIL = '$Email' 
            WHERE USER_ID = '$id';";
    
	if ($mysqli->query($sql) === TRUE) {
        if($status=='Approved'){
            $sql_update="UPDATE usersDB
						SET statusID='2'
						WHERE userID='$id'";
		    $mysqli->query($sql_update);
        }
		echo "<script>alert('Submited');location='/Appeal/FacultyPage.php'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
	$mysqli->close();
    ?>
</body>
</html>