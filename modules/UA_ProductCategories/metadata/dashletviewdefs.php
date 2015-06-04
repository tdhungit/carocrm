<?php
$dashletData['UA_ProductCategoriesDashlet']['searchFields'] = array(
    'date_entered' =>
        array(
            'default' => '',
        ),
    'date_modified' =>
        array(
            'default' => '',
        ),
    'assigned_user_id' =>
        array(
            'type' => 'assigned_user_name',
            'default' => 'Administrator',
        ),
);
$dashletData['UA_ProductCategoriesDashlet']['columns'] = array(
    'name' =>
        array(
            'width' => '40%',
            'label' => 'LBL_LIST_NAME',
            'link' => true,
            'default' => true,
            'name' => 'name',
        ),
    'list_order' =>
        array(
            'type' => 'int',
            'default' => true,
            'label' => 'LBL_LIST_ORDER',
            'width' => '10%',
            'name' => 'list_order',
        ),
    'date_entered' =>
        array(
            'width' => '15%',
            'label' => 'LBL_DATE_ENTERED',
            'default' => true,
            'name' => 'date_entered',
        ),
    'date_modified' =>
        array(
            'width' => '15%',
            'label' => 'LBL_DATE_MODIFIED',
            'name' => 'date_modified',
            'default' => false,
        ),
    'created_by' =>
        array(
            'width' => '8%',
            'label' => 'LBL_CREATED',
            'name' => 'created_by',
            'default' => false,
        ),
    'assigned_user_name' =>
        array(
            'width' => '8%',
            'label' => 'LBL_LIST_ASSIGNED_USER',
            'name' => 'assigned_user_name',
            'default' => false,
        ),
);
