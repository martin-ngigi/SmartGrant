<?php

session_start();

	//get the username from login page that was sent to studenthome
	if (!isset($_SESSION['Username']))
	{
		//always check if there is no user name sent to here ie student home, then resirect to login.php
		header("location:login.php");
	}
	//else if user is a admin, redirect to login.php
	elseif ($_SESSION['UserType']=='admin') {
		header("location:login.php");
	}

		//connect to db
	$data=mysqli_connect('localhost', 'root', '', 'smartgrant');
	//check if connection succeeeded
	if ($data -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $data -> connect_error;
	  exit();
	}

	$name =$_SESSION['Username'];

	$sql="SELECT * FROM user WHERE Username='$name'";

	$result=mysqli_query($data, $sql);

	$info= mysqli_fetch_assoc($result);

	//if update_profile_btn button is clicked, do the following
	if (isset($_POST['update_profile_btn'])) {
		//get data from ui
		$username=$_POST['user_name_input'];
		$email=$_POST['email_input'];
		$phone=$_POST['phone_input'];
		$birth_date = $_POST['birth_date_input'];
		$age = $_POST['age_input'];
		$county = $_POST['county_input'];
		$nationality = $_POST['nationality_input'];
		$gender = htmlspecialchars($_POST['genderDD']);
		$id_nu = $_POST['id_input'];
		$bank = htmlspecialchars($_POST['bankDD']);
		$account_nu = $_POST['account_nu_input'];
		$kra_pin = $_POST['kra_pin_input'];
		$employed =htmlspecialchars($_POST['employedDD']); 
		$pension_beneficiary = htmlspecialchars($_POST['pensionDD']);
		$password = $_POST['password_input'];
		$nk_name = $_POST['nk_name_input'];
		$nk_id = $_POST['nk_id_input'];
		$nk_relationship = $_POST['nk_relationship_input'];
		$nk_phone = $_POST['nk_phone_input'];
		$nk_email = $_POST['nk_email_input'];
		$usertype="applicant";


		$sql2 = "UPDATE user SET Date_of_birth='$birth_date', Phone='$phone', Age='$age', County='$county', Nationality='$nationality', Gender='$gender', ID_Nu='$id_nu', Bank='$bank', Account_Nu='$account_nu', KRA_Pin='$kra_pin', Employed='$employed', Pension_Beneficiary='$pension_beneficiary', Password='$password', NK_Name='$nk_name', NK_ID='$nk_id', NK_Relationship='$nk_relationship', NK_Phone='$nk_phone', NK_Email='$nk_email', Email='$email' WHERE Username='$name'";

		$result = mysqli_query($data, $sql2);

		//if update is success
		if ($result) {
			// echo "Update Success";
			header('location: update_profile.php');
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Profie</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- style the labels and the UI -->
<style type="text/css">

	label
	{
		display: inline-block;
		text-align: right;
		width: 100px;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.div_deg
	{
		background-color: skyblue;
		width: 800px;
		padding-bottom: 70px;
		padding-top: 70px;

	}
	.adm_int
	{
		padding-top: 10px; 
	}
	.label_text
	{
		display: inline-block;
		width: 100px;
		text-align: right;
		padding: 10px;
	}

	.input_deg
	{
		width: 50%;
		height: 40px;
		border-radius: 15px;
		border: 1px solid blue;
	}

</style>


</head>
<body>

<div class="content">
	<center>
		<ul style="background: skyblue;">
			<li><a href="applicanthome.php">Home</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="applications_applicant.php">Applications</a></li>
			<li><a href="update_profile.php">Update Profile</a></li>
			<li><a href="logout.php" class="btn btn-success">Logout</a></li>
		</ul>
		<h1>Update Profile</h1>
		<div class="div_deg">
			<!-- # means we are going to add some code in the same same file so as to save/insert/upload -->
			<form action="#" method="POST" id="s">
				<div class="adm_int">
					<label class="label_text">Username</label>
					<label><?php echo"{$info['Username']}" ?></label>
				</div>
				<div class="adm_int">
					<label class="label_text">Email</label>
					<input class="input_deg" type="email" name="email_input" value="<?php echo"{$info['Email']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Phone</label>
					<input class="input_deg" type="text" name="phone_input" value="<?php echo"{$info['Phone']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Date Of Birth</label>
					<input class="input_deg" type="text" name="birth_date_input" value="<?php echo"{$info['Date_of_birth']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Age</label>
					<input class="input_deg" type="number" name="age_input" value="<?php echo"{$info['Age']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">County</label>
					<input class="input_deg" type="text" name="county_input" value="<?php echo"{$info['County']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Nationality</label>
					<input class="input_deg" type="text" name="nationality_input" value="<?php echo"{$info['Nationality']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Gender</label>
					<select name="genderDD" class="input_deg">
						<option value="<?php echo"{$info['Gender']}" ?>"><?php echo"{$info['Gender']}" ?></option>
					    <option value="male">Male</option>
					    <option value="Female">Female</option>
					    <option value="Other">Other</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">ID</label>
					<input class="input_deg" type="number" name="id_input" value="<?php echo"{$info['ID_Nu']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Bank</label>
					<select name="bankDD" class="input_deg">
						<option value="<?php echo"{$info['Bank']}" ?>"><?php echo"{$info['Bank']}" ?></option>
					    <option value="KCB">KCB</option>
					    <option value="Equity">Equity</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Account Nu.</label>
					<input class="input_deg" type="number" name="account_nu_input" value="<?php echo"{$info['Account_Nu']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">KRA Pin.</label>
					<input class="input_deg" type="text" name="kra_pin_input" value="<?php echo"{$info['KRA_Pin']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Employed</label>
					<select name="employedDD" class="input_deg">
						<option value="<?php echo"{$info['Employed']}" ?>"><?php echo"{$info['Employed']}" ?></option>
					    <option value="Yes">Yes</option>
					    <option value="No">No</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Pension Beneficiary</label>
					<select name="pensionDD" class="input_deg">
						<option value="<?php echo"{$info['Pension_Beneficiary']}" ?>"><?php echo"{$info['Pension_Beneficiary']}" ?></option>
					    <option value="Yes">Yes</option>
					    <option value="No">No</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Password</label>
					<input class="input_deg" type="text" name="password_input" value="<?php echo"{$info['Password']}" ?>">
				</div>
				<div>
					<h3>Next Of Kin</h3>
				</div>
				<div class="adm_int">
					<label class="label_text">Name</label>
					<input class="input_deg" type="text" name="nk_name_input" value="<?php echo"{$info['NK_Name']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">ID</label>
					<input class="input_deg" type="text" name="nk_id_input" value="<?php echo"{$info['NK_ID']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Relationship</label>
					<input class="input_deg" type="text" name="nk_relationship_input" value="<?php echo"{$info['NK_Relationship']}" ?>">
				</div>
				<div class="adm_int">
					<label class="label_text">Phone</label>
					<input class="input_deg" type="text" name="nk_phone_input" value="<?php echo"{$info['NK_Phone']}" ?>">
				</div>
					<div class="adm_int">
					<label class="label_text">Email</label>
					<input class="input_deg" type="text" name="nk_email_input" value="<?php echo"{$info['NK_Email']}" ?>">
				</div>
				<div>
					<input class="btn btn-success" type="submit" name="update_profile_btn" value="Update">
				</div>
				
			</form>
	</div>
</div>
	</center>
</body>
</html>