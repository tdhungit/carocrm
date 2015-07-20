<?php
/**
 * Created by jacky.
 * User: jacky
 * Date: 7/20/2015
 * Time: 11:35 AM
 */

class Caro_ExportTemplatesController extends SugarController
{
    public function action_UploadTemplate()
    {
        include 'include/third_party/UploadHandler.php';
        $upload_handler = new UploadHandler(null, true, null, 'cache/csv/');
    }
}