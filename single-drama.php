<?php

/*

Single Drama

*/

get_header(); ?>

	<section class="single-anime">

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<h1 class="singleanim-title"><?php the_title(); ?></h1>

			<div class="singleanim-nav">

				<a href="#main" title="Synopsis Anime">Main</a>

				<a href="#synopsis" title="Synopsis Anime">Synopsis</a>

				<a href="#information" title="Information Anime">Information</a>

				<a href="#download" title="Download Anime">Download</a>

			</div>		

		<div id="main"></div>		

		<div class="singleanim-main">

			<div class="singleanim-thumbnail">

				<?php if(has_post_thumbnail()){ the_post_thumbnail('singleanime_size');} ?>

				<div class="singleanim-trailer"><button type="button" class="btn btn-labeled btn-danger bmd-modalButton" data-toggle="lightbox" data-remote="https://www.youtube.com/embed/cMNPPgB0_mU" data-width="1280">
                <span class="btn-label"><i class="fas fa-video"></i></span>Watch Trailer</button></div>

			</div>

			<div class="singleanim-box">

				<div id="synopsis"></div>

				<div class="singleanim-stats"><div>

					<span class="col-md-3 col-sm-6 col-xs-4"><b>Score</b><i class="fa fa-star"></i><?php echo strip_tags(get_the_term_list($post->ID, 'score')?:'9.9'); ?></span>

					<span class="col-md-3 col-sm-6 col-xs-4"><b>Country</b><i class="fas fa-globe-asia"></i><?php //if (has_term('japan', 'country')) { echo "JP"; } elseif (has_term('korea', 'country')) { echo "KR"; } else{ echo '<div></div>';} ?><?php echo get_the_term_list($post->ID, 'country'); ?></span>

					<span class="col-md-3 col-sm-6 col-xs-4"><b>Type</b><i class="fa fa-fire"></i><?php echo strip_tags(get_the_term_list($post->ID, 'type')?:'undefined'); ?></span>

					<span class="col-md-3 col-sm-6 col-xs-4"><b>Episode</b><i class="fa fa-film"></i><?php echo strip_tags(get_the_term_list($post->ID, 'episode')?:'??'); ?></span>


					<div class="clear"></div>

				</div></div>

			</div>

			<div class="singleanim-sinopsis">

					<b>Synopsis</b>

					<?php the_content(); ?>

				</div>

			<div class="clear"></div>

		</div>

		<div id="information"></div>

		<div class="singleanim-info">

			<p class="singleanim-info-line"><b>Title</b>: <?php the_title(); ?></p>

			<p class="singleanim-info-line"><b>Alternatives </b>: <?php echo strip_tags (get_the_term_list($post->ID, 'alternative', '', ', ')?:'undefined'); ?></p>

			<p class="singleanim-info-line"><b>Genre </b>: <?php echo get_the_term_list($post->ID, 'genre', '', ', ')?:'undefined'; ?></p>

			<p class="singleanim-info-line"><b>Status </b>: <?php echo strip_tags (get_the_term_list($post->ID, 'status')?:'undefined'); ?></p>

			<p class="singleanim-info-line"><b>Network </b>: <?php echo strip_tags (get_the_term_list($post->ID, 'network', '', ', ')?:'undefined'); ?></p>

			<p class="singleanim-info-line"><b>Duration </b>: <?php echo strip_tags (get_the_term_list($post->ID, 'duration')?:'undefined'); ?></p>

		</div>

		<div id="download"></div>

		<table class="singleanim-episode">

			<thead>

				<tr><th>Title</th><th>Download</th></tr>

			</thead>

			<tbody>

			<?php endwhile; endif; ?>

			<?php global $post; ?>

			<?php $slug = get_post( $post->ID, "drama", true )->post_name; ?>

			<?php $recent = new WP_Query("category_name=$slug&showposts=100"); if($recent->have_posts()) : while($recent->have_posts()) : $recent->the_post(); ?>

			<tr>

				<td class="_col-eps">

					<a class="eps" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

				</td>

				<td class="_col-dl">

					<a href="<?php the_permalink(); ?>"><i class="fa fa-download"></i> Download</a>

				</td>

			</tr>

			<?php endwhile; else : ?>

			<tr>

				<td class="_col-eps">

					<a style="font-size:13px;">Download link drama is not yet available</a>

				</td>

				<td class="_col-dl">

					<strike><a><i class="fa fa-download"></i> Download</a></strike>

				</td>

			</tr>

			<?php endif; wp_reset_query(); ?>

			</tbody>

		</table>

	</section>

<?php

get_sidebar();

get_footer();

?>