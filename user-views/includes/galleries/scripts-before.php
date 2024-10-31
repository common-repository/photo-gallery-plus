<?php
/**
 * This file is used to call script.
 *
 * @author	The WP Geeks
 * @package	photo-gallery-plus/user-views/includes/galleries
 * @version	1.0.0
 */
if (!defined("ABSPATH")) {
   exit;
}
// Exit if accessed directly
?>
<script type="text/javascript">

   var ajaxurl = "<?php echo admin_url("admin-ajax.php"); ?>";
   var global_options_right_click_protection = "<?php echo isset($global_options_settings["global_options_right_click_protection"]) ? esc_attr($global_options_settings["global_options_right_click_protection"]) : "disable"; ?>";
   var animation_effect = "<?php echo isset($animation_effects) ? esc_attr($animation_effects) : "none"; ?>";
   /*
    Function Name: call_photo_gallery_plus_layout_type_
    Parameters: Yes(layout_type)
    Description: This function is used for Layouts.
    Created On: 03-6-2017 09:00AM
    Created By: The WP Geeks Team
    */
   if (typeof (call_photo_gallery_plus_layout_type_<?php echo $random; ?>) !== "function")
   {
      function call_photo_gallery_plus_layout_type_<?php echo $random; ?>()
      {
<?php
if (isset($layout_type)) {
   switch ($layout_type) {
      case "masonry_layout" :
         ?>
                  if (jQuery(".masonry_grid_layout_container").data('isotope'))
                  {
                     jQuery(".masonry_grid_layout_container").isotope('destroy');
                  }
                  jQuery(".masonry_grid_layout_container").imagesLoaded(function ()
                  {
                     jQuery(".masonry_grid_layout_container").isotope
                             ({
                                itemSelector: ".masonry_grid_wrapper_item",
                                layoutMode: 'masonry',
                                percentPosition: true
                             });
                  });
         <?php
         break;
   }
}
?>
      }
   }
   /*
    Function Name: call_photo_gallery_plus_lightbox_
    Parameters: Yes(lightbox_type)
    Description: This function is used for Lightboxes.
    Created On: 01-6-2017 09:00AM
    Created By: The WP Geeks Team
    */
   if (typeof (call_photo_gallery_plus_lightbox_<?php echo $random; ?>) !== "function")
   {
      function call_photo_gallery_plus_lightbox_<?php echo $random; ?>(lightbox_type)
      {
         switch (lightbox_type)
         {
            case "lightcase" :
               jQuery("a[data-rel^=lightcase_<?php echo $random; ?>").lightcase(
                       {
                          transition: "<?php echo isset($pgp_lightcase_meta_data["lightcase_image_transition"]) ? $pgp_lightcase_meta_data["lightcase_image_transition"] : "scrollTop"; ?>", //	Transition between the sequences for groups and slideshow.
                          speedIn: <?php echo isset($pgp_lightcase_meta_data["lightcase_animation_speed_starting_transition"]) ? $pgp_lightcase_meta_data["lightcase_animation_speed_starting_transition"] : "350"; ?>, //Animation speed for the starting transition.(int)
                          speedOut: <?php echo isset($pgp_lightcase_meta_data["lightcase_animation_speed_ending_transition"]) ? $pgp_lightcase_meta_data["lightcase_animation_speed_ending_transition"] : "250"; ?>, //Animation speed for the ending transition.(int)
                          slideshow: <?php echo isset($pgp_lightcase_meta_data["lightcase_autoplay_slideshow"]) ? $pgp_lightcase_meta_data["lightcase_autoplay_slideshow"] : "false"; ?>,
                          timeout: <?php echo isset($pgp_lightcase_meta_data["lightcase_slideshow_interval"]) ? $pgp_lightcase_meta_data["lightcase_slideshow_interval"] * 1000 : "5000"; ?>,
                          onInit:
                                  {
                                     foo: function ()
                                     {
                                        jQuery("#lightcase-info").find("#lightcase-custom-caption").remove();
                                        jQuery("#lightcase-info").find("#lightcase-custom-title").remove();
                                     }
                                  },
                          onFinish:
                                  {
                                     baz: function ()
                                     {
                                        var lightcase_desc = jQuery("#lightcase-info").find("#lightcase-caption").text();
                                        jQuery("#lightcase-info").find("#lightcase-caption").hide();
                                        jQuery("#lightcase-info #lightcase-sequenceInfo").after("<<?php echo isset($pgp_lightcase_meta_data["lightcase_image_description_html_tag"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_description_html_tag"]) : "h1"; ?> id='lightcase-custom-caption'>" + lightcase_desc + "</<?php echo isset($pgp_lightcase_meta_data["lightcase_image_description_html_tag"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_description_html_tag"]) : "h1"; ?>>");

                                        var lightcase_title = jQuery("#lightcase-info").find("#lightcase-title").text();
                                        jQuery("#lightcase-info").find("#lightcase-title").hide();
                                        jQuery("#lightcase-info #lightcase-sequenceInfo").after("<<?php echo isset($pgp_lightcase_meta_data["lightcase_image_title_html_tag"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_title_html_tag"]) : "h1"; ?> id='lightcase-custom-title'>" + lightcase_title + "</<?php echo isset($pgp_lightcase_meta_data["lightcase_image_title_html_tag"]) ? esc_attr($pgp_lightcase_meta_data["lightcase_image_title_html_tag"]) : "h1"; ?>>");
                                     }
                                  },
                          onClose:
                                  {
                                     baz: function ()
                                     {
                                        jQuery(".lightcase-icon-close").attr("style", "display:none !important");
                                     }
                                  }
                       });

               break;
         }
      }
   }
   jQuery(document).ready(function ()
   {
      if (animation_effect !== "none")
      {
         jQuery(".pgp_animate").scrolla_pgp();
      }
      if (global_options_right_click_protection === "enable") {
         jQuery(".photo_gallery_plus_main_container").on("contextmenu", function (e)
         {
            return false;
         });
      }
      call_photo_gallery_plus_layout_type_<?php echo $random; ?>();
      call_photo_gallery_plus_lightbox_<?php echo $random; ?>("<?php echo $lightbox_type; ?>");
   });
</script>