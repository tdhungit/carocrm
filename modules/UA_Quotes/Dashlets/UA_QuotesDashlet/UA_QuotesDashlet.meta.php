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

$dashletMeta['UA_QuotesDashlet'] = array(
    'module' => 'UA_Quotes',
    'title' => translate('LBL_HOMEPAGE_TITLE', 'UA_Quotes'),
    'description' => 'A customizable view into UA_Quotes',
    'icon' => 'icon_UA_Quotes_32.gif',
    'category' => 'Module Views'
);