var scripts = document.getElementsByTagName("script");
var src = scripts[scripts.length - 1].getAttribute("src");
src = src.substring(0, src.lastIndexOf('/') - 2);
jQuery(document).ready(function ($) {
	 
			$( 'body' ).on( 'click', '.newfield', function(e) {
				e.preventDefault();
				var now = $.now();
		        
				var button = $( this ),
				insert = button.parent().parent().prev('tr');
				insert.after('<tr><td><input type="text" id="' + now + '" name= "' + now + '" value="" /> </td><td><div class="normal-toggle-button' + now + '">	<input type="checkbox" id="' + now + 'req" name="' + now + 'req" /></div></td><td><input type="image" src="' + src + 'images/cross.png" class="removefield" /></td></tr>');
				$('.normal-toggle-button' + now).toggleButtons();
			});
			
			$( 'body' ).on( 'click', '.removefield', function(e) {
				e.preventDefault();
				var row   = $(this).parent().parent( 'tr' ),
				count = row.parent().find( 'tr' ).length - 1;
				if( count > 1 ) {
					$( 'input', row ).val( '' );
					row.fadeOut( 'fast' ).remove();
				} 
			});
	
});
		
