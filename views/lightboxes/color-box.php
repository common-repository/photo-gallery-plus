<?php
/**
 * Template to display the Color Box settings.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/lightboxes
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
   } else if (lightboxes_photo_gallery_plus == "1") {
      $color_box_title_font_style = isset($color_box_get_data["lightbox_color_box_title_font_style"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_title_font_style"])) : array(16, "#ffffff");
      $color_box_title_margin = isset($color_box_get_data["lightbox_color_box_title_margin"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_title_margin"])) : array(5, 0, 5, 0);
      $color_box_title_padding = isset($color_box_get_data["lightbox_color_box_title_padding"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_title_padding"])) : array(0, 0, 0, 10);
      $color_box_description_font_style = isset($color_box_get_data["lightbox_color_box_description_font_style"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_description_font_style"])) : array(14, "#ffffff");
      $color_box_description_margin = isset($color_box_get_data["lightbox_color_box_description_margin"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_description_margin"])) : array(5, 0, 5, 0);
      $color_box_description_padding = isset($color_box_get_data["lightbox_color_box_description_padding"]) ? explode(",", esc_attr($color_box_get_data["lightbox_color_box_description_padding"])) : array(0, 0, 0, 10);
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
               <a href="admin.php?page=pgp_lightcase">
                  <?php echo $pgp_lightboxes; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_color_box; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-magic-wand"></i>
                     <?php echo $pgp_color_box; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_color_box">
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
                              <?php echo $pgp_take_lightbox_further; ?>
                           </h4>
                           <p>
                              <?php echo $pgp_lightbox_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#settings" data-toggle="tab">
                                    <?php echo $pgp_settings; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#image_title" data-toggle="tab">
                                    <?php echo $pgp_add_gallery_image_title; ?>
                                 </a>
                              </li>
                              <li>
                                 <a aria-expanded="false" href="#image_description" data-toggle="tab">
                                    <?php echo $pgp_add_gallery_image_description_title; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="settings">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_type_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_type_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_colorbox_type" id="ux_ddl_colorbox_type" class="form-control">
                                                <option value="type1"><?php echo $pgp_lightbox_colorbox_type1; ?></option>
                                                <option value="type2"><?php echo $pgp_lightbox_colorbox_type2; ?></option>
                                                <option value="type3"><?php echo $pgp_lightbox_colorbox_type3; ?></option>
                                                <option value="type4"><?php echo $pgp_lightbox_colorbox_type4; ?></option>
                                                <option value="type5"><?php echo $pgp_lightbox_colorbox_type5; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_effect_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_effect_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_colorbox_effect" id="ux_ddl_colorbox_effect" class="form-control">
                                                <option value="none"><?php echo $pgp_none; ?></option>
                                                <option value="elastic"><?php echo $pgp_elastic; ?></option>
                                                <option value="fade"><?php echo $pgp_fade; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_effect_speed_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_effect_speed_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_transition_speed" id="ux_txt_transition_speed" placeholder="<?php echo $pgp_lightbox_colorbox_effect_speed_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_transition_speed', 350)" maxlength="4" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_transition_speed"]) ? intval($color_box_get_data["lightbox_color_box_transition_speed"]) : 350; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_fadeout_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_fadeout_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_fadeout_speed" id="ux_txt_fadeout_speed" placeholder="<?php echo $pgp_lightbox_colorbox_fadeout_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_fadeout_speed', 300)" maxlength="4" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_fadeout"]) ? intval($color_box_get_data["lightbox_color_box_fadeout"]) : 300; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_slideshow_positioning_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_slideshow_positioning_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_positioning" id="ux_ddl_positioning" class="form-control" onchange="position_setting_photo_gallery_plus(this)">
                                                <option value="top"><?php echo $pgp_top; ?></option>
                                                <option value="bottom"><?php echo $pgp_bottom; ?></option>
                                                <option value="left"><?php echo $pgp_left; ?></option>
                                                <option value="right"><?php echo $pgp_right; ?></option>
                                                <option value="reposition"><?php echo $pgp_lightbox_colorbox_slideshow_reposition; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_slideshow_fixed_position_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_slideshow_fixed_position_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_fixed_positioning" id="ux_ddl_fixed_positioning" class="form-control">
                                                <option value="true"><?php echo $pgp_enable; ?></option>
                                                <option value="false"><?php echo $pgp_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="positioning_setting" style="display:none;">
                                    <div class="form-group">
                                       <label class="control-label">
                                          <?php echo $pgp_lightbox_colorbox_slideshow_positioning_value_title; ?> :
                                          <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_slideshow_positioning_value_tooltip; ?>" data-placement="right"></i>
                                          <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                       </label>
                                       <div class="input-icon right">
                                          <input type="text" class="form-control" name="ux_txt_positioning_value" id="ux_txt_positioning_value" placeholder="<?php echo $pgp_lightbox_colorbox_slideshow_positioning_value_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_positioning_value', 50)" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_postioning_value"]) ? intval($color_box_get_data["lightbox_color_box_postioning_value"]) : 50; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_open_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_open_tooltip; ?>" data-placement="right" ></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_colorbox_open" id="ux_ddl_colorbox_open" class="form-control">
                                                <option value="true"><?php echo $pgp_enable; ?></option>
                                                <option value="false"><?php echo $pgp_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_lightbox_colorbox_close_button_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_close_button_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <select name="ux_ddl_show_close_button" id="ux_ddl_show_close_button" class="form-control">
                                                <option value="true"><?php echo $pgp_enable; ?></option>
                                                <option value="false"><?php echo $pgp_disable; ?></option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_lightbox_colorbox_slideshow_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_slideshow_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select name="ux_ddl_slide_show" id="ux_ddl_slide_show" class="form-control" onchange="show_hide_control_photo_gallery_plus('ux_ddl_slide_show', 'slideshow_settings');">
                                          <option value="true"><?php echo $pgp_enable; ?></option>
                                          <option value="false"><?php echo $pgp_disable; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="slideshow_settings" style="display:none;">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_lightbox_colorbox_slideshow_speed_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_slideshow_speed_tooltip; ?>" data-placement="right" ></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control" name="ux_txt_slideshow_speed" id="ux_txt_slideshow_speed" placeholder="<?php echo $pgp_lightbox_colorbox_slideshow_speed_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_slideshow_speed', 10000)" maxlength="5" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_slideshow_speed"]) ? intval($color_box_get_data["lightbox_color_box_slideshow_speed"]) : 10000; ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_lightbox_colorbox_slideshow_auto_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_slideshow_auto_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_auto_slide_show" id="ux_ddl_auto_slide_show" class="form-control">
                                                   <option value="true"><?php echo $pgp_enable; ?></option>
                                                   <option value="false"><?php echo $pgp_disable; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_background_color; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_background_color_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_colorbox_background_color" id="ux_txt_colorbox_background_color" placeholder="<?php echo $pgp_lightbox_colorbox_background_color_placeholder; ?>" onfocus="color_picker_photo_gallery_plus(this, this.value)" value="<?php echo isset($color_box_get_data["lightbox_color_box_background"]) ? esc_attr($color_box_get_data["lightbox_color_box_background"]) : "#000000"; ?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_opacity_title; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_colorbox_opacity_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                          </label>
                                          <div class="input-icon right">
                                             <input type="text" class="form-control" name="ux_txt_colorbox_opacity" id="ux_txt_colorbox_opacity" placeholder="<?php echo $pgp_opacity_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_colorbox_opacity', 75)" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($color_box_get_data["lightbox_color_box_opacity"]) ? intval($color_box_get_data["lightbox_color_box_opacity"]) : 75; ?>">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_title">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_color_box_title" name="ux_ddl_color_box_title" class="form-control" onchange="show_hide_control_photo_gallery_plus('ux_ddl_color_box_title', 'color_box_title_div');">
                                          <option value="true"><?php echo $pgp_show; ?></option>
                                          <option value="false"><?php echo $pgp_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="color_box_title_div">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_html_tag; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_html_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_title_html_tag" id="ux_ddl_image_title_html_tag" class="form-control">
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
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_title_alignment" id="ux_ddl_image_title_alignment" class="form-control">
                                                   <option value="left"><?php echo $pgp_left; ?></option>
                                                   <option value="center"><?php echo $pgp_center; ?></option>
                                                   <option value="right"><?php echo $pgp_right; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_lightbox_title_font_style; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_font_style_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_font_size', 16);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_title_font_style[]" id="ux_txt_gallery_title_style_color" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_title_style_color', '#ffffff');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($color_box_title_font_style[1]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_lightbox_title_font_family; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_title_font_family_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_gallery_title_font_family" id="ux_ddl_gallery_title_font_family" class="form-control">
                                                   <?php
                                                   if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                      include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
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
                                                <?php echo $pgp_margin_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_gallery_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_margin_top', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_margin_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_margin_text[]" id="ux_txt_image_title_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_margin_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_margin[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_padding_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_gallery_title_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_padding_top', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_padding_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_title_padding_text[]" id="ux_txt_image_title_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_title_padding_left', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_title_padding[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane" id="image_description">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_description; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <select id="ux_ddl_color_box_description" name="ux_ddl_color_box_description" class="form-control" onchange="show_hide_control_photo_gallery_plus('ux_ddl_color_box_description', 'color_box_description_div');">
                                          <option value="true"><?php echo $pgp_show; ?></option>
                                          <option value="false"><?php echo $pgp_hide; ?></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div id="color_box_description_div">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_html_tag; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_html_tag_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_description_html_tag" id="ux_ddl_image_description_html_tag" class="form-control">
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
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_image_description_alignment" id="ux_ddl_image_description_alignment" class="form-control">
                                                   <option value="left"><?php echo $pgp_left; ?></option>
                                                   <option value="center"><?php echo $pgp_center; ?></option>
                                                   <option value="right"><?php echo $pgp_right; ?></option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_lightbox_description_font_style; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_description_font_style_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_font_size" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_font_size', 14);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_font_style[0]); ?>">
                                                <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_gallery_description_font_style[]" id="ux_txt_gallery_description_style_color"  onblur="default_value_photo_gallery_plus('#ux_txt_gallery_description_style_color', '#ffffff');" onfocus="color_picker_photo_gallery_plus(this, this.value)" placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($color_box_description_font_style[1]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_lightbox_description_font_family; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_lightbox_description_font_family_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <select name="ux_ddl_gallery_description_font_family" id="ux_ddl_gallery_description_font_family" class="form-control">
                                                   <?php
                                                   if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                                      include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
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
                                                <?php echo $pgp_margin_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_margin_gallery_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_margin_top', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_margin[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_margin_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_margin[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_margin_bottom', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_margin[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_margin[]" id="ux_txt_image_description_margin_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_margin_left', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_margin[3]); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">
                                                <?php echo $pgp_padding_title; ?> :
                                                <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_padding_gallery_description_tooltip; ?>" data-placement="right"></i>
                                                <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                             </label>
                                             <div class="input-icon right">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_top" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_padding_top', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_padding[0]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_right" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_padding_right', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_padding[1]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_bottom" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_padding_bottom', 0);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_padding[2]); ?>">
                                                <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_image_description_padding[]" id="ux_txt_image_description_padding_left" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_image_description_padding_left', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($color_box_description_padding[3]); ?>">
                                             </div>
                                          </div>
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
               <a href="admin.php?page=pgp_lightcase">
                  <?php echo $pgp_lightboxes; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_color_box; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-magic-wand"></i>
                     <?php echo $pgp_color_box; ?>
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