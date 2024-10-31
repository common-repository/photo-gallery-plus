<?php
/**
 * Template for Sort Album.
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
      $thumbnail_dimensions_photo_gallery_plus = explode(",", isset($thumbnail_dimensions_data["global_options_thumbnail_dimensions"]) ? $thumbnail_dimensions_data["global_options_thumbnail_dimensions"] : "200,150");
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
                  <?php echo $pgp_sort_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-list"></i>
                     <?php echo $pgp_sort_albums; ?>
                  </div>
                  <p class="premium-editions">
                     <?php echo $pgp_upgrade_need_help ?><a href="http://www.thewpgeeks.com/documentation/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_documentation ?></a><?php echo $pgp_read_and_check; ?><a href="http://www.thewpgeeks.com/frontend-demos/" target="_blank" class="premium-editions-documentation"><?php echo $pgp_demos_section; ?></a> 
                  </p>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_sort_album">
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
                              <input type="submit" class="btn vivid-green" id="ux_ddl_submit" name="ux_ddl_submit" value="<?php echo $pgp_save_changes; ?>">
                           </div>
                        </div>
                        <div class="line-separator"></div>
                        <div class="form-group">
                           <label class="control-label">
                              <?php echo $pgp_choose_album_title; ?> :
                              <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_sort_albums_choose_album_tooltip; ?>" data-placement="right"></i>
                              <span class="required" aria-required="true">* <?php echo " ( " . $pgp_premium_edition . " ) "; ?></span>
                           </label>
                           <select name="ux_ddl_sort_albums" id="ux_ddl_sort_albums" class="form-control" onchange="choose_album_photo_gallery_plus(this.value);">
                              <option value=""><?php echo $pgp_sort_albums_choose_album_title; ?></option>
                              <?php
                              foreach ($sort_albums_get_title as $value) {
                                 ?>
                                 <option value="<?php echo intval($value["meta_id"]); ?>"><?php echo isset($value["album_name"]) != "" ? esc_attr($value["album_name"]) : $pgp_untitled_album; ?></option>
                                 <?php
                              }
                              ?>
                           </select>
                        </div>
                        <div id="ux_div_sort_images" >
                           <ul class="custom-top-space-img" id="ux_ul_sort_images">
                           </ul>
                           <div style="clear:both;"></div>
                        </div>
                        <div class="line-separator" style="clear:both;"></div>
                        <div class="form-actions">
                           <div class="pull-right">
                              <input type="submit" class="btn vivid-green" id="ux_ddl_submit" name="ux_ddl_submit" value="<?php echo $pgp_save_changes; ?>">
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
                  <?php echo $pgp_sort_albums; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-list"></i>
                     <?php echo $pgp_sort_albums; ?>
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