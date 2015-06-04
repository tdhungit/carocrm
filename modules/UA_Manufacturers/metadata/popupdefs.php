<?php
$popupMeta = array(
    'moduleMain' => 'UA_Manufacturers',
    'varName' => 'UA_Manufacturers',
    'orderBy' => 'ua_manufacturers.name',
    'whereClauses' => array(
        'name' => 'ua_manufacturers.name',
    ),
    'searchInputs' => array(
        0 => 'ua_manufacturers_number',
        1 => 'name',
        2 => 'priority',
        3 => 'status',
    ),
    'listviewdefs' => array(
        'NAME' =>
            array(
                'type' => 'name',
                'link' => true,
                'label' => 'LBL_NAME',
                'width' => '10%',
                'default' => true,
            ),
        'LIST_ORDER' =>
            array(
                'type' => 'int',
                'default' => true,
                'label' => 'LBL_LIST_ORDER',
                'width' => '10%',
            ),
        'STATUS' =>
            array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'label' => 'LBL_STATUS',
                'width' => '10%',
            ),
        'ASSIGNED_USER_NAME' =>
            array(
                'link' => true,
                'type' => 'relate',
                'label' => 'LBL_ASSIGNED_TO_NAME',
                'id' => 'ASSIGNED_USER_ID',
                'width' => '10%',
                'default' => true,
            ),
    ),
);
