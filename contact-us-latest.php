<?php
// OPTIONS - PLEASE CONFIGURE THESE BEFORE USE!

$yourEmail = "jamieharrop16@gmail.com"; // the email address you wish to receive these mails through
$yourWebsite = "Dyad Productions"; // the name of your website
$thanksPage = ''; // URL to 'thanks for sending mail' page; leave empty to keep message on the same page 
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4
$requiredFields = "name,email,comments"; // names of the fields you'd like to be required as a minimum, separate each field with a comma


// DO NOT EDIT BELOW HERE
$error_msg = array();
$result = null;

$requiredFields = explode(",", $requiredFields);

function clean($data) {
  $data = trim(stripslashes(strip_tags($data)));
  return $data;
}
function isBot() {
  $bots = array("Indy", "Blaiz", "Java", "libwww-perl", "Python", "OutfoxBot", "User-Agent", "PycURL", "AlphaServer", "T8Abot", "Syntryx", "WinHttp", "WebBandit", "nicebot", "Teoma", "alexa", "froogle", "inktomi", "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory", "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot", "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz");

  foreach ($bots as $bot)
    if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false)
      return true;

  if (empty($_SERVER['HTTP_USER_AGENT']) || $_SERVER['HTTP_USER_AGENT'] == " ")
    return true;
  
  return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isBot() !== false)
    $error_msg[] = "No bots please! UA reported as: ".$_SERVER['HTTP_USER_AGENT'];
    
  // lets check a few things - not enough to trigger an error on their own, but worth assigning a spam score.. 
  // score quickly adds up therefore allowing genuine users with 'accidental' score through but cutting out real spam :)
  $points = (int)0;
  
  $badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

  foreach ($badwords as $word)
    if (
      strpos(strtolower($_POST['comments']), $word) !== false || 
      strpos(strtolower($_POST['name']), $word) !== false
    )
      $points += 2;
  
  if (strpos($_POST['comments'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
    $points += 2;
  if (isset($_POST['nojs']))
    $points += 1;
  if (preg_match("/(<.*>)/i", $_POST['comments']))
    $points += 2;
  if (strlen($_POST['name']) < 3)
    $points += 1;
  if (strlen($_POST['comments']) < 15 || strlen($_POST['comments'] > 1500))
    $points += 2;
  if (preg_match("/[bcdfghjklmnpqrstvwxyz]{7,}/i", $_POST['comments']))
    $points += 1;
  // end score assignments

  foreach($requiredFields as $field) {
    trim($_POST[$field]);
    
    if (!isset($_POST[$field]) || empty($_POST[$field]) && array_pop($error_msg) != "Please fill in all the required fields and submit again.\r\n")
      $error_msg[] = "Please fill in all the required fields and submit again.";
  }

  if (!empty($_POST['name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['name'])))
    $error_msg[] = "The name field must not contain special characters.\r\n";
  if (!empty($_POST['email']) && !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
    $error_msg[] = "That is not a valid e-mail address.\r\n";
  if (!empty($_POST['url']) && !preg_match('/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i', $_POST['url']))
    $error_msg[] = "Invalid website url.\r\n";
  
  if ($error_msg == NULL && $points <= $maxPoints) {
    $subject = "Automatic Form Email";
    
    $message = "You received this e-mail message through your website: \n\n";
    foreach ($_POST as $key => $val) {
      if (is_array($val)) {
        foreach ($val as $subval) {
          $message .= ucwords($key) . ": " . clean($subval) . "\r\n";
        }
      } else {
        $message .= ucwords($key) . ": " . clean($val) . "\r\n";
      }
    }
    $message .= "\r\n";
    $message .= 'IP: '.$_SERVER['REMOTE_ADDR']."\r\n";
    $message .= 'Browser: '.$_SERVER['HTTP_USER_AGENT']."\r\n";
    $message .= 'Points: '.$points;

    if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
      $headers   = "From: $yourEmail\r\n";
    } else {
      $headers   = "From: $yourWebsite <$yourEmail>\r\n"; 
    }
    $headers  .= "Reply-To: {$_POST['email']}\r\n";

    if (mail($yourEmail,$subject,$message,$headers)) {
      if (!empty($thanksPage)) {
        header("Location: $thanksPage");
        exit;
      } else {
        $result = 'Your message was successfully sent.';
        $disable = true;
      }
    } else {
      $error_msg[] = 'Your message could not be sent this time. ['.$points.']';
    }
  } else {
    if (empty($error_msg))
      $error_msg[] = 'Your message looks too much like spam, and could not be sent this time. ['.$points.']';
  }
}
function get_data($var) {
  if (isset($_POST[$var]))
    echo htmlspecialchars($_POST[$var]);
}
?>

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

<script type="text/javascript">
		// split your email into two parts and remove the @ symbol
		var first = "rebecca";
		var last = "dyadproductions.com";
	</script>
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

						<?php
            if (!empty($error_msg)) {
              echo '<p class="error">ERROR: '. implode("<br />", $error_msg) . "</p>";
            }
            if ($result != NULL) {
              echo '<p class="success">'. $result . "</p>";
            }
          ?>

						<form class="form-horizontal" method="post" action="<?php echo basename(__FILE__); ?>">
							<div class="form-group">
								<label for="name" class="control-label">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php get_data("name"); ?>">
							</div>

							<div class="form-group">
								<label for="email" class="control-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php get_data("email"); ?>">
							</div>

							<div class="form-group">
								<label for="comments" class="control-label">Message</label>
								<textarea class="form-control" rows="4" name="comments" id="comments"><?php get_data("comments"); ?></textarea>
							</div>

							<div class="form-group">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-danger" <?php if (isset($disable) && $disable === true) echo ' disabled="disabled"'; ?>>
							</div>
						</form>
					</div>

					<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-1 col-xs-12">
						<p><strong>EMAIL</strong><br />
						<script type="text/javascript">document.write('+first + '@' + last+');</script></p>

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