<?php
if( is_multisite() ) {
	function menu_multi_spotify_admin_addons(){
	// Create menu
	add_submenu_page( 'spotify-master', 'Add-ons', 'Add-ons', 'manage_options', 'spotify-master-admin-addons', 'spotify_master_admin_addons' );
	}
}
else {
	// Create menu
	function menu_single_spotify_admin_addons(){
		if ( is_admin() )
		add_submenu_page( 'spotify-master', 'Add-ons', 'Add-ons', 'manage_options', 'spotify-master-admin-addons', 'spotify_master_admin_addons' );
	}
}

function spotify_master_admin_addons(){
?>
<div class="wrap">
<div style="width:40px; vertical-align:middle; float:left;"><img src="<?php echo plugins_url('../images/techgasp-minilogo.png', __FILE__); ?>" alt="' . esc_attr__( 'TechGasp Plugins') . '" /><br /></div>
<h2><b>&nbsp;Spotify Master Add-ons</b></h2>
<?php
if(!class_exists('spotify_master_admin_addons_table')){
	require_once( dirname( __FILE__ ) . '/spotify-master-admin-addons-table.php');
}
//Prepare Table of elements
$wp_list_table = new spotify_master_admin_addons_table();
//Table of elements
$wp_list_table->display();

?>
</br>

<h2>IMPORTANT: Makes no use of Javascript or Ajax to keep your website fast and conflicts free</h2>

<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>

<br>

<p>
<a class="button-secondary" href="http://wordpress.techgasp.com" target="_blank" title="Visit Website">More TechGasp Plugins</a>
<a class="button-secondary" href="http://wordpress.techgasp.com/support/" target="_blank" title="Facebook Page">TechGasp Support</a>
<a class="button-primary" href="http://wordpress.techgasp.com/spotify-master/" target="_blank" title="Visit Website">Spotify Master Info</a>
<a class="button-primary" href="http://wordpress.techgasp.com/spotify-master-documentation/" target="_blank" title="Visit Website">Spotify Master Documentation</a>
<a class="button-primary" href="http://wordpress.techgasp.com/spotify-master/" target="_blank" title="Visit Website">Get Add-ons!</a>
</p>
<?php
}
if( is_multisite() ) {
add_action( 'network_admin_menu', 'menu_multi_spotify_admin_addons' );
}
else {
add_action( 'admin_menu', 'menu_single_spotify_admin_addons' );
}