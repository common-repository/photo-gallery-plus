<?php
/**
 * This file is used for fetching data from database.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/includes
 * @version	1.0.0
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

      function get_meta_value_photo_gallery_plus($meta_key) {
         global $wpdb;
         $meta_value = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . photo_gallery_plus_meta() . " WHERE meta_key = %s", $meta_key
             )
         );
         return maybe_unserialize($meta_value);
      }
      function get_unserialize_data_photo_gallery_plus($type, $meta_key) {
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
            $unserialize_data = maybe_unserialize($value->meta_value);
            $unserialize_data["id"] = $value->id;
            $unserialize_data["meta_id"] = $value->meta_id;
            array_push($unserialize_complete_data, $unserialize_data);
         }
         return $unserialize_complete_data;
      }
      $page_navigation_get_data = get_meta_value_photo_gallery_plus("page_navigation_settings");
      $check_photo_gallery_plus_wizard = get_option("photo-gallery-plus-wizard-set-up");
      $check_url = $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : esc_attr($_GET["page"]);
      if (isset($_GET["page"])) {
         switch ($check_url) {
            case "pgp_add_gallery":
               $gallery_id = isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0;

               $gallery_data_unserialize = get_unserialize_data_photo_gallery_plus("meta_id != $gallery_id and meta_key = %s", "gallery_data");

               $get_gallery_meta_data = $wpdb->get_var
                   (
                   $wpdb->prepare
                       (
                       "SELECT meta_value FROM " . photo_gallery_plus_meta() . " WHERE meta_id = %d and meta_key = %s", $gallery_id, "gallery_data"
                   )
               );
               $get_gallery_meta_data_unserialize = maybe_unserialize($get_gallery_meta_data);

               $get_gallery_image_meta_data_unserialize = get_unserialize_data_photo_gallery_plus("meta_id = $gallery_id and meta_key = %s", "image_data");
               $sort_order = array();
               foreach ($get_gallery_image_meta_data_unserialize as $key => $value) {
                  $sort_order[$key] = $value["sort_order"];
               }
               array_multisort($sort_order, SORT_ASC, $get_gallery_image_meta_data_unserialize);
               $tag_data_unserialize = get_unserialize_data_photo_gallery_plus("meta_key = %s", "tag_data");
               break;

            case "manage_photo_gallery_plus":
               $manage_gallery_data_unserialize = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $count_manage_gallery_data = count($manage_gallery_data_unserialize);
               break;

            case "pgp_sort_galleries":
               $sort_galleries_get_title = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               if (isset($_REQUEST["gallery_id"])) {
                  $gallery_id = intval($_REQUEST["gallery_id"]);
                  $sort_gallery_images = $wpdb->get_results
                      (
                      $wpdb->prepare
                          (
                          "SELECT * FROM " . photo_gallery_plus_meta() . " WHERE meta_id = %d and meta_key = %s", $gallery_id, "image_data"
                      )
                  );

                  $sort_order = array();
                  $images_data = array();
                  if (count($sort_gallery_images) > 0) {

                     foreach ($sort_gallery_images as $key => $value) {
                        $image_data_unserialize = unserialize($value->meta_value);
                        $sort_order[$key] = $image_data_unserialize["sort_order"];
                        $image_data_unserialize["id"] = $value->id;
                        $images_data[] = $image_data_unserialize;
                     }
                     array_multisort($sort_order, SORT_ASC, $images_data);
                  }
               }
               $thumbnail_dimensions_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_add_album":
               $get_galleries_data_for_album = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               if (isset($_REQUEST["album_id"])) {
                  $album_id = intval($_REQUEST["album_id"]);
                  $get_album_data = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value from " . photo_gallery_plus_meta() .
                          " WHERE meta_id = %d and meta_key = %s", $album_id, "album_data"
                      )
                  );
                  $get_album_data_unserialize = maybe_unserialize($get_album_data);
                  if (count($get_album_data_unserialize["selected_galleries"]) > 0) {
                     $galleries_data_array = isset($get_album_data_unserialize["selected_galleries"]) ? implode(",", $get_album_data_unserialize["selected_galleries"]) : "";
                     $get_galleries_data_selected_albums_array = get_unserialize_data_photo_gallery_plus("meta_id IN ($galleries_data_array) and meta_key = %s", "gallery_data");
                  }
               }
               break;
            case "pgp_sort_albums":
               $sort_albums_get_title = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               $thumbnail_dimensions_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_image_browser_layout":
               $image_browser_layout_data = get_meta_value_photo_gallery_plus("image_browser_layout_settings");
               break;
            case "pgp_justified_grid_layout":
               $manage_justified_grid_data = get_meta_value_photo_gallery_plus("justified_grid_layout_settings");
               break;
            case "pgp_thumbnail_layout":
               $manage_thumbnail_data = get_meta_value_photo_gallery_plus("thumbnail_layout_settings");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_masonry_layout":
               $manage_masonry_data = get_meta_value_photo_gallery_plus("masonry_layout_settings");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_slideshow_layout":
               $manage_slideshow_data = get_meta_value_photo_gallery_plus("slideshow_layout_settings");
               break;
            case "pgp_blog_style_layout":
               $blog_style_layout_data = get_meta_value_photo_gallery_plus("blog_style_layout_settings");
               break;
            case "pgp_compact_album_layout":
               $compact_album_layout_data = get_meta_value_photo_gallery_plus("compact_album_layout_settings");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_extended_album_layout":
               $extended_album_layout_data = get_meta_value_photo_gallery_plus("extended_album_layout_settings");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_custom_css":
               $details_custom_css = get_meta_value_photo_gallery_plus("custom_css");
               break;
            case "pgp_lightcase" :
               $pgp_lightcase_meta_data = get_meta_value_photo_gallery_plus("lightcase_settings");
               break;
            case "pgp_fancy_box":
               $pgp_fancy_box_get_data = get_meta_value_photo_gallery_plus("fancy_box_settings");
               break;
            case "pgp_color_box":
               $color_box_get_data = get_meta_value_photo_gallery_plus("color_box_settings");
               break;
            case "pgp_foo_box_free_edition":
               $foo_box = get_meta_value_photo_gallery_plus("foo_box_settings");
               break;
            case "pgp_nivo_lightbox":
               $pgp_nivo_lightbox_meta_data = get_meta_value_photo_gallery_plus("nivo_lightbox_settings");
               break;
            case "pgp_thumbnail_layout_shortcode":
               $thumbnail_layout_get_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $thumbnail_layout_get_album_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               break;
            case "pgp_masonry_layout_shortcode":
               $masonry_layout_get_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $masonry_layout_get_album_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               break;
            case "pgp_slideshow_layout_shortcode":
               $slideshow_layout_shortcode = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               $slideshow_layout_get_album_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               break;
            case "pgp_image_browser_layout_shortcode":
               $image_browser_layout_shortcode = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               $image_browser_layout_get_album_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               break;
            case "pgp_justified_grid_layout_shortcode":
               $justified_grid_layout_title = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $justified_grid_layout_get_album_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               break;
            case "pgp_blog_style_layout_shortcode":
               $blog_style_layout_title = get_unserialize_data_photo_gallery_plus("meta_key = %s", "gallery_data");
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               $blog_style_layout_get_album_data = get_unserialize_data_photo_gallery_plus("meta_key = %s", "album_data");
               break;
            case "pgp_global_options":
               $global_options_get_data = get_meta_value_photo_gallery_plus("global_options_settings");
               break;
            case "pgp_filter_settings":
               $filter_settings_get_data = get_meta_value_photo_gallery_plus("filter_settings");
               break;
            case "pgp_lazy_load_settings":
               $lazyload_settings_get_data = get_meta_value_photo_gallery_plus("lazy_load_settings");
               break;
            case "pgp_search_box_settings":
               $searchbox_settings_get_data = get_meta_value_photo_gallery_plus("search_box_settings");
               break;
            case "pgp_order_by_settings":
               $orderby_settings_get_data = get_meta_value_photo_gallery_plus("order_by_settings");
               break;
            case "pgp_other_settings":
               $details_other_setting = get_meta_value_photo_gallery_plus("other_settings");
               break;
            case "pgp_roles_and_capabilities":
               $details_roles_capabilities = get_meta_value_photo_gallery_plus("roles_and_capabilities_settings");
               $other_roles_array = $details_roles_capabilities["capabilities"];
               break;
            case "pgp_other_settings":
               $details_other_setting = get_meta_value_photo_gallery_plus("other_settings");
               break;
            case "pgp_watermark_settings":
               $watermark_settings_get_data = get_meta_value_photo_gallery_plus("watermark_settings");
               break;
            case "pgp_advertisement":
               $advertisement_get_data = get_meta_value_photo_gallery_plus("advertisement_settings");
               break;
            case "pgp_page_navigation":
               $page_navigation_get_data = get_meta_value_photo_gallery_plus("page_navigation_settings");
               break;
         }
      }
   }
}