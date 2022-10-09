<?php

session_start();

	//get the username from login page that was sent 
	if (!isset($_SESSION['Username']))
	{
		//always check if there is no user name sent to here ie applicant home, then residect to login.php
		header("location:login.php");
	}
	//else if user is a applicant, redirect to login.php
	elseif ($_SESSION['UserType']=='applicant') {
		header("location:login.php");
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

		<?php 

	include 'applicant_css.php';

	 ?>
	
</head>
<body>
	<?php 

	include 'admin_sidebar.php';

	 ?>
	 <center>
	 	<div style="margin-left: 230px; margin-right: 50px; font-size: 20px;">
	 		<h2>Eligability for application.</h2>
	 		 <p>1. The applicant must be a Kenyan citizen.</p>
	 		 <p>2. The applicant must be 70 years and above.</p>
	 		 <p>3. Not enrolled or receiving pension from another organization.</p>
	 		 <p>4. Must have a registered active KCB or equity bank account.</p>
	 		 <p>5. Must have lived in the constituency for more than a year.</p>
	 		 <p>6. Must not be employed.</p>
	 	</div>
	 </center>
</body>
</html>