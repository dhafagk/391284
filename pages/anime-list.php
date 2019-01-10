<?php

/*

Template Name: Anime List

*/

get_header(); ?>

	<section class="page-template">

		<article id="post-<?php the_ID(); ?>" class="post-inner anime-list">

			<?php while(have_posts()) : the_post(); the_title( '<h1 class="entry-title">', '</h1>' ); endwhile; ?>

				<div class="anime-list-nav"> <a href="##">#</a> <a href="#A">A</a> <a href="#B">B</a> <a href="#C">C</a> <a href="#D">D</a> <a href="#E">E</a> <a href="#F">F</a> <a href="#G">G</a> <a href="#H">H</a> <a href="#I">I</a> <a href="#J">J</a> <a href="#K">K</a> <a href="#L">L</a> <a href="#M">M</a> <a href="#N">N</a> <a href="#O">O</a> <a href="#P">P</a> <a href="#Q">Q</a> <a href="#R">R</a> <a href="#S">S</a> <a href="#T">T</a> <a href="#U">U</a> <a href="#V">V</a> <a href="#W">W</a> <a href="#X">X</a> <a href="#Y">Y</a> <a href="#Z">Z</a></div>

				<div class="anime-list-container">

					<?php

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(

						'posts_per_page' => 1000,

						'post_type' => 'drama',

						'orderby' => 'title',

						'order' => 'ASC',

						'paged' => $paged

					);

					query_posts($args);

					if(have_posts()){

						$in_this_row = 0;

						while(have_posts()){

							the_post();

							$first_letter = strtoupper(substr(apply_filters('the_title',$post->post_title),0,1));

							if($first_letter != $curr_letter){

								if(++$post_count > 1){

									end_prev_letter();

								}

								start_new_letter($first_letter);

								$curr_letter = $first_letter;

							}

							if(++$in_this_row > $posts_per_row){

								end_prev_row();

								start_new_row();

								++$in_this_row;

							}

					?>

					<li><?php if (has_term('japan', 'country')) { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/lib/img/jp.png" alt="Jepang" title="Jepang" style="float:none;opacity:.75;width:3.5%;">
		<?php } elseif (has_term('korea', 'country')) { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/lib/img/kr.png" alt="Korea" title="Korea" style="float:none;opacity:.75;width:3.5%;">
		<?php } else{ echo '<div></div>';} ?><a class="series" href="<?php the_permalink() ?>" rel="<?php the_ID(); ?>"><?php the_title(); ?></a></li>

					<?php 

					}

					end_prev_letter();

					?>

					<?php } else {

					echo "<h2>Sorry, no posts were found!</h2>";

					}

					?>

				</div>

		</article><!-- #post-## -->	

	</section>

<?php

get_sidebar();

get_footer();

function end_prev_letter(){

	end_prev_row();

	echo '</div>';

	echo "</div>\n";

}

function start_new_letter($letter){

	echo "<div class='list-group'>\n";

	echo "\t<div class='list-alphabet'><a name='$letter'>$letter</a></div>\n";

	echo '<div class="icon list-sub">';

	start_new_row($letter);

}

function start_new_row(){

	global $in_this_row;

	$in_this_row = 0;

	echo "\t\n";

}

function end_prev_row(){

	echo "\t\n";

}

?>