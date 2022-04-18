<?php
include("database.php");
session_start();
$name = $_SESSION["Email"];
$sql="SELECT statusID 
    FROM usersDB 
    WHERE userEmail='$name'";
$result=$mysqli->query($sql);
$row = $result->fetch_assoc();
$_SESSION["Status"]=$row["statusID"];
//$mysqli->close();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="External.css">
        <title>Navagation</title>
		<style>
            * {
                box-sizing: border-box;
            }
			.col{
                float: left;
                width: 30%;
                padding: 10px;
            }
            .Status:after{
                display: table;
                clear:both;
            }
		</style>
	</head>
	<body>
        <nav class="nav">
            <h1>Navagation</h1>
            <ul>
                <li><a href="/Appeal/Form.php">Form</a></li><!-- check when click to see if already completed/continue -->
                <li><a href="/Appeal/Logout.php">Log Out</a></li>
            </ul>
        </nav>
		<div class="Status">
            <h2>Status</h2>
            <div class="col">
                <p>Appeal</p>
            </div>
            <div class="col">
            <?php
            if($_SESSION["Status"]==1){
                echo "Submitted";
            }else if($_SESSION["Status"]==2){
                echo "Checked";
            }else{
                echo "None";
            }
            ?>
            </div>
            <div class="col">
            <?php
                if($_SESSION["Status"]==1 || $_SESSION["Status"]==2){
                    $id = $_SESSION["ID"];
                    $sql_AD="SELECT STATUS 
                        FROM FORM 
                        WHERE USER_ID='$id'";
                    $result=$mysqli->query($sql_AD);
                    $row = $result->fetch_assoc();
                    $res=$row["STATUS"];
                    echo "$res";
                }
            ?>
            </div>
        </div>
	</body>
</html>