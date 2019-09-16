<?php
/**
 * Facebook Like Box
 *
 * @package WordPress
 */

if ( get_theme_mod( 'my_parts_likebox_url' ) ) : ?>

	<?php
	$post_thumbnail_id = get_post_thumbnail_id();
	$facebook_url      = 'https://developers.facebook.com/docs/plugins/';
	$facebook_url      = get_theme_mod( 'my_parts_likebox_url' );
	$facebook_txt      = __( 'Give it a thumbs up', 'raccoon' );
	if ( get_theme_mod( 'my_parts_likebox_txt' ) ) {
		$facebook_txt = nl2br( get_theme_mod( 'my_parts_likebox_txt' ) );
	}
	$facebook_check = get_theme_mod( 'my_parts_likebox_check' );
	?>

	<?php if ( $facebook_check ) : ?>

<!-- p-likebox -->
<div class="p-likebox">
	<div class="e-img">
		<div class="e-cover">
			<span>
				<img src="<?php echo esc_url( wp_get_attachment_image_src( $post_thumbnail_id, 'my_thumbnail' )[0] ); ?>" alt="">
			</span>
		</div><!-- /e-cover -->
	</div><!-- /likebox-img -->
	<div class="e-body">
		<p class="e-lead"><?php echo wp_kses_post( $facebook_txt ); ?></p>
		<div class="e-btn">
			<div class="fb-like" data-href="<?php echo esc_url( $facebook_url ); ?>" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
		</div><!-- /e-btn -->
	</div><!-- /e-body -->
</div><!-- /p-likebox -->

<?php endif; ?>
<?php endif; ?>
