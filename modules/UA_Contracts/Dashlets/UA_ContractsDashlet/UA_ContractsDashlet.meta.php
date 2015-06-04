<?php
if (!defined('sugarEntry') || !sugarEntry)
{
    die('Not A Valid Entry Point');
}

/*********************************************************************************
 * Description:  Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

global $app_strings;

$dashletMeta['UA_ContractsDashlet'] = array(
    'module' => 'UA_Contracts',
    'title' => translate('LBL_HOMEPAGE_TITLE', 'UA_Contracts'),
    'description' => 'A customizable view into UA_Contracts',
    'icon' => 'icon_UA_Contracts_32.gif',
    'category' => 'Module Views'
);