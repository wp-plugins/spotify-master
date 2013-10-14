<?php
//Hook Widget
add_action( 'widgets_init', 'spotify_master_widget' );
//Register Widget
function spotify_master_widget() {
register_widget( 'spotify_master_widget' );
}

class spotify_master_widget extends WP_Widget {
	function spotify_master_widget() {
	$widget_ops = array( 'classname' => 'Spotify Master', 'description' => __('Spotify Master allows you to display in your wordpress website musics, playlists and albums of the cool and "booming" music network Spotify. ', 'Spotify Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'spotify_master_widget' );
	$this->WP_Widget( 'spotify_master_widget', __('Spotify Master', 'spotify_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "Spotify Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$spotifyspacer ="'";
		$show_spotifybutton = isset( $instance['show_spotifybutton'] ) ? $instance['show_spotifybutton'] :false;
		$spotifybutton_page = $instance['spotifybutton_page'];
		echo $before_widget;
		
	// Display the widget title
		if ( $title )
		echo $before_title . $name . $after_title;
	//Display Spotify Player
		
	//Display Spotify Profile Button
		if ( $show_spotifybutton )
		echo '<br/>' .
		'<a href="'.$spotifybutton_page.'" target="_blank"><img src="/wp-content/plugins/spotify-master/images/techgasp-spotify-button.png"></a>';
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		//Save download link
		
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['down_link_spotify'] = $new_instance['down_link_spotify'];
		update_option('down_link_spotify', $new_instance['down_link_spotify']);
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_spotifybutton'] = $new_instance['show_spotifybutton'];
		$instance['spotifybutton_page'] = $new_instance['spotifybutton_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('Spotify Master', 'spotify_master'), 'title' => true, 'down_link_spotify' => false, 'show_spotifybutton' => false, 'spotifybutton_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<p><b>Check the buttons to be displayed:</b></p>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'spotify_master'); ?></b></label><br>
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
	<b>Show Spotify Player</b>
	</p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Spotify Player Width:</b></p>
	<div class="description">Only available in advanced version.</div>
	<p><b>Spotify Player Height:</b></p>
	<br>
	<div class="description">Only available in advanced version.</div>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Spotify Master Website</b>
		</p>
		<p><a class="button-secondary" href="http://wordpress.techgasp.com/spotify-master/" target="_blank" title="Spotify Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/spotify-master-documentation/" target="_blank" title="Spotify Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/spotify-master/" target="_blank" title="Spotify Master Advanced">Advanced Version</a></p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>Advanced Version Updater:</b>
		</p>
		<div class="description">The advanced version updater allows to automatically update your advanced plugin. Only available in advanced version.</div>
	<?php
	}
 }
?>