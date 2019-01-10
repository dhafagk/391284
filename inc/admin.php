<?php
/*
code by cukstudio
modifided by usagilabs
*/
add_action('admin_menu', 'ctheme_menu');
function ctheme_menu() {
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	add_menu_page('Configuration', 'Usagilabs Config', 'administrator','configuration', 'func_config','dashicons-dashboard',1 );
	add_action( 'admin_init', 'register_ctheme_settings' );
}
function register_ctheme_settings() {
	// MAIN
		// MISC
		register_setting( 'usagilabs-config', 'config_infoweb' );
		register_setting( 'usagilabs-config', 'config_aboutweb' );
		register_setting( 'usagilabs-config', 'config_fanspage' );
		// PAGINASI
		register_setting( 'usagilabs-config', 'config_prev' );
		register_setting( 'usagilabs-config', 'config_seeall' );
		register_setting( 'usagilabs-config', 'config_next' );
		register_setting( 'usagilabs-config', 'config_style' );
		register_setting( 'usagilabs-config', 'config_style_dark' );
		register_setting( 'usagilabs-config', 'config_style_light' );
	// DOWNLOAD
		// 720P
		register_setting( 'usagilabs-config', 'config_720p_name1' );
		register_setting( 'usagilabs-config', 'config_720p_name2' );
		register_setting( 'usagilabs-config', 'config_720p_name3' );
		register_setting( 'usagilabs-config', 'config_720p_name4' );
		// 480P
		register_setting( 'usagilabs-config', 'config_480p_name1' );
		register_setting( 'usagilabs-config', 'config_480p_name2' );
		register_setting( 'usagilabs-config', 'config_480p_name3' );
		register_setting( 'usagilabs-config', 'config_480p_name4' );
		// 360P
		register_setting( 'usagilabs-config', 'config_360p_name1' );
		register_setting( 'usagilabs-config', 'config_360p_name2' );
		register_setting( 'usagilabs-config', 'config_360p_name3' );
		register_setting( 'usagilabs-config', 'config_360p_name4' );
	// WIDGET
		// Recommended Anime
		register_setting( 'usagilabs-config', 'recom_title' );
		register_setting( 'usagilabs-config', 'recom_posttype' );
		register_setting( 'usagilabs-config', 'recom_num_post' );
		register_setting( 'usagilabs-config', 'recom_error_notice' );
		// Hot Update
		register_setting( 'usagilabs-config', 'hot_categ' );
		register_setting( 'usagilabs-config', 'hot_posttype' );
		register_setting( 'usagilabs-config', 'hot_num_post' );
		register_setting( 'usagilabs-config', 'hot_error_notice' );
}
function func_config() {

?>
<div class="wrap">
<form method="post" action="options.php">
<div class='wrap-swap'><h2><img src="<?php echo get_template_directory_uri(); ?>/lib/img/usagilabs.png">Configuration</h2><?php submit_button(); ?><div class="clear"></div></div>
    <?php settings_fields( 'usagilabs-config' ); ?>
    <?php do_settings_sections( 'usagilabs-config' ); ?>
	<div class="main-config">
	<h3>Main v1.3</h3>
    <table class="form-table">
    	<tr valign="top">
			<th scope="row">Info Web</th>
			<td rowspan="1"><textarea name="config_infoweb" rows="3" cols="78"><?php echo get_option('config_infoweb'); ?></textarea></td>
		</tr>
		<tr valign="top">
			<th scope="row">About Web</th>
			<td><textarea name="config_aboutweb" rows="3" cols="78"><?php echo get_option('config_aboutweb'); ?></textarea></td>
		</tr>
		<tr valign="top">
			<th scope="row">Username Fanspage</th>
			<td><input type="text" name="config_fanspage" size="30" placeholder="ex. usagilabs" value="<?php echo get_option('config_fanspage'); ?>"> <i>Note : this for button report in post <a href="https://image.ibb.co/cARco5/report_button.png">here the example</a></i></td>
		</tr>
    	<tr valign="top">
			<th scope="row">Pagination</th>
			<td class="_multi">
			<input type="text" name="config_prev" size="20" placeholder="Previous" value="<?php echo get_option('config_prev'); ?>">
			<input type="text" name="config_seeall" size="20" placeholder="See All Episode" value="<?php echo get_option('config_seeall'); ?>">
			<input type="text" name="config_next" size="20" placeholder="Next" value="<?php echo get_option('config_next'); ?>">
			</td>
		</tr>
    	<tr valign="top">
			<th scope="row">Light Style</th>
			<td><input type="checkbox" name="config_style_light" value="_light" <?php if(get_option('config_style_light')==true) echo 'checked="checked"'; ?>></td>
		</tr>
    </table>
	</div>
	<div class="main-config">
	<h3>Download Box</h3>
    <table class="form-table">
    	<tr valign="top">
			<th scope="row">720P</th>
			<td class="_multi">
			<input type="text" name="config_720p_name1" size="15" placeholder="Solidfiles" value="<?php echo get_option('config_720p_name1'); ?>">
			<input type="text" name="config_720p_name2" size="15" placeholder="Savefile" value="<?php echo get_option('config_720p_name2'); ?>">
			<input type="text" name="config_720p_name3" size="15" placeholder="Zippyshare" value="<?php echo get_option('config_720p_name3'); ?>">
			<input type="text" name="config_720p_name4" size="15" placeholder="Mirrorcreator" value="<?php echo get_option('config_720p_name4'); ?>">
			</td>
		</tr>
    </table>
    <table class="form-table">
    	<tr valign="top">
			<th scope="row">480P</th>
			<td class="_multi">
			<input type="text" name="config_480p_name1" size="15" placeholder="Solidfiles" value="<?php echo get_option('config_480p_name1'); ?>">
			<input type="text" name="config_480p_name2" size="15" placeholder="Savefile" value="<?php echo get_option('config_480p_name2'); ?>">
			<input type="text" name="config_480p_name3" size="15" placeholder="Zippyshare" value="<?php echo get_option('config_480p_name3'); ?>">
			<input type="text" name="config_480p_name4" size="15" placeholder="Mirrorcreator" value="<?php echo get_option('config_480p_name4'); ?>">
			</td>
		</tr>
    </table>
    <table class="form-table">
    	<tr valign="top">
			<th scope="row">360P</th>
			<td class="_multi">
			<input type="text" name="config_360p_name1" size="15" placeholder="Solidfiles" value="<?php echo get_option('config_360p_name1'); ?>">
			<input type="text" name="config_360p_name2" size="15" placeholder="Savefile" value="<?php echo get_option('config_360p_name2'); ?>">
			<input type="text" name="config_360p_name3" size="15" placeholder="Zippyshare" value="<?php echo get_option('config_360p_name3'); ?>">
			<input type="text" name="config_360p_name4" size="15" placeholder="Mirrorcreator" value="<?php echo get_option('config_360p_name4'); ?>">
			</td>
		</tr>
    </table>
	</div>
	<div class="main-config">
	<h3>Widget</h3>
    <table class="form-table">
    	<tr valign="top">
			<th scope="row">Recomended Drama</th>
			<td class="_multi">
			<input type="text" name="recom_title" size="30" placeholder="Recommended (ex. Recommended)" value="<?php echo get_option('recom_title'); ?>">
			<input type="text" name="recom_num_posts" size="30" placeholder="Number of Posts (ex. 6)" value="<?php echo get_option('recom_num_posts'); ?>">
			<input type="text" name="recom_posttype" size="30" placeholder="Post Type (ex. &quot;post&quot; or &quot;drama&quot;) " value="<?php echo get_option('recom_posttype'); ?>">
			<input type="text" name="recom_error_notice" size="30" placeholder="Error notice (ex. No drama recommendation)" value="<?php echo get_option('recom_error_notice'); ?>">
			</td>
		</tr>
    	<tr valign="top">
			<th scope="row">Hot Update</th>
			<td class="_multi">
			<input type="text" name="hot_num_post" size="30" placeholder="Number of Posts (ex. 6)" value="<?php echo get_option('hot_num_post'); ?>">
			<input type="text" name="hot_posttype" size="30" placeholder="Post Type (ex. post or drama;) " value="<?php echo get_option('hot_posttype'); ?>">
			<input type="text" name="hot_categ" size="30" placeholder="Category Name (ex. Uncategorized)" value="<?php echo get_option('hot_categ'); ?>">
			<input type="text" name="hot_error_notice" size="30" placeholder="Error notice (ex. No drama recommendation)" value="<?php echo get_option('hot_error_notice'); ?>">
			</td>
		</tr>
    </table>
	</div>
    <?php submit_button(); ?>
</form>
<style type='text/css'>.main-config{background:#FFF;padding:0 25px 5px;margin-bottom:30px;border:1px solid #ddd}.main-config>h3{background:#7DC168;padding:15px;margin:-10px -25px 0;color:#FFF;text-transform:uppercase}.wrap-swap{margin:20px auto 30px}.wrap-swap>h2{float:left;margin:0;text-transform:uppercase;font-size:20px;padding-top:5px}.wrap-swap p.submit{margin:0;display:inline-block;margin-left:15px;padding:0}._multi>input{margin-right:15px}.wrap-swap>h2 img{max-width:22px;float:left;margin-right:10px}</style>
</div>
<?php } ?>