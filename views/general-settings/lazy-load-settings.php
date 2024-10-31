<?php
/**
 * Template for view and update Lazy Load Settings.
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
      $lazy_loader_font_style = isset($lazyload_settings_get_data["lazy_loader_font_style"]) ? explode(",", esc_attr($lazyload_settings_get_data["lazy_loader_font_style"])) : array(15, "#000000");
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
                  <?php echo $pgp_lazy_load_settings; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-reload"></i>
                     <?php echo $pgp_lazy_load_settings; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_lazyload_settings">
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
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_background_color; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_background_color_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_background_color" id="ux_txt_background_color" placeholder="<?php echo $pgp_lightbox_colorbox_background_color_placeholder; ?>" onfocus="color_picker_photo_gallery_plus(this, this.value)" value="<?php echo isset($lazyload_settings_get_data["lazy_loader_background_color"]) ? esc_attr($lazyload_settings_get_data["lazy_loader_background_color"]) : "#ffffff"; ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_loader_color; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_loader_color_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_loader_color" id="ux_txt_loader_color" placeholder="<?php echo $pgp_loader_color; ?>" onblur="default_value_photo_gallery_plus('#ux_txt_loader_color', '#080808');"  onfocus="color_picker_photo_gallery_plus(this, this.value)" value="<?php echo isset($lazyload_settings_get_data["lazy_loader_color"]) ? esc_attr($lazyload_settings_get_data["lazy_loader_color"]) : "#080808"; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_text; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_loader_text_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                 </label>
                                 <select name="ux_ddl_loader_text" id="ux_ddl_loader_text" class="form-control" onchange="show_hide_control_photo_gallery_plus('ux_ddl_loader_text', 'ux_div_loader_title');">
                                    <option value="show"><?php echo $pgp_show; ?></option>
                                    <option value="hide"><?php echo $pgp_hide; ?></option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div id="ux_div_loader_title">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_loader_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_loader_title" id="ux_txt_loader_title" placeholder="<?php echo $pgp_title; ?>" value="<?php echo isset($lazyload_settings_get_data["lazy_loader_title"]) ? esc_attr($lazyload_settings_get_data["lazy_loader_title"]) : "Loading. Please Wait..."; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_style; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_font_style_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <div class="input-icon-right">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_font_style[]" id="ux_txt_font_style" placeholder="<?php echo $pgp_font_size_placeholder; ?>" maxlength="3" onkeypress="only_digits_photo_gallery_plus(event);" onfocus="paste_prevent_photo_gallery_plus(this.id);" onblur="default_value_photo_gallery_plus('#ux_txt_font_style', 15);"  value="<?php echo intval($lazy_loader_font_style[0]); ?>">
                                       <input type="text" class="form-control custom-input-medium input-inline" name="ux_txt_font_style[]" id="ux_txt_font_style_color" onblur="default_value_photo_gallery_plus('#ux_txt_font_style_color', '#000000');" onfocus="color_picker_photo_gallery_plus(this, this.value)"  placeholder="<?php echo $pgp_color_placeholder; ?>" value="<?php echo esc_attr($lazy_loader_font_style[1]); ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_font_family_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_global_option_font_family_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* ( <?php echo $pgp_premium_edition; ?> ) </span>
                                    </label>
                                    <select name="ux_ddl_loader_font_family" id="ux_ddl_loader_font_family" class="form-control">
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
                  <?php echo $pgp_lazy_load_settings; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-reload"></i>
                     <?php echo $pgp_lazy_load_settings; ?>
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