<?php
/**
 * theme from usagilabs.blogspot.com
 * version 1.0
 */
get_header(); ?>
	<?php
	if (is_front_page() and is_home() ):
	if(!empty(get_option('config_infoweb'))){
	echo '<div id="site-info">';
	echo '<p>',get_option('config_infoweb'),'</p>';
	echo '</div>';
	}
	endif;
	?>
	<?php if (is_front_page() and is_home() ):	echo '<h3 class="main-title">Recent Post</h3>'; endif;?>
	<section class="page-index site-index row-flex row">
	<?php

		if ( have_posts() ) :
			// Start the Loop.
		while ( have_posts() ) : the_post();

			get_template_part( 'content' );
		endwhile;
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );
		endif;
	 wp_reset_postdata();
	?>
	<div class="clear"></div>
	</section>
	<?php
			// Previous/next post navigation.
			numeric_posts_nav();
	?>
	<?php if(is_front_page() and is_home()) : ?>
	<section class='anime-index'>
	<?php if(is_active_sidebar('main-widget')) : ?>
	<?php dynamic_sidebar( 'main-widget' ); ?>
	<?php elseif ( is_user_logged_in() ): ?>
	<div class="site-error">
		<div class="fa fa-warning"></div>
		<strong>No Widgets Assigned.</strong>
		<a href="<?php echo admin_url(); ?>widgets.php" class="btn btn-round">Go to Widgets</a>
	</div>
	<?php endif; ?>
	</section>
	<?php endif; ?>
<?php
get_sidebar();
get_footer();
?>
