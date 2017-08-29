<?php
/*
Plugin Name: vk.com comments
Plugin URI: http://impressweb.org/vkcomments/
Description: Displays vk.com comments widget. Плагин отображает виджет комментариев вконтакте 
Version: 1.15
Author: Trofimenko Maksim
Author URI: http://tpoxa.com
*/


class vkcomments  {

		function vkcomments () {	

	
			
			add_filter( 'comments_template', array($this, 'comments_template'));								
			add_action('wp_head', array($this, 'head_script'));
			add_action('admin_menu', array($this, 'admin_menu'));		
		}
			
		function comments_template () {
			return dirname( __FILE__ ) . '/comment-template.php';	
		}
		
		// wp_register_script does not support charset parameter
		
		function head_script () {
			global $vkopenapiloaded; // can be used by another plugin for escaping twice loading
			
			if(!isset($vkopenapiloaded)):?>
			<script type="text/javascript" src="http://vkontakte.ru/js/api/openapi.js"  charset="windows-1251" ></script>
			<?php $vkopenapiloaded =1; endif; 
		}
		
		function admin_menu ()
		{
			 add_options_page('Vk.com comments widget', 'Vkcomments', 'manage_options', 'vkcomments', array($this,'vkcomments_options'));		
		}
		
		function vkcomments_options() {
				if (!current_user_can('manage_options'))  {
				    wp_die( __('You do not have sufficient permissions to access this page.') );
				 }
				
				 if(isset($_POST['vkcomments_wpnonce'])) {
				 	if ( wp_verify_nonce($_POST['vkcomments_wpnonce'], plugin_basename( __FILE__ )))
				 	{
				 		update_option('vkontakte_apiId', (int)$_POST['api_id']);
				 		update_option('vkontakte_comments_limit', (int)$_POST['comments_limit']);
				 		update_option('vkontakte_comments_hidewpcomnts', (isset($_POST['hidewpcomments'])) ? 1 : 0);
				 		
				 		
				 		$this->showmessage('Setting are saved');
				 	}
				 }
		  
			?>
			<div class="wrap">
			<h2>Vk.com comments widget settings </h2>
				<form method="post">
				<?php	wp_nonce_field( plugin_basename( __FILE__ ), 'vkcomments_wpnonce', false, true ); ?>
				<?php $openapiId = get_option('vkontakte_apiId','')?>	
				<?php $commentslimit= get_option('vkontakte_comments_limit',10)?>
							
				<p><?php echo __('API ID','vkcomments'); ?>: <input type="text" value="<?php echo $openapiId;?>" name="api_id"/></p>
				<p><?php echo __('Comments limit','vkcomments'); ?>: <input type="text" value="<?php echo $commentslimit;?>" name="comments_limit"/></p>		
					
					
				<p><?php echo __('Hide wordpress comments','vkcomments'); ?>: <input type="checkbox" value="1" name="hidewpcomments" <?php if(get_option('vkontakte_comments_hidewpcomnts')==1):?>  checked="checked" <?php endif;?>/></p>
				
					
				<p><input type="submit" value="Update Options" name="update" class="button-primary" /></p>
				</form>
			</div>
			<?php 
		
		}
		
		function showmessage($message, $type = 'message') { //or error 
			echo '<div class="'.($type=='message' ? 'updated' : 'error').'">'.addslashes($message).'</div>';
		}

}

function vkcomments_init() {
	$a = new vkcomments;
}

add_action('init', 'vkcomments_init');