<?php
$module_name = 'UA_Contracts';
$viewdefs [$module_name] = array(
    'DetailView' => array(
        'templateMeta' => array(
            'form' => array(
                'buttons' => array(
                    0 => 'EDIT',
                    1 => 'DUPLICATE',
                    2 => 'DELETE',
                    3 => 'FIND_DUPLICATES',
                ),
            ),
            'maxColumns' => '2',
            'widths' => array(
                array(
                    'label' => '10',
                    'field' => '30',
                ),
                array(
                    'label' => '10',
                    'field' => '30',
                ),
            ),
            'useTabs' => false,
            'tabDefs' => array(
                'DEFAULT' => array(
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_DETAILVIEW_PANEL1' => array(
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
        ),
        'panels' => array(
            'default' => array(
                array(
                    'name',
                    array(
                        'name' => 'status',
                        'studio' => 'visible',
                        'label' => 'LBL_STATUS',
                    ),
                ),
                array(
                    array(
                        'name' => 'reference_code',
                        'label' => 'LBL_REFERENCE_CODE',
                    ),
                    array(
                        'name' => 'start_date',
                        'label' => 'LBL_START_DATE',
                    ),
                ),
                array(
                    array(
                        'name' => 'account_name',
                        'studio' => 'visible',
                        'label' => 'LBL_ACCOUNT_NAME',
                    ),
                    array(
                        'name' => 'end_date',
                        'label' => 'LBL_END_DATE',
                    ),
                ),
                array(
                    array(
                        'name' => 'opportunity_name',
                        'studio' => 'visible',
                        'label' => 'LBL_OPPORTUNITY_NAME',
                    ),
                    array(
                        'name' => 'customer_signed_date',
                        'label' => 'LBL_CUSTOMER_SIGNED_DATE',
                    ),
                ),
                array(
                    array(
                        'name' => 'contract_value',
                        'label' => 'LBL_CONTRACT_VALUE',
                    ),
                    array(
                        'name' => 'company_signed_date',
                        'label' => 'LBL_COMPANY_SIGNED_DATE',
                    ),
                ),
                array(
                    array(
                        'name' => 'expiration_notice',
                        'label' => 'LBL_EXPIRATION_NOTICE',
                    ),
                    array(
                        'name' => 'type',
                        'studio' => 'visible',
                        'label' => 'LBL_TYPE',
                    ),
                ),
            ),
            'lbl_detailview_panel1' =>
                array(
                    array(
                        'date_entered',
                        'date_modified',
                    ),
                    array(
                        'assigned_user_name',
                    ),
                    array(
                        'description',
                    ),
                ),
        ),
    ),
);
