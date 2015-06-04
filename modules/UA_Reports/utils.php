<?php
/**
 * Created by CaroCRM TEAM.
 * http://www.carocrm.com
 * User: Jacky
 * Date: 11/3/2014
 * Time: 2:50 PM
 */

global $sugar_config;
global $app_list_strings;
global $beanFiles;

require_once('modules/Reports/registered_widgets.php');

$local_mod_strings = return_module_language($sugar_config['default_language'], 'Reports');
$default_report_type = 'Quotes';

/**
 * Helper function for this file.
 */
function getAllowedReportModules(&$local_modListHeader)
{
    static $reports_mod = null;
    if (isset($reports_mod)) {
        return $reports_mod;
    }

    require_once("modules/MySettings/TabController.php");
    $controller = new TabController();
    $tabs = $controller->get_tabs_system();
    $all_modules = array_merge($tabs[0], $tabs[1]);
    if (!is_array($all_modules)) {
        return array();
    }

    global $report_map, $beanList;

    if (empty($beanList)) {
        require('include/modules.php');
    }

    $report_modules = array();

    $subModuleCheckArray = array("Tasks", "Calls", "Meetings", "Notes");

    $subModuleProjectArray = array("ProjectTask");

    foreach ($beanList as $key => $value) {

        if (isset($all_modules[$key])) {
            $report_modules[$key] = $value;
        }

        if (in_array($key, $subModuleCheckArray) &&
            (array_key_exists("Calendar", $all_modules) || array_key_exists("Activities", $all_modules))
        ) {
            $report_modules[$key] = $value;
        }

        if (in_array($key, $subModuleProjectArray) &&
            array_key_exists("Project", $all_modules)
        ) {
            $report_modules[$key] = $value;
        }

        if ($key == 'Users' || $key == 'Teams' || $key == 'EmailAddresses') {
            $report_modules[$key] = $value;
        }


        if ($key == 'Releases' || $key == 'CampaignLog') {
            $report_modules[$key] = $value;
        }


    }
    $report_modules['Currencies'] = 'Currency';
    //add prospects
    $report_modules['Prospects'] = 'Prospect';

    $report_modules['ProductCategories'] = 'ProductCategory';
    $report_modules['ProductTypes'] = 'ProductType';
    $report_modules['Contracts'] = 'Contract';
    //add Tracker modules

    $report_modules['Trackers'] = 'Tracker';


    $report_modules['TrackerPerfs'] = 'TrackerPerf';
    $report_modules['TrackerSessions'] = 'TrackerSession';
    $report_modules['TrackerQueries'] = 'TrackerQuery';

    global $beanFiles;

    $exemptModules = array('Dashboard', 'Reports');

    foreach ($report_modules as $module => $class_name) {
        if (!isset($beanFiles[$class_name]) || in_array($module, $exemptModules)) {
            unset($report_modules[$module]);
            continue;
        }

    }
    return $report_modules;
}

include('include/modules.php');
$GLOBALS['report_modules'] = getAllowedReportModules($modListHeader);
global $report_modules;

if (is_array($report_modules)) {
    if (should_hide_iframes() && isset($report_modules['iFrames'])) {
        unset($report_modules['iFrames']);
    }

    foreach ($report_modules as $module_name => $bean_name) {
        if (isset($beanFiles[$bean_name])) {
            require_once($beanFiles[$bean_name]);
        }
    }
}

$module_map = array(
    'accounts' => 'Accounts',
    'bugs' => 'Bugs',
    'forecasts' => 'Forecasts',
    'leads' => 'Leads',
    'project_task' => 'ProjectTask',
    'prospects' => 'Prospects',
    'quotes' => 'Quotes',
    'calls' => 'Calls',
    'cases' => 'Cases',
    'contacts' => 'Contacts',
    'emails' => 'Emails',
    'meetings' => 'Meetings',
    'opportunities' => 'Opportunities',
    'tasks' => 'Tasks',
    'contracts' => 'Contracts',
);

$my_report_titles = array(
    'Accounts' => $local_mod_strings['LBL_MY_ACCOUNT_REPORTS'],
    'Contacts' => $local_mod_strings['LBL_MY_CONTACT_REPORTS'],
    'Opportunities' => $local_mod_strings['LBL_MY_OPPORTUNITY_REPORTS'],

    'Bugs' => $local_mod_strings['LBL_MY_BUG_REPORTS'],
    'Cases' => $local_mod_strings['LBL_MY_CASE_REPORTS'],
    'Leads' => $local_mod_strings['LBL_MY_LEAD_REPORTS'],
    'Forecasts' => $local_mod_strings['LBL_MY_FORECAST_REPORTS'],
    'ProjectTask' => $local_mod_strings['LBL_MY_PROJECT_TASK_REPORTS'],
    'Prospects' => $local_mod_strings['LBL_MY_PROSPECT_REPORTS'],
    'Quotes' => $local_mod_strings['LBL_MY_QUOTE_REPORTS'],

    'Calls' => $local_mod_strings['LBL_MY_CALL_REPORTS'],
    'Meetings' => $local_mod_strings['LBL_MY_MEETING_REPORTS'],
    'Tasks' => $local_mod_strings['LBL_MY_TASK_REPORTS'],
    'Emails' => $local_mod_strings['LBL_MY_EMAIL_REPORTS'],


    'Contracts' => $local_mod_strings['LBL_MY_CONTRACT_REPORTS'],
);

$my_team_report_titles = array(
    'Accounts' => $local_mod_strings['LBL_MY_TEAM_ACCOUNT_REPORTS'],
    'Contacts' => $local_mod_strings['LBL_MY_TEAM_CONTACT_REPORTS'],
    'Opportunities' => $local_mod_strings['LBL_MY_TEAM_OPPORTUNITY_REPORTS'],

    'Leads' => $local_mod_strings['LBL_MY_TEAM_LEAD_REPORTS'],
    'Quotes' => $local_mod_strings['LBL_MY_TEAM_QUOTE_REPORTS'],
    'Cases' => $local_mod_strings['LBL_MY_TEAM_CASE_REPORTS'],
    'Bugs' => $local_mod_strings['LBL_MY_TEAM_BUG_REPORTS'],
    'Forecasts' => $local_mod_strings['LBL_MY_TEAM_FORECAST_REPORTS'],
    'ProjectTask' => $local_mod_strings['LBL_MY_TEAM_PROJECT_TASK_REPORTS'],
    'Prospects' => $local_mod_strings['LBL_MY_TEAM_PROSPECT_REPORTS'],

    'Calls' => $local_mod_strings['LBL_MY_TEAM_CALL_REPORTS'],
    'Meetings' => $local_mod_strings['LBL_MY_TEAM_MEETING_REPORTS'],
    'Tasks' => $local_mod_strings['LBL_MY_TEAM_TASK_REPORTS'],
    'Emails' => $local_mod_strings['LBL_MY_TEAM_EMAIL_REPORTS'],

    'Contracts' => $local_mod_strings['LBL_MY_TEAM_CONTRACT_REPORTS'],
);

$published_report_titles = array(
    'Accounts' => $local_mod_strings['LBL_PUBLISHED_ACCOUNT_REPORTS'],
    'Contacts' => $local_mod_strings['LBL_PUBLISHED_CONTACT_REPORTS'],
    'Opportunities' => $local_mod_strings['LBL_PUBLISHED_OPPORTUNITY_REPORTS'],

    'Leads' => $local_mod_strings['LBL_PUBLISHED_LEAD_REPORTS'],
    'Quotes' => $local_mod_strings['LBL_PUBLISHED_QUOTE_REPORTS'],
    'Cases' => $local_mod_strings['LBL_PUBLISHED_CASE_REPORTS'],
    'Bugs' => $local_mod_strings['LBL_PUBLISHED_BUG_REPORTS'],
    'Forecasts' => $local_mod_strings['LBL_PUBLISHED_FORECAST_REPORTS'],
    'ProjectTask' => $local_mod_strings['LBL_PUBLISHED_PROJECT_TASK_REPORTS'],
    'Prospects' => $local_mod_strings['LBL_PUBLISHED_PROSPECT_REPORTS'],

    'Calls' => $local_mod_strings['LBL_PUBLISHED_CALL_REPORTS'],
    'Meetings' => $local_mod_strings['LBL_PUBLISHED_MEETING_REPORTS'],
    'Tasks' => $local_mod_strings['LBL_PUBLISHED_TASK_REPORTS'],
    'Emails' => $local_mod_strings['LBL_PUBLISHED_EMAIL_REPORTS'],

    'Contracts' => $local_mod_strings['LBL_PUBLISHED_CONTRACT_REPORTS'],
);