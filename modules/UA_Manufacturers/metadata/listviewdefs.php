<?php
$module_name = 'UA_Manufacturers';
$listViewDefs [$module_name] =
    array(
        'NAME' =>
            array(
                'width' => '32%',
                'label' => 'LBL_NAME',
                'default' => true,
                'link' => true,
            ),
        'STATUS' =>
            array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'label' => 'LBL_STATUS',
                'width' => '10%',
            ),
        'LIST_ORDER' =>
            array(
                'type' => 'int',
                'default' => true,
                'label' => 'LBL_LIST_ORDER',
                'width' => '10%',
            ),
        'ASSIGNED_USER_NAME' =>
            array(
                'width' => '9%',
                'label' => 'LBL_ASSIGNED_TO_NAME',
                'module' => 'Employees',
                'id' => 'ASSIGNED_USER_ID',
                'default' => true,
            ),
    );
?>
