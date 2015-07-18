<?php
/**
 * Created by jacky.
 * User: jacky
 * Date: 7/18/2015
 * Time: 11:08 AM
 */

$listViewDefs['Caro_ExportTemplates'] = array(
    'NAME' => array(
        'width' => '20',
        'label' => 'LBL_NAME',
        'link' => true,
        'default' => true
    ),
    'APPLY_MODULE' => array(
        'width' => '20',
        'label' => 'LBL_APPLY_MODULE',
        'link' => false,
        'default' => true
    ),
    'STATUS' => array(
        'width' => '15%',
        'label' => 'LBL_STATUS',
        'link' => false,
        'sortable' => false,
        'default' => true
    ),
    'WEIGHT' => array(
        'width' => '15%',
        'label' => 'LBL_ORDER',
        'link' => false,
        'sortable' => false,
        'default' => true
    ),
    'DATE_MODIFIED' => array(
        'width' => '10',
        'default' => true,
        'label' => 'LBL_DATE_MODIFIED'
    ),
    'DATE_ENTERED' => array(
        'width' => '10',
        'label' => 'LBL_DATE_ENTERED',
        'default' => true
    ),
);