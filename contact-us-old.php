<?php include("includes/doctype.php"); ?>

<head>

<!-- COMMON META TAG -->
<?php include("includes/meta.php"); ?>

<title>Dyad Productions - Contact Us</title>

<?php include("includes/head.php"); ?>

</head>

<body class="sub" id="contact-us">

<?php include("includes/header.php"); ?>

<div id="sub_container">
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3>Contact Us</h3>

				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<p>We'd love to hear from you! Feel free to get in touch and we'll respond as soon as possible.</p>

						<p>To ensure you receive all our latest news, subscribe to our newsletter using the form at the bottom of this page.</p>

						<form class="form-horizontal" method="post" action="sendmail-old.php">
							<div class="form-group">
								<label for="name" class="control-label">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
								<?php 
									echo "<span class='text-danger'><b>$errName</b></span>";
								?>
							</div>

							<div class="form-group">
								<label for="email" class="control-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
								<?php
									echo "<span class='text-danger'><b>$errEmail</b></span>";
								?>
							</div>

							<div class="form-group">
								<label for="message" class="control-label">Message</label>
								<textarea class="form-control" rows="4" name="message" id="message"></textarea>
								<?php
									echo "<span class='text-danger'><b>$errMessage</b></span>";
								?>
							</div>

							<div class="form-group">
								<label for="human" class="control-label">2 + 3 = ?</label>
								<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
								<?php
									echo "<span class='text-danger'><b>$errHuman</b></span>";
								?>
							</div>

							<div class="form-group">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-danger">
							</div>

							<div class="form-group">
								<?php
									echo $result; 
								?>
							</div>
						</form>
					</div>

					<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-1 col-xs-12">
						<p><strong>EMAIL</strong><br />
						rebecca@dyadproductions.com</p>

						<p><strong>TELEPHONE</strong><br />
						07957 381 317</p>

						<p><strong>ADDRESS</strong><br />
						For our postal address, please contact us via email.</p>

						<div class="header_social">
							<ul>
								<li class="facebook"><a href="http://www.facebook.com/DyadProductions" target="_blank"></a></li>
								<li class="twitter"><a href="https://twitter.com/dyadproductions" target="_blank"></a></li>
							</ul>
						</div>
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