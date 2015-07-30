<?php
/**
 * Created by Jacky.
 * User: Jacky
 * Date: 7/30/2015
 * Time: 11:48 AM
 * Project: carocrm
 * File: searchdefs.php
 */

$searchdefs['Caro_Tax'] = array(
    'templateMeta' => array(
        'maxColumns' => '3',
        'maxColumnsBasic' => '4',
        'widths' => array('label' => '10', 'field' => '30'),
    ),
    'layout' => array(
        'basic_search' => array(
            'name',
            array(
                'name' => 'current_user_only',
                'label' => 'LBL_CURRENT_USER_FILTER',
                'type' => 'bool',
            ),
        ),
        'advanced_search' => array(
            'name',
            'percent',
            'status'
        )
    )
);