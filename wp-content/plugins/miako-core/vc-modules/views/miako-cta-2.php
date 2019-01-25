<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$class  = vc_shortcode_custom_css_class( $css );
$class .= empty( $subtitle ) ? ' rt-no-sub': ' rt-has-sub';
$title_css   = $title_color ? "color:{$title_color};" : '';
$subtitle_css   = $subtitle_color ? "color:{$subtitle_color};" : '';
?>
<div class="rt-cta-2 <?php echo esc_attr( $class );?>">
	<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 rtin-cta-left">	
		<div class="rtin-cta-text-holder">
			<h3 style="<?php echo esc_attr( $title_css ); ?>"><?php echo esc_html( $title );?></h3>
			<div style="<?php echo esc_attr( $subtitle_css ); ?>" class="rtin-cta-subtitle"><?php echo esc_html( $subtitle );?></div>
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 rtin-cta-right">
		<div class="rtin-phone-holder">
			<div class="rtin-cta-phone-text"><?php if( !empty( $title_2nd )){ echo esc_html( $title_2nd ); } else { ?><?php esc_html_e( 'Toll Free Call Us' , 'miako-core' ); ?>:<?php } ?></div>
			<?php if ( !empty( $phone_number ) ) { ?>
			<div class="rtin-cta-phone-number"><a style="<?php echo esc_attr( $subtitle_css ); ?>" href="tel:<?php echo esc_html( $phone_number ); ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone_number );?></a></div>
			<?php } ?>
		</div>
	</div>
</div>