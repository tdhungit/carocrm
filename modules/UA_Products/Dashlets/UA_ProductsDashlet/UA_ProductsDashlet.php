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

require_once('include/Dashlets/DashletGeneric.php');
require_once('modules/UA_Products/UA_Products.php');

class UA_ProductsDashlet extends DashletGeneric
{
    public function UA_ProductsDashlet($id, $def = null)
    {
        global $current_user, $app_strings;
        require('modules/UA_Products/metadata/dashletviewdefs.php');

        parent::DashletGeneric($id, $def);

        if (empty($def['title']))
        {
            $this->title = translate('LBL_HOMEPAGE_TITLE', 'UA_Products');
        }

        $this->searchFields = $dashletData['UA_ProductsDashlet']['searchFields'];
        $this->columns = $dashletData['UA_ProductsDashlet']['columns'];

        $this->seedBean = new UA_Products();
    }
}