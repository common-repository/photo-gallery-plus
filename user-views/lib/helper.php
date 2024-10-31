<?php
/**
 * This file is used for creating user_helper class.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/user-views/lib
 * @version	1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
/*
  Class Name: user_helper_photo_gallery_plus
  Parameters: No
  Description: This Class is used for return data in unserialize form and convert HEX-color into RGB values.
  Created On: 01-6-2017 09:00AM
  Created By: The WP Geeks Team
 */
if (!class_exists("user_helper_photo_gallery_plus")) {

   class user_helper_photo_gallery_plus {
      /*
        Function Name: get_unserialize_mode_data_photo_gallery_plus
        Parameters: Yes($manage_data)
        Description: This function is used for return data in unserialize form.
        Created On: 01-6-2017 09:00AM
        Created By: The WP Geeks Team
       */
      public static function get_unserialize_mode_data_photo_gallery_plus($type, $meta_key) {
         global $wpdb;
         $manage_data = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT * FROM " . photo_gallery_plus_meta() . " WHERE " . $type . " ORDER BY meta_id DESC", $meta_key
             )
         );
         $unserialize_complete_data = array();
         foreach ($manage_data as $value) {
            $unserialize_data = unserialize($value->meta_value);
            $unserialize_data["id"] = $value->id;
            $unserialize_data["meta_id"] = $value->meta_id;
            array_push($unserialize_complete_data, $unserialize_data);
         }
         return $unserialize_complete_data;
      }
      /*
        Function Name: hex2rgb_photo_gallery_plus
        Parameters: Yes($hex)
        Description: This function is used for convert a normal HEX-color into RGB values.
        Created On: 01-6-2017 09:00AM
        Created By: The WP Geeks Team
       */
      public static function hex2rgb_photo_gallery_plus($hex) {
         $hex = str_replace("#", "", $hex);
         if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
         } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
         }
         $rgb = array($r, $g, $b);
         return $rgb;
      }
      /*
        Function Name: get_meta_value
        Parameters: Yes($meta_key)
        Description: This function is used for return data in unserialize form.
        Created On: 01-6-2017 09:00AM
        Created By: The WP Geeks Team
       */
      public static function get_meta_value_photo_gallery_plus($meta_key) {
         global $wpdb;
         $meta_value = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . photo_gallery_plus_meta() . " WHERE meta_key = %s", $meta_key
             )
         );
         return unserialize($meta_value);
      }
      /*
        Function Name: photo_gallery_plus_font_families
        Parameters: Yes($font_families)
        Description: This function is used for font-family.
        Created On: 01-6-2017 09:00AM
        Created By: The WP Geeks Team
       */
      public static function font_families_photo_gallery_plus($font_families) {
         foreach ($font_families as $font_family) {
            if (strpos($font_family, ":") != false) {
               $position = strpos($font_family, ":");
               $font_style = (substr($font_family, $position + 4, 6) == "italic") ? "\r\n\tfont-style: italic !important;" : "";
               $font_family_name[] = "'" . substr($font_family, 0, $position) . "'" . " !important;\r\n\tfont-weight: " . substr($font_family, $position + 1, 3) . " !important;" . $font_style;
            } else {
               $font_family_name[] = (strpos($font_family, "&") != false) ? "'" . strstr($font_family, "&", 1) . "' !important;" : "'" . $font_family . "' !important;";
            }
         }
         return $font_family_name;
      }
      /*
        Function Name: unique_font_families
        Parameters: Yes($unique_font_families,$import_font_family)
        Description: This function is used for font-family.
        Created On: 01-6-2017 09:00AM
        Created By: The WP Geeks Team
       */
      public static function unique_font_families_photo_gallery_plus($unique_font_families) {
         $import_font_family = "";
         foreach ($unique_font_families as $font_family) {
            $font_family = urlencode($font_family);
            if (is_ssl()) {
               $import_font_family .= "@import url('https://fonts.googleapis.com/css?family=" . $font_family . "');\r\n";
            } else {
               $import_font_family .= "@import url('http://fonts.googleapis.com/css?family=" . $font_family . "');\r\n";
            }
         }
         return $import_font_family;
      }
   }
}