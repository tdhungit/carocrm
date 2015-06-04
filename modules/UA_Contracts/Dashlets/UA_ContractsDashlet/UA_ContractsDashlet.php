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
require_once('modules/UA_Contracts/UA_Contracts.php');

class UA_ContractsDashlet extends DashletGeneric
{
    function UA_ContractsDashlet($id, $def = null)
    {
        global $current_user, $app_strings;
        require('modules/UA_Contracts/metadata/dashletviewdefs.php');

        parent::DashletGeneric($id, $def);

        if (empty($def['title']))
        {
            $this->title = translate('LBL_HOMEPAGE_TITLE', 'UA_Contracts');
        }

        $this->searchFields = $dashletData['UA_ContractsDashlet']['searchFields'];
        $this->columns = $dashletData['UA_ContractsDashlet']['columns'];

        $this->seedBean = new UA_Contracts();
    }
}