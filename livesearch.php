<?php
include("database.php");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

$sql="SELECT userID, userFname, userLname, Pword, userEmail, userType 
    FROM usersDB WHERE userID = '".$q."';";
$result=$mysqli->query($sql);
$c=$result->num_rows;
$i=1;

 

echo "<table class='table table-hover'>
    <thead>
    <tr>
    <th>CunyID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Password</th>
	<th>Email</th>
    <th>User Type</th>
	<th width='60'></th>  
    </tr>
    </thead>
    <tbody>";
while($i<=$c){
    $row = $result->fetch_assoc();
    echo "<td>".$row["userID"]."</td>";
    echo "<td>".$row["userFname"]."</td>";
    echo "<td>".$row["userLname"]."</td>";
	echo "<td>".$row["Pword"]."</td>";
    echo "<td>".$row["userEmail"]."</td>";
    echo "<td>".$row["userType"]."</td>";
    echo "<td><a class='edit-row' href=\"/Appeal/delete.php?q=".$row["userID"]."\">Delete</a></td>";                                            
	echo "</tr>";
    $i=$i+1;    
}
echo "</tbody>";

$mysqli->close();
?>