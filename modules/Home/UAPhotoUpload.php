<?php
/**
 * Created YouAddOn Team.
 * Website www.youaddon.com
 * User: jacky@youaddon.com
 * Mail: support@youaddon.com
 * Yahoo/Skype: youaddon
 * Date: 11/20/13
 * Time: 4:47 PM
 * File SugarFieldUa_photo.php.
 */

//global $sugar_config;
//define('UA_UPLOAD_PHOTO_DIR', $sugar_config['upload_dir']);
define('UA_UPLOAD_PHOTO_DIR', 'cache/images/');

include 'include/third_party/UploadHandler.php';
$upload_handler = new UploadHandler(null, true, null, UA_UPLOAD_PHOTO_DIR);