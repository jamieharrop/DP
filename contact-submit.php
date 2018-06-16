<?php

// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == ''){

	// put your email address here
	$youremail = 'jamieharrop16@gmail.com';

	// prepare a "pretty" version of the message
	// Important: if you added any form fields to the HTML, you will need to add them here also
	$body = "Please see results from your website contact form:
	Name:  $_POST[name]
	E-Mail: $_POST[email]
	Message: $_POST[message]";

	// Use the submitters email if they supplied one
	// (and it isn't trying to hack your form).
	// Otherwise send from your email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}

	// finally, send the message
	mail($youremail, 'Contact Form', $body, $headers );

}

// otherwise, let the spammer think that they got their message through

?>
<?php include("includes/doctype.php"); ?>

<head>

<!-- COMMON META TAG -->
<?php include("includes/meta.php"); ?>

<title>Dyad Productions - Thank You!</title>

<?php include("includes/head.php"); ?>
</head>

<body class="sub" id="contact-us">

<?php include("includes/header.php"); ?>

<div id="sub_container">
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3>Thank You!</h3>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<p>Thank you for contacting us. We'll be in touch soon.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("includes/subscribe-social.php"); ?>

<?php include("includes/footer.php"); ?>

<?php include("includes/js.php"); ?>

</body>
</html>