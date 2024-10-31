<?php
/**
 * This file is used for frontend layout.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/user-views/includes/galleries
 * @version	1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
// Exit if accessed directly
global $wpdb;
$layout_type = str_replace('&quot;', '', $layout_type);
$id = str_replace('&quot;', '', $id);
$gallery_title = str_replace('&quot;', '', $gallery_title);
$gallery_description = str_replace('&quot;', '', $gallery_description);
$thumbnail_title = str_replace('&quot;', '', $thumbnail_title);
$thumbnail_description = str_replace('&quot;', '', $thumbnail_description);
$lightbox_type = str_replace('&quot;', '', $lightbox_type);
$columns = str_replace('&quot;', '', $columns);
$random = rand(100, 10000);
$alignment = str_replace('&quot;', '', $alignment);
if (file_exists(PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "includes/galleries/queries.php")) {
   include PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "includes/galleries/queries.php";
}
?>
<div id="<?php echo $random; ?>">
   <div id="photo_gallery_plus_main_container_<?php echo $random; ?>" class="photo_gallery_plus_main_container">
      <?php
      if (isset($layout_type)) {
         if (count($gallery_data) > 0) {
            switch (esc_attr($layout_type)) {
               case "thumbnail_layout" :
                  $gallery_title_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) : "h2";
                  $gallery_desc_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) : "h3";
                  break;
               case "masonry_layout" :
                  $gallery_title_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) : "h2";
                  $gallery_desc_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) : "h3";
                  break;
            }
            if (isset($lightbox_type)) {
               switch (esc_attr($lightbox_type)) {
                  case "lightcase":
                     wp_enqueue_style("lightcase.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "user-views/assets/lightboxes/lightcase/css/lightcase.css");
                     wp_enqueue_script("lightcase.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "user-views/assets/lightboxes/lightcase/js/lightcase.js");
                     break;
               }
            }
            if (file_exists(PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "includes/galleries/translations.php")) {
               include PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "includes/galleries/translations.php";
            }
            if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/style-sheet.php")) {
               include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/style-sheet.php";
            }
            if ($gallery_title == "show") {
               ?>
               <div id="gallery_title_container_<?php echo $random; ?>" class="gallery_title_container">
                  <<?php echo $gallery_title_html_tag; ?>>
                  <?php echo isset($display_gallery_data["gallery_title"]) ? htmlspecialchars_decode($display_gallery_data["gallery_title"]) : ""; ?>
                  </<?php echo $gallery_title_html_tag; ?>>
               </div>
               <?php
            }
            if ($gallery_description == "show") {
               ?>
               <div id="gallery_desc_container_<?php echo $random; ?>" class="gallery_desc_container">
                  <<?php echo $gallery_desc_html_tag; ?>>
                  <?php echo isset($display_gallery_data["gallery_description"]) ? htmlspecialchars_decode($display_gallery_data["gallery_description"]) : ""; ?>
                  </<?php echo $gallery_desc_html_tag; ?>>
               </div>
               <?php
            }
            if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/scripts-before.php")) {
               include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "user-views/includes/galleries/scripts-before.php";
            }
            ?>
            <div id="grid_layout_container_<?php echo $random; ?>">
               <?php
               switch (esc_attr($layout_type)) {
                  case "thumbnail_layout" :
                     if (file_exists(PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "layouts/thumbnail-layout/thumbnail-layout.php")) {
                        include PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "layouts/thumbnail-layout/thumbnail-layout.php";
                     }
                     break;

                  case "masonry_layout" :
                     if (file_exists(PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "layouts/masonry-layout/masonry-layout.php")) {
                        include PHOTO_GALLERY_PLUS_USER_VIEWS_PATH . "layouts/masonry-layout/masonry-layout.php";
                     }
                     wp_enqueue_script("imageloaded.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "user-views/assets/layouts/isotope-master/imageloaded.js");
                     wp_enqueue_script("isotope.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "user-views/assets/layouts/isotope-master/isotope.js");
                     break;
               }
            }
         }
         ?>
      </div>
   </div>
</div>
<?php
if (isset($animation_effects)) {
    wp_enqueue_style("photo-gallery-plus-animation-effects.css", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "user-views/assets/css/animation-effects/pgp-animation-effects.css");
    wp_enqueue_script("photo-gallery-animation-effects.js", PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "user-views/assets/js/scrolla.jquery.min.js");
}