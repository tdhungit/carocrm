<?php
$module_name = 'UA_Products';
$searchdefs [$module_name] =
    array(
        'layout' =>
            array(
                'basic_search' =>
                    array(
                        'product_code' =>
                            array(
                                'type' => 'varchar',
                                'label' => 'LBL_PRODUCT_CODE',
                                'width' => '10%',
                                'default' => true,
                                'name' => 'product_code',
                            ),
                        'name' =>
                            array(
                                'name' => 'name',
                                'default' => true,
                                'width' => '10%',
                            ),
                        'current_user_only' =>
                            array(
                                'name' => 'current_user_only',
                                'label' => 'LBL_CURRENT_USER_FILTER',
                                'type' => 'bool',
                                'default' => true,
                                'width' => '10%',
                            ),
                    ),
                'advanced_search' =>
                    array(
                        'product_code' =>
                            array(
                                'type' => 'varchar',
                                'label' => 'LBL_PRODUCT_CODE',
                                'width' => '10%',
                                'default' => true,
                                'name' => 'product_code',
                            ),
                        'name' =>
                            array(
                                'name' => 'name',
                                'default' => true,
                                'width' => '10%',
                            ),
                        'product_status' =>
                            array(
                                'type' => 'enum',
                                'default' => true,
                                'studio' => 'visible',
                                'label' => 'LBL_PRODUCT_STATUS',
                                'width' => '10%',
                                'name' => 'product_status',
                            ),
                        'product_category' =>
                            array(
                                'type' => 'enum',
                                'label' => 'LBL_PRODUCT_CATEGORY',
                                'width' => '10%',
                                'default' => true,
                                'name' => 'product_category',
                                'function' =>
                                    array(
                                        'name' => 'get_product_categories_array',
                                        'params' => array(false)
                                    )
                            ),
                        'manufacturer' =>
                            array(
                                'type' => 'enum',
                                'label' => 'LBL_MANUFACTURER',
                                'width' => '10%',
                                'default' => true,
                                'name' => 'manufacturer',
                                'function' =>
                                    array(
                                        'name' => 'get_manufactures_array',
                                        'params' => array(false)
                                    )
                            ),
                        'assigned_user_id' =>
                            array(
                                'name' => 'assigned_user_id',
                                'label' => 'LBL_ASSIGNED_TO',
                                'type' => 'enum',
                                'function' =>
                                    array(
                                        'name' => 'get_user_array',
                                        'params' =>
                                            array(
                                                0 => false,
                                            ),
                                    ),
                                'default' => true,
                                'width' => '10%',
                            ),
                    ),
            ),
        'templateMeta' =>
            array(
                'maxColumns' => '3',
                'maxColumnsBasic' => '4',
                'widths' =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
            ),
    );
?>
