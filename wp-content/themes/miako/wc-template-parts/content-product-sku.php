<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $product;?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<div class="sku">
		<span><?php _e( 'SKU:', 'miako' ); ?>: <?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'miako' ); ?></span>
	</div>
<?php endif;