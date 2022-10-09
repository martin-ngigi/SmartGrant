
<?php
//dont show unecessary errors
error_reporting(0);
session_start();

	//get the username from login page that was sent to applicanthome.php
	if (!isset($_SESSION['Username']))
	{
		//always check if there is no user name sent to here ie applicant home, then residect to login.php
		header("location:login.php");
	}
	//else if user is a applicant, redirect to login.php
	elseif ($_SESSION['UserType']=='applicant') {
		header("location:login.php");
	}


	//connect to db
	$data=mysqli_connect('localhost', 'root', '', 'smartgrant');
	//check if connection succeeeded
	if ($data -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $data -> connect_error;
	  exit();
	}

	$month_year = date("m/Y");

	$sql="SELECT * FROM applications WHERE Application_Date LIKE '%$month_year'"; ////////////////////
	$result=mysqli_query($data, $sql);



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Applicant Dashboard</title>

		<?php 

	include 'applicant_css.php';

	 ?>
	 <style type="text/css">
	 	#apply_btn
	 	{
	 		width: 100px;
	 		height: 30px;
	 	}
	 	#success_msg{
	 		margin-left: 230px;
	 		margin-right: 50px;
	 	}
	 	#error_msg{
	 		margin-left: 230px;
	 		margin-right: 50px;
	 	}
	 </style>
	
</head>
<body>
	<?php 

	include 'admin_sidebar.php';

	 ?>
	<center>
		<h1>Current and Previous Application(s)</h1>
		<form action="#" method="POST" > <!-- # means after clicking, stay on this page -->

			<table border="1px" style="margin-left: 150px;">
				<!-- table header -->
				<tr>
					<th style="padding: 10px; font-size: 15px;">UserName</th>
					<th style="padding: 10px; font-size: 15px;">First Name</th>
					<th style="padding: 10px; font-size: 15px;">Last Name</th>
					<th style="padding: 10px; font-size: 15px;">ID Number</th>
					<th style="padding: 10px; font-size: 15px;">Application Time</th>
					<th style="padding: 10px; font-size: 15px;">Status</th>
					<th style="padding: 10px; font-size: 15px;">Amount</th>
					<th style="padding: 10px; font-size: 15px;">Update</th>
				</tr>

				<!-- while loop -->
				<?php
				while ($info=$result->fetch_assoc())
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
					<td style="padding: 2px;" class="table_td"><?php echo "<a class='btn btn-primary' href='update_status.php?national_id={$info['Id_Number']}'>Update</a>";?></td>
				</tr>
				<?php
				} // while loop end -->
				?>
			</table>
		</form>

		<!-- javascript to print table -->
		<a href="javascript:void(0);" onclick="printPage();">Print</a> 

		<script type="text/javascript">
		 function printPage(){
		        var tableData = '<table border="1">'+document.getElementsByTagName('table')[0].innerHTML+'</table>';
		        var data = '<button onclick="window.print()">Print this page</button>'+tableData;       
		        myWindow=window.open('','','width=800,height=600');
		        myWindow.innerWidth = screen.width;
		        myWindow.innerHeight = screen.height;
		        myWindow.screenX = 0;
		        myWindow.screenY = 0;
		        myWindow.document.write(data);
		        myWindow.focus();
		    };
		 </script>

	</center>
</body>
</html>