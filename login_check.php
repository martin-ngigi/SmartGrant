<?php

//dont show errors and warnings
error_reporting(0);
//start session
session_start();

include("config.php");
//$data=mysqli_connect('localhost', 'root', '', 'smartgrant');

//check if connection succeeeded
if ($data -> connect_errno) {
  echo "Failed to connect to MySQL: " . $data -> connect_error;
  exit();
}

// else{
// 	echo " connected to 'smartgrant' MySQL: successfully ";
// }


//VALIDATE LOGIN CREDENIALS
//This method will be executed only if one clicks the submit button with the post method in the login.php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{

	//get data from form
	$name=$_POST['username']; //username from the login.php
	$pass=$_POST['password']; //password from the login.php


	$sql="SELECT * FROM user WHERE username='".$name."' AND password='".$pass."' ";

	$result=mysqli_query($data, $sql);
	$row=mysqli_fetch_array($result);

	//check type of user
	//if user is a applicant
	if ($row["UserType"]=="applicant")
	{
		//send username and usertype to applicanthome
		$_SESSION['Username']=$name;
		$_SESSION['UserType']="applicant";

		//take applicant to applicanthome
		header("location:applicanthome.php");
	}
		//if user is a adminhome
	elseif ($row["UserType"]=="admin")
	{
		//send username and usertype to adminhome
		$_SESSION['Username']=$name;
		$_SESSION['UserType']="admin";

		//take admin to adminhome
		header("location:adminhome.php");
	}

	else
	{
		$message="username or password dont match";
		$_SESSION['loginMessage']=$message; //store error message in loginMessage
		header("location:login.php");
	}

	

}




?>