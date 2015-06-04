<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/28/14
 * Time: 10:40 AM
 */

$dictionary["ua_contracts_products"] = array(
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => array(
        'ua_contracts_products' => array(
            'lhs_module' => 'UA_Contracts',
            'lhs_table' => 'ua_contracts',
            'lhs_key' => 'id',
            'rhs_module' => 'UA_Products',
            'rhs_table' => 'ua_products',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'ua_contracts_products',
            'join_key_lhs' => 'contract_id',
            'join_key_rhs' => 'product_id',
        ),
    ),
    'table' => 'ua_contracts_products',
    'fields' => array(
        array(
            'name' => 'id',
            'type' => 'varchar',
            'len' => 36,
        ),
        array(
            'name' => 'date_modified',
            'type' => 'datetime',
        ),
        array(
            'name' => 'deleted',
            'type' => 'bool',
            'len' => '1',
            'default' => '0',
            'required' => true,
        ),
        array(
            'name' => 'contract_id',
            'type' => 'varchar',
            'len' => 36,
        ),
        array(
            'name' => 'product_id',
            'type' => 'varchar',
            'len' => 36,
        ),
    ),
    'indices' => array(
        array(
            'name' => 'idx_pk',
            'type' => 'primary',
            'fields' => array('id'),
        ),
        array(
            'name' => 'idx_alt',
            'type' => 'alternate_key',
            'fields' => array(
                'contract_id',
                'product_id',
            ),
        ),
    ),
);