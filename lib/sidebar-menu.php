<?php
/**
 * This file is used for sidebar menus.
 *
 * @author   The WP Geeks
 * @package  photo-gallery-plus/lib
 * @version  1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
if (!is_user_logged_in()) {
   return;
} else {
   $access_granted = false;
   foreach ($user_role_permission as $permission) {
      if (current_user_can($permission)) {
         $access_granted = true;
         break;
      }
   }
   if (!$access_granted) {
      return;
   } else {
      $flag = 0;

      $role_capabilities = $wpdb->get_var
          (
          $wpdb->prepare
              (
              "SELECT meta_value from " . photo_gallery_plus_meta() . "
				WHERE " . photo_gallery_plus_meta() . " . meta_key = %s", "roles_and_capabilities_settings"
          )
      );
      $roles_and_capabilities_unserialized = maybe_unserialize($role_capabilities);
      $capabilities = explode(",", isset($roles_and_capabilities_unserialized["roles_and_capabilities"]) ? esc_attr($roles_and_capabilities_unserialized["roles_and_capabilities"]) : "1,1,1,0,0,0");
      if (is_super_admin()) {
         $pgp_role = "administrator";
      } else {
         $pgp_role = check_user_roles_photo_gallery_plus($current_user);
      }
      switch ($pgp_role) {
         case "administrator":
            $privileges = "administrator_privileges";
            $flag = $capabilities[0];
            break;

         case "author":
            $privileges = "author_privileges";
            $flag = $capabilities[1];
            break;

         case "editor":
            $privileges = "editor_privileges";
            $flag = $capabilities[2];
            break;

         case "contributor":
            $privileges = "contributor_privileges";
            $flag = $capabilities[3];
            break;

         case "subscriber":
            $privileges = "subscriber_privileges";
            $flag = $capabilities[4];
            break;

         default:
            $privileges = "other_privileges";
            $flag = $capabilities[5];
      }
      $privileges_value = "0,0,0,0,0,0,0,0,0,0,0,0";
      foreach ($roles_and_capabilities_unserialized as $key => $value) {
         if ($privileges == $key) {
            $privileges_value = $value;
            break;
         }
      }
      $full_control = explode(",", $privileges_value);
      if (!defined("full_control")) {
         define("full_control", "$full_control[0]");
      }
      if (!defined("galleries_photo_gallery_plus")) {
         define("galleries_photo_gallery_plus", "$full_control[1]");
      }
      if (!defined("albums_photo_gallery_plus")) {
         define("albums_photo_gallery_plus", "$full_control[2]");
      }
      if (!defined("tags_photo_gallery_plus")) {
         define("tags_photo_gallery_plus", "$full_control[3]");
      }
      if (!defined("layout_settings_photo_gallery_plus")) {
         define("layout_settings_photo_gallery_plus", "$full_control[4]");
      }
      if (!defined("lightboxes_photo_gallery_plus")) {
         define("lightboxes_photo_gallery_plus", "$full_control[5]");
      }
      if (!defined("general_settings_photo_gallery_plus")) {
         define("general_settings_photo_gallery_plus", "$full_control[6]");
      }
      if (!defined("shortcode_generator_photo_gallery_plus")) {
         define("shortcode_generator_photo_gallery_plus", "$full_control[7]");
      }
      if (!defined("other_settings_photo_gallery_plus")) {
         define("other_settings_photo_gallery_plus", "$full_control[8]");
      }
      if (!defined("roles_and_capabilities_photo_gallery_plus")) {
         define("roles_and_capabilities_photo_gallery_plus", "$full_control[9]");
      }
      if (!defined("system_information_photo_gallery_plus")) {
         define("system_information_photo_gallery_plus", "$full_control[10]");
      }
      $check_photo_gallery_plus_wizard = get_option("photo-gallery-plus-wizard-set-up");
      if ($flag == "1") {
         $icon = PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/img/icon.png";
         if ($check_photo_gallery_plus_wizard) {
            add_menu_page($photo_gallery_plus, $photo_gallery_plus, "read", "manage_photo_gallery_plus", "", $icon);
         } else {
            add_menu_page($photo_gallery_plus, $photo_gallery_plus, "read", "pgp_wizard_photo_gallery_plus", "", plugins_url("assets/global/img/icon.png", dirName(__FILE__)));
            add_submenu_page($photo_gallery_plus, $photo_gallery_plus, "", "read", "pgp_wizard_photo_gallery_plus", "pgp_wizard_photo_gallery_plus");
         }
         add_submenu_page("manage_photo_gallery_plus", $pgp_galleries, $pgp_galleries, "read", "manage_photo_gallery_plus", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "manage_photo_gallery_plus");
         add_submenu_page("manage_photo_gallery_plus", $pgp_albums, $pgp_albums, "read", "pgp_manage_albums", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_manage_albums");
         add_submenu_page("manage_photo_gallery_plus", $pgp_tags, $pgp_tags, "read", "pgp_manage_tags", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_manage_tags");
         add_submenu_page("manage_photo_gallery_plus", $pgp_layout_settings, $pgp_layout_settings, "read", "pgp_thumbnail_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_thumbnail_layout");
         add_submenu_page("manage_photo_gallery_plus", $pgp_lightboxes, $pgp_lightboxes, "read", "pgp_lightcase", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_lightcase");
         add_submenu_page("manage_photo_gallery_plus", $pgp_general_settings, $pgp_general_settings, "read", "pgp_global_options", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_global_options");
         add_submenu_page("manage_photo_gallery_plus", $pgp_shortcode_generator, $pgp_shortcode_generator, "read", "pgp_thumbnail_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_thumbnail_layout_shortcode");
         add_submenu_page("manage_photo_gallery_plus", $pgp_other_setting, $pgp_other_setting, "read", "pgp_other_settings", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_other_settings");
         add_submenu_page("manage_photo_gallery_plus", $pgp_roles_and_capabilities, $pgp_roles_and_capabilities, "read", "pgp_roles_and_capabilities", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_roles_and_capabilities");
         add_submenu_page("manage_photo_gallery_plus", $pgp_feature_requests, $pgp_feature_requests, "read", "pgp_feature_requests", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_feature_requests");
         add_submenu_page("manage_photo_gallery_plus", $pgp_system_information, $pgp_system_information, "read", "pgp_system_information", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_system_information");
         add_submenu_page("manage_photo_gallery_plus", $pgp_upgrade, $pgp_upgrade, "read", "pgp_upgrade", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_upgrade");

         add_submenu_page($pgp_galleries, $pgp_add_gallery, "", "read", "pgp_add_gallery", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_add_gallery");
         add_submenu_page($pgp_galleries, $pgp_sort_galleries, "", "read", "pgp_sort_galleries", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_sort_galleries");

         add_submenu_page($pgp_albums, $pgp_add_album, "", "read", "pgp_add_album", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_add_album");
         add_submenu_page($pgp_albums, $pgp_sort_albums, "", "read", "pgp_sort_albums", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_sort_albums");

         add_submenu_page($pgp_tags, $pgp_add_tag, "", "read", "pgp_add_tag", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_add_tag");
         add_submenu_page($pgp_tags, $pgp_manage_tags, "", "read", "pgp_manage_tags", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_manage_tags");

         add_submenu_page($pgp_layout_settings, $pgp_thumbnail_layout, "", "read", "pgp_thumbnail_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_thumbnail_layout");
         add_submenu_page($pgp_layout_settings, $pgp_masonry_layout, "", "read", "pgp_masonry_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_masonry_layout");
         add_submenu_page($pgp_layout_settings, $pgp_slideshow_layout, "", "read", "pgp_slideshow_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_slideshow_layout");
         add_submenu_page($pgp_layout_settings, $pgp_image_browser_layout, "", "read", "pgp_image_browser_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_image_browser_layout");
         add_submenu_page($pgp_layout_settings, $pgp_justified_grid_layout, "", "read", "pgp_justified_grid_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_justified_grid_layout");
         add_submenu_page($pgp_layout_settings, $pgp_blog_style_layout, "", "read", "pgp_blog_style_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_blog_style_layout");
         add_submenu_page($pgp_layout_settings, $pgp_compact_album_layout, "", "read", "pgp_compact_album_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_compact_album_layout");
         add_submenu_page($pgp_layout_settings, $pgp_extended_album_layout, "", "read", "pgp_extended_album_layout", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_extended_album_layout");
         add_submenu_page($pgp_layout_settings, $pgp_custom_css, "", "read", "pgp_custom_css", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_custom_css");

         add_submenu_page($pgp_lightboxes, $pgp_fancy_box, "", "read", "pgp_fancy_box", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_fancy_box");
         add_submenu_page($pgp_lightboxes, $pgp_color_box, "", "read", "pgp_color_box", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_color_box");
         add_submenu_page($pgp_lightboxes, $pgp_foo_box_free_edition, "", "read", "pgp_foo_box_free_edition", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_foo_box_free_edition");
         add_submenu_page($pgp_lightboxes, $pgp_nivo_lightbox, "", "read", "pgp_nivo_lightbox", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_nivo_lightbox");
         add_submenu_page($pgp_lightboxes, $pgp_lightcase, "", "read", "pgp_lightcase", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_lightcase");

         add_submenu_page($pgp_general_settings, $pgp_global_options, "", "read", "pgp_global_options", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_global_options");
         add_submenu_page($pgp_general_settings, $pgp_lazy_load_settings, "", "read", "pgp_lazy_load_settings", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_lazy_load_settings");
         add_submenu_page($pgp_general_settings, $pgp_filter_settings, "", "read", "pgp_filter_settings", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_filter_settings");
         add_submenu_page($pgp_general_settings, $pgp_order_by_settings, "", "read", "pgp_order_by_settings", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_order_by_settings");
         add_submenu_page($pgp_general_settings, $pgp_search_box_settings, "", "read", "pgp_search_box_settings", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_search_box_settings");
         add_submenu_page($pgp_general_settings, $pgp_page_navigation, "", "read", "pgp_page_navigation", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_page_navigation");
         add_submenu_page($pgp_general_settings, $pgp_watermark_settings, "", "read", "pgp_watermark_settings", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_watermark_settings");
         add_submenu_page($pgp_general_settings, $pgp_advertisement, "", "read", "pgp_advertisement", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_advertisement");

         add_submenu_page($pgp_shortcode_generator, $pgp_thumbnail_layout, "", "read", "pgp_thumbnail_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_thumbnail_layout_shortcode");
         add_submenu_page($pgp_shortcode_generator, $pgp_masonry_layout, "", "read", "pgp_masonry_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_masonry_layout_shortcode");
         add_submenu_page($pgp_shortcode_generator, $pgp_slideshow_layout, "", "read", "pgp_slideshow_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_slideshow_layout_shortcode");
         add_submenu_page($pgp_shortcode_generator, $pgp_image_browser_layout, "", "read", "pgp_image_browser_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_image_browser_layout_shortcode");
         add_submenu_page($pgp_shortcode_generator, $pgp_justified_grid_layout, "", "read", "pgp_justified_grid_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_justified_grid_layout_shortcode");
         add_submenu_page($pgp_shortcode_generator, $pgp_blog_style_layout, "", "read", "pgp_blog_style_layout_shortcode", $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : "pgp_blog_style_layout_shortcode");
      }

      /*
        Function Name: pgp_wizard_photo_gallery_plus
        Parameters: No
        Description: This function is used for creating pgp_wizard_photo_gallery_plus menu.
        Created On: 13-04-2017 10:22
        Created By: TThe WP Geeks Team
       */
      function pgp_wizard_photo_gallery_plus() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/wizard/wizard.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/wizard/wizard.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: photo_gallery_plus
        Parameter: No
        Description: This function is used for manage-galleries menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function manage_photo_gallery_plus() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/galleries/manage-galleries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/galleries/manage-galleries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_add_gallery
        Parameter: No
        Description: This function is used for add-gallery menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_add_gallery() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/galleries/add-gallery.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/galleries/add-gallery.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_sort_galleries
        Parameter: No
        Description: This function is used for sort-galleries menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_sort_galleries() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/galleries/sort-galleries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/galleries/sort-galleries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_manage_albums
        Parameter: No
        Description: This function is used for manage-albums menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_manage_albums() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/albums/manage-albums.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/albums/manage-albums.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_add_album
        Parameter: No
        Description: This function is used for add-album menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_add_album() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/albums/add-album.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/albums/add-album.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_sort_albums
        Parameter: No
        Description: This function is used for sort-album menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_sort_albums() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/albums/sort-albums.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/albums/sort-albums.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_add_tag
        Parameter: No
        Description: This function is used for add-tag menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_add_tag() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/tags/add-tag.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/tags/add-tag.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_manage_tags
        Parameter: No
        Description: This function is used for manage-tags menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_manage_tags() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/tags/manage-tags.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/tags/manage-tags.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_thumbnail_layout
        Parameter: No
        Description: This function is used for thumbnail-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_thumbnail_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }

         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/thumbnail-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/thumbnail-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_masonry_layout
        Parameter: No
        Description: This function is used for masonry-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_masonry_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/masonry-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/masonry-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_slideshow_layout
        Parameter: No
        Description: This function is used for slideshow-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_slideshow_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/slideshow-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/slideshow-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_image_browser_layout
        Parameter: No
        Description: This function is used for image-browser-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_image_browser_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/image-browser-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/image-browser-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_justified_grid_layout
        Parameter: No
        Description: This function is used for justified-grid-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_justified_grid_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/justified-grid-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/justified-grid-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_blog_style_layout
        Parameter: No
        Description: This function is used for blog-style-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_blog_style_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/blog-style-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/blog-style-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_compact_album_layout
        Parameter: No
        Description: This function is used for blog-style-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_compact_album_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/compact-album-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/compact-album-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_extended_album_layout
        Parameter: No
        Description: This function is used for blog-style-layout menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_extended_album_layout() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/extended-album-layout.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/extended-album-layout.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_custom_css
        Parameter: No
        Description: This function is used for custom css menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_custom_css() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/custom-css.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/layout-settings/custom-css.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_fancy_box
        Parameter: No
        Description: This function is used for fancy-box menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_fancy_box() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/fancy-box.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/fancy-box.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_color_box
        Parameter: No
        Description: This function is used for color-box menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_color_box() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/color-box.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/color-box.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_foo_box_free_edition
        Parameter: No
        Description: This function is used for foo-box-free-edition menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_foo_box_free_edition() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/foo-box-free-edition.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/foo-box-free-edition.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_nivo_lightbox
        Parameter: No
        Description: This function is used for lightbox menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_nivo_lightbox() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/nivo-lightbox.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/nivo-lightbox.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_lightcase
        Parameter: No
        Description: This function is used for lightbox menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_lightcase() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/lightcase.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/lightboxes/lightcase.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_global_options
        Parameter: No
        Description: This function is used for global-options menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_global_options() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/global-options.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/global-options.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_filter_settings
        Parameter: No
        Description: This function is used for filter_settings menu.
        Created On: 07-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_filter_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/filters-settings.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/filters-settings.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_lazy_load_settings
        Parameter: No
        Description: This function is used for lazy_load_settings menu.
        Created On: 07-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_lazy_load_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/lazy-load-settings.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/lazy-load-settings.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_search_box_settings
        Parameter: No
        Description: This function is used for search_box_settings menu.
        Created On: 07-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_search_box_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/search-box-settings.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/search-box-settings.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_order_by_settings
        Parameter: No
        Description: This function is used for order_by_settings menu.
        Created On: 07-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_order_by_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/order-by-settings.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/order-by-settings.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_page_navigation
        Parameter: No
        Description: This function is used for page-navigation menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_page_navigation() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/page-navigation.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/page-navigation.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_watermark_settings
        Parameter: No
        Description: This function is used for watermark-settings menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_watermark_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/watermark-settings.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/watermark-settings.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_advertisement
        Parameter: No
        Description: This function is used for advertisment menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_advertisement() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/advertisement.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/general-settings/advertisement.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_other_settings
        Parameter: No
        Description: This function is used for other-settings menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_other_settings() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/other-settings/other-settings.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/other-settings/other-settings.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_roles_and_capabilities
        Parameter: No
        Description: This function is used for roles-and-capabilities menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_roles_and_capabilities() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/roles-and-capabilities/roles-and-capabilities.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/roles-and-capabilities/roles-and-capabilities.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_thumbnail_layout_shortcode
        Parameter: No
        Description: This unction is used for thumbnail-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_thumbnail_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/thumbnail-layout-shortcode.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/thumbnail-layout-shortcode.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_masonry_layout_shortcode
        Parameter: No
        Description:This function is used for masonry-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_masonry_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/masonry-layout-shortcode.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/masonry-layout-shortcode.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_slideshow_layout_shortcode
        Parameter: No
        Description: This function is used for slideshow-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_slideshow_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/slideshow-layout-shortcode.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/slideshow-layout-shortcode.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_image_browser_layout_shortcode
        Parameter: No
        Description: This function is used for image-browser-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_image_browser_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/image-browser-layout-shortcode.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/image-browser-layout-shortcode.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_justified_grid_layout_shortcode
        Parameter: No
        Description:This function is used for justified-grid-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_justified_grid_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/justified-grid-layout-shortcode.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/justified-grid-layout-shortcode.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_blog_style_layout_shortcode
        Parameter: No
        Description: This function is used for blog-style-layout-shortcode menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_blog_style_layout_shortcode() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/blog-style-layout-shortcode.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/shortcodes/blog-style-layout-shortcode.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_feature_requests
        Parameter: No
        Description: This function is used for feature-requests menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_feature_requests() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/feature-requests/feature-requests.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/feature-requests/feature-requests.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_system_information
        Parameter: No
        Description: This function is used for system-information menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_system_information() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/system-information/system-information.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/system-information/system-information.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
      /*
        Function Name: pgp_upgrade
        Parameter: No
        Description: This function is used for system-information menu.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      function pgp_upgrade() {
         global $wpdb;
         $user_role_permission = get_users_capabilities_photo_gallery_plus();
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php")) {
            include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/translations.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/header.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/sidebar.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/queries.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/premium-editions/premium-editions.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "views/premium-editions/premium-editions.php";
         }
         if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php")) {
            include_once PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/footer.php";
         }
      }
   }
}