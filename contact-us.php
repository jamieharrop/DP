<?php include("includes/doctype.php"); ?>

<head>

<!-- COMMON META TAG -->
<?php include("includes/meta.php"); ?>

<title>Dyad Productions - Contact Us</title>

<?php include("includes/head.php"); ?>

<style type="text/css">
      p.error, p.success {
        font-weight: bold;
        padding: 10px;
        border: 1px solid;
      }
      p.error {
        background: #ffc0c0;
        color: #900;
      }
      p.success {
        background: #b3ff69;
        color: #4fa000;
      }
    </style>
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
						<p>We'd love to hear from you! Feel free to get in touch using the methods listed here and we'll respond as soon as possible.</p>

						<p>To ensure you receive all our latest news, subscribe to our newsletter using the form at the bottom of this page.</p>					
					</div>

					<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-1 col-xs-12">
						<p><strong>EMAIL</strong><br />
						<span id="email-container"></span></p>

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

<script type="text/javascript">
		// split your email into two parts and remove the @ symbol
		var first = "rebecca";
		var last = "dyadproductions.com";
		document.getElementById("email-container").innerHTML = first + '@' + last; 
	</script>

</body>
</html>