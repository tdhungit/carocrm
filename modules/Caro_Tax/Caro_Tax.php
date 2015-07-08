<?php

/**
 * Created by Carobiz.
 * User: Jacky
 * Date: 6/29/2015
 * Time: 4:48 PM
 */
class Caro_Tax extends Basic
{
    var $new_schema = true;
    var $module_dir = 'Caro_Tax';
    var $object_name = 'Caro_Tax';
    var $table_name = 'caro_tax';
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
    var $status;
    var $percent;
    var $order;

    public function Caro_Tax()
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