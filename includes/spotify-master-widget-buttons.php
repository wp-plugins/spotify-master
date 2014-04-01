<?php
//Hook Widget
add_action( 'widgets_init', 'spotify_master_widget_buttons' );
//Register Widget
function spotify_master_widget_buttons() {
register_widget( 'spotify_master_widget_buttons' );
}

class spotify_master_widget_buttons extends WP_Widget {
	function spotify_master_widget_buttons() {
	$widget_ops = array( 'classname' => 'Spotify Master Buttons', 'description' => __('Spotify Master Buttons Widget allows you to display the Spotify Profile Connect Button. ', 'Spotify Master Buttons') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'spotify_master_widget_buttons' );
	$this->WP_Widget( 'spotify_master_widget_buttons', __('Spotify Master Buttons', 'spotify_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$spotify_title = isset( $instance['spotify_title'] ) ? $instance['spotify_title'] :false;
		$spotify_title_new = isset( $instance['spotify_title_new'] ) ? $instance['spotify_title_new'] :false;
		$spotifyspacer ="'";
		$url_loc = plugins_url();
		$show_spotifybutton = isset( $instance['show_spotifybutton'] ) ? $instance['show_spotifybutton'] :false;
		$spotifybutton_page = $instance['spotifybutton_page'];
		echo $before_widget;
		
	// Display the widget title
		if ( $spotify_title ){
			if (empty ($spotify_title_new)){
			$spotify_title_new = "Spotify Master";
			}
		echo $before_title . $spotify_title_new . $after_title;
		}
		else{
		}
	//Display Spotify Profile Button
		if ( $show_spotifybutton ){
		echo '<a href="'.$spotifybutton_page.'" target="_blank"><img src="'.$url_loc.'/spotify-master/images/techgasp-spotify-button.png"></a>';
		}
		else{
		}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['spotify_title'] = strip_tags( $new_instance['spotify_title'] );
		$instance['spotify_title_new'] = $new_instance['spotify_title_new'];
		$instance['show_spotifybutton'] = $new_instance['show_spotifybutton'];
		$instance['spotifybutton_page'] = $new_instance['spotifybutton_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'spotify_title_new' => __('Spotify Master', 'spotify_master'), 'spotify_title' => true, 'spotify_title_new' => false, 'show_spotifybutton' => false, 'spotifybutton_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<p><b>Check the buttons to be displayed:</b></p>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['spotify_title'], true ); ?> id="<?php echo $this->get_field_id( 'spotify_title' ); ?>" name="<?php echo $this->get_field_name( 'spotify_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'spotify_title' ); ?>"><b><?php _e('Display Widget Title', 'spotify_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'spotify_title_new' ); ?>"><?php _e('Change Title:', 'spotify_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'spotify_title_new' ); ?>" name="<?php echo $this->get_field_name( 'spotify_title_new' ); ?>" value="<?php echo $instance['spotify_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_spotifybutton'], true ); ?> id="<?php echo $this->get_field_id( 'show_spotifybutton' ); ?>" name="<?php echo $this->get_field_name( 'show_spotifybutton' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_spotifybutton' ); ?>"><b><?php _e('Spotify Profile Button', 'spotify_master'); ?></b></label><br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'spotifybutton_page' ); ?>"><?php _e('insert your Spotify Profile Link:', 'spotify_master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'spotifybutton_page' ); ?>" name="<?php echo $this->get_field_name( 'spotifybutton_page' ); ?>" value="<?php echo $instance['spotifybutton_page']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b><?php echo get_option('spotify_master_name'); ?> Website</b>
		</p>
		<p><a class="button-secondary" href="http://wordpress.techgasp.com/spotify-master/" target="_blank" title="<?php echo get_option('spotify_master_name'); ?> Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/spotify-master-documentation/" target="_blank" title="<?php echo get_option('spotify_master_name'); ?> Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/spotify-master/" target="_blank" title="Visit Website">Get Add-ons</a></p>
	<?php
	}
 }
?>