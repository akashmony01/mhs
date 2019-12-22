<?php
/*
Plugin Name: STM Importer
Plugin URI: http://stylemixthemes.com/
Description: STM Importer
Author: Stylemix Themes
Author URI: http://stylemixthemes.com/
Text Domain: stm_importer
Version: 2.3
*/

define( 'STM_DEMO_PATH', dirname(__FILE__) );

require_once( STM_DEMO_PATH . '/helpers/widgets.php' );

// Demo Import - Styles
function stm_demo_import_styles() {
	$plugin_url = plugin_dir_url( __FILE__ );

	wp_enqueue_style( 'stm-demo-import-style', $plugin_url . '/assets/css/style.css', null, null, 'all' );
}

add_action( 'admin_enqueue_scripts', 'stm_demo_import_styles' );

// After import hook and add menu, home page. slider, blog page
if( ! function_exists( 'stm_importer_done_function' ) ){
    function stm_importer_done_function($layout){

		$plugin_path = dirname( __FILE__ );

        global $wp_filesystem;

        if ( empty( $wp_filesystem ) ) {
            require_once ABSPATH . '/wp-admin/includes/file.php';
            WP_Filesystem();
        }

        $locations = get_theme_mod( 'nav_menu_locations' );
        $menus = wp_get_nav_menus();

        if ( ! empty( $menus ) ) {
            foreach ( $menus as $menu ) {
                if ( is_object( $menu ) ) {
                    switch ($menu->name) {
                        case 'Header menu':
                            $locations['stm-primary'] = $menu->term_id;
                            break;
                        case 'Top bar':
                            $locations['stm-topbar'] = $menu->term_id;
                            break;
                        case 'About':
                            $locations['stm-about'] = $menu->term_id;
                            break;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations', $locations );

        if ( $layout === 'university' ) {
            update_option('blogdescription', 'university');
        }

        update_option( 'show_on_front', 'page' );

        $front_page = get_page_by_title( 'Home' );
        if ( isset( $front_page->ID ) ) {
            update_option( 'page_on_front', $front_page->ID );
        }

        $blog_page = get_page_by_title( 'News' );
        if ( isset( $blog_page->ID ) ) {
            update_option( 'page_for_posts', $blog_page->ID );
        }

        $shop_page = get_page_by_title( 'Shop' );
        if( isset( $shop_page->ID ) ) {
            if ( $layout === 'school' ) {
                update_option( 'woocommerce_shop_page_id', $shop_page->ID );
                update_option( 'shop_catalog_image_size[width]', 174 );
                update_option( 'shop_catalog_image_size[height]', 174 );
                update_option( 'shop_single_image_size[width]', 247 );
                update_option( 'shop_single_image_size[height]', 266 );
                update_option( 'shop_thumbnail_image_size[width]', 50 );
                update_option( 'shop_thumbnail_image_size[height]', 50 );
            }
            else if($layout === 'university') {
                update_option( 'woocommerce_shop_page_id', $shop_page->ID );
                update_option( 'shop_catalog_image_size[width]', 138 );
                update_option( 'shop_catalog_image_size[height]', 202 );
                update_option( 'shop_single_image_size[width]', 600 );
                update_option( 'shop_single_image_size[height]', 600 );
                update_option( 'shop_thumbnail_image_size[width]', 42 );
                update_option( 'shop_thumbnail_image_size[height]', 64 );
            }
        }

        $checkout_page = get_page_by_title( 'Checkout' );
        if ( isset( $checkout_page->ID ) ) {
            update_option( 'woocommerce_checkout_page_id', $checkout_page->ID );
        }
        $cart_page = get_page_by_title( 'Cart' );
        if ( isset( $cart_page->ID ) ) {
            update_option( 'woocommerce_cart_page_id', $cart_page->ID );
        }
        $account_page = get_page_by_title( 'My Account' );
        if ( isset( $account_page->ID ) ) {
            update_option( 'woocommerce_myaccount_page_id', $account_page->ID );
        }

        $classes_page = get_page_by_title( 'Classes' );
        if( isset( $classes_page->ID ) ) {
            update_option( 'stm_post_types_options[stm_course][page_for_courses]', $classes_page->ID );
        }

        $donations_page = get_page_by_title( 'Donations' );
        if( isset( $donations_page->ID ) ) {
            update_option( 'stm_post_types_options[stm_donation][page_for_donations]', $donations_page->ID );
        }

        if ( class_exists( 'RevSlider' ) ) {
            if ( $layout === 'school' ) {
                $home = $plugin_path . '/demo/home.zip';

                if ( file_exists( $home ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home );
                }

                $home_2 = $plugin_path . '/demo/home-2.zip';

                if ( file_exists( $home_2 ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home_2 );
                }

                $home_3 = $plugin_path . '/demo/home-3.zip';

                if ( file_exists( $home_3 ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home_3 );
                }

                $home_4 = $plugin_path . '/demo/home-4.zip';

                if ( file_exists( $home_4 ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home_4 );
                }
            }

            else if($layout === 'university') {
                $home = $plugin_path . '/demo/home_slider_university.zip';

                if ( file_exists( $home ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home );
                }
            }

            else if($layout === 'kindergarten') {
                $home = $plugin_path . '/demo/home_slider_kindergarten.zip';

                if ( file_exists( $home ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home );
                }
            }

            else if($layout === 'university-two') {
                $home = $plugin_path . '/demo/home_slider_university-two.zip';

                if ( file_exists( $home ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home );
                }
            }

            else if($layout === 'kindergarten-two') {
                $home = $plugin_path . '/demo/home_slider_kindergarten-two.zip';

                if ( file_exists( $home ) ) {
                    $slider = new RevSlider();
                    $slider->importSliderFromPost( true, true, $home );
                }
            }
        }
    }
}

add_action( 'stm_importer_done', 'stm_importer_done_function' );

function prepare_demo( $layout ){

	$tempDir = get_temp_dir();
	$fzip = $tempDir . $layout .'.zip';
	$fxml = $tempDir . $layout .'.xml';

	if( file_exists($fxml) ){
		return $fxml;
	}

	global $wp_filesystem;
	if ( empty( $wp_filesystem ) ) {
		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();
	}

	$response = wp_remote_get( get_package($layout, 'zip'), array('timeout' => 30) );
	if ( is_wp_error( $response ) ) {
		return false;
	}
	$body = wp_remote_retrieve_body( $response );

	if ( empty( $body ) ) {
		if ( function_exists( 'ini_get' ) && ini_get( 'allow_url_fopen' ) ) {
			$body = @file_get_contents( get_package($layout, 'zip') );
		}
	}

	if ( ! $wp_filesystem->put_contents( $fzip , $body ) ) {
		@unlink( $fzip );
		$fp = @fopen( $fzip, 'w' );

		@fwrite( $fp, $body );
		@fclose( $fp );
	}

	if ( class_exists( 'ZipArchive' ) ) {
		$zip = new ZipArchive();
		if ( true === $zip->open( $fzip ) ) {
			$zip->extractTo( $tempDir );
			$zip->close();
			return $fxml;
		}
	}

	$unzip = unzip_file( $fzip, $tempDir );
	if($unzip){
		return $fxml;
	}

	return false;
}


// Demo Import
if ( !function_exists('stm_demo_import'))
{
	function stm_demo_import()
	{
		?>
		<div class="stm_message content" style="display:none;">
			<img src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/images/spinner.gif" alt="spinner">
			<h1 class="stm_message_title"><?php esc_html_e('Importing Demo Content...', 'stm_importer'); ?></h1>
			<p class="stm_message_text"><?php esc_html_e('Duration of demo content importing depends on your server speed.', 'stm_importer'); ?></p>
		</div>

		<div class="stm_message success" style="display: none;">
			<p class="stm_message_text"><?php echo wp_kses( sprintf(__('Congratulations and enjoy <a href="%s" target="_blank">your website</a> now!', 'stm_importer'), esc_url( home_url() )), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ); ?></p>
		</div>

		<div class="stm_message errors" style="display: none;">
            <p class="stm_message_text"><?php echo wp_kses( sprintf(__('Error occurred during demo import. Please contact our <a href="%s" target="_blank">support team</a>!', 'consulting'), esc_url( stm_theme_support_url() )), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ); ?></p>
        </div>

        <form class="stm_importer" id="import_demo_data_form" action="?page=stm_demo_import" method="post">

			<div class="stm_importer_options">

				<div class="stm_importer_note">
					<strong><?php esc_html_e('Before installing the demo content, please NOTE:', 'stm_importer'); ?></strong>
					<p><?php echo wp_kses( sprintf(__('Install the demo content only on a clean WordPress. Use <a href="%s" target="_blank">Reset WP</a> plugin to clean the current Theme.', 'motors'), 'https://wordpress.org/plugins/reset-wp/', esc_url( home_url() )), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ); ?></p>
					<p><?php esc_html_e('Remember that you will NOT get the images from live demo due to copyright / license reason.', 'stm_importer'); ?></p>
				</div>

                <div class="stm_importer_demos">
                    <div class="stm_importer_demo_item">
                        <label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/smart-school-preview.png" />
                            <span class="stm_choice_radio_button">
                                <input type="radio" name="smarty_layout_demo" value="school" checked/>
                                <?php esc_html_e('School', 'stm-importer'); ?>
                            </span>
                        </label>
                    </div>
                    <div class="stm_importer_demo_item">
                        <label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/smart-university-preview.png" />
                            <span class="stm_choice_radio_button">
                                <input type="radio" name="smarty_layout_demo" value="university"/>
                                <?php esc_html_e('University', 'stm-importer'); ?>
                            </span>
                        </label>
                    </div>
                    <div class="stm_importer_demo_item">
                        <label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/smart-kindergarten-preview.png" />
                            <span class="stm_choice_radio_button">
                                <input type="radio" name="smarty_layout_demo" value="kindergarten"/>
                                <?php esc_html_e('Kindergarten', 'stm-importer'); ?>
                            </span>
                        </label>
                    </div>
                    <div class="stm_importer_demo_item">
                        <label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/smart-school-two-preview.jpg" />
                            <span class="stm_choice_radio_button">
                                <input type="radio" name="smarty_layout_demo" value="school-two" />
                                <?php esc_html_e('School Two', 'stm-importer'); ?>
                            </span>
                        </label>
                    </div>
                    <div class="stm_importer_demo_item">
                        <label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/smart-university-two-preview.jpg" />
                            <span class="stm_choice_radio_button">
                                <input type="radio" name="smarty_layout_demo" value="university-two" />
                                <?php esc_html_e('University Two', 'stm-importer'); ?>
                            </span>
                        </label>
                    </div>
                    <div class="stm_importer_demo_item">
                        <label>
                            <img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/smart-kindergarten-two-preview.png" />
                            <span class="stm_choice_radio_button">
                                <input type="radio" name="smarty_layout_demo" value="kindergarten-two" />
                                <?php esc_html_e('Kindergarten Two', 'stm-importer'); ?>
                            </span>
                        </label>
                    </div>
                </div>
				<p>
					<input class="button-primary size_big" type="submit" value="Import" id="import_demo_data">
				</p>
			</div>

		</form>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#import_demo_data_form').on('submit', function() {
					jQuery("html, body").animate({
						scrollTop: 0
					}, {
						duration: 300
					});
					jQuery('.stm_importer').slideUp(null, function(){
						jQuery('.stm_message.content').slideDown();
					});

					var layout = 'school';
					layout = jQuery('input[name="smarty_layout_demo"]:checked').val();

					// Importing Content
					jQuery.ajax({
						type: 'POST',
						url: '<?php echo admin_url('admin-ajax.php'); ?>',
						data: jQuery(this).serialize()+'&action=stm_demo_import_content',
						success: function(){

							jQuery('.stm_message.content').slideUp();
							jQuery('.stm_message.success').slideDown();

							/* Analytics */
                            $.ajax({
								url: 'https://panel.stylemixthemes.com/api/active/',
								type: 'post',
								dataType: 'json',
								data: {
									theme: 'smarty',
									layout: layout,
									website: "<?php echo esc_url(get_site_url()); ?>",

									<?php
									$token = get_option('envato_market', array());
									$token = (!empty($token['token'])) ? $token['token'] : ''; ?>
									token: "<?php echo esc_js($token); ?>"
								}
                        });

						}
					});
					return false;
				});
			});
		</script>
		<?php
	}

    // Content Import
	function stm_demo_import_content() {
		$layout = 'school';

		if( !empty( $_POST['smarty_layout_demo'] ) ) {
			$layout = $_POST['smarty_layout_demo'];
		}

		update_option('stm_layout_mode', $layout);
        set_time_limit( 0 );

        if ( ! defined( 'WP_LOAD_IMPORTERS' ) ) {
            define( 'WP_LOAD_IMPORTERS', true );
        }

        /*Import Widgets*/
        stm_theme_import_widgets($layout);

        require_once( 'wordpress-importer/wordpress-importer.php' );

        $wp_import                    = new WP_Import();
        $wp_import->fetch_attachments = true;

		$ready = prepare_demo( $layout );
		if( $ready ){
			ob_start();
			$wp_import->import( $ready );
			ob_end_clean();

			do_action( 'stm_importer_done', $layout );
			echo 'done';
		}else{
			echo 'error';
		}
		die();
	}

	add_action( 'wp_ajax_stm_demo_import_content', 'stm_demo_import_content' );

}