<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'miako' ); ?></a>
		<header id="masthead" class="site-header">
			<?php
				if ( RDTheme::$top_bar == 1 || RDTheme::$top_bar == 'on' ){
					get_template_part( 'template-parts/header/header-top', RDTheme::$top_bar_style );
				}
				get_template_part( 'template-parts/header/header', RDTheme::$header_style );
			?>
		</header>
		<div id="meanmenu"></div>
		<div id="content" class="site-content">
			<?php get_template_part('template-parts/content', 'banner');?>