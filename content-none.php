<?php
/**
 * theme from usagilabs.blogspot.com
 * version 1.0
 */
?>
<article id="post-notfound" style="padding:0 15px;" class='post-inner post-none'>
	<!-- .page-header -->
	<div class="page-content no-content">	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<?php the_content(); ?>	
	<?php elseif ( is_search() ) : ?>
	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'); ?></p>
	<?php usagilabs_searchs(); ?>
	<?php else : ?>
	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.'); ?></p>
	<?php usagilabs_searchs(); ?>
	<?php endif; ?>	
	</div><!-- .page-content -->
</article><!-- .content-none -->