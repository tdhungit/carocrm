<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/25/14
 * Time: 3:14 PM
 */

$dictionary['ua_quotes_products'] = array(
    'table' => 'ua_quotes_products',
    'fields' => array(
        'id' => array(
            'name' => 'id',
            'type' => 'varchar',
            'len' => '36'
        ),
        'date_modified' => array(
            'name' => 'date_modified',
            'type' => 'datetime'
        ),
        'deleted' => array(
            'name' => 'deleted',
            'type' => 'bool',
            'len' => '1',
            'default' => '0',
            'required' => false
        ),
        'quote_id' => array(
            'name' => 'quote_id',
            'type' => 'varchar',
            'len' => '36',
        ),
        'product_id' => array(
            'name' => 'product_id',
            'type' => 'varchar',
            'len' => '36',
        ),
        'parent_id' => array(
            'name' => 'parent_id',
            'type' => 'varchar',
            'len' => '36',
        ),
        'product_type' => array(
            'name' => 'product_type',
            'type' => 'varchar',
            'len' => '200',
        ),
        'product_name' => array(
            'name' => 'product_name',
            'type' => 'varchar',
            'len' => '200',
        ),
        'qty' => array(
            'name' => 'qty',
            'type' => 'int',
            'len' => '10',
        ),
        'qty_in_stock' => array(
            'name' => 'qty_in_stock',
            'type' => 'int',
            'len' => '10',
        ),
        'unit_price' => array(
            'name' => 'unit_price',
            'type' => 'double',
            'len' => '12,2',
        ),
        'list_price' => array(
            'name' => 'list_price',
            'type' => 'double',
            'len' => '12,2',
        ),
        'discount' => array(
            'name' => 'discount',
            'type' => 'double',
            'len' => '2',
        ),
        'tax' => array(
            'name' => 'tax',
            'type' => 'int',
            'len' => '10',
        ),
        'net_total' => array(
            'name' => 'net_total',
            'type' => 'double',
            'len' => '12,2',
        ),
        'total' => array(
            'name' => 'total',
            'type' => 'double',
            'len' => '12,2',
        ),
        'rel_module' => array(
            'name' => 'rel_module',
            'type' => 'varchar',
            'len' => '200'
        )
    ),
    'indices' => array(
        array(
            'name' => 'idx_pk',
            'type' => 'primary',
            'fields' => array('id')
        ),
    ),
);