<?php
/*
 * Plugin Name: Photo Gallery Plus
 * Plugin URI: https://www.thewpgeeks.com
 * Description: Photo Gallery Plus is an interactive WordPress photo gallery plugin, best fit for creative and corporate portfolio websites.
 * Author: The WP Geeks
 * Author URI: https://www.thewpgeeks.com
 * Version: 1.0.3
 * License: GPLv3
 * Text Domain: photo-gallery-plus
 * Domain Path: /languages
 */

if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly

/* Constant Declaration */

if (!defined("PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH")) {
   define("PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
}

if (!defined("PHOTO_GALLERY_PLUS_PLUGIN_DIRNAME")) {
   define("PHOTO_GALLERY_PLUS_PLUGIN_DIRNAME", plugin_basename(dirname(__FILE__)));
}

if (!defined("PHOTO_GALLERY_PLUS_MAIN_DIR")) {
   define("PHOTO_GALLERY_PLUS_MAIN_DIR", dirname(dirname(dirname(__FILE__))) . "/photo-gallery-plus/");
}

if (!defined("PHOTO_GALLERY_PLUS_UPLOAD_DIR")) {
   define("PHOTO_GALLERY_PLUS_UPLOAD_DIR", PHOTO_GALLERY_PLUS_MAIN_DIR . "original-uploads/");
}

if (!defined("PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR")) {
   define("PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR", PHOTO_GALLERY_PLUS_MAIN_DIR . "thumbs-cropped/");
}

if (!defined("PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR")) {
   define("PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR", PHOTO_GALLERY_PLUS_MAIN_DIR . "thumbs-non-cropped/");
}

if (!defined("PHOTO_GALLERY_PLUS_ORIGINAL_DIR")) {
   define("PHOTO_GALLERY_PLUS_ORIGINAL_DIR", PHOTO_GALLERY_PLUS_MAIN_DIR . "original-images/");
}

if (!defined("PHOTO_GALLERY_PLUS_ALBUMS_ORIGINAL_DIR")) {
   define("PHOTO_GALLERY_PLUS_ALBUMS_ORIGINAL_DIR", PHOTO_GALLERY_PLUS_MAIN_DIR . "albums-original-images/");
}
if (!defined("PHOTO_GALLERY_PLUS_USER_VIEWS_PATH")) {
   define("PHOTO_GALLERY_PLUS_USER_VIEWS_PATH", PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/");
}

if (!defined("PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL")) {
   define("PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL", plugin_dir_url(__FILE__));
}

if (!defined("PHOTO_GALLERY_PLUS_MAIN_URL")) {
   define("PHOTO_GALLERY_PLUS_MAIN_URL", content_url() . "/photo-gallery-plus/");
}

if (!defined("PHOTO_GALLERY_PLUS_ORIGINAL_URL")) {
   define("PHOTO_GALLERY_PLUS_ORIGINAL_URL", content_url() . "/photo-gallery-plus/original-images/");
}

if (!defined("PHOTO_GALLERY_PLUS_THUMBS_CROPPED_URL")) {
   define("PHOTO_GALLERY_PLUS_THUMBS_CROPPED_URL", content_url() . "/photo-gallery-plus/thumbs-cropped/");
}

if (!defined("PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_URL")) {
   define("PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_URL", content_url() . "/photo-gallery-plus/thumbs-non-cropped/");
}

if (!defined("the_wpgeeks_url")) {
   if (is_ssl()) {
      define("the_wpgeeks_url", "https://www.thewpgeeks.com");
   } else {
      define("the_wpgeeks_url", "http://www.thewpgeeks.com");
   }
}

if (!defined("wpgeeks_stats_url")) {
   define("wpgeeks_stats_url", "http://stats.tech-banker-services.org");
}
if (!defined("photo_gallery_plus_wizard_version_number")) {
   define("photo_gallery_plus_wizard_version_number", "1.0.3");
}

if (!is_dir(PHOTO_GALLERY_PLUS_MAIN_DIR)) {
   wp_mkdir_p(PHOTO_GALLERY_PLUS_MAIN_DIR);
}
if (!is_dir(PHOTO_GALLERY_PLUS_UPLOAD_DIR)) {
   wp_mkdir_p(PHOTO_GALLERY_PLUS_UPLOAD_DIR);
}
if (!is_dir(PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR)) {
   wp_mkdir_p(PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR);
}
if (!is_dir(PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR)) {
   wp_mkdir_p(PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR);
}
if (!is_dir(PHOTO_GALLERY_PLUS_ORIGINAL_DIR)) {
   wp_mkdir_p(PHOTO_GALLERY_PLUS_ORIGINAL_DIR);
}

$memory_limit_photo_gallery_plus = intval(ini_get("memory_limit"));
if (!extension_loaded('suhosin') && $memory_limit_photo_gallery_plus < 512) {
   @ini_set("memory_limit", "1024M");
}
@ini_set("max_execution_time", 6000);

/*
  Function Name: install_script_for_photo_gallery_plus
  Parameter: No
  Description: This function is used to include install script for photo gallery plus
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
function install_script_for_photo_gallery_plus() {
   global $wpdb;
   if (is_multisite()) {
      $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
      foreach ($blog_ids as $blog_id) {
         switch_to_blog($blog_id);
         $version = get_option("photo-gallery-plus-version-number");
         if ($version < "1.0") {
            if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/install-script.php")) {
               include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/install-script.php";
            }
         }
         restore_current_blog();
      }
   } else {
      $version = get_option("photo-gallery-plus-version-number");
      if ($version < "1.0") {
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/install-script.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/install-script.php";
         }
      }
   }
}
/*
  Function Name: photo_gallery_plus
  Parameter: no
  Description: This function is used for creating a parent table.
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
function photo_gallery_plus() {
   global $wpdb;
   return $wpdb->prefix . "photo_gallery_plus";
}
/*
  Function Name: photo_gallery_plus_meta
  Parameter: no
  Description: This function is used for creating a meta table.
  Created On: 01-06-2017 09:00
  Created By:The WP Geeks Team
 */
function photo_gallery_plus_meta() {
   global $wpdb;
   return $wpdb->prefix . "photo_gallery_plus_meta";
}
/*
  Function Name: check_user_roles_photo_gallery_plus
  Parameters: Yes($user)
  Description: This function is used for checking roles of different users.
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
function check_user_roles_photo_gallery_plus($user = null) {
   $user = $user ? new WP_User($user) : wp_get_current_user();
   return $user->roles ? $user->roles[0] : false;
}
/*
  Function Name: get_others_capabilities_photo_gallery_plus
  Parameters: No
  Description: This function is used to get all the roles available in WordPress
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
function get_others_capabilities_photo_gallery_plus() {
   $user_capabilities = array();
   if (function_exists("get_editable_roles")) {
      foreach (get_editable_roles() as $role_name => $role_info) {
         foreach ($role_info["capabilities"] as $capability => $values) {
            if (!in_array($capability, $user_capabilities)) {
               array_push($user_capabilities, $capability);
            }
         }
      }
   } else {
      $user_capabilities = array(
          "manage_options",
          "edit_plugins",
          "edit_posts",
          "publish_posts",
          "publish_pages",
          "edit_pages",
          "read"
      );
   }
   return $user_capabilities;
}
$version = get_option("photo-gallery-plus-version-number");
if ($version == "1.0") {

   if (is_admin()) {

      /*
        Function Name: backend_js_css_for_photo_gallery_plus
        Parameter: no
        Description:	This is used for calling a js and css backend function.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function backend_js_css_for_photo_gallery_plus($hook) {
         $pages_photo_gallery_plus = array(
             "pgp_wizard_photo_gallery_plus",
             "manage_photo_gallery_plus",
             "pgp_other_settings",
             "pgp_add_gallery",
             "pgp_sort_galleries",
             "pgp_manage_albums",
             "pgp_add_album",
             "pgp_sort_albums",
             "pgp_add_tag",
             "pgp_manage_tags",
             "pgp_thumbnail_layout",
             "pgp_masonry_layout",
             "pgp_slideshow_layout",
             "pgp_image_browser_layout",
             "pgp_justified_grid_layout",
             "pgp_blog_style_layout",
             "pgp_compact_album_layout",
             "pgp_extended_album_layout",
             "pgp_custom_css",
             "pgp_fancy_box",
             "pgp_color_box",
             "pgp_foo_box_free_edition",
             "pgp_nivo_lightbox",
             "pgp_lightcase",
             "pgp_global_options",
             "pgp_filter_settings",
             "pgp_lazy_load_settings",
             "pgp_search_box_settings",
             "pgp_order_by_settings",
             "pgp_page_navigation",
             "pgp_watermark_settings",
             "pgp_advertisement",
             "pgp_thumbnail_layout_shortcode",
             "pgp_masonry_layout_shortcode",
             "pgp_slideshow_layout_shortcode",
             "pgp_image_browser_layout_shortcode",
             "pgp_justified_grid_layout_shortcode",
             "pgp_blog_style_layout_shortcode",
             "pgp_roles_and_capabilities",
             "pgp_feature_requests",
             "pgp_system_information",
             "pgp_upgrade",
             "post"
         );
         $datatable_pages_photo_gallery_plus = array(
             "manage_photo_gallery_plus",
             "pgp_manage_albums",
             "pgp_add_gallery",
             "pgp_manage_tags",
             "pgp_roles_and_capabilities"
         );
         $layout_pages_photo_gallery_plus = array(
             "pgp_thumbnail_layout",
             "pgp_masonry_layout",
             "pgp_slideshow_layout",
             "pgp_image_browser_layout",
             "pgp_justified_grid_layout",
             "pgp_blog_style_layout",
             "pgp_compact_album_layout",
             "pgp_extended_album_layout",
             "pgp_custom_css",
             "pgp_fancy_box",
             "pgp_color_box",
             "pgp_foo_box_free_edition",
             "pgp_nivo_lightbox",
             "pgp_lightcase",
             "pgp_global_options",
             "pgp_filter_settings",
             "pgp_lazy_load_settings",
             "pgp_search_box_settings",
             "pgp_order_by_settings",
             "pgp_page_navigation",
             "pgp_watermark_settings",
             "pgp_advertisement"
         );
         if (strpos($hook, "post") !== false) {
            wp_enqueue_script("jquery");
            wp_enqueue_script("custom.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/js/custom.js");
            wp_enqueue_script("toastr.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.js");
            wp_enqueue_style("photo-gallery-plus-custom.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/photo-gallery-plus-custom.css");
            if (is_rtl()) {
               wp_enqueue_style("photo-gallery-plus-bootstrap.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom-rtl.css");
               wp_enqueue_style("the-wpgeeks-custom-rtl.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/the-wpgeeks-custom-rtl.css");
            } else {
               wp_enqueue_style("photo-gallery-plus-bootstrap.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom.css");
               wp_enqueue_style("the-wpgeeks-custom.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/the-wpgeeks-custom.css");
            }
            wp_enqueue_style("photo-gallery-plus-toastr.min.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.css");
         }
         if (isset($_REQUEST["page"])) {
            $page_url = $_REQUEST["page"];
            if (in_array($page_url, $pages_photo_gallery_plus)) {
               wp_enqueue_script("jquery");
               wp_enqueue_script("custom.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/js/custom.js");
               wp_enqueue_script("jquery.validate.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/validation/jquery.validate.js");
               wp_enqueue_script("toastr.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.js");
               wp_enqueue_style("simple-line-icons.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/icons/icons.css");
               wp_enqueue_style("components.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/css/components.css");
               wp_enqueue_style("photo-gallery-plus-custom.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/photo-gallery-plus-custom.css");
               wp_enqueue_style("photo-gallery-plus-premium-edition.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/premium-edition.css");
               if (is_rtl()) {
                  wp_enqueue_style("photo-gallery-plus-bootstrap.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom-rtl.css");
                  wp_enqueue_style("photo-gallery-plus-layout-rtl.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/layout-rtl.css");
                  wp_enqueue_style("the-wpgeeks-custom-rtl.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/the-wpgeeks-custom-rtl.css");
               } else {
                  wp_enqueue_style("photo-gallery-plus-bootstrap.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/css/custom.css");
                  wp_enqueue_style("photo-gallery-plus-layout.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/layout.css");
                  wp_enqueue_style("the-wpgeeks-custom.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/the-wpgeeks-custom.css");
               }
               wp_enqueue_script("jquery.clipboard.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/clipboard/clipboard.js");
               wp_enqueue_style("photo-gallery-plus-plugins.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/css/plugins.css");
               wp_enqueue_style("photo-gallery-plus-default.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/layout/css/themes/default.css");
               wp_enqueue_style("photo-gallery-plus-toastr.min.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/toastr/toastr.css");
               if (in_array($page_url, $datatable_pages_photo_gallery_plus)) {
                  wp_enqueue_script("jquery.datatables.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/datatables/media/js/jquery.datatables.js");
                  wp_enqueue_script("jquery.fngetfilterednodes.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/datatables/media/js/fngetfilterednodes.js");
                  wp_enqueue_style("photo-gallery-plus-datatables.foundation.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/datatables/media/css/datatables.foundation.css");
               }
               if (in_array($page_url, $layout_pages_photo_gallery_plus)) {
                  wp_enqueue_script("colpick.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/colorpicker/colpick.js");
                  wp_enqueue_style("colpick.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/colorpicker/colpick.css");
               }
               if ($page_url == "pgp_sort_galleries" || $page_url == "pgp_sort_albums") {
                  wp_enqueue_script("plupload.full.min.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/js/plupload.full.min.js", array("jquery-ui-draggable", "jquery-ui-sortable", "jquery-ui-dialog", "jquery-ui-widget"), false);
               }
            }
         }
         if (strpos($hook, "pgp_add_gallery") !== false) {
            wp_enqueue_script("plupload.full.min.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/js/plupload.full.min.js", array("jquery-ui-draggable", "jquery-ui-sortable", "jquery-ui-dialog", "jquery-ui-widget", "jquery-ui-progressbar"), false);
            wp_enqueue_script("jquery.ui.plupload.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/js/jquery.ui.plupload.js");
            wp_enqueue_style("jquery.ui.plupload.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/css/jquery.ui.plupload.css");
            wp_enqueue_style("jquery-ui.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/css/jquery-ui.css");
            wp_enqueue_script("bootstrap-hover-dropdown.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/custom/js/bootstrap-hover-dropdown.js");
            wp_enqueue_script("bootstrap-modal.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/modal/js/bootstrap-modal.js");
            wp_enqueue_script("bootstrap-modalmanager.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/modal/js/bootstrap-modalmanager.js");
            wp_enqueue_style("bootstrap-modal.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/modal/css/bootstrap-modal.css");
            wp_enqueue_style("bootstrap-modal-bs3patch.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/modal/css/bootstrap-modal-bs3patch.css");
         }
      }
      add_action("admin_enqueue_scripts", "backend_js_css_for_photo_gallery_plus");
   }

   /*
     Function Name: get_users_capabilities_photo_gallery_plus
     Parameters: No
     Description: This function is used to get users capabilities.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function get_users_capabilities_photo_gallery_plus() {
      global $wpdb;
      $capabilities = $wpdb->get_var
          (
          $wpdb->prepare
              (
              "SELECT meta_value FROM " . photo_gallery_plus_meta() . "
                                WHERE meta_key = %s", "roles_and_capabilities_settings"
          )
      );
      $core_roles = array(
          "manage_options",
          "edit_plugins",
          "edit_posts",
          "publish_posts",
          "publish_pages",
          "edit_pages"
      );
      $unserialized_capabilities = unserialize($capabilities);
      return isset($unserialized_capabilities["capabilities"]) ? $unserialized_capabilities["capabilities"] : $core_roles;
   }
   /*
     Function Name: sidebar_menu_for_photo_gallery_plus
     Parameter: no
     Description: This is used for calling a sidebar menu function.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function sidebar_menu_for_photo_gallery_plus() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_photo_gallery_plus();
      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
         include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
      }
      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/sidebar-menu.php")) {
         include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/sidebar-menu.php";
      }
   }
   /*
     Function Name: helper_file_for_photo_gallery_plus
     Parameter: no
     Description: This function is used to call helper file for photo gallery plus
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function helper_file_for_photo_gallery_plus() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_photo_gallery_plus();

      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/helper.php")) {
         include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/helper.php";
      }
   }
   /*
     Function Name: main_ajax_file_for_photo_gallery_plus
     Parameter: no
     Description: This function is used to register ajax for Photo gallery plus
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function main_ajax_file_for_photo_gallery_plus() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_photo_gallery_plus();
      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/action-library.php")) {
         include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/action-library.php";
      }
   }
   /*
     Function Name: top_bar_menu_for_photo_gallery_plus
     Parameter: no
     Description: This is used for calling a top bar menu function.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function top_bar_menu_for_photo_gallery_plus() {
      global $wpdb, $current_user, $wp_admin_bar;
      $user_role_permission = get_users_capabilities_photo_gallery_plus();
      $role_capabilities = $wpdb->get_var
          (
          $wpdb->prepare
              (
              "SELECT meta_value from " . photo_gallery_plus_meta() . "
                                            WHERE " . photo_gallery_plus_meta() . " . meta_key = %s", "roles_and_capabilities_settings"
          )
      );
      $role_capabilities_serialized = unserialize($role_capabilities);
      if ($role_capabilities_serialized["show_photo_gallery_plus_top_bar_menu"] == "enable") {
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/admin-bar-menu.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/admin-bar-menu.php";
         }
      }
   }
   /*
     Function Name: plugin_load_textdomain_photo_gallery_plus
     Parameters: No
     Description: This function is used to load languages.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function plugin_load_textdomain_photo_gallery_plus() {
      if (function_exists("load_plugin_textdomain")) {
         load_plugin_textdomain("photo-gallery-plus", false, PHOTO_GALLERY_PLUS_PLUGIN_DIRNAME . "/languages");
      }
   }
   /*
     Function Name: admin_functions_photo_gallery_plus
     Parameter: no
     Description: This function used for calling admin function fired on admin_init hook.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function admin_functions_photo_gallery_plus() {
      helper_file_for_photo_gallery_plus();
   }
   /*
     Function Name: photo_gallery_plus_UrlEncode
     Argument:yes ($string)
     Description: decode url symbols into original form.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function photo_gallery_plus_UrlEncode($string) {
      $entities = array("%21", "%2A", "%27", "%28", "%29", "%3B", "%3A", "%40", "%26", "%3D", "%2B", "%24", "%2C", "%2F", "%3F", "%25", "%23", "%5B", "%5D");
      $replacements = array("!", "*", "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
      return str_replace($entities, $replacements, urlencode($string));
   }
   /*
     Function Name: upload_ajax_file_for_photo_gallery_plus
     Parameter: no
     Description: This function is used to register ajax for Photo Gallery plus
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function upload_ajax_file_for_photo_gallery_plus() {
      global $wpdb, $current_user;
      $user_role_permission = get_users_capabilities_photo_gallery_plus();
      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/upload.php")) {
         include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "lib/upload.php";
      }
   }
   /*
     Function Name: extract_short_code_for_photo_gallery_plus
     Parameter: Yes
     Description: It is used for a extracting shortcode for photo galery plus.
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */
   function extract_short_code_for_photo_gallery_plus($layout_type, $source_type, $id, $album_type, $sort_images_by, $album_title, $album_description, $order_images_by, $alignment, $lightbox_type, $columns, $filters, $lazy_load, $search_box, $order_by, $page_navigation, $images_per_page, $gallery_title, $gallery_description, $thumbnail_title, $thumbnail_description, $animation_effects, $special_effects, $auto_play, $time_interval, $next_previous_button, $play_pause_button, $slideshow_width, $control_buttons, $buttons_type, $slideshow_filmstrips, $image_browser_height, $image_browser_width, $blog_image_width, $row_height) {
      ob_start();

      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/structure.php")) {
         require PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/structure.php";
      }
      $photo_gallery_plus_output_album = ob_get_clean();
      wp_reset_query();
      return $photo_gallery_plus_output_album;
   }
   /*
     Function Name: photo_gallery_plus_shortcode
     Parameter: Yes
     Description: It is used for a creating shortcode gor photo galery plus.
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */
   function photo_gallery_plus_shortcode($atts) {
      extract(shortcode_atts(array(
          "layout_type" => "",
          "source_type" => "",
          "id" => "",
          "album_type" => "",
          "sort_images_by" => "",
          "album_title" => "",
          "album_description" => "",
          "order_images_by" => "",
          "alignment" => "",
          "lightbox_type" => "",
          "columns" => "",
          "filters" => "",
          "lazy_load" => "",
          "search_box" => "",
          "order_by" => "",
          "page_navigation" => "",
          "images_per_page" => "",
          "gallery_title" => "",
          "gallery_description" => "",
          "thumbnail_title" => "",
          "thumbnail_description" => "",
          "animation_effects" => "",
          "special_effects" => "",
          "auto_play" => "",
          "time_interval" => "",
          "next_previous_button" => "",
          "play_pause_button" => "",
          "slideshow_width" => "",
          "control_buttons" => "",
          "buttons_type" => "",
          "slideshow_filmstrips" => "",
          "image_browser_height" => "",
          "image_browser_width" => "",
          "blog_image_width" => "",
          "row_height" => "",
              ), $atts));
      if (!is_feed()) {
         return extract_short_code_for_photo_gallery_plus($layout_type, $source_type, $id, $album_type, $sort_images_by, $album_title, $album_description, $order_images_by, $alignment, $lightbox_type, $columns, $filters, $lazy_load, $search_box, $order_by, $page_navigation, $images_per_page, $gallery_title, $gallery_description, $thumbnail_title, $thumbnail_description, $animation_effects, $special_effects, $auto_play, $time_interval, $next_previous_button, $play_pause_button, $slideshow_width, $control_buttons, $buttons_type, $slideshow_filmstrips, $image_browser_height, $image_browser_width, $blog_image_width, $row_height);
      }
   }
   /*
     Function Name: helper_file_for_photo_gallery_plus_frontend
     Parameter: no
     Description: This function is used to call helper file for photo gallery plus frontend
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function helper_file_for_photo_gallery_plus_frontend() {
      global $wpdb;
      if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/lib/helper.php")) {
         include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/lib/helper.php";
      }
   }
   /*
     Function Name: user_functions_photo_gallery_plus
     Parameter: No
     Description: This function is used to call user_functions_photo_gallery_plus
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   function user_functions_photo_gallery_plus() {
      helper_file_for_photo_gallery_plus_frontend();
      plugin_load_textdomain_photo_gallery_plus();
   }
   /*
     Function Name: add_photo_gallery_plus_shortcode_button
     Parameter: No
     Description: This function is used to create the button in pages and posts.
     Created On: 05-06-2017 10:29
     Created By: The WP Geeks Team
    */
   function add_photo_gallery_plus_shortcode_button() {
      echo '<a href="admin.php?page=pgp_thumbnail_layout_shortcode" target="_blank" id="insert-photo-gallery-plus-shortcode" class="button" >' . '<img style="width:16px; height:16px; vertical-align:middle; margin-right:3px; margin-top:5px; float:left;" src=' . PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/img/icon.png" . '>' . __("Add Photo Gallery Plus Shortcode", "photo-gallery-plus") . '</a>';
   }
   /*
     Function Name: photo_gallery_plus_action_links
     Parameters: Yes
     Description: This function is used to create link for Pro Editions.
     Created On: 12-06-2017 17:35
     Created By: The WP Geeks Team
    */
   function photo_gallery_plus_action_links($plugin_link) {
      $plugin_link[] = "<a href=" . the_wpgeeks_url . " style=\"color: red; font-weight: bold;\" target=\"_blank\">Go Pro!</a>";
      return $plugin_link;
   }
   /*
     Class Name: photo_gallery_plus_widget
     Parameter: No
     Description: This class is used to add widget.
     Created On: 05-06-2017 11:14
     Created By: The WP Geeks Team
    */
   class photo_gallery_plus_widget extends WP_Widget {
      function __construct() {
         parent::__construct(
             "photo_gallery_plus_widget", __("Photo Gallery Plus", "photo-gallery-plus"), array("description" => __("Display Photo Gallery Plus", "photo-gallery-plus"),)
         );
      }
      /*
        Function Name: form
        Parameters: Yes($instance)
        Description: This function is used to add widget form.
        Created On: 05-06-2017 11:14
        Created By: The WP Geeks Team
       */
      public function form($instance) {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/widget-form.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/widget-form.php";
         }
      }
      /*
        Function Name: widget
        Parameters: Yes($args, $instance)
        Description: This function is used to display widget.
        Created On: 05-06-2017 11:14
        Created By: The WP Geeks Team
       */
      public function widget($args, $instance) {
         extract($args, EXTR_SKIP);
         echo $before_widget;
         $shortcode_data = empty($instance["shortcode"]) ? " " : apply_filters("widget_photo_gallery_plus_shortcode", $instance["shortcode"]);
         if (!empty($shortcode_data)) {
            $shortcode = $shortcode_data;
         }
         echo do_shortcode($shortcode);
         echo $after_widget;
      }
      /*
        Function Name: update
        Parameters: Yes($new_instance, $old_instance)
        Description: This function is used to update widget.
        Created On: 05-06-2017 11:14
        Created By: The WP Geeks Team
       */
      public function update($new_instance, $old_instance) {
         $instance = $old_instance;
         $instance["shortcode"] = $new_instance["ux_txt_photo_gallery_plus_shortcode"];
         return $instance;
      }
   }
   /*
     Function Name: deactivation_function_for_photo_gallery_plus
     Parameters: No
     Description: This function is used for executing the code on deactivation.
     Created On: 13-06-2017 11:00
     Created by: The WP Geeks Team
    */
   function deactivation_function_for_photo_gallery_plus() {
      $type = get_option("photo-gallery-plus-wizard-set-up");
      if ($type == "opt_in") {
         $plugin_info_photo_gallery_plus = new plugin_info_photo_gallery_plus();
         global $wp_version, $wpdb;
         $url = wpgeeks_stats_url . "/wp-admin/admin-ajax.php";
         $theme_details = array();

         if ($wp_version >= 3.4) {
            $active_theme = wp_get_theme();
            $theme_details["theme_name"] = strip_tags($active_theme->Name);
            $theme_details["theme_version"] = strip_tags($active_theme->Version);
            $theme_details["author_url"] = strip_tags($active_theme->{"Author URI"});
         }

         $plugin_stat_data = array();
         $plugin_stat_data["plugin_slug"] = "photo-gallery-plus";
         $plugin_stat_data["type"] = "standard_edition";
         $plugin_stat_data["version_number"] = photo_gallery_plus_wizard_version_number;
         $plugin_stat_data["status"] = $type;
         $plugin_stat_data["event"] = "de-activate";
         $plugin_stat_data["domain_url"] = site_url();
         $plugin_stat_data["wp_language"] = defined("WPLANG") && WPLANG ? WPLANG : get_locale();
         $plugin_stat_data["email"] = get_option("admin_email");
         $plugin_stat_data["wp_version"] = $wp_version;
         $plugin_stat_data["php_version"] = esc_html(phpversion());
         $plugin_stat_data["mysql_version"] = $wpdb->db_version();
         $plugin_stat_data["max_input_vars"] = ini_get("max_input_vars");
         $plugin_stat_data["operating_system"] = PHP_OS . "  (" . PHP_INT_SIZE * 8 . ") BIT";
         $plugin_stat_data["php_memory_limit"] = ini_get("memory_limit") ? ini_get("memory_limit") : "N/A";
         $plugin_stat_data["extensions"] = get_loaded_extensions();
         $plugin_stat_data["plugins"] = $plugin_info_photo_gallery_plus->get_plugin_info_photo_gallery_plus();
         $plugin_stat_data["themes"] = $theme_details;

         $response = wp_safe_remote_post($url, array
             (
             "method" => "POST",
             "timeout" => 45,
             "redirection" => 5,
             "httpversion" => "1.0",
             "blocking" => true,
             "headers" => array(),
             "body" => array("data" => serialize($plugin_stat_data), "site_id" => get_option("pgp_wpgeeks_site_id") != "" ? get_option("pgp_wpgeeks_site_id") : "", "action" => "plugin_analysis_data")
         ));
         if (!is_wp_error($response)) {
            $response["body"] != "" ? update_option("pgp_wpgeeks_site_id", $response["body"]) : "";
         }
      }
   }
   //Hooks

   /* add_action for admin_functions_photo_gallery_plus
     Description: This hook is used for calling all the Backend Functions
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */

   add_action("admin_init", "admin_functions_photo_gallery_plus");

   /* add_action for main_ajax_file_for_photo_gallery_plus
     Description: This hook is used for calling backend ajax function
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */

   add_action("wp_ajax_photo_gallery_plus_action_module", "main_ajax_file_for_photo_gallery_plus");

   /* add_action for upload_ajax_file_for_photo_gallery_plus
     Description: This hook is used for calling upload ajax function
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */

   add_action("wp_ajax_photo_gallery_plus_image_upload", "upload_ajax_file_for_photo_gallery_plus");

   /* add_action
     Description: This hook is used for calling a function of sidebar menu
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   add_action("admin_menu", "sidebar_menu_for_photo_gallery_plus");
   add_action("network_admin_menu", "sidebar_menu_for_photo_gallery_plus");

   /* add_action
     Description: This hook is used for calling a function of top bar menu.
     Created On: 01-06-2017 09:00
     Created By: The WP Geeks Team
    */
   add_action("admin_bar_menu", "top_bar_menu_for_photo_gallery_plus", 100);

   /*
     add_action for user_functions_photo_gallery_plus
     Description: This hook is used for calling all the frontend Functions
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */
   add_action("init", "user_functions_photo_gallery_plus");

   /* add_filter create Go Pro link for Photo Gallery Plus
     Description: This hook is used for create link for premium Editions.
     Created On: 17-06-2017 17:38
     Created by: The WP Geeks Team
    */
   add_filter("plugin_action_links_" . plugin_basename(__FILE__), "photo_gallery_plus_action_links");

   /*
     add_shortcode
     Description: function for shortcode.
     Created On: 01-06-2017 09:00
     Created by: The WP Geeks Team
    */
   add_shortcode("photo_gallery_plus", "photo_gallery_plus_shortcode");

   /*
     add_action for add_photo_gallery_plus_shortcode_button
     Description: This hook is used for add Photo gallery plus button.
     Created On: 05-06-2017 10:29
     Created by: The WP Geeks Team
    */

   add_action("media_buttons", "add_photo_gallery_plus_shortcode_button");

   /*
     add_action for MapWidget class
     Description: This hook is used for initiate Widget
     Created On: 05-06-2017 10:29
     Created by: The WP Geeks Team
    */

   add_action("widgets_init", create_function("", "return register_widget(\"photo_gallery_plus_widget\");"));

   /*
     add_action for Widget.
     Description: This hook is used for apply the shortcode for Widget.
     Created On: 05-06-2017 10:29
     Created by: The WP Geeks Team
    */

   add_filter("widget_text", "do_shortcode");
}
// Hooks

/* register_activation_hook
  Description: This hook is used to call install script
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
register_activation_hook(__FILE__, "install_script_for_photo_gallery_plus");

/*
  add_action for install_script_for_photo_gallery_plus
  Description: This hook is used for calling the function of install script.
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */

add_action("admin_init", "install_script_for_photo_gallery_plus");

/*
  Class Name: plugin_activate_photo_gallery_plus
  Description: This function is used to add option on plugin activation.
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
function plugin_activate_photo_gallery_plus() {
   add_option("photo_gallery_plus_do_activation_redirect", true);
}
/*
  Class Name: photo_gallery_plus_redirect
  Description: This function is used to redirect to manage maps menu.
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */
function photo_gallery_plus_redirect() {
   if (get_option('photo_gallery_plus_do_activation_redirect', false)) {
      delete_option("photo_gallery_plus_do_activation_redirect");
      wp_redirect(admin_url("admin.php?page=manage_photo_gallery_plus"));
      exit;
   }
}
/* deactivation_function_for_photo_gallery_plus
  Description: This hook is used to sets the deactivation hook for a plugin.
  Created On: 13-06-2017 11:08
  Created by: The WP Geeks Team
 */

register_deactivation_hook(__FILE__, "deactivation_function_for_photo_gallery_plus");
/*

  /*
  plugin_activate_photo_gallery_plus
  Description: This Hook is used for redirecting to main menu after activation.
  Created On: 01-06-2017 09:00
  Created By: The WP Geeks Team
 */

register_activation_hook(__FILE__, "plugin_activate_photo_gallery_plus");
add_action("admin_init", "photo_gallery_plus_redirect");
