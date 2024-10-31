<?php
/**
 * This File is used for Premium Editions.
 *
 * @author  The WP Geeks
 * @package photo-gallery-plus/views/premium-editions/
 * @version 1.0.0
 */
if (!defined("ABSPATH"))
   exit; // Exit if accessed directly
if (!is_user_logged_in()) {
   return;
} else {
   $access_granted = false;
   if (isset($user_role_permission) && count($user_role_permission) > 0) {
      foreach ($user_role_permission as $permission) {
         if (current_user_can($permission)) {
            $access_granted = true;
            break;
         }
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
                  <?php echo $pgp_upgrade; ?>
               </span>
            </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box vivid-green">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-custom-briefcase"></i>
                     <?php echo $pgp_upgrade; ?>
                  </div>
               </div>
               <div class="portlet-body form">
                  <form id="ux_frm_premium_editions">
                     <div class="form-body">
                        <div class="wpb_wrapper">
                           <style type="text/css">
                              #go-pricing-table-464 .gw-go {
                                 margin-left: -30px;
                              }

                              #go-pricing-table-464 .gw-go-col {
                                 margin-left: 30px;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap {
                                 min-width: 130px;
                              }

                              #go-pricing-table-464 .gw-go-col-inner {
                                 border-radius: 8px 8px 8px 8px;
                              }

                              #go-pricing-table-464 ul.gw-go-body,
                              #go-pricing-table-464 ul.gw-go-body li {
                                 border: none !important;
                                 padding-top: 1px;
                              }

                              #go-pricing-table-464 ul.gw-go-body li .gw-go-body-cell {
                                 padding-top: 1px;
                              }

                              #go-pricing-table-464 ul.gw-go-body {
                                 padding-bottom: 1px;
                              }

                              #go-pricing-table-464 .gw-go-tooltip-content {
                                 background-color: #9d9d9d;
                                 color: #333333;
                                 max-width: 130px;
                              }

                              #go-pricing-table-464 .gw-go-tooltip:before {
                                 border-top-color: #9d9d9d;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-header,
                              #go-pricing-table-464 .gw-go-col-wrap-0.gw-go-hover .gw-go-header-bottom,
                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li .gw-go-body-cell:before,
                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-btn {
                                 background-color: #ef463b;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-price-wrap span,
                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-coinf div,
                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-coinb div {
                                 color: #ef463b;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-header h3 {
                                 font-size: 22px !important;
                                 line-height: 24px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-price-wrap > span {
                                 font-size: 55px !important;
                                 line-height: 60px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-price-wrap small {
                                 font-size: 16px !important;
                                 line-height: 18px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="0"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="1"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="2"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="3"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="4"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="5"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="6"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="7"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="8"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="9"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="10"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="11"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="12"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="13"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="14"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="15"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="16"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="17"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="18"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="19"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="20"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="21"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="22"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="23"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="24"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="25"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="26"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="27"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="28"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="29"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="30"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="31"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="32"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="33"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="34"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="35"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="36"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="37"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="38"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="39"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="40"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="41"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="42"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="43"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="44"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="45"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="46"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="47"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="48"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="49"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="50"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="51"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="52"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="53"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="54"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="55"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="56"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="57"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="58"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="59"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="60"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="61"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="62"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="63"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="64"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="65"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="66"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="67"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="68"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="69"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="70"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="71"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="72"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="73"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="74"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="75"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="76"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="77"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="78"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="79"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-body li[data-row-index="80"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-footer-row[data-row-index="0"] .gw-go-btn {
                                 font-size: 14px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-0 .gw-go-footer-row[data-row-index="0"] .gw-go-btn {
                                 background-color: #ef463b !important;
                                 color: #ffffff !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-header,
                              #go-pricing-table-464 .gw-go-col-wrap-1.gw-go-hover .gw-go-header-bottom,
                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li .gw-go-body-cell:before,
                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-btn {
                                 background-color: #05458c;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-price-wrap span,
                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-coinf div,
                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-coinb div {
                                 color: #05458c;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-header h3 {
                                 font-size: 22px !important;
                                 line-height: 24px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-price-wrap > span {
                                 font-size: 55px !important;
                                 line-height: 60px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-price-wrap small {
                                 font-size: 16px !important;
                                 line-height: 18px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="0"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="1"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="2"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="3"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="4"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="5"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="6"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="7"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="8"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="9"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="10"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="11"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="12"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="13"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="14"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="15"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="16"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="17"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="18"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="19"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="20"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="21"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="22"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="23"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="24"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="25"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="26"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="27"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="28"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="29"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="30"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="31"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="32"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="33"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="34"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="35"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="36"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="37"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="38"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="39"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="40"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="41"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="42"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="43"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="44"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="45"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="46"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="47"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="48"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="49"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="50"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="51"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="52"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="53"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="54"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="55"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="56"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="57"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="58"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="59"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="60"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="61"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="62"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="63"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="64"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="65"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="66"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="67"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="68"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="69"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="70"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="71"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="72"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="73"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="74"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="75"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="76"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="77"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="78"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="79"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-body li[data-row-index="80"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-footer-row[data-row-index="0"] .gw-go-btn {
                                 font-size: 14px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-1 .gw-go-footer-row[data-row-index="0"] .gw-go-btn {
                                 background-color: #05458c !important;
                                 color: #ffffff !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-header,
                              #go-pricing-table-464 .gw-go-col-wrap-2.gw-go-hover .gw-go-header-bottom,
                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li .gw-go-body-cell:before,
                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-btn {
                                 background-color: #16bbdc;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-price-wrap span,
                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-coinf div,
                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-coinb div {
                                 color: #16bbdc;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-header h3 {
                                 font-size: 22px !important;
                                 line-height: 24px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-price-wrap > span {
                                 font-size: 55px !important;
                                 line-height: 60px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-price-wrap small {
                                 font-size: 16px !important;
                                 line-height: 18px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="0"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="1"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="2"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="3"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="4"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="5"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="6"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="7"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="8"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="9"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="10"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="11"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="12"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="13"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="14"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="15"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="16"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="17"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="18"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="19"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="20"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="21"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="22"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="23"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="24"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="25"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="26"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="27"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="28"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="29"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="30"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="31"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="32"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="33"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="34"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="35"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="36"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="37"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="38"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="39"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="40"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="41"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="42"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="43"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="44"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="45"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="46"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="47"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="48"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="49"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="50"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="51"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="52"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="53"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="54"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="55"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="56"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="57"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="58"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="59"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="60"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="61"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="62"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="63"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="64"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="65"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="66"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="67"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="68"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="69"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="70"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="71"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="72"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="73"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="74"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="75"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="76"] {
                                 font-size: 14px !important;
                                 line-height: 16px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="77"] {
                                 font-size: 20px !important;
                                 line-height: 22px !important;
                                 font-weight: bold !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="78"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="79"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-body li[data-row-index="80"] {
                                 font-size: 17px !important;
                                 line-height: 19px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-footer-row[data-row-index="0"] .gw-go-btn {
                                 font-size: 14px !important;
                              }

                              #go-pricing-table-464 .gw-go-col-wrap-2 .gw-go-footer-row[data-row-index="0"] .gw-go-btn {
                                 background-color: #16bbdc !important;
                                 color: #ffffff !important;
                              }

                              #go-pricing-table-464 .gw-go {
                                 visibility: inherit;
                              }
                           </style>
                           <style>
                              @media only screen and (min-width: 480px) and (max-width: 767px) {
                                 #go-pricing-table-464 .gw-go-col-wrap {
                                    width: 50%;
                                 }
                              }
                           </style>
                           <style>
                              @media only screen and (max-width: 479px) {
                                 #go-pricing-table-464 .gw-go-col-wrap {
                                    width: 100%;
                                 }
                              }
                           </style>
                           <div id="go-pricing-table-464" class="go-pricing" style="margin-bottom:20px;">
                              <div class="gw-go gw-go-clearfix gw-go-enlarge-current gw-go-disable-box-shadow gw-go-3cols" data-id="464" data-colnum="3" data-equalize="{&quot;column&quot;:1,&quot;body&quot;:1,&quot;footer&quot;:1}" data-views="{&quot;tp&quot;:{&quot;min&quot;:&quot;768&quot;,&quot;max&quot;:&quot;959&quot;,&quot;cols&quot;:&quot;&quot;},&quot;ml&quot;:{&quot;min&quot;:&quot;480&quot;,&quot;max&quot;:&quot;767&quot;,&quot;cols&quot;:&quot;2&quot;},&quot;mp&quot;:{&quot;min&quot;:&quot;&quot;,&quot;max&quot;:&quot;479&quot;,&quot;cols&quot;:&quot;1&quot;}}" style="opacity: 1;">
                                 <div class="gw-go-col-wrap gw-go-col-wrap-0 gw-go-hover gw-go-disable-enlarge gw-go-disable-hover" data-current="1" data-col-index="0" style="max-width: 409px; height: 3385px;">
                                    <div class="gw-go-col gw-go-clean-style5">
                                       <div class="gw-go-col-inner">
                                          <div class="gw-go-col-inner-layer"></div>
                                          <div class="gw-go-col-inner-layer-over"></div>
                                          <div class="gw-go-header gw-go-header-standard">
                                             <div class="gw-go-header-top">
                                                <h3>PERSONAL</h3></div>
                                             <div class="gw-go-header-bottom">
                                                <div class="gw-go-price-wrap"><span data-id="price" data-currency="{&quot;currency&quot;:&quot;USD&quot;,&quot;position&quot;:&quot;left&quot;,&quot;thousand-sep&quot;:&quot;,&quot;,&quot;decimal-sep&quot;:&quot;.&quot;,&quot;decimal-no&quot;:2}" data-price="29"><span data-id="currency">$</span><span data-id="amount">29</span></span><small>One Time Purchase</small></div>
                                             </div>
                                          </div>
                                          <ul class="gw-go-body">
                                             <li data-row-index="0">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="1">
                                                <div class="gw-go-body-cell" style="height: 22px;">PRO SUPPORT</div>
                                             </li>
                                             <li data-row-index="2">
                                                <div class="gw-go-body-cell" style="height: 19px;">1 Installation per License</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="3">
                                                <div class="gw-go-body-cell" style="height: 19px;">1 week of Technical Support</div>
                                             </li>
                                             <li data-row-index="4">
                                                <div class="gw-go-body-cell" style="height: 19px;">1 year of Free Updates</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="5">
                                                <div class="gw-go-body-cell" style="height: 19px;">Automatic Plugin Updates</div>
                                             </li>
                                             <li data-row-index="6">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="7">
                                                <div class="gw-go-body-cell" style="height: 22px;">GALLERIES</div>
                                             </li>
                                             <li data-row-index="8">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Galleries</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="9">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Gallery</div>
                                             </li>
                                             <li data-row-index="10">
                                                <div class="gw-go-body-cell" style="height: 19px;">Sort Galleries</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="11">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li data-row-index="12">
                                                <div class="gw-go-body-cell" style="height: 22px;">ALBUMS</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="13">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="14">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="15">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="16">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="17">
                                                <div class="gw-go-body-cell" style="height: 22px;">TAGS</div>
                                             </li>
                                             <li data-row-index="18">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Tags</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="19">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Tag</div>
                                             </li>
                                             <li data-row-index="20">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="21">
                                                <div class="gw-go-body-cell" style="height: 22px;">LAYOUT SETTINGS</div>
                                             </li>
                                             <li data-row-index="22">
                                                <div class="gw-go-body-cell" style="height: 19px;">Thumbnail Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="23">
                                                <div class="gw-go-body-cell" style="height: 19px;">Masonry Layout</div>
                                             </li>
                                             <li data-row-index="24">
                                                <div class="gw-go-body-cell" style="height: 19px;">Slideshow Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="25">
                                                <div class="gw-go-body-cell" style="height: 19px;">Image Browser Layout</div>
                                             </li>
                                             <li data-row-index="26">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="27">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="28">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="29">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="30">
                                                <div class="gw-go-body-cell" style="height: 19px;">Custom CSS</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="31">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li data-row-index="32">
                                                <div class="gw-go-body-cell" style="height: 22px;">LIGHTBOXES</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="33">
                                                <div class="gw-go-body-cell" style="height: 19px;">Lightcase</div>
                                             </li>
                                             <li data-row-index="34">
                                                <div class="gw-go-body-cell" style="height: 19px;">Fancy Box</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="35">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="36">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="37">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="38">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="39">
                                                <div class="gw-go-body-cell" style="height: 22px;">GENERAL SETTINGS</div>
                                             </li>
                                             <li data-row-index="40">
                                                <div class="gw-go-body-cell" style="height: 19px;">Global Options</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="41">
                                                <div class="gw-go-body-cell" style="height: 19px;">Lazy Load Settings</div>
                                             </li>
                                             <li data-row-index="42">
                                                <div class="gw-go-body-cell" style="height: 19px;">Filters Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="43">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="44">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="45">
                                                <div class="gw-go-body-cell" style="height: 19px;">Page Navigation</div>
                                             </li>
                                             <li data-row-index="46">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="47">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="48">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="49">
                                                <div class="gw-go-body-cell" style="height: 22px;">MAIN FEATURES</div>
                                             </li>
                                             <li data-row-index="50">
                                                <div class="gw-go-body-cell" style="height: 19px;">Shortcode Wizard</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="51">
                                                <div class="gw-go-body-cell" style="height: 19px;">Unlimited Galleries and Images</div>
                                             </li>
                                             <li data-row-index="52">
                                                <div class="gw-go-body-cell" style="height: 19px;">Social Sharing</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="53">
                                                <div class="gw-go-body-cell" style="height: 19px;">Duplicate Gallery</div>
                                             </li>
                                             <li data-row-index="54">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="55">
                                                <div class="gw-go-body-cell" style="height: 19px;">Filmstrip Gallery</div>
                                             </li>
                                             <li data-row-index="56">
                                                <div class="gw-go-body-cell" style="height: 19px;">Multiple Browser Compatible</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="57">
                                                <div class="gw-go-body-cell" style="height: 19px;">Supports Media Manager</div>
                                             </li>
                                             <li data-row-index="58">
                                                <div class="gw-go-body-cell" style="height: 19px;">Copy Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="59">
                                                <div class="gw-go-body-cell" style="height: 19px;">Move Images</div>
                                             </li>
                                             <li data-row-index="60">
                                                <div class="gw-go-body-cell" style="height: 19px;">Rotate Clockwise</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="61">
                                                <div class="gw-go-body-cell" style="height: 19px;">Rotate Anti-Clockwise</div>
                                             </li>
                                             <li data-row-index="62">
                                                <div class="gw-go-body-cell" style="height: 19px;">Flip Images Vertically</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="63">
                                                <div class="gw-go-body-cell" style="height: 19px;">Flip Images Horizontally</div>
                                             </li>
                                             <li data-row-index="64">
                                                <div class="gw-go-body-cell" style="height: 19px;">Restore Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="65">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="66">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="67">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                             <li data-row-index="68">
                                                <div class="gw-go-body-cell" style="height: 19px;">Hover Effects</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="69">
                                                <div class="gw-go-body-cell" style="height: 19px;">Animation Effects</div>
                                             </li>
                                             <li data-row-index="70">
                                                <div class="gw-go-body-cell" style="height: 19px;">Special Effects</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="71">
                                                <div class="gw-go-body-cell" style="height: 19px;">Purge Galleries</div>
                                             </li>
                                             <li data-row-index="72">
                                                <div class="gw-go-body-cell" style="height: 19px;">SEO Friendly</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="73">
                                                <div class="gw-go-body-cell" style="height: 19px;">Title &amp; Description</div>
                                             </li>
                                             <li data-row-index="74">
                                                <div class="gw-go-body-cell" style="height: 19px;">Font Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="75">
                                                <div class="gw-go-body-cell" style="height: 19px;">Border Settings</div>
                                             </li>
                                             <li data-row-index="76">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="77">
                                                <div class="gw-go-body-cell" style="height: 22px;">OTHER SETTINGS</div>
                                             </li>
                                             <li data-row-index="78">
                                                <div class="gw-go-body-cell" style="height: 19px;">Feature Requests</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="79">
                                                <div class="gw-go-body-cell" style="height: 19px;">Roles and Capabilities</div>
                                             </li>
                                             <li data-row-index="80">
                                                <div class="gw-go-body-cell" style="height: 19px;">-</div>
                                             </li>
                                          </ul>
                                          <div class="gw-go-footer-wrap">
                                             <div class="gw-go-footer-spacer"></div>
                                             <div class="gw-go-footer">
                                                <div class="gw-go-footer-rows">
                                                   <div class="gw-go-footer-row" data-row-index="0">
                                                      <div class="gw-go-footer-row-inner" style="height: 44px;"><a href="http://www.thewpgeeks.com/product/personal-edition/" class="gw-go-btn gw-go-btn-large"><span class="gw-go-btn-inner">BUY NOW</span></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="gw-go-tooltip"></div>
                                    </div>
                                 </div>
                                 <div class="gw-go-col-wrap gw-go-col-wrap-1 gw-go-hover gw-go-disable-enlarge gw-go-disable-hover" data-current="1" data-col-index="1" style="max-width: 409px; height: 3385px;">
                                    <div class="gw-go-col gw-go-clean-style5">
                                       <div class="gw-go-col-inner">
                                          <div class="gw-go-col-inner-layer"></div>
                                          <div class="gw-go-col-inner-layer-over"></div>
                                          <div class="gw-go-ribbon-right"><img src="https://www.thewpgeeks.com/wp-content/plugins/go_pricing/assets/images/signs/ribbons/clean/ribbon_red_right_top.png" alt=""></div>
                                          <div class="gw-go-header gw-go-header-standard">
                                             <div class="gw-go-header-top">
                                                <h3>BUSINESS</h3></div>
                                             <div class="gw-go-header-bottom">
                                                <div class="gw-go-price-wrap"><span data-id="price" data-currency="{&quot;currency&quot;:&quot;USD&quot;,&quot;position&quot;:&quot;left&quot;,&quot;thousand-sep&quot;:&quot;,&quot;,&quot;decimal-sep&quot;:&quot;.&quot;,&quot;decimal-no&quot;:2}" data-price="38"><span data-id="currency">$</span><span data-id="amount">38</span></span><small>One Time Purchase</small></div>
                                             </div>
                                          </div>
                                          <ul class="gw-go-body">
                                             <li data-row-index="0">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="1">
                                                <div class="gw-go-body-cell" style="height: 22px;">PRO SUPPORT</div>
                                             </li>
                                             <li data-row-index="2">
                                                <div class="gw-go-body-cell" style="height: 19px;">1 Installation per License</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="3">
                                                <div class="gw-go-body-cell" style="height: 19px;">1 month of Technical Support</div>
                                             </li>
                                             <li data-row-index="4">
                                                <div class="gw-go-body-cell" style="height: 19px;">1 year of Free Updates</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="5">
                                                <div class="gw-go-body-cell" style="height: 19px;">Automatic Plugin Updates</div>
                                             </li>
                                             <li data-row-index="6">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="7">
                                                <div class="gw-go-body-cell" style="height: 22px;">GALLERIES</div>
                                             </li>
                                             <li data-row-index="8">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Galleries</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="9">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Gallery</div>
                                             </li>
                                             <li data-row-index="10">
                                                <div class="gw-go-body-cell" style="height: 19px;">Sort Galleries</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="11">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li data-row-index="12">
                                                <div class="gw-go-body-cell" style="height: 22px;">ALBUMS</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="13">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Albums</div>
                                             </li>
                                             <li data-row-index="14">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Album</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="15">
                                                <div class="gw-go-body-cell" style="height: 19px;">Sort Albums</div>
                                             </li>
                                             <li data-row-index="16">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="17">
                                                <div class="gw-go-body-cell" style="height: 22px;">TAGS</div>
                                             </li>
                                             <li data-row-index="18">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Tags</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="19">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Tag</div>
                                             </li>
                                             <li data-row-index="20">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="21">
                                                <div class="gw-go-body-cell" style="height: 22px;">LAYOUT SETTINGS</div>
                                             </li>
                                             <li data-row-index="22">
                                                <div class="gw-go-body-cell" style="height: 19px;">Thumbnail Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="23">
                                                <div class="gw-go-body-cell" style="height: 19px;">Masonry Layout</div>
                                             </li>
                                             <li data-row-index="24">
                                                <div class="gw-go-body-cell" style="height: 19px;">Slideshow Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="25">
                                                <div class="gw-go-body-cell" style="height: 19px;">Image Browser Layout</div>
                                             </li>
                                             <li data-row-index="26">
                                                <div class="gw-go-body-cell" style="height: 19px;">Justified Grid Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="27">
                                                <div class="gw-go-body-cell" style="height: 19px;">Blog Style Layout</div>
                                             </li>
                                             <li data-row-index="28">
                                                <div class="gw-go-body-cell" style="height: 19px;">Compact Album</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="29">
                                                <div class="gw-go-body-cell" style="height: 19px;">Extended Album</div>
                                             </li>
                                             <li data-row-index="30">
                                                <div class="gw-go-body-cell" style="height: 19px;">Custom CSS</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="31">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li data-row-index="32">
                                                <div class="gw-go-body-cell" style="height: 22px;">LIGHTBOXES</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="33">
                                                <div class="gw-go-body-cell" style="height: 19px;">Lightcase</div>
                                             </li>
                                             <li data-row-index="34">
                                                <div class="gw-go-body-cell" style="height: 19px;">Fancy Box</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="35">
                                                <div class="gw-go-body-cell" style="height: 19px;">Color Box</div>
                                             </li>
                                             <li data-row-index="36">
                                                <div class="gw-go-body-cell" style="height: 19px;">Foo Box</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="37">
                                                <div class="gw-go-body-cell" style="height: 19px;">Nivo Lightbox</div>
                                             </li>
                                             <li data-row-index="38">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="39">
                                                <div class="gw-go-body-cell" style="height: 22px;">GENERAL SETTINGS</div>
                                             </li>
                                             <li data-row-index="40">
                                                <div class="gw-go-body-cell" style="height: 19px;">Global Options</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="41">
                                                <div class="gw-go-body-cell" style="height: 19px;">Lazy Load Settings</div>
                                             </li>
                                             <li data-row-index="42">
                                                <div class="gw-go-body-cell" style="height: 19px;">Filters Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="43">
                                                <div class="gw-go-body-cell" style="height: 19px;">Order By Settings</div>
                                             </li>
                                             <li data-row-index="44">
                                                <div class="gw-go-body-cell" style="height: 19px;">Search Box Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="45">
                                                <div class="gw-go-body-cell" style="height: 19px;">Page Navigation</div>
                                             </li>
                                             <li data-row-index="46">
                                                <div class="gw-go-body-cell" style="height: 19px;">Watermark Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="47">
                                                <div class="gw-go-body-cell" style="height: 19px;">Advertisement</div>
                                             </li>
                                             <li data-row-index="48">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="49">
                                                <div class="gw-go-body-cell" style="height: 22px;">MAIN FEATURES</div>
                                             </li>
                                             <li data-row-index="50">
                                                <div class="gw-go-body-cell" style="height: 19px;">Shortcode Wizard</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="51">
                                                <div class="gw-go-body-cell" style="height: 19px;">Unlimited Galleries and Images</div>
                                             </li>
                                             <li data-row-index="52">
                                                <div class="gw-go-body-cell" style="height: 19px;">Social Sharing</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="53">
                                                <div class="gw-go-body-cell" style="height: 19px;">Duplicate Gallery</div>
                                             </li>
                                             <li data-row-index="54">
                                                <div class="gw-go-body-cell" style="height: 19px;">Duplicate Albums</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="55">
                                                <div class="gw-go-body-cell" style="height: 19px;">Filmstrip Gallery</div>
                                             </li>
                                             <li data-row-index="56">
                                                <div class="gw-go-body-cell" style="height: 19px;">Multiple Browser Compatible</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="57">
                                                <div class="gw-go-body-cell" style="height: 19px;">Supports Media Manager</div>
                                             </li>
                                             <li data-row-index="58">
                                                <div class="gw-go-body-cell" style="height: 19px;">Copy Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="59">
                                                <div class="gw-go-body-cell" style="height: 19px;">Move Images</div>
                                             </li>
                                             <li data-row-index="60">
                                                <div class="gw-go-body-cell" style="height: 19px;">Rotate Clockwise</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="61">
                                                <div class="gw-go-body-cell" style="height: 19px;">Rotate Anti-Clockwise</div>
                                             </li>
                                             <li data-row-index="62">
                                                <div class="gw-go-body-cell" style="height: 19px;">Flip Images Vertically</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="63">
                                                <div class="gw-go-body-cell" style="height: 19px;">Flip Images Horizontally</div>
                                             </li>
                                             <li data-row-index="64">
                                                <div class="gw-go-body-cell" style="height: 19px;">Restore Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="65">
                                                <div class="gw-go-body-cell" style="height: 19px;">Cropping Images</div>
                                             </li>
                                             <li data-row-index="66">
                                                <div class="gw-go-body-cell" style="height: 19px;">Editing Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="67">
                                                <div class="gw-go-body-cell" style="height: 19px;">Saturation Images</div>
                                             </li>
                                             <li data-row-index="68">
                                                <div class="gw-go-body-cell" style="height: 19px;">Hover Effects</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="69">
                                                <div class="gw-go-body-cell" style="height: 19px;">Animation Effects</div>
                                             </li>
                                             <li data-row-index="70">
                                                <div class="gw-go-body-cell" style="height: 19px;">Special Effects</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="71">
                                                <div class="gw-go-body-cell" style="height: 19px;">Purge Galleries</div>
                                             </li>
                                             <li data-row-index="72">
                                                <div class="gw-go-body-cell" style="height: 19px;">SEO Friendly</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="73">
                                                <div class="gw-go-body-cell" style="height: 19px;">Title &amp; Description</div>
                                             </li>
                                             <li data-row-index="74">
                                                <div class="gw-go-body-cell" style="height: 19px;">Font Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="75">
                                                <div class="gw-go-body-cell" style="height: 19px;">Border Settings</div>
                                             </li>
                                             <li data-row-index="76">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="77">
                                                <div class="gw-go-body-cell" style="height: 22px;">OTHER SETTINGS</div>
                                             </li>
                                             <li data-row-index="78">
                                                <div class="gw-go-body-cell" style="height: 19px;">Feature Requests</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="79">
                                                <div class="gw-go-body-cell" style="height: 19px;">Roles and Capabilities</div>
                                             </li>
                                             <li data-row-index="80">
                                                <div class="gw-go-body-cell" style="height: 19px;">Bulk Deletion of Records</div>
                                             </li>
                                          </ul>
                                          <div class="gw-go-footer-wrap">
                                             <div class="gw-go-footer-spacer"></div>
                                             <div class="gw-go-footer">
                                                <div class="gw-go-footer-rows">
                                                   <div class="gw-go-footer-row" data-row-index="0">
                                                      <div class="gw-go-footer-row-inner" style="height: 44px;"><a href="http://www.thewpgeeks.com/product/business-edition/" class="gw-go-btn gw-go-btn-large"><span class="gw-go-btn-inner">BUY NOW</span></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="gw-go-tooltip"></div>
                                    </div>
                                 </div>
                                 <div class="gw-go-col-wrap gw-go-col-wrap-2 gw-go-hover gw-go-disable-enlarge gw-go-disable-hover" data-current="1" data-col-index="2" style="max-width: 409px; height: 3385px;">
                                    <div class="gw-go-col gw-go-clean-style5">
                                       <div class="gw-go-col-inner">
                                          <div class="gw-go-col-inner-layer"></div>
                                          <div class="gw-go-col-inner-layer-over"></div>
                                          <div class="gw-go-header gw-go-header-standard">
                                             <div class="gw-go-header-top">
                                                <h3>DEVELOPER</h3></div>
                                             <div class="gw-go-header-bottom">
                                                <div class="gw-go-price-wrap"><span data-id="price" data-currency="{&quot;currency&quot;:&quot;USD&quot;,&quot;position&quot;:&quot;left&quot;,&quot;thousand-sep&quot;:&quot;,&quot;,&quot;decimal-sep&quot;:&quot;.&quot;,&quot;decimal-no&quot;:2}" data-price="146"><span data-id="currency">$</span><span data-id="amount">146</span></span><small>One Time Purchase</small></div>
                                             </div>
                                          </div>
                                          <ul class="gw-go-body">
                                             <li data-row-index="0">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="1">
                                                <div class="gw-go-body-cell" style="height: 22px;">PRO SUPPORT</div>
                                             </li>
                                             <li data-row-index="2">
                                                <div class="gw-go-body-cell" style="height: 19px;">5 Installations per License</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="3">
                                                <div class="gw-go-body-cell" style="height: 19px;">6 months of Technical Support</div>
                                             </li>
                                             <li data-row-index="4">
                                                <div class="gw-go-body-cell" style="height: 19px;">Life Time Free Updates</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="5">
                                                <div class="gw-go-body-cell" style="height: 19px;">Automatic Plugin Updates</div>
                                             </li>
                                             <li data-row-index="6">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="7">
                                                <div class="gw-go-body-cell" style="height: 22px;">GALLERIES</div>
                                             </li>
                                             <li data-row-index="8">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Galleries</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="9">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Gallery</div>
                                             </li>
                                             <li data-row-index="10">
                                                <div class="gw-go-body-cell" style="height: 19px;">Sort Galleries</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="11">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li data-row-index="12">
                                                <div class="gw-go-body-cell" style="height: 22px;">ALBUMS</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="13">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Albums</div>
                                             </li>
                                             <li data-row-index="14">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Album</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="15">
                                                <div class="gw-go-body-cell" style="height: 19px;">Sort Albums</div>
                                             </li>
                                             <li data-row-index="16">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="17">
                                                <div class="gw-go-body-cell" style="height: 22px;">TAGS</div>
                                             </li>
                                             <li data-row-index="18">
                                                <div class="gw-go-body-cell" style="height: 19px;">Manage Tags</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="19">
                                                <div class="gw-go-body-cell" style="height: 19px;">Add Tag</div>
                                             </li>
                                             <li data-row-index="20">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="21">
                                                <div class="gw-go-body-cell" style="height: 22px;">LAYOUT SETTINGS</div>
                                             </li>
                                             <li data-row-index="22">
                                                <div class="gw-go-body-cell" style="height: 19px;">Thumbnail Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="23">
                                                <div class="gw-go-body-cell" style="height: 19px;">Masonry Layout</div>
                                             </li>
                                             <li data-row-index="24">
                                                <div class="gw-go-body-cell" style="height: 19px;">Slideshow Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="25">
                                                <div class="gw-go-body-cell" style="height: 19px;">Image Browser Layout</div>
                                             </li>
                                             <li data-row-index="26">
                                                <div class="gw-go-body-cell" style="height: 19px;">Justified Grid Layout</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="27">
                                                <div class="gw-go-body-cell" style="height: 19px;">Blog Style Layout</div>
                                             </li>
                                             <li data-row-index="28">
                                                <div class="gw-go-body-cell" style="height: 19px;">Compact Album</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="29">
                                                <div class="gw-go-body-cell" style="height: 19px;">Extended Album</div>
                                             </li>
                                             <li data-row-index="30">
                                                <div class="gw-go-body-cell" style="height: 19px;">Custom CSS</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="31">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li data-row-index="32">
                                                <div class="gw-go-body-cell" style="height: 22px;">LIGHTBOXES</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="33">
                                                <div class="gw-go-body-cell" style="height: 19px;">Lightcase</div>
                                             </li>
                                             <li data-row-index="34">
                                                <div class="gw-go-body-cell" style="height: 19px;">Fancy Box</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="35">
                                                <div class="gw-go-body-cell" style="height: 19px;">Color Box</div>
                                             </li>
                                             <li data-row-index="36">
                                                <div class="gw-go-body-cell" style="height: 19px;">Foo Box</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="37">
                                                <div class="gw-go-body-cell" style="height: 19px;">Nivo Lightbox</div>
                                             </li>
                                             <li data-row-index="38">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="39">
                                                <div class="gw-go-body-cell" style="height: 22px;">GENERAL SETTINGS</div>
                                             </li>
                                             <li data-row-index="40">
                                                <div class="gw-go-body-cell" style="height: 19px;">Global Options</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="41">
                                                <div class="gw-go-body-cell" style="height: 19px;">Lazy Load Settings</div>
                                             </li>
                                             <li data-row-index="42">
                                                <div class="gw-go-body-cell" style="height: 19px;">Filters Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="43">
                                                <div class="gw-go-body-cell" style="height: 19px;">Order By Settings</div>
                                             </li>
                                             <li data-row-index="44">
                                                <div class="gw-go-body-cell" style="height: 19px;">Search Box Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="45">
                                                <div class="gw-go-body-cell" style="height: 19px;">Page Navigation</div>
                                             </li>
                                             <li data-row-index="46">
                                                <div class="gw-go-body-cell" style="height: 19px;">Watermark Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="47">
                                                <div class="gw-go-body-cell" style="height: 19px;">Advertisement</div>
                                             </li>
                                             <li data-row-index="48">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="49">
                                                <div class="gw-go-body-cell" style="height: 22px;">MAIN FEATURES</div>
                                             </li>
                                             <li data-row-index="50">
                                                <div class="gw-go-body-cell" style="height: 19px;">Shortcode Wizard</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="51">
                                                <div class="gw-go-body-cell" style="height: 19px;">Unlimited Galleries and Images</div>
                                             </li>
                                             <li data-row-index="52">
                                                <div class="gw-go-body-cell" style="height: 19px;">Social Sharing</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="53">
                                                <div class="gw-go-body-cell" style="height: 19px;">Duplicate Gallery</div>
                                             </li>
                                             <li data-row-index="54">
                                                <div class="gw-go-body-cell" style="height: 19px;">Duplicate Albums</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="55">
                                                <div class="gw-go-body-cell" style="height: 19px;">Filmstrip Gallery</div>
                                             </li>
                                             <li data-row-index="56">
                                                <div class="gw-go-body-cell" style="height: 19px;">Multiple Browser Compatible</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="57">
                                                <div class="gw-go-body-cell" style="height: 19px;">Supports Media Manager</div>
                                             </li>
                                             <li data-row-index="58">
                                                <div class="gw-go-body-cell" style="height: 19px;">Copy Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="59">
                                                <div class="gw-go-body-cell" style="height: 19px;">Move Images</div>
                                             </li>
                                             <li data-row-index="60">
                                                <div class="gw-go-body-cell" style="height: 19px;">Rotate Clockwise</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="61">
                                                <div class="gw-go-body-cell" style="height: 19px;">Rotate Anti-Clockwise</div>
                                             </li>
                                             <li data-row-index="62">
                                                <div class="gw-go-body-cell" style="height: 19px;">Flip Images Vertically</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="63">
                                                <div class="gw-go-body-cell" style="height: 19px;">Flip Images Horizontally</div>
                                             </li>
                                             <li data-row-index="64">
                                                <div class="gw-go-body-cell" style="height: 19px;">Restore Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="65">
                                                <div class="gw-go-body-cell" style="height: 19px;">Cropping Images</div>
                                             </li>
                                             <li data-row-index="66">
                                                <div class="gw-go-body-cell" style="height: 19px;">Editing Images</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="67">
                                                <div class="gw-go-body-cell" style="height: 19px;">Saturation Images</div>
                                             </li>
                                             <li data-row-index="68">
                                                <div class="gw-go-body-cell" style="height: 19px;">Hover Effects</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="69">
                                                <div class="gw-go-body-cell" style="height: 19px;">Animation Effects</div>
                                             </li>
                                             <li data-row-index="70">
                                                <div class="gw-go-body-cell" style="height: 19px;">Special Effects</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="71">
                                                <div class="gw-go-body-cell" style="height: 19px;">Purge Galleries</div>
                                             </li>
                                             <li data-row-index="72">
                                                <div class="gw-go-body-cell" style="height: 19px;">SEO Friendly</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="73">
                                                <div class="gw-go-body-cell" style="height: 19px;">Title &amp; Description</div>
                                             </li>
                                             <li data-row-index="74">
                                                <div class="gw-go-body-cell" style="height: 19px;">Font Settings</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="75">
                                                <div class="gw-go-body-cell" style="height: 19px;">Border Settings</div>
                                             </li>
                                             <li data-row-index="76">
                                                <div class="gw-go-body-cell" style="height: 0px;"></div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="77">
                                                <div class="gw-go-body-cell" style="height: 22px;">OTHER SETTINGS</div>
                                             </li>
                                             <li data-row-index="78">
                                                <div class="gw-go-body-cell" style="height: 19px;">Feature Requests</div>
                                             </li>
                                             <li class="gw-go-even" data-row-index="79">
                                                <div class="gw-go-body-cell" style="height: 19px;">Roles and Capabilities</div>
                                             </li>
                                             <li data-row-index="80">
                                                <div class="gw-go-body-cell" style="height: 19px;">Bulk Deletion of Records</div>
                                             </li>
                                          </ul>
                                          <div class="gw-go-footer-wrap">
                                             <div class="gw-go-footer-spacer"></div>
                                             <div class="gw-go-footer">
                                                <div class="gw-go-footer-rows">
                                                   <div class="gw-go-footer-row" data-row-index="0">
                                                      <div class="gw-go-footer-row-inner" style="height: 44px;"><a href="http://www.thewpgeeks.com/product/developer-edition/" class="gw-go-btn gw-go-btn-large"><span class="gw-go-btn-inner">BUY NOW</span></a></div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
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
   }
}