<?php get_header(); ?>
	<section class="page-single">	<?php while ( have_posts() ) : the_post();	breadcrumbs(); ?>
	<article id="post-<?php the_ID(); ?>" class="post-inner post-single">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<header class="entry-header cl">		<span class="author-link">Posted <span class="cat-links"><?php the_author_posts_link(); ?></span></span>		<span class="time-link">on <span class="cat-links"><?php the_time('F jS, Y'); ?> at  <?php the_time('g:i a'); ?></span></span>		<span class="view-link fr"><i class='fa fa-eye'></i> <span class="cat-links"><?php echo wpb_get_post_views(get_the_ID()); ?> view.</span>		</span>	</header><!-- .entry-header -->
	<div class="entry-paginasi">
		<div class='like-desu col-md-5 col-sm-4 col-xs-4'><div class="fb-like" data-href="<?php get_permalink($post->ID) ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div></div>		<div class='paginasi-blog fr col-md-7 col-sm-8 col-xs-8'><?php echo usagilabs_pagination() ?></div>		<div class="clear"></div>
	</div>
	<div class="entry-content cl">
	<ul class="mirror-menu" role="tablist" id="myTab">
		<li role="presentation" class="active"><a href="#jdserver" aria-controls="video" role="tab" data-toggle="tab">JDrive</a></li>	<li role="presentation"><a href="#mirror1" aria-controls="mirror1" role="tab" data-toggle="tab"><?php echo get_post_meta($post->ID, 'name_stream1', true); ?></a></li>
		<li role="presentation"><a href="#mirror2" aria-controls="mirror2" role="tab" data-toggle="tab"><?php echo get_post_meta($post->ID, 'name_stream2', true); ?></a></li>
		<li role="presentation"><a href="#mirror3" aria-controls="mirror3" role="tab" data-toggle="tab"><?php echo get_post_meta($post->ID, 'name_stream3', true); ?></a></li>
		<li role="presentation" class="fr"><a class="switch mirror_lights" style="cursor:pointer;"><i class="far fa-lightbulb"></i> Focus</a></li>	</ul>
	  <div class="mirror-content">
	  	<?php $content = get_the_content(); $content = preg_replace("/<embed?[^>]+>/i", "(embed) ", $content); $content = wp_strip_all_tags($content); ?>
		<div role="tabpanel" class="tab-pane active" id="jdserver"><iframe src="<?php echo $content; ?>" width="100%" height="800" frameborder="0" allowfullscreen="true"></iframe></div>
		<div role="tabpanel" class="tab-pane" id="mirror1"><iframe src="<?php echo get_post_meta($post->ID, 'video_stream1', true); ?>" width="100%" height="800" frameborder="0" allowfullscreen="true"></iframe></div>
		<div role="tabpanel" class="tab-pane" id="mirror2"><iframe src="<?php echo get_post_meta($post->ID, 'video_stream2', true); ?>" width="100%" height="800" frameborder="0" allowfullscreen="true"></iframe></div>
		<div role="tabpanel" class="tab-pane" id="mirror3"><iframe src="<?php echo get_post_meta($post->ID, 'video_stream3', true); ?>"  width="100%" height="800" frameborder="0" allowfullscreen="true"></iframe></div>
	  </div>
	 <div class="mirror-footer cl">
	  <a class="mirror_report" style="cursor:pointer;" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fas fa-exclamation-triangle"></i> Report</a>
	  <span class="fr">
	  <a class="mirror_source"><b>Source : </b><?php echo strip_tags (get_the_term_list($post->ID, 'source'))?:bloginfo('name'); ?></a>
	  <a class="mirror_dl" role="button" data-toggle="collapse" href="#spoilerdl" aria-expanded="false" aria-controls="spoilerdl"><i class="fa fa-download"></i> Download</a>
	  </span>
	 </div>
	 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	  <div class="modal-dialog" style="margin-top:7%;">

	  	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="float:left;">Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo do_shortcode('[contact-form-7 id="78" title="Report"]'); ?></p>
      </div>
    </div>

	  	</div>
	</div>
	</div><!-- .entry-content -->
	<div class="entry-download collapse" id="spoilerdl">
	<?php echo usagilabs_download()	?>
	</div>
	<div class="anime-info row row-flex"><?php echo usagilabs_info() ?><span class='clear'></span></div>
	<textarea class="smillar-tag" rows="2">download <?php the_title(); ?>, nonton drama <?php the_title(); ?> gratis, episode terbaru <?php the_title(); ?>, drama <?php the_title(); ?>, download <?php the_title(); ?> 720P, drama <?php the_title(); ?> 480P, download <?php the_title(); ?> HD, <?php the_title(); ?> 3gp, <?php the_title(); ?> 480p 3gp 720p 1080p</textarea>
	<footer class="share-entry cl">
		<a class="btn shr shr-tw" href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" title="Share this post on Twitter!" target="_blank"><i class="fab fa-twitter"></i></i> Twitter</a>
		<a class="btn shr shr-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share this post on Facebook!" onclick="window.open(this.href); return false;"><i class="fab fa-facebook-f"></i> Facebook</a>
		<a class="btn shr shr-gp" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus-g"></i> Google+</a>
	</footer><!-- .entry-share -->
	</article><!-- #post-## -->
	<?php
			// Previous/next post navigation.
			numeric_posts_nav();			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
	?>
	</section>

<ul id="nav">
  <li><a href="https://muvix.us/video/JikdbqdefKw6rCF/">Page 1</a></li>
  <li><a href="https://google.com/">Page 2</a></li>
  <li><a href="<?php echo get_permalink(); ?>">Page 3</a></li>
</ul>
 
<div id="ajax-content">This is default text, which will be replaced</div>

<?php
get_sidebar();
get_footer();
?>
