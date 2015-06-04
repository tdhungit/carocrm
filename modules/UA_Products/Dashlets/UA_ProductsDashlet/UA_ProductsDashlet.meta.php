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

$dashletMeta['UA_ProductsDashlet'] = array(
    'module' => 'UA_Products',
    'title' => translate('LBL_HOMEPAGE_TITLE', 'UA_Products'),
    'description' => 'A customizable view into UA_Products',
    'icon' => 'icon_UA_Products_32.gif',
    'category' => 'Module Views'
);