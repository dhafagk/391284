<?php

/**

 * theme from usagilabs.blogspot.com

 * version 1.0

 */

get_header(); ?>

	<section class="page-archive">

		<header class="page-header">

			<h3 class="page-title main-title">

			<?php

			if ( is_category() ) :

				single_cat_title();



			elseif ( is_tag() ) :

				single_tag_title();



			elseif ( is_author() ) :

				printf( __( 'Author: %s' ), '<span class="vcard">' . get_the_author() . '</span>' );



			elseif ( is_day() ) :

				printf( __( 'Day: %s' ), '<span>' . get_the_date() . '</span>' );



			elseif ( is_month() ) :

				printf( __( 'Month: %s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' );



			elseif ( is_year() ) :

				printf( __( 'Year: %s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );



			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :

				_e( 'Asides' );



			elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :

				_e( 'Galleries' );



			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :

				_e( 'Images' );



			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :

				_e( 'Videos' );



			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :

				_e( 'Quotes' );



			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :

				_e( 'Links' );



			elseif ( is_tax( 'post_format', 'post-format-status' ) ) :

				_e( 'Statuses' );



			elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :

				_e( 'Audios' );



			elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :

				_e( 'Chats' );



			else :

				_e( 'Archives' );



			endif;

			?>

			</h3>

		</header>

		<div class="row-flex row" style="margin:0 -7px;">

		<?php if ( have_posts() ) :  ?>

		<?php while(have_posts()) : the_post(); if(get_post_type(get_the_ID()) == "drama"){ ?>

		<article id="post-<?php the_ID(); ?>" class="anime-archive-item col-md-12 col-sm-12 col-xs-12">

		<div class="anime-archive-thumb">

		<?php

		if ( has_post_thumbnail() ) { 

			 the_post_thumbnail( 153, 202, true, array( 'center', 'center' ));

		} else {

				echo '<img src="',get_template_directory_uri(),'/lib/img/no_anim.png" class="thumbnail no-img" alt="Thumbnail no image">';
		}

		?>

		<div class="anime-archive-thumb-stat">

		<span class="col-md-7 col-sm-7 col-xs-7"><?php echo strip_tags(get_the_term_list($post->ID, 'type')?:'UNDEFINED'); ?></span><span class="col-md-5 col-sm-5 col-xs-5"><i class="fa fa-play-circle"></i><?php echo strip_tags(get_the_term_list($post->ID, 'episode')?:'??'); ?></span>

		<div class="clear"></div></div>

		</div>

		<div class="anime-archive-box">

		<h2><?php if (has_term('japan', 'country')) { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/lib/img/jp.png" alt="Jepang" title="Jepang" style="float:left;opacity:.75">
		<?php } elseif (has_term('korea', 'country')) { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/lib/img/kr.png" alt="Korea" title="Korea" style="float:left;opacity:.75">
		<?php } else{ echo '<div></div>';} ?><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">&nbsp;<?php the_title(); ?></a><span><i class="fa fa-star"></i><?php echo strip_tags(get_the_term_list($post->ID, 'score')?:'9.9'); ?></span></h2>

		<p><b>Status</b> : <?php echo strip_tags(get_the_term_list($post->ID, 'status')); ?></p>

		<p><b>Genre</b> : <?php echo get_the_term_list($post->ID, 'genre', ' ', ', '); ?></p>

		<p><b>Synopsis</b>: <?php the_excerpt(); ?></p>

		</div>

		</article>

		<?php

		} endwhile;

		while(have_posts()) : the_post(); if(get_post_type(get_the_ID()) == "post"){

		get_template_part('content');

		} endwhile; else : 

		get_template_part( 'content', 'none' );

		endif;

		?>

		<div class="clear"></div></div>

		<?php numeric_posts_nav(); ?>

	</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>