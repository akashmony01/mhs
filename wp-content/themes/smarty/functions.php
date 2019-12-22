<?php
/* - Includes
 *
 * Path
 *
 * 1. Setup
 * 2. Scripts & Styles
 * 3. TGM
 * 4. Custom Post Type
 * 5. Customizer
 * 6. Custom
 * 7. Visual Composer
 * 8. Widgets
 * 9. Print Styles
 *
*/

function smarty_sanitize_text_field($text)
{
	return apply_filters('smarty_sanitize_text_field', $text);
}

// Product Registration
if(is_admin()) {
    require_once(get_template_directory() . '/admin/admin.php');
}

// Path
$inc_path = get_template_directory() . '/inc';

// 1. Setup
require_once $inc_path . '/setup.php';

// 2. Scripts & Styles
require_once $inc_path . '/scripts_styles.php';

// 3. TGM
require_once $inc_path . '/tgm/tgm-plugin-registration.php';

// 4. Custom Post Type
if( class_exists('STM_PostType') ) {
	require_once $inc_path . '/custom-post-types/'.smarty_get_layout_mode().'/custom-post-types.php';
}

// 5. Customizer
require_once $inc_path . '/customizer/'.smarty_get_layout_mode().'/customizer.class.php';

// 6. Custom
require_once $inc_path . '/custom.php';

// 7. Visual Composer
if( defined( 'WPB_VC_VERSION' ) ) {
	require_once $inc_path . '/visual-composer/'.smarty_get_layout_mode().'/visual-composer.php';
    $dir = get_template_directory() . '/vc_templates/'.smarty_get_layout_mode();
    vc_set_shortcodes_templates_dir( $dir );
}



// 9. Print Styles
require_once $inc_path . '/print_styles.php';

function smarty_get_plugin_main_path($slug) {
	$plugin_data = get_plugins('/' . $slug);
	if(!empty($plugin_data)) {
		$plugin_file = array_keys($plugin_data);
		$plugin_path = $slug . '/' . $plugin_file[0];
	} else {
		$plugin_path = false;
	}
	return $plugin_path;
}

function smarty_check_plugin_active($slug) {
	/*if just slug*/
	if(strpos($slug, '.php') === false) $slug = smarty_get_plugin_main_path($slug);
	return in_array($slug, (array)get_option('active_plugins', array())) || is_plugin_active_for_network($slug);
}

function smarty_glob_wp_query(){
    global $wp_query;
    return $wp_query;
}

function smarty_glob_wpdb(){
    global $wp_query;
    return $wp_query;
}

function smarty_glob_pagenow(){
    global $pagenow;
    return $pagenow;
}