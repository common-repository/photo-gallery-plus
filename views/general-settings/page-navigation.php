<?php
/**
 * Template for view and update settings in Page Navigation.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/general-settings
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
   } else if (general_settings_photo_gallery_plus == "1") {
      $page_navigation_margin = isset($page_navigation_get_data["page_navigation_margin"]) ? explode(",", esc_attr($page_navigation_get_data["page_navigation_margin"])) : array(0, 0, 0, 0);
      $page_navigation_padding = isset($page_navigation_get_data["page_navigation_padding"]) ? explode(",", esc_attr($page_navigation_get_data["page_navigation_padding"])) : array(5, 8, 5, 8);
      $page_navigation_border_style = isset($page_navigation_get_data["page_navigation_border_style"]) ? explode(",", esc_attr($page_navigation_get_data["page_navigation_border_style"])) : array(1, "solid", "#000000");
      $page_navigation_font_style = isset($page_navigation_get_data["page_navigation_font_style"]) ? explode(",", esc_attr($page_navigation_get_data["page_navigation_font_style"])) : array(12, "#000000");
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
               <a href="admin.php?page=pgp_global_options">
                  <?php echo $pgp_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_page_navigation; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-arrow-right"></i>
                     <?php echo $pgp_page_navigation; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_page_navigation">
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
                              <?php echo $pgp_general_settings_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div id="pagination_setting">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_background_color; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_background_color_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_background_color" id="ux_txt_background_color" placeholder="<?php echo $pgp_lightbox_colorbox_background_color_placeholder; ?>" onfocus="color_picker_photo_gallery_plus(this, this.value)"  value="<?php echo isset($page_navigation_get_data["page_navigation_background_color"]) ? esc_attr($page_navigation_get_data["page_navigation_background_color"]) : "#cfd8dc"; ?>">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_background_transparency; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_background_transparency_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_background_transparency" id="ux_txt_background_transparency" maxlength="3" placeholder="<?php echo $pgp_background_transparency_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_background_transparency', 100);" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onchange="check_opacity_photo_gallery_plus(this);" value="<?php echo isset($page_navigation_get_data["page_navigation_background_transparency"]) ? intval($page_navigation_get_data["page_navigation_background_transparency"]) : 100; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_page_navigation_numbering_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_numbering_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_numbering" id="ux_ddl_numbering" class="form-control">
                                       <option value="yes"><?php echo $pgp_yes; ?></option>
                                       <option value="no"><?php echo $pgp_no; ?></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_button_text; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_button_text_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_button_text" id="ux_ddl_button_text" class="form-control">
                                       <option value="text"><?php echo $pgp_text; ?></option>
                                       <option value="arrow"><?php echo $pgp_page_navigation_arrow; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_alignment_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_alignment_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_alignment_page" id="ux_ddl_alignment_page" class="form-control">
                                       <option value="left"><?php echo $pgp_left; ?></option>
                                       <option value="center"><?php echo $pgp_center; ?></option>
                                       <option value="right"><?php echo $pgp_right; ?></option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_page_navigation_position_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_position_tootltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_position" id="ux_ddl_position" class="form-control">
                                       <option value="top"><?php echo $pgp_top; ?></option>
                                       <option value="bottom"><?php echo $pgp_bottom; ?></option>
                                       <option value="both"><?php echo $pgp_both; ?></option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_border_style_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_border_style_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control input-width-25 input-inline" name="ux_txt_border_style[]" id="ux_txt_border_style_width" placeholder="<?php echo $pgp_width_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_border_style_width', 0)" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_border_style[0]); ?>">
                                       <select name="ux_txt_border_style[]" id="ux_ddl_border_style_thickness" class="form-control input-width-27 input-inline">
                                          <option value="none"><?php echo $pgp_none; ?></option>
                                          <option value="solid"><?php echo $pgp_solid; ?></option>
                                          <option value="dashed"><?php echo $pgp_dashed; ?></option>
                                          <option value="dotted"><?php echo $pgp_dotted; ?></option>
                                       </select>
                                       <input type="text" class="form-control input-normal input-inline" name="ux_txt_border_style[]" id="ux_txt_border_color" onblur="default_value_photo_gallery_plus('#ux_txt_border_color', '#000000')" onfocus="color_picker_photo_gallery_plus(this, this.value)"  placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($page_navigation_border_style[2]); ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_border_radius_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_border_radius_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_border_radius" id="ux_txt_border_radius" placeholder="<?php echo $pgp_border_radius_placeholder; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onblur="default_value_photo_gallery_plus('#ux_txt_border_radius', 0);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo isset($page_navigation_get_data["page_navigation_border_radius"]) ? intval($page_navigation_get_data["page_navigation_border_radius"]) : 5; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_style; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_font_style_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_navigation_font_style[]" id="ux_txt_navigation_font_style" placeholder="<?php echo $pgp_font_size_placeholder; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_navigation_font_style', 14)" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_font_style[0]); ?>">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_navigation_font_style[]" id="ux_txt_navigation_font_color" onblur="default_value_photo_gallery_plus('#ux_txt_navigation_font_color', '#ffffff')" onfocus="color_picker_photo_gallery_plus(this, this.value)"  placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($page_navigation_font_style[1]); ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_font_family_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_title_font_family" id="ux_ddl_title_font_family" class="form-control">
                                       <?php
                                       if (file_exists(PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php")) {
                                          include PHOTO_GALLERY_PLUS_PLUGIN_DIR_PATH . "includes/web-fonts.php";
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_margin_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_margin_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_margin[]" id="ux_txt_page_navigation_margin_top_text" placeholder="<?php echo $pgp_top; ?>"  onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_margin_top_text', 20);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_margin[0]); ?>">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_margin[]" id="ux_txt_page_navigation_margin_right_text" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_margin_right_text', 2);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_margin[1]); ?>">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_margin[]" id="ux_txt_page_navigation_margin_bottom_text" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_margin_bottom_text', 20);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_margin[2]); ?>">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_margin[]" id="ux_txt_page_navigation_margin_left_text" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_margin_left_text', 2);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_margin[3]); ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_padding_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_page_navigation_padding_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon right">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_padding[]" id="ux_txt_page_navigation_padding_top_text" placeholder="<?php echo $pgp_top; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_padding_top_text', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_padding[0]); ?>">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_padding[]" id="ux_txt_page_navigation_padding_right_text" placeholder="<?php echo $pgp_right; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_padding_right_text', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_padding[1]); ?>">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_padding[]" id="ux_txt_page_navigation_padding_bottom_text" placeholder="<?php echo $pgp_bottom; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_padding_bottom_text', 5);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_padding[2]); ?>">
                                       <input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_page_navigation_padding[]" id="ux_txt_page_navigation_padding_left_text" placeholder="<?php echo $pgp_left; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_page_navigation_padding_left_text', 10);" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" value="<?php echo intval($page_navigation_padding[3]); ?>">
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
               <a href="admin.php?page=pgp_photo_gallery_plus">
                  <?php echo $photo_gallery_plus; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <a href="admin.php?page=pgp_global_options">
                  <?php echo $pgp_general_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_page_navigation; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-arrow-right"></i>
                     <?php echo $pgp_page_navigation; ?>
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