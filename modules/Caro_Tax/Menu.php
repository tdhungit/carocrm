<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 7/8/2015
 * Time: 11:45 AM
 */

global $mod_strings, $app_strings, $sugar_config;


if (ACLController::checkAccess('Caro_Tax', 'edit', true))
    $module_menu[] = Array("index.php?module=Caro_Tax&action=EditView&return_module=Caro_Tax&return_action=index", $mod_strings['LNK_NEW_TAX'], "CreateTax", 'Caro_Tax');

if (ACLController::checkAccess('Caro_Tax', 'list', true))
    $module_menu[] = Array("index.php?module=Caro_Tax&action=index&return_module=Caro_Tax&return_action=DetailView", $mod_strings['LNK_TAX'], "Caro_Tax", 'Caro_Tax');
