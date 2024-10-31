<?php
/*
 * This file is used to drop tables.
 *
 * @author   The WP Geeks
 * @package  photo-gallery-plus
 * @version  1.0.0
 */

if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
if (!is_user_logged_in()) {
   return;
} else {
   if (!current_user_can("manage_options")) {
      return;
   } else {
      global $wpdb;
      $photo_gallery_plus_version_number = get_option("photo-gallery-plus-version-number");
      if ($photo_gallery_plus_version_number != "") {
         $get_other_settings = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value from " . $wpdb->prefix . "photo_gallery_plus_meta WHERE meta_key = %s", "other_settings"
             )
         );

         $get_other_settings_data = maybe_unserialize($get_other_settings);

         if ($get_other_settings_data["remove_table_at_uninstall"] == "enable") {
            $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "photo_gallery_plus");
            $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "photo_gallery_plus_meta");

            delete_option("photo-gallery-plus-version-number");
            delete_option("photo-gallery-plus-wizard-set-up");
         }
      }
   }
}