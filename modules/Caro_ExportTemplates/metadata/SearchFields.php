<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 7/30/2015
 * Time: 11:41 AM
 * Project: carocrm
 * File: SearchFields.php
 */

$searchFields['Caro_ExportTemplates'] = array(
    'name' => array(
        'query_type' => 'default'
    ),

    'status' => array(
        'query_type' => 'default',
        'operator' => '=',
        'options' => 'exporttemplate_status_list',
        'template_var' => 'STATUS_OPTIONS'
    ),

    'apply_module' => array(
        'query_type' => 'default',
        'operator' => '=',
        'options' => 'export_apply_module_list',
        'template_var' => 'APPLY_MODULE_OPTIONS'
    ),


);