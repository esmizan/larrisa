<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'rdtheme-size12';
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$style = "";
if ( !empty( $bgcolor ) ) {
	$style .= "background-color:{$bgcolor};";
}
$style_bg = "";
if ( !empty( $bghover ) ) {
	$style_bg = $bgcolor;
} else {
	$style_bg = RDTheme::$options['primary_color'];
}

$args = array(
	'post_type'      => 'miako_law',
	'posts_per_page' => $grid_item_number,
	'paged'          => $paged,
	'orderby'		 => $orderby,
	'order'			 => $order,
);
if ( !empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'miako_law_category',
			'field' => 'term_id',
			'terms' => $cat,
		)
	);
}
$query = new WP_Query( $args );
$col_class = "col-lg-$col_lg col-md-$col_md col-sm-$col_sm col-xs-$col_xs";

// Pagination fix
global $wp_query;
$wp_query   = NULL;
$wp_query   = $query;
?>
<div class="rt-service-grid-6 row auto-clear">
	<?php if ( $query->have_posts() ) { ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php
			$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( $content, $count );
			$service_icon  = get_post_meta( $id, 'miako_law_icon', true );
			$service_link  = get_post_meta( $id, 'mk_service_link', true );
		?>
		<div class="<?php echo esc_attr( $col_class );?> no-pad">
			<div class="rt-service-layout-6" style="<?php echo esc_attr( $style );?>" data-bgcolor="<?php echo esc_attr( $bgcolor );?>" data-bghover="<?php echo esc_attr( $style_bg );?>">
				<div class="rtin-icon-holder">
					<?php if ( !empty ( $service_icon ) ) { ?>
					<i class="fa <?php echo esc_attr( $service_icon ); ?>"></i>
					<?php } else { ?>
					<i class="fa fa-handshake-o" aria-hidden="true"></i>
					<?php } ?>
				</div>
				<div class="rtin-item-content">				
					<?php if( empty( $service_link ) ) { ?>
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php } else { ?>
					<h3><a href="<?php echo esc_attr( $service_link );?>"><?php the_title();?></a></h3>
					<?php } ?>
					<p><?php echo esc_html( $content ); ?></p>
				</div>
			</div>
		</div>
		<?php endwhile;?>
		<div class="mt20 col-sm-12 col-xs-12 pagination-wrapper"><?php RDTheme_Helper::pagination();?></div>
		<?php wp_reset_query();?>
	<?php } else { ?>
		<div class="<?php echo esc_attr( $col_class ); ?>">
			<?php esc_html_e( 'No Law Service Found' , 'miako-core' ); ?>
		</div>	
	<?php } ?>
</div>