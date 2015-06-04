<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/19/14
 * Time: 3:28 PM
 */

class UA_ProductsViewEdit extends ViewEdit
{
    public function __construct()
    {
        parent::ViewEdit();
    }

    public function display()
    {
        global $locale;
        global $current_user;

        // Set the number grouping and decimal separators
        $seps = get_number_seperators();
        $dec_sep = $seps[1];
        $num_grp_sep = $seps[0];
        $this->ss->assign('NUM_GRP_SEP', $num_grp_sep);
        $this->ss->assign('DEC_SEP', $dec_sep);

        $significantDigits = $locale->getPrecedentPreference('default_currency_significant_digits', $current_user);
        $this->ss->assign('PRECISION', $significantDigits);

        parent::display();
    }
}