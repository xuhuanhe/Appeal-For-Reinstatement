<?php
include("database.php");
session_start();

?>






<!DOCTYPE html>

<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="External.css">
	<script>
	function showResult(str)
	{
		event.preventDefault();
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
    		xmlhttp=new XMLHttpRequest();
		}
		else
		{
   			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
    	{
        	if (xmlhttp.readyState==4 && xmlhttp.status==200)
        	{
            	document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        	}
    	}
    	xmlhttp.open("GET","livesearch.php?q="+str,true);
    	xmlhttp.send();
	}
	function showAll(str)
	{
		event.preventDefault();
		var xmlhttp;
		if (window.XMLHttpRequest)
		{
    		xmlhttp=new XMLHttpRequest();
		}
		else
		{
   			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
    	{
        	if (xmlhttp.readyState==4 && xmlhttp.status==200)
        	{
            	document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        	}
    	}
    	xmlhttp.open("GET","returnall.php?q="+str,true);
    	xmlhttp.send();
	}



	</script>
</head>
<body>
	<nav class="nav">
        <h1>Navagation</h1>
        <ul>
            <li><a href="/Appeal/Logout.php">Log Out</a></li>
        </ul>
    </nav>

	<div class="container">
		<div class="row mt-4">
			<h1 class="col-12">Admin Page</h1>

			<!--Add new user-->
			<h2 class="col-12 mt-4">Add new user</h2>
			<div class="container">
				<div class="col-12 mt-4">
					<form id="adduser-form" action="/Appeal/insert.php" onsubmit="return validateForm()" method="POST">
					
						<div class="row">
							<div class="col">
								<label name="submitID" class="sr-only">CUNY ID</label>
								<input type="text" class="form-control" id="cunyid" name="cunyid" placeholder="CUNY ID">
							</div> <!-- .col -->						
							<div class="col">
								<label name="submitfname" class="sr-only">First Name:</label>
								<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
							</div> <!-- .col -->

							<div class="col">
								<label name="submitlname" class="sr-only">Last Name:</label>
								<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
							</div> <!-- .col -->

							<div class="col">
								<label name="submitpword" class="sr-only">Password:</label>
								<input type="text" class="form-control" id="pword" name="pword" placeholder="Password">
							</div> <!-- .col -->

							<div class="col">
								<label name="submitemail" class="sr-only">Email:</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="Email">
							</div> <!-- .col -->
							
							<div class="col">
								<label name="submitusertype" class="sr-only">UserType:</label>
								<input type="text" class="form-control" id="utype" name="utype" placeholder="UserType">
							</div> <!-- .col -->
							
						
							
							
							<div class="col">
								<button role="button" type="submit" class="btn btn-primary btn-lg">Add</button>
							</div> <!-- .col -->

						</div> <!-- .form-row -->
					</form>
				</div> <!-- .col -->
			</div><!-- container -->
		</div> <!-- .row -->

		<!-- Search for user -->	

		<!-- Search for user -->
		<br>

		<form id="test" onsubmit="showResult(document.getElementById('id_user').value);">
    	<input type="text" name="name_user" id="id_user"/>
    	<input type="submit" value="search user by cuny id">
		</form>
		<br>
		<form id="test" onsubmit="showAll('');">
    	<input type="submit" value="user list">
		</form>
		<br>

		<div class="container">
			<div id="txtHint"><b></b></div>
    	</div>

		
		
		
		
	

	
	
<!--
		//Script sql code to add user to database	

		
		//Script sql code to fetch entire list of users in database
		
		
		//Script to search user by userID
			//Returned user will have a dropdown menu to edit db fieldset
			//The specific data fields to be updated will populate depending on the selected option
		
		
		//script to return list of user reviewed
		
		//script to amend user enrollment status
	-->	

	
</body>
</html>