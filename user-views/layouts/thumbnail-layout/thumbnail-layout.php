<?php
/**
 * This file is used for Thumbnail Layout.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/user-views/layouts
 * @version	1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
} // Exit if accessed directly
?>
<div id="control_container_<?php echo $random; ?>" class="grid_layout_container">
   <?php
   if (isset($gallery_image_detail_only_included_images)) {
      if (count($gallery_image_detail_only_included_images) > 0) {
         foreach ($gallery_image_detail_only_included_images as $pic) {
            $no_lightbox_imageurl = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "1" ? "" : (isset($pic["redirect_url"]) ? esc_attr($pic["redirect_url"]) : "");
            $enable_redirect = $pic["enable_redirect"];
            $imageurl = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "1" ? PHOTO_GALLERY_PLUS_ORIGINAL_URL . esc_attr($pic["image_name"]) : (isset($pic["redirect_url"]) ? esc_attr($pic["redirect_url"]) : "");
            $target = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "0" ? "_blank" : "";
            $datarel_lightcase = isset($pic["enable_redirect"]) && $pic["enable_redirect"] != "1" ? 'lightcase_' . $random . '-data:myCollection' : '';
            ?>
            <div id="grid_wrapper_item_<?php echo $random . "_" . $pic["id"]; ?>" class="grid_wrapper_item pgp_animate" data-animate="<?php echo isset($animation_effects) ? $animation_effects : 'none'; ?>" data-duration="1.0s" data-delay="0.1s" data-offset="100">
               <?php
               if (isset($lightbox_type)) {
                  switch (esc_attr($lightbox_type)) {
                     case "no_lightbox" :
                        if($enable_redirect == "1")
                        {
                        ?>
                            <a href="<?php echo $no_lightbox_imageurl; ?>" target="<?php echo $target; ?>">
                        <?php
                        }
                           break;
                        case "lightcase" :
                           ?>
                           <a href="<?php echo $imageurl; ?>" target="<?php echo $target; ?>" data-rel="<?php echo $datarel_lightcase; ?>" title="<?php echo esc_attr($pic["image_title"]); ?>" description="<?php echo esc_attr($pic["image_description"]); ?>">
                              <?php
                              break;
                        }
                     }
                     ?>
                     <div id="grid_item_image_<?php echo $random . "_" . $pic["id"]; ?>" class="grid_item_image" style="background:url('<?php echo PHOTO_GALLERY_PLUS_THUMBS_CROPPED_URL . esc_attr($pic["image_name"]); ?>');background-size:100% 100% !important;">
                        <img src="<?php echo PHOTO_GALLERY_PLUS_THUMBS_CROPPED_URL . esc_attr($pic["image_name"]); ?>" image_full_path="<?php echo $pic["file_type"] ?>" alt="<?php echo esc_attr($pic["alt_text"]); ?>" title="<?php echo esc_attr($pic["image_title"]); ?>" id="ux_pgp_file" name= "ux_pgp_file_<?php echo $random . "_" . $pic["id"]; ?>"/>
                     </div>
                  </a>
                  <div id="grid_content_item" class="grid_content_item">
                     <?php
                     if ($thumbnail_title == "show" && $pic["image_title"] != "") {
                        ?>
                        <div id="grid_single_text_title_<?php echo $random . "_" . $pic["id"]; ?>" class="grid_single_text_title">
                           <<?php echo isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) : "h3"; ?>>
                           <?php echo isset($pic["image_title"]) ? htmlspecialchars_decode($pic["image_title"]) : ""; ?>
                           </<?php echo isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) : "h3"; ?>>
                        </div>
                        <?php
                     }
                     if ($thumbnail_description == "show" && $pic["image_description"] != "") {
                        ?>
                        <div id="grid_single_text_desc_<?php echo $random; ?>" class="grid_single_text_desc">
                           <<?php echo isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) : "p"; ?>>
                           <?php echo isset($pic["image_description"]) ? htmlspecialchars_decode($pic["image_description"]) : ""; ?>
                           </<?php echo isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) : "p"; ?>>
                        </div>
                        <?php
                     }
                     ?>
                  </div>
            </div>
            <?php
         }
      }
   }
   ?>                     
</div>