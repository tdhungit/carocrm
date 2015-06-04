<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/27/14
 * Time: 5:03 PM
 */

require_once('include/MVC/View/views/view.detail.php');

class UA_QuotesViewDetail extends ViewDetail
{
    public function __construct()
    {
        parent::ViewDetail();
    }

    public function display()
    {
        $groups = $this->bean->Get_Products($this->bean->id, true);
        $this->ss->assign('GROUPS', $groups);

        $this->ss->assign('NET_TOTAL', currency_format_number($this->bean->net_total_amount));
        $this->ss->assign('TOTAL', currency_format_number($this->bean->total_amount));

        parent::display();
    }
}