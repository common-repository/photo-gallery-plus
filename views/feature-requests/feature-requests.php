<?php
/**
 * Template for Feature Request page.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/feature-request
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
               <span>
                  <?php echo $pgp_feature_requests; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-call-out"></i>
                     <?php echo $pgp_feature_requests; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_feature_requests">
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
                           <h4 class="block"><?php echo $pgp_feature_requests_thank_you; ?></h4>
                           <p><?php echo $pgp_feature_requests_fill_form; ?></p>
                           <p><?php echo $pgp_feature_requests_any_suggestion; ?></p>
                           <p><?php echo $pgp_feature_requests_write_us_on; ?>
                              <a href="mailto:support@thewpgeeks.com" target="_blank">support@thewpgeeks.com</a>
                           </p>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_feature_requests_name_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_feature_requests_name_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_your_name" id="ux_txt_your_name" value="" placeholder="<?php echo $pgp_feature_requests_name_placeholder; ?>">
                              </div>
                           </div>
                           <div class=col-md-6>
                              <div class="form-group">
                                 <label class="control-label">
                                    <?php echo $pgp_feature_requests_email_title; ?> :
                                    <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_feature_requests_email_tooltip; ?>" data-placement="right"></i>
                                    <span class="required" aria-required="true">*</span>
                                 </label>
                                 <input type="text" class="form-control" name="ux_txt_email_address" id="ux_txt_email_address" value=""  placeholder="<?php echo $pgp_feature_requests_email_placeholder; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $pgp_feature_requests; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_feature_requests_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">*</span>
                           </label>
                           <textarea class="form-control" name="ux_txtarea_feature_request" id="ux_txtarea_feature_request" rows="8"  placeholder="<?php echo $pgp_feature_requests_placeholder; ?>"></textarea>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <button type="submit" class="btn vivid-green" name="ux_btn_send_request" id="ux_btn_send_request"><?php echo $pgp_feature_requests_send_request; ?></button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php
   }
}