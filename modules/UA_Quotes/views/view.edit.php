<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/26/14
 * Time: 4:01 PM
 */

/**
 * Class UA_QuotesViewEdit
 * @property UA_Quotes $bean
 */
class UA_QuotesViewEdit extends ViewEdit
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

        $this->ss->assign('NET_TOTAL', currency_format_number($this->bean->net_total_amount));
        $this->ss->assign('TOTAL', currency_format_number($this->bean->total_amount));

        parent::display();
    }
}