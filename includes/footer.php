<?php
/**
 * This file contains javascript.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/includes
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
      $get_gallery_id_photo_gallery_plus = wp_create_nonce("get_gallery_id_photo_gallery_plus");
      ?>
      </div>
      </div>
      </div>
      <div class="popup" data-popup="ux_open_popup_translator">
         <div class="popup-inner">
            <div class="portlet box vivid-green" style="margin-bottom:0px;">
               <div class="portlet-title">
                  <div class="caption" id="ux_div_action">
                     <?php echo $pgp_translation_request; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <div id="ux_div_popup_header">
                     <form id="ux_frm_language_translator">
                        <div class="form-body">
                           <div class="row">
                              <div class="col-md-6 popup-control">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_feature_requests_your_name; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_popup_your_name_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_your_name" id="ux_txt_your_name" value="" placeholder="<?php echo $pgp_feature_requests_your_name_placeholder; ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 popup-control">
                                 <div class="form-group">
                                    <label class="control-label">
                                       <?php echo $pgp_feature_requests_your_email; ?> :
                                       <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_popup_your_email_tooltip; ?>" data-placement="right"></i>
                                       <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="ux_txt_email_address" id="ux_txt_email_address" value=""  placeholder="<?php echo $pgp_feature_requests_your_email_placeholder; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $pgp_language_interested_to_translate; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_language_interested_to_translate_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <input type="text" class="form-control" name="ux_txt_language" id="ux_txt_language"  value="" placeholder="<?php echo $pgp_language_interested_to_translate_placeholder; ?>">
                           </div>
                           <div class="form-group">
                              <label class="control-label">
                                 <?php echo $pgp_popup_query; ?> :
                                 <i class="icon-custom-question tooltips" data-original-title="<?php echo $pgp_popup_query_tooltip; ?>" data-placement="right"></i>
                                 <span class="required" aria-required="true">*</span>
                              </label>
                              <textarea class="form-control" name="ux_txtarea_query" id="ux_txtarea_query" rows="7" placeholder="<?php echo $pgp_popup_query_placeholder; ?>"><?php echo "Hi,\r\r\nI am interested in translating your plugin Photo Gallery Plus in my native language.\r\r\nPlease get back to me!\r\r\nThanks"; ?></textarea>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <div class="form-actions">
                              <div class="pull-right">
                                 <input type="button" data-popup-close-translator="ux_open_popup_translator" class="btn vivid-green" name="ux_btn_close" id="ux_btn_close" value="<?php echo $pgp_manage_backups_close; ?>">
                                 <input type="submit"  class="btn vivid-green" name="ux_btn_send_request" id="ux_btn_send_request" value="<?php echo $pgp_feature_requests_send_request; ?>">
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         var original_path = "<?php echo PHOTO_GALLERY_PLUS_ORIGINAL_URL; ?>";
         var thumbnail_path = "<?php echo PHOTO_GALLERY_PLUS_THUMBS_CROPPED_URL; ?>";
         var gallery_cover_image = 0;
         jQuery("li > a").parents("li").each(function () {
            if (jQuery(this).parent("ul.page-sidebar-menu-the-wpgeeks").size() === 1) {
               jQuery(this).find("> a").append("<span class=\"selected\"></span>");
            }
         });
         jQuery(".tooltips").tooltip_tip({placement: "right"});
         jQuery(".page-sidebar-the-wpgeeks").on("click", "li > a", function (e) {
            var hasSubMenu = jQuery(this).next().hasClass("sub-menu");
            var parent = jQuery(this).parent().parent();
            var sidebar_menu = jQuery(".page-sidebar-menu-the-wpgeeks");
            var sub = jQuery(this).next();
            var slideSpeed = parseInt(sidebar_menu.data("slide-speed"));
            parent.children("li.open").children(".sub-menu:not(.always-open)").slideUp(slideSpeed);
            parent.children("li.open").removeClass("open");
            var sidebar_close = parent.children("li.open").removeClass("open");
            if (sidebar_close) {
               setInterval(load_sidebar_content_photo_gallery_plus, 100);
            }
            if (sub.is(":visible")) {
               jQuery(this).parent().removeClass("open");
               sub.slideUp(slideSpeed);
            } else if (hasSubMenu) {
               jQuery(this).parent().addClass("open");
               sub.slideDown(slideSpeed);
            }
         });
         function load_sidebar_content_photo_gallery_plus() {
            var menus_height = jQuery(".page-sidebar-menu-the-wpgeeks").height();
            var content_height = jQuery(".page-content").height() + 30;
            if (parseInt(menus_height) > parseInt(content_height)) {
               jQuery(".page-content").attr("style", "min-height:" + menus_height + "px");
            } else {
               jQuery(".page-sidebar-menu-the-wpgeeks").attr("style", "min-height:" + content_height + "px");
            }
         }
         var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
         setTimeout(function () {
            clearInterval(sidebar_load_interval);
         }, 5000);
         function photo_gallery_plus_manage_datatable(id) {
            var oTable = jQuery(id).dataTable({
               "pagingType": "full_numbers",
               "language": {
                  "emptyTable": "No data available in table",
                  "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                  "infoEmpty": "No entries found",
                  "infoFiltered": "(filtered1 from _MAX_ total entries)",
                  "lengthMenu": "Show _MENU_ entries",
                  "search": "Search:",
                  "zeroRecords": "No matching records found"
               },
               "bSort": true,
               "pageLength": 10,
               "aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]
            });
            return oTable;
         }
         function hover_effect_value_photo_gallery_plus() {
            var hover_effect = jQuery("#ux_ddl_hover_effect").val();
            switch (hover_effect) {
               case "none":
                  jQuery("#ux_txt_hover_effect_value").attr("readonly", "readonly").show();
                  jQuery("#ux_txt_hover_scale_value_x,#ux_txt_hover_scale_value_y").hide();
                  jQuery("#ux_spn_hover_value").text("");
                  break;
               case "rotate":
                  jQuery("#ux_txt_hover_effect_value").removeAttr("readonly").show();
                  jQuery("#ux_txt_hover_scale_value_x,#ux_txt_hover_scale_value_y").hide();
                  jQuery("#ux_spn_hover_value").text("(In Degree)");
                  break;
               case "scale":
                  jQuery("#ux_txt_hover_effect_value").removeAttr("readonly").hide();
                  jQuery("#ux_txt_hover_scale_value_x,#ux_txt_hover_scale_value_y").show();
                  jQuery("#ux_spn_hover_value").text("(Multiple of Width & Height)");
                  break;
               case "skew":
                  jQuery("#ux_txt_hover_effect_value").removeAttr("readonly").show();
                  jQuery("#ux_txt_hover_scale_value_x,#ux_txt_hover_scale_value_y").hide();
                  jQuery("#ux_spn_hover_value").text("(In Degree)");
                  break;
            }
         }
         function default_value_photo_gallery_plus(id, value) {
            if (jQuery(id).val() === "") {
               jQuery(id).val(value);
            }
         }
         function only_digits_photo_gallery_plus(event) {
            if (event.which !== 8 && event.which !== 0 && (event.which < 48 || event.which > 57)) {
               event.preventDefault();
            }
         }
         function digits_with_dot_photo_gallery_plus(event) {
            if (event.which === 8 || event.keyCode === 37 || event.keyCode === 39 || event.keyCode === 46 || event.keyCode === 9 || event.keyCode === 110) {
               return true;
            } else if (event.which !== 46 && (event.which < 48 || event.which > 57)) {
               event.preventDefault();
            }
         }
         function paste_prevent_photo_gallery_plus(control_id) {
            jQuery("#" + control_id).on("paste", function (e) {
               e.preventDefault();
            });
         }
         function premium_edition_notification_photo_gallery_plus()
         {
            var premium_edition = <?php echo json_encode($pgp_message_premium_edition); ?>;
            var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
            toastr[shortCutFunction](premium_edition);
         }
         function color_picker_photo_gallery_plus(id, color_value) {
            jQuery(id).colpick({
               layout: "hex",
               colorScheme: "dark",
               color: color_value,
               onChange: function (hsb, hex, rgb, el, bySetColor) {
                  if (!bySetColor)
                     jQuery(el).val("#" + hex);
               }
            }).keyup(function () {
               jQuery(this).colpickSetColor("#" + this.value);
            }).focus(function () {
               jQuery(id).colpickSetColor(color_value);
            });
         }
         function check_opacity_photo_gallery_plus(input) {
            if (input.value < 0)
               input.value = 0;
            if (input.value > 100)
               input.value = 100;
         }
         function show_hide_control_photo_gallery_plus(control_id, div_id) {
            var title = jQuery("#" + control_id).val();
            switch (title) {
               case "true":
                  jQuery("#" + div_id).css("display", "block");
                  break;
               case "show":
               case "enable":
                  jQuery("#" + div_id).css("display", "block");
                  break;
               case "hide":
               case "disable":
                  jQuery("#" + div_id).css("display", "none");
                  break;
               default:
                  jQuery("#" + div_id).css("display", "none");
                  break;
            }
            var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
            setTimeout(function () {
               clearInterval(sidebar_load_interval);
            }, 3000);
         }
         function overlay_loading_photo_gallery_plus(message) {
            var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
            jQuery("body").append(overlay_opacity);
            var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
            jQuery("body").append(overlay);
            var success = <?php echo json_encode($pgp_success); ?>;
            if (message !== undefined) {
               var issuccessmessage = jQuery("#toast-container").exists();
               if (issuccessmessage !== true) {
                  var shortCutFunction = jQuery("#manage_messages input:checked").val();
                  toastr[shortCutFunction](message, success);
               }
            }
         }
         function remove_overlay_photo_gallery_plus() {
            jQuery(".loader_opacity").remove();
            jQuery(".opacity_overlay").remove();
         }
         function base64_encode_photo_gallery_plus(data) {
            var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
            var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
                    ac = 0,
                    enc = "",
                    tmp_arr = [];
            if (!data) {
               return data;
            }
            do {
               o1 = data.charCodeAt(i++);
               o2 = data.charCodeAt(i++);
               o3 = data.charCodeAt(i++);
               bits = o1 << 16 | o2 << 8 | o3;
               h1 = bits >> 18 & 0x3f;
               h2 = bits >> 12 & 0x3f;
               h3 = bits >> 6 & 0x3f;
               h4 = bits & 0x3f;
               tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
            } while (i < data.length);
            enc = tmp_arr.join("");
            var r = data.length % 3;
            return(r ? enc.slice(0, r - 3) : enc) + "===".slice(r || 3);
         }
         function get_gallery_id_photo_gallery()
         {
            jQuery.post(ajaxurl,
                    {
                       data: "<?php echo isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0; ?>",
                       param: "pgp_get_gallery_id_photo_gallery_plus",
                       action: "photo_gallery_plus_action_module",
                       _wp_nonce: "<?php echo $get_gallery_id_photo_gallery_plus; ?>"
                    },
                    function (data)
                    {
                       window.location.href = "admin.php?page=pgp_add_gallery&gallery_id=" + data + "&mode=add";
                    });
         }
         function submit_handler_common_photo_gallery_plus(form_id, meta_id, param, nonce, overlay_loading, window_location) {
            overlay_loading_photo_gallery_plus(overlay_loading);
            jQuery.post(ajaxurl, {
               data: base64_encode_photo_gallery_plus(jQuery(form_id).serialize()),
               id: meta_id,
               param: param,
               action: "photo_gallery_plus_action_module",
               _wp_nonce: nonce
            },
                    function () {
                       setTimeout(function () {
                          remove_overlay_photo_gallery_plus();
                          window.location.href = "admin.php?page=" + window_location;
                       }, 3000);
                    });
         }
         function set_thumbnail_dimension_in_shortcode(control, image_dimension, message) {
            jQuery(control).val() === "" || jQuery(control).val() === 0 ? jQuery(control).val(image_dimension) : "";
            if (parseInt(jQuery(control).val()) > parseInt(image_dimension)) {
               var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
               $toast = toastr[shortCutFunction](message);
               jQuery(control).val(image_dimension);
            }
         }
         jQuery(".reset-page").click(function () {
            window.location.href = self.location['href'];
         });
         function set_thumbnail_dimension_in_shortcode_photo_gallery_plus(control, image_dimension, message) {
            jQuery(control).val() === "" || jQuery(control).val() === 0 ? jQuery(control).val(image_dimension) : "";
            if (parseInt(jQuery(control).val()) > parseInt(image_dimension)) {
               var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
               toastr[shortCutFunction](message);
               jQuery(control).val(image_dimension);
            }
         }
         function check_thumbnail_dimension_photo_gallery_plus(control, image_id) {
            switch (jQuery(control).attr("id")) {
               case "ux_txt_width":
                  jQuery(control).val() === "" || jQuery(control).val() === 0 ? jQuery(control).val("1600") : "";
                  if (parseInt(jQuery(image_id).val()) >= parseInt(jQuery(control).val())) {
                     var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                     toastr[shortCutFunction](<?php echo json_encode($pgp_shortcode_thumbnail_dimension_exceed_msg); ?>);
                     jQuery(control).val("1600");
                  }
                  break;
               case "ux_txt_height":
                  jQuery(control).val() === "" || jQuery(control).val() === 0 ? jQuery(control).val("900") : "";
                  if (parseInt(jQuery(image_id).val()) >= parseInt(jQuery(control).val())) {
                     var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                     toastr[shortCutFunction](<?php echo json_encode($pgp_shortcode_thumbnail_dimension_exceed_msg); ?>);
                     jQuery(control).val("900");
                  }
                  break;
               case "ux_txt_thumbnail_width":
                  jQuery(control).val() === "" || jQuery(control).val() === 0 ? jQuery(control).val("250") : "";
                  if (parseInt(jQuery(control).val()) >= parseInt(jQuery(image_id).val())) {
                     var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                     toastr[shortCutFunction](<?php echo json_encode($pgp_shortcode_thumbnail_dimension_exceed_msg); ?>);
                     jQuery(control).val("200");
                  }
                  break;
               case "ux_txt_thumbnail_height":
                  jQuery(control).val() === "" || jQuery(control).val() === 0 ? jQuery(control).val("200") : "";
                  if (parseInt(jQuery(control).val()) >= parseInt(jQuery(image_id).val())) {
                     var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                     toastr[shortCutFunction](<?php echo json_encode($pgp_shortcode_thumbnail_dimension_exceed_msg); ?>);
                     jQuery(control).val("200");
                  }
                  break;
            }
         }
         function confirm_delete_photo_gallery_plus(meta_id, overlay_message, page_url, param, nonce) {
            var checkstr = confirm(<?php echo json_encode($pgp_delete_data); ?>);
            if (checkstr === true) {
               jQuery.post(ajaxurl, {
                  meta_id: meta_id,
                  param: param,
                  action: "photo_gallery_plus_action_module",
                  _wp_nonce: nonce
               },
                       function (data) {
                          overlay_loading_photo_gallery_plus(overlay_message);
                          setTimeout(function () {
                             remove_overlay_photo_gallery_plus();
                             window.location.href = page_url;
                          }, 3000);
                       });
            }
         }
         function check_all_photo_gallery_plus(id) {
            if (jQuery("input:checked", oTable.fnGetFilteredNodes()).length === jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).not("[disabled]").length) {
               jQuery(id).attr("checked", "checked");
            } else {
               jQuery(id).removeAttr("checked");
            }
         }
         function sort_function_photo_gallery_plus(control_id)
         {
            var options = jQuery("#" + control_id + " option");
            var arr = options.map(function (_, o)
            {
               return{
                  t: jQuery(o).text(),
                  v: o.value
               };
            }).get();
            arr.sort(function (o1, o2)
            {
               return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
            });
            options.each(function (i, o)
            {
               o.value = arr[i].v;
               jQuery(o).text(arr[i].t);
            });
         }
         function shortcode_source_type_control_photo_gallery_plus(control_id, gallery_id, album_id, album_control_id)
         {
            var title = jQuery("#" + control_id).val();
            switch (title) {
               case "gallery":
                  jQuery("#" + gallery_id).css("display", "block");
                  jQuery("#" + album_id).css("display", "none");
                  jQuery("#" + album_control_id).css("display", "none");
                  jQuery("#ux_div_album_type").css("display", "none");
                  break;
               case "album":
                  jQuery("#" + album_id).css("display", "block");
                  jQuery("#" + gallery_id).css("display", "none");
                  jQuery("#" + album_control_id).css("display", "block");
                  jQuery("#ux_div_album_type").css("display", "block");
                  break;
               default:
                  jQuery("#" + gallery_id).css("display", "none");
                  jQuery("#" + album_id).css("display", "none");
                  jQuery("#" + album_control_id).css("display", "none");
                  jQuery("#ux_div_album_type").css("display", "none");
                  break;
            }
            var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
            setTimeout(function ()
            {
               clearInterval(sidebar_load_interval);
            }, 3000);
         }
         var clipboard = new Clipboard(".icon-custom-docs");
         clipboard.on("success", function (e)
         {
            var shortCutFunction = jQuery("#manage_messages input:checked").val();
            toastr[shortCutFunction](<?php echo json_encode($pgp_copied_successfully) ?>);
         });
         // Close popup
         jQuery("[data-popup-close-translator]").on("click", function (e)
         {
            var confirm_close = confirm(<?php echo json_encode($pgp_confirm_close); ?>);
            if (confirm_close === true)
            {
               var targeted_popup_class = jQuery(this).attr("data-popup-close-translator");
               jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
            }

            e.preventDefault();
         });

         function open_popup_photo_gallery_plus()
         {
            jQuery("[data-popup-open]").on("click", function (e)
            {
               var targeted_popup_class = jQuery(this).attr("data-popup-open");
               jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
               e.preventDefault();
            });
         }
         function show_pop_up_photo_gallery_plus()
         {
            open_popup_photo_gallery_plus();
         }
         jQuery(document).ready(function ()
         {
            open_popup_photo_gallery_plus();
         });
         var translation_request_array = [];
         var url = "<?php echo the_wpgeeks_url . "/feedbacks.php"; ?>";
         var domain_url = "<?php echo site_url(); ?>";
         jQuery("#ux_frm_language_translator").validate
                 ({
                    rules:
                            {
                               ux_txt_your_name:
                                       {
                                          required: true
                                       },
                               ux_txt_email_address:
                                       {
                                          required: true,
                                          email: true
                                       },
                               ux_txt_language:
                                       {
                                          required: true
                                       },
                               ux_txtarea_query:
                                       {
                                          required: true
                                       }
                            },
                    errorPlacement: function ()
                    {
                    },
                    highlight: function (element)
                    {
                       jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
                    },
                    success: function (label, element)
                    {
                       var icon = jQuery(element).parent(".input-icon").children("i");
                       jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
                       icon.removeClass("fa-warning").addClass("fa-check");
                    },
                    submitHandler: function (form)
                    {
                       translation_request_array.push(jQuery("#ux_txt_your_name").val());
                       translation_request_array.push(jQuery("#ux_txt_email_address").val());
                       translation_request_array.push(domain_url);
                       translation_request_array.push(jQuery("#ux_txt_language").val());
                       translation_request_array.push(jQuery("#ux_txtarea_query").val());
                       jQuery.post(url,
                               {
                                  data: JSON.stringify(translation_request_array),
                                  param: "pgp_translation_request"
                               },
                               function (data)
                               {
                                  overlay_loading_photo_gallery_plus(<?php echo json_encode($pgp_feature_request_message) ?>);
                                  setTimeout(function ()
                                  {
                                     remove_overlay_photo_gallery_plus();
                                     window.location.href = "admin.php?page=manage_photo_gallery_plus";
                                  }, 3000);
                               });
                    }
                 });
      <?php
      $check_photo_gallery_plus_wizard = get_option("photo-gallery-plus-wizard-set-up");
      $page_url = $check_photo_gallery_plus_wizard == "" ? "pgp_wizard_photo_gallery_plus" : esc_attr($_GET["page"]);
      if (isset($_GET["page"])) {
         switch ($page_url) {
            case "pgp_wizard_photo_gallery_plus":
               ?>
                  function show_hide_details_photo_gallery_plus()
                  {
                     if (jQuery("#ux_div_wizard_set_up").hasClass("wizard-set-up"))
                     {
                        jQuery("#ux_div_wizard_set_up").css("display", "none");
                        jQuery("#ux_div_wizard_set_up").removeClass("wizard-set-up");
                     } else
                     {
                        jQuery("#ux_div_wizard_set_up").css("display", "block");
                        jQuery("#ux_div_wizard_set_up").addClass("wizard-set-up");
                     }
                  }
                  function plugin_stats_photo_gallery_plus(type)
                  {
                     overlay_loading_photo_gallery_plus();
                     jQuery.post(ajaxurl,
                             {
                                type: type,
                                param: "wizard_photo_gallery_plus",
                                action: "photo_gallery_plus_action_module",
                                _wp_nonce: "<?php echo $photo_gallery_plus_check_status; ?>"
                             },
                             function ()
                             {
                                remove_overlay_photo_gallery_plus();
                                window.location.href = "admin.php?page=manage_photo_gallery_plus";
                             });
                  }
               <?php
               break;
            case "manage_photo_gallery_plus" :
               ?>
                  jQuery("#ux_li_galleries").addClass("active");
                  jQuery("#ux_li_manage_galleries").addClass("active");
               <?php
               if (galleries_photo_gallery_plus === "1") {
                  ?>
                     var oTable = photo_gallery_plus_manage_datatable("#ux_tbl_manage_gallery");
                     jQuery("#ux_chk_all_galleries").click(function ()
                     {
                        jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).attr("checked", this.checked);
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function ()
                     {
                        clearInterval(sidebar_load_interval);
                     }, 3000);
                  <?php
               }
               break;
            case "pgp_add_gallery":
               ?>
                  jQuery("#ux_li_galleries").addClass("active");
                  jQuery("#ux_li_add_galleries").addClass("active");
               <?php
               if (galleries_photo_gallery_plus === "1") {
                  ?>
                     var oTable = photo_gallery_plus_manage_datatable("#ux_tbl_add_gallery");
                     function remove_selected_attr_photo_gallery_plus(id)
                     {
                        if (jQuery("#" + id).hasClass("tag"))
                        {
                           if (jQuery("#" + id).prop("selected") == true)
                           {
                              jQuery("#" + id).prop("selected", false);
                           }
                           jQuery("#" + id).removeClass("tag");
                        } else
                        {
                           jQuery("#" + id).addClass("tag");
                        }
                     }
                     array_delete_images = [];
                     array_gallery_images_data = [];
                     array_image_timestrap = "";

                     var pl_upload_url = "<?php echo PHOTO_GALLERY_PLUS_PLUGIN_DIR_URL . "assets/global/plugins/pluploader/" ?>";
                     jQuery("#ux_frm_add_gallery").validate
                             ({
                                rules:
                                        {
                                           ux_txt_gallery_title:
                                                   {
                                                      required: true
                                                   }
                                        },
                                errorPlacement: function ()
                                {
                                },
                                highlight: function (element)
                                {
                                   jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
                                },
                                success: function (element)
                                {
                                   jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
                                },
                                submitHandler: function ()
                                {
                                   if (window.CKEDITOR)
                                   {
                                      var gallery_description = jQuery("#ux_txtarea_gallery_heading_content").val(CKEDITOR.instances["ux_heading_content"].getData());
                                   } else if (jQuery("#wp-ux_heading_content-wrap").hasClass("tmce-active"))
                                   {
                                      var gallery_description = jQuery("#ux_txtarea_gallery_heading_content").val(tinyMCE.get("ux_heading_content").getContent());
                                   } else
                                   {
                                      var gallery_description = jQuery("#ux_txtarea_gallery_heading_content").val(jQuery("#ux_heading_content").val());
                                   }
                                   if (array_delete_images.length > 0)
                                   {
                                      jQuery.post(ajaxurl,
                                              {
                                                 delete_image_data: JSON.stringify(array_delete_images),
                                                 param: "delete_gallery_images",
                                                 action: "photo_gallery_plus_action_module",
                                                 _wp_nonce: "<?php echo isset($gallery_images_delete_nonce) ? $gallery_images_delete_nonce : ""; ?>"
                                              });
                                   }
                                   var image_meta = [];
                                   jQuery.each(oTable.fnGetNodes(), function (index, value)
                                   {
                                      image_meta.push(jQuery(value.cells[0]).find("input:checkbox").val());
                                   });
                                   overlay_loading_photo_gallery_plus(<?php echo isset($_REQUEST["mode"]) && esc_attr($_REQUEST["mode"]) == "edit" ? json_encode($pgp_update_gallery_data) : json_encode($pgp_save_gallery_data); ?>);
                                   jQuery.post(ajaxurl,
                                           {
                                              gallery_id: <?php echo isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0; ?>,
                                              gallery_title: base64_encode_photo_gallery_plus(jQuery("#ux_txt_gallery_title").serialize()),
                                              gallery_description: base64_encode_photo_gallery_plus(jQuery("#ux_txtarea_gallery_heading_content").serialize()),
                                              gallery_cover_image: parseInt(gallery_cover_image),
                                              data: base64_encode_photo_gallery_plus(jQuery("input,textarea,select", oTable.fnGetNodes()).serialize()),
                                              array_gallery_images_data: encodeURIComponent(JSON.stringify(image_meta)),
                                              param: "update_gallery_data",
                                              action: "photo_gallery_plus_action_module",
                                              _wp_nonce: "<?php echo isset($gallery_update_data_nonce) ? $gallery_update_data_nonce : ""; ?>"
                                           },
                                           function ()
                                           {
                                              setTimeout(function ()
                                              {
                                                 remove_overlay_photo_gallery_plus();
                                                 window.location.href = "admin.php?page=manage_photo_gallery_plus";
                                              }, 3000);
                                           });
                                }
                             });
                     function upload_type_photo_gallery_plus()
                     {
                        jQuery("#ux_basic_details").on("click", function ()
                        {
                           jQuery("#ux_div_bind_data").css("display", "none");
                           jQuery("#ux_div_seperator").css("display", "none");
                        });
                        jQuery("#ux_upload_media").on("click", function ()
                        {
                           jQuery("#ux_div_bind_data").css("display", "block");
                           jQuery("#ux_div_seperator").css("display", "block");
                        });
                        jQuery("#ux_online_upload_media").on("click", function ()
                        {
                           jQuery("#ux_div_bind_data").css("display", "block");
                           jQuery("#ux_div_seperator").css("display", "block");
                        });
                     }
                     jQuery(document).ready(function ()
                     {
                        jQuery("#ux_div_bind_data").css("display", "none");
                        jQuery("#ux_div_seperator").css("display", "none");
                        jQuery("#cboxTitle").remove();
                        upload_type_photo_gallery_plus();
                        jQuery("#brightness").on("input change", function ()
                        {
                           jQuery("#brightness_value").val(jQuery("#brightness").val());
                        });
                        jQuery("#contrast").on("input change", function ()
                        {
                           jQuery("#contrast_value").val(jQuery("#contrast").val());
                        });
                        if (window.CKEDITOR)
                        {
                           CKEDITOR.replace("ux_heading_content");
                        }
                        set_gallery_cover_image();
                  <?php
                  global $wp_version;
                  if (isset($get_gallery_image_meta_data_unserialize) && count($get_gallery_image_meta_data_unserialize) > 0) {
                     foreach ($get_gallery_image_meta_data_unserialize as $value) {
                        ?>
                              show_image_url_redirect_photo_gallery_plus(<?php echo $value["id"] ?>);
                        <?php
                     }
                  }
                  if ($wp_version <= 3.5) {
                     ?>
                           jQuery("#wp_media_upload_error_message").css("display", "block");
                           jQuery("#wp_media_upload_button").css("display", "none");
                     <?php
                  } else {
                     wp_enqueue_media();
                     ?>
                           var vid_thumb_file_frame;
                           var count_upload_images = [];
                           var total_images_upload = "";
                     <?php
                  }
                  ?>
                        var overlay_loader = "0";
                        jQuery("#local_file_upload").plupload
                                ({
                                   runtimes: "html5,html4,flash,silverlight",
                                   url: ajaxurl + "?param=upload_gallery_pics&action=photo_gallery_plus_image_upload&_wp_nonce=<?php echo $upload_local_system_files_nonce; ?>",
                                   chunk_size: "2mb",
                                   filters:
                                           {
                                              max_file_size: "100mb",
                                              mime_types: [
                                                 {title: "Image files", extensions: "jpg,jpeg,gif,png"}
                                              ]
                                           },
                                   rename: true,
                                   sortable: true,
                                   dragdrop: true,
                                   unique_names: false,
                                   views: {
                                      list: true,
                                      thumbs: true,
                                      active: "thumbs"
                                   },
                                   flash_swf_url: pl_upload_url + "moxie.swf",
                                   silverlight_xap_url: pl_upload_url + "moxie.xap",
                                   init:
                                           {
                                              FileUploaded: function (up, file, response)
                                              {
                                                 if (overlay_loader === "0")
                                                 {
                                                    overlay_loading_photo_gallery_plus();
                                                    overlay_loader = "1";
                                                 }
                                                 var obj = jQuery.parseJSON(response.response);
                                                 var gallery_image_name = obj.result;

                                                 jQuery.post(ajaxurl,
                                                         {
                                                            gallery_id: "<?php echo isset($_REQUEST["gallery_id"]) ? intval($_REQUEST["gallery_id"]) : 0; ?>",
                                                            image_name: gallery_image_name,
                                                            action: "photo_gallery_plus_action_module",
                                                            param: "photo_gallery_plus_upload_images",
                                                            file_type: "image",
                                                            _wp_nonce: "<?php echo isset($gallery_upload_images_nonce) ? $gallery_upload_images_nonce : ""; ?>"
                                                         },
                                                         function (data)
                                                         {
                                                            var image_data = jQuery.parseJSON(data);
                                                            bind_rows_to_table_photo_gallery_plus(image_data, image_data[2], image_data[2], "");
                                                            var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                                                            setTimeout(function ()
                                                            {
                                                               clearInterval(sidebar_load_interval);
                                                            }, 3000);
                                                         });
                                              },
                                              UploadComplete: function () {
                                                 set_gallery_cover_image();
                                                 remove_overlay_photo_gallery_plus();
                                                 overlay_loader = "0";
                                              }
                                           }
                                });
                     });
                     function set_cover_image_dynamically_photo_gallery_plus(image_id)
                     {
                        var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                        jQuery("input[type=radio][name=ux_rdl_set_cover_image]:checked", oTable.fnGetNodes()).each(function ()
                        {
                           jQuery(this).removeAttr("checked");
                        });
                        jQuery("#ux_rdl_set_cover_image_" + image_id).attr("checked", "checked");
                        gallery_cover_image = image_id;
                     }
                     function isUrlValid_photo_gallery_plus(url)
                     {
                        var value = jQuery("#" + url.id).val();
                        var condition = /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(value);
                        if (condition === false)
                        {
                           var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                           toastr[shortCutFunction](<?php echo json_encode($pgp_validate_url); ?>);
                        }
                     }
                     function check_value_checkbox_photo_gallery_plus()
                     {
                        if (jQuery("input[type=checkbox][name*=ux_chk_select_items_]:checked", oTable.fnGetFilteredNodes()).length === jQuery("input[type=checkbox][name*=ux_chk_select_items_]", oTable.fnGetFilteredNodes()).length)
                        {
                           jQuery("#ux_chk_all_gallery").attr("checked", "checked");
                        } else
                        {
                           jQuery("#ux_chk_all_gallery").removeAttr("checked");
                        }
                     }
                     function bind_rows_to_table_photo_gallery_plus(image_data, image_title, image_alt_text, image_description)
                     {
                        var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                        var col1 = jQuery("#ux_dynamic_tr_0 td:first-child").clone();
                        var col2 = jQuery("#ux_dynamic_tr_0 td:nth-child(2)").clone();
                        var col3 = jQuery("#ux_dynamic_tr_0 td:nth-child(3)").clone();
                        var rowIdxes = oTable.fnAddData([col1.html(), col2.html(), col3.html()]);
                        var rowTr = oTable.fnGetNodes(rowIdxes[0]);
                        jQuery(rowTr).find("td:first-child").attr("style", "text-align:center");
                        jQuery(rowTr).find("td:first-child input[type=checkbox]").attr("value", image_data[0]);
                        jQuery(rowTr).find("td:first-child input[type=checkbox]").attr("name", "ux_chk_select_items_" + image_data[0]);
                        jQuery(rowTr).find("td:first-child input[type=checkbox]").attr("id", "ux_chk_select_items_" + image_data[0]);
                        jQuery(rowTr).find("td:first-child input[type=checkbox]").attr("onclick", "check_value_checkbox_photo_gallery_plus()");
                        jQuery(rowTr).find("td:nth-child(2)").attr("width", "20%");
                        jQuery(rowTr).find("td:nth-child(2) img").attr("src", "<?php echo PHOTO_GALLERY_PLUS_THUMBS_NON_CROPPED_URL; ?>" + image_data[1]);
                        jQuery(rowTr).find("td:nth-child(2) img").attr("style", "width:100%;display:block;");
                        jQuery(rowTr).find("td:nth-child(2) img").attr("id", "ux_pgp_file_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) img").attr("name", "ux_pgp_file_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) img").attr("file_type", "image");
                        jQuery(rowTr).find("td:nth-child(2) img").attr("img_name", image_data[1]);
                        jQuery(rowTr).find("td:nth-child(2) input[type=radio]").attr("id", "ux_rdl_set_cover_image_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) input[type=radio]").attr("image_data", image_data[0]);
                        if (oTable.fnGetNodes().length === 1)
                        {
                           jQuery(rowTr).find("td:nth-child(2) input[type=radio]").attr("checked", "checked");
                           set_gallery_cover_image();
                        }
                        jQuery(rowTr).find("td:nth-child(2) input[type=radio]").attr("onclick", "set_cover_image_dynamically_photo_gallery_plus(" + image_data[0] + ");");
                        jQuery(rowTr).find("td:nth-child(2) input[type=checkbox]").attr("id", "ux_exclude_image_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) input[type=checkbox]").attr("name", "ux_exclude_image_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) a:eq(0)").attr("id", "ux_rdl_edit_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) a:eq(0)").attr("control_id", image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) a:eq(1)").attr("id", "ux_rdl_delete_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(2) a:eq(1)").attr("control_id", image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input:text:eq(0)").attr("id", "ux_txt_img_title_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input:text:eq(0)").attr("name", "ux_txt_img_title_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input:text:eq(0)").val(image_title);
                        jQuery(rowTr).find("td:nth-child(3) input:text:eq(1)").attr("id", "ux_img_alt_text_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input:text:eq(1)").attr("name", "ux_img_alt_text_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input:text:eq(1)").val(image_alt_text);
                        jQuery(rowTr).find("td:nth-child(3) textarea").attr("id", "ux_txt_img_desc_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) textarea").attr("name", "ux_txt_img_desc_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) textarea").val(image_description);
                        jQuery(rowTr).find("td:nth-child(3) input[type=radio][id*=ux_rdl_enable_redirect_]").attr("id", "ux_rdl_enable_redirect_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input[type=radio][id*=ux_rdl_disable_redirect_]").attr("id", "ux_rdl_disable_redirect_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input[type=radio]").attr("name", "ux_rdl_redirect_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input[type=radio]").attr("onclick", "show_image_url_redirect_photo_gallery_plus(" + image_data[0] + ")");
                        jQuery(rowTr).find("td:nth-child(3) div[id=ux_div_url_redirect_]").attr("id", "ux_div_url_redirect_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input[id=ux_txt_img_url_]").attr("id", "ux_txt_img_url_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input[name=ux_txt_img_url_]").attr("name", "ux_txt_img_url_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) input[name=ux_txt_img_url_" + image_data[0] + "]").attr("onblur", "isUrlValid_photo_gallery_plus(this);");
                        jQuery(rowTr).find("td:nth-child(3) select").attr("id", "ux_ddl_tags_" + image_data[0]);
                        jQuery(rowTr).find("td:nth-child(3) select").attr("name", "ux_ddl_tags_" + image_data[0] + "[]");
                        jQuery(rowTr).find("td:nth-child(3) i").tooltip_tip({placement: "right"});
                     }
                     jQuery("#ux_chk_all_gallery").click(function ()
                     {
                        var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                        var checkProp = jQuery("#ux_chk_all_gallery").prop("checked");
                        jQuery("input[type=checkbox][name*=ux_chk_select_items_]", oTable.fnGetNodes()).each(function ()
                        {
                           checkProp === true ? jQuery(this).attr("checked", "checked") : jQuery(this).removeAttr("checked");
                        });
                     });
                     function change_value_photo_gallery_plus(control)
                     {
                        control.id === "brightness_value" ? jQuery("#brightness").val(jQuery("#brightness_value").val()) : jQuery("#contrast").val(jQuery("#contrast_value").val());
                     }
                     function get_scaled_image_photo_gallery_plus(control)
                     {
                        var get_value = jQuery(control).val();
                        var get_type = jQuery(control).attr("type_of");
                        var split_get_type = get_type.split("-");
                        var original_dimension = jQuery("#imgedit-scale-" + split_get_type[0] + "-" + split_get_type[1]).attr("original_value");
                        var ratio = get_value / original_dimension;
                        if (split_get_type[0] === "width")
                        {
                           var get_dimension = jQuery("#imgedit-scale-height-" + split_get_type[1]).attr("original_value");
                           var regenerated_value = Math.round(get_dimension * ratio);
                           jQuery("#imgedit-scale-height-" + split_get_type[1]).val(regenerated_value);
                        } else
                        {
                           var get_dimension = jQuery("#imgedit-scale-width-" + split_get_type[1]).attr("original_value");
                           var regenerated_value = Math.round(get_dimension * ratio);
                           jQuery("#imgedit-scale-width-" + split_get_type[1]).val(regenerated_value);
                        }
                        if (parseInt(get_value) > original_dimension)
                        {
                           jQuery("#imgedit-scale-warn-" + split_get_type[1]).attr("style", "visibility: visible");
                        } else if (jQuery.isNumeric(get_value) !== true)
                        {
                           jQuery("#imgedit-scale-warn-" + split_get_type[1]).attr("style", "visibility: visible");
                        } else
                        {
                           jQuery("#imgedit-scale-warn-" + split_get_type[1]).attr("style", "visibility: hidden");
                        }
                     }
                     function get_image_dimension_photo_gallery_plus(image_id)
                     {
                        jQuery.post(ajaxurl,
                                {
                                   image_id: image_id,
                                   param: "get_image_original_dimension",
                                   action: "photo_gallery_plus_action_module",
                                   _wp_nonce: "<?php echo $get_original_image_dimension_nonce; ?>"
                                },
                                function (data)
                                {
                                   var image_dimension = data.split(",");
                                   jQuery("#image-width").html(image_dimension[0]);
                                   jQuery("#image-height").html(image_dimension[1]);
                                   jQuery("#imgedit-scale-width-" + image_id).val(image_dimension[0]);
                                   jQuery("#imgedit-scale-height-" + image_id).val(image_dimension[1]);
                                   jQuery("#imgedit-scale-width-" + image_id).attr("original_value", image_dimension[0]);
                                   jQuery("#imgedit-scale-height-" + image_id).attr("original_value", image_dimension[1]);
                                   jQuery("#ux_btn_scale_image").attr("image_id", image_id);
                                   jQuery("#imgedit-x-" + image_id).val(image_dimension[0]);
                                   jQuery("#imgedit-y-" + image_id).val(image_dimension[1]);
                                   var big = Math.max(image_dimension[0], image_dimension[1]);
                                   var sizer = big > 400 ? 400 / big : 1;
                                   jQuery("#imgedit-sizer-" + image_id).val(sizer);
                                });
                     }
                     function close_image_editor_photo_gallery_plus(control)
                     {
                        jQuery("#photo-gallery-plus-edit-image").addClass("hidden");
                     }
                     function crop_select_value_photo_gallery_plus()
                     {
                        setInterval(function ()
                        {
                           jQuery("input[type=hidden][id*=imgedit-selection-]").val() === "" ? jQuery(".imgedit-crop").addClass("disabled") : "";
                           if (jQuery("input[type=hidden][id*=imgedit-selection-]").val() !== "")
                           {
                              jQuery(".imgedit-crop").removeClass("disabled");
                           }
                        }, 0);
                        jQuery("#brightness_value").val(0);
                        jQuery("#contrast_value").val(0);
                        jQuery("#contrast").val(0);
                        jQuery("#brightness").val(0);
                     }
                     function show_next_image_photo_gallery_plus(control, row_position)
                     {
                        var image_counter = 0;
                        var data_length = oTable.fnGetData().length - 1;
                        var next_row_pos = row_position + 1;
                        var next_row_data = oTable.fnGetNodes(next_row_pos);
                        var file_type = jQuery(next_row_data).find("img").attr("file_type");
                        if (file_type !== "image" || file_type === undefined)
                        {
                           for (var next_img = 1; next_img < data_length; next_img++)
                           {
                              var next_row_pos = next_row_pos + next_img;
                              var next_row_data = oTable.fnGetNodes(next_row_pos);
                              var file_type = jQuery(next_row_data).find("img").attr("file_type");
                              if (file_type === "image")
                              {
                                 break;
                              }
                           }
                           image_counter = 1;
                        } else
                        {
                           image_counter = 1;
                        }
                        if (image_counter === 1)
                        {
                           var prev_row_id = jQuery(next_row_data).find("img").attr("id");
                           var prev_image_id = prev_row_id.split("ux_pgp_file_");
                           var prev_image_name = jQuery(next_row_data).find("img").attr("img_name");
                           get_image_dimension_photo_gallery_plus(prev_image_id[1]);
                           var path = "<?php echo PHOTO_GALLERY_PLUS_ORIGINAL_URL ?>" + prev_image_name;
                           var image = jQuery("<div id=\"imgedit-crop-" + prev_image_id[1] + "\" class=\"imgedit-crop-wrap\" style=\"display:inline-block;\"><img onload=\"imageEdit.imgLoaded('" + prev_image_id[1] + "')\" id=\"image-preview-" + prev_image_id[1] + "\" img_name=\"" + prev_image_name + "\" src=\"" + path + "\" imageid=\"" + prev_image_id[1] + "\" class=\"edit image-css\" file_type=\"image\" style=\"max-width: 500px;max-height:500px;\"/></div><input type=\"hidden\" id=\"imgedit-selection-" + prev_image_id[1] + "\" value=\"\" />");
                           var image_scale = jQuery("<input id=\"imgedit-scale-width-" + prev_image_id[1] + "\" type_of=\"width-" + prev_image_id[1] + "\" onkeyup=\"get_scaled_image_photo_gallery_plus(this)\" onblur=\"get_scaled_image_photo_gallery_plus(this)\" style=\"width:4em;\" value=\"\" type=\"text\"> x <input id=\"imgedit-scale-height-" + prev_image_id[1] + "\" type_of=\"height-" + prev_image_id[1] + "\" onkeyup=\"get_scaled_image_photo_gallery_plus(this)\" onblur=\"get_scaled_image_photo_gallery_plus(this)\" style=\"width:4em;\" value=\"\" type=\"text\"/><span class=\"imgedit-scale-warn\" id=\"imgedit-scale-warn-" + prev_image_id[1] + "\">!</span>");
                           var image_ratio = jQuery("<input id=\"imgedit-crop-width-" + prev_image_id[1] + "\" onkeyup=\"imageEdit.setRatioSelection('" + prev_image_id[1] + "', 0, this)\" style=\"width:3em;\" type=\"text\"> : <input id=\"imgedit-crop-height-" + prev_image_id[1] + "\" onkeyup=\"imageEdit.setRatioSelection('" + prev_image_id[1] + "', 1, this)\" style=\"width:3em;\" type=\"text\">");
                           var splitted_name = prev_image_name.split(".");
                           jQuery("#ux_file_name").html(splitted_name[0]);
                           jQuery("#ux_file_type").html("image/" + splitted_name[1]);
                           jQuery("#div_image").html(image);
                           jQuery("#scale").html(image_scale);
                           jQuery("#ratio").html(image_ratio);
                           jQuery("#photo-gallery-plus-edit-image").removeClass("hidden");
                           jQuery(".media-modal-close").attr("onclick", "close_image_editor_photo_gallery_plus(this);");
                           crop_select_value_photo_gallery_plus();
                           jQuery("#ux_btn_left").attr("onclick", "show_previous_image_photo_gallery_plus(this," + next_row_pos + ");");
                           jQuery("#ux_btn_right").attr("onclick", "show_next_image_photo_gallery_plus(this," + next_row_pos + ");");
                           jQuery(".imgedit-wait").attr("id", "imgedit-wait-" + prev_image_id[1]);
                           jQuery("#message-restore").css("display", "none");
                           jQuery("#message-save").css("display", "none");
                           jQuery("#message-crop").css("display", "none");
                           next_row_pos === 0 ? jQuery("#ux_btn_left").addClass("disabled") : jQuery("#ux_btn_left").removeClass("disabled");
                           data_length === next_row_pos ? jQuery("#ux_btn_right").addClass("disabled") : jQuery("#ux_btn_right").removeClass("disabled");
                        }
                     }
                     function show_previous_image_photo_gallery_plus(control, row_position)
                     {
                        var image_counter = 0;
                        var data_length = oTable.fnGetData().length - 1;
                        var previous_row_pos = row_position - 1;
                        var previous_row_data = oTable.fnGetNodes(previous_row_pos);
                        var file_type = jQuery(previous_row_data).find("img").attr("file_type");
                        if (file_type !== "image" || file_type === undefined)
                        {
                           for (var position = 1; position < data_length; position++)
                           {
                              var previous_row_pos = previous_row_pos - position;
                              var previous_row_data = oTable.fnGetNodes(previous_row_pos);
                              var file_type = jQuery(previous_row_data).find("img").attr("file_type");
                              if (file_type === "image")
                              {
                                 break;
                              }
                           }
                           image_counter = 1;
                        } else
                        {
                           image_counter = 1;
                        }
                        if (image_counter === 1)
                        {
                           var prev_row_id = jQuery(previous_row_data).find("img").attr("id");
                           var prev_image_id = prev_row_id.split("ux_pgp_file_");
                           var prev_image_name = jQuery(previous_row_data).find("img").attr("img_name");
                           get_image_dimension_photo_gallery_plus(prev_image_id[1]);
                           var path = "<?php echo PHOTO_GALLERY_PLUS_ORIGINAL_URL ?>" + prev_image_name;
                           var image = jQuery("<div id=\"imgedit-crop-" + prev_image_id[1] + "\" class=\"imgedit-crop-wrap\" style=\"display:inline-block;\"><img onload=\"imageEdit.imgLoaded('" + prev_image_id[1] + "')\" id=\"image-preview-" + prev_image_id[1] + "\" img_name=\"" + prev_image_name + "\" src=\"" + path + "\" imageid=\"" + prev_image_id[1] + "\" class=\"edit image-css\" file_type=\"image\" style=\"max-width: 500px;max-height:500px;\"/></div><input type=\"hidden\" id=\"imgedit-selection-" + prev_image_id[1] + "\" value=\"\" />");
                           var image_scale = jQuery("<input id=\"imgedit-scale-width-" + prev_image_id[1] + "\" type_of=\"width-" + prev_image_id[1] + "\" onkeyup=\"get_scaled_image_photo_gallery_plus(this)\" onblur=\"get_scaled_image_photo_gallery_plus(this)\" style=\"width:4em;\" value=\"\" type=\"text\"> x <input id=\"imgedit-scale-height-" + prev_image_id[1] + "\" type_of=\"height-" + prev_image_id[1] + "\" onkeyup=\"get_scaled_image_photo_gallery_plus(this)\" onblur=\"get_scaled_image_photo_gallery_plus(this)\" style=\"width:4em;\" value=\"\" type=\"text\"/><span class=\"imgedit-scale-warn\" id=\"imgedit-scale-warn-" + prev_image_id[1] + "\">!</span>");
                           var image_ratio = jQuery("<input id=\"imgedit-crop-width-" + prev_image_id[1] + "\" onkeyup=\"imageEdit.setRatioSelection('" + prev_image_id[1] + "', 0, this)\" style=\"width:3em;\" type=\"text\"> : <input id=\"imgedit-crop-height-" + prev_image_id[1] + "\" onkeyup=\"imageEdit.setRatioSelection('" + prev_image_id[1] + "', 1, this)\" style=\"width:3em;\" type=\"text\">");
                           var splitted_name = prev_image_name.split(".");
                           jQuery("#ux_file_name").html(splitted_name[0]);
                           jQuery("#ux_file_type").html("image/" + splitted_name[1]);
                           jQuery("#div_image").html(image);
                           jQuery("#scale").html(image_scale);
                           jQuery("#ratio").html(image_ratio);
                           jQuery("#photo-gallery-plus-edit-image").removeClass("hidden");
                           jQuery(".media-modal-close").attr("onclick", "close_image_editor_photo_gallery_plus(this);");
                           crop_select_value_photo_gallery_plus();
                           jQuery("#ux_btn_left").attr("onclick", "show_previous_image_photo_gallery_plus(this," + previous_row_pos + ");");
                           jQuery("#ux_btn_right").attr("onclick", "show_next_image_photo_gallery_plus(this," + previous_row_pos + ");");
                           jQuery(".imgedit-wait").attr("id", "imgedit-wait-" + prev_image_id[1]);
                           jQuery("#message-restore").css("display", "none");
                           jQuery("#message-save").css("display", "none");
                           jQuery("#message-crop").css("display", "none");
                           previous_row_pos === 0 ? jQuery("#ux_btn_left").addClass("disabled") : jQuery("#ux_btn_left").removeClass("disabled");
                           data_length === previous_row_pos ? jQuery("#ux_btn_right").addClass("disabled") : jQuery("#ux_btn_right").removeClass("disabled");
                        }
                     }
                     function edit_image_photo_gallery_plus(control)
                     {
                        var data_length = oTable.fnGetData().length - 1;
                        var image_control_id = jQuery(control).attr("id");
                        var row_position = oTable.fnGetPosition(jQuery("#" + image_control_id).parents("tr")[0]);
                        var row_data = oTable.fnGetNodes(row_position);
                        var image_id = jQuery(control).attr("control_id");
                        var image_name = jQuery(row_data).find("img").attr("img_name");
                        var path = "<?php echo PHOTO_GALLERY_PLUS_ORIGINAL_URL ?>" + image_name;
                        var image = jQuery("<div id=\"imgedit-crop-" + image_id + "\" class=\"imgedit-crop-wrap\" style=\"display:inline-block;\"><img onload=\"imageEdit.imgLoaded('" + image_id + "')\" id=\"image-preview-" + image_id + "\" img_name=\"" + image_name + "\" src=\"" + path + "\" imageid=\"" + image_id + "\" class=\"edit image-css\" file_type=\"image\" style=\"max-width: 500px;max-height:500px;\"/></div><input type=\"hidden\" id=\"imgedit-selection-" + image_id + "\" value=\"\" />");
                        var image_scale = jQuery("<input id=\"imgedit-scale-width-" + image_id + "\" type_of=\"width-" + image_id + "\" onkeyup=\"get_scaled_image_photo_gallery_plus(this)\" onblur=\"get_scaled_image_photo_gallery_plus(this)\" style=\"width:4em;\" value=\"\" type=\"text\"> x <input id=\"imgedit-scale-height-" + image_id + "\" type_of=\"height-" + image_id + "\" onkeyup=\"get_scaled_image_photo_gallery_plus(this)\" onblur=\"get_scaled_image_photo_gallery_plus(this)\" style=\"width:4em;\" value=\"\" type=\"text\"/><span class=\"imgedit-scale-warn\" id=\"imgedit-scale-warn-" + image_id + "\">!</span>");
                        var image_ratio = jQuery("<input id=\"imgedit-crop-width-" + image_id + "\" onkeyup=\"imageEdit.setRatioSelection('" + image_id + "', 0, this)\" style=\"width:3em;\" type=\"text\"> : <input id=\"imgedit-crop-height-" + image_id + "\" onkeyup=\"imageEdit.setRatioSelection('" + image_id + "', 1, this)\" style=\"width:3em;\" type=\"text\">");
                        var splitted_name = image_name.split(".");
                        jQuery("#ux_file_name").html(splitted_name[0]);
                        jQuery("#ux_file_type").html("image/" + splitted_name[1]);
                        jQuery("#div_image").html(image);
                        jQuery("#scale").html(image_scale);
                        jQuery("#ratio").html(image_ratio);
                        get_image_dimension_photo_gallery_plus(image_id);
                        jQuery("#ux_btn_delete").attr("control_id", image_id);
                        jQuery("#photo-gallery-plus-edit-image").removeClass("hidden");
                        jQuery(".media-modal-close").attr("onclick", "close_image_editor_photo_gallery_plus(this);");
                        crop_select_value_photo_gallery_plus();
                        jQuery("#ux_btn_left").attr("onclick", "show_previous_image_photo_gallery_plus(this," + row_position + ");");
                        jQuery("#ux_btn_right").attr("onclick", "show_next_image_photo_gallery_plus(this," + row_position + ");");
                        jQuery(".imgedit-wait").attr("id", "imgedit-wait-" + image_id);
                        jQuery("#message-restore").css("display", "none");
                        jQuery("#message-save").css("display", "none");
                        jQuery("#message-crop").css("display", "none");
                        row_position === 0 ? jQuery("#ux_btn_left").addClass("disabled") : jQuery("#ux_btn_left").removeClass("disabled");
                        data_length === row_position ? jQuery("#ux_btn_right").addClass("disabled") : jQuery("#ux_btn_right").removeClass("disabled");
                     }
                     function image_loader_photo_gallery_plus()
                     {
                        jQuery(".imgedit-wait").css("display", "block");
                        setTimeout(function ()
                        {
                           jQuery(".imgedit-wait").css("display", "none");
                           remove_overlay_photo_gallery_plus();
                        }, 2000);
                     }
                     var count = 0;
                     function set_gallery_cover_image()
                     {
                  <?php
                  $mode = isset($_REQUEST["mode"]) ? esc_attr($_REQUEST["mode"]) : "";
                  if ($mode === "add") {
                     ?>
                           var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                           var row = oTable.fnGetNodes([0]);
                           jQuery(row).find("input[type=radio][name=ux_rdl_set_cover_image]").attr("checked", "checked");
                           gallery_cover_image = jQuery(row).find("input[type=radio][name=ux_rdl_set_cover_image]").attr("image_data");
                     <?php
                  } else {
                     ?>
                           var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                           var count = 0;
                           jQuery("input[type=radio][name=ux_rdl_set_cover_image]", oTable.fnGetNodes()).each(function ()
                           {

                              if (jQuery(this).is(":checked") === true)
                              {

                                 gallery_cover_image = jQuery(this).attr("image_data");
                                 count++;
                                 return;
                              }
                           });
                           if (count === 0)
                           {
                              var row = oTable.fnGetNodes([0]);
                              jQuery(row).find("input[type=radio][name=ux_rdl_set_cover_image]").attr("checked", "checked");
                              gallery_cover_image = jQuery(row).find("input[type=radio][name=ux_rdl_set_cover_image]").attr("image_data");
                           }

                     <?php
                  }
                  ?>
                     }
                     function show_image_url_redirect_photo_gallery_plus(image_id)
                     {
                        var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                        var url_value = jQuery("input[name=ux_rdl_redirect_" + image_id + "]:checked", oTable.fnGetNodes()).val();
                        url_value === "1" ? jQuery("#ux_div_url_redirect_" + image_id, oTable.fnGetNodes()).css("display", "block") : jQuery("#ux_div_url_redirect_" + image_id, oTable.fnGetNodes()).css("display", "none");
                        var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                        setTimeout(function ()
                        {
                           clearInterval(sidebar_load_interval);
                        }, 3000);
                     }
                     function delete_upload_image_photo_gallery_plus(control, row_position, option)
                     {
                        var confirm_value = confirm(<?php echo json_encode($pgp_delete_data); ?>);
                        if (confirm_value === true)
                        {
                           var image_id = jQuery(control).attr("control_id");
                           if (option === "edit")
                           {
                              array_delete_images.push(image_id);
                              oTable.fnDeleteRow(oTable.fnGetNodes(row_position));
                              jQuery("#photo-gallery-plus-edit-image").addClass("hidden");
                           } else
                           {
                              var oTable = jQuery("#ux_tbl_add_gallery").dataTable();
                              array_delete_images.push(image_id);
                              var row = jQuery(control).closest("tr");
                              oTable.fnDeleteRow(row);
                              var checked = jQuery("#ux_rdl_set_cover_image_" + image_id).prop("checked");
                              if (checked)
                              {
                                 var next_tr_id = jQuery(row[0]).closest("tr").next("tr").children().find("input").attr("value");
                                 jQuery("#ux_rdl_set_cover_image_" + next_tr_id).attr("checked", "checked");
                              }
                           }
                           set_gallery_cover_image();
                        }
                     }
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function ()
                     {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_sort_galleries" :
               ?>
                  jQuery("#ux_li_galleries").addClass("active");
                  jQuery("#ux_li_sort_galleries").addClass("active");
               <?php
               if (galleries_photo_gallery_plus == "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        jQuery(".thumbnail_dimensions").css("width", "<?php echo intval($thumbnail_dimensions_photo_gallery_plus[0]); ?>");
                        jQuery("#ux_div_images_row").css("display", "none");
                  <?php
                  if (isset($_REQUEST["gallery_id"])) {
                     ?>
                           jQuery("#ux_div_images_row").css("display", "block");
                           jQuery("#ux_ddl_sort_galleries").val("<?php echo intval($_REQUEST["gallery_id"]); ?>");
                     <?php
                  }
                  ?>
                        jQuery("#ux_ul_sort_images").sortable(
                                {
                                   opacity: 0.6,
                                   cursor: "move"
                                });
                        jQuery("#ux_ul_sort_images").disableSelection();
                     });
                     function choose_gallery_photo_gallery_plus(id)
                     {
                        var gallery_data = jQuery("#ux_ddl_sort_galleries").val();
                        overlay_loading_photo_gallery_plus();
                        setTimeout(function ()
                        {
                           remove_overlay_photo_gallery_plus();
                           if (gallery_data !== "")
                           {
                              window.location.href = "admin.php?page=pgp_sort_galleries&gallery_id=" + id;
                           } else
                           {
                              window.location.href = "admin.php?page=pgp_sort_galleries";
                           }
                        }, 1000);
                     }
                     jQuery("#ux_frm_sort_galleries").validate
                             ({
                                submitHandler: function ()
                                {
                                   premium_edition_notification_photo_gallery_plus();
                                }
                             });
                  <?php
               }
               break;
            case "pgp_manage_albums" :
               ?>
                  jQuery("#ux_li_album").addClass("active");
                  jQuery("#ux_li_manage_albums").addClass("active");
               <?php
               if (albums_photo_gallery_plus === "1") {
                  ?>
                     var oTable = photo_gallery_plus_manage_datatable("#ux_tbl_manage_album");
                     jQuery("#ux_chk_all_albums").click(function () {
                        jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).attr("checked", this.checked);
                     });
                  <?php
               }
               break;
            case "pgp_add_album" :
               ?>
                  jQuery("#ux_li_album").addClass("active");
                  jQuery("#ux_li_add_album").addClass("active");
               <?php
               if (albums_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        if (window.CKEDITOR)
                        {
                           CKEDITOR.replace("ux_heading_content");
                        }
                     });
                     function add_gallery_photo_gallery_plus()
                     {
                        var selected_galleries = [];
                        jQuery.each(jQuery("#ux_ddl_available_galleries_duplicate option:selected"), function ()
                        {
                           selected_galleries.push(jQuery(this));
                           jQuery(this).remove();
                        });
                        var value = "";
                        for (var flag = 0; flag < selected_galleries.length; flag++)
                        {
                           value += '<option value="' + jQuery(selected_galleries[flag]).val() + '">' + jQuery(selected_galleries[flag]).text() + '</option>';
                        }
                        jQuery("#ux_ddl_selected_galleries").append(value);
                        sort_function_photo_gallery_plus("ux_ddl_selected_galleries");
                     }
                     function remove_gallery_photo_gallery_plus()
                     {
                        var remove_selected_galleries = [];
                        jQuery.each(jQuery("#ux_ddl_selected_galleries option:selected"), function ()
                        {
                           remove_selected_galleries.push(jQuery(this));
                           jQuery(this).remove();
                        });
                        var value = "";
                        for (var flag = 0; flag < remove_selected_galleries.length; flag++)
                        {
                           value += '<option value="' + jQuery(remove_selected_galleries[flag]).val() + '">' + jQuery(remove_selected_galleries[flag]).text() + '</option>';
                        }
                        jQuery("#ux_ddl_available_galleries_duplicate").append(value);
                        sort_function_photo_gallery_plus("ux_ddl_available_galleries_duplicate");
                     }
                     jQuery("#ux_frm_add_album").validate
                             ({
                                submitHandler: function ()
                                {
                                   premium_edition_notification_photo_gallery_plus();
                                }
                             });
                  <?php
               }
               break;
            case "pgp_sort_albums" :
               ?>
                  jQuery("#ux_li_album").addClass("active");
                  jQuery("#ux_li_sort_albums").addClass("active");
               <?php
               if (albums_photo_gallery_plus == "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        jQuery(".thumbnail_dimensions").css("width", "<?php echo intval($thumbnail_dimensions_photo_gallery_plus[0]); ?>");
                        jQuery("#ux_div_images_row").css("display", "none");
                  <?php
                  if (isset($_REQUEST["album_id"])) {
                     ?>
                           jQuery("#ux_div_images_row").css("display", "block");
                           jQuery("#ux_ddl_sort_albums").val("<?php echo intval($_REQUEST["album_id"]); ?>");
                     <?php
                  }
                  ?>
                        jQuery("#ux_ul_sort_images").sortable(
                                {
                                   opacity: 0.6,
                                   cursor: "move"
                                });
                        jQuery("#ux_ul_sort_images").disableSelection();
                     });
                     function choose_album_photo_gallery_plus(id)
                     {
                        var albums_data = jQuery("#ux_ddl_sort_albums").val();
                        overlay_loading_photo_gallery_plus();
                        setTimeout(function ()
                        {
                           remove_overlay_photo_gallery_plus();
                           if (albums_data !== "")
                           {
                              window.location.href = "admin.php?page=pgp_sort_albums&album_id=" + id;
                           } else
                           {
                              window.location.href = "admin.php?page=pgp_sort_albums";
                           }
                        }, 1000);
                     }
                     jQuery("#ux_frm_sort_album").validate
                             ({
                                submitHandler: function (form)
                                {
                                   premium_edition_notification_photo_gallery_plus();
                                }
                             });
                  <?php
               }
               break;
            case "pgp_manage_tags":
               ?>
                  jQuery("#ux_li_tags").addClass("active");
                  jQuery("#ux_li_manage_tags").addClass("active");
               <?php
               if (tags_photo_gallery_plus == "1") {
                  ?>
                     var oTable = photo_gallery_plus_manage_datatable("#ux_tbl_manage_tags");
                     jQuery("#ux_chk_all").click(function () {
                        jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).not("[disabled]").attr("checked", this.checked);
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_add_tag":
               ?>
                  jQuery("#ux_li_tags").addClass("active");
                  jQuery("#ux_li_add_tag").addClass("active");
               <?php
               if (tags_photo_gallery_plus == "1") {
                  ?>
                     jQuery("#ux_frm_add_tag").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_thumbnail_layout" :
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_thumbnail_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus == "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($thumbnail_layout_general_border_style[1]); ?>");
                        jQuery("#ux_ddl_hover_effect").val("<?php echo esc_attr($thumbnail_layout_general_hover_effect_value[0]); ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_title_html_tag"]) ? htmlspecialchars_decode($manage_thumbnail_data["thumbnail_layout_gallery_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_gallery_title_alignment").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_title_text_alignment"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($manage_thumbnail_data["thumbnail_layout_gallery_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_description_html_tag"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_gallery_description_alignment").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_description_text_alignment"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($manage_thumbnail_data["thumbnail_layout_gallery_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_thumbnail_title_html_tag").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_html_tag"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_title_alignment").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_text_alignment"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_title_font_family").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($manage_thumbnail_data["thumbnail_layout_thumbnail_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_thumbnail_description_html_tag").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_html_tag"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_description_alignment").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_text_alignment"]) ? esc_attr($manage_thumbnail_data["thumbnail_layout_thumbnail_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_description_font_family").val("<?php echo isset($manage_thumbnail_data["thumbnail_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($manage_thumbnail_data["thumbnail_layout_thumbnail_description_font_family"]) : "Roboto Slab: 300"; ?>");
                        hover_effect_value_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_thumbnail_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);

                  <?php
               }
               break;
            case "pgp_masonry_layout" :
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_masonry_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus == "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($masonry_layout_general_border_style[1]); ?>");
                        jQuery("#ux_ddl_hover_effect").val("<?php echo esc_attr($masonry_layout_general_hover_effect_value[0]); ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($manage_masonry_data["masonry_layout_gallery_title_html_tag"]) ? esc_attr($manage_masonry_data["masonry_layout_gallery_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_gallery_title_alignment").val("<?php echo isset($manage_masonry_data["masonry_layout_gallery_title_text_alignment"]) ? esc_attr($manage_masonry_data["masonry_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($manage_masonry_data["masonry_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($manage_masonry_data["masonry_layout_gallery_title_font_family"]) : "Roboto Slab: 700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($manage_masonry_data["masonry_layout_gallery_description_html_tag"]) ? esc_attr($manage_masonry_data["masonry_layout_gallery_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_gallery_description_alignment").val("<?php echo isset($manage_masonry_data["masonry_layout_gallery_description_text_alignment"]) ? esc_attr($manage_masonry_data["masonry_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($manage_masonry_data["masonry_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($manage_masonry_data["masonry_layout_gallery_description_font_family"]) : "Roboto Slab: 300"; ?>");
                        jQuery("#ux_ddl_thumbnail_title_html_tag").val("<?php echo isset($manage_masonry_data["masonry_layout_thumbnail_title_html_tag"]) ? esc_attr($manage_masonry_data["masonry_layout_thumbnail_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_title_alignment").val("<?php echo isset($manage_masonry_data["masonry_layout_thumbnail_title_text_alignment"]) ? esc_attr($manage_masonry_data["masonry_layout_thumbnail_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_title_font_family").val("<?php echo isset($manage_masonry_data["masonry_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($manage_masonry_data["masonry_layout_thumbnail_title_font_family"]) : "Roboto Slab: 700"; ?>");
                        jQuery("#ux_ddl_thumbnail_description_html_tag").val("<?php echo isset($manage_masonry_data["masonry_layout_thumbnail_description_html_tag"]) ? esc_attr($manage_masonry_data["masonry_layout_thumbnail_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_description_alignment").val("<?php echo isset($manage_masonry_data["masonry_layout_thumbnail_description_text_alignment"]) ? esc_attr($manage_masonry_data["masonry_layout_thumbnail_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_description_font_family").val("<?php echo isset($manage_masonry_data["masonry_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($manage_masonry_data["masonry_layout_thumbnail_description_font_family"]) : "Roboto Slab: 300"; ?>");
                        hover_effect_value_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_masonry_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_slideshow_layout":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_slideshow_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($slideshow_layout_general_border_style[1]) ?>");
                        jQuery("#ux_ddl_buttons_border_style_thickness").val("<?php echo esc_attr($slideshow_layout_general_buttons_border_style[1]) ?>");
                        jQuery("#ux_ddl_filmstrip_border_style_thickness").val("<?php echo esc_attr($slideshow_layout_general_filmstrip_border_style[1]) ?>");
                        jQuery("#ux_ddl_active_filmstrip_border_style_thickness").val("<?php echo esc_attr($slideshow_layout_general_filmstrip_active_border_style[1]) ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($manage_slideshow_data["slideshow_layout_gallery_title_html_tag"]) ? esc_attr($manage_slideshow_data["slideshow_layout_gallery_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_gallery_title_alignment").val("<?php echo isset($manage_slideshow_data["slideshow_layout_gallery_title_text_alignment"]) ? esc_attr($manage_slideshow_data["slideshow_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($manage_slideshow_data["slideshow_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($manage_slideshow_data["slideshow_layout_gallery_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($manage_slideshow_data["slideshow_layout_gallery_description_html_tag"]) ? esc_attr($manage_slideshow_data["slideshow_layout_gallery_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_gallery_description_alignment").val("<?php echo isset($manage_slideshow_data["slideshow_layout_gallery_description_text_alignment"]) ? esc_attr($manage_slideshow_data["slideshow_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($manage_slideshow_data["slideshow_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($manage_slideshow_data["slideshow_layout_gallery_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_thumbnail_title_html_tag").val("<?php echo isset($manage_slideshow_data["slideshow_layout_thumbnail_title_html_tag"]) ? esc_attr($manage_slideshow_data["slideshow_layout_thumbnail_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_title_alignment").val("<?php echo isset($manage_slideshow_data["slideshow_layout_thumbnail_title_text_alignment"]) ? esc_attr($manage_slideshow_data["slideshow_layout_thumbnail_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_title_font_family").val("<?php echo isset($manage_slideshow_data["slideshow_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($manage_slideshow_data["slideshow_layout_thumbnail_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_thumbnail_description_html_tag").val("<?php echo isset($manage_slideshow_data["slideshow_layout_thumbnail_description_html_tag"]) ? esc_attr($manage_slideshow_data["slideshow_layout_thumbnail_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_description_alignment").val("<?php echo isset($manage_slideshow_data["slideshow_layout_thumbnail_description_text_alignment"]) ? esc_attr($manage_slideshow_data["slideshow_layout_thumbnail_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_description_font_family").val("<?php echo isset($manage_slideshow_data["slideshow_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($manage_slideshow_data["slideshow_layout_thumbnail_description_font_family"]) : "Roboto Slab:300"; ?>");
                     });
                     jQuery("#ux_frm_slide_show_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_image_browser_layout":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_image_browser_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness_image").val("<?php echo esc_attr($image_browser_layout_general_border_style[1]); ?>");
                        jQuery("#ux_ddl_buttons_border_style_thickness").val("<?php echo esc_attr($image_browser_layout_general_buttons_border_style[1]); ?>");
                        jQuery("#ux_ddl_buttons_font_family").val("<?php echo isset($image_browser_layout_data["image_browser_layout_general_buttons_font_family"]) ? htmlspecialchars_decode($image_browser_layout_data["image_browser_layout_general_buttons_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_title_html_tag"]) ? esc_attr($image_browser_layout_data["image_browser_layout_gallery_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_gallery_title_alignment").val("<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_title_text_alignment"]) ? esc_attr($image_browser_layout_data["image_browser_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($image_browser_layout_data["image_browser_layout_gallery_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_description_html_tag"]) ? esc_attr($image_browser_layout_data["image_browser_layout_gallery_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_gallery_description_alignment").val("<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_description_text_alignment"]) ? esc_attr($image_browser_layout_data["image_browser_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($image_browser_layout_data["image_browser_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($image_browser_layout_data["image_browser_layout_gallery_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_thumbnail_title_html_tag").val("<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_title_html_tag"]) ? esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_title_alignment_image").val("<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_title_text_alignment"]) ? esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_title_font_family").val("<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($image_browser_layout_data["image_browser_layout_thumbnail_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_thumbnail_description_html_tag").val("<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_description_html_tag"]) ? esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_description_alignment_image").val("<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_description_text_alignment"]) ? esc_attr($image_browser_layout_data["image_browser_layout_thumbnail_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_description_font_family").val("<?php echo isset($image_browser_layout_data["image_browser_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($image_browser_layout_data["image_browser_layout_thumbnail_description_font_family"]) : "Roboto Slab:300"; ?>");
                     });
                     jQuery("#ux_frm_image_browser").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_justified_grid_layout":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_justified_grid_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_justified_border_style_thickness").val("<?php echo esc_attr($justified_grid_layout_general_border_style[1]); ?>");
                        jQuery("#ux_ddl_hover_effect").val("<?php echo esc_attr($justified_grid_layout_general_hover_effect_value[0]); ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_gallery_title_html_tag"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_gallery_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_justified_gallery_title_alignment").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_gallery_title_text_alignment"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_justified_gallery_title_font_family").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($manage_justified_grid_data["justified_grid_layout_gallery_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_gallery_description_html_tag"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_gallery_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_justified_gallery_description_alignment").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_gallery_description_text_alignment"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_justified_gallery_description_font_family").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($manage_justified_grid_data["justified_grid_layout_gallery_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_thumbnail_title_html_tag").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_thumbnail_title_html_tag"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_thumbnail_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_justified_title_alignment").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_thumbnail_title_text_alignment"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_thumbnail_title_text_alignment"]) : "center"; ?>");
                        jQuery("#ux_ddl_justified_title_font_family").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($manage_justified_grid_data["justified_grid_layout_thumbnail_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_thumbnail_description_html_tag").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_thumbnail_description_html_tag"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_thumbnail_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_justified_description_alignment").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_thumbnail_description_text_alignment"]) ? esc_attr($manage_justified_grid_data["justified_grid_layout_thumbnail_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_justified_description_font_family").val("<?php echo isset($manage_justified_grid_data["justified_grid_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($manage_justified_grid_data["justified_grid_layout_thumbnail_description_font_family"]) : "Roboto Slab:300"; ?>");
                        hover_effect_value_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_justified_grid_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_blog_style_layout":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_blog_style_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_blog_border_style_thickness").val("<?php echo esc_attr($blog_style_layout_general_border_style[1]); ?>");
                        jQuery("#ux_ddl_hover_effect").val("<?php echo esc_attr($blog_style_layout_general_hover_effect_value[0]); ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_title_html_tag"]) ? esc_attr($blog_style_layout_data["blog_style_layout_gallery_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_blog_title_alignment_gallery").val("<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_title_text_alignment"]) ? esc_attr($blog_style_layout_data["blog_style_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_blog_title_font_family_gallery").val("<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($blog_style_layout_data["blog_style_layout_gallery_title_font_family"]) : "Roboto Slab: 700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_description_html_tag"]) ? esc_attr($blog_style_layout_data["blog_style_layout_gallery_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_blog_description_alignment_gallery").val("<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_description_text_alignment"]) ? esc_attr($blog_style_layout_data["blog_style_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_blog_description_font_family_gallery").val("<?php echo isset($blog_style_layout_data["blog_style_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($blog_style_layout_data["blog_style_layout_gallery_description_font_family"]) : "Roboto Slab: 300"; ?>");
                        jQuery("#ux_ddl_thumbnail_title_html_tag").val("<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_title_html_tag"]) ? esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_blog_title_alignment_thumbnail").val("<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_title_text_alignment"]) ? esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_blog_title_font_family_thumbnail").val("<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_title_font_family"]) ? htmlspecialchars_decode($blog_style_layout_data["blog_style_layout_thumbnail_title_font_family"]) : "Roboto Slab: 700"; ?>");
                        jQuery("#ux_ddl_thumbnail_description_html_tag").val("<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_description_html_tag"]) ? esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_blog_description_alignment_thumbnail").val("<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_description_text_alignment"]) ? esc_attr($blog_style_layout_data["blog_style_layout_thumbnail_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_blog_description_font_family_thumbnail").val("<?php echo isset($blog_style_layout_data["blog_style_layout_thumbnail_description_font_family"]) ? htmlspecialchars_decode($blog_style_layout_data["blog_style_layout_thumbnail_description_font_family"]) : "Roboto Slab: 300"; ?>");
                        hover_effect_value_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_blog_style_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;

            case "pgp_compact_album_layout":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_compact_album_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($compact_album_layout_cover_border_style[1]); ?>");
                        jQuery("#ux_ddl_hover_effect").val("<?php echo esc_attr($compact_album_layout_cover_hover_effect_value[0]); ?>");
                        jQuery("#ux_ddl_album_title_html_tag").val("<?php echo isset($compact_album_layout_data["compact_album_layout_title_html_tag"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_album_title_alignment").val("<?php echo isset($compact_album_layout_data["compact_album_layout_title_text_alignment"]) ? esc_attr($compact_album_layout_data["compact_album_layout_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_album_title_font_family").val("<?php echo isset($compact_album_layout_data["compact_album_layout_title_font_family"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_album_description_html_tag").val("<?php echo isset($compact_album_layout_data["compact_album_layout_description_html_tag"]) ? esc_attr($compact_album_layout_data["compact_album_layout_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_album_description_alignment").val("<?php echo isset($compact_album_layout_data["compact_album_layout_description_text_alignment"]) ? esc_attr($compact_album_layout_data["compact_album_layout_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_album_description_font_family").val("<?php echo isset($compact_album_layout_data["compact_album_layout_description_font_family"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_title_html_tag"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_gallery_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_gallery_title_alignment").val("<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_title_text_alignment"]) ? esc_attr($compact_album_layout_data["compact_album_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_gallery_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_description_html_tag"]) ? esc_attr($compact_album_layout_data["compact_album_layout_gallery_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_gallery_description_alignment").val("<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_description_text_alignment"]) ? esc_attr($compact_album_layout_data["compact_album_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($compact_album_layout_data["compact_album_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_gallery_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_compact_album_button_text_alignment").val("<?php echo isset($compact_album_layout_data["compact_album_layout_button_text_alignment"]) ? esc_attr($compact_album_layout_data["compact_album_layout_button_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_compact_album_button_font_family").val("<?php echo isset($compact_album_layout_data["compact_album_layout_button_text_font_family"]) ? htmlspecialchars_decode($compact_album_layout_data["compact_album_layout_button_text_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_compact_album_button_border_thickness").val("<?php echo esc_attr($compact_album_layout_button_border_style[1]); ?>");
                        hover_effect_value_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_compact_album_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;

            case "pgp_extended_album_layout":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_extended_album_layout").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($extended_album_layout_cover_border_style[1]); ?>");
                        jQuery("#ux_ddl_hover_effect").val("<?php echo esc_attr($extended_album_layout_cover_hover_effect_value[0]); ?>");
                        jQuery("#ux_ddl_album_title_html_tag").val("<?php echo isset($extended_album_layout_data["extended_album_layout_title_html_tag"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_album_title_alignment").val("<?php echo isset($extended_album_layout_data["extended_album_layout_title_text_alignment"]) ? esc_attr($extended_album_layout_data["extended_album_layout_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_album_title_font_family").val("<?php echo isset($extended_album_layout_data["extended_album_layout_title_font_family"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_album_description_html_tag").val("<?php echo isset($extended_album_layout_data["extended_album_layout_description_html_tag"]) ? esc_attr($extended_album_layout_data["extended_album_layout_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_album_description_alignment").val("<?php echo isset($extended_album_layout_data["extended_album_layout_description_text_alignment"]) ? esc_attr($extended_album_layout_data["extended_album_layout_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_album_description_font_family").val("<?php echo isset($extended_album_layout_data["extended_album_layout_description_font_family"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_gallery_title_html_tag").val("<?php echo isset($extended_album_layout_data["extended_album_layout_gallery_title_html_tag"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_gallery_title_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_gallery_title_alignment").val("<?php echo isset($extended_album_layout_data["extended_album_layout_gallery_title_text_alignment"]) ? esc_attr($extended_album_layout_data["extended_album_layout_gallery_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($extended_album_layout_data["extended_album_layout_gallery_title_font_family"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_gallery_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_gallery_description_html_tag").val("<?php echo isset($extended_album_layout_data["extended_album_layout_gallery_description_html_tag"]) ? esc_attr($extended_album_layout_data["extended_album_layout_gallery_description_html_tag"]) : "p"; ?>");
                        jQuery("#ux_ddl_gallery_description_alignment").val("<?php echo isset($extended_album_layout_data["extended_album_layout_gallery_description_text_alignment"]) ? esc_attr($extended_album_layout_data["extended_album_layout_gallery_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($extended_album_layout_data["extended_album_layout_gallery_description_font_family"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_gallery_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_extended_album_button_text_alignment").val("<?php echo isset($extended_album_layout_data["extended_album_layout_button_text_alignment"]) ? esc_attr($extended_album_layout_data["extended_album_layout_button_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_extended_album_button_font_family").val("<?php echo isset($extended_album_layout_data["extended_album_layout_button_text_font_family"]) ? htmlspecialchars_decode($extended_album_layout_data["extended_album_layout_button_text_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_extended_album_button_border_thickness").val("<?php echo esc_attr($extended_album_layout_button_border_style[1]); ?>");
                        hover_effect_value_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_extended_album_layout").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_custom_css":
               ?>
                  jQuery("#ux_li_layout_settings").addClass("active");
                  jQuery("#ux_li_custom_css").addClass("active");
               <?php
               if (layout_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery("#ux_frm_custom_css").validate({
                        submitHandler: function () {
                           submit_handler_common_photo_gallery_plus("#ux_frm_custom_css", "", "custom_css_module", "<?php echo $custom_css_nonce; ?>", <?php echo json_encode($pgp_custom_css_message); ?>, "pgp_custom_css");
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_lightcase" :
               ?>
                  jQuery("#ux_li_lightboxes").addClass("active");
                  jQuery("#ux_li_pgp_lightcase").addClass("active");
               <?php
               if (lightboxes_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo $pgp_lightcase_border[1] ?>");
                        jQuery("#ux_ddl_image_transition").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_transition"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_transition"]) : "fade" ?>");
                        jQuery("#ux_ddl_image_title_html_tag").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_title_html_tag"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_image_title_alignment").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_title_text_alignment"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_image_title_font_family").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_title_font_family"]) ? htmlspecialchars_decode($pgp_lightcase_meta_data["lightcase_image_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_image_description_html_tag").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_description_html_tag"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_image_description_alignment").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_description_text_alignment"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_image_description_font_family").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_description_font_family"]) ? htmlspecialchars_decode($pgp_lightcase_meta_data["lightcase_image_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_autoplay_slideshow").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_autoplay_slideshow"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_autoplay_slideshow"]) : "true" ?>");
                        jQuery("#ux_ddl_close_button").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_close_button"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_close_button"]) : "show"; ?>");
                        jQuery("#ux_ddl_lightbox_lightbox2_title").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_title"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_title"]) : "true" ?>");
                        jQuery("#ux_ddl_lightbox_lightbox2_description").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_description"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_description"]) : "true" ?>");
                        jQuery("#ux_ddl_image_counter").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_image_counter"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_counter"]) : "show"; ?>");
                        jQuery("#ux_ddl_image_counter_font_family").val("<?php echo isset($pgp_lightcase_meta_data["lightcase_counter_font_family"]) ? htmlspecialchars_decode($pgp_lightcase_meta_data["lightcase_counter_font_family"]) : "Roboto Slab:700"; ?>");
                        show_hide_control_photo_gallery_plus("ux_ddl_autoplay_slideshow", "ux_div_lightcase_slideshow");
                        show_hide_control_photo_gallery_plus('ux_ddl_image_counter', 'ux_div_image_counter_style');
                        show_hide_control_photo_gallery_plus('ux_ddl_lightbox_lightbox2_title', 'ux_div_title_lightbox_lightbox2');
                        show_hide_control_photo_gallery_plus('ux_ddl_lightbox_lightbox2_description', 'ux_div_lightbox_lightbox2_description');
                     });
                     jQuery("#ux_frm_lightcase_lightbox_settings").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;

            case "pgp_fancy_box" :
               ?>
                  jQuery("#ux_li_lightboxes").addClass("active");
                  jQuery("#ux_li_fancy_box").addClass("active");
               <?php
               if (lightboxes_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_open_effect").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_open_effect"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_open_effect"]) : "fade"; ?>");
                        jQuery("#ux_ddl_close_effect").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_close_effect"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_close_effect"]) : "fade"; ?>");
                        jQuery("#ux_ddl_fancy_box_title").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_title"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_title"]) : "true "; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_title_font_family"]) ? htmlspecialchars_decode($pgp_fancy_box_get_data["fancy_box_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_fancy_box_description").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_description"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_description"]) : "true"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_description_font_family"]) ? htmlspecialchars_decode($pgp_fancy_box_get_data["fancy_box_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($fancy_box_border_style[1]); ?>");
                        jQuery("#ux_ddl_cyclic").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_cyclic"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_cyclic"]) : "false"; ?>");
                        jQuery("#ux_ddl_arrows").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_arrows"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_arrows"]) : "true"; ?>");
                        jQuery("#ux_ddl_mouse_wheel").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_mouse_wheel"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_mouse_wheel"]) : "true"; ?>");
                        jQuery("#ux_ddl_button_position").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_button_position"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_button_position"]) : "bottom"; ?>");
                        jQuery("#ux_ddl_enable_escape_button").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_enable_escape_button"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_enable_escape_button"]) : "false"; ?>");
                        jQuery("#ux_ddl_title_position").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_title_position"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_title_position"]) : "inside"; ?>");
                        jQuery("#ux_ddl_show_close_button").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_show_close_button"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_show_close_button"]) : "true"; ?>");
                        jQuery("#ux_ddl_image_title_html_tag").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_title_html_tag"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_image_title_alignment").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_title_text_alignment"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_image_description_html_tag").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_description_html_tag"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_image_description_alignment").val("<?php echo isset($pgp_fancy_box_get_data["fancy_box_description_text_alignment"]) ? esc_attr($pgp_fancy_box_get_data["fancy_box_description_text_alignment"]) : "left"; ?>");
                        show_hide_control_photo_gallery_plus("ux_ddl_fancy_box_title", "fancy_box_title_div");
                        show_hide_control_photo_gallery_plus("ux_ddl_fancy_box_description", "fancy_box_description_div");
                     });
                     jQuery("#ux_frm_fancy_box").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;

            case "pgp_color_box" :
               ?>
                  jQuery("#ux_li_lightboxes").addClass("active");
                  jQuery("#ux_li_color_box").addClass("active");
               <?php
               if (lightboxes_photo_gallery_plus === "1") {
                  ?>

                     function position_setting_photo_gallery_plus(control) {
                        var position_value = jQuery(control).val();
                        position_value !== "reposition" ? jQuery("#positioning_setting").attr("style", "display:block") : jQuery("#positioning_setting").attr("style", "display:none");
                     }
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_colorbox_type").val("<?php echo isset($color_box_get_data["lightbox_color_box_type"]) ? esc_attr($color_box_get_data["lightbox_color_box_type"]) : "type1"; ?>");
                        jQuery("#ux_ddl_colorbox_effect").val("<?php echo isset($color_box_get_data["lightbox_color_box_transition_effect"]) ? esc_attr($color_box_get_data["lightbox_color_box_transition_effect"]) : "elastic"; ?>");
                        jQuery("#ux_ddl_colorbox_open").val("<?php echo isset($color_box_get_data["lightbox_color_box_open_page_load"]) ? esc_attr($color_box_get_data["lightbox_color_box_open_page_load"]) : "false"; ?>");
                        jQuery("#ux_ddl_show_close_button").val("<?php echo isset($color_box_get_data["lightbox_color_box_show_close_button"]) ? esc_attr($color_box_get_data["lightbox_color_box_show_close_button"]) : "true"; ?>");
                        jQuery("#ux_ddl_color_box_title").val("<?php echo isset($color_box_get_data["lightbox_color_box_title"]) ? esc_attr($color_box_get_data["lightbox_color_box_title"]) : "true"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($color_box_get_data["lightbox_color_box_title_font_family"]) ? htmlspecialchars_decode($color_box_get_data["lightbox_color_box_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_color_box_description").val("<?php echo isset($color_box_get_data["lightbox_color_box_description"]) ? esc_attr($color_box_get_data["lightbox_color_box_description"]) : "true"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($color_box_get_data["lightbox_color_box_description_font_family"]) ? htmlspecialchars_decode($color_box_get_data["lightbox_color_box_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_slide_show").val("<?php echo isset($color_box_get_data["lightbox_color_box_sideshow"]) ? esc_attr($color_box_get_data["lightbox_color_box_sideshow"]) : "true"; ?>");
                        jQuery("#ux_ddl_auto_slide_show").val("<?php echo isset($color_box_get_data["lightbox_color_box_auto_slideshow"]) ? esc_attr($color_box_get_data["lightbox_color_box_auto_slideshow"]) : "true"; ?>");
                        jQuery("#ux_ddl_positioning").val("<?php echo isset($color_box_get_data["lightbox_color_box_postioning"]) ? esc_attr($color_box_get_data["lightbox_color_box_postioning"]) : "reposition"; ?>");
                        jQuery("#ux_ddl_fixed_positioning").val("<?php echo isset($color_box_get_data["lightbox_color_box_fixed_position"]) ? esc_attr($color_box_get_data["lightbox_color_box_fixed_position"]) : "false"; ?>");
                        jQuery("#ux_ddl_image_title_html_tag").val("<?php echo isset($color_box_get_data["lightbox_color_box_title_html_tag"]) ? esc_attr($color_box_get_data["lightbox_color_box_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_image_title_alignment").val("<?php echo isset($color_box_get_data["lightbox_color_box_title_text_alignment"]) ? esc_attr($color_box_get_data["lightbox_color_box_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_image_description_html_tag").val("<?php echo isset($color_box_get_data["lightbox_color_box_description_html_tag"]) ? esc_attr($color_box_get_data["lightbox_color_box_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_image_description_alignment").val("<?php echo isset($color_box_get_data["lightbox_color_box_description_text_alignment"]) ? esc_attr($color_box_get_data["lightbox_color_box_description_text_alignment"]) : "left"; ?>");
                        show_hide_control_photo_gallery_plus("ux_ddl_slide_show", "slideshow_settings");
                        position_setting_photo_gallery_plus("#ux_ddl_positioning");
                        show_hide_control_photo_gallery_plus("ux_ddl_color_box_title", "color_box_title_div");
                        show_hide_control_photo_gallery_plus("ux_ddl_color_box_description", "color_box_description_div");
                     });
                     jQuery("#ux_frm_color_box").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;

            case "pgp_foo_box_free_edition" :
               ?>
                  jQuery("#ux_li_lightboxes").addClass("active");
                  jQuery("#ux_li_foo_box_free_edition").addClass("active");

               <?php
               if (lightboxes_photo_gallery_plus === "1") {
                  ?>

                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_show_count").val("<?php echo isset($foo_box["foo_box_show_count"]) ? esc_attr($foo_box["foo_box_show_count"]) : "true"; ?>");
                        jQuery("#ux_ddl_close_overlay_click").val("<?php echo isset($foo_box["foo_box_close_overlay_click"]) ? esc_attr($foo_box["foo_box_close_overlay_click"]) : "false"; ?>");
                        jQuery("#ux_ddl_hide_page_scrollbar").val("<?php echo isset($foo_box["foo_box_hide_page_scrollbar"]) ? esc_attr($foo_box["foo_box_hide_page_scrollbar"]) : "false"; ?>");
                        jQuery("#ux_ddl_show_on_hover").val("<?php echo isset($foo_box["foo_box_show_on_hover"]) ? esc_attr($foo_box["foo_box_show_on_hover"]) : "false"; ?>");
                        jQuery("#ux_ddl_foo_box_title").val("<?php echo isset($foo_box["foo_box_title"]) ? esc_attr($foo_box["foo_box_title"]) : "true"; ?>");
                        jQuery("#ux_ddl_image_title_html_tag").val("<?php echo isset($foo_box["foo_box_image_title_html_tag"]) ? esc_attr($foo_box["foo_box_image_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_image_title_alignment").val("<?php echo isset($foo_box["foo_box_image_title_text_alignment"]) ? esc_attr($foo_box["foo_box_image_title_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($foo_box["foo_box_title_font_family"]) ? htmlspecialchars_decode($foo_box["foo_box_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_foo_box_description").val("<?php echo isset($foo_box["foo_box_description"]) ? esc_attr($foo_box["foo_box_description"]) : "true"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($foo_box["foo_box_description_font_family"]) ? htmlspecialchars_decode($foo_box["foo_box_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_image_description_html_tag").val("<?php echo isset($foo_box["foo_box_image_description_html_tag"]) ? esc_attr($foo_box["foo_box_image_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_image_description_alignment").val("<?php echo isset($foo_box["foo_box_image_description_text_alignment"]) ? esc_attr($foo_box["foo_box_image_description_text_alignment"]) : "left"; ?>");
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($foo_box_border_style[1]); ?>");
                        show_hide_control_photo_gallery_plus("ux_ddl_foo_box_title", "foo_box_title_div");
                        show_hide_control_photo_gallery_plus("ux_ddl_foo_box_description", "foo_box_description_div");
                     });
                     jQuery("#ux_frm_foo_box_free_edition").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_nivo_lightbox" :
               ?>
                  jQuery("#ux_li_lightboxes").addClass("active");
                  jQuery("#ux_li_nivo_light_box").addClass("active");
               <?php
               if (lightboxes_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_choose_effect").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_choose_effect"]) ? esc_html($pgp_nivo_lightbox_meta_data["lightbox_nivo_choose_effect"]) : "fade"; ?>");
                        jQuery("#ux_ddl_keyboard_navigation").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_keyboard_navigation"]) ? esc_html($pgp_nivo_lightbox_meta_data["lightbox_nivo_keyboard_navigation"]) : "false"; ?>");
                        jQuery("#ux_ddl_click_image_to_close").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_click_image_to_close"]) ? esc_html($pgp_nivo_lightbox_meta_data["lightbox_nivo_click_image_to_close"]) : "true"; ?>");
                        jQuery("#ux_ddl_click_overlay_to_close").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_click_overlay_to_close"]) ? esc_html($pgp_nivo_lightbox_meta_data["lightbox_nivo_click_overlay_to_close"]) : "true"; ?>");
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_html($lightbox_nivo_border_style[1]); ?>");
                        jQuery("#ux_ddl_nivo_title").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_title"]) ? $pgp_nivo_lightbox_meta_data["lightbox_nivo_title"] : "true"; ?>");
                        jQuery("#ux_ddl_gallery_title_font_family").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_title_font_family"]) ? htmlspecialchars_decode($pgp_nivo_lightbox_meta_data["lightbox_nivo_title_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_image_title_html_tag").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_title_html_tag"]) ? esc_attr($pgp_nivo_lightbox_meta_data["lightbox_nivo_title_html_tag"]) : "h2"; ?>");
                        jQuery("#ux_ddl_image_title_alignment").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_title_text_alignment"]) ? esc_attr($pgp_nivo_lightbox_meta_data["lightbox_nivo_title_text_alignment"]) : "center"; ?>");
                        jQuery("#ux_ddl_nivo_description").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_description"]) ? $pgp_nivo_lightbox_meta_data["lightbox_nivo_description"] : "false"; ?>");
                        jQuery("#ux_ddl_gallery_description_font_family").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_description_font_family"]) ? htmlspecialchars_decode($pgp_nivo_lightbox_meta_data["lightbox_nivo_description_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_image_description_html_tag").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_description_html_tag"]) ? esc_attr($pgp_nivo_lightbox_meta_data["lightbox_nivo_description_html_tag"]) : "h3"; ?>");
                        jQuery("#ux_ddl_image_description_alignment").val("<?php echo isset($pgp_nivo_lightbox_meta_data["lightbox_nivo_description_text_alignment"]) ? esc_attr($pgp_nivo_lightbox_meta_data["lightbox_nivo_description_text_alignment"]) : "center"; ?>");
                        show_hide_control_photo_gallery_plus("ux_ddl_nivo_title", "nivo_lightbox_title_div");
                        show_hide_control_photo_gallery_plus("ux_ddl_nivo_description", "nivo_lightbox_description_div");
                     });
                     jQuery("#ux_frm_nivo_lightbox_settings").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_global_options" :
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_global_options").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_language_direction").val("<?php echo isset($global_options_get_data["global_options_language_direction"]) ? esc_attr($global_options_get_data["global_options_language_direction"]) : "left_to_right"; ?>");
                        jQuery("#ux_ddl_right_click").val("<?php echo isset($global_options_get_data["global_options_right_click_protection"]) ? esc_attr($global_options_get_data["global_options_right_click_protection"]) : "disable"; ?>");
                     });
                     jQuery("#ux_frm_global_options").validate({
                        submitHandler: function () {
                           submit_handler_common_photo_gallery_plus("#ux_frm_global_options", "", "global_options_module", "<?php echo $global_options_nonce; ?>", <?php echo json_encode($pgp_update_global_options_data); ?>, "pgp_global_options");
                        }
                     });
                  <?php
               }
               break;
            case "pgp_filter_settings" :
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_filter_settings").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery("document").ready(function () {
                        jQuery("#ux_ddl_font_family").val("<?php echo isset($filter_settings_get_data["filters_font_family"]) ? htmlspecialchars_decode($filter_settings_get_data["filters_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_filters_border_style_thickness").val("<?php echo esc_attr($filter_border_color[1]); ?>");
                     });
                     jQuery("#ux_frm_filter_settings").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_lazy_load_settings" :
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_lazyload_settings").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery("document").ready(function () {
                        jQuery("#ux_ddl_loader_font_family").val("<?php echo isset($lazyload_settings_get_data["loader_font_family"]) ? htmlspecialchars_decode($lazyload_settings_get_data["loader_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_loader_text").val("<?php echo isset($lazyload_settings_get_data["loader_text"]) ? esc_attr($lazyload_settings_get_data["loader_text"]) : "show"; ?>");
                        show_hide_control_photo_gallery_plus("ux_ddl_loader_text", "ux_div_loader_title");
                     });
                     jQuery("#ux_frm_lazyload_settings").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_search_box_settings" :
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_searchbox_settings").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery("document").ready(function () {
                        jQuery("#ux_ddl_search_font_family").val("<?php echo isset($searchbox_settings_get_data["search_box_font_family"]) ? htmlspecialchars_decode($searchbox_settings_get_data["search_box_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_search_by_border_style_thickness").val("<?php echo esc_attr($search_box_border_color[1]); ?>");
                     });
                     jQuery("#ux_frm_searchbox_settings").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_order_by_settings" :
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_orderby_settings").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery("document").ready(function () {
                        jQuery("#ux_ddl_order_font_family").val("<?php echo isset($orderby_settings_get_data["order_by_font_family"]) ? htmlspecialchars_decode($orderby_settings_get_data["order_by_font_family"]) : "Roboto Slab:700"; ?>");
                        jQuery("#ux_ddl_order_by_border_style_thickness").val("<?php echo esc_attr($order_by_border_color[1]); ?>");

                     });
                     jQuery("#ux_frm_orderby_settings").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_page_navigation" :
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_page_navigation").addClass("active");

               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery("document").ready(function () {
                        jQuery("#ux_ddl_border_style_thickness").val("<?php echo esc_attr($page_navigation_border_style[1]); ?>");
                        jQuery("#ux_ddl_alignment_page").val("<?php echo isset($page_navigation_get_data["page_navigation_alignment"]) ? esc_attr($page_navigation_get_data["page_navigation_alignment"]) : "center"; ?>");
                        jQuery("#ux_ddl_position").val("<?php echo isset($page_navigation_get_data["page_navigation_position"]) ? esc_attr($page_navigation_get_data["page_navigation_position"]) : "bottom"; ?>");
                        jQuery("#ux_ddl_numbering").val("<?php echo isset($page_navigation_get_data["page_navigation_numbering"]) ? esc_attr($page_navigation_get_data["page_navigation_numbering"]) : "yes"; ?>");
                        jQuery("#ux_ddl_button_text").val("<?php echo isset($page_navigation_get_data["page_navigation_button_text"]) ? esc_attr($page_navigation_get_data["page_navigation_button_text"]) : "text"; ?>");
                        jQuery("#ux_ddl_title_font_family").val("<?php echo isset($page_navigation_get_data["page_navigation_font_family"]) ? htmlspecialchars_decode($page_navigation_get_data["page_navigation_font_family"]) : "Roboto Slab:700"; ?>");
                     });
                     jQuery("#ux_frm_page_navigation").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_watermark_settings":
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_watermark_settings").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>

                     function watermark_settings_photo_gallery_plus() {
                        var settings = jQuery("#ux_ddl_watermark_settings").val();
                        switch (settings) {
                           case "none":
                              jQuery("#ux_div_watermark_text,#ux_div_settings,#ux_div_font_style,#ux_div_watermark_image").css("display", "none");
                              break;
                           case "text":
                              jQuery("#ux_div_watermark_text,#ux_div_settings,#ux_div_font_style").css("display", "block");
                              jQuery("#ux_div_watermark_image").css("display", "none");
                              break;
                           case "image":
                              jQuery("#ux_div_watermark_text,#ux_div_font_style").css("display", "none");
                              jQuery("#ux_div_settings,#ux_div_watermark_image").css("display", "block");
                              break;
                        }
                     }
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_watermark_settings").val("<?php echo isset($watermark_settings_get_data["watermark_settings_type"]) ? esc_attr($watermark_settings_get_data["watermark_settings_type"]) : "none"; ?>");
                        jQuery("#ux_ddl_watermark_position").val("<?php echo isset($watermark_settings_get_data["watermark_settings_position"]) ? esc_attr($watermark_settings_get_data["watermark_settings_position"]) : "top_left"; ?>");
                  <?php
                  global $wp_version;
                  if ($wp_version <= 3.5) {
                     ?>
                           jQuery("#wp_media_upload_error_message").css("display", "block");
                           jQuery("#wp_upload_button").css("display", "none");
                     <?php
                  }
                  ?>
                        watermark_settings_photo_gallery_plus();
                     });
                     jQuery("#ux_watermark_setting").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_advertisement":
               ?>
                  jQuery("#ux_li_general_settings").addClass("active");
                  jQuery("#ux_li_advertisement").addClass("active");
               <?php
               if (general_settings_photo_gallery_plus === "1") {
                  ?>
                     function advertisment_settings_photo_gallery_plus() {
                        var advertise = jQuery("#ux_ddl_advertisement").val();
                        switch (advertise) {
                           case "none":
                              jQuery("#ux_div_advertisement_text,#ux_div_font,#ux_div_style,#ux_div_advertisement_image,#ux_div_advertisement_url,#ux_div_advertisement_opacity").css("display", "none");
                              break;
                           case "text":
                              jQuery("#ux_div_advertisement_text,#ux_div_font,#ux_div_style,#ux_div_advertisement_url,#ux_div_advertisement_opacity").css("display", "block");
                              jQuery("#ux_div_advertisement_image").css("display", "none");
                              break;
                           case "image":
                              jQuery("#ux_div_advertisement_text,#ux_div_style").css("display", "none");
                              jQuery("#ux_div_font,#ux_div_advertisement_image,#ux_div_advertisement_url,#ux_div_advertisement_opacity").css("display", "block");
                              break;
                        }
                     }
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_advertisement").val("<?php echo isset($advertisement_get_data["advertisement_type"]) ? esc_attr($advertisement_get_data["advertisement_type"]) : "none"; ?>");
                        jQuery("#ux_ddl_font").val("<?php echo isset($advertisement_get_data["advertisement_font_family"]) ? htmlspecialchars_decode($advertisement_get_data["advertisement_font_family"]) : "Roboto Slab:300"; ?>");
                        jQuery("#ux_ddl_advertisement_position").val("<?php echo isset($advertisement_get_data["advertisement_position"]) ? esc_attr($advertisement_get_data["advertisement_position"]) : "top_left"; ?>");

                  <?php
                  global $wp_version;
                  if ($wp_version <= 3.5) {
                     ?>
                           jQuery("#wp_media_upload_error_message").css("display", "block");
                           jQuery("#wp_upload_button").css("display", "none");
                     <?php
                  }
                  ?>
                        advertisment_settings_photo_gallery_plus();
                     });
                     jQuery("#ux_frm_advertisement").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_thumbnail_layout_shortcode" :
               ?>
                  jQuery("#ux_li_shortcode_generator").addClass("active");
                  jQuery("#ux_li_thumbnail_layout_shortcode").addClass("active");
               <?php
               if (shortcode_generator_photo_gallery_plus === "1") {
                  ?>
                     function generate_shortcode_thumbnail_layout_photo_gallery_plus()
                     {
                        var choose_gallery = jQuery("#ux_ddl_choose_gallery").val();
                        if (choose_gallery === "")
                        {
                           var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                           toastr[shortCutFunction](<?php echo json_encode($pgp_choose_gallery_message); ?>);
                           jQuery(".ux_div_shortcode").css("display", "none");
                        } else
                        {
                           var source_id = choose_gallery;
                           var thumbnail_alignment = jQuery("#ux_ddl_alignment").val();
                           var sort_images_by = jQuery("#ux_ddl_sort_image_by").val();
                           var order_images_by = jQuery("#ux_ddl_order_images").val();
                           var lightbox_type = jQuery("#ux_ddl_lightbox_type").val();
                           var columns = jQuery("#ux_txt_columns").val();
                           var images_per_page = jQuery("#ux_txt_images_per_page").val();
                           var gallery_title = jQuery("#ux_ddl_gallery_title").val();
                           var gallery_description = jQuery("#ux_ddl_gallery_description").val();
                           var thumbnail_title = jQuery("#ux_ddl_thumbnail_title").val();
                           var thumbnail_description = jQuery("#ux_ddl_thumbnail_description").val();
                           var animation_effects = jQuery("#ux_ddl_animation_effect").val();
                           var special_effects = jQuery("#ux_ddl_special_effects").val();
                           var filters = jQuery("#ux_ddl_filters").val();
                           var lazy_load = jQuery("#ux_ddl_lazy_load").val();
                           var search_box = jQuery("#ux_ddl_search_box").val();
                           var order_by = jQuery("#ux_ddl_order_by").val();
                           var page_navigation = jQuery("#ux_ddl_page_navigation").val();
                           var images_per_page_layout = jQuery("#ux_ddl_page_navigation").val() === "enable" ? "images_per_page=\"" + images_per_page + "\" " : "";
                           var album_type = "";
                           var album_title = "";
                           var album_description = "";
                           var thumbnail_shortcode = "[photo_gallery_plus source_type=\"gallery\" id=\"" + source_id + "\" layout_type=\"thumbnail_layout\" " + album_type + "alignment=\"" + thumbnail_alignment +
                                   "\" lightbox_type=\"" + lightbox_type + "\" order_images_by=\"" + order_images_by + "\" sort_images_by=\"" + sort_images_by + "\" " + album_title + album_description + "gallery_title=\"" + gallery_title +
                                   "\" gallery_description=\"" + gallery_description + "\" thumbnail_title=\"" + thumbnail_title +
                                   "\" thumbnail_description=\"" + thumbnail_description + "\" filters=\"" + filters + "\" lazy_load=\"" + lazy_load +
                                   "\" search_box=\"" + search_box + "\" order_by=\"" + order_by + "\" columns=\"" + columns +
                                   "\" page_navigation=\"" + page_navigation + "\" " + images_per_page_layout + "animation_effects=\"" + animation_effects + "\" " + "special_effects=\"" + special_effects + "\"][/photo_gallery_plus]";
                           jQuery(".ux_div_shortcode").css("display", "block");
                           jQuery(".ux_txtarea_generate_shortcode").html(thumbnail_shortcode);
                           load_sidebar_content_photo_gallery_plus();
                        }
                     }
                  <?php
               }
               break;
            case "pgp_masonry_layout_shortcode" :
               ?>
                  jQuery("#ux_li_shortcode_generator").addClass("active");
                  jQuery("#ux_li_masonry_layout_shortcode").addClass("active");
               <?php
               if (shortcode_generator_photo_gallery_plus === "1") {
                  ?>
                     function generate_shortcode_masonry_layout_photo_gallery_plus()
                     {
                        var choose_gallery = jQuery("#ux_ddl_choose_gallery").val();
                        if (choose_gallery === "")
                        {
                           var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
                           toastr[shortCutFunction](<?php echo json_encode($pgp_choose_gallery_message); ?>);
                           jQuery(".ux_div_shortcode").css("display", "none");
                        } else
                        {
                           var source_id = choose_gallery;
                           var thumbnail_alignment = jQuery("#ux_ddl_alignment").val();
                           var sort_images_by = jQuery("#ux_ddl_sort_image_by").val();
                           var order_images_by = jQuery("#ux_ddl_order_images").val();
                           var lightbox_type = jQuery("#ux_ddl_lightbox_type").val();
                           var columns = jQuery("#ux_txt_columns").val();
                           var images_per_page = jQuery("#ux_txt_images_per_page").val();
                           var gallery_title = jQuery("#ux_ddl_gallery_title").val();
                           var gallery_description = jQuery("#ux_ddl_gallery_description").val();
                           var thumbnail_title = jQuery("#ux_ddl_thumbnail_title").val();
                           var thumbnail_description = jQuery("#ux_ddl_thumbnail_description").val();
                           var filters = jQuery("#ux_ddl_filters").val();
                           var lazy_load = jQuery("#ux_ddl_lazy_load").val();
                           var search_box = jQuery("#ux_ddl_search_box").val();
                           var order_by = jQuery("#ux_ddl_order_by").val();
                           var page_navigation = jQuery("#ux_ddl_page_navigation").val();
                           var animation_effects = jQuery("#ux_ddl_animation_effect").val();
                           var special_effects = jQuery("#ux_ddl_special_effects").val();
                           var images_per_page_layout = jQuery("#ux_ddl_page_navigation").val() === "enable" ? "images_per_page=\"" + images_per_page + "\" " : "";
                           var album_type = "";
                           var album_title = "";
                           var album_description = "";
                           var masonry_shortcode = "[photo_gallery_plus source_type=\"gallery\" id=\"" + source_id + "\" layout_type=\"masonry_layout\" " + album_type +
                                   " alignment=\"" + thumbnail_alignment + "\" lightbox_type=\"" + lightbox_type +
                                   "\" order_images_by=\"" + order_images_by + "\" sort_images_by=\"" + sort_images_by +
                                   "\" " + album_title + album_description + "gallery_title=\"" + gallery_title +
                                   "\" gallery_description=\"" + gallery_description + "\" thumbnail_title=\"" + thumbnail_title +
                                   "\" thumbnail_description=\"" + thumbnail_description + "\" filters=\"" + filters +
                                   "\" lazy_load=\"" + lazy_load + "\" search_box=\"" + search_box +
                                   "\" order_by=\"" + order_by + "\" columns=\"" + columns + "\" page_navigation=\"" + page_navigation +
                                   "\" " + images_per_page_layout + " animation_effects=\"" + animation_effects + "\" " + "special_effects=\"" + special_effects + "\"][/photo_gallery_plus]";
                           jQuery(".ux_div_shortcode").css("display", "block");
                           jQuery(".ux_txtarea_generate_shortcode").html(masonry_shortcode);
                           load_sidebar_content_photo_gallery_plus();
                        }
                     }
                  <?php
               }
               break;
            case "pgp_slideshow_layout_shortcode" :
               ?>
                  jQuery("#ux_li_shortcode_generator").addClass("active");
                  jQuery("#ux_li_slideshow_layout_shortcode").addClass("active");

               <?php
               if (shortcode_generator_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        shortcode_source_type_control_photo_gallery_plus("ux_ddl_choose_type", "ux_div_gallery", "ux_div_album", "ux_div_album_control");
                     });
                     jQuery("#ux_ddl_autoplay").change(function () {
                        var auto_play = jQuery("#ux_ddl_autoplay").val();
                        if (auto_play === "no") {
                           jQuery("#ux_div_time_interval").css("display", "none");
                        } else {
                           jQuery("#ux_div_time_interval").css("display", "block");
                        }
                     });
                     function generate_shortcode_slideshow_layout_photo_gallery_plus()
                     {
                        premium_edition_notification_photo_gallery_plus();
                        load_sidebar_content_photo_gallery_plus();
                     }

                  <?php
               }
               break;
            case "pgp_image_browser_layout_shortcode" :
               ?>
                  jQuery("#ux_li_shortcode_generator").addClass("active");
                  jQuery("#ux_li_image_browser_layout_shortcode").addClass("active");
               <?php
               if (shortcode_generator_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        shortcode_source_type_control_photo_gallery_plus("ux_ddl_choose_type", "ux_div_gallery", "ux_div_album", "ux_div_album_control");
                     });
                     function generate_shortcode_image_browser_layout_photo_gallery_plus()
                     {
                        premium_edition_notification_photo_gallery_plus();
                        load_sidebar_content_photo_gallery_plus();
                     }

                  <?php
               }
               break;
            case "pgp_justified_grid_layout_shortcode" :
               ?>
                  jQuery("#ux_li_shortcode_generator").addClass("active");
                  jQuery("#ux_li_justified_grid_layout_shortcode").addClass("active");
               <?php
               if (shortcode_generator_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        shortcode_source_type_control_photo_gallery_plus("ux_ddl_choose_type", "ux_div_gallery", "ux_div_album", "ux_div_show_hide_album");
                     });
                     function generate_shortcode_justified_grid_layout_photo_gallery_plus()
                     {
                        premium_edition_notification_photo_gallery_plus();
                        load_sidebar_content_photo_gallery_plus();
                     }
                  <?php
               }
               break;
            case "pgp_blog_style_layout_shortcode" :
               ?>
                  jQuery("#ux_li_shortcode_generator").addClass("active");
                  jQuery("#ux_li_blog_style_layout_shortcode").addClass("active");
               <?php
               if (shortcode_generator_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function ()
                     {
                        shortcode_source_type_control_photo_gallery_plus("ux_ddl_choose_type", "ux_div_gallery", "ux_div_album", "ux_div_show_hide_album");
                     });
                     function generate_shortcode_blog_style_layout_photo_gallery_plus()
                     {
                        premium_edition_notification_photo_gallery_plus();
                        load_sidebar_content_photo_gallery_plus();
                     }
                  <?php
               }
               break;
            case "pgp_other_settings" :
               ?>
                  jQuery("#ux_li_other_setting").addClass("active");
               <?php
               if (other_settings_photo_gallery_plus === "1") {
                  ?>
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_remove_table").val("<?php echo isset($details_other_setting["remove_table_at_uninstall"]) ? $details_other_setting["remove_table_at_uninstall"] : "disable"; ?>");
                     });
                     jQuery("#ux_frm_other_setting").validate({
                        submitHandler: function () {
                           submit_handler_common_photo_gallery_plus("#ux_frm_other_setting", "", "other_settings_module", "<?php echo $other_settings_nonce; ?>", <?php echo json_encode($pgp_update_other_settings_data); ?>, "pgp_other_settings");
                        }
                     });

                  <?php
               }
               break;
            case "pgp_roles_and_capabilities":
               ?>
                  jQuery("#ux_li_roles_capabilities").addClass("active");
               <?php
               if (roles_and_capabilities_photo_gallery_plus === "1") {
                  ?>

                     function show_roles_capabilities_photo_gallery_plus(id, div_id) {
                        jQuery(id).prop("checked") ? jQuery("#" + div_id).css("display", "block") : jQuery("#" + div_id).css("display", "none");
                        load_sidebar_content_photo_gallery_plus();
                     }

                     function full_control_function_photo_gallery_plus(id, div_id) {
                        var checkbox_id = jQuery(id).prop("checked");
                        jQuery("#" + div_id + " input[type=checkbox]").each(function () {
                           if (checkbox_id) {
                              jQuery(this).attr("checked", "checked");
                              if (jQuery(id).attr("id") !== jQuery(this).attr("id")) {
                                 jQuery(this).attr("disabled", "disabled");
                              }
                           } else {
                              if (jQuery(id).attr("id") !== jQuery(this).attr("id")) {
                                 jQuery(this).removeAttr("disabled");
                                 jQuery("#ux_chk_other_capabilities_manage_options,#ux_chk_other_capabilities_read").attr("disabled", "disabled");
                              }
                           }
                        });
                     }
                     jQuery(document).ready(function () {
                        jQuery("#ux_ddl_photo_gallery_plus_menu").val("<?php echo isset($details_roles_capabilities["show_photo_gallery_plus_top_bar_menu"]) ? $details_roles_capabilities["show_photo_gallery_plus_top_bar_menu"] : "enable"; ?>");
                        full_control_function_photo_gallery_plus("#ux_chk_full_control_administrator", "ux_div_administrator_roles");
                        show_roles_capabilities_photo_gallery_plus("#ux_chk_author", "ux_div_author_roles");
                        full_control_function_photo_gallery_plus("#ux_chk_full_control_author", "ux_div_author_roles");
                        show_roles_capabilities_photo_gallery_plus("#ux_chk_editor", "ux_div_editor_roles");
                        full_control_function_photo_gallery_plus("#ux_chk_full_control_editor", "ux_div_editor_roles");
                        show_roles_capabilities_photo_gallery_plus("#ux_chk_contributor", "ux_div_contributor_roles");
                        full_control_function_photo_gallery_plus("#ux_chk_full_control_contributor", "ux_div_contributor_roles");
                        show_roles_capabilities_photo_gallery_plus("#ux_chk_subscriber", "ux_div_subscriber_roles");
                        full_control_function_photo_gallery_plus("#ux_chk_full_control_subscriber", "ux_div_subscriber_roles");
                        show_roles_capabilities_photo_gallery_plus("#ux_chk_others_privileges", "ux_div_other_privileges_roles");
                        full_control_function_photo_gallery_plus("#ux_chk_full_control_others", "ux_div_other_privileges_roles");
                     });
                     jQuery("#ux_frm_roles_and_capabilities").validate({
                        submitHandler: function () {
                           premium_edition_notification_photo_gallery_plus();
                        }
                     });
                  <?php
               }
               break;
            case "pgp_feature_requests" :
               ?>
                  jQuery("#ux_li_feature_requests").addClass("active");
                  jQuery("#ux_li_feature_requests").addClass("active");
                  var feature_request_array = [];
                  var frm_feature_request = jQuery("#ux_frm_feature_requests");
                  var url = "<?php echo the_wpgeeks_url . "/feedbacks.php"; ?>";
                  var domain_url = "<?php echo site_url(); ?>";
                  frm_feature_request.validate({
                     rules: {
                        ux_txt_your_name: {
                           required: true
                        },
                        ux_txt_email_address: {
                           required: true,
                           email: true
                        },
                        ux_txtarea_feature_request: {
                           required: true
                        }
                     },
                     errorPlacement: function (error, element) {
                     },
                     highlight: function (element) {
                        jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
                     },
                     success: function (label, element) {
                        jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
                     },
                     submitHandler: function () {
                        feature_request_array.push(jQuery("#ux_txt_your_name").val(), jQuery("#ux_txt_email_address").val(), domain_url, jQuery("#ux_txtarea_feature_request").val());
                        overlay_loading_photo_gallery_plus(<?php echo json_encode($pgp_feature_requests_update); ?>);
                        jQuery.post(url, {
                           data: JSON.stringify(feature_request_array),
                           param: "pgp_feature_requests"
                        },
                                function () {
                                   setTimeout(function () {
                                      remove_overlay_photo_gallery_plus();
                                      window.location.reload();
                                   }, 3000);
                                });
                     }
                  });
               <?php
               break;
            case "pgp_system_information" :
               ?>
                  jQuery("#ux_li_system_information").addClass("active");
               <?php
               if (system_information_photo_gallery_plus === "1") {
                  ?>
                     jQuery.getSystemReport = function (strDefault, stringCount, string, location) {
                        var o = strDefault.toString();
                        if (!string) {
                           string = "0";
                        }
                        while (o.length < stringCount) {
                           if (location === "undefined") {
                              o = string + o;
                           } else {
                              o = o + string;
                           }
                        }
                        return o;
                     };
                     jQuery(".system-report").click(function () {
                        var report = "";
                        jQuery(".custom-form-body").each(function () {
                           jQuery("h3.form-section", jQuery(this)).each(function () {
                              report = report + "\n### " + jQuery.trim(jQuery(this).text()) + " ###\n\n";
                           });
                           jQuery("tbody > tr", jQuery(this)).each(function () {
                              var the_name = jQuery.getSystemReport(jQuery.trim(jQuery(this).find("strong").text()), 25, " ");
                              var the_value = jQuery.trim(jQuery(this).find("span").text());
                              var value_array = the_value.split(", ");
                              if (value_array.length > 1) {
                                 var temp_line = "";
                                 jQuery.each(value_array, function (key, line) {
                                    var tab = (key === 0) ? 0 : 25;
                                    temp_line = temp_line + jQuery.getSystemReport("", tab, " ", "f") + line + "\n";
                                 });
                                 the_value = temp_line;
                              }
                              report = report + "" + the_name + the_value + "\n";
                           });
                        });
                        try {
                           jQuery("#ux_system_information").slideDown();
                           jQuery("#ux_system_information textarea").val(report).focus().select();
                           return false;
                        } catch (e) {
                        }
                        return false;
                     });
                     jQuery("#ux_btn_system_information").click(function () {
                        if (jQuery("#ux_btn_system_information").text() === "Close System Information!") {
                           jQuery("#ux_system_information").slideUp();
                           jQuery("#ux_btn_system_information").html("Get System Information!");
                        } else {
                           jQuery("#ux_btn_system_information").html("Close System Information!");
                           jQuery("#ux_btn_system_information").removeClass("system-information");
                           jQuery("#ux_btn_system_information").addClass("close-information");
                        }
                     });
                     var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                     setTimeout(function () {
                        clearInterval(sidebar_load_interval);
                     }, 5000);
                  <?php
               }
               break;
            case "pgp_upgrade" :
               ?>
                  jQuery("#ux_li_upgrade").addClass("active");
                  var sidebar_load_interval = setInterval(load_sidebar_content_photo_gallery_plus, 1000);
                  setTimeout(function () {
                     clearInterval(sidebar_load_interval);
                  }, 5000);
               <?php
               break;
         }
      }
      ?>
      </script>
      <?php
   }
}