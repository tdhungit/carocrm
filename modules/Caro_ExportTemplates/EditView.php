<?php
/**
 * Created by jacky.
 * User: jacky
 * Date: 7/20/2015
 * Time: 10:13 AM
 */

$smarty = new Sugar_Smarty();

global $app_strings, $mod_strings, $sugar_config, $app_list_strings;

$allow_module = $app_list_strings['export_apply_module_list'];

$focus = new Caro_ExportTemplates();

if (!$focus->ACLAccess('EditView')) {
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}

if ($_REQUEST['record']) {
    $focus->retrieve($_REQUEST['record']);
}

$smarty->assign('APP', $app_strings);
$smarty->assign('MOD', $mod_strings);
$smarty->assign('LIST_MODULES', $allow_module);
$smarty->assign('SITE_URL', $sugar_config['site_url']);
$smarty->assign('FILE_URL', $sugar_config['site_url'] . '/cache/csv/');

$smarty->assign('ID', $focus->id);
$smarty->assign('NAME', $focus->name);
$smarty->assign('FILE_TEMPLATE', $focus->file_template);
$smarty->assign('APPLY_MODULE', $focus->apply_module);
$smarty->assign('STATUS', $focus->status);
$smarty->assign('WEIGHT', $focus->weight);
$smarty->assign('DESCRIPTION', $focus->description);

$smarty->display("modules/Caro_ExportTemplates/templates/EditView.tpl");