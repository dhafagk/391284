<?php
/**
 * theme from usagilabs.blogspot.com
 * version 1.0
 */
get_header(); ?>
	<section class="page-index">
	<?php while ( have_posts() ) : the_post();?>
	<article id="post-<?php the_ID(); ?>" class="post-inner post-page">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-content">
			<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sproket-framework' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
	<?php endwhile; ?>
	</section>
<?php 
get_sidebar();
get_footer();
?>