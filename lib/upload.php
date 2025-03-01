<?php
/**
 * This file is used for upload image from pluploader.
 *
 * @author   The WP Geeks
 * @package  photo-gallery-plus/lib
 * @version  1.0.0
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
      if ((isset($_REQUEST["param"]) ? esc_attr($_REQUEST["param"]) == "upload_gallery_pics" : "") && (isset($_REQUEST["_wp_nonce"]) ? wp_verify_nonce(esc_attr($_REQUEST["_wp_nonce"]), "upload_local_system_files_nonce") : "")) {
         /**
          * upload.php
          *
          * Copyright 2013, Moxiecode Systems AB
          * Released under GPL License.
          *
          * License: http://www.plupload.com/license
          * Contributing: http://www.plupload.com/contributing
          */
         // Make sure file is not cached (as it happens for example on iOS devices)
         header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
         header("Cache-Control: no-store, no-cache, must-revalidate");
         header("Cache-Control: post-check=0, pre-check=0", false);
         header("Pragma: no-cache");

         // 5 minutes execution time
         set_time_limit(5 * 60);

         // Settings
         $targetDir = PHOTO_GALLERY_PLUS_UPLOAD_DIR;
         $targetDirOriginal = PHOTO_GALLERY_PLUS_ORIGINAL_DIR;

         $cleanupTargetDir = true; // Remove old files
         $maxFileAge = 5 * 3600; // Temp file age in seconds
         // Create target dir
         if (!file_exists($targetDir)) {
            @mkdir($targetDir);
         }

         if (!file_exists($targetDirOriginal)) {
            @mkdir($targetDirOriginal);
         }
         // Get a file name
         if (isset($_REQUEST["name"])) {
            $fileName = esc_attr($_REQUEST["name"]);
         } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
         } else {
            $fileName = uniqid("file_");
         }
         $proper_filename = false;
         $fileTempPathOriginal = $targetDirOriginal . DIRECTORY_SEPARATOR . $fileName;
         $filetype_checks = wp_check_filetype_and_ext($fileTempPathOriginal, $fileName);

         $proper_filename = empty($filetype_checks["proper_filename"]) ? "" : $filetype_checks["proper_filename"];
         if ($proper_filename) {
            $fileName = $proper_filename;
         }
         $fileName = wp_unique_filename($targetDirOriginal, $fileName);

         $filePathOriginal = $targetDirOriginal . DIRECTORY_SEPARATOR . $fileName;

         $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
         // Chunking might be enabled
         $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
         $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

         // Remove old temp files
         if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
               die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
            if (!is_dir($targetDirOriginal) || !$dirOriginal = opendir($targetDirOriginal)) {
               die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
            while (($file = readdir($dirOriginal)) !== false) {
               $tmpfilePath = $targetDirOriginal . DIRECTORY_SEPARATOR . $file;

               // If temp file is current file proceed to the next
               if ($tmpfilePath == "{$filePathOriginal}.part") {
                  continue;
               }

               // Remove temp file if it is older than the max age and is not the current file
               if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                  @unlink($tmpfilePath);
               }
            }
            closedir($dirOriginal);

            while (($file = readdir($dir)) !== false) {
               $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

               // If temp file is current file proceed to the next
               if ($tmpfilePath == "{$filePath}.part") {
                  continue;
               }

               // Remove temp file if it is older than the max age and is not the current file
               if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                  @unlink($tmpfilePath);
               }
            }
            closedir($dir);
         }

         // Open temp file
         if (!$outOriginal = @fopen("{$filePathOriginal}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
         }
         if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
         }
         if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
               die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
               die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
         } else {
            if (!$in = @fopen("php://input", "rb")) {
               die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
         }

         while ($buff = fread($in, 4096)) {
            fwrite($outOriginal, $buff);
            fwrite($out, $buff);
         }

         fclose($out);
         fclose($outOriginal);
         fclose($in);

         // Check if file has been uploaded
         if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);
            rename("{$filePathOriginal}.part", $filePathOriginal);
         }

         // Return Success JSON-RPC response
         die('{"jsonrpc" : "2.0", "result" :  "' . $fileName . '", "id" : "id"}');
      }
   }
}