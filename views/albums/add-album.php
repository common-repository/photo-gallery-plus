<?php
/**
 * Template for add Album.
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
      $photo_gallery_plus_upload_cover_nonce = wp_create_nonce("photo_gallery_plus_upload_cover_nonce");
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
                  <?php echo $pgp_add_album; ?>
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
                     <?php echo $pgp_add_album; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a> 
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_add_album">
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
                              <?php echo $pgp_albums_upgrade_message; ?>
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
                                    <?php echo $pgp_add_album_basic_detail; ?>
                                 </a>
                              </li>
                              <li class="">
                                 <a aria-expanded="false" href="#upload_local_media" data-toggle="tab" id="ux_upload_media">
                                    <?php echo $pgp_add_album_upload_local_media; ?>
                                 </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="tab-pane active" id="basic_details">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_album_title; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_album_title_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <textarea rows="1" class="form-control" name="ux_txt_album_title" id="ux_txt_album_title" placeholder="<?php echo $pgp_add_album_title_placeholder; ?>"><?php echo isset($get_album_data_unserialize["album_name"]) ? esc_attr($get_album_data_unserialize["album_name"]) : ""; ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_album_description; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_add_album_description_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                    </label>
                                    <?php
                                    $pgp_album_description_data = isset($get_album_data_unserialize["album_description"]) ? htmlspecialchars_decode($get_album_data_unserialize["album_description"]) : "";
                                    wp_editor($pgp_album_description_data, $id = "ux_heading_content", array("media_buttons" => false, "textarea_rows" => 20, "tabindex" => 4));
                                    ?>
                                    <textarea name="ux_txtarea_album_heading_content" id="ux_txtarea_album_heading_content" style="display:none;"><?php echo $pgp_album_description_data; ?></textarea>
                                 </div>
                              </div>
                              <div class="tab-pane" id="upload_local_media">
                                 <div class="row">
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_galleries_available; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_galleries_available_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                                          </label>
                                          <select class="form-control" multiple="multiple" name="ux_ddl_available_galleries_duplicate" id="ux_ddl_available_galleries_duplicate" style="height:300px">
                                             <?php
                                             $seleted_countries_array = isset($get_album_data_unserialize["selected_galleries"]) ? $get_album_data_unserialize["selected_galleries"] : array();
                                             foreach ($get_galleries_data_for_album as $value) {
                                                if (!in_array(intval($value["meta_id"]), $seleted_countries_array)) {
                                                   ?>
                                                   <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $pgp_untitled; ?></option>
                                                   <?php
                                                }
                                             }
                                             ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="custom-button-gallery">
                                          <div class="form-actions">
                                             <input type="button" class="btn vivid-green" id="ux_btn_add_gallery" name="ux_btn_add_gallery" value="<?php echo $pgp_add_gallery_button . " >>"; ?>" onclick="add_gallery_photo_gallery_plus();" style="width:100px">
                                          </div>
                                          <div class="form-action">
                                             <input type="button" class="btn vivid-green" id="ux_btn_delete_gallery" name="ux_btn_delete_gallery" value="<?php echo "<< " . $pgp_remove_gallery_button; ?>" onclick="remove_gallery_photo_gallery_plus();" style="width:100px">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label class="control-label">
                                             <?php echo $pgp_galleries_included_in_this_album; ?> :
                                             <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_galleries_included_in_this_album_tooltip; ?>" data-placement="right"></i>
                                             <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_label . " ) "; ?></span>
                                          </label>
                                          <select class="form-control" multiple="multiple" name="ux_ddl_selected_galleries[]" id="ux_ddl_selected_galleries" style="height:300px">
                                             <?php
                                             if (isset($get_galleries_data_selected_albums_array) && count($get_galleries_data_selected_albums_array) > 0) {
                                                foreach ($get_galleries_data_selected_albums_array as $value) {
                                                   ?>
                                                   <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo $value["gallery_title"] != "" ? esc_attr($value["gallery_title"]) : $pgp_untitled; ?></option>
                                                   <?php
                                                }
                                             }
                                             ?>
                                          </select>
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
               <a href="admin.php?page=pgp_manage_albums">
                  <?php echo $pgp_albums; ?>
               </a>
               <span>></span>
            </li>
            <li>
               <span>
                  <?php echo isset($_REQUEST["album_id"]) ? $pgp_update_album_title : $pgp_add_album; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="<?php echo isset($_REQUEST["album_id"]) ? 'icon-custom-note' : 'icon-custom-plus'; ?>"></i>
                     <?php echo isset($_REQUEST["album_id"]) ? $pgp_update_album_title : $pgp_add_album; ?>
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