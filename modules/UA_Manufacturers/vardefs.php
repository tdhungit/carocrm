<?php

$dictionary['UA_Manufacturers'] = array(
    'table' => 'ua_manufacturers',
    'audited' => true,
    'duplicate_merge' => true,
    'fields' => array(
        'list_order' =>
            array(
                'required' => false,
                'name' => 'list_order',
                'vname' => 'LBL_LIST_ORDER',
                'type' => 'int',
                'massupdate' => 0,
                'default' => '0',
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'len' => '255',
                'size' => '20',
                'enable_range_search' => false,
                'disable_num_format' => '',
                'min' => false,
                'max' => false,
            ),
        'status' =>
            array(
                'required' => false,
                'name' => 'status',
                'vname' => 'LBL_STATUS',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'Active',
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'len' => 100,
                'size' => '20',
                'options' => 'manufacturer_status_dom',
                'studio' => 'visible',
                'dependency' => false,
            ),
    ),
    'relationships' => array(),
    'optimistic_locking' => true,
    'unified_search' => true,
);

if (!class_exists('VardefManager'))
{
    require_once('include/SugarObjects/VardefManager.php');
}

VardefManager::createVardef('UA_Manufacturers', 'UA_Manufacturers', array(
    'basic',
    'assignable'
));
