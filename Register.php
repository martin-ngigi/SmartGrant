
<?php

session_start();
error_reporting(0);

//connect to db
include("config.php");

//$data=mysqli_connect('localhost', 'root', '', 'smartgrant');

//function to validate date
function isDate($birth_date) {
    $matches = array();
    $pattern = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/';
    if (!preg_match($pattern, $birth_date, $matches)) return false;
    if (!checkdate($matches[2], $matches[1], $matches[3])) return false;
    return true;
}

// if register_btn is clicked
if (isset($_POST['register_btn'])) {
	//get data
	$first_name=$_POST['first_name_input'];
	$last_name=$_POST['last_name_input'];
	$username=$_POST['user_name_input'];
	$email=$_POST['email_input'];
	$phone=$_POST['phone_input'];
	$birth_date = $_POST['birth_date_input'];
	$county =  htmlspecialchars($_POST['countyDD']);
	$constituency = $_POST['constituency_input'];
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

	$id_num_length = strlen((string)$id_nu);
	$birthDate = "";

	// //VALIDATE INPUT
	// if(!isset($first_name) || trim($first_name) == '')
	// {
	// 	echo "<script type='text/javascript'>
	// 			alert(' First Name is empty. Enter a valid Last Name');
	// 			</script>";

	// }
	// if (!isset($last_name) || trim($last_name) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Last Name is empty. Enter a valid Last Name');
	// 	</script>";
	// }
	// if (!isset($username) || trim($username) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('User Name is empty. Enter a valid User Name');
	// 	</script>";

	// }
	// if (!isset($email) || trim($email) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('User email is empty. Enter a valid email');
	// 	</script>";
	// }
	// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	//     echo "<script type='text/javascript'>
	// 	alert('Wrong Email format. Enter a valid email');
	// 	</script>";
	// }
	// if (!isset($phone) || trim($phone) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('phone is empty. Enter a valid phone');
	// 	</script>";
	// }
	// 	    //validate phone number phone number should of length 10 or 13 ie 07 or +254
	// if(! preg_match('/^(\+254|0)\d{9}$/', $phone)) { //! maeans phone number doesnt match pattern
	//    echo "<script type='text/javascript'>
	// 		alert('$phone is not valid phone number. Enter a valid phone number');
	// 		</script>";
	  
	// }
	// if (!isDate($birth_date)) {
	//     echo "<script type='text/javascript'>
	// 	alert('Invalid date format. Enter a valid date in the form of dd/mm/yyyyy');
	// 	</script>";
	// }

	// if (!isset($constituency) || trim($constituency) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('constituency is empty. Enter a valid constituency');
	// 	</script>";
	// }

	// if (!isset($nationality) || trim($nationality) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('nationality is empty. Enter a valid nationality');
	// 	</script>";
	// }

	// if (!isset($id_nu) || trim($id_nu) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('ID Number is empty. Enter a valid ID Number');
	// 	</script>";
	// }

	// if($id_num_length != 8) {
	//     echo "<script type='text/javascript'>
	// 	alert('ID Number length is not equal to 8 and not Valid. length is $id_num_length');
	// 	</script>";
	// }

	// if (!isset($account_nu) || trim($account_nu) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Account Number is empty. Enter a valid Account Number');
	// 	</script>";
	// }

	// if (!isset($kra_pin) || trim($kra_pin) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('KRA Pin is empty. Enter a valid KRA pin');
	// 	</script>";
	// }

	// if (!isset($password) || trim($password) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Password is empty. Enter a valid Password');
	// 	</script>";
	// }

	// if (!isset($nk_name) || trim($nk_name) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Next of Kin Name is empty. Enter a valid Next of Kin Name');
	// 	</script>";
	// }

	// if (!isset($nk_id) || trim($nk_id) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Next of Kin ID is empty. Enter a valid Next of Kin ID');
	// 	</script>";
	// }

	// if (!isset($nk_relationship) || trim($nk_relationship) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Next of Kin relationship is empty. Enter a valid Next of Kin relationship');
	// 	</script>";
	// }

	// if (!isset($nk_phone) || trim($nk_phone) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Next of Kin phone is empty. Enter a valid Next of Kin phone');
	// 	</script>";
	// }

	// if (!isset($nk_email) || trim($nk_email) == '') {
	// 	echo "<script type='text/javascript'>
	// 	alert('Next of Kin email is empty. Enter a valid Next of Kin email');
	// 	</script>";
	// }

	if (isDate($birth_date)) { //calculate age only when date format is valid
	  //CALCULATE AGE
	  //date in mm/dd/yyyy format; or it can be in other formats as well
	  //$birthDate = "12/17/1983";
	  $birthDate = $birth_date;
	  //explode the date to get month, day and year
	  $birthDate = explode("/", $birthDate);
	  //get age from date or birthdate
	  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
	    ? ((date("Y") - $birthDate[2]) - 1)
	    : (date("Y") - $birthDate[2]));
	 // echo "Age is:" . $age;

	}



	/**START OF SAVING IMAGE**/
	$iname = $_FILES['file']['name'];
    $my_image_name = $username;
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

    	// Upload file
    	if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$iname)){
	       // Convert to base64 
	       $image_base64 = base64_encode(file_get_contents('upload/'.$iname) );
	       $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
	       // Insert record
	       $query = "insert into images(ImageId_name,Image,Id_Num) values('$my_image_name', '".$image."', '$id_nu')";
	       mysqli_query($data,$query);
        }
    
    }
    /**END OF SAVING IMAGE**/
	

	//before saving, first check whether there is another student with the same username so as to avoid corrission of usernames
	$check="SELECT * FROM user WHERE username='$username'";
	$check_user=mysqli_query($data,$check);
	//check if there is multiple users
	$row_count=mysqli_num_rows($check_user);
	//if there is an existing user with the same username
	if ($row_count==1) 
	{
		echo "<script type='text/javascript'>
			alert('Username already exists. Try another username');
			</script>";
	}
	else
	{
			//sql statement to save data to db
		$sql="INSERT INTO user(Username, Date_of_birth, Phone, Age, County, Nationality, Gender, ID_Nu, Bank, Account_Nu, KRA_Pin, Employed, Pension_Beneficiary, Password, NK_Name, NK_ID, NK_Relationship, NK_Phone, NK_Email, UserType, Email, First_Name, Last_Name, Constituency) VALUES('$username', '$birth_date', '$phone', '$age', '$county', '$nationality', '$gender', '$id_nu', '$bank', '$account_nu', '$kra_pin', '$employed', '$pension_beneficiary', '$password', '$nk_name', '$nk_id', '$nk_relationship', '$nk_phone', '$nk_email', '$usertype', '$email', '$first_name', '$last_name', '$constituency')";

		$result=mysqli_query($data, $sql);
		if ($result)
		{
			echo "<script type='text/javascript'>
			alert('data uploaded successfully');
			</script>";
			//after savind data successfully, redirect to Home Page
			header("location:login.php");
		}
		else
		{
			echo "upload failed";
		}
	}


	
}




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
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
		<h1>Register</h1>
		<div class="div_deg">
			<!-- # means we are going to add some code in the same same file so as to save/insert/upload -->
			<form action="#" method="POST" id="s" enctype='multipart/form-data'>
				<div class="adm_int">
					<label class="label_text">First Name</label>
					<input class="input_deg" type="text" name="first_name_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Last Name</label>
					<input class="input_deg" type="text" name="last_name_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Username</label>
					<input class="input_deg" type="text" name="user_name_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Email</label>
					<input class="input_deg" type="text" name="email_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Phone</label>
					<input class="input_deg" type="text" name="phone_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Date Of Birth</label>
					<input class="input_deg" type="text" placeholder="NB: use dd/mm/yyyy format" name="birth_date_input">
				</div>
				<div class="adm_int">
					<label class="label_text">County</label>
					<select name="countyDD" class="input_deg">
					    <option value="Mombasa">Mombasa</option>
					    <option value="Kwale">Kwale</option>
					    <option value="Kilifi">Kilifi</option>
					    <option value="Tana River">Tana River</option>
					    <option value="Lamu">Lamu</option>
					    <option value="Taita-Taveta">Taita-Taveta</option>
					    <option value="Garisa">Garisa</option>
					    <option value="Wajir">Wajir</option>
					    <option value="Mandera">Mandera</option>
					    <option value="Marsabit">Marsabit</option>
					    <option value="Isiolo">Isiolo</option>
					    <option value="Meru">Meru</option>
					    <option value="Tharaka-Nithi">Tharaka-Nithi</option>
					    <option value="Embu">Embu</option>
					    <option value="Kitui">Kitui</option>
					    <option value="Machakos">Machakos</option>
					    <option value="Makueni">Makueni</option>
					    <option value="Nyandarua">Nyandarua</option>
					    <option value="Nyeri">Nyeri</option>
					    <option value="Kirinyaga">Kirinyaga</option>
					    <option value="Muranga">Muranga</option>
					    <option value="Kiambu">Kiambu</option>
					    <option value="Turkana">Turkana</option>
					    <option value="West Pokot">West Pokot</option>
					    <option value="Samburu">Samburu</option>
					    <option value="Trans-Nzoia">Trans-Nzoia</option>
					    <option value="Uasin Gishu">Uasin Gishu</option>
					    <option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
					    <option value="Nandi">Nandi</option>
					    <option value="Baringo">Baringo</option>
					    <option value="Laikipia">Laikipia</option>
					    <option value="Nakuru">Nakuru</option>
					    <option value="Narok">Narok</option>
					    <option value="Kajiado">Kajiado</option>
					    <option value="Kericho">Kericho</option>
					    <option value="Bomet">Bomet</option>
					    <option value="Kakamega">Kakamega</option>
					    <option value="Vihiga">Vihiga</option>
					    <option value="Bungoma">Bungoma</option>
					    <option value="Busia">Busia</option>
					    <option value="Siaya">Siaya</option>
					    <option value="Kisumu">Kisumu</option>
					    <option value="Homa Bay">Homa Bay</option>
					    <option value="Migori">Migori</option>
					    <option value="Kisii">Kisii</option>
					    <option value="Nyamira">Nyamira</option>
					    <option value="Nairobi">Nairobi</option>

				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Constituency</label>
					<input class="input_deg" type="text" name="constituency_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Nationality</label>
					<input class="input_deg" type="text" name="nationality_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Gender</label>
					<select name="genderDD" class="input_deg">
					    <option value="male">Male</option>
					    <option value="Female">Female</option>
					    <option value="Other">Other</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">ID</label>
					<input class="input_deg" type="number" name="id_input">
				</div>
				<div class="adm_int">
				    <input style="width: 200px;" class="input_deg" type='file' name='file' />
				</div>
				<div class="adm_int">
					<label class="label_text">Bank</label>
					<select name="bankDD" class="input_deg">
					    <option value="KCB">KCB</option>
					    <option value="Equity">Equity</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Account Nu.</label>
					<input class="input_deg" type="text" name="account_nu_input">
				</div>
				<div class="adm_int">
					<label class="label_text">KRA Pin.</label>
					<input class="input_deg" type="text" name="kra_pin_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Employed</label>
					<select name="employedDD" class="input_deg">
					    <option value="Yes">Yes</option>
					    <option value="No">No</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Pension Beneficiary</label>
					<select name="pensionDD" class="input_deg">
					    <option value="Yes">Yes</option>
					    <option value="No">No</option>
				    </select> 
				</div>
				<div class="adm_int">
					<label class="label_text">Password</label>
					<input class="input_deg" type="text" name="password_input">
				</div>
				<div>
					<h3>Next Of Kin</h3>
				</div>
				<div class="adm_int">
					<label class="label_text">Name</label>
					<input class="input_deg" type="text" name="nk_name_input">
				</div>
				<div class="adm_int">
					<label class="label_text">ID</label>
					<input class="input_deg" type="number" name="nk_id_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Relationship</label>
					<input class="input_deg" type="text" name="nk_relationship_input">
				</div>
				<div class="adm_int">
					<label class="label_text">Phone</label>
					<input class="input_deg" type="number" name="nk_phone_input">
				</div>
					<div class="adm_int">
					<label class="label_text">Email</label>
					<input class="input_deg" type="text" name="nk_email_input">
				</div>
				<div>
					<input class="btn btn-success" type="submit" name="register_btn" value="Register">
				</div>
				
			</form>
	</div>
</div>
	</center>
</body>
</html>