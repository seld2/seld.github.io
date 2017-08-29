<?php defined('BBF') or die();?>
<?php
	class Falbar_BBF_Core{

		protected $main_file_name  = 'bicycles-by-falbar.php';

		protected $main_file_path;

		protected $plugin_name	   = 'Bicycles by falbar';

		protected $prefix_db 	   = '_falbar_';

		protected $prefix 		   = 'bbf';

		protected $plugin_domain   = 'bicycles-by-falbar';

		protected $options;

		protected function init(){

			$this->main_file_path = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$this->main_file_name;

			$this->prefix_db 	  = $this->prefix_db.$this->prefix;

			$this->options 		  = get_option($this->prefix_db.'_options_name');

			return false;
		}

		protected function get_checkbox_template($name){

			$tmp = '';
			$checked = '';

			if($this->check_checkbox_option($name)){

				$checked = 'checked ';
			}

			$tmp .= '<input id="'.$name.'" type="checkbox" name="'.$this->prefix_db.'_options_name['.$name.']" value="1" '.$checked.'/>';

			return $tmp;
		}

		protected function check_checkbox_option($name){

			if(isset($this->options[$name]) && $this->options[$name] == '1'){

				return true;
			}

			return false;
		}
	}
?>