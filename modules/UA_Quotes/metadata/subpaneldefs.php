<?php

$layout_defs['UA_Quotes'] = array(
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array(
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
                array('widget_class' => 'SubPanelTopComposeEmailButton'),
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
                array('widget_class' => 'SubPanelTopArchiveEmailButton'),
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

        'ua_contracts' => array(
            'order' => 30,
            'module' => 'UA_Contracts',
            'sort_order' => 'desc',
            'sort_by' => 'end_date',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'ua_contracts',
            'add_subpanel_data' => 'contract_id',
            'title_key' => 'LBL_CONTRACTS_SUBPANEL_TITLE',
            'top_buttons' => array(
                array('widget_class' => 'SubPanelTopButtonQuickCreate'),
                array(
                    'widget_class' => 'SubPanelTopSelectButton',
                    'popup_module' => 'UA_Contracts',
                    'mode' => 'MultiSelect',
                    'initial_filter_fields' => array(
                        'billing_account_id' => 'account_id',
                        'billing_account_name' => 'account_name'
                    )
                ),
            ),
        ),
    ),
);