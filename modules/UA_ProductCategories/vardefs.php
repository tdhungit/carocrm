<?php

$dictionary['UA_ProductCategories'] = array(
    'table' => 'ua_productcategories',
    'audited' => true,
    'duplicate_merge' => true,
    'fields' => array(
        'list_order' => array(
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
        'parent_id' => array(
            'name' => 'parent_id',
            'vname' => 'LBL_PARENT_NAME',
            'type' => 'id',
            'comment' => 'Parent category of this item; used for multi-tiered categorization',
            'reportable' => true
        ),
        'parent_name' => array(
            'name' => 'parent_name',
            'vname' => 'LBL_PARENT_NAME',
            'type' => 'relate',
            'source' => 'non-db',
            'id_name' => 'parent_id',
            'ext2' => 'UA_ProductCategories',
            'module' => 'UA_ProductCategories',
            'rname' => 'name',
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

VardefManager::createVardef('UA_ProductCategories', 'UA_ProductCategories', array(
    'basic',
    'assignable'
));
