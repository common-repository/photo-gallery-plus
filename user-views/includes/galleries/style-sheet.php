<?php
/**
 * This file is used for css.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/user-views/includes/galleries
 * @version	1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
if (isset($id)) {
   //TODO: Code for General Options
   if (isset($layout_type)) {
      switch (esc_attr($layout_type)) {
         case "thumbnail_layout" :
            //font families extract from database
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_gallery_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_gallery_description_font_family"]) : "Roboto Slab:300";
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_family"]) : "Roboto Slab:300";

            //code for importing google fonts url
            $unique_font_families_layout = array_unique($font_families_layout);
            $import_font_family_layout = user_helper_photo_gallery_plus::unique_font_families_photo_gallery_plus($unique_font_families_layout);
            $font_family_name_layout = user_helper_photo_gallery_plus::font_families_photo_gallery_plus($font_families_layout);

            //code for extracting thumbnail layout settiings
            $thumbnail_layout_thumbnail_dimensions = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_dimensions"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_dimensions"]) : "250,200";
            $thumbnail_layout_thumbnail_margin = isset($thumbnail_layout_settings["thumbnail_layout_general_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_margin"]) : array(10, 0, 0, 10);
            $thumbnail_layout_thumbnail_padding = isset($thumbnail_layout_settings["thumbnail_layout_general_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_padding"]) : array(0, 0, 0, 0);
            $thumbnail_layout_thumbnail_border_width = isset($thumbnail_layout_settings["thumbnail_layout_general_border_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_border_style"]) : array("0", "none", "#000000");
            $thumbnail_layout_general_border_radius = isset($thumbnail_layout_settings["thumbnail_layout_general_border_radius"]) ? intval($thumbnail_layout_settings["thumbnail_layout_general_border_radius"]) : 0;
            $thumbnail_layout_box_shadow = isset($thumbnail_layout_settings["thumbnail_layout_general_shadow"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_shadow"]) : array(0, 0, 0, 0);
            $thumbnail_layout_box_shadow_color = isset($thumbnail_layout_settings["thumbnail_layout_general_shadow_color"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_general_shadow_color"]) : "#000000";
            $thumbnail_layout_general_transition_time = isset($thumbnail_layout_settings["thumbnail_layout_general_transition_time"]) ? intval($thumbnail_layout_settings["thumbnail_layout_general_transition_time"]) : 1;
            $thumbnail_layout_background_color_transparency = isset($thumbnail_layout_settings["thumbnail_layout_general_background_color_transparency"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_background_color_transparency"]) : array("#ebe8eb", "50");
            $thumbnail_layout_background_color = $thumbnail_layout_background_color_transparency[0] != "" ? user_helper_photo_gallery_plus::hex2rgb_photo_gallery_plus($thumbnail_layout_background_color_transparency[0]) : array("", "", "");
            $thumbnail_layout_background_transparency = $thumbnail_layout_background_color_transparency[1] / 100;
            $thumbnail_layout_general_thumbnail_opacity = isset($thumbnail_layout_settings["thumbnail_layout_general_thumbnail_opacity"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_general_thumbnail_opacity"] / 100) : 1;
            $thumbnail_layout_max_width = $columns != 0 ? ($thumbnail_layout_thumbnail_dimensions[0] + ($thumbnail_layout_thumbnail_margin[1] + $thumbnail_layout_thumbnail_margin[3]) + ($thumbnail_layout_thumbnail_padding[1] + $thumbnail_layout_thumbnail_padding[3]) + ($thumbnail_layout_thumbnail_border_width[0] * 2)) * $columns + 25 : "100%";
            $hover_effect = isset($thumbnail_layout_settings["thumbnail_layout_general_hover_effect_value"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_general_hover_effect_value"]) : array("none", "0", "0", "0");
            if (isset($hover_effect[0])) {
               switch (esc_attr($hover_effect[0])) {
                  case "skew":
                  case "rotate":
                     $thumbnail_layout_hover_effect = $hover_effect[0] . "(" . $hover_effect[1] . "deg)";
                     break;
                  case "scale":
                     $thumbnail_layout_hover_effect = $hover_effect[0] . "(" . $hover_effect[2] . " , " . $hover_effect[3] . ")";
                     break;
                  case "none":
                     $thumbnail_layout_hover_effect = "none";
                     break;
               }
            }
            $thumbnail_layout_alignment = isset($alignment) ? esc_attr($alignment) : "left";
            switch (esc_attr($thumbnail_layout_alignment)) {
               case "left":
                  $thumbnail_text_alignment = "float: left !important;";
                  break;
               case "center":
                  $thumbnail_text_alignment = "margin-left: auto !important;";
                  $thumbnail_text_alignment .= "margin-right: auto !important;";
                  break;
               case "right":
                  $thumbnail_text_alignment = "float: right !important;";
                  break;
            }
            $thumbnail_layout_gallery_title_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_html_tag"]) : "h2";
            $thumbnail_layout_gallery_title_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_text_alignment"]) : "left";
            $thumbnail_layout_gallery_title_font_style = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_title_font_style"]) : array(20, "#000000");
            $thumbnail_layout_gallery_title_margin = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_title_margin"]) : array(10, 0, 10, 0);
            $thumbnail_layout_gallery_title_padding = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_title_padding"]) : array(10, 0, 10, 0);
            $thumbnail_layout_gallery_title_line_height = isset($thumbnail_layout_settings["thumbnail_layout_gallery_title_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_title_line_height"]) : "1.7em";

            $thumbnail_layout_gallery_desc_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_html_tag"]) : "h3";
            $thumbnail_layout_gallery_desc_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_text_alignment"]) : "left";
            $thumbnail_layout_gallery_desc_font_style = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_description_font_style"]) : array(16, "#787D85");
            $thumbnail_layout_gallery_desc_margin = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_description_margin"]) : array(10, 0, 10, 0);
            $thumbnail_layout_gallery_desc_padding = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_gallery_description_padding"]) : array(0, 0, 10, 0);
            $thumbnail_layout_gallery_desc_line_height = isset($thumbnail_layout_settings["thumbnail_layout_gallery_description_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_gallery_description_line_height"]) : "1.7em";

            $thumbnail_layout_thumbnail_title_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_html_tag"]) : "h3";
            $thumbnail_layout_thumbnail_title_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_text_alignment"]) : "left";
            $thumbnail_layout_thumbnail_title_font_style = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_title_font_style"]) : array(14, "#787D85");
            $thumbnail_layout_thumbnail_title_margin = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_title_margin"]) : array(0, 5, 0, 5);
            $thumbnail_layout_thumbnail_title_padding = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_title_padding"]) : array(10, 10, 10, 10);
            $thumbnail_layout_thumbnail_title_line_height = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_title_line_height"]) : "1.7em";

            $thumbnail_layout_thumbnail_description_html_tag = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_html_tag"]) : "p";
            $thumbnail_layout_thumbnail_description_text_alignment = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_text_alignment"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_text_alignment"]) : "left";
            $thumbnail_layout_thumbnail_desc_font_style = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_style"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_description_font_style"]) : array(12, "#787D85");
            $thumbnail_layout_thumbnail_desc_margin = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_margin"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_description_margin"]) : array(0, 5, 0, 5);
            $thumbnail_layout_thumbnail_desc_padding = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_padding"]) ? explode(",", $thumbnail_layout_settings["thumbnail_layout_thumbnail_description_padding"]) : array(5, 10, 10, 5);
            $thumbnail_layout_thumbnail_desc_line_height = isset($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_line_height"]) ? esc_attr($thumbnail_layout_settings["thumbnail_layout_thumbnail_description_line_height"]) : "1.7em";
            break;

         case "masonry_layout" :
            //font families extract from database
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_gallery_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_gallery_description_font_family"]) : "Roboto Slab:300";
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_thumbnail_title_font_family"]) : "Roboto Slab:700";
            $font_families_layout[] = isset($masonry_layout_settings["masonry_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($masonry_layout_settings["masonry_layout_thumbnail_description_font_family"]) : "Roboto Slab:300";

            //code for importing google fonts url
            $unique_font_families_layout = array_unique($font_families_layout);
            $import_font_family_layout = user_helper_photo_gallery_plus::unique_font_families_photo_gallery_plus($unique_font_families_layout);
            $font_family_name_layout = user_helper_photo_gallery_plus::font_families_photo_gallery_plus($font_families_layout);

            $masonry_layout_thumbnail_width = isset($masonry_layout_settings["masonry_layout_general_thumbnail_width"]) ? intval($masonry_layout_settings["masonry_layout_general_thumbnail_width"]) : "250";
            $masonry_layout_thumbnail_margin = isset($masonry_layout_settings["masonry_layout_general_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_margin"]) : array(15, 15, 0, 0);
            $masonry_layout_thumbnail_padding = isset($masonry_layout_settings["masonry_layout_general_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_padding"]) : array(0, 0, 0, 0);
            $masonry_layout_thumbnail_border_style = isset($masonry_layout_settings["masonry_layout_general_border_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_border_style"]) : array("0", "solid", "#cccccc");
            $masonry_layout_thumbnail_background_color_transparency = isset($masonry_layout_settings["masonry_layout_general_background_color_transparency"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_background_color_transparency"]) : array("#ebe8eb", "50");
            $masonry_layout_thumbnail_background_color = $masonry_layout_thumbnail_background_color_transparency[0] != "" ? user_helper_photo_gallery_plus::hex2rgb_photo_gallery_plus($masonry_layout_thumbnail_background_color_transparency[0]) : array("", "", "");
            $masonry_layout_thumbnail_background_transparency = $masonry_layout_thumbnail_background_color_transparency[1] / 100;
            $masonry_layout_thumbnail_opacity = isset($masonry_layout_settings["masonry_layout_general_masonry_opacity"]) ? floatval($masonry_layout_settings["masonry_layout_general_masonry_opacity"] / 100) : "1";
            $masonry_layout_thumbnail_border_radius = isset($masonry_layout_settings["masonry_layout_general_border_radius"]) ? intval($masonry_layout_settings["masonry_layout_general_border_radius"]) : 0;
            $masonry_layout_thumbnail_box_shadow = isset($masonry_layout_settings["masonry_layout_general_shadow"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_shadow"]) : array(0, 0, 0, 0);
            $masonry_layout_thumbnail_box_shadow_color = isset($masonry_layout_settings["masonry_layout_general_shadow_color"]) ? esc_attr($masonry_layout_settings["masonry_layout_general_shadow_color"]) : "#000000";
            $masonry_layout_thumbnail_transition_time = isset($masonry_layout_settings["masonry_layout_general_transition_time"]) ? intval($masonry_layout_settings["masonry_layout_general_transition_time"]) : 1;
            $masonry_layout_thumbnail_hover_effect = isset($masonry_layout_settings["masonry_layout_general_hover_effect_value"]) ? explode(",", $masonry_layout_settings["masonry_layout_general_hover_effect_value"]) : array("none", 0, 0, 0);
            if (isset($masonry_layout_thumbnail_hover_effect[0])) {
               switch (esc_attr($masonry_layout_thumbnail_hover_effect[0])) {
                  case "skew":
                  case "rotate":
                     $masonry_layout_thumbnail_general_hover_effect = $masonry_layout_thumbnail_hover_effect[0] . "(" . $masonry_layout_thumbnail_hover_effect[1] . "deg)";
                     break;
                  case "scale":
                     $masonry_layout_thumbnail_general_hover_effect = $masonry_layout_thumbnail_hover_effect[0] . "(" . $masonry_layout_thumbnail_hover_effect[2] . " , " . $masonry_layout_thumbnail_hover_effect[3] . ")";
                     break;
                  case "none":
                     $masonry_layout_thumbnail_general_hover_effect = "none";
                     break;
               }
            }
            $masonry_alignment = isset($alignment) ? esc_attr($alignment) : "left";
            switch (esc_attr($masonry_alignment)) {
               case "left":
                  $masonry_text_alignment = "text-align: left !important;";
                  break;
               case "center":
                  $masonry_text_alignment = "margin-left: auto !important;";
                  $masonry_text_alignment .= "margin-right: auto !important;";
                  break;
               case "right":
                  $masonry_text_alignment = "text-align: right !important;";
                  break;
            }
            $masonry_layout_max_width = $columns != 0 ? ($masonry_layout_thumbnail_width + ($masonry_layout_thumbnail_margin[1] + $masonry_layout_thumbnail_margin[3]) + ($masonry_layout_thumbnail_padding[1] + $masonry_layout_thumbnail_padding[3]) + ($masonry_layout_thumbnail_border_style[0] * 2)) * $columns : "100%";


            $masonry_layout_gallery_title_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_html_tag"]) : "h2";
            $masonry_layout_gallery_title_text_alignment = isset($masonry_layout_settings["masonry_layout_gallery_title_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_text_alignment"]) : "left";
            $masonry_layout_gallery_title_font_style = isset($masonry_layout_settings["masonry_layout_gallery_title_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_title_font_style"]) : array(20, "#000000");
            $masonry_layout_gallery_title_margin = isset($masonry_layout_settings["masonry_layout_gallery_title_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_title_margin"]) : array(10, 0, 10, 0);
            $masonry_layout_gallery_title_padding = isset($masonry_layout_settings["masonry_layout_gallery_title_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_title_padding"]) : array(10, 0, 10, 0);
            $masonry_layout_gallery_title_line_height = isset($masonry_layout_settings["masonry_layout_gallery_title_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_title_line_height"]) : "1.7em";

            $masonry_layout_gallery_description_html_tag = isset($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_html_tag"]) : "h3";
            $masonry_layout_gallery_description_text_alignment = isset($masonry_layout_settings["masonry_layout_gallery_description_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_text_alignment"]) : "left";
            $masonry_layout_gallery_description_font_style = isset($masonry_layout_settings["masonry_layout_gallery_description_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_description_font_style"]) : array(16, "#787D85");
            $masonry_layout_gallery_description_margin = isset($masonry_layout_settings["masonry_layout_gallery_description_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_description_margin"]) : array(10, 0, 10, 0);
            $masonry_layout_gallery_description_padding = isset($masonry_layout_settings["masonry_layout_gallery_description_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_gallery_description_padding"]) : array(0, 0, 10, 0);
            $masonry_layout_gallery_description_line_height = isset($masonry_layout_settings["masonry_layout_gallery_description_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_gallery_description_line_height"]) : "1.7em";

            $masonry_layout_thumbnail_title_html_tag = isset($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_html_tag"]) : "h3";
            $masonry_layout_thumbnail_title_text_alignment = isset($masonry_layout_settings["masonry_layout_thumbnail_title_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_text_alignment"]) : "left";
            $masonry_layout_thumbnail_title_font_style = isset($masonry_layout_settings["masonry_layout_thumbnail_title_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_title_font_style"]) : array(14, "#787D85");
            $masonry_layout_thumbnail_title_margin = isset($masonry_layout_settings["masonry_layout_thumbnail_title_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_title_margin"]) : array(0, 5, 0, 5);
            $masonry_layout_thumbnail_title_padding = isset($masonry_layout_settings["masonry_layout_thumbnail_title_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_title_padding"]) : array(10, 10, 10, 10);
            $masonry_layout_thumbnail_title_line_height = isset($masonry_layout_settings["masonry_layout_thumbnail_title_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_title_line_height"]) : "1.7em";

            $masonry_layout_thumbnail_description_html_tag = isset($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_html_tag"]) : "p";
            $masonry_layout_thumbnail_description_text_alignment = isset($masonry_layout_settings["masonry_layout_thumbnail_description_text_alignment"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_text_alignment"]) : "left";
            $masonry_layout_thumbnail_description_font_style = isset($masonry_layout_settings["masonry_layout_thumbnail_description_font_style"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_description_font_style"]) : array(12, "#787D85");
            $masonry_layout_thumbnail_description_margin = isset($masonry_layout_settings["masonry_layout_thumbnail_description_margin"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_description_margin"]) : array(0, 5, 0, 5);
            $masonry_layout_thumbnail_description_padding = isset($masonry_layout_settings["masonry_layout_thumbnail_description_padding"]) ? explode(",", $masonry_layout_settings["masonry_layout_thumbnail_description_padding"]) : array(5, 10, 10, 5);
            $masonry_layout_thumbnail_description_line_height = isset($masonry_layout_settings["masonry_layout_thumbnail_description_line_height"]) ? esc_attr($masonry_layout_settings["masonry_layout_thumbnail_description_line_height"]) : "1.7em";
            break;
      }
   }
   if (isset($lightbox_type)) {
      switch (esc_attr($lightbox_type)) {
         case "lightcase":
            //font families extract from database
            $font_families_lightbox[] = isset($pgp_lightcase_meta_data["lightcase_counter_font_family"]) ? htmlspecialchars_decode($pgp_lightcase_meta_data["lightcase_counter_font_family"]) : "Roboto Slab:300";
            $font_families_lightbox[] = isset($pgp_lightcase_meta_data["lightcase_image_title_font_family"]) ? htmlspecialchars_decode($pgp_lightcase_meta_data["lightcase_image_title_font_family"]) : "Roboto Slab:700";
            $font_families_lightbox[] = isset($pgp_lightcase_meta_data["lightcase_image_description_font_family"]) ? htmlspecialchars_decode($pgp_lightcase_meta_data["lightcase_image_description_font_family"]) : "Roboto Slab:300";

            //code for importing google fonts url
            $unique_font_families_lightbox = array_unique($font_families_lightbox);
            $import_font_family_lightbox = user_helper_photo_gallery_plus::unique_font_families_photo_gallery_plus($unique_font_families_lightbox);
            $lightcase_font_family_name = user_helper_photo_gallery_plus::font_families_photo_gallery_plus($font_families_lightbox);

            //code for extracting lightcase lightbox settings
            $lightcase_onoverlay_color = isset($pgp_lightcase_meta_data["lightcase_onoverlay_color"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_onoverlay_color"]) : "#000000";
            $lightcase_settings_overlay_color = isset($lightcase_onoverlay_color) != "" ? user_helper_photo_gallery_plus::hex2rgb_photo_gallery_plus($lightcase_onoverlay_color) : array("", "", "");
            $lightcase_settings_overlay_opacity = isset($pgp_lightcase_meta_data["lightcase_onoverlay_opacity"]) ? floatval($pgp_lightcase_meta_data["lightcase_onoverlay_opacity"]) / 100 : 0.75;
            $lightcase_settings_buttons_font_style = isset($pgp_lightcase_meta_data["lightcase_button_font_style"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_button_font_style"]) : array(30, "#ffffff");
            $lightcase_settings_close_button = isset($pgp_lightcase_meta_data["lightcase_close_button"]) && $pgp_lightcase_meta_data["lightcase_close_button"] == "hide" ? "none" : "block";
            $lightcase_settings_image_counter = isset($pgp_lightcase_meta_data["lightcase_image_counter"]) && $pgp_lightcase_meta_data["lightcase_image_counter"] == "show" ? "block" : "none";
            $lightcase_settings_counter_font_style = isset($pgp_lightcase_meta_data["lightcase_counter_font_style"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_counter_font_style"]) : array(10, "#ffffff");
            $lightcase_settings_border_style = isset($pgp_lightcase_meta_data["lightcase_border"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_border"]) : array(0, "none", "#ffffff");
            $lightcase_settings_border_radius = isset($pgp_lightcase_meta_data["lightcase_border_radius"]) ? intval($pgp_lightcase_meta_data["lightcase_border_radius"]) : 0;

            $lightcase_image_title = isset($pgp_lightcase_meta_data["lightcase_image_title"]) && $pgp_lightcase_meta_data["lightcase_image_title"] == "false" ? "none" : "block";
            $lightcase_image_title_text_alignment = isset($pgp_lightcase_meta_data["lightcase_image_title_text_alignment"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_title_text_alignment"]) : "center";
            $lightcase_image_title_font_style = isset($pgp_lightcase_meta_data["lightcase_image_title_font_style"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_image_title_font_style"]) : array(15, "#ffffff");
            $lightcase_image_title_margin = isset($pgp_lightcase_meta_data["lightcase_image_title_margin"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_image_title_margin"]) : array(5, 0, 5, 0);
            $lightcase_image_title_padding = isset($pgp_lightcase_meta_data["lightcase_image_title_padding"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_image_title_padding"]) : array(0, 0, 0, 0);

            $lightcase_image_desc = isset($pgp_lightcase_meta_data["lightcase_image_description"]) && $pgp_lightcase_meta_data["lightcase_image_description"] == "false" ? "none" : "block";
            $lightcase_image_desc_text_alignment = isset($pgp_lightcase_meta_data["lightcase_image_description_text_alignment"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_description_text_alignment"]) : "center";
            $lightcase_image_desc_font_style = isset($pgp_lightcase_meta_data["lightcase_image_description_font_style"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_image_description_font_style"]) : array(12, "#ffffff");
            $lightcase_image_desc_margin = isset($pgp_lightcase_meta_data["lightcase_image_description_margin"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_image_description_margin"]) : array(5, 0, 5, 0);
            $lightcase_image_desc_padding = isset($pgp_lightcase_meta_data["lightcase_image_description_padding"]) ? explode(",", $pgp_lightcase_meta_data["lightcase_image_description_padding"]) : array(0, 0, 0, 0);
            break;
      }
   }
   ?>
   <style type="text/css">
   <?php
   echo isset($import_font_family_layout) ? $import_font_family_layout : "";
   echo isset($import_font_family_lightbox) ? $import_font_family_lightbox : "";
   ?>
   .ux_div_empty_search_results
    {
       display:none;
       text-align:center !important;
       clear:both !important;
    }
   <?php
   if (isset($layout_type)) {
      switch ($layout_type) {
         case "thumbnail_layout" :
            ?>
               #photo_gallery_plus_main_container_<?php echo $random; ?>
               {
                  width: 100% !important;
                  max-width: <?php echo $thumbnail_layout_max_width; ?>px !important;
            <?php echo $thumbnail_text_alignment; ?>
               }
               .gallery_title_container <?php echo $thumbnail_layout_gallery_title_html_tag; ?>
               {
                  line-height: <?php echo $thumbnail_layout_gallery_title_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_gallery_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_gallery_title_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_gallery_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_gallery_title_margin[0]); ?>px <?php echo intval($thumbnail_layout_gallery_title_margin[1]); ?>px <?php echo intval($thumbnail_layout_gallery_title_margin[2]); ?>px <?php echo intval($thumbnail_layout_gallery_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_gallery_title_padding[0]); ?>px <?php echo intval($thumbnail_layout_gallery_title_padding[1]); ?>px <?php echo intval($thumbnail_layout_gallery_title_padding[2]); ?>px <?php echo intval($thumbnail_layout_gallery_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[0]; ?>
               }
               .gallery_desc_container <?php echo $thumbnail_layout_gallery_desc_html_tag; ?>
               {
                  line-height: <?php echo $thumbnail_layout_gallery_desc_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_gallery_desc_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_gallery_desc_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_gallery_desc_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_gallery_desc_margin[0]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_margin[1]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_margin[2]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_gallery_desc_padding[0]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_padding[1]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_padding[2]); ?>px <?php echo intval($thumbnail_layout_gallery_desc_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[1]; ?>

               }
               .grid_wrapper_item
               {
                  display: inline-block !important;
                  vertical-align: top !important;
                  margin: <?php echo intval($thumbnail_layout_thumbnail_margin[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_margin[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_margin[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_thumbnail_padding[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_padding[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_padding[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_padding[3]); ?>px !important;
                  box-shadow: <?php echo intval($thumbnail_layout_box_shadow[0]); ?>px <?php echo intval($thumbnail_layout_box_shadow[1]); ?>px <?php echo intval($thumbnail_layout_box_shadow[2]); ?>px <?php echo intval($thumbnail_layout_box_shadow[3]); ?>px <?php echo $thumbnail_layout_box_shadow_color; ?> !important;
                  -webkit-box-shadow: <?php echo intval($thumbnail_layout_box_shadow[0]); ?>px <?php echo intval($thumbnail_layout_box_shadow[1]); ?>px <?php echo intval($thumbnail_layout_box_shadow[2]); ?>px <?php echo intval($thumbnail_layout_box_shadow[3]); ?>px <?php echo $thumbnail_layout_box_shadow_color; ?> !important;
                  -moz-box-shadow: <?php echo intval($thumbnail_layout_box_shadow[0]); ?>px <?php echo intval($thumbnail_layout_box_shadow[1]); ?>px <?php echo intval($thumbnail_layout_box_shadow[2]); ?>px <?php echo intval($thumbnail_layout_box_shadow[3]); ?>px <?php echo $thumbnail_layout_box_shadow_color; ?> !important;
                  overflow: hidden !important;
               }
               #grid_layout_container_<?php echo $random; ?>
               {
                  clear: both !important;
               }
               .grid_item_image
               {
                  opacity: <?php echo $thumbnail_layout_general_thumbnail_opacity; ?> !important;
                  width: <?php echo intval($thumbnail_layout_thumbnail_dimensions[0]); ?>px !important;
                  height: <?php echo intval($thumbnail_layout_thumbnail_dimensions[1]); ?>px !important;
                  background-position: center center;
                  overflow: hidden !important;
                  border: <?php echo intval($thumbnail_layout_thumbnail_border_width[0]); ?>px <?php echo esc_attr($thumbnail_layout_thumbnail_border_width[1]); ?> <?php echo esc_attr($thumbnail_layout_thumbnail_border_width[2]); ?> !important;
                  border-radius: <?php echo $thumbnail_layout_general_border_radius; ?>px !important;
                  -webkit-border-radius: <?php echo $thumbnail_layout_general_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $thumbnail_layout_general_border_radius; ?>px !important;
               }
               .grid_item_image img
               {
                  display: none !important;
               }
               .grid_item_image:hover
               {
                  transition: <?php echo $thumbnail_layout_general_transition_time; ?>s !important;
                  transform : <?php echo $thumbnail_layout_hover_effect; ?> !important;
               }
               .grid_content_item
               {
                  width: <?php echo intval($thumbnail_layout_thumbnail_dimensions[0]); ?>px !important;
            <?php
            if ($thumbnail_layout_background_color_transparency[0] != "") {
               ?>
                     background: rgba(<?php echo intval($thumbnail_layout_background_color[0]); ?>,<?php echo intval($thumbnail_layout_background_color[1]); ?>,<?php echo intval($thumbnail_layout_background_color[2]); ?>,<?php echo floatval($thumbnail_layout_background_transparency); ?>) !important;
               <?php
            }
            ?>
               }
               .grid_single_text_title <?php echo $thumbnail_layout_thumbnail_title_html_tag; ?>
               {
                  display: block !important;
                  line-height: <?php echo $thumbnail_layout_thumbnail_title_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_thumbnail_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_thumbnail_title_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_thumbnail_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_thumbnail_title_margin[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_margin[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_margin[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_thumbnail_title_padding[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_padding[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_padding[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[2]; ?>
               }
               .grid_single_text_desc <?php echo $thumbnail_layout_thumbnail_description_html_tag; ?>
               {
                  display: block !important;
                  line-height: <?php echo $thumbnail_layout_thumbnail_desc_line_height; ?> !important;
                  text-align: <?php echo $thumbnail_layout_thumbnail_description_text_alignment; ?> !important;
                  font-size: <?php echo intval($thumbnail_layout_thumbnail_desc_font_style[0]); ?>px !important;
                  color : <?php echo esc_attr($thumbnail_layout_thumbnail_desc_font_style[1]); ?> !important;
                  margin: <?php echo intval($thumbnail_layout_thumbnail_desc_margin[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_margin[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_margin[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_margin[3]); ?>px !important;
                  padding: <?php echo intval($thumbnail_layout_thumbnail_desc_padding[0]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_padding[1]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_padding[2]); ?>px <?php echo intval($thumbnail_layout_thumbnail_desc_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[3]; ?>
               }
            <?php
            break;

         case "masonry_layout" :
            ?>
               #photo_gallery_plus_main_container_<?php echo $random; ?>
               {
                  max-width: <?php echo $masonry_layout_max_width; ?>px !important;
            <?php echo $masonry_text_alignment; ?>
               }
               .gallery_title_container <?php echo $masonry_layout_gallery_title_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_gallery_title_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_gallery_title_text_alignment; ?>!important;
                  font-size: <?php echo intval($masonry_layout_gallery_title_font_style[0]) ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_gallery_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_gallery_title_margin[0]); ?>px <?php echo intval($masonry_layout_gallery_title_margin[1]) ?>px <?php echo intval($masonry_layout_gallery_title_margin[2]); ?>px <?php echo intval($masonry_layout_gallery_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_gallery_title_padding[0]); ?>px <?php echo intval($masonry_layout_gallery_title_padding[1]); ?>px <?php echo intval($masonry_layout_gallery_title_padding[2]); ?>px <?php echo intval($masonry_layout_gallery_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[0]; ?>
               }
               .gallery_desc_container <?php echo $masonry_layout_gallery_description_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_gallery_description_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_gallery_description_text_alignment; ?> !important;
                  font-size: <?php echo intval($masonry_layout_gallery_description_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_gallery_description_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_gallery_description_margin[0]); ?>px <?php echo intval($masonry_layout_gallery_description_margin[1]); ?>px <?php echo intval($masonry_layout_gallery_description_margin[2]); ?>px <?php echo intval($masonry_layout_gallery_description_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_gallery_description_padding[0]); ?>px <?php echo intval($masonry_layout_gallery_description_padding[1]); ?>px <?php echo intval($masonry_layout_gallery_description_padding[2]); ?>px <?php echo intval($masonry_layout_gallery_description_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[1]; ?>
               }
               .masonry_grid_layout_container
               {
                  clear:both !important;
               }
               .masonry_grid_wrapper_item
               {
            <?php
            if ($masonry_layout_thumbnail_background_color_transparency[0] != "") {
               ?>
                     background: rgba(<?php echo intval($masonry_layout_thumbnail_background_color[0]); ?>,<?php echo intval($masonry_layout_thumbnail_background_color[1]); ?>,<?php echo intval($masonry_layout_thumbnail_background_color[2]); ?>,<?php echo floatval($masonry_layout_thumbnail_background_transparency); ?>) !important;
               <?php
            }
            ?>
                  margin: <?php echo intval($masonry_layout_thumbnail_margin[0]); ?>px <?php echo intval($masonry_layout_thumbnail_margin[1]); ?>px <?php echo intval($masonry_layout_thumbnail_margin[2]); ?>px <?php echo intval($masonry_layout_thumbnail_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_thumbnail_padding[0]); ?>px <?php echo intval($masonry_layout_thumbnail_padding[1]); ?>px <?php echo intval($masonry_layout_thumbnail_padding[2]); ?>px <?php echo intval($masonry_layout_thumbnail_padding[3]); ?>px !important;
                  overflow: hidden !important;
                  box-shadow: <?php echo intval($masonry_layout_thumbnail_box_shadow[0]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[1]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[2]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[3]); ?>px <?php echo $masonry_layout_thumbnail_box_shadow_color; ?>!important;
                  -webkit-box-shadow: <?php echo intval($masonry_layout_thumbnail_box_shadow[0]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[1]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[2]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[3]); ?>px <?php echo $masonry_layout_thumbnail_box_shadow_color; ?>!important;
                  -moz-box-shadow: <?php echo intval($masonry_layout_thumbnail_box_shadow[0]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[1]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[2]); ?>px <?php echo intval($masonry_layout_thumbnail_box_shadow[3]); ?>px <?php echo $masonry_layout_thumbnail_box_shadow_color; ?>!important;
               }
               .masonry_grid_item_image
               {
                  width: <?php echo $masonry_layout_thumbnail_width; ?>px !important;
                  opacity: <?php echo $masonry_layout_thumbnail_opacity; ?> !important;
               }
               .masonry_grid_item_image:hover
               {
                  transition: <?php echo $masonry_layout_thumbnail_transition_time; ?>s !important;
                  transform: <?php echo $masonry_layout_thumbnail_general_hover_effect; ?> !important;
               }
               .masonry_grid_item_image img
               {
                  border: <?php echo intval($masonry_layout_thumbnail_border_style[0]); ?>px <?php echo esc_attr($masonry_layout_thumbnail_border_style[1]); ?> <?php echo esc_attr($masonry_layout_thumbnail_border_style[2]); ?> !important;
                  border-radius: <?php echo $masonry_layout_thumbnail_border_radius; ?>px !important;
                  -webkit-border-radius: <?php echo $masonry_layout_thumbnail_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $masonry_layout_thumbnail_border_radius; ?>px !important;
                  width: <?php echo $masonry_layout_thumbnail_width; ?>px !important;
               }
               .masonry_grid_content_item
               {
                  width: <?php echo $masonry_layout_thumbnail_width; ?>px !important;
               }
               .masonry_grid_single_text_title <?php echo $masonry_layout_thumbnail_title_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_thumbnail_title_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_thumbnail_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($masonry_layout_thumbnail_title_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_thumbnail_title_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_thumbnail_title_margin[0]); ?>px <?php echo intval($masonry_layout_thumbnail_title_margin[1]); ?>px <?php echo intval($masonry_layout_thumbnail_title_margin[2]); ?>px <?php echo intval($masonry_layout_thumbnail_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_thumbnail_title_padding[0]); ?>px <?php echo intval($masonry_layout_thumbnail_title_padding[1]); ?>px <?php echo intval($masonry_layout_thumbnail_title_padding[2]); ?>px <?php echo intval($masonry_layout_thumbnail_title_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[2]; ?>
               }
               .masonry_grid_single_text_desc <?php echo $masonry_layout_thumbnail_description_html_tag; ?>
               {
                  line-height: <?php echo $masonry_layout_thumbnail_description_line_height; ?> !important;
                  text-align: <?php echo $masonry_layout_thumbnail_description_text_alignment; ?> !important;
                  font-size: <?php echo intval($masonry_layout_thumbnail_description_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($masonry_layout_thumbnail_description_font_style[1]); ?> !important;
                  margin: <?php echo intval($masonry_layout_thumbnail_description_margin[0]); ?>px <?php echo intval($masonry_layout_thumbnail_description_margin[1]); ?>px <?php echo intval($masonry_layout_thumbnail_description_margin[2]); ?>px <?php echo intval($masonry_layout_thumbnail_description_margin[3]); ?>px !important;
                  padding: <?php echo intval($masonry_layout_thumbnail_description_padding[0]); ?>px <?php echo intval($masonry_layout_thumbnail_description_padding[1]); ?>px <?php echo intval($masonry_layout_thumbnail_description_padding[2]); ?>px <?php echo intval($masonry_layout_thumbnail_description_padding[3]); ?>px !important;
                  font-family: <?php echo $font_family_name_layout[3]; ?>
               }
            <?php
            break;
      }
   }
   if (isset($lightbox_type)) {
      switch (esc_attr($lightbox_type)) {
         case "lightcase":
            ?>
               #lightcase-overlay {
                  display: none;
                  width: 100%;
                  height: 100%;
                  position: fixed;
                  z-index: 2000;
                  top: 0;
                  left: 0;
            <?php
            if ($lightcase_onoverlay_color != "") {
               ?>
                     background: rgba(<?php echo intval($lightcase_settings_overlay_color[0]); ?>,<?php echo intval($lightcase_settings_overlay_color[1]); ?>,<?php echo intval($lightcase_settings_overlay_color[2]); ?>,<?php echo $lightcase_settings_overlay_opacity; ?>) !important;
               <?php
            }
            ?>
               }
               #lightcase-case:not([data-lc-type=error]) #lightcase-content {
                  position: relative;
                  z-index: 1;
                  overflow: hidden;
                  text-shadow: none;
                  background-color: #fff;
                  -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                  -moz-box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                  -o-box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                  box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                  -webkit-backface-visibility: hidden;
                  border: <?php echo intval($lightcase_settings_border_style[0]); ?>px <?php echo esc_attr($lightcase_settings_border_style[1]); ?> <?php echo esc_attr($lightcase_settings_border_style[2]); ?> !important;
                  -webkit-border : <?php echo intval($lightcase_settings_border_style[0]); ?>px <?php echo esc_attr($lightcase_settings_border_style[1]); ?> <?php echo esc_attr($lightcase_settings_border_style[2]); ?> !important;
                  moz-border : <?php echo intval($lightcase_settings_border_style[0]); ?>px <?php echo esc_attr($lightcase_settings_border_style[1]); ?> <?php echo esc_attr($lightcase_settings_border_style[2]); ?> !important;
                  -webkit-border-radius: <?php echo $lightcase_settings_border_radius; ?>px !important;
                  -moz-border-radius: <?php echo $lightcase_settings_border_radius; ?>px !important;
                  border-radius: <?php echo $lightcase_settings_border_radius; ?>px !important;
               }
               lightcase-info #lightcase-title,
               #lightcase-info #lightcase-caption {
                  margin: 0;
                  padding: 0;
                  line-height: 1.5;
                  font-weight: normal;
                  text-overflow: ellipsis;
               }
               #lightcase-info #lightcase-caption {
                  clear: both;
               }
               .lightcase-icon-close{
                  font-size: <?php echo intval($lightcase_settings_buttons_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($lightcase_settings_buttons_font_style[1]); ?> !important;
                  display: <?php echo $lightcase_settings_close_button; ?> !important;
               }
               .lightcase-icon-prev{
                  font-size: <?php echo isset($lightcase_settings_buttons_font_style[0]) ? intval($lightcase_settings_buttons_font_style[0]) : "30"; ?>px !important;
                  color: <?php echo isset($lightcase_settings_buttons_font_style[1]) ? esc_attr($lightcase_settings_buttons_font_style[1]) : "#ffffff"; ?> !important;
               }
               .lightcase-icon-next{
                  font-size: <?php echo isset($lightcase_settings_buttons_font_style[0]) ? intval($lightcase_settings_buttons_font_style[0]) : "30"; ?>px !important;
                  color: <?php echo isset($lightcase_settings_buttons_font_style[1]) ? esc_attr($lightcase_settings_buttons_font_style[1]) : "#ffffff"; ?> !important;
               }
               #lightcase-sequenceInfo{
                  font-size :  <?php echo intval($lightcase_settings_counter_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($lightcase_settings_counter_font_style[1]); ?> !important;
                  display: <?php echo $lightcase_settings_image_counter; ?> !important;
                  font-family: <?php echo htmlspecialchars_decode($lightcase_font_family_name[0]); ?>
               }
               #lightcase-custom-title
               {
                  line-height: 1.7em !important;
                  text-align: <?php echo $lightcase_image_title_text_alignment; ?> !important;
                  font-size: <?php echo intval($lightcase_image_title_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($lightcase_image_title_font_style[1]); ?> !important;
                  display: <?php echo $lightcase_image_title; ?>;
                  margin: <?php echo intval($lightcase_image_title_margin[0]); ?>px <?php echo intval($lightcase_image_title_margin[1]); ?>px <?php echo intval($lightcase_image_title_margin[2]); ?>px <?php echo intval($lightcase_image_title_margin[3]); ?>px !important;
                  padding: <?php echo intval($lightcase_image_title_padding[0]); ?>px <?php echo intval($lightcase_image_title_padding[1]); ?>px <?php echo intval($lightcase_image_title_padding[2]); ?>px <?php echo intval($lightcase_image_title_padding[3]); ?>px!important;
                  font-family: <?php echo htmlspecialchars_decode($lightcase_font_family_name[1]); ?>
               }
               #lightcase-custom-caption
               {
                  line-height: 1.7em !important;
                  text-align: <?php echo $lightcase_image_desc_text_alignment; ?> !important;
                  font-size: <?php echo intval($lightcase_image_desc_font_style[0]); ?>px !important;
                  color: <?php echo esc_attr($lightcase_image_desc_font_style[1]); ?> !important;
                  display: <?php echo $lightcase_image_desc; ?>;
                  margin: <?php echo intval($lightcase_image_desc_margin[0]); ?>px <?php echo intval($lightcase_image_desc_margin[1]); ?>px <?php echo intval($lightcase_image_desc_margin[2]); ?>px <?php echo intval($lightcase_image_desc_margin[3]); ?>px !important;
                  padding: <?php echo intval($lightcase_image_desc_padding[0]); ?>px <?php echo intval($lightcase_image_desc_padding[1]); ?>px <?php echo intval($lightcase_image_desc_padding[2]); ?>px <?php echo intval($lightcase_image_desc_padding[3]); ?>px!important;
                  font-family: <?php echo htmlspecialchars_decode($lightcase_font_family_name[2]); ?>
               }
            <?php
            break;
      }
   }
   echo htmlspecialchars_decode($custom_css["custom_css"]);
   ?>
   </style>
   <?php
}