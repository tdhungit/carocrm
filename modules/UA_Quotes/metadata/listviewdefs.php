<?php
$module_name = 'UA_Quotes';
$listViewDefs [$module_name] =
    array(
        'NAME' =>
            array(
                'width' => '32%',
                'label' => 'LBL_NAME',
                'default' => true,
                'link' => true,
            ),
        'QUOTE_NUMBER' =>
            array(
                'type' => 'varchar',
                'label' => 'LBL_QUOTE_NUMBER',
                'width' => '10%',
                'default' => true,
            ),
        'QUOTE_STAGE' =>
            array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'label' => 'LBL_QUOTE_STAGE',
                'width' => '10%',
            ),
        'VALID_UNTIL' =>
            array(
                'type' => 'date',
                'label' => 'LBL_VALID_UNTIL',
                'width' => '10%',
                'default' => true,
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
