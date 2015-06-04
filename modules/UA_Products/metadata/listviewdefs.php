<?php
$module_name = 'UA_Products';
$listViewDefs [$module_name] =
    array(
        'PRODUCT_IMAGE' =>
            array(
                'type' => 'ua_photo',
                'label' => 'LBL_PRODUCT_IMAGE',
                'width' => '10%',
                'default' => true,
            ),
        'PRODUCT_CODE' =>
            array(
                'type' => 'varchar',
                'label' => 'LBL_PRODUCT_CODE',
                'width' => '10%',
                'default' => true,
            ),
        'NAME' =>
            array(
                'width' => '32%',
                'label' => 'LBL_NAME',
                'default' => true,
                'link' => true,
            ),
        'PRODUCT_CATEGORY' =>
            array(
                'type' => 'varchar',
                'label' => 'LBL_PRODUCT_CATEGORY',
                'width' => '10%',
                'default' => true,
            ),
        'PRODUCT_STATUS' =>
            array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'label' => 'LBL_PRODUCT_STATUS',
                'width' => '10%',
            ),
        'COST' =>
            array(
                'type' => 'currency',
                'label' => 'LBL_COST',
                'currency_format' => true,
                'width' => '10%',
                'default' => true,
            ),
        'UNIT_PRICE' =>
            array(
                'type' => 'currency',
                'label' => 'LBL_UNIT_PRICE',
                'currency_format' => true,
                'width' => '10%',
                'default' => true,
            ),
        'USAGE_UNIT' =>
            array(
                'type' => 'enum',
                'default' => true,
                'studio' => 'visible',
                'label' => 'LBL_USAGE_UNIT',
                'width' => '10%',
            ),
        'QTY_IN_STOCK' =>
            array(
                'type' => 'int',
                'label' => 'LBL_QTY_IN_STOCK',
                'width' => '10%',
                'default' => true,
            ),
    );
?>
