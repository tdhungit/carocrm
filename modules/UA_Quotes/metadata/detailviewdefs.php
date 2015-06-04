<?php
$module_name = 'UA_Quotes';
$viewdefs [$module_name] = array(
    'DetailView' => array(
        'templateMeta' => array(
            'form' => array(
                'closeFormBeforeCustomButtons' => true,
                'buttons' => array(
                    'EDIT',
                    'DELETE',
                    array('customCode' => '
                        <form action="index.php" method="get" name="FormExport" id="form">
                            <input type="hidden" name="module" value="UA_Quotes" />
                            <input type="hidden" name="record" value="{$fields.id.value}" />
                            <input type="hidden" name="action" value="Export" />
                            <input type="hidden" name="type" value="docx" />
                            <input type="hidden" name="to_pdf" value="true" />
                            <input title="{$APP.LBL_EXPORT}" accessKey="{$APP.LBL_EXPORT}" class="button" type="submit" name="button" value="{$APP.LBL_EXPORT}" />
                        </form>'
                    ),
                ),
                'footerTpl' => 'modules/UA_Quotes/tpls/DetailViewFooter.tpl',
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
                'LBL_DETAILVIEW_PANEL3' => array(
                    'newTab' => false,
                    'panelDefault' => 'expanded',
                ),
                'LBL_DETAILVIEW_PANEL4' => array(
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
                        'name' => 'opportunity_name',
                        'studio' => 'visible',
                        'label' => 'LBL_OPPORTUNITY_NAME',
                    ),
                ),
                array(
                    array(
                        'name' => 'quote_number',
                        'label' => 'LBL_QUOTE_NUMBER',
                    ),
                    array(
                        'name' => 'quote_stage',
                        'studio' => 'visible',
                        'label' => 'LBL_QUOTE_STAGE',
                    ),
                ),
                array(
                    array(
                        'name' => 'payment_terms',
                        'studio' => 'visible',
                        'label' => 'LBL_PAYMENT_TERMS',
                    ),
                    array(
                        'name' => 'valid_until',
                        'label' => 'LBL_VALID_UNTIL',
                    ),
                ),
                array(
                    array(
                        'name' => 'account_name',
                        'studio' => 'visible',
                        'label' => 'LBL_ACCOUNT_NAME',
                    ),
                    array(
                        'name' => 'contact_name',
                        'studio' => 'visible',
                        'label' => 'LBL_CONTACT_NAME',
                    ),
                ),
            ),
            'lbl_detailview_panel1' => array(
                array(
                    array(
                        'name' => 'billing_address',
                        'label' => 'LBL_BILLING_ADDRESS',
                    ),
                    array(
                        'name' => 'shipping_address',
                        'label' => 'LBL_SHIPPING_ADDRESS',
                    ),
                ),
                array(
                    array(
                        'name' => 'billing_address_state',
                        'label' => 'LBL_BILLING_ADDRESS_STATE',
                    ),
                    array(
                        'name' => 'shipping_address_state',
                        'label' => 'LBL_SHIPPING_ADDRESS_STATE',
                    ),
                ),
                array(
                    array(
                        'name' => 'billing_address_city',
                        'label' => 'LBL_BILLING_ADDRESS_CITY',
                    ),
                    array(
                        'name' => 'shipping_address_city',
                        'label' => 'LBL_SHIPPING_ADDRESS_CITY',
                    ),
                ),
                array(
                    array(
                        'name' => 'billing_address_postalcode',
                        'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
                    ),
                    array(
                        'name' => 'shipping_address_postalcode',
                        'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
                    ),
                ),
                array(
                    array(
                        'name' => 'billing_address_country',
                        'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
                    ),
                    array(
                        'name' => 'shipping_address_country',
                        'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
                    ),
                ),
            ),
            'lbl_detailview_panel3' => array(
                array(
                    array(
                        'name' => 'terms_and_conditions',
                        'studio' => 'visible',
                        'label' => 'LBL_TERMS_AND_CONDITIONS',
                    ),
                ),
            ),
            'lbl_detailview_panel4' => array(
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
