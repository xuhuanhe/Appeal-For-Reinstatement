<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form List</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
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
    	xmlhttp.open("GET","facultysearch.php?q="+str,true);
    	xmlhttp.send();
	}
	function showAll(str)
	{
        console.log(str);
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
    	xmlhttp.open("GET","falcultyreturnall.php?q="+str,true);
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
        <h2> FORMS LIST </h2>
        <form action="" method="post" name="Search" onsubmit="showResult(document.getElementById('id').value);">
            <label><strong>ID:</strong></label>
            <input type="text" value="" name="id" id="id">
            <button type ="submit" name="button" id="button" value="1">Search</button>
        </form>
        <form action="" method="post" name="Search" onsubmit="showAll('');">
            <button type ="submit" name="button" id="button" value="1">Show All</button>
        </form>

    </div>
    <br>
    <div class="container">
			<div id="txtHint"><b></b></div>
    </div>

</body>
</html>
