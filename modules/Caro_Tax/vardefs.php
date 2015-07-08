<?php
/**
 * Created by Carobiz.
 * User: Jacky
 * Date: 6/29/2015
 * Time: 4:33 PM
 */

$dictionary['Caro_Tax'] = array(
    'table' => 'caro_tax',
    'audited' => true,
    'duplicate_merge' => true,
    'fields' => array(
        'status' => array(
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
            'options' => 'tax_status_list',
            'default' => 'Active',
            'studio' => 'visible',
        ),
        'percent' => array(
            'name' => 'percent',
            'vname' => 'LBL_PERCENT',
            'type' => 'currency',
            'len' => 26,
            'precision' => 6,
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

VardefManager::createVardef('Caro_Tax', 'Caro_Tax', array(
    'basic',
    'assignable'
));