<?php
/**
 * Template for manage Galleries.
 *
 * @author 	The WP Geeks
 * @package 	photo-gallery-plus/views/galleries
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
   } elseif (galleries_photo_gallery_plus === "1") {
      $pgp_manage_gallery_nonce = wp_create_nonce("pgp_manage_gallery_nonce");
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
               <a href="admin.php?page=manage_photo_gallery_plus">
                  <?php echo $pgp_galleries; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_manage_galleries; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-picture"></i>
                     <?php echo $pgp_manage_galleries; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_manage_photo_gallery">
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
                              <?php echo $pgp_galleries_upgrade_message; ?>
                           </p>
                           <a href="http://www.thewpgeeks.com/" target="_blank" class="btn vivid-green-upgrade"><?php echo $pgp_click_here_to_upgrade; ?></a>
                        </div>
                        <div class="table-top-margin">
                           <select name="ux_ddl_manage_galleries" id="ux_ddl_manage_galleries">
                              <option value=""><?php echo $pgp_bulk_action; ?></option>
                              <option value="delete_galleries" style="color:red;"><?php echo $pgp_manage_galleries_delete_gallery . " ( " . $pgp_premium_edition . " )"; ?></option>
                              <option value="duplicate_galleries" style="color:red;"><?php echo $pgp_manage_galleries_duplicate_gallery . " ( " . $pgp_premium_edition . " )"; ?></option>
                           </select>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_manage_galleries" id="ux_btn_apply_manage_galleries" value="<?php echo $pgp_apply; ?>" onclick="premium_edition_notification_photo_gallery_plus()">
                           <a href="javascript:;" onclick="get_gallery_id_photo_gallery();" class="btn vivid-green"><?php echo $pgp_add_gallery; ?></a>
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_delete_all_galleries" id="ux_btn_apply_delete_all_galleries" onclick="premium_edition_notification_photo_gallery_plus();" value="<?php echo $pgp_delete_all_galleries; ?>">
                           <input type="button" class="btn vivid-green" name="ux_btn_apply_purge_galleries" id="ux_btn_apply_purge_galleries" onclick="premium_edition_notification_photo_gallery_plus();" value="<?php echo $pgp_purge_galleries; ?>">
                        </div>
                        <div class="line-separator"></div>
                        <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_manage_gallery">
                           <thead>
                              <tr>
                                 <th class="custom-checkbox chk-action">
                                    <input type="checkbox" name="ux_chk_all_galleries" id="ux_chk_all_galleries">
                                 </th>
                                 <th class="custom-gallery-title">
                                    <label class="control-label">
                                       <?php echo $pgp_manage_galleries_cover_image; ?>
                                    </label>
                                 </th>
                                 <th class="custom-gallery-description">
                                    <label class="control-label">
                                       <?php echo $pgp_manage_galleries_overview; ?>
                                    </label>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              if (isset($manage_gallery_data_unserialize) && count($manage_gallery_data_unserialize) > 0) {
                                 foreach ($manage_gallery_data_unserialize as $row) {
                                    $get_count_image = $wpdb->get_var
                                        (
                                        $wpdb->prepare
                                            (
                                            "SELECT count(id) FROM " . photo_gallery_plus_meta() . " WHERE " . photo_gallery_plus_meta() . ".meta_id = %d and meta_key = %s", $row["meta_id"], "image_data"
                                        )
                                    );
                                    $count = 0;
                                    ?>
                                    <tr>
                                       <td class="custom-checkbox" style="width:5%;">
                                          <input type="checkbox" name="ux_chk_manage_gallery_<?php echo intval($row["meta_id"]); ?>" id="ux_chk_manage_gallery_<?php echo intval($row["meta_id"]); ?>" value="<?php echo intval($row["meta_id"]); ?>" onclick="check_all_photo_gallery_plus('#ux_chk_all_galleries');">
                                       </td>
                                       <td class="custom-alternative custom-gallery-thumbnail" style="width:20%;">
                                          <?php
                                          if ($get_count_image == 0) {
                                             ?>
                                             <label>
                                                <img id="ux_pgp_img" class="the-wpgeeks-cover-image" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "/assets/admin/images/gallery-cover.png"; ?>">
                                             </label>
                                             <?php
                                          } else {
                                             ?>
                                             <img id="ux_pgp_img" class="the-wpgeeks-cover-image" src="<?php echo PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_URL . $row["gallery_cover_image"]; ?>">
                                             <?php
                                          }
                                          ?>
                                          <a href="admin.php?page=pgp_add_gallery&gallery_id=<?php echo intval($row["meta_id"]); ?>&mode=edit">
                                             <i class="icon-custom-note tooltips" data-original-title="<?php echo $pgp_add_gallery_edit_tooltip; ?>" data-placement="right"></i>
                                             <?php echo $pgp_edit_tooltip; ?>
                                          </a>
                                          <label>|</label>
                                          <a href="javascript:void(0);" onclick='confirm_delete_photo_gallery_plus("<?php echo intval($row["meta_id"]); ?>",<?php echo json_encode($pgp_gallery_delete_data); ?>, "admin.php?page=manage_photo_gallery_plus", "manage_gallery_module", "<?php echo $pgp_manage_gallery_nonce; ?>");'>
                                             <i class="icon-custom-trash tooltips" data-original-title="<?php echo $pgp_add_gallery_delete_tooltip; ?>" data-placement="right"></i>
                                             <?php echo $pgp_delete; ?>
                                          </a>
                                       </td>
                                       <td class="custom-gallery-description">
                                          <table>
                                             <tr>
                                                <th style="text-align: left;">
                                                   <label><?php echo $pgp_manage_galleries_details; ?></label>
                                                </th>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <i>
                                                      <label><?php echo isset($row["gallery_title"]) != "" ? esc_attr($row["gallery_title"]) : $pgp_untitled; ?></label>
                                                   </i>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <i>
                                                      <label><?php echo isset($row["gallery_description"]) != "" ? htmlspecialchars_decode($row["gallery_description"]) : ""; ?></label>
                                                   </i>
                                                </td>
                                             </tr>
                                          </table>
                                          <table>
                                             <tr>
                                                <th style="text-align: left;">
                                                   <label>
                                                      <?php echo $meta_information; ?>
                                                   </label>
                                                </th>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <b>
                                                      <label>
                                                         <?php echo $pgp_manage_galleries_total_images; ?>
                                                      </label>
                                                   </b>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td colspan="2">
                                                   <i>
                                                      <label>
                                                         <?php echo $get_count_image; ?>
                                                      </label>
                                                   </i>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <b>
                                                      <label>
                                                         <?php echo $created_by; ?>
                                                      </label>
                                                   </b>
                                                </td>
                                                <td>
                                                   <b>
                                                      <label>
                                                         <?php echo $created_on; ?>
                                                      </label>
                                                   </b>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <i>
                                                      <label>
                                                         <?php echo esc_attr($row["author"]); ?>
                                                      </label>
                                                   </i>
                                                </td>
                                                <td>
                                                   <i>
                                                      <label>
                                                         <?php echo date("m-d-Y", doubleval($row["created_date"])); ?>
                                                      </label>
                                                   </i>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <b>
                                                      <label>
                                                         <?php echo $pgp_manage_galleries_edited_by; ?>
                                                      </label>
                                                   </b>
                                                </td>
                                                <td>
                                                   <b>
                                                      <label>
                                                         <?php echo $pgp_manage_galleries_edited_on; ?>
                                                      </label>
                                                   </b>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <i>
                                                      <label>
                                                         <?php echo esc_attr($row["edited_by"]); ?>
                                                      </label>
                                                   </i>
                                                </td>
                                                <td>
                                                   <i>
                                                      <label>
                                                         <?php echo date("m-d-Y", doubleval($row["edited_on"])); ?>
                                                      </label>
                                                   </i>
                                                </td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                    <?php
                                 }
                              }
                              ?>
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
               <a href="admin.php?page=manage_photo_gallery_plus">
                  <?php echo $pgp_galleries; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo $pgp_manage_galleries; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-picture"></i>
                     <?php echo $pgp_manage_galleries; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_manage_photo_gallery">
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