<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
<?php if (is_front_page() and is_home() ): ?><script type="text/javascript">
$(function() {
    $(".hotupdates").lightSlider({
        item: 6,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 0,		
        speed: 400, //ms'
        auto: true,
        loop: true,
        keyPress: true,
        controls: true,
        prevHtml: '<i class="fa fa-angle-left"></i>',
        nextHtml: '<i class="fa fa-angle-right"></i>',
        rtl:false,
        pager: false,		
        responsive : [
            {
                breakpoint:992,
                settings: {
                    item:4,
                  }
            },
            {
                breakpoint:767,
                settings: {
                    item:4,
                  }
            },
            {
                breakpoint:640,
                settings: {
                    item:3,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                  }
            },
            {
                breakpoint:320,
                settings: {
                    item:1,
                  }
            }
        ]
    });
});
</script><?php endif; ?>
<?php if (is_singular()): ?><script type="text/javascript">$(function() {$(".mirror-content").allofthelights();});</script><?php endif; ?>
</head>
<body <?php body_class(); ?> id="<?php echo get_option('config_style_light')?:"_dark" ?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="header-wrapper" class="container">
	<header id="header" class="site-header" role="banner">
		<div class="site-branding col-xs-full">
			<?php if ( get_theme_mod( 'usagsilabs_logo' ) ) : ?>
			<?php if(is_home() || is_front_page()) {?>
				<h1 id="logo" class="site-logo">
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
						<img src='<?php echo esc_url( get_theme_mod( 'usagsilabs_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</h1>
			<?php } else { ?>
				<p id="logo" class="site-logo">
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
						<img src='<?php echo esc_url( get_theme_mod( 'usagsilabs_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a>
				</p>
			<?php } ?>
			<?php else : ?>
			<?php if(is_home() || is_front_page()) {?>
				<h1 id="blog-title" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?></a></h1>
			<?php } else { ?>
				<p id="blog-title" class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?></a></p>
			<?php } ?>
				<p id="blog-description" class='site-description'><?php echo get_bloginfo('description');?></p>
			<?php endif; ?>
		</div>		
		<div class='kotak-baris-header kotak-baris col-xs-full' class='cl'>
		IKLAN 728 x 90
		</div>	
	<div class='clear'></div>
	</header><!-- #header -->
	<nav id="site-navigation" class="site-navigation cl" role="navigation">
		<input class='dn' id='mb_put' type='checkbox'/>
		<label class='dn' id='mb_lab'><i class='fa fa-bars'></i> Navigation</label>
		<?php wp_nav_menu( array('theme_location' => 'primary', 'fallback_cb' => 'fallback_menu' ) ); ?>
		<?php usagilabs_search() ?>
		<div class="clear"></div>
	</nav><!-- site-navigation -->
	<div id="recomended">
		<?php usagilabs_recomended() ?>
	</div>
	</div>
	<div id='kotak-baris' class='cl'><div class='container'>
		<div class='kotak-baris baris1 col-md-6 col-sm-12 col-xs-12'>
		IKLAN 728 x 90
		</div>
		<div class='kotak-baris baris2 col-md-6 col-sm-12 col-xs-12'>
		IKLAN 728 x 90
		</div>
	<div class='clear'></div></div></div>	
	<div id="page" class="hfeed site container">

<div id="content" class="site-content">
	<?php if (is_front_page() and is_home() ): usagilabs_hotupdate(); endif;?>
	<main id="main" class="site-main col-md-8 col-sm-8 col-xs-12 col-mb-12" role="main">
