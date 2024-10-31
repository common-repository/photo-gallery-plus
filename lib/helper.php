<?php
/**
 * This file is used for creating dbHelper class.
 *
 * @author  The WP Geeks
 * @package photo-gallery-plus/lib
 * @version 1.0.0
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
      /*
        Class Name: dbHelper_photo_gallery_plus
        Parameters: No
        Description: This Class is used for Insert, Update and Delete operations.
        Created On: 01-06-2017 09:00
        Created By: The WP Geeks Team
       */
      class dbHelper_photo_gallery_plus {
         /*
           Function Name: insertCommand
           Parameters: Yes($table_name,$data)
           Description: This Function is used for Insert data in database.
           Created On: 01-06-2017 09:00
           Created By: The WP Geeks Team
          */
         function insertCommand($table_name, $data) {
            global $wpdb;
            $wpdb->insert($table_name, $data);
            return $wpdb->insert_id;
         }
         /*
           Function Name: updateCommand
           Parameters: Yes($table_name,$data,$where)
           Description: This function is used for Update data.
           Created On: 01-06-2017 09:00
           Created By: The WP Geeks Team
          */
         function updateCommand($table_name, $data, $where) {
            global $wpdb;
            $wpdb->update($table_name, $data, $where);
         }
         /*
           Function Name: deleteCommand
           Parameters: Yes($table_name,$where)
           Description: This function is used for delete data.
           Created On: 01-06-2017 09:00
           Created By: The WP Geeks Team
          */
         function deleteCommand($table_name, $where) {
            global $wpdb;
            $wpdb->delete($table_name, $where);
         }
         /*
           Function Name: bulk_deleteCommand
           Parameters: Yes($table_name,$data,$where)
           Decription: This function is being used to delete bulk Data.
           Created On: 01-06-2017 09:00
           Created By: The WP Geeks Team
          */
         function bulk_deleteCommand($table_name, $where, $data) {
            global $wpdb;
            $wpdb->query
                (
                "DELETE FROM $table_name WHERE $where IN ($data)"
            );
         }
      }
      /*
        Class Name: plugin_info_photo_gallery_plus
        Parameters: No
        Description: This Class is used to get the the information about plugins.
        Created On: 13-06-2017 10:07
        Created By: The WP Geeks Team
       */
      class plugin_info_photo_gallery_plus {
         /*
           Function Name: get_plugin_info_photo_gallery_plus
           Parameters: No
           Decription: This function is used to return the information about plugins.
           Created On: 13-06-2017 10:07
           Created By: The WP Geeks Team
          */
         function get_plugin_info_photo_gallery_plus() {
            $active_plugins = (array) get_option("active_plugins", array());
            if (is_multisite()) {
               $active_plugins = array_merge($active_plugins, get_site_option("active_sitewide_plugins", array()));
            }
            $plugins = array();
            if (count($active_plugins) > 0) {
               $get_plugins = array();
               foreach ($active_plugins as $plugin) {
                  $plugin_data = get_plugin_data(WP_PLUGIN_DIR . "/" . $plugin);

                  $get_plugins["plugin_name"] = strip_tags($plugin_data["Name"]);
                  $get_plugins["plugin_author"] = strip_tags($plugin_data["Author"]);
                  $get_plugins["plugin_version"] = strip_tags($plugin_data["Version"]);
                  array_push($plugins, $get_plugins);
               }
               return $plugins;
            }
         }
      }
      class image_process_photo_gallery_plus {
         function copy_images_photo_gallery_plus($src, $destination) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $src);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $data = curl_exec($ch);
            curl_close($ch);
            if ($data) {
               $fp = fopen($destination, "wb");
               if ($fp) {
                  fwrite($fp, $data);
                  fclose($fp);
               } else {
                  fclose($fp);
                  return false;
               }
            } else {
               return false;
            }
         }
         function createThumbs_photo_gallery_plus($fname, $image_data) {
            $fileName = wp_unique_filename(PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR, $fname);
            if (function_exists("wp_get_image_editor")) {
               $image_original = wp_get_image_editor(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fname);
               $image_thumbnail_cropped = wp_get_image_editor(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fname);
               $image_thumbnail_non_cropped = wp_get_image_editor(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fname);
               if (!is_wp_error($image_original) || !is_wp_error($image_thumbnail_cropped) || !is_wp_error($image_thumbnail_non_cropped)) {
                  $image_original->resize($image_data[0], $image_data[1], false);
                  $image_original->save(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName);

                  $image_thumbnail_cropped->resize($image_data[2], $image_data[3], true);
                  $image_thumbnail_cropped->save(PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR . $fileName);

                  $image_thumbnail_non_cropped->resize($image_data[2], $image_data[3], false);
                  $image_thumbnail_non_cropped->save(PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR . $fileName);
               }
            } else {
               image_resize(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fname, $image_data[0], $image_data[1], false);
               image_resize(PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR . $fname, $image_data[2], $image_data[3], true);
               image_resize(PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR . $fname, $image_data[2], $image_data[3], false);
            }
            return $fileName;
         }
         function file_exif_information_photo_gallery_plus($file) {
            $meta_data_array = array();
            $image_data = getimagesize($file);
            $meta_data_array["width"] = $image_data[0];
            $meta_data_array["height"] = $image_data[1];
            if (preg_match("!^image/!", $image_data["mime"]) && file_is_displayable_image($file)) {
               $meta_data_array["mime_type"] = $image_data["mime"];
               $meta_data_array["file"] = _wp_relative_upload_path($file);
               $meta_data_array["exif_information"] = wp_read_image_metadata($file);
            }
            return $meta_data_array;
         }
         function generate_thumbs_edited_image_photo_gallery_plus($fileName, $thumb_dimension) {
            if (function_exists("wp_get_image_editor")) {
               $image = wp_get_image_editor(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName);
               $image_non_cropped = wp_get_image_editor(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName);
               if (!is_wp_error($image) || !is_wp_error($image_non_cropped)) {
                  $image->resize($thumb_dimension[0], $thumb_dimension[1], true);
                  $image->save(PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR . $fileName);

                  $image_non_cropped->resize($thumb_dimension[0], $thumb_dimension[1], false);
                  $image_non_cropped->save(PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR . $fileName);
               }
            } else {
               $img = image_resize(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName, $thumb_dimension[0], $thumb_dimension[1], true);
               copy($img, PHOTO_GALLERY_PLUS_THUMBS_CROPPED_DIR . $fileName);
               unlink($img);

               $img = image_resize(PHOTO_GALLERY_PLUS_ORIGINAL_DIR . $fileName, $thumb_dimension[0], $thumb_dimension[1], false);
               copy($img, PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_DIR . $fileName);
               unlink($img);
            }
         }
         function alter_thumbs_photo_gallery_plus($image_names, $thumb_dimension) {
            foreach ($image_names as $image_name) {
               $this->generate_thumbs_edited_image_photo_gallery_plus($image_name, $thumb_dimension);
            }
         }
      }
   }
}