<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 7/9/2015
 * Time: 4:17 PM
 */

$dictionary['Caro_ExportTemplates'] = array(
    'table' => 'caro_exporttemplates',
    'audited' => true,
    'duplicate_merge' => true,
    'fields' => array(
        'file_template' => array(
            'name' => 'file_template',
            'vname' => 'LBL_FILE_TEMPLATE',
            'type' => 'varchar',
            'len' => 200,
            'studio' => 'visible',
        ),
        'apply_module' => array(
            'name' => 'apply_module',
            'vname' => 'LBL_APPLY_MODULE',
            'type' => 'varchar',
            'len' => 200,
            'studio' => 'visible',
        ),
        'status' => array(
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
            'options' => 'exporttemplate_status_list',
            'default' => 'Active',
            'studio' => 'visible',
        ),
        'weight' => array(
            'name' => 'weight',
            'vname' => 'LBL_ORDER',
            'type' => 'int',
            'len' => 11,
            'default' => 0,
            'studio' => 'visible',
        )
    ),
    'relationships' => array(),
    'optimistic_locking' => true,
    'unified_search' => true,
);

if (!class_exists('VardefManager'))
{
    require_once('include/SugarObjects/VardefManager.php');
}

VardefManager::createVardef('Caro_ExportTemplates', 'Caro_ExportTemplates', array(
    'basic',
    'assignable'
));