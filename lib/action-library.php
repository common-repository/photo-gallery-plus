<?php
/**
 * This file represents the Data Access Layer for Photo Gallery Plus.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/lib
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

      function get_parent_id_photo_gallery_plus($type) {
         global $wpdb;
         $parent_id = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT id FROM " . photo_gallery_plus() . "
						WHERE " . photo_gallery_plus() . ". type = %s", $type
             )
         );
         return $parent_id;
      }
      function get_delete_all_galleries_module_photo_gallery_plus($type) {
         global $wpdb;
         $get_all_galleries_and_image = $wpdb->get_results
             (
             $wpdb->prepare
                 (
                 "SELECT meta_id FROM " . photo_gallery_plus_meta() . "
						INNER JOIN " . photo_gallery_plus() . " ON " . photo_gallery_plus_meta() . ".meta_id = " . photo_gallery_plus() . ".id
						WHERE " . photo_gallery_plus() . ".type = %s", $type
             )
         );
         return $get_all_galleries_and_image;
      }
      function get_thumbnail_dimension_photo_gallery_plus() {
         global $wpdb;
         $thumbnail_data = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . photo_gallery_plus_meta() . "
						WHERE " . photo_gallery_plus_meta() . ".meta_key = %s", "global_options_settings"
             )
         );

         $thumbnail_data_unserialize = maybe_unserialize($thumbnail_data);
         $image_dimension = explode(",", $thumbnail_data_unserialize["global_options_generated_image_dimensions"]);
         $thumbnail_dimensions = explode(",", $thumbnail_data_unserialize["global_options_thumbnail_dimensions"]);
         $image_data = array_merge($image_dimension, $thumbnail_dimensions);
         return $image_data;
      }
      function get_dir_contents_photo_gallery_plus($dir, &$results = array()) {
         $files = scandir($dir);
         foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
               $results[] = $path;
            } elseif ($value != "." && $value != "..") {
               get_dir_contents_photo_gallery_plus($path, $results);
               $results[] = $path;
            }
         }
         return $results;
      }
      if (isset($_REQUEST["param"])) {
         $obj_dbHelper_photo_gallery_plus = new dbHelper_photo_gallery_plus();
         $obj_image_process_photo_gallery_plus = new image_process_photo_gallery_plus();
         switch (esc_attr($_REQUEST["param"])) {
            case "wizard_photo_gallery_plus":
               if (wp_verify_nonce(isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : "", "photo_gallery_plus_check_status")) {
                  $type = isset($_REQUEST["type"]) ? esc_attr($_REQUEST["type"]) : "";
                  update_option("photo-gallery-plus-wizard-set-up", $type);
                  if ($type == "opt_in") {
                     $plugin_info_photo_gallery_plus = new plugin_info_photo_gallery_plus();

                     global $wp_version;
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
                     $plugin_stat_data["event"] = "activate";
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
               break;
            case "photo_gallery_plus_upload_images":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "gallery_upload_images_nonce")) {
                  $gallery_id = isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0;
                  $image_meta_data = array();

                  $image_data = get_thumbnail_dimension_photo_gallery_plus();
                  $image_name = isset($_REQUEST["image_name"]) ? esc_attr($_REQUEST["image_name"]) : "";
                  $upload_type = isset($_REQUEST["upload_method"]) ? esc_attr($_REQUEST["upload_method"]) : "";
                  $file_type = isset($_REQUEST["file_type"]) ? esc_attr($_REQUEST["file_type"]) : "";

                  $gallery_images_count = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT count(meta_key) FROM " . photo_gallery_plus_meta() . " WHERE meta_id = %d and meta_key = %s", $gallery_id, "image_data"
                      )
                  );
                  if ($upload_type != "") {
                     $attachment_file_id = isset($_REQUEST["attachment_id"]) ? intval($_REQUEST["attachment_id"]) : "";
                     $fileName = wp_unique_filename(PHOTO_GALLERY_PLUS_ORIGINAL_DIR, $image_name);
                     if (function_exists("curl_init")) {
                        $src_file = wp_get_attachment_image_src($attachment_file_id, "");

                        $obj_image_process_photo_gallery_plus->copy_images_photo_gallery_plus($src_file[0], PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName);
                        $obj_image_process_photo_gallery_plus->copy_images_photo_gallery_plus($src_file[0], PHOTO_GALLERY_PLUS_UPLOAD_DIR . $fileName);
                     } else {
                        $src_file = get_attached_file($attachment_file_id);
                        copy($src_file, PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName);
                        copy($src_file, PHOTO_GALLERY_PLUS_UPLOAD_DIR . $fileName);
                     }
                     $thumbnail_image_name = $obj_image_process_photo_gallery_plus->createThumbs_photo_gallery_plus($image_name, $image_data);
                     $image_exif_detail = $obj_image_process_photo_gallery_plus->file_exif_information_photo_gallery_plus(PHOTO_GALLERY_PLUS_UPLOAD_DIR . $image_name, "FILE");
                     $image_meta_data["image_title"] = isset($_REQUEST["image_title"]) ? esc_attr($_REQUEST["image_title"]) : "";
                     $image_meta_data["image_name"] = $fileName;
                  } else {
                     $thumbnail_image_name = $obj_image_process_photo_gallery_plus->createThumbs_photo_gallery_plus($image_name, $image_data);
                     $image_exif_detail = $obj_image_process_photo_gallery_plus->file_exif_information_photo_gallery_plus(PHOTO_GALLERY_PLUS_UPLOAD_DIR . $image_name, "FILE");
                     if ($image_exif_detail["exif_information"]["title"] == "") {
                        $image_name_data = pathinfo(PHOTO_GALLERY_PLUS_UPLOAD_DIR . $image_name);
                        $image_data = $image_name_data["filename"];
                     } else {
                        $image_data = $image_exif_detail["exif_information"]["title"];
                     }
                     $image_meta_data["image_title"] = $image_data;
                     $image_meta_data["image_name"] = isset($_REQUEST["image_name"]) ? esc_attr($_REQUEST["image_name"]) : "";
                  }
                  $image_meta_data["enable_redirect"] = "";
                  $image_meta_data["redirect_url"] = "http://";
                  $image_meta_data["gallery_cover_image"] = $gallery_images_count == 0 ? "1" : "";
                  $image_meta_data["width"] = intval($image_exif_detail["width"]);
                  $image_meta_data["height"] = intval($image_exif_detail["height"]);
                  $image_meta_data["mime_type"] = esc_attr($image_exif_detail["mime_type"]);
                  $image_meta_data["aperture"] = esc_attr($image_exif_detail["exif_information"]["aperture"]);
                  $image_meta_data["upload_type"] = "";

                  $image_meta_data["image_description"] = isset($_REQUEST["image_dec"]) ? esc_attr($_REQUEST["image_dec"]) : "";
                  $image_meta_data["alt_text"] = isset($_REQUEST["alt_text"]) ? esc_attr($_REQUEST["alt_text"]) : "";
                  $image_meta_data["sort_order"] = "";
                  $image_meta_data["tags"] = array();
                  $image_meta_data["upload_date"] = time();
                  $image_meta_data["file_type"] = isset($_REQUEST["file_type"]) ? esc_attr($_REQUEST["file_type"]) : "";
                  $image_meta_data["exclude_image"] = "";

                  if ($gallery_images_count == 0) {
                     $selected_gallery_data = $wpdb->get_var
                         (
                         $wpdb->prepare
                             (
                             "SELECT meta_value FROM " . photo_gallery_plus_meta() . " WHERE meta_id = %d AND meta_key = %s", $gallery_id, "gallery_data"
                         )
                     );
                     $selected_gallery_unserialized_data = maybe_unserialize($selected_gallery_data);
                     $selected_gallery_unserialized_data["gallery_cover_image"] = $image_name;

                     $gallery_meta_data_insert = array();
                     $where = array();
                     $where["meta_id"] = $gallery_id;
                     $where["meta_key"] = "gallery_data";
                     $gallery_meta_data_insert["meta_value"] = serialize($selected_gallery_unserialized_data);
                     $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $gallery_meta_data_insert, $where);
                  }
                  $image_meta_data_insert = array();
                  $image_meta_data_insert["meta_id"] = $gallery_id;
                  $image_meta_data_insert["meta_key"] = "image_data";
                  $image_meta_data_insert["meta_value"] = serialize($image_meta_data);
                  $image_id = $obj_dbHelper_photo_gallery_plus->insertCommand(photo_gallery_plus_meta(), $image_meta_data_insert);

                  $image_bind_data = array($image_id, $thumbnail_image_name, $image_data);
                  echo json_encode($image_bind_data);
               }
               break;

            case "pgp_get_gallery_id_photo_gallery_plus":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "get_gallery_id_photo_gallery_plus")) {
                  $gallery_parent_id = get_parent_id_photo_gallery_plus("galleries");
                  $insert_gallery = array();
                  $insert_gallery["type"] = "gallery";
                  $insert_gallery["parent_id"] = $gallery_parent_id;
                  $gallery_id = $obj_dbHelper_photo_gallery_plus->insertCommand(photo_gallery_plus(), $insert_gallery);

                  $insert_gallery_meta = array();
                  $insert_gallery_meta["gallery_title"] = "";
                  $insert_gallery_meta["gallery_description"] = "";
                  $insert_gallery_meta["created_date"] = time();
                  $insert_gallery_meta["edited_on"] = time();
                  $insert_gallery_meta["gallery_cover_image"] = "";
                  $insert_gallery_meta["edited_by"] = $current_user->display_name;
                  $insert_gallery_meta["author"] = $current_user->display_name;

                  $insert_gallery_data = array();
                  $insert_gallery_data["meta_id"] = $gallery_id;
                  $insert_gallery_data["meta_key"] = "gallery_data";
                  $insert_gallery_data["meta_value"] = serialize($insert_gallery_meta);
                  $obj_dbHelper_photo_gallery_plus->insertCommand(photo_gallery_plus_meta(), $insert_gallery_data);
                  echo $gallery_id;
               }
               break;

            case "delete_gallery_images":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "gallery_images_delete_nonce")) {
                  $delete_image_data = isset($_REQUEST["delete_image_data"]) ? json_decode(stripcslashes($_REQUEST["delete_image_data"])) : "";
                  $obj_dbHelper_photo_gallery_plus->bulk_deleteCommand(photo_gallery_plus_meta(), "id", implode(",", $delete_image_data));
               }
               break;

            case "update_gallery_data":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "gallery_update_data_nonce")) {
                  $gallery_id = isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0;
                  parse_str(isset($_REQUEST["gallery_title"]) ? base64_decode($_REQUEST["gallery_title"]) : "", $gallery_title_data);
                  parse_str(isset($_REQUEST["gallery_description"]) ? base64_decode($_REQUEST["gallery_description"]) : "", $gallery_description_data);
                  $gallery_title = esc_attr($gallery_title_data["ux_txt_gallery_title"]) != "" ? $gallery_title_data["ux_txt_gallery_title"] : "Untitled Gallery";
                  $gallery_description = esc_attr($gallery_description_data["ux_txtarea_gallery_heading_content"]);
                  parse_str((isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : ""), $data);
                  $gallery_cover_image = isset($_REQUEST["gallery_cover_image"]) ? intval($_REQUEST["gallery_cover_image"]) : 0;
                  $gallery_images_data = isset($_REQUEST["array_gallery_images_data"]) ? json_decode(stripcslashes(urldecode($_REQUEST["array_gallery_images_data"]))) : "";
                  $insert_data = array();
                  $insert_images_array_data = array();
                  foreach ($gallery_images_data as $value) {
                     $get_image_meta_data = $wpdb->get_var
                         (
                         $wpdb->prepare
                             (
                             "SELECT meta_value from " . photo_gallery_plus_meta() .
                             " WHERE id = %d and meta_key = %s", $value, "image_data"
                     ));
                     $image_meta_data_unserialize = maybe_unserialize($get_image_meta_data);
                     $image_meta_data_unserialize["image_title"] = isset($data["ux_txt_img_title_" . $value]) ? esc_attr($data["ux_txt_img_title_" . $value]) : "";
                     $image_meta_data_unserialize["image_description"] = isset($data["ux_txt_img_desc_" . $value]) ? esc_attr($data["ux_txt_img_desc_" . $value]) : "";
                     $image_meta_data_unserialize["alt_text"] = isset($data["ux_img_alt_text_" . $value]) ? esc_attr($data["ux_img_alt_text_" . $value]) : "";
                     $image_meta_data_unserialize["tags"] = isset($data["ux_ddl_tags_" . $value]) ? $data["ux_ddl_tags_" . $value] : array();
                     $image_meta_data_unserialize["exclude_image"] = isset($data["ux_exclude_image_" . $value]) ? "1" : "";
                     $image_meta_data_unserialize["enable_redirect"] = isset($data["ux_rdl_redirect_" . $value]) ? esc_attr($data["ux_rdl_redirect_" . $value]) : "";
                     $image_meta_data_unserialize["redirect_url"] = isset($data["ux_txt_img_url_" . $value]) ? esc_attr($data["ux_txt_img_url_" . $value]) : "";
                     $image_meta_data_unserialize["gallery_cover_image"] = $gallery_cover_image == $value ? "1" : "";

                     $update_image_meta_data = array();
                     $where = array();
                     $where["id"] = $value;
                     $where["meta_key"] = "image_data";
                     $update_image_meta_data["meta_value"] = serialize($image_meta_data_unserialize);
                     $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $update_image_meta_data, $where);
                  }
                  $gallery_cover_meta_value = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value from " . photo_gallery_plus_meta() .
                          " WHERE id = %d and meta_key = %s", $gallery_cover_image, "image_data"
                      )
                  );
                  $gallery_cover_unserialized_meta_value = maybe_unserialize($gallery_cover_meta_value);

                  $gallery_meta_value = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value from " . photo_gallery_plus_meta() .
                          " WHERE meta_id = %d and meta_key = %s", $gallery_id, "gallery_data"
                      )
                  );

                  $gallery_meta_id_unserialize = maybe_unserialize($gallery_meta_value);

                  $gallery_meta_data = array();
                  $gallery_meta_data["gallery_title"] = esc_attr($gallery_title);
                  $gallery_meta_data["gallery_description"] = htmlspecialchars_decode(esc_attr($gallery_description));
                  $gallery_meta_data["created_date"] = doubleval($gallery_meta_id_unserialize["created_date"]);
                  $gallery_meta_data["edited_on"] = time();
                  $gallery_meta_data["gallery_cover_image"] = isset($gallery_cover_unserialized_meta_value["image_name"]) ? $gallery_cover_unserialized_meta_value["image_name"] : "";
                  $gallery_meta_data["edited_by"] = $current_user->display_name;
                  $gallery_meta_data["author"] = esc_attr($gallery_meta_id_unserialize["author"]);

                  $gallery_update_data = array();
                  $where = array();
                  $where["meta_id"] = $gallery_id;
                  $where["meta_key"] = "gallery_data";
                  $gallery_update_data["meta_value"] = serialize($gallery_meta_data);
                  $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $gallery_update_data, $where);
               }
               break;

            case "get_image_original_dimension":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "get_original_image_dimension_nonce")) {
                  $image_id = isset($_REQUEST["image_id"]) ? esc_attr($_REQUEST["image_id"]) : "";
                  $get_image_data = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value FROM " . photo_gallery_plus_meta() . "
								WHERE " . photo_gallery_plus_meta() . ".id = %d", $image_id
                      )
                  );
                  $image_data_unserialize = maybe_unserialize($get_image_data);
                  echo $image_data_unserialize["width"] . "," . $image_data_unserialize["height"];
               }
               break;

            case "save_image_detail":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "save_image_detail_nonce")) {
                  $image_id = isset($_REQUEST["image_id"]) ? esc_attr($_REQUEST["image_id"]) : "";
                  $image_name = isset($_REQUEST["image_name"]) ? esc_attr($_REQUEST["image_name"]) : "";
                  $image_data = $wpdb->get_var
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value FROM " . photo_gallery_plus_meta() . "
								WHERE " . photo_gallery_plus_meta() . ".id = %d", $image_id
                      )
                  );
                  $unserialize_image_data = maybe_unserialize($image_data);
                  $image_original_path = PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $image_name;
                  $image_meta_data = getimagesize($image_original_path);
                  $unserialize_image_data["height"] = esc_attr($image_meta_data[1]);
                  $unserialize_image_data["width"] = esc_attr($image_meta_data[0]);
                  $serialize_data = array();
                  $where = array();
                  $serialize_data["meta_value"] = serialize($unserialize_image_data);
                  $where["meta_key"] = "image_data";
                  $where["id"] = $image_id;
                  $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $serialize_data, $where);
               }
               break;

            case "get_image_path":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "get_image_path_nonce")) {
                  $attachment_id = isset($_REQUEST["attachment_id"]) ? intval($_REQUEST["attachment_id"]) : "";
                  echo get_attached_file($attachment_id);
               }
               break;

            case "manage_gallery_module":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "pgp_manage_gallery_nonce")) {
                  $gallery_id = isset($_REQUEST["meta_id"]) ? intval($_REQUEST["meta_id"]) : "";

                  $delete_gallery = array();
                  $delete_gallery_parent = array();
                  $delete_gallery["meta_id"] = $gallery_id;
                  $delete_gallery_parent["id"] = $gallery_id;
                  $obj_dbHelper_photo_gallery_plus->deleteCommand(photo_gallery_plus_meta(), $delete_gallery);
                  $obj_dbHelper_photo_gallery_plus->deleteCommand(photo_gallery_plus(), $delete_gallery_parent);
               }
               break;
            case "custom_css_module":
               if (wp_verify_nonce(isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : "", "custom_css_nonce")) {
                  parse_str(isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : "", $custom_css_form_data);
                  $custom_css_data = array();
                  $custom_css_data["custom_css"] = esc_attr($custom_css_form_data["ux_txt_custom_css"]);
                  $update_custom_css_array = array();
                  $where = array();
                  $where["meta_key"] = "custom_css";
                  $update_custom_css_array["meta_value"] = serialize($custom_css_data);
                  $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $update_custom_css_array, $where);
               }
               break;

            case "global_options_module":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "global_options_nonce")) {
                  set_time_limit(1800);
                  parse_str((isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : ""), $data_array);

                  $global_options = array();
                  $global_options["global_options_generated_image_dimensions"] = esc_attr(implode(",", $data_array["ux_txt_height_width"]));
                  $global_options["global_options_thumbnail_dimensions"] = esc_attr(implode(",", $data_array["ux_txt_thumbnail_height_width"]));
                  $global_options["global_options_language_direction"] = esc_html($data_array["ux_ddl_language_direction"]);
                  $global_options["global_options_right_click_protection"] = esc_attr($data_array["ux_ddl_right_click"]);

                  $where = array();
                  $global_options_data = array();
                  $where["meta_key"] = "global_options_settings";
                  $global_options_data["meta_value"] = serialize($global_options);
                  $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $global_options_data, $where);

                  $get_image_data = $wpdb->get_results
                      (
                      $wpdb->prepare
                          (
                          "SELECT meta_value FROM " . photo_gallery_plus_meta() . "
								WHERE meta_key = %s", "image_data"
                      )
                  );
                  $get_image_data_unserialize = array();
                  foreach ($get_image_data as $val) {
                     $get_image_data_unserialize[] = maybe_unserialize($val->meta_value)["image_name"];
                  }

                  $generated_image_dimension = explode(",", $global_options["global_options_generated_image_dimensions"]);
                  $exploded_thumbnail_dimension = explode(",", $global_options["global_options_thumbnail_dimensions"]);
                  $thumbnail_dimension = array_merge($exploded_thumbnail_dimension, $generated_image_dimension);
                  $obj_image_process_photo_gallery_plus->alter_thumbs_photo_gallery_plus($get_image_data_unserialize, $thumbnail_dimension);
               }
               break;
            case "other_settings_module":
               if (wp_verify_nonce((isset($_REQUEST["_wp_nonce"]) ? esc_attr($_REQUEST["_wp_nonce"]) : ""), "other_settings_nonce")) {
                  parse_str((isset($_REQUEST["data"]) ? base64_decode($_REQUEST["data"]) : ""), $other_settings_data);
                  $update_other_settings = array();
                  $update_other_settings["remove_table_at_uninstall"] = esc_attr($other_settings_data["ux_ddl_remove_table"]);
                  $update_other_settings["automatic_updates"] = "disable";

                  $where = array();
                  $update_other_settings_data = array();
                  $where["meta_key"] = "other_settings";
                  $update_other_settings_data["meta_value"] = serialize($update_other_settings);
                  $obj_dbHelper_photo_gallery_plus->updateCommand(photo_gallery_plus_meta(), $update_other_settings_data, $where);
               }
               break;
         }
         die();
      }
   }
}