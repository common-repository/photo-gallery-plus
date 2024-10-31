<?php
/*
 * This file is used for displaying admin bar menus.
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
            $flag = $capabilities[0];
            break;

         case "author":
            $flag = $capabilities[1];
            break;

         case "editor":
            $flag = $capabilities[2];
            break;

         case "contributor":
            $flag = $capabilities[3];
            break;

         case "subscriber":
            $flag = $capabilities[4];
            break;
      }

      if ($flag == "1") {
         $wp_admin_bar->add_menu(array
             (
             "id" => "photo_gallery_plus",
             "title" => "<img style=\"width:16px; height:16px; vertical-align:middle; margin-right:3px;\" src=" . PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/img/icon.png" . "> " . $photo_gallery_plus,
             "href" => admin_url("admin.php?page=manage_photo_gallery_plus"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_galleries",
             "title" => $pgp_galleries,
             "href" => admin_url("admin.php?page=manage_photo_gallery_plus"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_albums",
             "title" => $pgp_albums,
             "href" => admin_url("admin.php?page=pgp_manage_albums"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_tags",
             "title" => $pgp_tags,
             "href" => admin_url("admin.php?page=pgp_manage_tags"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_layout_settings",
             "title" => $pgp_layout_settings,
             "href" => admin_url("admin.php?page=pgp_thumbnail_layout"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_lightboxes",
             "title" => $pgp_lightboxes,
             "href" => admin_url("admin.php?page=pgp_lightcase"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_general_settings",
             "title" => $pgp_general_settings,
             "href" => admin_url("admin.php?page=pgp_global_options"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_shortcode_generator",
             "title" => $pgp_shortcode_generator,
             "href" => admin_url("admin.php?page=pgp_thumbnail_layout_shortcode"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_other_settings",
             "title" => $pgp_other_setting,
             "href" => admin_url("admin.php?page=pgp_other_settings"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_roles_and_capabilities",
             "title" => $pgp_roles_and_capabilities,
             "href" => admin_url("admin.php?page=pgp_roles_and_capabilities"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_feature_requests",
             "title" => $pgp_feature_requests,
             "href" => admin_url("admin.php?page=pgp_feature_requests"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_system_information",
             "title" => $pgp_system_information,
             "href" => admin_url("admin.php?page=pgp_system_information"),
         ));

         $wp_admin_bar->add_menu(array
             (
             "parent" => "photo_gallery_plus",
             "id" => "pgp_upgrade",
             "title" => $pgp_upgrade,
             "href" => admin_url("admin.php?page=pgp_upgrade"),
         ));
      }
   }
}