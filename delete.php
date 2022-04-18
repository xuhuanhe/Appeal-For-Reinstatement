<?php
include("database.php");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

$sql="DELETE FROM usersDB WHERE userID = '".$q."';";
//"SELECT userID, userFname, userLname, Pword, userEmail, userType 
  //  FROM usersDB;";
$result=$mysqli->query($sql);
echo "deleted";

$mysqli->close();
?>