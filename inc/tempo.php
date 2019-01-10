<?php
/* TEMPAT CODE RECENT POST */

/* == MISC  == */
function usagilabs_category(){
	$category = get_the_category()[0];
	echo '<a href="'. esc_url(home_url( '/drama/' ) . esc_attr( $category->slug )) .'" title="see all '.esc_attr( $category->name ).'">'.esc_html( $category->name ).'</a>';
}

function usagilabs_seeall(){
	$category = get_the_category()[0];
	echo '<a href="'. esc_url(home_url( '/drama/' ) . esc_attr( $category->slug )) .'" title="see all episode '.esc_attr( $category->name ).'">',get_option('config_seeall')?:'See All Episode','</a>';	
}

function usagilabs_search(){
	echo '<form role="search" method="get" class="search-form" action="',esc_url(home_url('/')),'">';
	echo '<input type="search" class="search-field" placeholder="',esc_attr_x( 'Search &hellip;', 'placeholder'),'" value="',get_search_query(),'" name="s" />';
	echo '<select id="pilih" name="post_type"><option value="drama">Drama</option><option value="post">Episode</option></select>';
	echo '</form>';
}

function usagilabs_searchs(){
	echo '<form role="search" method="get" class="searchs-form" action="',esc_url(home_url('/')),'">';
	echo '<input type="search" class="search-field" placeholder="',esc_attr_x( 'Search &hellip;', 'placeholder'),'" value="',get_search_query(),'" name="s" />';
	echo '<select id="pilih" name="post_type"><option value="drama">Drama</option><option value="post">Episode</option></select>';
	echo '</form>';
}

/* == REKOMENDASI drama == */
function usagilabs_recomended(){
	echo '<b>',get_option('recom_title')?:'Recommended :','</b>';
	$rekomendasi = new WP_Query(
	array(
	'post_type' => get_option('recom_posttype')?:'drama',
	'orderby'   => 'rand',
	'showposts'   => get_option('recom_num_post')?:'6'
	));
	while($rekomendasi->have_posts()) : $rekomendasi->the_post();
	the_title( sprintf( '<a href="%s" class="recom-title">', esc_url( get_permalink() ) ), '</a>' );
	endwhile;
}

/* == HOT UPDATE == */
function usagilabs_hotupdate(){
	echo '<div id="hotupdate"><div class="hotupdates row row-flex">';
			$hotupdate = new WP_Query(
			array(
			'post_type' => get_option('hot_posttype')?:'post',
			'orderby'   => 'modified',
			'showposts'   => get_option('hot_num_post')?:'6',
			));
			if($hotupdate->have_posts()) : while($hotupdate->have_posts()) : $hotupdate->the_post();	
		
	echo '<div class="hotupdate-posts col-md-2 col-sm-3 col-xs-4">';
	echo '<div class="hotupdate-thumb">';
	echo '<a href="', the_permalink() ,'" title="',the_title() ,'">';
		if ( has_post_thumbnail() ) { 
			 the_post_thumbnail( array( 153, 202, true, array( 'center', 'center' ), 'class' => 'thumbnail', 'alt' => get_the_title() ) );
			} else {
				echo '<img src="',get_template_directory_uri(),'/lib/img/no_anim.png" class="thumbnail no-img" alt="Thumbnail no image">';
		}
	echo '</a>';
	echo '<h3 class="hotupdate-title">';
		 the_title( sprintf( '<a class="eps" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); 
	echo '</h3>';
	echo '</div>';
	echo '</div>';
		 endwhile; else : 
	echo '<div class="site-error"><p>',get_option('hot_error_notice')?:'No latest hottest drama','</p></div>';
	endif; 
	echo '<div class="clear"></div>';
	echo '</div></div>';
}

/* == PAGINASI == */
function usagilabs_pagination(){
	echo '<span class="anipager-prev">', previous_post_link('%link', get_option('config_prev')?:'<i class="fa fa-angle-left"></i> Previous', true) ,'</span>';
	echo '<span class="anipager-seeall">', usagilabs_seeall() ,'</span>';
	echo '<span class="anipager-next">', next_post_link('%link', get_option('config_next')?:'Next <i class="fa fa-angle-right"></i>', true) ,'</span>';
}

/* == DOWNLOAD BOX == */
function usagilabs_download(){
			if(get_post_meta(get_the_ID(), 'dl_check_720p', true) != 'on'){
				echo '<div class="entry-download-item">';
					echo '<div class="entry-download-title">',get_post_meta(get_the_ID(), 'dl_name_720p', true)?:'720P','</div>';
					echo '<div class="entry-download-link">';
					// LINK 1
					if(!empty(get_post_meta(get_the_ID(), 'dl_link1_720p', true))){
					echo '<a href="',get_post_meta(get_the_ID(), 'dl_link1_720p', true).'" class="btn bluth green btn- " target="_blank"><i class="fas fa-magnet"></i>&nbsp;',get_option('config_720p_name1')?:'Solidfiles','</a> | ';
					}else{echo '<a class="btn blus green btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_720p_name1')?:'Solidfiles','</a> | ';}
					// LINK 2
					if(!empty(get_post_meta(get_the_ID(), 'dl_link2_720p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link2_720p', true).'" class="btn bluth yellow btn- " target="_blank"><i class="fas fa-file-archive"></i>&nbsp;',get_option('config_720p_name2')?:'Savefile','</a> | ';
					}else{echo '<a class="btn blus yellow btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_720p_name2')?:'Savefile','</a> | ';}
					// LINK 3
					if(!empty(get_post_meta(get_the_ID(), 'dl_link3_720p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link3_720p', true).'" class="btn bluth yellow btn- " target="_blank"><i class="fas fa-file-archive"></i>&nbsp;',get_option('config_720p_name3')?:'Zippyshare','</a> | ';
					}else{echo '<a class="btn blus yellow btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_720p_name3')?:'Zippyshare','</a> | ';}
					// LINK 4
					if(!empty(get_post_meta(get_the_ID(), 'dl_link4_720p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link4_720p', true).'" class="btn bluth blue btn- " target="_blank"><i class="fab fa-google-drive"></i>&nbsp;',get_option('config_720p_name4')?:'Mirrorcreator','</a>';
					}else{echo '<a class="btn blus blue btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_720p_name4')?:'Mirrorcreator','</a>';}
					echo '</div>';
				echo '</div>';
				}				
			if(get_post_meta(get_the_ID(), 'dl_check_480p', true) != 'on'){
				echo '<div class="entry-download-item">';
					echo '<div class="entry-download-title">',get_post_meta(get_the_ID(), 'dl_name_480p', true)?:'480P','</div>';
					echo '<div class="entry-download-link">';					
					// LINK 1
					if(!empty(get_post_meta(get_the_ID(), 'dl_link1_480p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link1_480p', true).'" class="btn bluth green btn- " target="_blank"><i class="fas fa-magnet"></i>&nbsp;',get_option('config_480p_name1')?:'Solidfiles','</a> | ';
					}else{echo '<a class="btn blus green btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_480p_name1')?:'Solidfiles','</a> | ';}
					// LINK 2
					if(!empty(get_post_meta(get_the_ID(), 'dl_link2_480p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link2_480p', true).'" class="btn bluth yellow btn- " target="_blank"><i class="fas fa-file-archive"></i>&nbsp;',get_option('config_480p_name2')?:'Savefile','</a> | ';
					}else{echo '<a class="btn blus yellow btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_480p_name2')?:'Savefile','</a> | ';}
					// LINK 3
					if(!empty(get_post_meta(get_the_ID(), 'dl_link3_480p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link3_480p', true).'" class="btn bluth yellow btn- " target="_blank"><i class="fas fa-file-archive"></i>&nbsp;',get_option('config_480p_name3')?:'Zippyshare','</a> | ';
					}else{echo '<a class="btn blus yellow btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_480p_name3')?:'Zippyshare','</a> | ';}
					// LINK 4
					if(!empty(get_post_meta(get_the_ID(), 'dl_link4_480p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link4_480p', true).'" class="btn bluth blue btn- " target="_blank"><i class="fab fa-google-drive"></i>&nbsp;',get_option('config_480p_name4')?:'Mirrorcreator','</a>';
					}else{echo '<a class="btn blus blue btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_480p_name4')?:'Mirrorcreator','</a>';}					
					echo '</div>';
				echo '</div>';
				}
			if(get_post_meta(get_the_ID(), 'dl_check_360p', true) != 'on'){
				echo '<div class="entry-download-item">';
					echo '<div class="entry-download-title">',get_post_meta(get_the_ID(), 'dl_name_360p', true)?:'360P','</div>';
					echo '<div class="entry-download-link">';					
					// LINK 1
					if(!empty(get_post_meta(get_the_ID(), 'dl_link1_360p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link1_360p', true).'" class="btn bluth green btn- " target="_blank"><i class="fas fa-magnet"></i>&nbsp;',get_option('config_360p_name1')?:'Solidfiles','</a> | ';
					}else{echo '<a class="btn blus green btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_360p_name1')?:'Solidfiles','</a> | ';}
					// LINK 2
					if(!empty(get_post_meta(get_the_ID(), 'dl_link2_360p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link2_360p', true).'" class="btn bluth yellow btn- " target="_blank"><i class="fas fa-file-archive"></i>&nbsp;',get_option('config_360p_name2')?:'Savefile','</a> | ';
					}else{echo '<a class="btn blus yellow btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_360p_name2')?:'Savefile','</a> | ';}
					// LINK 3
					if(!empty(get_post_meta(get_the_ID(), 'dl_link3_360p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link3_360p', true).'" class="btn bluth yellow btn- " target="_blank"><i class="fas fa-file-archive"></i>&nbsp;',get_option('config_360p_name3')?:'Zippyshare','</a> | ';
					}else{echo '<a class="btn blus yellow btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_360p_name3')?:'Zippyshare','</a> | ';}
					// LINK 4
					if(!empty(get_post_meta(get_the_ID(), 'dl_link4_360p', true))){
					echo '<a href="'.get_post_meta(get_the_ID(), 'dl_link4_360p', true).'" class="btn bluth blue btn- " target="_blank"><i class="fab fa-google-drive"></i>&nbsp;',get_option('config_360p_name4')?:'Mirrorcreator','</a>';
					}else{echo '<a class="btn blus blue btn- "><i class="fas fa-magnet"></i>&nbsp;',get_option('config_360p_name4')?:'Mirrorcreator','</a>';}					
					echo '</div>';
				echo '</div>';
				}
}
?>
<?php function usagilabs_info(){ ?>
		<div class="anime-info-parent col-md-7 col-sm-7 col-xs-12">
			<?php // METHOD 1
			foreach((get_the_category()) as $anim_slug){
			$animu = new WP_Query(array('post_type' => 'drama','s' => $anim_slug->cat_name,'showposts' => '1'));
			while($animu->have_posts()) : $animu->the_post(); ?>
			<div class="animinf-parent-post">
			<div class="animinf-parent-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php
			if(has_post_thumbnail()){
				the_post_thumbnail(array(130, 180, 'class' => 'theme-thumbnail', 'alt' => get_the_title() ));
			} else {
				echo '<img height="130" width="180" src="',get_template_directory_uri(),'/lib/img/no_anim.png" class="thumbnail no-img" alt="Thumbnail no image">';
			}
			?>
			</a>
			</div>
			<div class="animinf-parent-box">
			<h2 class="animinf-parent-title"><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></h2>
			<footer class="animinf-parent-footer">
			<p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
			<p><?php echo get_the_term_list($post->ID, 'type', '<b>Tipe </b>: '); ?></p>
			<p><?php echo get_the_term_list($post->ID, 'episode', '<b>Episode </b>: '); ?></p>
			<p><?php echo get_the_term_list($post->ID, 'status', '<b>Status </b>: '); ?></p>
			</footer>
			</div>
			<div class="clear"></div></div>
			<?php endwhile; wp_reset_postdata(); }?>
			<div class="clear"></div>
		</div>
		<div class="anime-info-child col-md-5 col-sm-5 col-xs-12">
			<?php  // METHOD 2
			$anim =  get_the_category(); $anim_slug = $anim[0]->slug;
			$animu = new WP_Query(array('post_type' => 'drama','post__not_in' => array($anim_slug),'showposts' => '3','orderby' => 'rand'));
			while($animu->have_posts()) : $animu->the_post(); ?>
			<div class="animinf-child-posts">
			<div class="animinf-child-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php 
			if(has_post_thumbnail()){
				the_post_thumbnail(array(50, 'class' => 'theme-thumbnail', 'alt' => get_the_title() ));
			} else {
				echo '<img height="50" width="50" src="',get_template_directory_uri(),'/lib/img/no_size.png" class="thumbnail no-img" alt="Thumbnail no image">';
			}
			?>
			</a>
			</div>
			<h2 class="animinf-child-title"><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></h2>
			<div class="animinf-child-genre"><?php echo wp_trim_words(get_the_term_list($post->ID, 'genre','',', ')?:'Undefined',5); ?></div>
			<div class="clear"></div></div>
			<?php endwhile; wp_reset_postdata();?>			
		</div>
		
<?php } ?>