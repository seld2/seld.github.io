<?php
$options=get_defined_vars();?>
<form method="get" name="searchform" action="<?php bloginfo('url'); ?>">
<input name="s" type="text" value="<?php echo esc_attr(get_search_query()); ?>" class="boxcolor" />
<div>
<span class="ttr_button" onmouseover="this.className='ttr_button_hover1';" onmouseout="this.className='ttr_button';">
 <input type="submit" name="search" value="<?php  echo esc_attr(__('Search')); ?>"/>
</span>
<div style="clear:both;">
</div>
</div>
</form>
