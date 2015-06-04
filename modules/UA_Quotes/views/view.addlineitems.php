<?php
/**
 * Created by YouAddOn Team.
 * User: jacky
 * Date: 3/20/14
 * Time: 2:43 PM
 */

class ViewAddLineItems extends SugarView
{
    public function __construct()
    {
        parent::SugarView();
        $this->options = array();
    }

    public function display()
    {
        $is_group = $_REQUEST['is_group'];
        $is_product = $_REQUEST['is_product'];
        $is_service = $_REQUEST['is_service'];
        $group_row = $_REQUEST['group_row'];
        $product_row = $_REQUEST['product_row'];
        if (!$product_row)
        {
            $product_row = 0;
        }

        $this->ss->assign('is_group', $is_group);
        $this->ss->assign('is_product', $is_product);
        $this->ss->assign('is_service', $is_service);
        $this->ss->assign('group_row', $group_row);
        $this->ss->assign('product_row', $product_row);

        $this->ss->display('modules/UA_Quotes/tpls/ViewAddLineItems.tpl');
    }
} 