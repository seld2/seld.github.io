<?php 
	$api_id = get_option('vkontakte_apiId','');
	$limit = get_option('vkontakte_comments_limit', 15);
	$limit = ($limit>0) ? $limit : 15;
	 
?>

<?php 

if(get_option('vkontakte_comments_hidewpcomnts')!=1)
{
	$theme = get_theme_root().'/'.get_template();
		if(file_exists($theme.'/comments.php'))
			include($theme.'/comments.php');
		else if (file_exists( ABSPATH . WPINC . '/theme-compat/comments.php'))
			require( ABSPATH . WPINC . '/theme-compat/comments.php');
}		
?>

<div id="vk_comments">

	<?php if ( post_password_required() || ! comments_open()) : ?>
			<!-- comments not available -->	
	</div>
	<?php
			return;
		endif;
	?>

	<?php if($api_id==''):?>API ID not specified<?php endif;?>	
</div>

<script type="text/javascript">
		  VK.init({
		    apiId: <?php echo $api_id?>,
		    limit : <?php echo $limit?>,
		    onlyWidgets: true
		  });
</script>		
<script type="text/javascript">
	VK.Widgets.Comments('vk_comments');
</script>
