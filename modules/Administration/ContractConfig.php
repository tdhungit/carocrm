<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/23/2015
 * Time: 11:02 AM
 */

if (!is_admin($current_user)) {
    sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
}

require_once('modules/Configurator/Configurator.php');
$configurator = new Configurator();

if (!empty($_POST['saveConfig'])) {
    if (!$_POST['disable_contract_line_items']) {
        $_POST['disable_contract_line_items'] = '0';
    }
    $configurator->saveConfig();
    header('Location: index.php?module=Administration&action=index');
}

$sugar_smarty = new Sugar_Smarty();

$sugar_smarty->assign('CONF', $configurator->config);

$sugar_smarty->display('modules/Administration/ContractConfig.tpl');