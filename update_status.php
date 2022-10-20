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

	//get id_num from current_applications when update button is clicked
	$id_num = $_GET['national_id'];
	//echo "$id_num";

	//connect to db
	//include("config.php");

	$data=mysqli_connect('localhost', 'root', '', 'smartgrant');
	//check if connection succeeeded
	if ($data -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $data -> connect_error;
	  exit();
	}

	$served_by = $_SESSION['Username'];
	$month_year = date("m/Y");

	$sql="SELECT * FROM applications WHERE Id_Number='$id_num' AND Application_Date LIKE '%$month_year' ";
	
	$result=mysqli_query($data, $sql);
	
	//get email
	$my_info= mysqli_fetch_assoc($result);
	$email = "{$my_info['Email']}";
	echo "$email";

	$disbursed_date = "";
	


	//if one clicks the update button,
	//will be invoked only when update_btn is pressed
	if (isset($_POST['update_btn'])) {
		$status = htmlspecialchars($_POST['statusDD']);
		//echo "$status";

		//is status Disbursed
		if ($status == "Disbursed: Check Your Account Balance") {
			$disbursed_date = date("d/m/Y");
			//echo "Status is Completed $disbursed_date";
			//
		}

		$query = "UPDATE applications SET Status='$status', Served_By='$served_by', Disbursed_Date='$disbursed_date' WHERE Id_Number=$id_num AND Application_Date LIKE '%$month_year'";

		$result2 = mysqli_query($data, $query);


		//result success
		if ($result2) {
			// echo "Update success";

			//send email
			//$to      = 'marjoriemuloma1@gmail.com';
			$to      = $email;
		    $subject = 'Application status';
		    $message = $status;
		    $headers = 'From: martinwainaina001@gmail.com'       . "\r\n" .
		                 'Reply-To: webmaster@example.com' . "\r\n" .
		                 'X-Mailer: PHP/' . phpversion();

		    mail($to, $subject, $message, $headers);

			//after updating, redirect to current_applications.php
			header("location: current_applications.php");
		}

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

	 <style type="text/css">
	 	img{
	 		width: 300px;
	 		height: 300px; 
	 	}
	 </style>
	
</head>
<body>
	<?php 

	include 'admin_sidebar.php';

	 ?>
	 <h2>Update status</h2>

	 <table border="1px" style="margin-left: 300px; margin-right: 10px;">
	 	<!-- # means will stay in this file... ie update will take place in this method -->
		<form action="#" method="POST">
			<!-- table header -->
			<tr>
				<th style="padding: 3px; font-size: 15px;">UserName</th>
				<th style="padding: 3px; font-size: 15px;">First Name</th>
				<th style="padding: 3px; font-size: 15px;">Last Name</th>
				<th style="padding: 3px; font-size: 15px;">ID Number</th>
				<th style="padding: 3px; font-size: 15px;">Application Time</th>
				<th style="padding: 3px; font-size: 15px;">Status</th>
				<th style="padding: 3px; font-size: 15px;">Amount</th>
				<th style="padding: 3px; font-size: 15px;">Select Status To Update</th>
				<th style="padding: 3px; font-size: 15px;">Update</th>
			</tr>

			<!-- while loop -->
			<?php
			$info = $my_info;
			//while ($info=$result->fetch_assoc())
			{ // while loop start
			?>
			<!-- cells where data will be displayed -->
			<tr>
				<td style="padding: 2px;">
					<?php echo "{$info['Username']}"; ?>
				</td>
				<td style="padding: 2px;">
					<?php echo "{$info['First_Name']}"; ?>
				</td>
				<td style="padding: 2px;">
					<?php echo "{$info['Last_Name']}"; ?>
				</td>
				<td style="padding:  2px;">
					<?php echo "{$info['Id_Number']}"; ?>
				</td>
				<td style="padding:  2px;">
					<?php echo "{$info['Application_Time']}"; ?>
				</td>
				<td style="padding:  2px;">
					<?php echo "{$info['Status']}"; ?>
				</td>
				<td style="padding:  2px;">
					<?php echo "{$info['Amount']}"; ?>
				</td>

				<td style="padding:  2px;">
					<div class="adm_int">
						<select name="statusDD" class="input_deg">
						    <option value="Pending: Please Wait, We Will Update You">Pending</option>
						    <option value="Processing: Please Wait Till Completed">Processing</option>
						    <option value="Disbursed: Check Your Account Balance">Disbursed</option>
						    <option value="Rejected: Please Contact Customer-Care For More Details">Rejected</option>
					    </select> 
					</div>
				</td>
				<td style="padding: 2px;">
					<div>
						<input class="btn btn-success" type="submit" name="update_btn" value="Update">
					</div>
				</td>
			</tr>
			<?php
			} // while loop end -->
			?>
		</form>
	</table>

	<!-- START OF VIEW IMAGE -->
	<?php
	 include("config.php");

 	//get id_num from current_applications when update button is clicked
	 $id_num = $_GET['national_id'];

	 $sql = "select image from images where Id_Num =  $id_num";
	 $result = mysqli_query($data,$sql);
	 $row = mysqli_fetch_array($result);

	 $image_src = $row['image'];
	 
	?>

	<div style="margin-left: 300px; margin-top: 20px; ">
		<img src="<?php echo $image_src; ?>" alt="HTML5 Icon" style="width:350px;height:350px;">

	</div>
	<!-- END OF END IMAGE -->

</body>
</html>