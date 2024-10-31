<?php
/**
 * Template to view and update the settings for Blog Style Layout.
 *
 * @author   The WP Geeks
 * @package  photo-gallery-plus/views/layout-settings
 * @version  1.0.0
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
      $custom_css_nonce = wp_create_nonce("custom_css_nonce");
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
                  <?php echo $pgp_custom_css; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-pencil"></i>
                     <?php echo $pgp_custom_css; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_custom_css">
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
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $pgp_custom_css; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_custom_css_tooltip; ?>" data-placement="right"></i>
                           </label>
                           <textarea rows="20" class="form-control" name="ux_txt_custom_css" placeholder="<?php echo $pgp_custom_css_placeholder; ?>" id="ux_txt_custom_css"><?php echo isset($details_custom_css["custom_css"]) ? esc_attr($details_custom_css["custom_css"]) : ""; ?></textarea>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" value="<?php echo $pgp_save_changes; ?>" class="btn vivid-green" name="ux_btn_custom_css" id="ux_btn_custom_css">
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
               <a href="admin.php?page=pgp_thumbnail_layout">
                  <?php echo $pgp_layout_settings; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_custom_css; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-pencil"></i>
                     <?php echo $pgp_custom_css; ?>
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