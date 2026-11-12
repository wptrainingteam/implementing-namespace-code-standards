<?php
/**
 * PHP file to use when rendering the banner block on the server.
 *
 * @package Advanced_Multi_Block
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>
<p <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- get_block_wrapper_attributes() escapes its own output. ?>>
	<?php esc_html_e( 'Banner – hello from a dynamic block!', 'advanced-multi-block' ); ?>
</p>
