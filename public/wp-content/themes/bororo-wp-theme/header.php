<?php
/**
 * @package Bororó 25
 */
?><!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
		<?php
			$host = $_SERVER['HTTP_HOST'];
			if ( preg_match( '/.+.(santodev|santopixel).com(.br)?/i', $host ) ) {
				echo '<meta name="robots" content="noindex, nofollow">';
			}
		?>

		<?php
			$metaTitle = wp_title( '|', FALSE, 'right' );
			$metaHomeLink = esc_url( home_url( '/' ) );
			$metaLink = $metaHomeLink;
			$metaDesc = get_bloginfo( 'description' );
			$metaImage = get_template_directory_uri() .'/img/bororo-social.jpg';
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="<?php bloginfo( 'charset' ) ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="author" content="Bororó 25">
		<meta name="URL" content="<?php echo $metaHomeLink ?>">

		<title><?php echo $metaTitle ?></title>
		<meta name="description" content="<?php echo $metaDesc ?>">
		
		<meta property="fb:app_id" content="839458146107351">
		<meta property="og:type" content="website">
		<meta property="og:title" content="<?php echo $metaTitle ?>">
		<meta property="og:image" content="<?php echo $metaImage ?>">
		<meta property="og:description" content="<?php echo $metaDesc ?>">
		<meta property="og:url" content="<?php echo $metaLink ?>">
		
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
		<script src="<?php echo get_template_directory_uri() ?>/js/libs/head.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

		<?php wp_head() ?>
		
		<!--[if lt IE 9]>
			<script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
		<![endif]-->

		<!-- Google Analytics -->
		<script type="text/javascript">
			/* @TODO */
		</script>
	</head>

	<body <?php body_class( ( is_404() || ( is_archive() && ! have_posts() ) ) ? 'error-404' : '' ) ?>>
    <div id="google_translate_element"></div><script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
    }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
		<div class="all">
