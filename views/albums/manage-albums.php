<?php
/**
 * Template for Manage Album.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/album
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
   } else if (albums_photo_gallery_plus == "1") {
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
               <a href="admin.php?page=pgp_manage_albums">
                  <?php echo $pgp_albums; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_manage_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-folder"></i>
                     <?php echo $pgp_manage_albums; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_manage_album">
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
                           <h4 class = "block">
                              <?php echo $pgp_take_galleries_further;
                              ?>
                           </h4>
                           <p>
                              <?php echo $pgp_albums_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="table-top-margin">
                           <select name="ux_ddl_manage_albums" id="ux_ddl_manage_albums">
                              <option value=""><?php echo $pgp_bulk_action; ?></option>
                              <option value="delete_albums" style="color:red;"><?php echo $pgp_manage_delete_album . " ( " . $pgp_premium_edition . " )"; ?></option>
                              <option value="duplicate_albums" style="color:red;"><?php echo $pgp_manage_duplicate_album . " ( " . $pgp_premium_edition . " )"; ?></option>
                           </select>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_manage_albums" id="ux_btn_apply_manage_albums" value="<?php echo $pgp_apply; ?>" onclick="premium_edition_notification_photo_gallery_plus();">
                           <a href="admin.php?page=pgp_add_album" class="btn vivid-green"><?php echo $pgp_add_album; ?></a>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_delete_all_albums" id="ux_btn_apply_delete_all_albums" value="<?php echo $pgp_delete_all_albums; ?>" onclick="premium_edition_notification_photo_gallery_plus();">
                        </div>
                        <div class="line-separator"></div>
                        <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_manage_album">
                           <thead>
                              <tr>
                                 <th class="custom-checkbox chk-action">
                                    <input type="checkbox" name="ux_chk_all_albums" id="ux_chk_all_albums">
                                 </th>
                                 <th class="custom-gallery-title">
                                    <label class="control-label">
                                       <?php echo $pgp_manage_album_cover_image; ?>
                                    </label>
                                 </th>
                                 <th class="custom-gallery-description">
                                    <label class="control-label">
                                       <?php echo $pgp_manage_album_overview; ?>
                                    </label>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
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
               <a href="admin.php?page=pgp_manage_albums">
                  <?php echo $pgp_albums; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_manage_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-folder"></i>
                     <?php echo $pgp_manage_albums; ?>
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