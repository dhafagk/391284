<?php
/*
Template Name: Genre List
*/
get_header(); ?>
	<section class="page-template">
		<article id="post-<?php the_ID(); ?>" class="post-inner genre-list">
			<?php while(have_posts()) : the_post(); the_title( '<h1 class="entry-title">', '</h1>' ); endwhile; ?>
					<div class="genre-list-container flex-row">
						<?php	//list terms in a given taxonomy
							$taxonomy = 'genre';
							$tax_terms = get_terms($taxonomy,'number=50');
						?>
						<?php
							foreach ($tax_terms as $tax_term) {
								echo '' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>';
							}
						?>
					</div>
		</article><!-- #post-## -->	
	</section>
<?php 
get_sidebar();
get_footer();
?>