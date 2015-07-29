<?php
/**
 * Created by jacky.
 * User: jacky
 * Date: 7/20/2015
 * Time: 11:35 AM
 */

/**
 * Class Caro_ExportTemplatesController
 * @property Caro_ExportTemplates $bean
 */
class Caro_ExportTemplatesController extends SugarController
{
    public function action_UploadTemplate()
    {
        include 'include/third_party/UploadHandler.php';
        $upload_handler = new UploadHandler(null, true, null, 'cache/csv/');
    }

    public function action_ListTemplates()
    {
        $query = "
            SELECT * FROM caro_exporttemplates
            WHERE
              deleted = 0
              AND apply_module = '". $_REQUEST['apply_module'] ."'
              AND status = 'Active'
        ";

        $result = $this->bean->db->query($query);

        echo '<ul style="margin:0;padding:0 0 0 17px;">';
        while ($row = $this->bean->db->fetchByAssoc($result)) {
            echo '<li style="margin:0;padding:5px 0;list-style-type:circle;"><a href="index.php?module='. $_REQUEST['apply_module'] .'&action=CaroExport&record='. $_REQUEST['record'] .'&template='. $row['id'] .'">'. $row['name'] .'</a></li>';
        }
        echo '</ul>';

        sugar_cleanup(true);
    }
}