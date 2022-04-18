<?php
include("database.php");
session_start();
$id = isset($_GET["id"]) ? intval($_GET["id"]) : '';
$_SESSION["SID"]=$id;
$sql_AD="SELECT statusID
            FROM usersDB
            WHERE userID='$id'";
$r=$mysqli->query($sql_AD);
$row = $r->fetch_assoc();
$res=$row["statusID"];
if($res=="2"){
    echo "<script>alert('Already Checked');location='/FacultyPage.php'</script>";
}
$sql="SELECT USER_ID, SUBMIT_DATE, F_NAME, M_NAME, L_NAME, ADD1, ADD2, H_PHONE, C_PHONE 
FROM FORM  
WHERE USER_ID = '$id';";
$result=$mysqli->query($sql);  
$row = $result->fetch_assoc(); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="External.css">
    <style>
        p.thick {
            font-weight: bold;
        }

        ​ u {
            text-decoration: none;
            border-bottom: 4px solid black;
        }
        .wrong{
            color:red;
        }
    </style>
</head>

<body>
    <nav class="nav">
        <h1>Navagation</h1>
        <ul>
            <li><a href="/Logout.php">Log Out</a></li>
            <?php if($_SESSION["Type"]=="Faculty"){?>
            <li><a href="/FacultyPage.php">Faculty Page</a></li><!-- check when click to see if already completed/continue -->
            <?php }else if($_SESSION["Type"]=="Student"){ ?>
            <li><a href="/StudentPage.php">Student Page</a></li><!-- check when click to see if already completed/continue -->
            <?php } ?>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3">
                <img src="logo.jpg" />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9">
                <p class="text-center thick">THE UNDERGRADUATE</p>
                <p class="text-center thick">SCHOLASTIC STANDARDS COMMITTEE (USSC) </p>
                <p class="text-center thick">65-30 KISSENA BLVD., FRESE HALL – ROOM 201</p>
                <p class="text-center thick"> FLUSHING, NY 11367</p>
                <p class="text-center thick">TELEPHONE: (718) 997-4486</p>
                <p class="text-center thick">EMAIL: QC_ USSC@QC.CUNY.EDU</p>
                <p> <a
                        href="https://myqc.qc.cuny.edu/StudentLife/USSC/default.aspx">https://myqc.qc.cuny.edu/StudentLife/USSC/default.aspx</a>
                </p>
            </div>
            <div class="row">
                <p class="text-center thick"><u>APPEAL FOR REINSTATEMENT AFTER ACADEMIC DISMISSAL</u></p>
            </div>
        </div>
        
        
        <div class="row">
                <p class="text-center thick"><u>FOR USSC OFFICE USE ONLY:</u></p>
        </div>
        <div class="row">
                <p class="text-center"><u>Updating for <?php echo $id; ?></u></p>
        </div>
        
        <div class="container">
            <?php
            echo "<table class='table table-hover'>
            <thead>
            <tr>
            <th>ID</th>
            <th>Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Adress</th>
            <th>Email</th>
            <th>Home Phone</th>
            <th>Cell Phone</th>
            </tr>
            </thead>
            <tbody>";
            echo "<td>".$row["USER_ID"]."</td>";
            echo "<td>".$row["SUBMIT_DATE"]."</td>";
            echo "<td>".$row["F_NAME"]."</td>";
            echo "<td>".$row["L_NAME"]."</td>";
            echo "<td>".$row["ADD1"]."</td>";
            echo "<td>".$row["ADD2"]."</td>";
            echo "<td>".$row["H_PHONE"]."</td>";
            echo "<td>".$row["C_PHONE"]."</td>";
            echo "</tr>";         
            ?>                        
        </div>

        <div class="container">
            <form id="form" action="FacultyInsert.php" onsubmit="return validateForm()" method="POST">
                
                <div class="form-group row">
                    <label class="col-sm-4" for="SpringTermGPA">Spring Term GPA:</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="SpringTermGPA" name="SpringTermGPA">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="CumulativeGPA">Cumulative GPA:</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="CumulativeGPA" name="CumulativeGPA">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="SpringCreditsAttempted:">Spring Credits Attempted:</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" id="SpringCreditsAttempted" name="SpringCreditsAttempted" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="SpringCreditsCompleted">Spring Credits Completed:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="SpringCreditsCompleted" name="SpringCreditsCompleted">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Comments">USSC Comments:</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="Comments" rows="3" placeholder="comments here" name="comments"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="Term">Term:</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="Term" name="Term">
                            <option value="Fall">Fall</option>
                            <option value="Winter">Winter</option>
                            <option value="Spring">Spring</option>
                            <option value="Summer">Summer</option>
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Session:">Session:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Session" name="Session">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Standing:">Standing:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Standing" name="Standing">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Limit:">Limit:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Limit" name="Limit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Appt:">Appt:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Appt" name="Appt">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Indicator:">Indicator:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Indicator" name="Indicator">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4" for="Status">Status :</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="Status" name="status" >
                            <option value="Approved">Approved</option>
                            <option value="Denied">Denied</option>
                            <option value="Pending">Pending</option>
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4" for="Date">Date reviewed: </label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" id="Date" name="DateReviewed" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="Email">Email/Letter Sent :</label>
                    <div class="col-sm-6">
                      <input type="Email" class="form-control" id="Email" name="Email">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    
</body>
<script>
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = year + "-" + month + "-" + day;
            document.getElementById("Date").value = today;
        </script>
</html>