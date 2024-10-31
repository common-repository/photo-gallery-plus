<?php
/**
 * Template for adding a New Tag or Modifying an Existing Tag.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/tags
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
   } else if (tags_photo_gallery_plus == "1") {
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
               <a href="admin.php?page=pgp_manage_tags">
                  <?php echo $pgp_tags; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_add_tag; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-plus"></i>
                     <?php echo $pgp_add_tag; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a> 
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_add_tag">
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
                              <?php echo $pgp_tags_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $pgp_tag_name_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_tag_name_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                           </label>
                           <input type="text" class="form-control" name="ux_txt_tag_name" id="ux_txt_tag_name" value="<?php echo isset($manage_tag_data["tag_name"]) ? esc_html($manage_tag_data["tag_name"]) : ""; ?>" placeholder="<?php echo $pgp_add_tag_name_placeholder; ?>">
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $pgp_tag_description_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_tag_description_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                           </label>
                           <textarea class="form-control" name="ux_txtarea_tag_description" id="ux_txtarea_tag_description" rows="5" placeholder="<?php echo $pgp_add_tag_description_placeholder; ?>"><?php echo isset($manage_tag_data["tag_description"]) ? esc_html($manage_tag_data["tag_description"]) : ""; ?></textarea>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_add_tag"  id="ux_btn_add_tag" value="<?php echo $pgp_save_changes; ?>">
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
               <a href="admin.php?page=pgp_manage_tags">
                  <?php echo $pgp_tags; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo isset($_REQUEST["id"]) ? $pgp_update_tag : $pgp_add_tag; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-plus"></i>
                     <?php echo $pgp_add_tag; ?>
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