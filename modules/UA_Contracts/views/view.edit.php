<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/22/2015
 * Time: 3:35 PM
 */

/**
 * Class UA_ContractsViewEdit
 * @property UA_Contracts bean
 */
class UA_ContractsViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::ViewEdit();
    }

    public function display()
    {
        global $locale;
        global $current_user;

        $groups = $this->bean->Get_Products($this->bean->id, true);
        $this->ss->assign('GROUPS', $groups);

        // Set the number grouping and decimal separators
        $seps = get_number_seperators();
        $dec_sep = $seps[1];
        $num_grp_sep = $seps[0];
        $this->ss->assign('NUM_GRP_SEP', $num_grp_sep);
        $this->ss->assign('DEC_SEP', $dec_sep);

        $significantDigits = $locale->getPrecedentPreference('default_currency_significant_digits', $current_user);
        $this->ss->assign('PRECISION', $significantDigits);

        $this->ss->assign('NET_TOTAL', currency_format_number($this->bean->contract_value));
        $this->ss->assign('TOTAL', currency_format_number($this->bean->contract_after_tax));

        parent::display();
    }
}