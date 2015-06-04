<?php
$module_name = 'UA_Manufacturers';
$viewdefs [$module_name] = array(
    'DetailView' => array(
        'templateMeta' => array(
            'form' => array(
                'buttons' => array(
                    'EDIT',
                    'DUPLICATE',
                    'DELETE',
                    'FIND_DUPLICATES',
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
            ),
        ),
        'panels' => array(
            'default' => array(
                array(
                    'name',
                    'assigned_user_name',
                ),
                array(
                    array(
                        'name' => 'status',
                        'studio' => 'visible',
                        'label' => 'LBL_STATUS',
                    ),
                    array(
                        'name' => 'list_order',
                        'label' => 'LBL_LIST_ORDER',
                    ),
                ),
                array(
                    'date_entered',
                    'date_modified',
                ),
                array(
                    'description',
                ),
            ),
        ),
    ),
);