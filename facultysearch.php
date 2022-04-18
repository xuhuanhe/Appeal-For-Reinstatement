<?php
include("database.php");
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
echo $q;
$sql="SELECT a.USER_ID, a.F_NAME, a.L_NAME, a.ADD2, b.Status 
FROM FORM a 
JOIN statusDB b 
JOIN usersDB c 
ON a.USER_ID = c.userID 
AND c.statusID = b.statusID 
AND c.userType = 'Student' 
AND c.statusID>0
where USER_ID = $q;"


$result=$mysqli->query($sql);
$c=$result->num_rows;
$i=1;

 

echo "<table class='table table-hover'>
            <thead>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Status</th>
            </tr>
            </thead>
            <tbody>";
        while($i<=$c){
            $row = $result->fetch_assoc();
            echo "<td>".$row["USER_ID"]."</td>";
            echo "<td>".$row["F_NAME"]."</td>";
            echo "<td>".$row["L_NAME"]."</td>";
            echo "<td>".$row["ADD2"]."</td>";
            echo "<td>".$row["Status"]."</td>";
            echo "<td><a class='edit-row' href=\"/Appeal/FacultyForm.php?id=".$row["USER_ID"]."\">Detail</a></td>";
            $_SESSION["STA"]=$row["Status"];
            echo "</tr>";                
            $i=$i+1;    
        }
echo "</tbody>";

$mysqli->close();
?>