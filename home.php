<?php 
	$num = "12345678";
	$phone = "0712345678";
	$num_length = strlen((string)$num);
	$birth_date = "23/02/202";

	//function to validate date
	function isDate($birth_date) {
	    $matches = array();
	    $pattern = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/';
	    if (!preg_match($pattern, $birth_date, $matches)) return false;
	    if (!checkdate($matches[2], $matches[1], $matches[3])) return false;
	    return true;
	}
	
	if($num_length == 8) {
		echo "<script type='text/javascript'>
		alert('ID Number length is 8. length is $num_length');
		</script>";
		//return true;
	}
	if(! preg_match('/^(\+254|0)\d{9}$/', $phone)) { //! maeans phone number doesnt match pattern
	   echo "<script type='text/javascript'>
			alert('$phone is not valid phone number. Enter a valid phone number');
			</script>";
		//return false;
	}
	if($num_length != 8) {
	    echo "<script type='text/javascript'>
		alert('ID Number length is not equal to 8. length is $num_length');
		</script>";
	}

	if (!isDate($birth_date)) {
	    echo "<script type='text/javascript'>
		alert('Invalid date format. Enter a valid date in the form of dd/mm/yyyyy');
		</script>";
	}



	 echo "<script type='text/javascript'>
		alert('Hello');
		</script>";

 ?>