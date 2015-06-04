<?php
$popupMeta = array(
    'moduleMain' => 'UA_ProductCategories',
    'varName' => 'UA_ProductCategories',
    'orderBy' => 'ua_productcategories.name',
    'whereClauses' => array(
        'name' => 'ua_productcategories.name',
    ),
    'searchInputs' => array(
        0 => 'ua_productcategories_number',
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
        'CREATED_BY_NAME' =>
            array(
                'type' => 'relate',
                'link' => true,
                'label' => 'LBL_CREATED',
                'id' => 'CREATED_BY',
                'width' => '10%',
                'default' => true,
            ),
    ),
);
