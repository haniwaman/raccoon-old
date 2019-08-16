<?php
/**
 * Attachment
 *
 * @package WordPress
 */

get_header(); ?>



<?php get_template_part( 'template/mainvisual/page' ); ?>



<!-- l-content -->
<div id="l-content">
<div class="l-inner">
<div class="l-row">

<!-- l-primary -->
<main id="l-primary">

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

<!-- p-entry -->
<article <?php post_class( array( 'p-entry' ) ); ?>>

	<!-- e-header -->
	<div class="e-header">
		<?php my_breadcrumb(); ?>
		<h1 class="e-title"><?php the_title(); ?></h1><!-- /e-title -->

		<!-- e-meta -->
		<div class="e-meta">
		<div class="e-label"><span><?php echo esc_html( get_post_mime_type( get_the_ID() ) ); ?></span></div><!-- /e-label -->
			<time class="e-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
		</div><!-- /entry-meta -->

		<figure class="e-img">
		<?php if ( wp_attachment_is_image( get_the_ID() ) ) : ?>
			<?php echo wp_get_attachment_image( get_the_ID(), 'my_thumbnail' ); ?>
		<?php elseif ( false !== strpos( get_post_mime_type( get_the_ID() ), 'video' ) ) : ?>
			<video src="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" controls></video>
		<?php elseif ( false !== strpos( get_post_mime_type( get_the_ID() ), 'audio' ) ) : ?>
			<audio src="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" controls></audio>
		<?php else : ?>
			<div class="attachment-btn">
				<a class="c-btn" href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" rel="noopener" target="_blank">この添付のURL</a>
			</div><!-- /attachment-btn -->
		<?php endif; ?>
			<figcaption class="e-caption"><?php the_excerpt(); ?></figcaption>
		</figure><!-- /e-img -->
	</div><!-- /e-header -->

	<!-- e-body -->
	<div class="e-body">
		<?php the_content(); ?>
	</div><!-- /e-body -->

</article><!-- /p-entry -->

	<?php endwhile; ?>
<?php endif; ?>

</main><!-- /l-primary -->

<?php get_sidebar(); ?>


</div><!-- /l-row -->
</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
