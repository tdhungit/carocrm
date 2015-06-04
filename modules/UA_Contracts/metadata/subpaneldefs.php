<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/28/14
 * Time: 10:47 AM
 */

$layout_defs['UA_Contracts'] = array(
    // sets up which panels to show, in which order, and with what linked_fields
    'subpanel_setup' => array(
        'ua_contract_documents' => array(
            'order' => 10,
            'module' => 'Documents',
            'sort_order' => 'asc',
            'sort_by' => 'document_name',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'function:get_contract_documents',
            'set_subpanel_data' => 'ua_contracts_documents',
            'title_key' => 'LBL_DOCUMENTS_SUBPANEL_TITLE',
            'fill_in_additional_fields' => true,
            'refresh_page' => 1,
        ),

        'activities' => array(
            'order' => 10,
            'sort_order' => 'desc',
            'sort_by' => 'date_start',
            'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
            'type' => 'collection',
            'subpanel_name' => 'history',
            //this values is not associated with a physical file.
            'module' => 'Activities',

            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopCreateTaskButton'),
                array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
                array('widget_class' => 'SubPanelTopScheduleCallButton'),
            ),
            'collection_list' => array(
                'meetings' => array(
                    'module' => 'Meetings',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'meetings',
                ),
                'tasks' => array(
                    'module' => 'Tasks',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'tasks',
                ),
                'calls' => array(
                    'module' => 'Calls',
                    'subpanel_name' => 'ForActivities',
                    'get_subpanel_data' => 'calls',
                ),
            )
        ),

        'history' => array(
            'order' => 20,
            'sort_order' => 'desc',
            'sort_by' => 'date_modified',
            'title_key' => 'LBL_HISOTRY_SUBPANEL_TITLE',
            'type' => 'collection',
            'subpanel_name' => 'history',
            //this values is not associated with a physical file.
            'module' => 'History',

            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopCreateNoteButton'),
                array('widget_class' => 'SubPanelTopSummaryButton'),
            ),

            'collection_list' => array(
                'meetings' => array(
                    'module' => 'Meetings',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'meetings',
                ),
                'tasks' => array(
                    'module' => 'Tasks',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'tasks',
                ),
                'calls' => array(
                    'module' => 'Calls',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'calls',
                ),
                'notes' => array(
                    'module' => 'Notes',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'notes',
                ),
                'emails' => array(
                    'module' => 'Emails',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'emails',
                ),
            )
        ),

        'ua_products' => array(
            'order' => 40,
            'module' => 'UA_Products',
            'sort_order' => 'desc',
            'sort_by' => 'product_status',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'ua_products',
            'get_distinct_data' => true,
            'add_subpanel_data' => 'product_id',
            'title_key' => 'LBL_PRODUCTS_SUBPANEL_TITLE',
            'top_buttons' => array(
                array(
                    'widget_class' => 'SubPanelTopSelectButton',
                    'popup_module' => 'UA_Products',
                    'mode' => 'MultiSelect',
                ),
            ),
        ),
        'ua_quotes' => array(
            'order' => 50,
            'module' => 'UA_Quotes',
            'sort_order' => 'desc',
            'sort_by' => 'quote_number',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'ua_quotes',
            'get_distinct_data' => true,
            'add_subpanel_data' => 'quote_id',
            'title_key' => 'LBL_QUOTES_SUBPANEL_TITLE',
            'top_buttons' => array(
                array(
                    'widget_class' => 'SubPanelTopSelectButton',
                    'popup_module' => 'UA_Quotes',
                    'mode' => 'MultiSelect',
                    'initial_filter_fields' => array('account_id' => 'account_id'),
                    //'account_name' => 'account_name'),
                ),
            ),
        ),
    ),
);