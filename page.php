<?php
/**
 * Page
 *
 * @package WordPress
 */

get_header(); ?>

<?php my_breadcrumb(); ?>

<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

	<!-- entry-header -->
	<div class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

		<!-- entry-meta -->
		<div class="entry-meta">
			<div class="entry-tag"><?php my_the_post_category(); ?></div><!-- /entry-item-tag -->
			<time class="entry-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
		</div><!-- /entry-meta -->

		<?php get_template_part( 'parts/sns-org' ); ?>

		<!-- entry-img -->
		<div class="entry-img">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
		}
		?>
		</div><!-- /entry-img -->
	</div><!-- /entry-header -->

	<!-- entry-body -->
	<div class="entry-body">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="entry-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
	</div><!-- /entry-body -->

</article><!-- /entry -->

		<?php
endwhile;
endif;
?>

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>