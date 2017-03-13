<?php
/*
Plugin Name: Pimpampum Cookies
Description:  Per afegir l'avís de cookies
Version: 1.0
Author: Pimpampum
Author URI: http://www.pimpampum.net
License: GPL2
*/


function pimpampum_cookies_scripts() {

	wp_enqueue_style( 'cookies',plugins_url( '/cookies/cookietool.css', __FILE__ ), array() );
	wp_enqueue_script( 'cookies', plugins_url( '/cookies/cookietool.min.js', __FILE__ )  , array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'pimpampum_cookies_scripts',20);

function cookies_footer() {
  //si cal canviar la url amb la info
    ?>
<script>
  CookieTool.Config.set('link', '<?php print bloginfo("url")?>/cookies');
	CookieTool.Config.set('message','En aquest lloc es fan servir galetes per oferir una experiència més personalitzada. <a href="{{link}}" target="_blank"> Més informació </a>. <br> Ens consent utilitzar galetes? ');
	CookieTool.API.ask();
</script>

<?php
}
add_action( 'wp_footer', 'cookies_footer',20 );
