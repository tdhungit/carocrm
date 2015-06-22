<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/22/2015
 * Time: 3:32 PM
 */

require_once('include/MVC/View/views/view.detail.php');

/**
 * Class UA_ContractsViewDetail
 * @property UA_Contracts bean
 */
class UA_ContractsViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::ViewDetail();
    }

    public function display()
    {
        $groups = $this->bean->Get_Products($this->bean->id, true);
        $this->ss->assign('GROUPS', $groups);

        $this->ss->assign('NET_TOTAL', currency_format_number($this->bean->contract_value));
        $this->ss->assign('TOTAL', currency_format_number($this->bean->contract_after_tax));

        parent::display();
    }
}