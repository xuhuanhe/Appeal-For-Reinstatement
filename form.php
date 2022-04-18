<?php
include("database.php");
session_start();
$idd = $_SESSION["ID"];
if($_SESSION["Type"]=="Student"){
    if($_SESSION["Status"]==1){
        echo "<script>alert('Already Submitted');location='/Appeal/StudentPage.php'</script>";
    }else if($_SESSION["Status"]==2){
        echo "<script>alert('Already Checked');location='/Appeal/StudentPage.php'</script>";
    }
}else if($_SESSION["Type"]=="Faculty"){
    $id = $_SESSION["SID"];
    $sql_SType="SELECT statusID 
                FROM usersDB
                WHERE userID='$id'";
    $result_UserType=$mysqli->query($sql_SType);
    $row = $result_UserType->fetch_assoc();
    if($row["statusID"]==2){
        echo "<script>alert('Already Checked');location='/Appeal/StudentPage.php'</script>";
    }
}
$mysqli->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="External.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            <li><a href="/Appeal/Logout.php">Log Out</a></li>
            <?php if($_SESSION["Type"]=="Faculty"){?>
            <li><a href="/Appeal/FacultyPage.php">Faculty Page</a></li><!-- check when click to see if already completed/continue -->
            <?php }else if($_SESSION["Type"]=="Student"){ ?>
            <li><a href="/Appeal/StudentPage.php">Student Page</a></li><!-- check when click to see if already completed/continue -->
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

        <div class="container">
            <form id="form" action="/Appeal/StudentInsert.php" onsubmit="return validateForm()" method="POST">
                <div class="form-group row">
                    <label class="col-sm-4" for="Date Submitted">Date Submitted to the USSC:</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="DateSubmitted" name="DateSubmittedtotheUSSC" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="CUNYFirstID">* CUNYFirst ID #:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="CUNYFirstID" name="CUNYFirstID" value= <?php echo $idd?> readonly >
                        <div class="wrongId wrong"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="fname">* First Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fname" name="fname">
                        <div class="wrongFirstName wrong"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="mname">Middle Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="mname" name="mname">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="lname">* Lirst Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="lname" name="lname">
                        <div class="wrongLirstName wrong"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="MailingAddress">* Mailing Address:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="MailingAddress" name="MailingAddress"
                            placeholder="street address-town/city-state-zip code">
                            <div class="wrongAdress wrong"></div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4" for="MailingAddress">* Queens College Office 365 Email Address:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email">
                            <div class="wrongemail wrong"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="HomePhone">Home Phone #</label>
                    <div class="col-sm-6">
                    <input type="number" class="form-control" id="home_phone_number" name="home_phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4" for="CellPhone">* Cell Phone #</label>
                    <div class="col-sm-6">
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="888-888-8888" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                    </div>
                    <div class="wrongNumber wrong"></div>
                </div>
                <div class="row">
            <p class="text-center thick"><u>INSTRUCTIONS TO APPEAL FOR REINSTATEMENT AFTER ACADEMIC DISMISSAL</u></p>
        </div>
        <p style="text-align:left">
            1. You must complete this Appeal for Reinstatement after Academic Dismissal Form.
        </p>
        <p style="text-align:left">
            2. You must submit a typed appeal statement answering the following two questions. Your appeal statement
            responses must be labeled A and B. Appeal statements not typed or labeled will be returned.
            A. What were the extenuating circumstances that prevented you from meeting the probationary requirement of
            a 2.25 semester GPA in the spring 2018 semester?
            The reason(s) given in your response must be supported with official, semester specific, dated documentation
            that is not returnable, but will be held in strict confidence. (The USSC may accept as documentation, third
            party notarized verification of the events only when official documentation may not be possible.) Failure to
            submit documentation may result in the denial of this appeal. All documentation is kept confidential,
            however,
            be aware that any supporting documentation submitted to the USSC is subject to verification at the USSC’s
            discretion. If falsified documentation is submitted, you will be referred to the Office of the Vice
            President for
            Student Affairs for disciplinary action. Be sure to retain a copy of all documentation submitted with your
            appeal
            for your records as the USSC cannot provide copies in the future.
            B. What plan do you have for meeting the requirements of probation if you are reinstated?
            Your completed Appeal for Reinstatement after Academic Dismissal Form, typed statement, and supporting
            documentation must be received by the USSC no later than 4:00m on Friday, July 6, 2018. Appeals received
            after this deadline will not be considered.
            The USSC will inform you of their decision by email which will be sent to your “preferred” email address as
            you
            have indicated on CUNYfirst. Decisions are usually emailed within 20 business days after the receipt of your
            completed appeal for reinstatement. Please be sure to set up your email at the Queens College Student Email
            System at http://www.qc.cuny.edu/Computing/Pages/Office365.aspx if you have not already done so.

        </p>
        <p style="text-align:left">
            I have read and understand the information and instructions to appeal for reinstatement after academic
            dismissal:
        </p>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        
        <hr style="border-top:1px dashed #ff0000;" width="100%" color=red size=3>
        <p style="text-align:left">
            Bring/mail your completed appeal form, typed statement, and supporting documentation to the USSC office in
            Frese Hall, room 201 no later than 4:00pm on Friday, July 6, 2018. (Faxed, scanned, or emailed appeals are
            not
            accepted.)
        </p>
        <p style="text-align:left">
            If your appeal for reinstatement is granted by the USSC, you will be able to proceed with registration for
            fall
            2018 classes immediately after receiving an email notification of your approval.
        </p>

        <p style="text-align:left">
            If your appeal for reinstatement is denied or if you choose not to file an appeal, you may apply to re-enter
            the
            college in the future by filing a readmission application. Students who were dismissed from Queens College
            may apply for readmission only after a full academic year has passed since the date of dismissal.
            Readmission for students who were academically dismissed is not guaranteed. Readmission information,
            applications, and filing instructions are available at
            http://www.qc.cuny.edu/admissions/undergraduate/reentry/Pages/Welcome.aspx
        </p>
        <hr style="border-top:1px dashed #ff0000;" width="100%" color=red size=3>
        <div class="row">
        </div>
        <div class="row">
                <p class="text-center thick"><u>After submit form, please wait for admin to update.</u></p>
            </div>
        </div>

        
        <script>
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;
            var today = year + "-" + month + "-" + day;
            document.getElementById("DateSubmitted").value = today;

            var submitButton = document.getElementById("form");
            var CUNYFirstID = document.getElementById("CUNYFirstID");
            var firstName = document.getElementById("fname");
            var lastName = document.getElementById("lname");
            var MailingAddress = document.getElementById("MailingAddress");
            var AddressLine2 = document.getElementById("AddressLine2");
            var phone_number = document.getElementById("phone_number");
            var home_phone_number = document.getElementById("home_phone_number");
            var email = document.getElementById("email");

            var wrongId = document.querySelector('.wrongId');
            var wrongFirstName = document.querySelector('.wrongFirstName');
            var wrongLirstName = document.querySelector('.wrongLirstName');
            var wrongAdress = document.querySelector('.wrongAdress'); 
            var wrongNumber = document.querySelector('.wrongNumber'); 
            var wrongemail = document.querySelector('.wrongemail');
            function validateForm(){
                let id = CUNYFirstID.value;
                if(id.toString().length < 6 || id.toString().length >= 10){
                    wrongId.innerHTML = "Invalidated number, Cuny first Id must be larger than 6 and smaller than 10";
                    return false;
                }else{
                    wrongId.classList.add("hide");
                }

                if(firstName.value ==""){
                    wrongFirstName.innerHTML = "First name can't be empty";
                    return false;
                }else{
                    wrongFirstName.classList.add("hide");
                }
                if(lastName.value ==""){
                    wrongLirstName.innerHTML = "Last name can't be empty";
                    return false;
                }else{
                    wrongLirstName.classList.add("hide");
                }

                if(MailingAddress.value == ""){
                    wrongAdress.innerHTML = "Address can't be empty";
                    return false;
                }else{
                    wrongAdress.classList.add("hide");
                }
                if(email.value == ""){
                    wrongemail.innerHTML = "Address can't be empty";
                    return false;
                }else{
                    wrongemail.classList.add("hide");
                }

                if(phone_number.value =="" ){
                    wrongNumber.innerHTML = "phone number can't be empty";
                    return false;
                }else{
                    wrongNumber.classList.add("hide");
                }
                
                return true;
            }
        </script>
</body>

</html>