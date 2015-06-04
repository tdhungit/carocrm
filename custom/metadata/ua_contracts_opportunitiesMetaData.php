<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/28/14
 * Time: 10:32 AM
 */

$dictionary["ua_contracts_opportunities"] = array(
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' => array(
        'ua_contracts_opportunities' => array(
            'lhs_module' => 'UA_Contracts',
            'lhs_table' => 'ua_contracts',
            'lhs_key' => 'id',
            'rhs_module' => 'Opportunities',
            'rhs_table' => 'opportunities',
            'rhs_key' => 'id',
            'relationship_type' => 'many-to-many',
            'join_table' => 'ua_contracts_opportunities',
            'join_key_lhs' => 'contract_id',
            'join_key_rhs' => 'opportunity_id',
        ),
    ),
    'table' => 'ua_contracts_opportunities',
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
            'name' => 'opportunity_id',
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
                'opportunity_id',
            ),
        ),
    ),
);