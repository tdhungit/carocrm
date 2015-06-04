<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/25/14
 * Time: 4:14 PM
 */

class UA_QuotesProducts extends Basic
{
    public $id;
    public $date_modified;
    public $deleted;
    public $quote_id;
    public $parent_id;
    public $product_id;
    public $product_name;
    public $product_type;
    public $qty;
    public $qty_in_stock;
    public $unit_price;
    public $list_price;
    public $discount;
    public $tax;
    public $net_total;
    public $total;

    public $table_name = 'ua_quotes_products';
    public $object_name = 'UA_QuotesProducts';

    public function __construct()
    {
        parent::Basic();
        $dictionary = array();
        if (is_file('custom/metadata/ua_quotes_productsMetaData.php'))
        {
            include 'custom/metadata/ua_quotes_productsMetaData.php';
        }
        else
        {
            include 'metadata/ua_quotes_productsMetaData.php';
        }
        $this->field_defs = $dictionary['ua_quotes_products']['fields'];
    }

    public function save()
    {
        return parent::save();
    }

    public function Is_Duplicate()
    {

    }
} 