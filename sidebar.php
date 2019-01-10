<?php
/**
 * theme from usagilabs.blogspot.com
 * version 1.0
 */
?>
</main>
<aside id="sidebar" class="sidebar col-md-4 col-sm-4 col-xs-12 col-mb-12" role="complementary">
	<?php if(is_active_sidebar('main-sidebar')) : ?>
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
	<?php elseif ( is_user_logged_in() ): ?>
	<div class="error">
		<div class="fa fa-warning"></div>
		<strong>No Widgets Assigned.</strong>
		<a href="<?php echo admin_url(); ?>widgets.php" class="btn btn-round">Go to Widgets</a>
	</div>
	<?php endif; ?>
</aside><!-- .sidebar -->