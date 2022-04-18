<?php
$host = "localhost";

// PUT YOUR USERNAME AND PASSWORD FOR TESTING 
$user =	"root";				
$password= "";		
$db = "testing";			


// To use the mysqli extension, first create an instance of the mysqli class
// The second this instance is created, mysqli is going to attempt to connect to this db using these credentials
$mysqli = new mysqli($host, $user, $password, $db);
if( $mysqli->connect_errno) {
	// There was an error, so let's display the actual error message
	echo $mysqli->connect_error;
	// exit() terminates the php program. No subsequent code runs
	exit();
}
$mysqli->set_charset('utf8');

?>