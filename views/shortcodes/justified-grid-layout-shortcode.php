<?php
/**
 * Template to view and generate Shortcode for Justified Grid Layout Shortcode.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/shortcodes
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
   } elseif (shortcode_generator_photo_gallery_plus === "1") {
      ?>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-custom-home"></i>
               <a href="admin.php?page=manage_photo_gallery_plus">
                  <?php echo $photo_gallery_plus; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=pgp_thumbnail_layout_shortcode">
                  <?php echo $pgp_shortcode_generator; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_justified_grid_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-grid"></i>
                     <?php echo $pgp_justified_grid_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_justified_grid_layout">
                     <div class="form-body">
                        <div class="note note-warning">
                           <?php
                           if ($pgp_message_translate_help != "") {
                              ?>
                              <h4 class="block">
                                 <?php echo $pgp_important_disclaimer; ?>
                              </h4>
                              <p><strong><?php echo $pgp_message_translate_help; ?> <a href="javascript:void(0);" data-popup-open="ux_open_popup_translator" class="custom_links_feature" onclick="show_pop_up_photo_gallery_plus();"><?php echo $pgp_message_translate_here; ?></a></strong></p>
                              <?php
                           }
                           ?>
                           <h4 class="block">
                              <?php echo $pgp_take_galleries_further; ?>
                           </h4>
                           <p>
                              <?php echo $pgp_shortcodes_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $pgp_reset_shortcode; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div id="ux_div_justified_shortcode" class="ux_div_justified_shortcode" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $pgp_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $pgp_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_justified_generate_shortcode"></div>
                              <textarea class="form-control ux_txtarea_justified_generate_shortcode" readonly="true" name="ux_txtarea_justified_generate_shortcode" id="ux_txtarea_justified_generate_shortcode" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_choose_type; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_choose_type_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_type" name="ux_ddl_choose_type" class="form-control" onchange="shortcode_source_type_control_photo_gallery_plus('ux_ddl_choose_type', 'ux_div_gallery', 'ux_div_album', 'ux_div_show_hide_album'); generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value="gallery"><?php echo $pgp_gallery; ?></option>
                                    <option value="album"><?php echo $pgp_album; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group" id="ux_div_gallery">
                                 <label class="control-label">
                                    <?php echo $pgp_choose_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_choose_gallery_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_gallery" name="ux_ddl_choose_gallery" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value=""><?php echo $pgp_choose_gallery_title; ?></option>
                                    <?php
                                    foreach ($justified_grid_layout_title as $value) {
                                       ?>
                                       <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["gallery_title"]) && $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $pgp_untitled; ?></option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group" id="ux_div_album">
                                 <label class="control-label">
                                    <?php echo $pgp_choose_album_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_choose_album_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select id="ux_ddl_choose_album" name="ux_ddl_choose_album" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value=""><?php echo $pgp_choose_album_title; ?></option>
                                    <?php
                                    foreach ($justified_grid_layout_get_album_data as $value) {
                                       ?>
                                       <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["album_name"]) && $value["album_name"] != "" ? esc_attr($value["album_name"]) : $pgp_untitled_album; ?></option>
                                       <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" id="ux_div_album_type">
                           <label class="control-label">
                              <?php echo $pgp_choose_album_type; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_choose_album_type_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                           </label>
                           <select id="ux_ddl_choose_album_type" name="ux_ddl_choose_album_type" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                              <option value="compact_album"><?php echo $pgp_album_compact; ?></option>
                              <option value="extended_album"><?php echo $pgp_album_extended; ?></option>
                           </select>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_alignment_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_layout_settings_alignment_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_alignment" id="ux_ddl_alignment" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="left"><?php echo $pgp_left; ?></option>
                                       <option value="center"><?php echo $pgp_center; ?></option>
                                       <option value="right"><?php echo $pgp_right; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_justified_grid_shortcode_row_height ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_justified_grid_shortcode_row_height_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control input-inline" name="ux_txt_row_height" id="ux_txt_row_height" placeholder="<?php echo $pgp_justified_grid_shortcode_row_height_placeholder; ?>"  maxlength="3" onkeypress="digits_with_dot_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_row_height', 150); generate_shortcode_justified_grid_layout_photo_gallery_plus();" value="150">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_lightbox_type_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_type_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_lightbox_type" id="ux_ddl_lightbox_type" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="no_lightbox"><?php echo $pgp_no_light_box; ?></option>
                                       <option selected="selected" value="lightcase"><?php echo $pgp_lightcase; ?></option>
                                       <option value="fancy_box"><?php echo $pgp_fancy_box; ?></option>
                                       <option value="color_box"><?php echo $pgp_color_box; ?></option>
                                       <option value="foo_box_free_edition"><?php echo $pgp_foo_box_free_edition; ?></option>
                                       <option value="nivo_lightbox"><?php echo $pgp_nivo_lightbox; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_page_navigation; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_galleries_title; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select name="ux_ddl_page_navigation" id="ux_ddl_page_navigation" class="form-control" onchange="show_hide_control_photo_gallery_plus('ux_ddl_page_navigation', 'ux_div_no_of_images'); generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value="disable"><?php echo $pgp_disable; ?></option>
                                    <option value="enable"><?php echo $pgp_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" id="ux_div_no_of_images" style="display:none;">
                           <label class="control-label">
                              <?php echo $pgp_no_of_image_per_page_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_no_of_image_per_page_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_justified_images_per_page" id="ux_txt_justified_images_per_page" value="10" maxlength="3" onblur="default_value_photo_gallery_plus('#ux_txt_justified_images_per_page', 10); generate_shortcode_justified_grid_layout_photo_gallery_plus();" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" placeholder="<?php echo $pgp_no_of_image_per_page_placeholder; ?>">
                        </div>
                        <div id="ux_div_show_hide_album">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_album_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_album_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <select id="ux_ddl_album_title" name="ux_ddl_album_title" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="show"><?php echo $pgp_show; ?></option>
                                       <option value="hide"><?php echo $pgp_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_album_description; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_album_description_tooltip; ?>" $pgp_choose_album_type_tooltipdata-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <select id="ux_ddl_album_description" name="ux_ddl_album_description" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="show"><?php echo $pgp_show; ?></option>
                                       <option value="hide"><?php echo $pgp_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_gallery_title_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select id="ux_ddl_gallery_title" name="ux_ddl_gallery_title" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value="show"><?php echo $pgp_show; ?></option>
                                    <option value="hide"><?php echo $pgp_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_gallery_description_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_gallery_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_gallery_description" id="ux_ddl_gallery_description" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="show"><?php echo $pgp_show; ?></option>
                                       <option value="hide"><?php echo $pgp_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_thumbnail_title ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select id="ux_ddl_thumbnail_title" name="ux_ddl_thumbnail_title" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value="show"><?php echo $pgp_show; ?></option>
                                    <option value="hide"><?php echo $pgp_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_thumbnail_description_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_description_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_thumbnail_description" id="ux_ddl_thumbnail_description" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="show"><?php echo $pgp_show; ?></option>
                                       <option value="hide" selected><?php echo $pgp_hide; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_sort_images_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_sort_images_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select name="ux_ddl_justified_sort_image_by" id="ux_ddl_justified_sort_image_by" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value="image_title"><?php echo $pgp_title; ?></option>
                                    <option value="upload_date"><?php echo $pgp_date; ?></option>
                                    <option value="image_name"><?php echo $pgp_filename; ?></option>
                                    <option value="file_type"><?php echo $pgp_type; ?></option>
                                    <option value="sort_order"><?php echo $pgp_custom_order; ?></option>
                                    <option value="random_order"><?php echo $pgp_random_order; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_order_by_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <select name="ux_ddl_justified_order_images" id="ux_ddl_justified_order_images" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                    <option value="sort_asc"><?php echo $pgp_ascending; ?></option>
                                    <option value="sort_desc"><?php echo $pgp_descending; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_global_option_lazy_load_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_lazy_load_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_lazy_load" id="ux_ddl_lazy_load" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable"><?php echo $pgp_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_filters; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_filters_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_filters" id="ux_ddl_filters" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable"><?php echo $pgp_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_order_by; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_order_by_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_order_by" id="ux_ddl_order_by" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable"><?php echo $pgp_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $global_option_search_box; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_search_box_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_search_box" id="ux_ddl_search_box" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable"><?php echo $pgp_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_justified_special_effects">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_animation_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_animation_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <select id="ux_ddl_animation_effect" name="ux_ddl_animation_effect" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                       <option value="none"><?php echo $pgp_none; ?></option>
                                       <optgroup label="<?php echo $pgp_magic_effect; ?>">
                                          <option value="twisterInDown"><?php echo $pgp_twister_in_down; ?></option>
                                          <option value="twisterInUp"><?php echo $pgp_twister_in_up; ?></option>
                                          <option value="swap"><?php echo $pgp_swap; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_bling; ?>">
                                          <option value="puffIn"><?php echo $pgp_puff_in; ?></option>
                                          <option value="vanishIn"><?php echo $pgp_vanish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_static_effect; ?>">
                                          <option value="openDownLeftReturn"><?php echo $pgp_open_down_left_return; ?></option>
                                          <option value="openDownRightReturn"><?php echo $pgp_open_down_right_return; ?></option>
                                          <option value="openUpLeftReturn"><?php echo $pgp_open_up_left_return; ?></option>
                                          <option value="openUpRightReturn"><?php echo $pgp_open_up_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_perspective; ?>">
                                          <option value="perspectiveDownReturn"><?php echo $pgp_perspective_down_return; ?></option>
                                          <option value="perspectiveUpReturn"><?php echo $pgp_perspective_up_return; ?></option>
                                          <option value="perspectiveLeftReturn"><?php echo $pgp_perspective_left_return; ?></option>
                                          <option value="perspectiveRightReturn"><?php echo $pgp_perspective_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_slide; ?>">
                                          <option value="slideDownReturn"><?php echo $pgp_slide_down_return; ?></option>
                                          <option value="slideUpReturn"><?php echo $pgp_slide_up_return; ?></option>
                                          <option value="slideLeftReturn"><?php echo $pgp_slide_left_return; ?></option>
                                          <option value="slideRightReturn"><?php echo $pgp_slide_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_math; ?>">
                                          <option value="swashIn"><?php echo $pgp_swash_in; ?></option>
                                          <option value="foolishIn"><?php echo $pgp_foolish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_tin; ?>">
                                          <option value="tinRightIn"><?php echo $pgp_tin_right_in; ?></option>
                                          <option value="tinLeftIn"><?php echo $pgp_tin_left_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_boing; ?>">
                                          <option value="boingInUp"><?php echo $pgp_boing_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_on_the_space; ?>">
                                          <option value="spaceInUp"><?php echo $pgp_space_in_up; ?></option>
                                          <option value="spaceInRight"><?php echo $pgp_space_in_right; ?></option>
                                          <option value="spaceInDown"><?php echo $pgp_space_in_down; ?></option>
                                          <option value="spaceInLeft"><?php echo $pgp_space_in_left; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_attention_seekers; ?>">
                                          <option value="bounce"><?php echo $pgp_bounce; ?></option>
                                          <option value="flash"><?php echo $pgp_flash; ?></option>
                                          <option value="pulse"><?php echo $pgp_pulse; ?></option>
                                          <option value="rubberBand"><?php echo $pgp_rubber_band; ?></option>
                                          <option value="shake"><?php echo $pgp_shake; ?></option>
                                          <option value="swing"><?php echo $pgp_swing; ?></option>
                                          <option value="tada"><?php echo $pgp_tada; ?></option>
                                          <option value="wobble"><?php echo $pgp_wobble; ?></option>
                                          <option value="jello"><?php echo $pgp_jello; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_bouncing_entrances; ?>">
                                          <option value="bounceIn"><?php echo $pgp_bounce_in; ?></option>
                                          <option value="bounceInDown"><?php echo $pgp_bounce_in_down; ?></option>
                                          <option value="bounceInLeft"><?php echo $pgp_bounce_in_left; ?></option>
                                          <option value="bounceInRight"><?php echo $pgp_bounce_in_right; ?></option>
                                          <option value="bounceInUp"><?php echo $pgp_bounce_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_fading_entrances; ?>">
                                          <option value="fadeIn"><?php echo $pgp_fade_in; ?></option>
                                          <option value="fadeInDown"><?php echo $pgp_fade_in_down; ?></option>
                                          <option value="fadeInLeft"><?php echo $pgp_fade_in_left; ?></option>
                                          <option value="fadeInLeftBig"><?php echo $pgp_fade_in_left_big; ?></option>
                                          <option value="fadeInRight"><?php echo $pgp_fade_in_right; ?></option>
                                          <option value="fadeInRightBig"><?php echo $pgp_fade_in_right_big; ?></option>
                                          <option value="fadeInUp"><?php echo $pgp_fade_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_flippers; ?>">
                                          <option value="flip"><?php echo $pgp_flip; ?></option>
                                          <option value="flipInX"><?php echo $pgp_flip_in_x; ?></option>
                                          <option value="flipInY"><?php echo $pgp_flip_in_y; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_lightspeed; ?>">
                                          <option value="lightSpeedIn"><?php echo $pgp_light_speed_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_rotating_entrances; ?>">
                                          <option value="rotateIn"><?php echo $pgp_rotate_in; ?></option>
                                          <option value="rotateInDownLeft"><?php echo $pgp_rotate_in_down_left; ?></option>
                                          <option value="rotateInDownRight"><?php echo $pgp_rotate_in_down_right; ?></option>
                                          <option value="rotateInUpLeft"><?php echo $pgp_rotate_in_up_left; ?></option>
                                          <option value="rotateInUpRight"><?php echo $pgp_rotate_in_up_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_sliding_entrances; ?>">
                                          <option value="slideInUp"><?php echo $pgp_slide_in_up; ?></option>
                                          <option value="slideInDown"><?php echo $pgp_slide_in_down; ?></option>
                                          <option value="slideInLeft"><?php echo $pgp_slide_in_left; ?></option>
                                          <option value="slideInRight"><?php echo $pgp_slide_in_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_zoom_entrances; ?>">
                                          <option value="zoomIn"><?php echo $pgp_zoom_in; ?></option>
                                          <option value="zoomInDown"><?php echo $pgp_zoom_in_down; ?></option>
                                          <option value="zoomInLeft"><?php echo $pgp_zoom_in_left; ?></option>
                                          <option value="zoomInRight"><?php echo $pgp_zoom_in_right; ?></option>
                                          <option value="zoomInUp"><?php echo $pgp_zoom_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_specials; ?>">
                                          <option value="rollIn"><?php echo $pgp_roll_in; ?></option>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_special_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_special_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_justified_special_effects" name="ux_ddl_justified_special_effects" class="form-control" onchange="generate_shortcode_justified_grid_layout_photo_gallery_plus();">
                                          <option value="none"><?php echo $pgp_none; ?></option>
                                          <option value="blur"><?php echo $pgp_blur; ?></option>
                                          <option value="sepia"><?php echo $pgp_sepia; ?></option>
                                          <option value="brightness"><?php echo $pgp_brightness; ?></option>
                                          <option value="contrast"><?php echo $pgp_contrast; ?></option>
                                          <option value="invert"><?php echo $pgp_invert; ?></option>
                                          <option value="saturate"><?php echo $pgp_saturate; ?></option>
                                          <option value="grayscale"><?php echo $pgp_grayscale; ?></option>
                                          <option value="hue-rotate"><?php echo $pgp_hue_rotate; ?></option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_justified_shortcode" class="ux_div_justified_shortcode" style="display:none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $pgp_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $pgp_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_justified_generate_shortcodes"></div>
                              <textarea class="form-control ux_txtarea_justified_generate_shortcode" readonly="true" name="ux_txtarea_justified_generate_shortcodes" id="ux_txtarea_justified_generate_shortcodes" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="button" class="btn vivid-green reset-page" name="ux_btn_reset_shortcode" id="ux_btn_reset_shortcode" value="<?php echo $pgp_reset_shortcode; ?>">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   } else {
      ?>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-custom-home"></i>
               <a href="admin.php?page=manage_photo_gallery_plus">
                  <?php echo $photo_gallery_plus; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=pgp_thumbnail_layout_shortcode">
                  <?php echo $pgp_shortcode_generator; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_justified_grid_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-grid"></i>
                     <?php echo $pgp_justified_grid_layout; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_justified_grid_layout">
                     <div class="form-body">
                        <strong><?php echo $pgp_user_access_message; ?></strong>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}