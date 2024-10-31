<?php
/**
 * Template for add Gallery.
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
   } else if (galleries_photo_gallery_plus == "1") {
      global $wp_version;
      $get_previous_image_nonce = wp_create_nonce("get_previous_image_nonce");
      $generate_edited_image_thumbs_nonce = wp_create_nonce("generate_edited_image_thumbs_nonce");
      $get_original_image_dimension_nonce = wp_create_nonce("get_original_image_dimension_nonce");
      $gallery_update_data_nonce = wp_create_nonce("gallery_update_data_nonce");
      $gallery_images_delete_nonce = wp_create_nonce("gallery_images_delete_nonce");
      $upload_local_system_files_nonce = wp_create_nonce("upload_local_system_files_nonce");
      $gallery_upload_images_nonce = wp_create_nonce("gallery_upload_images_nonce");
      $pgp_delete_uploaded_image_nonce = wp_create_nonce("pgp_delete_uploaded_image_nonce");
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
                  <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? $pgp_update_gallery : $pgp_add_gallery; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? "icon-custom-note" : "icon-custom-plus"; ?>"></i>
                     <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? $pgp_update_gallery : $pgp_add_gallery; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a>
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_add_gallery">
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
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="tabbable-custom">
                           <ul class="nav nav-tabs ">
                              <li class="active">
                                 <a aria-expanded="true" href="#basic_details" data-toggle="tab" id="ux_basic_details">
                                    <?php echo $pgp_add_gallery_basic_detail; ?>
                                 </a>
                              </li>
                              <li class="">
                                 <a aria-expanded="false" href="#upload_local_media" data-toggle="tab" id="ux_upload_media">
                                    <?php echo $pgp_add_gallery_upload_local_media; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="basic_details">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_gallery_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">*</span>
                                    </label>
                                    <textarea rows="1" class="form-control" name="ux_txt_gallery_title" id="ux_txt_gallery_title" placeholder="<?php echo $pgp_add_gallery_title_placeholder; ?>"><?php echo isset($get_gallery_meta_data_unserialize["gallery_title"]) ? esc_html($get_gallery_meta_data_unserialize["gallery_title"]) : ""; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_gallery_description_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">*</span>
                                    </label>
                                    <?php
                                    $gallery_description = isset($get_gallery_meta_data_unserialize["gallery_description"]) ? htmlspecialchars_decode($get_gallery_meta_data_unserialize["gallery_description"]) : "";
                                    wp_editor($gallery_description, $id = "ux_heading_content", array("media_buttons" => false, "textarea_rows" => 20, "tabindex" => 4));
                                    ?>
                                    <textarea name="ux_txtarea_gallery_heading_content" id="ux_txtarea_gallery_heading_content" style="display:none;"></textarea>
                                 </div>
                              </div>
                              <div class="tab-pane" id="upload_local_media">
                                 <div class="tabbable-custom">
                                    <ul class="nav nav-tabs">
                                       <li class="active">
                                          <a aria-expanded="true" href="#local_system" data-toggle="tab">
                                             <?php echo $pgp_add_gallery_local_system; ?>
                                          </a>
                                       </li>
                                       <li class="">
                                          <a aria-expanded="false" href="#wp_media" data-toggle="tab">
                                             <?php echo $pgp_add_gallery_wp_media_manager; ?>
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="tab-content">
                                       <div class="tab-pane active" id="local_system">
                                          <div id="local_file_upload">
                                             <p><?php echo $pgp_add_gallery_local_system_notification; ?></p>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="wp_media" style="text-align:center">
                                          <div class="form-group">
                                             <h4><?php echo $pgp_add_gallery_wp_media_guide_title; ?></h4>
                                          </div>
                                          <div class="form-group">
                                             <a class="btn vivid-green" id="wp_media_upload_button" onclick="premium_edition_notification_photo_gallery_plus();">
                                                <?php echo $pgp_add_gallery_upload_thumbnail; ?>
                                             </a>
                                             <p id="wp_media_upload_error_message" style="display:none;">
                                                <?php echo $pgp_add_gallery_wp_media_notification; ?>
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="ux_div_seperator" class="line-separator">
                              </div>
                              <div class="form-actions tabbable-custom" id="ux_div_bind_data">
                                 <div class="table-top-margin">
                                    <select name="ux_ddl_add_gallery" id="ux_ddl_add_gallery">
                                       <option value=""><?php echo $pgp_bulk_action; ?></option>
                                       <option value="delete" style="color:red;"><?php echo $pgp_add_gallery_option_delete_images . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="copy" style="color:red;"><?php echo $pgp_add_gallery_option_copy_images . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="move" style="color:red;"><?php echo $pgp_add_gallery_option_move_images . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="rotate_clockwise" style="color:red;"><?php echo $pgp_add_gallery_option_rotate_clockwise_images . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="rotate_anticlockwise" style="color:red;"><?php echo $pgp_add_gallery_option_rotate_anti_clockwise_images . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="flip_vertically" style="color:red;"><?php echo $pgp_add_gallery_option_flip_images_vertically . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="flip_horizontally" style="color:red;"><?php echo $pgp_add_gallery_option_flip_images_horizontally . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="restore_image" style="color:red;"><?php echo $pgp_add_gallery_option_restore_image . " ( " . $pgp_premium_edition . " )"; ?></option>
                                       <option value="watermark_image" style="color:red;"><?php echo $pgp_add_gallery_option_apply_watermark . " ( " . $pgp_premium_edition . " )"; ?></option>
                                    </select>
                                    <input type="button" class="btn vivid-green" name="ux_btn_bulk_action" id="ux_btn_bulk_action" value="<?php echo $pgp_apply; ?>" onclick="premium_edition_notification_photo_gallery_plus();">
                                 </div>
                                 <div id="ux_div_clone" style="display:none;">
                                    <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_add_gallery_clone">
                                       <thead>
                                          <tr>
                                             <th class="chk-action">
                                                <input type="checkbox" name="ux_chk_add_gallery" id="ux_chk_add_gallery">
                                             </th>
                                             <th>
                                                <label class="control-label">
                                                   <?php echo $pgp_add_gallery_table_thumbnail; ?>
                                                </label>
                                             </th>
                                             <th>
                                                <label class="control-label">
                                                   <?php echo $pgp_add_gallery_table_file_details; ?>
                                                </label>
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr id="ux_dynamic_tr_0" style="display:none;">
                                             <td>
                                                <input type="checkbox" id="ux_chk_select_items_" name="ux_chk_select_items_" value="" onclick="">
                                             </td>
                                             <td>
                                                <div class="image-style">
                                                   <img file_type="" src="" id="ux_pgp_file_" name="ux_pgp_file_"/>
                                                </div>
                                                <div class="custom-div-gap">
                                                   <input type="radio" name="ux_rdl_set_cover_image" id="ux_rdl_set_cover_image_" value="1" />
                                                   <?php echo $pgp_add_gallery_cover_image_title; ?>
                                                </div>
                                                <div class="custom-div-gap">
                                                   <input type="checkbox" id="ux_exclude_image_" name="ux_exclude_image_" value="" />
                                                   <?php echo $pgp_add_gallery_exclude_title; ?>
                                                </div>
                                                <div class="custom-div-gap">
                                                   <?php
                                                   if ($wp_version >= "4.0") {
                                                      ?>
                                                      <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $pgp_add_gallery_edit_tooltip; ?>" data-placement="right" onclick="edit_image_photo_gallery_plus(this);">
                                                         <i class="icon-custom-note" ></i>
                                                         <?php echo $pgp_edit_tooltip; ?>
                                                      </a>
                                                      <label>|</label>
                                                      <?php
                                                   }
                                                   ?>
                                                   <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $pgp_add_gallery_delete_tooltip; ?>" data-placement="right" onclick="delete_upload_image_photo_gallery_plus(this)" control_id="">
                                                      <i class="icon-custom-trash" ></i>
                                                      <?php echo $pgp_delete; ?>
                                                   </a>
                                                </div>
                                             </td>
                                             <td>
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label class="control-label">
                                                            <?php echo $pgp_add_gallery_image_title; ?> :
                                                            <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_image_tooltip; ?>" data-placement="right"></i>
                                                            <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="input-icon right">
                                                            <input type="text" placeholder="<?php echo $pgp_add_gallery_image_placeholder; ?>" class="form-control" name="ux_txt_img_title_" id="ux_txt_img_title_" value="">
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label class="control-label">
                                                            <?php echo $pgp_add_gallery_image_alt_text_title; ?> :
                                                            <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_image_alt_text_tooltip; ?>" data-placement="right"></i>
                                                            <span class="required" aria-required="true">*</span>
                                                         </label>
                                                         <div class="input-icon right">
                                                            <input type="text" placeholder="<?php echo $pgp_add_gallery_image_alt_text_placeholder; ?>" class="form-control" name="ux_img_alt_text_" id="ux_img_alt_text_" value="">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $pgp_add_gallery_image_description_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_image_description_tooltip; ?>" data-placement="right"></i>
                                                      <span class="required" aria-required="true">*</span>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <textarea placeholder="<?php echo $pgp_add_gallery_image_description_placeholder; ?>" class="form-control" name="ux_txt_img_desc_" id="ux_txt_img_desc_"></textarea>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $pgp_tags; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_tag_tooltip; ?>" data-placement="right"></i>
                                                      <span class="required" aria-required="true">*</span>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <select id="ux_ddl_tags_" name="ux_ddl_tags_" class="form-control" multiple>
                                                         <?php
                                                         if (isset($tag_data_unserialize) && count($tag_data_unserialize) > 0) {
                                                            foreach ($tag_data_unserialize as $value) {
                                                               ?>
                                                               <option value="<?php echo intval($value["id"]) ?>"><?php echo esc_attr($value["tag_name"]) ?></option>
                                                               <?php
                                                            }
                                                         }
                                                         ?>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label">
                                                      <?php echo $pgp_add_gallery_enable_url_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_enable_url_tooltip; ?>" data-placement="right"></i>
                                                      <span class="required" aria-required="true">*</span>
                                                   </label>
                                                   <div class="input-group">
                                                      <label>
                                                         <input type="radio" name="ux_rdl_redirect_" id="ux_rdl_enable_redirect_" value="1" onclick="">
                                                         <?php echo $pgp_enable; ?>
                                                      </label>
                                                      <label style="margin-left:15px;">
                                                         <input type="radio" checked="checked" name="ux_rdl_redirect_" id="ux_rdl_disable_redirect_" value="0" onclick="">
                                                         <?php echo $pgp_disable; ?>
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="form-group" id="ux_div_url_redirect_" style="display:none;">
                                                   <label class="control-label"><?php echo $pgp_add_gallery_url_link_title; ?> :
                                                      <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_url_link_tooltip; ?>" data-placement="right"></i>
                                                      <span class="required" aria-required="true">*</span>
                                                   </label>
                                                   <div class="input-icon right">
                                                      <input placeholder="<?php echo $pgp_add_gallery_url_link_placeholder; ?>" class="form-control" type="text" name="ux_txt_img_url_" id="ux_txt_img_url_" value="http://">
                                                   </div>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_add_gallery">
                                    <thead>
                                       <tr>
                                          <th class="custom-checkbox chk-action">
                                             <input type="checkbox" class="custom-chkbox-operation" name="ux_chk_all_gallery" id="ux_chk_all_gallery">
                                          </th>
                                          <th class="custom-gallery-title">
                                             <label class="control-label">
                                                <?php echo $pgp_add_gallery_table_thumbnail; ?>
                                             </label>
                                          </th>
                                          <th>
                                             <label class="control-label">
                                                <?php echo $pgp_add_gallery_table_file_details; ?>
                                             </label>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       if (isset($get_gallery_image_meta_data_unserialize) && count($get_gallery_image_meta_data_unserialize) > 0) {
                                          foreach ($get_gallery_image_meta_data_unserialize as $pic) {
                                             ?>
                                             <tr id="ux_dynamic_tr_<?php echo intval($pic["id"]); ?>">
                                                <td style="width:5%;text-align:center">
                                                   <input type="checkbox" file_type="<?php echo esc_attr($pic["file_type"]); ?>" id="ux_chk_select_items_<?php echo intval($pic["id"]); ?>" onclick="check_value_checkbox_photo_gallery_plus();" name="ux_chk_select_items_<?php echo intval($pic["id"]); ?>" value="<?php echo intval($pic["id"]); ?>"/>
                                                </td>
                                                <td style="width:20%">
                                                   <div class="image-style">
                                                      <img file_type="<?php echo esc_attr($pic["file_type"]); ?>" src="<?php echo PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_URL . esc_attr($pic["image_name"]); ?>" img_name="<?php echo esc_attr($pic["image_name"]); ?>" id="ux_pgp_file_<?php echo intval($pic["id"]); ?>" name="ux_pgp_file_<?php echo intval($pic["id"]); ?>" style="width: 100%;display: block;"/>
                                                   </div>
                                                   <div class="custom-div-gap">
                                                      <input type="radio" name="ux_rdl_set_cover_image" onclick="set_cover_image_dynamically_photo_gallery_plus(<?php echo $pic["id"]; ?>);" <?php echo intval($pic["gallery_cover_image"]) == 1 ? "checked=\"checked\"" : ""; ?> id="ux_rdl_set_cover_image_<?php echo intval($pic["id"]); ?>" value="1" image_data="<?php echo intval($pic["id"]); ?>"/> <?php echo $pgp_add_gallery_cover_image_title; ?>
                                                   </div>
                                                   <div class="custom-div-gap">
                                                      <input type="checkbox" id="ux_exclude_image_<?php echo intval($pic["id"]); ?>" <?php echo intval($pic["exclude_image"]) == 1 ? "checked=\"checked\"" : ""; ?> name="ux_exclude_image_<?php echo intval($pic["id"]); ?>" /><?php echo $pgp_add_gallery_exclude_title; ?>
                                                   </div>
                                                   <div class="custom-div-gap">
                                                      <?php
                                                      if ($wp_version >= "4.0") {
                                                         ?>
                                                         <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $pgp_add_gallery_edit_tooltip; ?>" data-placement="right" id="ux_a_edit_<?php echo intval($pic["id"]); ?>" onclick="edit_image_photo_gallery_plus(this);" control_id="<?php echo intval($pic["id"]); ?>">
                                                            <i class="icon-custom-note" ></i> <?php echo $pgp_edit_tooltip; ?>
                                                         </a><label>|</label>
                                                         <?php
                                                      }
                                                      ?>
                                                      <a href="javascript:void(0);" class="tooltips" data-original-title="<?php echo $pgp_add_gallery_delete_tooltip; ?>" data-placement="right" onclick="delete_upload_image_photo_gallery_plus(this)" control_id="<?php echo intval($pic["id"]); ?>">
                                                         <i class="icon-custom-trash" ></i> <?php echo $pgp_delete; ?>
                                                      </a>
                                                   </div>
                                                </td>
                                                <td>
                                                   <div class="row">
                                                      <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label class="control-label"><?php echo $pgp_add_gallery_image_title; ?> :
                                                               <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_image_tooltip; ?>" data-placement="right"></i>
                                                               <span class="required" aria-required="true">*</span>
                                                            </label>
                                                            <div class="input-icon right">
                                                               <input type="text" placeholder="<?php echo $pgp_add_gallery_image_placeholder; ?>" class="form-control edit" name="ux_txt_img_title_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_title_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr($pic["image_title"]); ?>"/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label class="control-label"><?php echo $pgp_add_gallery_image_alt_text_title; ?> :
                                                               <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_image_alt_text_tooltip; ?>" data-placement="right"></i>
                                                               <span class="required" aria-required="true">*</span>
                                                            </label>
                                                            <div class="input-icon right">
                                                               <input type="text" placeholder="<?php echo $pgp_add_gallery_image_alt_text_placeholder; ?>" class="form-control edit" name="ux_img_alt_text_<?php echo intval($pic["id"]); ?>" id="ux_img_alt_text_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr(stripcslashes(urldecode($pic["alt_text"]))); ?>"/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="form-group">
                                                      <label class="control-label"><?php echo $pgp_add_gallery_image_description_title; ?> :
                                                         <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_image_description_tooltip; ?>" data-placement="right"></i>
                                                         <span class="required" aria-required="true">*</span>
                                                      </label>
                                                      <div class="input-icon right">
                                                         <textarea placeholder="<?php echo $pgp_add_gallery_image_description_placeholder; ?>" class="form-control" rows="3" name="ux_txt_img_desc_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_desc_<?php echo intval($pic["id"]); ?>"><?php echo stripcslashes(urldecode($pic["image_description"])); ?></textarea>
                                                      </div>
                                                   </div>
                                                   <div class="form-group">
                                                      <label class="control-label"><?php echo $pgp_tags; ?> :
                                                         <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_tag_tooltip; ?>" data-placement="right"></i>
                                                         <span class="required" aria-required="true">*</span>
                                                      </label>
                                                      <div class="input-icon right">
                                                         <select name="ux_ddl_tags_<?php echo intval($pic["id"]); ?>[]" id="ux_ddl_tags_<?php echo intval($pic["id"]); ?>" class="form-control" multiple>
                                                            <?php
                                                            $tag_array = isset($pic["tags"]) ? (is_array($pic["tags"]) ? $pic["tags"] : array()) : "";
                                                            if (isset($tag_data_unserialize) && count($tag_data_unserialize) > 0) {
                                                               foreach ($tag_data_unserialize as $value) {
                                                                  ?>
                                                                  <option onclick="remove_selected_attr_photo_gallery_plus(this.id)" id="ux_tag_<?php echo intval($value["id"]) . "_" . intval($pic["id"]); ?>" value="<?php echo $value["id"] ?>" class="<?php echo in_array($value["id"], $tag_array) == true ? "tag" : ""; ?>" <?php echo in_array($value["id"], $tag_array) == true ? "selected" : ""; ?>><?php echo $value["tag_name"] ?></option>
                                                                  <?php
                                                               }
                                                            }
                                                            ?>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="form-group">
                                                      <label class="control-label"> <?php echo $pgp_add_gallery_enable_url_title; ?> :
                                                         <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_enable_url_tooltip; ?>" data-placement="right"></i>
                                                         <span class="required" aria-required="true">*</span>
                                                      </label>
                                                      <div class="input-group">
                                                         <label>
                                                            <input type="radio" <?php echo intval($pic["enable_redirect"]) == 1 ? "checked=\"checked\"" : ""; ?> name="ux_rdl_redirect_<?php echo intval($pic["id"]); ?>" id="ux_rdl_enable_redirect_<?php echo intval($pic["id"]); ?>" value="1" onclick="show_image_url_redirect_photo_gallery_plus(<?php echo intval($pic["id"]); ?>);"><?php echo $pgp_enable; ?>
                                                         </label>
                                                         <label style="margin-left:15px;">
                                                            <input type="radio" <?php echo intval($pic["enable_redirect"]) == 0 ? "checked=\"checked\"" : ""; ?> name="ux_rdl_redirect_<?php echo intval($pic["id"]); ?>" id="ux_rdl_disable_redirect_<?php echo intval($pic["id"]); ?>" value="0" onclick="show_image_url_redirect_photo_gallery_plus(<?php echo intval($pic["id"]); ?>);"><?php echo $pgp_disable; ?>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="form-group" id="ux_div_url_redirect_<?php echo intval($pic["id"]); ?>" style="display: none;">
                                                      <label class="control-label"><?php echo $pgp_add_gallery_url_link_title; ?> :
                                                         <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_gallery_url_link_tooltip; ?>" data-placement="right"></i>
                                                         <span class="required" aria-required="true">*</span>
                                                      </label>
                                                      <div class="input-icon right">
                                                         <input placeholder="<?php echo $pgp_add_gallery_url_link_placeholder; ?>" class="form-control" type="text" name="ux_txt_img_url_<?php echo intval($pic["id"]); ?>" id="ux_txt_img_url_<?php echo intval($pic["id"]); ?>" value="<?php echo esc_attr($pic["redirect_url"]); ?>"/>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                             <?php
                                          }
                                       }
                                       ?>
                                    </tbody>
                                 </table>
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
      <div tabindex="0" class="hidden" id="photo-gallery-plus-edit-image">
         <div class="media-modal wp-core-ui">
            <<?php echo ($wp_version <= "4.2.7" ? "a" : "button") ?> href="#" type="button" class="button-link media-modal-close"><span class="media-modal-icon"><span class="screen-reader-text"><?php echo $pgp_add_gallery_edit_close; ?></span></span></<?php echo ($wp_version <= "4.2.7" ? "a" : "button") ?>>
            <div class="media-modal-content">
               <div class="edit-attachment-frame mode-select hide-menu hide-router">
                  <div class="edit-media-header">
                     <button id="ux_btn_left" class="left"><span class="screen-reader-text"><?php echo $pgp_add_gallery_previous_item; ?></span></button>
                     <button id="ux_btn_right" class="right"><span class="screen-reader-text"><?php echo $pgp_add_gallery_next_item; ?></span></button>
                  </div>
                  <div class="media-frame-title"><h1><?php echo $pgp_add_gallery_attachement_detail; ?></h1></div>
                  <div class="media-frame-content">
                     <div tabindex="0" role="checkbox" aria-label="" aria-checked="false" class="attachment-details save-ready">
                        <div class="attachment-media-view portrait">
                           <div class="updated" id="message-restore">
                              <p>
                                 <?php echo $pgp_add_gallery_restore_message; ?>
                              </p>
                           </div>
                           <div class="updated" id="message-save">
                              <p>
                                 <?php echo $pgp_add_gallery_save_message; ?>
                              </p>
                           </div>
                           <div class="updated" id="message-crop">
                              <p>
                                 <?php echo $pgp_add_gallery_crop_image; ?>
                              </p>
                           </div>
                           <div class="thumbnail thumbnail-image">
                              <div class="widget-layout-body" style="border-bottom: none;">
                                 <div class="imgedit-menu">
                                    <div onclick="premium_edition_notification_photo_gallery_plus();" class="imgedit-crop <?php
                                    if ($wp_version >= "4.5") {
                                       echo "button";
                                    }
                                    ?> disabled" title="<?php echo $pgp_add_gallery_image_effect_crop; ?>"></div>
                                    <div class="imgedit-rleft <?php
                                    if ($wp_version >= "4.5") {
                                       echo "button";
                                    }
                                    ?>" onclick="premium_edition_notification_photo_gallery_plus();" title="<?php echo $pgp_add_gallery_option_rotate_anti_clockwise_images; ?>"></div>
                                    <div class="imgedit-rright <?php
                                    if ($wp_version >= "4.5") {
                                       echo "button";
                                    }
                                    ?>" onclick="premium_edition_notification_photo_gallery_plus();" title="<?php echo $pgp_add_gallery_option_rotate_clockwise_images; ?>"></div>
                                    <div onclick="premium_edition_notification_photo_gallery_plus();" class="imgedit-flipv <?php
                                    if ($wp_version >= "4.5") {
                                       echo "button";
                                    }
                                    ?>" title="<?php echo $pgp_add_gallery_option_flip_images_vertically; ?>"></div>
                                    <div onclick="premium_edition_notification_photo_gallery_plus();" class="imgedit-fliph <?php
                                    if ($wp_version >= "4.5") {
                                       echo "button";
                                    }
                                    ?>" title="<?php echo $pgp_add_gallery_option_flip_images_horizontally; ?>"></div>
                                    <div onclick="premium_edition_notification_photo_gallery_plus();" class="imgedit-undo <?php
                                    if ($wp_version >= "4.5") {
                                       echo "button";
                                    }
                                    ?>" title="<?php echo $pgp_add_gallery_restore_image_title; ?>"></div>
                                    <img class="image-effect <?php echo ($wp_version >= "4.5") ? "image-effect-new" : "image-effect-old"; ?>" onclick="premium_edition_notification_photo_gallery_plus();" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/images/image-effect/grayscale.png"; ?>" title="<?php echo $pgp_add_gallery_image_effect_grayscale; ?>">
                                    <img class="image-effect <?php echo ($wp_version >= "4.5") ? "image-effect-new" : "image-effect-old"; ?>" onclick="premium_edition_notification_photo_gallery_plus();" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/images/image-effect/negative.png"; ?>" title="<?php echo $pgp_add_gallery_image_effect_negative; ?>">
                                    <img class="image-effect <?php echo ($wp_version >= "4.5") ? "image-effect-new" : "image-effect-old"; ?>" onclick="premium_edition_notification_photo_gallery_plus();" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/images/image-effect/removal.png"; ?>" title="<?php echo $pgp_add_gallery_image_effect_removal; ?>">
                                    <img class="image-effect <?php echo ($wp_version >= "4.5") ? "image-effect-new" : "image-effect-old"; ?>" onclick="premium_edition_notification_photo_gallery_plus();" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/images/image-effect/sepia.png"; ?>" title="<?php echo $pgp_add_gallery_image_effect_sepia; ?>">
                                    <img class="image-effect <?php echo ($wp_version >= "4.5") ? "image-effect-new" : "image-effect-old"; ?>" onclick="premium_edition_notification_photo_gallery_plus();" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/images/image-effect/slate.png"; ?>" title="<?php echo $pgp_add_gallery_image_effect_slate; ?>">
                                    <img class="image-effect <?php echo ($wp_version >= "4.5") ? "image-effect-new" : "image-effect-old"; ?>" onclick="premium_edition_notification_photo_gallery_plus();" src="<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/admin/images/image-effect/saturate.png"; ?>" title="<?php echo $pgp_add_gallery_image_effect_saturate; ?>">
                                    <br class="clear">
                                 </div>
                                 <div id="div_image">
                                 </div>
                                 <br class="clear">
                                 <div id="edit-brightness">
                                    <label><?php echo $pgp_add_gallery_brightness_title; ?></label>:
                                    <input type="text" id="brightness_value" onblur="change_value_photo_gallery_plus(this)" style="width:4em;" value="0"></input>
                                    <br class="clear">
                                    <input type="range" id="brightness" value="0" min="-255" max="255"></input>
                                    <input type="button" class="button button-primary" value="<?php echo $pgp_apply; ?>" onclick="premium_edition_notification_photo_gallery_plus();"></input>
                                 </div>
                                 <br class="clear">
                                 <div id="edit-contrast">
                                    <label><?php echo $pgp_add_gallery_contrast_title; ?></label>:
                                    <input type="text" style="width:4em;" id="contrast_value" onblur="change_value_photo_gallery_plus(this)" value="0"></input>
                                    <br class="clear">
                                    <input type="range" id="contrast" value="0" min="-255" max="255"></input>
                                    <input type="button" class="button button-primary" value="<?php echo $pgp_apply; ?>" onclick="premium_edition_notification_photo_gallery_plus();"></input>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="attachment-info">
                           <div class="details">
                              <div class="filename"><strong><?php echo $pgp_file_name; ?>:</strong> <span id="ux_file_name"></span></div>
                              <div class="filename"><strong><?php echo $pgp_add_gallery_file_type; ?>:</strong> <span id="ux_file_type"></span></div>
                              <div class="compat-meta"></div>
                           </div>
                           <div class="imgedit-settings">
                              <div class="imgedit-group">
                                 <div class="imgedit-group-top">
                                    <<?php echo ($wp_version <= "4.3.3") ? "h3" : "h2"; ?>>
                                    <?php echo $pgp_add_gallery_scale_image; ?>
                                    <a href="#" class="dashicons dashicons-editor-help imgedit-help-toggle" onclick="imageEdit.toggleHelp(this);return false;"></a>
                                    </<?php echo ($wp_version <= "4.3.3") ? "h3" : "h2"; ?>>
                                    <div style="display: none;" class="imgedit-help">
                                       <p><?php echo $pgp_add_gallery_help_toggle_scale; ?></p>
                                    </div>
                                    <p>
                                       <?php echo $pgp_add_gallery_original_dimensions; ?>
                                       <span id="image-width"></span> × <span id="image-height"></span>
                                    </p>
                                    <div class="imgedit-submit">
                                       <span class="nowrap" id="scale">
                                       </span>
                                       <input onclick="premium_edition_notification_photo_gallery_plus();" id="ux_btn_scale_image" class="button button-primary" value="Scale" type="button">
                                    </div>
                                 </div>
                              </div>
                              <div class="imgedit-group">
                                 <div class="imgedit-group-top">
                                    <<?php echo ($wp_version <= "4.3.3") ? "h3" : "h2"; ?>>
                                    <?php echo $pgp_add_gallery_image_crop; ?>
                                    <a href="#" class="dashicons dashicons-editor-help imgedit-help-toggle" onclick="imageEdit.toggleHelp(this);return false;"></a>
                                    </<?php echo ($wp_version <= "4.3.3") ? "h3" : "h2"; ?>>
                                    <p style="display: none;" class="imgedit-help">
                                       <strong>
                                          <?php echo $pgp_add_gallery_help_toggle_crop_title; ?>
                                       </strong>
                                       <br>
                                       <?php echo $pgp_add_gallery_help_toggle_crop_scale_description; ?>
                                    </p>
                                 </div>
                                 <p>
                                    <?php echo $pgp_add_gallery_aspect_ratio; ?>
                                    <span class="nowrap" id="ratio">
                                    </span>
                                 </p>
                              </div>
                           </div>
                           <div class="imgedit-wait" id="imgedit-wait-"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="media-modal-backdrop"></div>
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
                  <?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? $pgp_update_gallery : $pgp_add_gallery; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon icon-custom-plus"></i>
                     <?php echo $pgp_add_gallery; ?>
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