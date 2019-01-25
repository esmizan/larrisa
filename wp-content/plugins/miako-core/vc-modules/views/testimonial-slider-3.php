<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$thumb_size = 'rdtheme-size5';
$args = array(
	'post_type'      => 'miako_testimonial',
	'posts_per_page' => $slider_item_number,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'miako_testimonial_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}
$query = new WP_Query( $args );
$slider_nav_class = ( $slider_nav == 'true' ) ? ' slider-nav-enabled' : '';
$slider_dot_class = ( $slider_dots == 'true' ) ? ' slider-dot-enabled' : '';
?>
<div class="rt-testimonial-slider-2 owl-wrap rt-owl-nav-2<?php echo esc_attr( $slider_nav_class );?><?php echo esc_attr( $slider_dot_class );?>">		
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
		<?php if ( $query->have_posts() ) { ?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
					$id = get_the_ID();
					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = wp_trim_words( $content, $limit );
					$rc_testimonial_designation = get_post_meta( $id, 'miako_tes_designation', true );
				?>				
				<div class="rtin-single-testimonial">		
					<div class="rtin-testi-img">
						<div class="img-holder">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size ,  array( 'class' => 'img-circle' )  );
								}
							?>
						</div>
						<div class="rtin-testi-content" style="color:<?php echo esc_attr( $text_color ); ?>"><?php echo esc_html( $content ); ?></div>
						<h3 style="color:<?php echo esc_attr( $title_color ); ?>"><?php the_title(); ?></h3>
						<?php if ( !empty ( $rc_testimonial_designation ) ) { ?>
						<h4 style="color:<?php echo esc_attr ( $designation_color ); ?>"><?php echo esc_html( $rc_testimonial_designation ); ?></h4>
						<?php } ?>
					</div>
				</div>
			<?php endwhile;?>
		<?php wp_reset_query();?>
		<?php } else { ?>
			<div class="rtin-single-testimonial">
				<?php esc_html_e( 'No Testimonial Found' , 'miako-core' ); ?>
			</div>	
		<?php } ?>
	</div>
</div>