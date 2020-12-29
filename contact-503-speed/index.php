<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="en">

<head>

	<meta charset="utf-8" />

	<!-- Head content such as meta tags and encoding options, etc -->
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Contact 503 Speed">
	<meta name="twitter:image" content="https://github.com/TinyEars7/503.speed.git/resources/46.jpg">
	<meta name="twitter:url" content="https://github.com/TinyEars7/503.speed.git/contact-503-speed/index.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="503.Speed">
	<meta property="og:title" content="Contact 503 Speed">
	<meta property="og:image" content="https://github.com/TinyEars7/503.speed.git/resources/46.jpg">
	<meta property="og:url" content="https://github.com/TinyEars7/503.speed.git/contact-503-speed/index.php">

	<!-- User defined head content -->
	

	<!-- Meta tags -->
	<!-- These in particular setup the viewport for mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <!-- Browser title -->
	<title>Contact 503 Speed</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Voyager/consolidated-4.css?rwcache=630900594" />
		

  <!-- Main Theme Stylesheet -->
	

	<!-- RapidWeaver Color Picker Stylesheet -->
	

  <!-- Theme specific media queries -->
	<!-- <link rel="stylesheet" href="%pathto(css/media_queries.css)%" /> -->

	<!-- User defined styles -->
	

	<!-- Plugin injected code -->
	

</head>

<body>


	<!-- Navigation in Overlay -->
	<div class="navigation_overlay">
		<div class="navigation_inner">

			<div id="navigation_close_button"><i class="fa fa-close fa-2x"></i></div>

			<div class="navigation_alignment">
				<div class="container">
							<div class="navigation_overlay_site_logo"></div>
							<h1 class="navigation_overlay_site_title">503.Speed</h1>
							<div id="social_badges"></div>
							<!-- <h2 class="navigation_overlay_site_slogan">Contact Us</h2> -->
							<div id="main_navigation">
								<ul><li><a href="../" target="_blank">Home Page</a></li><li><a href="../racing-clips/" target="_blank">Racing Clips</a></li><li><a href="../car-gallery/" rel="">Exotic/Street Car Gallery</a></li><li><a href="../motorcycle-gallery/" rel="">Motorcycle Gallery</a></li><li><a href="../merchandise/" rel="">Merchandise</a></li><li><a href="../about-503-speed/" rel="">About 503.SPEED</a></li><li><a href="./" rel="" id="current">Contact 503.SPEED</a></li></ul>
							</div>
				</div> <!-- container -->
			</div> <!-- main_navigation -->
		</div> <!-- navigation inner -->
	</div> <!-- navigation_overlay -->

	<div id="scroll_up_destination"></div>

	<div class="blur_wrapper">

		<!-- Path Theme -->

		<!-- Banner, Banner Overlay and Banner Content -->
		<div id="banner">
			<!-- Branding // Site Title, Logo and Navigation -->
			<div id="sticky_container">
				<div class="navigation_bar container">
					<div class="site_logo"></div> <h1 class="site_title">503.Speed</h1>
					<div id="navigation_toggle"><i class="fa fa-bars"></i></div>
				</div>
			</div>

			<div id="inner_banner">
				<!-- Site Slogan -->
				<div id="banner_content">
					<h2 id="slogan">Contact Us</h2>
				</div>
			</div>

			<!-- Breadcrumb Trail -->
			<div class="banner_breadcrumb">
				<div class="container width_adjustment">
					
				</div>
			</div>

		</div>

		<div id="content_container" class="container width_adjustment">
			<div class="row">

			  <div id="content">
					
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

					<div class="clearer"></div>
				</div>

			  <aside id="sidebar">
					<h3 id="sidebar_title"></h3>
					

					<div id="archives">
						
					</div>
				</aside>

			</div>
		</div>

		<footer>
			<div class="rapidweaver_footer container width_adjustment">
				&copy; 2020 503.Speed <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":50";var _rwObsfuscatedHref3 = "3.s";var _rwObsfuscatedHref4 = "pee";var _rwObsfuscatedHref5 = "d@m";var _rwObsfuscatedHref6 = "e.c";var _rwObsfuscatedHref7 = "om";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7; document.getElementById("rw_email_contact").href = _rwObsfuscatedHref;</script>
			</div>
		</footer>

	</div>

	<!-- jQuery 1.8 is included in the theme internally -->
  <script src="../rw_common/themes/Voyager/js/jquery.min.js?rwcache=630900594"></script>

	<!-- Base RapidWeaver javascript -->
	<script async type="text/javascript" src="../rw_common/themes/Voyager/javascript.js?rwcache=630900594"></script>

  <!-- Elixir theme specific javascript, along with jQuery Easing and a few other elements -->
  <script src="../rw_common/themes/Voyager/js/elixir.js?rwcache=630900594"></script>

	<!-- Style variations -->
	<script src="../rw_common/themes/Voyager/js/sidebar/sidebar_hidden.js?rwcache=630900594"></script>
		

	<!-- User defined javascript -->
	

</body>

</html>
