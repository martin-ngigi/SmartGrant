<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width", initital-scale-1.0>
	<title>Smart Grant</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<nav>
		<label class="logo">Smart Grant</label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="apply.php">Applications</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
			<li><a href="Register.php" class="btn btn-success">Register</a></li>
		</ul>
	</nav>

	<?php
		include 'myslider.php';
	?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome_img" src="images/House.jpg">
			</div>
			<div class="col-md-8">
				<h1>Welcome to Smart Grant</h1>
				<p>A mind that is not concerned with itself, that is free of ambition, a mind that not caught up in its own desires or driven by its own pursuit of success – such a mind is not shallow and it flowers in goodness.</p>
			</div>
		</div>
	</div>
	<center>
		<h1>Our Founders</h1>
	</center>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder1.jpg">
				<h2> Mr. John</h2>
				<p>All great things start on a small scale, all great movements begin with individuals; and if we wait for collective action, such action, if it takes place at all, is destructive and conducive to further misery. So revolution must begin with you and me.</p>
			</div>
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder2.jpg">
				<h2> Ms. Peace</h2>
				<p>The more you know yourself, the more clarity there is. Self-knowledge has no end – you don’t achieve, you don’t come to a conclusion. It is an endless river.</p>
			</div>
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder3.jpg">
				<h2> Mr. David</h2>
				<p>Society is an abstraction. Abstraction is not a reality. What is reality is relationship. The relationship between human beings has created what we call society.</p>
			</div>
			<div class="col-md-3">
				<img class="welcome_img" src="images/Founder4.jpg">
				<h2> Ms. Stacy</h2>
				<p>Ambition is a form of power, the desire for power over oneself and others, the power to do something better than anybody else. In ambition is a sense of comparison, and so the ambitious man is not a creative man, is never a happy man; in himself he is discontented.</p>
			</div>
		</div>
	</div>
</body>
</html>