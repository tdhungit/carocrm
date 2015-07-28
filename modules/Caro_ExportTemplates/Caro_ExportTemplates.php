<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 7/9/2015
 * Time: 4:15 PM
 */

class Caro_ExportTemplates extends Basic
{
    var $new_schema = true;
    var $module_dir = 'Caro_ExportTemplates';
    var $object_name = 'Caro_ExportTemplates';
    var $table_name = 'caro_exporttemplates';
    var $importable = false;
    var $disable_row_level_security = true;

    var $id;
    var $name;
    var $date_entered;
    var $date_modified;
    var $modified_user_id;
    var $modified_by_name;
    var $created_by;
    var $created_by_name;
    var $description;
    var $deleted;
    var $created_by_link;
    var $modified_user_link;
    var $assigned_user_id;
    var $assigned_user_name;
    var $assigned_user_link;
    var $file_template;
    var $apply_module;
    var $status;
    var $weight;

    public function Caro_ExportTemplates()
    {
        parent::Basic();
    }

    public function bean_implements($interface)
    {
        switch ($interface)
        {
            case 'ACL':
                return true;
        }
        return false;
    }
}