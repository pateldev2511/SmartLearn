<?php
include 'connection.php';
session_start();
// if ($_SESSION['user'] == 'student') {
// 	# code...

// 	$_SESSION['msg'] = "Please Logout form Existing Account.";
// 	header("Refresh:0; url=home.php");
// }
?>
<title>Register</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" href="images/logo.png" type="image/x-icon">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style/style.css">

<body>

	<!-- required bootstrap js -->
	<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="images/logo.png
                " alt="" , height="34">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link text-muted h4" href="#">Smart Learn</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">AboutUs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">ContactUS</a>
					</li>
					<li class="nav-item">
						<a href="registration.php" class="card-link btn btn-outline-success">Create Account</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container py-5">
		<br>
		<p class="text-center h3">Welcome to Smart Learn. Happy Learning.</p>

		<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center">Create Account</h4>
				<form id="myform" action="create.php" method="POST" enctype="multipart/form-data">
					<span class="m-2"><?php
										if (isset($_SESSION['msg'])) {

											echo '<span class="text-danger"> ' . $_SESSION['msg'] . ' </span>';
											unset($_SESSION['msg']);
										}
										?></span>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
						<input name="s_name" class="form-control" placeholder="Full name" type="text" required>
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input name="s_email" class="form-control" placeholder="Email Address" type="email" required>
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
						</div>
						<textarea class="form-control" name="s_address" id="address" placeholder="Enter Address" cols="40" rows="3"></textarea>
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fas fa-map-marker"></i> </span>
						</div>
						<input name="s_pincode" class="form-control" placeholder="Pin Code" type="number" required>
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input name="s_password" id="password" class="form-control" placeholder="Create password" minlength="8" maxlength="25" type="password">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input name="s_repassword" id="repassword" class="form-control" placeholder="Repeat password" type="password">

					</div> <!-- form-group// -->
					<span id='message'></span>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=" fas fa-image "></i></i></span>
						</div>
						<input type="file" name="image" id="image" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" id="submit" name="create" class="btn btn-primary btn-block" disabled='true'> Create Account </button>
					</div> <!-- form-group// -->


					<p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
				</form>
			</article>
		</div> <!-- card.// -->

	</div>
	<!--container end.//-->
	<!-- add 'footer' snippet in css -->
	<div class="footer-v1 bg-img">
		<div class="footer no-margin">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="headline">
							<p>Exams</p>
						</div>
						<ul class="list-unstyled link-list">
							<li><a href="#">Exam1</a></li>
							<li><a href="#">Exam2</a></li>
							<li><a href="#">Exam3</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<div class="headline">
							<p>Resources</p>
						</div>
						<ul class="list-unstyled link-list">
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<div class="headline">
							<p>Support</p>
						</div>
						<address>
							<ul class="list-unstyled link-list">
								<li><a href="#">Contact Us</a></li>
								<li>
									<a href="#"><i class="fa fa-envelope"></i>support@company.com</a>
								</li>
							</ul>
						</address>
					</div>
					<div class="col-md-3">
						<div class="headline">
							<p>Company</p>
						</div>
						<ul class="list-unstyled link-list">
							<li><a href="aboutus.html">About Us</a></li>
							<li> <a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Cancellation/Rescheduling policy</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>




	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
	</script>
	<script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="scripts/script.js"></script>

	<script>
		$('form').validate();

		$('#password, #repassword').on('keyup', function() {
			if ($('#password').val() == $('#repassword').val()) {
				$('#submit').prop('disabled', false);
				$('#message').html('Matching').css('color', 'green');

			} else
				$('#message').html('Not Matching').css('color', 'red');

		});
	</script>
</body>