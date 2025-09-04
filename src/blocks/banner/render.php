<?php
/**
 * Render the block.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 *
 * @package Advanced_Multi_Block
 */

?>
<p <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WP core escapes all output. ?>>
	<?php esc_html_e( 'Banner – hello from a dynamic block!', 'advanced-multi-block' ); ?>
</p>
