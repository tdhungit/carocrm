<?php
$module_name = 'UA_ProductCategories';
$listViewDefs [$module_name] =
    array(
        'NAME' =>
            array(
                'width' => '32%',
                'label' => 'LBL_NAME',
                'default' => true,
                'link' => true,
            ),
        'DESCRIPTION' =>
            array(
                'type' => 'text',
                'label' => 'LBL_DESCRIPTION',
                'sortable' => false,
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
        'ASSIGNED_USER_NAME' =>
            array(
                'width' => '9%',
                'label' => 'LBL_ASSIGNED_TO_NAME',
                'module' => 'Employees',
                'id' => 'ASSIGNED_USER_ID',
                'default' => false,
            ),
    );
?>
