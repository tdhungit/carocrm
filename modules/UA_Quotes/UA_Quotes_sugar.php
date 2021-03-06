<?PHP

/**
 * THIS CLASS IS GENERATED BY MODULE BUILDER
 * PLEASE DO NOT CHANGE THIS CLASS
 * PLACE ANY CUSTOMIZATIONS IN UA_Quotes
 */
class UA_Quotes_sugar extends Basic
{
    var $new_schema = true;
    var $module_dir = 'UA_Quotes';
    var $object_name = 'UA_Quotes';
    var $table_name = 'ua_quotes';
    var $importable = false;
    var $disable_row_level_security = true; // to ensure that modules created and deployed under CE will continue to function under team security if the instance is upgraded to PRO
    var $id;
    var $name;
    var $date_entered;
    var $date_modified;
    var $modified_user_id;
    var $modified_by_name;
    var $created_by;
    var $created_by_name;
    var $description;
    var $deleted;
    var $created_by_link;
    var $modified_user_link;
    var $assigned_user_id;
    var $assigned_user_name;
    var $assigned_user_link;
    var $opportunity_id;
    var $opportunity_name;
    var $quote_number;
    var $quote_stage;
    var $contact_id;
    var $contact_name;
    var $account_id;
    var $account_name;
    var $valid_until;
    var $payment_terms;
    var $billing_address_city;
    var $billing_address_state;
    var $billing_address_postalcode;
    var $billing_address_country;
    var $billing_address;
    var $shipping_address_city;
    var $shipping_address_state;
    var $shipping_address_postalcode;
    var $shipping_address_country;
    var $shipping_address;
    var $terms_and_conditions;
    var $net_total_amount;
    var $tax;
    var $total_amount;

    public function UA_Quotes_sugar()
    {
        parent::Basic();
    }

    public function bean_implements($interface)
    {
        switch ($interface)
        {
            case 'ACL':
                return true;
        }
        return false;
    }

}