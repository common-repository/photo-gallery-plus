<?php
/**
 * Template to view and generate Shortcode for Thumbnail Layout Shortcode.
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
                  <?php echo $pgp_thumbnail_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-screen-tablet"></i>
                     <?php echo $pgp_thumbnail_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_thumbnail_layout_shortcode">
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
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display: none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $pgp_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $pgp_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcode"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly name="ux_txtarea_generate_shortcode" id="ux_txtarea_generate_shortcode" rows="4"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $pgp_choose_gallery_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_choose_gallery_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">*</span>
                           </label>
                           <select id="ux_ddl_choose_gallery" name="ux_ddl_choose_gallery" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                              <option value=""><?php echo $pgp_choose_gallery_title; ?></option>
                              <?php
                              foreach ($thumbnail_layout_get_data as $value) {
                                 ?>
                                 <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["gallery_title"]) && $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $pgp_untitled; ?></option>
                                 <?php
                              }
                              ?>
                           </select>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_alignment_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_layout_settings_alignment_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_alignment" id="ux_ddl_alignment" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
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
                                    <?php echo $pgp_no_of_columns_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_no_of_columns_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_columns" id="ux_txt_columns" value="4" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_columns', 4); generate_shortcode_thumbnail_layout_photo_gallery_plus();" placeholder="<?php echo $pgp_no_of_columns_placeholder; ?>">
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
                                    <select name="ux_ddl_lightbox_type" id="ux_ddl_lightbox_type" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                       <option value="no_lightbox"><?php echo $pgp_no_light_box; ?></option>
                                       <option selected="selected" value="lightcase"><?php echo $pgp_lightcase; ?></option>
                                       <option value="fancy_box" disabled><?php echo $pgp_fancy_box; ?></option>
                                       <option value="color_box" disabled><?php echo $pgp_color_box; ?></option>
                                       <option value="foo_box_free_edition" disabled><?php echo $pgp_foo_box_free_edition; ?></option>
                                       <option value="nivo_lightbox" disabled><?php echo $pgp_nivo_lightbox; ?></option>
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
                                 <select name="ux_ddl_page_navigation" id="ux_ddl_page_navigation" class="form-control" onchange="show_hide_control_photo_gallery_plus('ux_ddl_page_navigation', 'ux_div_no_of_images'); generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                    <option value="disable"><?php echo $pgp_disable; ?></option>
                                    <option value="enable" disabled><?php echo $pgp_enable; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group" id="ux_div_no_of_images" style="display:none;">
                           <label class="control-label">
                              <?php echo $pgp_no_of_image_per_page_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_no_of_image_per_page_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">*</span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_images_per_page" id="ux_txt_images_per_page" value="10" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_images_per_page', 10); generate_shortcode_thumbnail_layout_photo_gallery_plus();" placeholder="<?php echo $pgp_no_of_image_per_page_placeholder; ?>">
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_gallery_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_gallery_title_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <select id="ux_ddl_gallery_title" name="ux_ddl_gallery_title" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
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
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_gallery_description" id="ux_ddl_gallery_description" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
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
                                    <?php echo $pgp_thumbnail_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <select id="ux_ddl_thumbnail_title" name="ux_ddl_thumbnail_title" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
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
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <select name="ux_ddl_thumbnail_description" id="ux_ddl_thumbnail_description" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
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
                                 <select name="ux_ddl_sort_image_by" id="ux_ddl_sort_image_by" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                    <option value="image_title"><?php echo $pgp_title; ?></option>
                                    <option value="upload_date" disabled><?php echo $pgp_date; ?></option>
                                    <option value="image_name" disabled><?php echo $pgp_filename; ?></option>
                                    <option value="file_type" disabled><?php echo $pgp_type; ?></option>
                                    <option value="sort_order" disabled><?php echo $pgp_custom_order; ?></option>
                                    <option value="random_order" disabled><?php echo $pgp_random_order; ?></option>
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
                                 <select name="ux_ddl_order_images" id="ux_ddl_order_images" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                    <option value="sort_asc"><?php echo $pgp_ascending; ?></option>
                                    <option value="sort_desc" disabled><?php echo $pgp_descending; ?></option>
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
                                    <select name="ux_ddl_lazy_load" id="ux_ddl_lazy_load" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable" disabled><?php echo $pgp_enable; ?></option>
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
                                    <select name="ux_ddl_filters" id="ux_ddl_filters" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable" disabled><?php echo $pgp_enable; ?></option>
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
                                    <select name="ux_ddl_order_by" id="ux_ddl_order_by" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable" disabled><?php echo $pgp_enable; ?></option>
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
                                    <select name="ux_ddl_search_box" id="ux_ddl_search_box" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                       <option value="disable"><?php echo $pgp_disable; ?></option>
                                       <option value="enable" disabled><?php echo $pgp_enable; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_special_effects">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_animation_effect_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_animation_effect_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <select id="ux_ddl_animation_effect" name="ux_ddl_animation_effect" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                       <option value="none"><?php echo $pgp_none; ?></option>
                                       <optgroup label="<?php echo $pgp_magic_effect; ?>">
                                          <option value="twisterInDown" disabled><?php echo $pgp_twister_in_down; ?></option>
                                          <option value="twisterInUp" disabled><?php echo $pgp_twister_in_up; ?></option>
                                          <option value="swap" disabled><?php echo $pgp_swap; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_bling; ?>">
                                          <option value="puffIn" disabled><?php echo $pgp_puff_in; ?></option>
                                          <option value="vanishIn" disabled><?php echo $pgp_vanish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_static_effect; ?>">
                                          <option value="openDownLeftReturn" disabled><?php echo $pgp_open_down_left_return; ?></option>
                                          <option value="openDownRightReturn" disabled><?php echo $pgp_open_down_right_return; ?></option>
                                          <option value="openUpLeftReturn" disabled><?php echo $pgp_open_up_left_return; ?></option>
                                          <option value="openUpRightReturn" disabled><?php echo $pgp_open_up_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_perspective; ?>">
                                          <option value="perspectiveDownReturn" disabled><?php echo $pgp_perspective_down_return; ?></option>
                                          <option value="perspectiveUpReturn" disabled><?php echo $pgp_perspective_up_return; ?></option>
                                          <option value="perspectiveLeftReturn" disabled><?php echo $pgp_perspective_left_return; ?></option>
                                          <option value="perspectiveRightReturn" disabled><?php echo $pgp_perspective_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_slide; ?>">
                                          <option value="slideDownReturn" disabled><?php echo $pgp_slide_down_return; ?></option>
                                          <option value="slideUpReturn" disabled><?php echo $pgp_slide_up_return; ?></option>
                                          <option value="slideLeftReturn" disabled><?php echo $pgp_slide_left_return; ?></option>
                                          <option value="slideRightReturn" disabled><?php echo $pgp_slide_right_return; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_math; ?>">
                                          <option value="swashIn" disabled><?php echo $pgp_swash_in; ?></option>
                                          <option value="foolishIn" disabled><?php echo $pgp_foolish_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_tin; ?>">
                                          <option value="tinRightIn" disabled><?php echo $pgp_tin_right_in; ?></option>
                                          <option value="tinLeftIn" disabled><?php echo $pgp_tin_left_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_boing; ?>">
                                          <option value="boingInUp" disabled><?php echo $pgp_boing_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_on_the_space; ?>">
                                          <option value="spaceInUp" disabled><?php echo $pgp_space_in_up; ?></option>
                                          <option value="spaceInRight" disabled><?php echo $pgp_space_in_right; ?></option>
                                          <option value="spaceInDown" disabled><?php echo $pgp_space_in_down; ?></option>
                                          <option value="spaceInLeft" disabled><?php echo $pgp_space_in_left; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_attention_seekers; ?>">
                                          <option value="bounce" disabled><?php echo $pgp_bounce; ?></option>
                                          <option value="flash" disabled><?php echo $pgp_flash; ?></option>
                                          <option value="pulse" disabled><?php echo $pgp_pulse; ?></option>
                                          <option value="rubberBand" disabled><?php echo $pgp_rubber_band; ?></option>
                                          <option value="shake" disabled><?php echo $pgp_shake; ?></option>
                                          <option value="swing" disabled><?php echo $pgp_swing; ?></option>
                                          <option value="tada" disabled><?php echo $pgp_tada; ?></option>
                                          <option value="wobble" disabled><?php echo $pgp_wobble; ?></option>
                                          <option value="jello" disabled><?php echo $pgp_jello; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_bouncing_entrances; ?>">
                                          <option value="bounceIn" disabled><?php echo $pgp_bounce_in; ?></option>
                                          <option value="bounceInDown" disabled><?php echo $pgp_bounce_in_down; ?></option>
                                          <option value="bounceInLeft" disabled><?php echo $pgp_bounce_in_left; ?></option>
                                          <option value="bounceInRight" disabled><?php echo $pgp_bounce_in_right; ?></option>
                                          <option value="bounceInUp" disabled><?php echo $pgp_bounce_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_fading_entrances; ?>">
                                          <option value="fadeIn" disabled><?php echo $pgp_fade_in; ?></option>
                                          <option value="fadeInDown" disabled><?php echo $pgp_fade_in_down; ?></option>
                                          <option value="fadeInLeft" disabled><?php echo $pgp_fade_in_left; ?></option>
                                          <option value="fadeInLeftBig" disabled><?php echo $pgp_fade_in_left_big; ?></option>
                                          <option value="fadeInRight" disabled><?php echo $pgp_fade_in_right; ?></option>
                                          <option value="fadeInRightBig" disabled><?php echo $pgp_fade_in_right_big; ?></option>
                                          <option value="fadeInUp" disabled><?php echo $pgp_fade_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_flippers; ?>">
                                          <option value="flip" disabled><?php echo $pgp_flip; ?></option>
                                          <option value="flipInX" disabled><?php echo $pgp_flip_in_x; ?></option>
                                          <option value="flipInY" disabled><?php echo $pgp_flip_in_y; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_lightspeed; ?>">
                                          <option value="lightSpeedIn" disabled><?php echo $pgp_light_speed_in; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_rotating_entrances; ?>">
                                          <option value="rotateIn" disabled><?php echo $pgp_rotate_in; ?></option>
                                          <option value="rotateInDownLeft" disabled><?php echo $pgp_rotate_in_down_left; ?></option>
                                          <option value="rotateInDownRight" disabled><?php echo $pgp_rotate_in_down_right; ?></option>
                                          <option value="rotateInUpLeft" disabled><?php echo $pgp_rotate_in_up_left; ?></option>
                                          <option value="rotateInUpRight" disabled><?php echo $pgp_rotate_in_up_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_sliding_entrances; ?>">
                                          <option value="slideInUp" disabled><?php echo $pgp_slide_in_up; ?></option>
                                          <option value="slideInDown" disabled><?php echo $pgp_slide_in_down; ?></option>
                                          <option value="slideInLeft" disabled><?php echo $pgp_slide_in_left; ?></option>
                                          <option value="slideInRight" disabled><?php echo $pgp_slide_in_right; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_zoom_entrances; ?>">
                                          <option value="zoomIn" disabled><?php echo $pgp_zoom_in; ?></option>
                                          <option value="zoomInDown" disabled><?php echo $pgp_zoom_in_down; ?></option>
                                          <option value="zoomInLeft" disabled><?php echo $pgp_zoom_in_left; ?></option>
                                          <option value="zoomInRight" disabled><?php echo $pgp_zoom_in_right; ?></option>
                                          <option value="zoomInUp" disabled><?php echo $pgp_zoom_in_up; ?></option>
                                       </optgroup>
                                       <optgroup label="<?php echo $pgp_specials; ?>">
                                          <option value="rollIn" disabled><?php echo $pgp_roll_in; ?></option>
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
                                       <select id="ux_ddl_special_effects" name="ux_ddl_special_effects" class="form-control" onchange="generate_shortcode_thumbnail_layout_photo_gallery_plus();">
                                          <option value="none"><?php echo $pgp_none; ?></option>
                                          <option value="blur" disabled><?php echo $pgp_blur; ?></option>
                                          <option value="sepia" disabled><?php echo $pgp_sepia; ?></option>
                                          <option value="brightness" disabled><?php echo $pgp_brightness; ?></option>
                                          <option value="contrast" disabled><?php echo $pgp_contrast; ?></option>
                                          <option value="invert" disabled><?php echo $pgp_invert; ?></option>
                                          <option value="saturate" disabled><?php echo $pgp_saturate; ?></option>
                                          <option value="grayscale" disabled><?php echo $pgp_grayscale; ?></option>
                                          <option value="hue-rotate" disabled><?php echo $pgp_hue_rotate; ?></option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_shortcode" class="ux_div_shortcode" style="display: none;">
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $pgp_shortcode_title; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_shortcode_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <div class="icon-custom-docs tooltips pull-right" style="font-size:18px;" data-original-title="<?php echo $pgp_copy_to_clipboard; ?>" data-placement="left" data-clipboard-action="copy" data-clipboard-target="#ux_txtarea_generate_shortcodes"></div>
                              <textarea class="form-control ux_txtarea_generate_shortcode" readonly name="ux_txtarea_generate_shortcodes" id="ux_txtarea_generate_shortcodes" rows="4"></textarea>
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
                  <?php echo $pgp_thumbnail_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-screen-tablet"></i>
                     <?php echo $pgp_thumbnail_layout; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_thumbnail_layout">
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