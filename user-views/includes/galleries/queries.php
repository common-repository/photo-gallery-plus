<?php
/**
 * This file is used for queries.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/user-views/includes/galleries
 * @version	1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
if (isset($id)) {

   $gallery_data = $wpdb->get_row(
       $wpdb->prepare("SELECT * FROM " . photo_gallery_plus_meta() . " WHERE meta_key = %s AND meta_id = %d", "gallery_data", $id)
   );

   if (count($gallery_data) > 0) {
      $display_gallery_data = unserialize($gallery_data->meta_value);

      $gallery_image_data_detail = user_helper_photo_gallery_plus::get_unserialize_mode_data_photo_gallery_plus("meta_id = $id AND meta_key = %s", "image_data");
      $gallery_image_detail_only_included_images = array();
      //loop to only include images that were not exculded to be displayed.
      foreach ($gallery_image_data_detail as $images) {
         if ($images["exclude_image"] != 1) {
            $gallery_image_detail_only_included_images[] = $images;
         }
      }
      $custom_css = user_helper_photo_gallery_plus::get_meta_value_photo_gallery_plus("custom_css");
      if (isset($lightbox_type)) {
         switch (esc_attr($lightbox_type)) {
            case "lightcase":
               $pgp_lightcase_meta_data = user_helper_photo_gallery_plus::get_meta_value_photo_gallery_plus("lightcase_settings");
               break;
         }
      }
      if (isset($layout_type)) {
         switch ($layout_type) {
            case "thumbnail_layout":
               $thumbnail_layout_settings = user_helper_photo_gallery_plus::get_meta_value_photo_gallery_plus("thumbnail_layout_settings");
               break;

            case "masonry_layout" :
               $masonry_layout_settings = user_helper_photo_gallery_plus::get_meta_value_photo_gallery_plus("masonry_layout_settings");
               break;
         }
      }
   }
}