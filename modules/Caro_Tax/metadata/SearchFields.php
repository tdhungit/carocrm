<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 7/30/2015
 * Time: 11:50 AM
 * Project: carocrm
 * File: SearchFields.php
 */

$searchFields['Caro_Tax'] = array(
    'name' => array(
        'query_type' => 'default'
    ),

    'status' => array(
        'query_type' => 'default',
        'operator' => '=',
        'options' => 'tax_status_list',
        'template_var' => 'STATUS_OPTIONS'
    ),

    'percent' => array(
        'query_type' => 'default'
    ),

);