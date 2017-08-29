<?php defined('BBF') or die();?>
<?php
	class Falbar_BBF extends Falbar_BBF_Core{

		public function __construct(){

			parent::init();
		}

		public function run(){

			// Activation of the plugin
			register_activation_hook(
				$this->main_file_path,
				array(
					$this,
					'activate'
				)
			);

			// Deactivating the plugin
			register_deactivation_hook(
				$this->main_file_path,
				array(
					$this,
					'deactivate'
				)
			);

			// Add css and js files
			add_action(
				'admin_enqueue_scripts',
				array(
					$this,
					'admin_enqueue_scripts'
				)
			);

			// Adding the settings page
			add_action(
				'admin_menu',
				array(
					$this,
					'admin_menu'
				)
			);

				// Adding sections and fields
				add_action(
					'admin_init',
					array(
						$this,
						'admin_menu_settings'
					)
				);

				// Add alert
				add_action(
					'admin_notices',
					array(
						$this,
						'admin_notices'
					)
				);

			// Generate default data
			$this->generate_default_data();

			// Setup parameters
			$this->setup_parameters();

			// Localization plugin
			add_action(
				'plugins_loaded',
				array(
					$this,
					'plugin_textdomain'
				)
			);

			return false;
		}

		public function activate(){



			return false;
		}

		public function deactivate(){



			return false;
		}

		public function admin_enqueue_scripts(){

			if(isset($_GET['page']) && $_GET['page'] == $this->main_file_name){

				wp_enqueue_style(
					$this->plugin_domain,
					plugin_dir_url(dirname(__FILE__)).'assets/css/bicycles-by-falbar-admin.css',
					array(),
					null,
					'all'
				);

				wp_enqueue_script(
					$this->plugin_domain,
					plugin_dir_url(dirname(__FILE__)).'assets/js/bicycles-by-falbar-admin.js',
					array(
						'jquery'
					),
					null,
					false
				);
			}

			return false;
		}

		public function admin_menu(){

			add_menu_page(
				$this->plugin_name,
				'Bicycles',
				'manage_options',
				$this->main_file_name,
				array(
					$this,
					'admin_menu_view'
				),
				'dashicons-awards',
				82,00012345677
			);

			return false;
		}

			public function admin_menu_view(){

				echo('<div class="wrap">');
					echo('<h1>'.$this->plugin_name.'</h1>');
					echo('<h2>'.__('Settings', $this->plugin_domain).'</h2>');
					echo('<form action="options.php" method="post">');

						settings_fields($this->prefix_db.'_options_group');
						do_settings_sections($this->main_file_name);
						submit_button();

					echo('</form>');
				echo('</div>');

				return false;
			}

		public function admin_menu_settings(){

			register_setting(
				$this->prefix_db.'_options_group',
				$this->prefix_db.'_options_name',
				array(
					$this,
					'sanitize_options'
				)
			);

			add_settings_section(
				$this->prefix.'_section_main',
				'',
				array(
					$this,
					'section_main_view'
				),
				$this->main_file_name
			);

			return false;
		}

			public function sanitize_options($options){

				$clean_options = array();

				if(isset($options)){

					foreach($options as $k => $v){

						$clean_options[$k] = strip_tags($v);
					}
				}

				return $clean_options;
			}

			public function section_main_view(){

				echo('<div id="wr-tabs">');
					echo('<div class="tabs">');
						// Cleanup code
						echo('<div class="tab active">');
							echo(__('Cleanup code', $this->plugin_domain));
						echo('</div>');
						// Doubles pages
						echo('<div class="tab">');
							echo(__('Doubles pages', $this->plugin_domain));
						echo('</div>');
						// Security
						echo('<div class="tab">');
							echo(__('Security', $this->plugin_domain));
						echo('</div>');
						// Additionally
						echo('<div class="tab">');
							echo(__('Additionally', $this->plugin_domain));
						echo('</div>');
					echo('</div>');
					echo('<div class="content">');
						// Cleanup code
						echo('<div class="tab-cont active">');
							echo('<div id="cleanup">');
								echo('<div class="item">');
									echo('<label for="remove_meta_generator">');
										echo($this->get_checkbox_template('remove_meta_generator'));
										echo(__('Remove meta generator', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the meta tag from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_rsd_link">');
										echo($this->get_checkbox_template('remove_rsd_link'));
										echo(__('Remove RSD link', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tag from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_wlw_link">');
										echo($this->get_checkbox_template('remove_wlw_link'));
										echo(__('Remove WLW manifest link', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tag from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_next_prev_link">');
										echo($this->get_checkbox_template('remove_next_prev_link'));
										echo(__('Remove next and prev links', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tags from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_canonical_link">');
										echo($this->get_checkbox_template('remove_canonical_link'));
										echo(__('Remove canonical link', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tag from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_shortlink_link">');
										echo($this->get_checkbox_template('remove_shortlink_link'));
										echo(__('Remove shortlink link', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tag from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="disable_emoji">');
										echo($this->get_checkbox_template('disable_emoji'));
										echo(__('Disable emoji', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the emoji code from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_recentcomments_style">');
										echo($this->get_checkbox_template('remove_recentcomments_style'));
										echo(__('Remove .recentcomments styles', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes .recentcomments styles from head section.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');
							echo('</div>');
						echo('</div>');
						// Doubles pages
						echo('<div class="tab-cont">');
							echo('<div id="doubles-pages">');
								echo('<div class="item">');
									echo('<label for="remove_attachment_pages">');
										echo($this->get_checkbox_template('remove_attachment_pages'));
										echo(__('Remove attachment pages', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes attachment pages and puts a redirect.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_archives_date">');
										echo($this->get_checkbox_template('remove_archives_date'));
										echo(__('Remove archives date', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes all pages with the date archives and puts a redirect.', $this->plugin_domain));
									echo('</p>');
									echo('<p class="description">');
										echo(__('Deactivate widget archives.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_archives_tag">');
										echo($this->get_checkbox_template('remove_archives_tag'));
										echo(__('Remove archives tag', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes all pages with the tag archives and puts a redirect.', $this->plugin_domain));
									echo('</p>');
									echo('<p class="description">');
										echo(__('Deactivate widget archives.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_post_pagination">');
										echo($this->get_checkbox_template('remove_post_pagination'));
										echo(__('Remove post pagination', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the pagination from the post and puts a redirect.', $this->plugin_domain));
									echo('</p>');
									echo('<p class="description">');
										echo(__('Example: /post-name/number', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_archives_author">');
										echo($this->get_checkbox_template('remove_archives_author'));
										echo(__('Remove archives author', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes all pages with the author archives and puts a redirect.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');
							echo('</div>');
						echo('</div>');
						// Security
						echo('<div class="tab-cont">');
							echo('<div id="security">');
								echo('<div class="item">');
									echo('<label for="hide_login_errors">');
										echo($this->get_checkbox_template('hide_login_errors'));
										echo(__('Hide login errors', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Change the error text so that attackers are unable to pick up login.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="disable_xmlrpc">');
										echo($this->get_checkbox_template('disable_xmlrpc'));
										echo(__('Disable XML-RPC', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Disable XML-RPC mechanism.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');
							echo('</div>');
						echo('</div>');
						// Additionally
						echo('<div class="tab-cont">');
							echo('<div id="additionally">');
								echo('<div class="item">');
									echo('<label for="enable_filename_lowercase">');
										echo($this->get_checkbox_template('enable_filename_lowercase'));
										echo(__('Enable filename lowercase', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Gives the names of uploaded files to lowercase.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="disable_rss_feeds">');
										echo($this->get_checkbox_template('disable_rss_feeds'));
										echo(__('Disable RSS feeds', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tags from head section and puts a redirect.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="disable_rest_api">');
										echo($this->get_checkbox_template('disable_rest_api'));
										echo(__('Disable REST API', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the link tags from head section and puts a redirect.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_links_admin_bar">');
										echo($this->get_checkbox_template('remove_links_admin_bar'));
										echo(__('Remove links in admin bar', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes all links to wordpress.org from the toolbar.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');

								echo('<div class="item">');
									echo('<label for="remove_url_from_comment_form">');
										echo($this->get_checkbox_template('remove_url_from_comment_form'));
										echo(__('Remove field "Website" from comment form', $this->plugin_domain));
									echo('</label>');
									echo('<p class="description">');
										echo(__('Removes the field "Website" from comment form.', $this->plugin_domain));
									echo('</p>');
									echo('<p class="description">');
										echo(__('Works with standard commenting form.', $this->plugin_domain));
									echo('</p>');
								echo('</div>');
							echo('</div>');
						echo('</div>');
					echo('</div>');
				echo('</div>');

				return false;
			}

		public function admin_notices(){

			if(isset($_GET['page']) && $_GET['page'] == $this->main_file_name){

				if(isset($_GET['settings-updated']) && $_GET['settings-updated'] == true){

					echo('<div class="updated notice is-dismissible">');

						echo('<p>');
							echo('<strong>'.__('Settings saved.', $this->plugin_domain).'</strong>');
						echo('</p>');

						echo('<button class="notice-dismiss" type="button">');
							echo('<span class="screen-reader-text">');
								echo(__('Dismiss this notice.', $this->plugin_domain));
							echo('</span>');
						echo('</button>');

					echo('</div>');
				}
			}

			return false;
		}

		public function generate_default_data(){

			$options = $this->options;

			if($options === false){

				add_option($this->prefix_db.'_options_name', array(
					// Cleanup code
					'remove_meta_generator' 		=> '1',
					'remove_rsd_link' 				=> '1',
					'remove_wlw_link' 				=> '1',
					'remove_next_prev_link' 		=> '1',
					'remove_canonical_link' 		=> '1',
					'remove_shortlink_link' 		=> '1',
					'disable_emoji' 				=> '1',
					'remove_recentcomments_style' 	=> '1',
					// Doubles pages
					'remove_attachment_pages' 		=> '1',
					'remove_archives_date' 			=> '1',
						// 'remove_archives_tag' 		=> '0',
					'remove_post_pagination' 		=> '1',
					'remove_archives_author' 		=> '1',
					// Security
					'hide_login_errors' 			=> '1',
					'disable_xmlrpc'				=> '1',
					// Additionally
					'enable_filename_lowercase' 	=> '1',
					'disable_rss_feeds' 			=> '1',
					'disable_rest_api' 				=> '1',
					'remove_links_admin_bar' 		=> '1',
					'remove_url_from_comment_form'  => '1'
				));
			}

			return false;
		}

		public function setup_parameters(){

			// Cleanup code
			if($this->check_checkbox_option('remove_meta_generator')){

				remove_action('wp_head', 'wp_generator');
				add_filter('the_generator', '__return_empty_string');
			}
			if($this->check_checkbox_option('remove_rsd_link')){

				remove_action('wp_head', 'rsd_link');
			}
			if($this->check_checkbox_option('remove_wlw_link')){

				remove_action('wp_head', 'wlwmanifest_link');
			}
			if($this->check_checkbox_option('remove_next_prev_link')){

				remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
				remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
			}
			if($this->check_checkbox_option('remove_canonical_link')){

				remove_action('wp_head', 'rel_canonical');
			}
			if($this->check_checkbox_option('remove_shortlink_link')){

				remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
				remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
			}
			if($this->check_checkbox_option('disable_emoji')){

				add_action(
					'init',
					array(
						$this,
						'disable_emojis'
					)
				);
			}
			if($this->check_checkbox_option('remove_recentcomments_style')){

				add_action(
					'widgets_init',
					array(
						$this,
						'remove_recentcomments_style'
					)
				);
			}

			// Doubles pages
			if($this->check_checkbox_option('remove_attachment_pages')){

				add_action(
					'template_redirect',
					array(
						$this,
						'remove_attachment_pages'
					),
					1
				);
			}
			if($this->check_checkbox_option('remove_archives_date')){

				add_action(
					'wp',
					array(
						$this,
						'remove_archives_date'
					)
				);

				add_action('widgets_init',
					array(
						$this,
						'unregister_widget_archives_date'
					)
				);
			}
			if($this->check_checkbox_option('remove_archives_tag')){

				add_action(
					'wp',
					array(
						$this,
						'remove_archives_tag'
					)
				);

				add_action('widgets_init',
					array(
						$this,
						'unregister_widget_archives_tag'
					)
				);
			}
			if($this->check_checkbox_option('remove_post_pagination')){

				add_action(
					'template_redirect',
					array(
						$this,
						'remove_post_pagination'
					)
				);
			}
			if($this->check_checkbox_option('remove_archives_author')){

				add_action(
					'wp',
					array(
						$this,
						'remove_archives_author'
					)
				);
			}

			// Security
			if($this->check_checkbox_option('hide_login_errors')){

				add_filter(
					'login_errors',
					array(
						$this,
						'hide_login_errors'
					)
				);
			}
			if($this->check_checkbox_option('disable_xmlrpc')){

				add_filter('xmlrpc_enabled', '__return_false');
			}

			// Additionally
			if($this->check_checkbox_option('enable_filename_lowercase')){

				add_filter(
					'sanitize_file_name',
					array(
						$this,
						'enable_filename_lowercase'
					),
					10
				);
			}
			if($this->check_checkbox_option('disable_rss_feeds')){

				remove_action('wp_head', 'feed_links_extra', 3);
				remove_action('wp_head', 'feed_links', 2);

				add_action(
					'do_feed',
					array(
						$this,
						'disable_rss_feeds_redirect'
					),
					1
				);
				add_action(
					'do_feed_rdf',
					array(
						$this,
						'disable_rss_feeds_redirect'
					),
					1
				);
				add_action(
					'do_feed_rss',
					array(
						$this,
						'disable_rss_feeds_redirect'
					),
					1
				);
				add_action(
					'do_feed_rss2',
					array(
						$this,
						'disable_rss_feeds_redirect'
					),
					1
				);
				add_action(
					'do_feed_atom',
					array(
						$this,
						'disable_rss_feeds_redirect'
					),
					1
				);
			}
			if($this->check_checkbox_option('disable_rest_api')){

				add_action(
					'init',
					array(
						$this,
						'disable_rest_api'
					)
				);
			}
			if($this->check_checkbox_option('remove_links_admin_bar')){

				add_action(
					'wp_before_admin_bar_render',
					array(
						$this,
						'remove_links_admin_bar'
					)
				);
			}
			if($this->check_checkbox_option('remove_url_from_comment_form')){

				add_filter(
					'comment_form_default_fields',
					array(
						$this,
						'remove_url_from_comment_form'
					)
				);
			}

			return false;
		}

			public function disable_emojis(){

				remove_action('wp_head', 'print_emoji_detection_script', 7);
				remove_action('admin_print_scripts', 'print_emoji_detection_script');
				remove_action('wp_print_styles', 'print_emoji_styles');
				remove_action('admin_print_styles', 'print_emoji_styles');
				remove_filter('the_content_feed', 'wp_staticize_emoji');
				remove_filter('comment_text_rss', 'wp_staticize_emoji');
				remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

				add_filter(
					'tiny_mce_plugins',
					array(
						$this,
						'disable_emojis_tinymce'
					)
				);

				return false;
			}

				public function disable_emojis_tinymce($plugins){

					if(is_array($plugins)){

						return array_diff($plugins, array('wpemoji'));
					}

					return array();
				}

			public function remove_recentcomments_style(){

				global $wp_widget_factory;

				remove_action(
					'wp_head',
					array(
						$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
						'recent_comments_style'
					)
				);

				return false;
			}

			public function remove_attachment_pages(){

				global $post;

				$post_parent = $post->post_parent;

				if(!isset($post_parent) || !is_numeric($post_parent)){

					return;
				}

				if(is_attachment() && $post_parent != 0){

					$page_url = get_permalink($post_parent);
					$status	  = 301;
				}else if(is_attachment() && $post_parent < 1){

					$page_url = get_home_url();
					$status   = 302;
				}else{

					return;
				}

				wp_safe_redirect(
					esc_url_raw(
						apply_filters(
							'sitecare_redirect_unattached_images',
							$page_url
						)
					),
					$status
				);

				exit;
			}

			public function remove_archives_date(){

				if(is_date() && !is_admin()){

					wp_redirect(
						get_home_url(),
						301
					);

					exit;
				}

				return false;
			}

			public function unregister_widget_archives_date(){

				unregister_widget('WP_Widget_Archives');

				return false;
			}

			public function remove_archives_tag(){

				if(is_tag()){

					wp_redirect(
						get_home_url(),
						301
					);

					exit;
				}

				return false;
			}

			public function unregister_widget_archives_tag(){

				unregister_widget('WP_Widget_Tag_Cloud');

				return false;
			}

			public function remove_post_pagination(){

				if(is_singular() && !is_front_page()){

					global $post, $page;

					$num_pages = substr_count($post->post_content, '<!--nextpage-->') + 1;

					if($page > $num_pages || $page == 1){

						wp_redirect(
							get_permalink($post->ID)
						);

						exit;
					}
				}

				return false;
			}

			public function remove_archives_author(){

				if(is_author()){

					wp_redirect(
						get_home_url(),
						301
					);

					exit;
				}

				return false;
			}

			public function hide_login_errors(){

				return __('<strong>ERROR</strong>: Invalid Username or Password', $this->plugin_domain);
			}

			public function enable_filename_lowercase($filename){

				return strtolower($filename);
			}

			public function disable_rss_feeds_redirect(){

				wp_redirect(
					get_home_url(),
					301
				);

				exit;
			}

			public function disable_rest_api(){

				add_filter('rest_enabled', '__return_false');

				remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
				remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
				remove_action('template_redirect', 'rest_output_link_header', 11, 0);
				remove_action('auth_cookie_malformed', 'rest_cookie_collect_status');
				remove_action('auth_cookie_expired', 'rest_cookie_collect_status');
				remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status');
				remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status');
				remove_action('auth_cookie_valid', 'rest_cookie_collect_status');
				remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100);

				remove_action('init', 'rest_api_init');
				remove_action('rest_api_init', 'rest_api_default_filters', 10, 1);
				remove_action('parse_request', 'rest_api_loaded');

				remove_action('rest_api_init', 'wp_oembed_register_route');
				remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);

				remove_action('wp_head', 'wp_oembed_add_discovery_links');

				add_action(
					'template_redirect',
					array(
						$this,
						'remove_rest_api'
					)
				);

				return false;
			}

				public function remove_rest_api(){

					if(preg_match('#^/wp-json/(oembed|)#i', $_SERVER['REQUEST_URI']) ||
					   preg_match('#^/wp-json$#i', $_SERVER['REQUEST_URI'])){

						wp_redirect(
							get_home_url(),
							301
						);

						exit;
					}

					return false;
				}

			public function remove_links_admin_bar(){

				global $wp_admin_bar;

				$wp_admin_bar->remove_menu('about');
				$wp_admin_bar->remove_menu('wporg');
				$wp_admin_bar->remove_menu('documentation');
				$wp_admin_bar->remove_menu('support-forums');
				$wp_admin_bar->remove_menu('feedback');
				$wp_admin_bar->remove_menu('view-site');

				return false;
			}

			public function remove_url_from_comment_form($fields){

				if(isset($fields['url'])){

					unset($fields['url']);
				}

				return $fields;
			}

		public function plugin_textdomain(){

			load_plugin_textdomain(
				$this->plugin_domain,
				false,
				dirname(dirname(plugin_basename(__FILE__ ))).'/languages/'
			);

			return false;
		}
	}
?>