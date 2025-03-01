<?php
/**
 * Template to view and update the settings for Compact Album Layout.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/layout-settings
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
   } else if (layout_settings_photo_gallery_plus == "1") {
      $compact_album_layout_cover_margin = isset($compact_album_layout_data["compact_album_layout_cover_margin"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_margin"])) : array(10, 10, 0, 0);
      $compact_album_layout_cover_padding = isset($compact_album_layout_data["compact_album_layout_cover_padding"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_padding"])) : array(0, 0, 0, 0);
      $compact_album_layout_cover_border_style = isset($compact_album_layout_data["compact_album_layout_cover_border_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_border_style"])) : array(0, "none", "#000000");
      $compact_album_layout_cover_shadow = isset($compact_album_layout_data["compact_album_layout_cover_shadow"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_shadow"])) : array("0,0,0,0");
      $compact_album_layout_cover_hover_effect_value = isset($compact_album_layout_data["compact_album_layout_cover_hover_effect_value"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_hover_effect_value"])) : array("none", 0, 0, 0);
      $compact_album_layout_cover_thumbnail_dimensions = isset($compact_album_layout_data["compact_album_layout_cover_thumbnail_dimensions"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_thumbnail_dimensions"])) : array(250, 200);
      if (isset($compact_album_layout_data["compact_album_layout_cover_background_color_transparency"]) && $compact_album_layout_data["compact_album_layout_cover_background_color_transparency"] != "") {

         $compact_album_layout_cover_background_color_transparency = isset($compact_album_layout_data["compact_album_layout_cover_background_color_transparency"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_cover_background_color_transparency"])) : array("#ebe8eb", 50);
      }
      $compact_album_layout_title_font_style = isset($compact_album_layout_data["compact_album_layout_title_font_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_title_font_style"])) : array(20, "#000000");
      $compact_album_layout_title_margin = isset($compact_album_layout_data["compact_album_layout_title_margin"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_title_margin"])) : array(10, 0, 10, 0);
      $compact_album_layout_title_padding = isset($compact_album_layout_data["compact_album_layout_title_padding"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_title_padding"])) : array(10, 0, 10, 0);
      $compact_album_layout_description_font_style = isset($compact_album_layout_data["compact_album_layout_description_font_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_description_font_style"])) : array(16, "#787D85");
      $compact_album_layout_description_margin = isset($compact_album_layout_data["compact_album_layout_description_margin"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_description_margin"])) : array(10, 0, 10, 0);
      $compact_album_layout_description_padding = isset($compact_album_layout_data["compact_album_layout_description_padding"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_description_padding"])) : array(0, 0, 10, 0);

      $compact_album_layout_gallery_title_font_style = isset($compact_album_layout_data["compact_album_layout_gallery_title_font_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_gallery_title_font_style"])) : array(14, "#787D85");
      $compact_album_layout_gallery_title_margin = isset($compact_album_layout_data["compact_album_layout_gallery_title_margin"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_gallery_title_margin"])) : array(0, 5, 0, 5);
      $compact_album_layout_gallery_title_padding = isset($compact_album_layout_data["compact_album_layout_gallery_title_padding"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_gallery_title_padding"])) : array(10, 10, 10, 10);
      $compact_album_layout_gallery_description_font_style = isset($compact_album_layout_data["compact_album_layout_gallery_description_font_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_gallery_description_font_style"])) : array(12, "#787D85");
      $compact_album_layout_gallery_description_margin = isset($compact_album_layout_data["compact_album_layout_gallery_description_margin"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_gallery_description_margin"])) : array(0, 5, 0, 5);
      $compact_album_layout_gallery_description_padding = isset($compact_album_layout_data["compact_album_layout_gallery_description_padding"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_gallery_description_padding"])) : array(5, 10, 10, 5);
      $thumbnail_dimensions = isset($global_options_get_data["global_options_thumbnail_dimensions"]) ? explode(",", esc_attr($global_options_get_data["global_options_thumbnail_dimensions"])) : array(200, 150);

      $compact_album_layout_button_margin = isset($compact_album_layout_data["compact_album_layout_button_margin"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_button_margin"])) : array(10, 0, 0, 0);
      $compact_album_layout_button_padding = isset($compact_album_layout_data["compact_album_layout_button_padding"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_button_padding"])) : array(8, 12, 8, 12);
      $compact_album_layout_button_border_style = isset($compact_album_layout_data["compact_album_layout_button_border_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_button_border_style"])) : array(0, "none", "#a4cd39");
      $compact_album_layout_button_font_style = isset($compact_album_layout_data["compact_album_layout_button_font_style"]) ? explode(",", esc_attr($compact_album_layout_data["compact_album_layout_button_font_style"])) : array(14, "#ffffff");
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
               <a href="admin.php?page=pgp_thumbnail_layout">
                  <?php echo $pgp_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_compact_album_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-bubbles"></i>
                     <?php echo $pgp_compact_album_layout; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_compact_album_layout">
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
                              <?php echo $pgp_layouts_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#thumbnails" data-toggle="tab">
                                    <?php echo $pgp_general_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#album_title" data-toggle="tab">
                                    <?php echo $pgp_album_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#album_description" data-toggle="tab">
                                    <?php echo $pgp_album_description; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#gallery_title" data-toggle="tab">
                                    <?php echo $pgp_gallery_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#gallery_description" data-toggle="tab">
                                    <?php echo $pgp_gallery_description_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#buttons" data-toggle="tab">
                                    <?php echo $pgp_buttons; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="thumbnails">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_thumbnail_dimensions_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_layout_thumbnail_dimension_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class= "input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_dimension[]" id="ux_txt_width" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="set_thumbnail_dimension_in_shortcode(this, '<?php echo $thumbnail_dimensions[0] ?>', '<?php echo $pgp_global_thumbnail_dimension_exceed_msg ?>');" placeholder="<?php echo $pgp_width_layout_placeholder; ?>" value="<?php echo intval($compact_album_layout_cover_thumbnail_dimensions[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_dimension[]" id="ux_txt_height" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="set_thumbnail_dimension_in_shortcode(this, '<?php echo $thumbnail_dimensions[1] ?>', '<?php echo $pgp_global_thumbnail_dimension_exceed_msg ?>');" placeholder="<?php echo $pgp_height_placeholder; ?>" value="<?php echo intval($compact_album_layout_cover_thumbnail_dimensions[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_background_color_transparency; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_background_color_transparency_tooltips; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_background_color_transperancy[]" id="ux_txt_background_color" placeholder="<?php echo $pgp_background_color; ?>" onfocus="color_picker_photo_gallery_plus(this, this.value)"  value="<?php echo esc_attr($compact_album_layout_cover_background_color_transparency[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_background_color_transperancy[]" id="ux_txt_background_transperancy" maxlength="3" placeholder="<?php echo $pgp_background_transparency; ?>"  onblur="default_value_photo_gallery_plus('#ux_txt_background_transperancy', 50);" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onchange="check_opacity_photo_gallery_plus(this);" value="<?php echo intval($compact_album_layout_cover_background_color_transparency[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group custom-margin-top">
                                    <label class="control-label">
                                       <?php echo $pgp_thumbnail_layout_opacity_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_layout_opacity_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control" name="ux_txt_opacity" id="ux_txt_opacity" placeholder="<?php echo $pgp_opacity_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_opacity', 100);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onchange="check_opacity_photo_gallery_plus(this);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_cover_thumbnail_opacity"]) ? intval($compact_album_layout_data["compact_album_layout_cover_thumbnail_opacity"]) : 100; ?>">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_layout_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_width" placeholder="<?php echo $pgp_width_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_border_style_width', 0)" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_cover_border_style[0]); ?>">
                                             <select name="ux_txt_border_style[]" id="ux_ddl_border_style_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $pgp_none; ?></option>
                                                <option value="solid"><?php echo $pgp_solid; ?></option>
                                                <option value="dashed"><?php echo $pgp_dashed; ?></option>
                                                <option value="dotted"><?php echo $pgp_dotted ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_color" onblur="default_value_photo_gallery_plus('#ux_txt_border_style_color', '#000000')" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_cover_border_style[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_layout_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_border_radius" id="ux_txt_border_radius" placeholder="<?php echo $pgp_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onblur="default_value_photo_gallery_plus('#ux_txt_border_radius', 0)" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_cover_border_radius"]) ? intval($compact_album_layout_data["compact_album_layout_cover_border_radius"]) : 0; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_shadow; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_thumbnail_layout_shadow_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow1" onblur="default_value_photo_gallery_plus('#ux_txt_shadow1', 0);" onfocus="paste_prevent_photo_gallery_plus(this.id);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" placeholder="<?php echo $pgp_horizontal_length_placeholder; ?>" value="<?php echo intval($compact_album_layout_cover_shadow[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow2" onblur="default_value_photo_gallery_plus('#ux_txt_shadow2', 0);" onfocus="paste_prevent_photo_gallery_plus(this.id);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" placeholder="<?php echo $pgp_vertical_length_placeholder; ?>" value="<?php echo intval($compact_album_layout_cover_shadow[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow3" onblur="default_value_photo_gallery_plus('#ux_txt_shadow3', 0);" onfocus="paste_prevent_photo_gallery_plus(this.id);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" placeholder="<?php echo $pgp_blur_radius_placeholder; ?>" value="<?php echo intval($compact_album_layout_cover_shadow[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_shadow[]" id="ux_txt_shadow4" onblur="default_value_photo_gallery_plus('#ux_txt_shadow4', 0);" onfocus="paste_prevent_photo_gallery_plus(this.id);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" placeholder="<?php echo $pgp_spread_radius_placeholder; ?>" value="<?php echo intval($compact_album_layout_cover_shadow[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_shadow_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_shadow_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_shadow_color" id="ux_txt_shadow_color" onblur="default_value_photo_gallery_plus('#ux_txt_shadow_color', '#000000')" placeholder="<?php echo $pgp_shadow_color_placeholder; ?>" onfocus="color_picker_photo_gallery_plus(this, this.value)"  value="<?php echo isset($compact_album_layout_data["compact_album_layout_cover_shadow_color"]) ? esc_attr($compact_album_layout_data["compact_album_layout_cover_shadow_color"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_hover_effect_value_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_hover_effect_value_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                             <span id="ux_spn_hover_value" aria-required="true" style="margin-left:10%"></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_txt_hover_effect[]" id="ux_ddl_hover_effect" class="form-control custom-input-medium input-inline" onchange="hover_effect_value_photo_gallery_plus();">
                                                <option value="none"><?php echo $pgp_none; ?></option>
                                                <option value="rotate"><?php echo $pgp_rotate; ?></option>
                                                <option value="scale"><?php echo $pgp_scale; ?></option>
                                                <option value="skew"><?php echo $pgp_skew ?></option>
                                             </select>
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_effect_value" placeholder="<?php echo $pgp_hover_effect_value_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_hover_effect_value', 0);" maxlength="3" onkeypress="digits_with_dot_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_cover_hover_effect_value[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_scale_value_x" placeholder="<?php echo $pgp_hover_effect_value_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_hover_scale_value_x', 0);" maxlength="3" onkeypress="digits_with_dot_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo doubleval($compact_album_layout_cover_hover_effect_value[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_hover_effect[]" id="ux_txt_hover_scale_value_y" placeholder="<?php echo $pgp_hover_effect_value_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_hover_scale_value_y', 0);" maxlength="3" onkeypress="digits_with_dot_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo doubleval($compact_album_layout_cover_hover_effect_value[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_transition_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_transition_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_transition_time" id="ux_txt_transition_time" placeholder="<?php echo $pgp_transition_time_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_transition_time', 1)" maxlength="1" onkeypress="digits_with_dot_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_cover_transition_time"]) ? intval($compact_album_layout_data["compact_album_layout_cover_transition_time"]) : 1; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_thumbnail_setting_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_top_text" placeholder="<?php echo $pgp_top; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_margin_top_text', 10);" value="<?php echo intval($compact_album_layout_cover_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_right_text" placeholder="<?php echo $pgp_right; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_margin_right_text', 10);" value="<?php echo intval($compact_album_layout_cover_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_bottom_text" placeholder="<?php echo $pgp_bottom; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_margin_bottom_text', 0);"   value="<?php echo intval($compact_album_layout_cover_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_margin[]" id="ux_txt_thumbnail_margin_left_text" placeholder="<?php echo $pgp_left; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_margin_left_text', 0);"   value="<?php echo intval($compact_album_layout_cover_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_thumbnail_setting_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_top_text" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_padding_top_text', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_cover_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_right_text" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_padding_right_text', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_cover_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_bottom_text" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_padding_bottom_text', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_cover_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_thumbnail_padding[]" id="ux_txt_thumbnail_padding_left_text" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_thumbnail_padding_left_text', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_cover_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="album_title">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_album_title_html_tag" id="ux_ddl_album_title_html_tag" class="form-control">
                                                <option value="h1"><?php echo $pgp_h1_tag; ?></option>
                                                <option value="h2"><?php echo $pgp_h2_tag; ?></option>
                                                <option value="h3"><?php echo $pgp_h3_tag; ?></option>
                                                <option value="h4"><?php echo $pgp_h4_tag; ?></option>
                                                <option value="h5"><?php echo $pgp_h5_tag; ?></option>
                                                <option value="h6"><?php echo $pgp_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $pgp_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $pgp_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $pgp_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_album_title_alignment" id="ux_ddl_album_title_alignment" class="form-control">
                                                <option value="left"><?php echo $pgp_left; ?></option>
                                                <option value="center"><?php echo $pgp_center; ?></option>
                                                <option value="right"><?php echo $pgp_right; ?></option>
                                                <option value="justify"><?php echo $pgp_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_album_title_font_style[]" id="ux_txt_album_title_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_font_size', 20);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_album_title_font_style[]" id="ux_txt_album_title_style_color"  onblur="default_value_photo_gallery_plus('#ux_txt_album_title_style_color', '#000000');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_album_title_line_height" id="ux_txt_album_title_line_height" placeholder="<?php echo $pgp_line_height_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_line_height', '1.7em');"  onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_title_line_height"]) ? esc_attr($compact_album_layout_data["compact_album_layout_title_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_family_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <select name="ux_ddl_album_title_font_family" id="ux_ddl_album_title_font_family" class="form-control">
                                       <?php
                                       if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                          $web_font_list = include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                       }
                                       ?>
                                    </select>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_margin_text[]" id="ux_txt_album_title_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_margin_top', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_margin_text[]" id="ux_txt_album_title_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_margin_text[]" id="ux_txt_album_title_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_margin_bottom', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_margin_text[]" id="ux_txt_album_title_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_padding_text[]" id="ux_txt_album_title_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_padding_top', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_padding_text[]" id="ux_txt_album_title_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_padding_text[]" id="ux_txt_album_title_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_title_padding_text[]" id="ux_txt_album_title_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_title_padding_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="album_description">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_album_description_html_tag" id="ux_ddl_album_description_html_tag" class="form-control">
                                                <option value="h1"><?php echo $pgp_h1_tag; ?></option>
                                                <option value="h2"><?php echo $pgp_h2_tag; ?></option>
                                                <option value="h3"><?php echo $pgp_h3_tag; ?></option>
                                                <option value="h4"><?php echo $pgp_h4_tag; ?></option>
                                                <option value="h5"><?php echo $pgp_h5_tag; ?></option>
                                                <option value="h6"><?php echo $pgp_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $pgp_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $pgp_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $pgp_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_album_description_alignment" id="ux_ddl_album_description_alignment" class="form-control">
                                                <option value="left"><?php echo $pgp_left; ?></option>
                                                <option value="center"><?php echo $pgp_center; ?></option>
                                                <option value="right"><?php echo $pgp_right; ?></option>
                                                <option value="justify"><?php echo $pgp_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_style_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_album_description_font_style[]" id="ux_txt_album_description_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_font_size', 16);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_album_description_font_style[]" id="ux_txt_album_description_font_color" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_font_color', '#787D85');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_description_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_album_description_line_height" id="ux_txt_album_description_line_height" placeholder="<?php echo $pgp_line_height_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_line_height', '1.7em');"  onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_description_line_height"]) ? esc_attr($compact_album_layout_data["compact_album_layout_description_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_family_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <select name="ux_ddl_album_description_font_family" id="ux_ddl_album_description_font_family" class="form-control">
                                       <?php
                                       if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                          $web_font_list = include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                       }
                                       ?>
                                    </select>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_margin[]" id="ux_txt_album_description_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_margin_top', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_margin[]" id="ux_txt_album_description_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_margin[]" id="ux_txt_album_description_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_margin_bottom', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_margin[]" id="ux_txt_album_description_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_gallery_description_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_padding[]" id="ux_txt_album_description_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_padding[]" id="ux_txt_album_description_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_padding[]" id="ux_txt_album_description_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_album_description_padding[]" id="ux_txt_album_description_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_album_description_padding_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="gallery_title">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_title_html_tag" id="ux_ddl_gallery_title_html_tag" class="form-control">
                                                <option value="h1"><?php echo $pgp_h1_tag; ?></option>
                                                <option value="h2"><?php echo $pgp_h2_tag; ?></option>
                                                <option value="h3"><?php echo $pgp_h3_tag; ?></option>
                                                <option value="h4"><?php echo $pgp_h4_tag; ?></option>
                                                <option value="h5"><?php echo $pgp_h5_tag; ?></option>
                                                <option value="h6"><?php echo $pgp_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $pgp_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $pgp_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $pgp_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_title_alignment" id="ux_ddl_gallery_title_alignment" class="form-control">
                                                <option value="left"><?php echo $pgp_left; ?></option>
                                                <option value="center"><?php echo $pgp_center; ?></option>
                                                <option value="right"><?php echo $pgp_right; ?></option>
                                                <option value="justify"><?php echo $pgp_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_font_size', 14);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_style_color', '#787D85');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_gallery_title_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_gallery_title_line_height" id="ux_txt_gallery_title_line_height" placeholder="<?php echo $pgp_line_height_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_line_height', '1.7em');"  onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_title_line_height"]) ? esc_attr($compact_album_layout_data["compact_album_layout_gallery_title_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_family_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_gallery_title_font_family" id="ux_ddl_gallery_title_font_family" class="form-control">
                                          <?php
                                          if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                             $web_font_list = include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_margin_top', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_margin_right', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_margin_text[]" id="ux_txt_gallery_title_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_margin_left', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_padding_top', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_padding_right', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_title_padding_text[]" id="ux_txt_gallery_title_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_padding_left', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_title_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="gallery_description">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_html_tag; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_html_tag_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_description_html_tag" id="ux_ddl_gallery_description_html_tag" class="form-control">
                                                <option value="h1"><?php echo $pgp_h1_tag; ?></option>
                                                <option value="h2"><?php echo $pgp_h2_tag; ?></option>
                                                <option value="h3"><?php echo $pgp_h3_tag; ?></option>
                                                <option value="h4"><?php echo $pgp_h4_tag; ?></option>
                                                <option value="h5"><?php echo $pgp_h5_tag; ?></option>
                                                <option value="h6"><?php echo $pgp_h6_tag; ?></option>
                                                <option value="blockquote"><?php echo $pgp_blockquote_tag; ?></option>
                                                <option value="p"><?php echo $pgp_paragraph_tag; ?></option>
                                                <option value="span"><?php echo $pgp_span_tag; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_text_alignment_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_gallery_description_alignment" id="ux_ddl_gallery_description_alignment" class="form-control">
                                                <option value="left"><?php echo $pgp_left; ?></option>
                                                <option value="center"><?php echo $pgp_center; ?></option>
                                                <option value="right"><?php echo $pgp_right; ?></option>
                                                <option value="justify"><?php echo $pgp_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_font_size', 12);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_style_color" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_style_color', '#787D85');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_gallery_description_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_line_height; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_line_height_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" name="ux_txt_gallery_description_line_height" id="ux_txt_gallery_description_line_height" placeholder="<?php echo $pgp_line_height_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_line_height', '1.7em');"  onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_description_line_height"]) ? esc_attr($compact_album_layout_data["compact_album_layout_gallery_description_line_height"]) : "1.7em"; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_family_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_gallery_description_font_family" id="ux_ddl_gallery_description_font_family" class="form-control">
                                          <?php
                                          if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                             $web_font_list = include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin_text[]" id="ux_txt_gallery_description_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_margin_top', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin_text[]" id="ux_txt_gallery_description_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_margin_right', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin_text[]" id="ux_txt_gallery_description_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_margin_text[]" id="ux_txt_gallery_description_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_margin_left', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding_text[]" id="ux_txt_gallery_description_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_padding_top', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding_text[]" id="ux_txt_gallery_description_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_padding_right', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding_text[]" id="ux_txt_gallery_description_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_padding_bottom', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_gallery_description_padding_text[]" id="ux_txt_gallery_description_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_padding_left', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_gallery_description_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="buttons">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_button_text; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_text_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" id="ux_txt_compact_album_button_text" name="ux_txt_compact_album_button_text" placeholder="<?php echo $pgp_button_text_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_text', 'Back To Album');"   value="<?php echo isset($compact_album_layout_data["compact_album_layout_button_text"]) ? esc_attr($compact_album_layout_data["compact_album_layout_button_text"]) : 'Back To Album'; ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_button_text_alignment; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_text_alignment_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_compact_album_button_text_alignment" id="ux_ddl_compact_album_button_text_alignment" class="form-control">
                                                <option value="left"><?php echo $pgp_left; ?></option>
                                                <option value="center"><?php echo $pgp_center; ?></option>
                                                <option value="right"><?php echo $pgp_right; ?></option>
                                                <option value="justify"><?php echo $pgp_justify; ?> </option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_button_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" id="ux_txt_compact_album_button_color" name="ux_txt_compact_album_button_color" placeholder="<?php echo $pgp_album_button_color_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_color', '#a4cd39');"  onkeypress="only_digits_photo_gallery_plus(event);" onfocus="color_picker_photo_gallery_plus(this, this.value); paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_button_color"]) ? esc_attr($compact_album_layout_data["compact_album_layout_button_color"]) : '#a4cd39'; ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_button_hover_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_hover_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" id="ux_txt_compact_album_button_hover_color" name="ux_txt_compact_album_button_hover_color" placeholder="<?php echo $pgp_album_button_hover_color_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_hover_color', '#a4cd39');"  onkeypress="only_digits_photo_gallery_plus(event);" onfocus="color_picker_photo_gallery_plus(this, this.value); paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_button_hover_color"]) ? esc_attr($compact_album_layout_data["compact_album_layout_button_hover_color"]) : '#a4cd39'; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_border_style_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_border_style_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_compact_album_button_border_style[]" id="ux_txt_compact_album_button_border_size" placeholder="<?php echo $pgp_width_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_border_size', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_border_style[0]); ?>">
                                             <select name="ux_txt_compact_album_button_border_style[]" id="ux_ddl_compact_album_button_border_thickness" class="form-control input-width-27 input-inline">
                                                <option value="none"><?php echo $pgp_none; ?></option>
                                                <option value="solid"><?php echo $pgp_solid; ?></option>
                                                <option value="dashed"><?php echo $pgp_dashed; ?></option>
                                                <option value="dotted"><?php echo $pgp_dotted ?></option>
                                             </select>
                                             <input type="text" class="form-control input-normal input-inline" name="ux_txt_compact_album_button_border_style[]" id="ux_txt_compact_album_button_border_color" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_border_color', '#a4cd39');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_button_border_style[2]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_button_border_hover; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_border_hover_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_compact_album_button_border_hover" id="ux_txt_compact_album_button_border_hover" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_button_border_hover_placeholder; ?>"  onkeypress="only_digits_photo_gallery_plus(event);" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_border_hover', '#a4cd39');" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_button_border_hover_color"]) ? esc_attr($compact_album_layout_data["compact_album_layout_button_border_hover_color"]) : '#a4cd39'; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_border_radius_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_border_radius_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_compact_album_button_border_radius" id="ux_txt_compact_album_button_border_radius" placeholder="<?php echo $pgp_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_border_radius', 4)" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_button_border_radius"]) ? intval($compact_album_layout_data["compact_album_layout_button_border_radius"]) : 4; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_font_family_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_font_family_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_compact_album_button_font_family" id="ux_ddl_compact_album_button_font_family" class="form-control">
                                                <?php
                                                if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                   $web_font_list = include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                                }
                                                ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_font_style; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_style_title_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_compact_album_button_font_style[]" id="ux_txt_compact_album_button_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_font_size', 14);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_font_style[0]); ?>">
                                             <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_compact_album_button_font_style[]" id="ux_txt_compact_album_button_font_color" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_font_color', '#ffffff');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($compact_album_layout_button_font_style[1]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_button_font_hover_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_font_hover_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <input type="text" class="form-control" id="ux_txt_compact_album_button_font_hover_color" name="ux_txt_compact_album_button_font_hover_color" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_button_font_hover_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_font_hover_color', '#ffffff');"  onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($compact_album_layout_data["compact_album_layout_button_font_hover_color"]) ? esc_attr($compact_album_layout_data["compact_album_layout_button_font_hover_color"]) : '#ffffff'; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_margin_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_margin_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_margin_text[]" id="ux_txt_compact_album_button_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_margin_top', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_margin[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_margin_text[]" id="ux_txt_compact_album_button_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_margin_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_margin[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_margin_text[]" id="ux_txt_compact_album_button_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_margin_bottom', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_margin[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_margin_text[]" id="ux_txt_compact_album_button_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_margin_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_margin[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_padding_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_button_padding_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_padding_text[]" id="ux_txt_compact_album_button_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_padding_top', 8);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_padding[0]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_padding_text[]" id="ux_txt_compact_album_button_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_padding_right', 12);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_padding[1]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_padding_text[]" id="ux_txt_compact_album_button_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_padding_bottom', 8);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_padding[2]); ?>">
                                             <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_compact_album_button_padding_text[]" id="ux_txt_compact_album_button_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_compact_album_button_padding_left', 12);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($compact_album_layout_button_padding[3]); ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="line-separator"></div>
                              <div class="form-actions">
                                 <div class="pull-right">
                                    <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $pgp_save_changes; ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                  </form>
               </div>
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
               <a href="admin.php?page=pgp_thumbnail_layout">
                  <?php echo $pgp_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_compact_album_layout; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-bubbles"></i>
                     <?php echo $pgp_compact_album_layout; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <div class="form-body">
                     <strong><?php echo $pgp_user_access_message; ?></strong>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}