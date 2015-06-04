<?php
$module_name = 'UA_Products';
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
                'LBL_DETAILVIEW_PANEL2' => array(
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_DETAILVIEW_PANEL3' => array(
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
            ),
        ),
        'panels' => array(
            'default' => array(
                array(
                    array(
                        'name' => 'product_code',
                        'label' => 'LBL_PRODUCT_CODE',
                    ),
                    'assigned_user_name',
                ),
                array(
                    'name',
                    array(
                        'name' => 'product_category',
                        'label' => 'LBL_PRODUCT_CATEGORY',
                    ),
                ),
                array(
                    array(
                        'name' => 'product_status',
                        'studio' => 'visible',
                        'label' => 'LBL_PRODUCT_STATUS',
                    ),
                    array(
                        'name' => 'manufacturer',
                        'label' => 'LBL_MANUFACTURER',
                    ),
                ),
                array(
                    'product_image',
                    ''
                ),
            ),
            'lbl_detailview_panel1' => array(
                array(
                    array(
                        'name' => 'cost',
                        'label' => 'LBL_COST',
                    ),
                    array(
                        'name' => 'tax',
                        'studio' => 'visible',
                        'label' => 'LBL_TAX',
                    ),
                ),
                array(
                    array(
                        'name' => 'unit_price',
                        'label' => 'LBL_UNIT_PRICE',
                    ),
                    array(
                        'name' => 'commission_rate',
                        'label' => 'LBL_COMMISSION_RATE',
                    ),
                ),
                array(
                    array(
                        'name' => 'taxable',
                        'label' => 'LBL_TAXABLE',
                    ),
                ),
            ),
            'lbl_detailview_panel2' => array(
                array(
                    array(
                        'name' => 'qty_in_stock',
                        'label' => 'LBL_QTY_IN_STOCK',
                    ),
                    array(
                        'name' => 'usage_unit',
                        'studio' => 'visible',
                        'label' => 'LBL_USAGE_UNIT',
                    ),
                ),
            ),
            'lbl_detailview_panel3' => array(
                array(
                    'date_modified',
                    'date_entered',
                ),
                array(
                    'description',
                ),
            ),
        ),
    ),
);