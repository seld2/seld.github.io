<?php
class login_form extends WP_Widget{
	
	function login_form() {//settings for widget
		$widget_ops = array( 'description' => __('Use this widget to add login form',CURRENT_THEME) );
		parent::WP_Widget( 'login_form', __('Log in Form',CURRENT_THEME), $widget_ops );
	}
	
	function widget($args, $instance)
	{
	//	print_r($args);
		 if(!is_user_logged_in()){
			$args = array(
			'echo' => true,
			'redirect' => site_url(),
			'form_id' => 'loginform',
			'label_username' => __( 'Username',CURRENT_THEME ),
			'label_password' => __( 'Password',CURRENT_THEME ),
			'label_remember' => __( 'Remember Me!',CURRENT_THEME ),		
			'label_log_in' => __( $instance['loginbutton'] ),
			'id_username' => 'user_login',
			'id_password' => 'user_pass',
			'id_remember' => 'rememberme',
			'id_submit' => 'wp-submit',
			'remember' => true,
			'value_username' => NULL,
			'value_remember' => false );
			wp_login_form($args);
		?>
			<a href="<?php echo wp_lostpassword_url();?>" title="Lost Password"><?php echo __('Forgot Your Password?',CURRENT_THEME); ?></a>
		 <?php }
		else { ?>
			<p>
			<a href="<?php echo wp_logout_url( home_url() ); ?>"><input class="button" type="button" name="login_button" value="<?php echo __($instance['logoutbutton'],CURRENT_THEME); ?>" /></a>
		</p>
		<?php }
	}
	
	function update($new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['loginbutton'] = $new_instance['loginbutton'];
		$instance['logoutbutton'] = $new_instance['logoutbutton'];
		return $instance;
	}
	
	function form( $instance)
	{
		$instance = wp_parse_args( (array) $instance, array('login_button_title'=>__('Log In',CURRENT_THEME), 'logout_button_title'=>__('Log Out',CURRENT_THEME)));
		if ( !isset($instance['login_button_title']) )
			$instance['login_button_title'] = null;
		
		if ( !isset($instance['logout_button_title']) )
			$instance['logout_button_title'] = null;
		
		?>
		<?php echo __('Log in Button Text:',CURRENT_THEME);?>
		<input class="upload" id="<?php echo $this->get_field_id('loginbutton'); ?>" name="<?php echo $this->get_field_name('loginbutton'); ?>" type="text" value="<?php if(isset($instance['loginbutton'])) { echo __($instance['loginbutton']); } else { echo __('Log In',CURRENT_THEME); } ?>" />
		<?php echo __('Log out Button Text:',CURRENT_THEME);?>
		<input class="upload" id="<?php echo $this->get_field_id('logoutbutton'); ?>" name="<?php echo $this->get_field_name('logoutbutton'); ?>" type="text" value="<?php if(isset($instance['logoutbutton'])) { echo __($instance['logoutbutton']); } else { echo __('Log Out',CURRENT_THEME); } ?>" />
		<?php 
		return $instance;
	}
}
function login_form_widgets() {//register my widget
	register_widget( 'login_form' );
}

add_action( 'widgets_init', 'login_form_widgets' );//function to load my widget

?>