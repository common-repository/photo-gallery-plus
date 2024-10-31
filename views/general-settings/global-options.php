<?php
/**
 * Template for view and update settings in Global Options.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/general-settings
 * @version	 1.0.0
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
      $global_options_nonce = wp_create_nonce("global_options_nonce");
      $global_options_generated_image_dimensions = isset($global_options_get_data["global_options_generated_image_dimensions"]) ? explode(",", esc_attr($global_options_get_data["global_options_generated_image_dimensions"])) : array(1600, 900);
      $global_options_thumbnail_dimensions = isset($global_options_get_data["global_options_thumbnail_dimensions"]) ? explode(",", esc_attr($global_options_get_data["global_options_thumbnail_dimensions"])) : array(250, 200);
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
                  <?php echo $pgp_global_options; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-globe"></i>
                     <?php echo $pgp_global_options; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a> 
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_global_options">
                     <div class="form-body">
                        <?php
                        if ($pgp_message_translate_help != "") {
                           ?>
                           <div class="note note-warning">
                              <h4 class="block">
                                 <?php echo $pgp_important_disclaimer; ?>
                              </h4>
                              <p><strong><?php echo $pgp_message_translate_help; ?> <a href="javascript:void(0);" data-popup-open="ux_open_popup_translator" class="custom_links_feature" onclick="show_pop_up_photo_gallery_plus();"><?php echo $pgp_message_translate_here; ?></a></strong></p>
                           </div>
                           <?php
                        }
                        ?>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="row">
                           <div class="col-md-6" style="margin-bottom:15px;">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_global_options_generated_image_dimension_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_options_generated_image_dimension_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_height_width[]" id="ux_txt_width" placeholder="<?php echo $pgp_width_layout_placeholder; ?>" maxlength="4" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="check_thumbnail_dimension_photo_gallery_plus(this, '#ux_txt_thumbnail_width');" value="<?php echo intval($global_options_generated_image_dimensions[0]); ?>">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_height_width[]" id="ux_txt_height" placeholder="<?php echo $pgp_height_placeholder; ?>" maxlength="4" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="check_thumbnail_dimension_photo_gallery_plus(this, '#ux_txt_thumbnail_height');" value="<?php echo intval($global_options_generated_image_dimensions[1]); ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6" style="margin-bottom:15px;">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_global_option_thumbnail_dimension_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_thumbnail_dimension_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <div class="input-icon right">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_thumbnail_height_width[]" id="ux_txt_thumbnail_width" placeholder="<?php echo $pgp_width_layout_placeholder; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="check_thumbnail_dimension_photo_gallery_plus(this, '#ux_txt_width')" value="<?php echo intval($global_options_thumbnail_dimensions[0]); ?>">
                                    <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_thumbnail_height_width[]" id="ux_txt_thumbnail_height" placeholder="<?php echo $pgp_height_placeholder; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="check_thumbnail_dimension_photo_gallery_plus(this, '#ux_txt_height')" value="<?php echo intval($global_options_thumbnail_dimensions[1]); ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row" style="margin-bottom:15px;">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_global_option_right_click_protection_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_right_click_protection_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <select name="ux_ddl_right_click" id="ux_ddl_right_click" class="form-control">
                                    <option value="enable"><?php echo $pgp_enable; ?></option>
                                    <option value="disable"><?php echo $pgp_disable; ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_global_option_language_direction_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_language_direction_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <select name="ux_ddl_language_direction" id="ux_ddl_language_direction" class="form-control">
                                    <option value="right_to_left"><?php echo $pgp_global_option_language_direction_right_to_left; ?></option>
                                    <option value="left_to_right"><?php echo $pgp_global_option_language_direction_left_to_right; ?></option>
                                 </select>
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
                  <?php echo $pgp_global_options; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-globe"></i>
                     <?php echo $pgp_global_options; ?>
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