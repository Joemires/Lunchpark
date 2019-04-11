<?php
include_once "../includes/configuration/config.php";
$db = new DB;
$db -> php_display_errors();
$db -> connection();
$ref_by = $db -> ref_cookie((isset($_GET['ref'])) ? $_GET['ref'] : '');
// echo $ref_by;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lunchpark - Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendors/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" autocomplete="off">
					<span class="login100-form-title p-b-43">
						Become Our Customer
						<small style="font-size: 12px; color: grey;"> Signup now </small>
					</span>

					<input type="text" id="form_type" value="signup" hidden>

					<div class="wrap-input100 validate-input" data-validate = "Enter a name: E.g John Doe">
						<input class="input100" type="text" name="full_name">
						<span class="focus-input100"></span>
						<span class="label-input100">Full Name</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid phone number is required: 0800 000 0000">
						<input class="input100" type="tel" name="tel">
						<span class="focus-input100"></span>
						<span class="label-input100">Phone Number</span>
					</div>

					<div class="wrap-input100 validate-input auto-suggest" data-validate="Valid address is required: address, locality, state">
						<input class="input100" type="text" name="address">
						<span class="focus-input100"></span>
						<span class="label-input100">Full Location</span>
						<ul class="auto-suggestions">
							<li> Option 1 </li>
							<li> Option 2 </li>
							<li> Option 3 </li>
							<li> Option 4 </li>
							<li> Option 5 </li>
							<li> Option 6 </li>
						</ul>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100 input100" id="ckb1" type="checkbox" name="accept_terms">
							<label class="label-checkbox100" for="ckb1">
								By clicking on signup, you have agreed to our terms and conditions provided at the terms & conditions page
							</label>
						</div>

						<div class="col-xs-4">
							<a href="login.php" class="txt1">
								Login Here
							</a>
						</div>

					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							signup
						</button>
					</div>

					<div class="text-center p-t-30 p-b-20">
						<span class="txt2">
							or signup using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-10">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-10">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more">
					<h2 class="logo"> Lunchpark </h4>
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function() {
			$('.login100-form').css({'padding-top': '50px', 'padding-bottom': '15px'});
			$('.auto-suggest input').on('input', function() {
				console.log("Input");
				if ($(this).val() != '') {
					$($(this).siblings()[2]).show();
					$('.auto-suggestions').html('<li class="loader"> Loading <i class="fa fa-spin fa-spinner"> </i> </li>')
					$.ajax({
						url: 'http://autocomplete.geocoder.api.here.com/6.2/suggest.json',
						type: 'GET',
						dataType: 'json',
						// headers: {'Access-Control-Allow-Origin': '*'},
						data: {input: "wiiikie%20street", app_id: "skPzQ1FZqqj7fSzmowfK", app_code: "4AIQrPj7Qlr8XhxXizmyjA", query: $(this).val(), maxresults: 6, country: "NGA"},
						success: function(data) {
							// console.log(data.suggestions);
							var options = "";
							for (var i = 0; i < data.suggestions.length; i++) {
								options += '<li>' + data.suggestions[i].label + '</li>';
							}
							$('.auto-suggestions').html(options)
						}
					});

				} else {
					$($(this).siblings()[2]).hide()
				}
			}).on('blur', function() {
				$($(this).siblings()[2]).hide()
			})
		});
	</script>
</body>
</html>
