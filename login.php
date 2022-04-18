<?php
include("database.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST['username'];
    //$name=substr($name, 0, -15);
    $pwd=$_POST['password'];
    $sql="SELECT userEmail,Pword 
    FROM usersDB 
    WHERE userEmail='$name' 
    AND Pword='$pwd'";
    $result=$mysqli->query($sql);
    $c=$result->num_rows;
    if ($c==1) {
        $_SESSION["Email"] = $name;
        $sql_UserType="SELECT userType, userID
                        FROM usersDB
                        WHERE userEmail='$name'";
        $result_UserType=$mysqli->query($sql_UserType);
        $row = $result_UserType->fetch_assoc();
        if($row["userType"]=="Student"){
            $_SESSION["userID"] = "userID";
            $_SESSION["Type"] = "Student";
            $_SESSION["ID"] = $row["userID"];
            header("location: /Appeal/StudentPage.php");
        }else if($row["userType"]=="Faculty"){
            $_SESSION["userID"] = "userID";
            $_SESSION["Type"] = "Faculty";
            $_SESSION["ID"] = $row["userID"];
            header("location: /Appeal/FacultyPage.php");
        }else if($row["userType"]=="Admin"){
            $_SESSION["userID"] = "userID";
            $_SESSION["Type"] = "Admin";
            $_SESSION["ID"] = $row["userID"];
            header("location: /Appeal/AdminPage.php");
        }
   }else{
        echo "<script>alert('Wrong Password');location='/Appeal/Login.php'</script>";
    }
    $mysqli->close();
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="External.css">
            <title>Login page</title>
            <style>
                body{
                    background-image:url("https://apps.qc.cuny.edu/HD1/Images/QC_PL_WhiteBG_RGB.jpg");
                }
                .login-form{
                    background-color:white;
                    width: 900px;
                    border-color: black;
                    border-style: solid;
                    border-width: 1px;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    padding-left: 20px;
                    padding-right: 20px;
                }
                input[type=text], input[type=password] {
                    width:100%;
                    margin: 8px 0;
                    padding: 12px 20px;
                    display: inline-block;
                    border: 2px solid black;
                    box-sizing: border-box;
                }
                button{
                    padding: 20px;
                    margin: 8px 0;
                    border: solid black;
                }
            </style>
        </head>
        <body>
            <nav class="nav"><!-- Not sure if this page need this -->
                <h1>Navagation</h1>
                <ul>
                    <li><a href="/Appeal/login.php">Home</a></li><!-- Not sure what it could be -->
                </ul>
            </nav>

            <div class=login-form>
                <form action="" method="post" name="Login">
                    <label><strong>Username</strong></label>
                    <input type="text" value="@cuny.edu" name="username" id="username">
                    <label<strong>Password</strong></label>
                    <input type="password" name="password" id="password">
                    <button type ="submit" name="button" id="button" value="1">Login</button>
                    
                </form>
            </div>
        </body>
    </html>