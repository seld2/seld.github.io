<?php
/*
Plugin Name: Bicycles by falbar
Plugin URI: http://falbar.ru/
Description: Configure WordPress from the beginning. Collection of ready-made solutions for WordPress customization.
Version: 1.0.4
Author: Anton Kuleshov
Author URI: http://falbar.ru/
*/

if(!defined('ABSPATH')){

	die();
}

define('BBF', true);

define('BBF_BASE', dirname(__FILE__));
define('BBF_DS', DIRECTORY_SEPARATOR);

define('BBF_DIR_INC', BBF_BASE.BBF_DS.'includes'.BBF_DS);

require_once(BBF_DIR_INC.'class-falbar-bbf-core.php');
require_once(BBF_DIR_INC.'class-falbar-bbf.php');

$bbf = new Falbar_BBF();
$bbf->run();
?>