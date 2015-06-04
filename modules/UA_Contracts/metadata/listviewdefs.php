<?php
$module_name = 'UA_Contracts';
$listViewDefs [$module_name] =
    array(
        'NAME' =>
            array(
                'width' => '32%',
                'label' => 'LBL_NAME',
                'default' => true,
                'link' => true,
            ),
        'REFERENCE_CODE' =>
            array(
                'type' => 'varchar',
                'label' => 'LBL_REFERENCE_CODE',
                'width' => '10%',
                'default' => true,
            ),
        'STATUS' =>
            array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'label' => 'LBL_STATUS',
                'width' => '10%',
            ),
        'ACCOUNT_NAME' =>
            array(
                'type' => 'relate',
                'studio' => 'visible',
                'label' => 'LBL_ACCOUNT_NAME',
                'id' => 'ACCOUNT_ID_C',
                'link' => true,
                'width' => '10%',
                'default' => true,
            ),
        'CONTRACT_VALUE' =>
            array(
                'type' => 'currency',
                'label' => 'LBL_CONTRACT_VALUE',
                'currency_format' => true,
                'width' => '10%',
                'default' => true,
            ),
        'CUSTOMER_SIGNED_DATE' =>
            array(
                'type' => 'date',
                'label' => 'LBL_CUSTOMER_SIGNED_DATE',
                'width' => '10%',
                'default' => true,
            ),
        'COMPANY_SIGNED_DATE' =>
            array(
                'type' => 'date',
                'label' => 'LBL_COMPANY_SIGNED_DATE',
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
