<div class='clear'></div>	</div><!-- #content -->			<div class='clear'></div>	</div><!-- #page -->		<footer id="footer" class="site-footer" role="contentinfo"><div class="container">	<div id='footer-widget'>	<div id='footer-0' class='footer-widget-item col-md-4 col-sm-4 col-xs-12'>	  <div class="about-blog">	  	<h2>Kamisaha.net</h2>		<p><?php echo get_option('config_aboutweb'); ?></p>	  </div>	</div>	<div id='footer-1' class='footer-widget-item col-md-2 col-sm-2 col-xs-6'>	<?php if(is_active_sidebar('footer-slot1')) : ?>	<?php dynamic_sidebar( 'footer-slot1' ); ?>	<?php elseif ( is_user_logged_in() ): ?>	<div class="error">		<div class="fa fa-warning"></div>		<strong>No Widgets Assigned.</strong>		<a href="<?php echo admin_url(); ?>widgets.php" class="btn btn-round">Go to Widgets</a>	</div>	<?php endif; ?>	</div>	  	<div id='footer-2' class='footer-widget-item col-md-2 col-sm-2 col-xs-6'>	<?php if(is_active_sidebar('footer-slot2')) : ?>	<?php dynamic_sidebar( 'footer-slot2' ); ?>	<?php elseif ( is_user_logged_in() ): ?>	<div class="error">		<div class="fa fa-warning"></div>		<strong>No Widgets Assigned.</strong>		<a href="<?php echo admin_url(); ?>widgets.php" class="btn btn-round">Go to Widgets</a>	</div>	<?php endif; ?>	</div>	<div id='footer-3' class='footer-widget-item col-md-4 col-sm-4 col-xs-12'>	<?php if(is_active_sidebar('footer-slot3')) : ?>	<?php dynamic_sidebar( 'footer-slot3' ); ?>	<?php elseif ( is_user_logged_in() ): ?>	<div class="error">		<div class="fa fa-warning"></div>		<strong>No Widgets Assigned.</strong>		<a href="<?php echo admin_url(); ?>widgets.php" class="btn btn-round">Go to Widgets</a>	</div>	<?php endif; ?>	</div>			<div class='clear'></div>	</div>	<div class='clear'></div>		</div>	<div id='footer-copyright'><div class="container">		<div class="site-copyright fl col-xs-fn"><span class="copyright">Copyright &copy; <?php echo date("Y") ?> <?php bloginfo('name');?></span></div>		<div class="site-design fr col-xs-fn"><span class="design">Design by <a href="http://usagilabs.blogspot.com/" target="_blank">Usagilabs</a> <a href="http://wordpress.org"><?php printf( __( 'Proudly powered by %s'), 'WordPress' ); ?></a></span></div>		<div class='clear'></div>	</div></div>	</footer><!-- #footer --><?php wp_footer(); ?><script type='text/javascript'>//<![CDATA[var _0x6f30=["\x3C\x62\x20\x63\x6C\x61\x73\x73\x3D\x27\x5F\x65\x70\x73\x27\x3E\x24\x31\x3C\x2F\x62\x3E","\x72\x65\x70\x6C\x61\x63\x65","\x68\x74\x6D\x6C","\x2E\x65\x70\x73","\x5D","","\x5B"];$(function(){var _0xb351x1=/(episode [0-9]+|end)/im;$(_0x6f30[3])[_0x6f30[2]](function(_0xb351x2,_0xb351x3){return _0xb351x3[_0x6f30[1]](_0xb351x1,_0x6f30[0])});var _0xb351x2=/(subtitle indonesia)/i,_0xb351x3=/\(([^)]+)\)/;$(_0x6f30[3])[_0x6f30[2]](function(_0xb351x1,_0xb351x4){return _0xb351x4[_0x6f30[1]](_0xb351x2,_0x6f30[5])[_0x6f30[1]](_0xb351x3,_0x6f30[5])[_0x6f30[1]](_0x6f30[6],_0x6f30[5])[_0x6f30[1]](_0x6f30[4],_0x6f30[5])})})//]]></script><script type="text/javascript">    jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {                event.preventDefault();                jQuery(this).ekkoLightbox();            });</script></body></html>