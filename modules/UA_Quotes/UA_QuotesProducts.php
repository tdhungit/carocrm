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
    public $rel_module = 'UA_Quotes';

    public $table_name = 'ua_quotes_products';
    public $object_name = 'UA_QuotesProducts';

    public function __construct()
    {
        parent::Basic();
        $dictionary = array();
        if (is_file('custom/metadata/ua_quotes_productsMetaData.php')) {
            include 'custom/metadata/ua_quotes_productsMetaData.php';
        } else {
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

    public function Update_Amount($groups, $rel_id, $rel_module)
    {
        $net_total = 0.00;
        $total = 0.00;
        $tax = 0.00;

        foreach ($groups as $group) {
            $group_id = $group['group_id'];
            $this->id = null;
            if (strlen($group_id) == 36) {
                $this->id = $group_id;
            }
            $this->quote_id = $rel_id;
            $this->parent_id = '';
            $this->product_name = $group['group_name'];
            $this->rel_module = $rel_module;
            $group_id = $this->save();

            $group_net_total = 0.00;
            $group_total = 0.00;
            foreach ($group['products'] as $product) {
                $this->id = null;
                if ($product['relate_id']) {
                    $this->id = $product['relate_id'];
                }

                $this->quote_id = $rel_id;
                $this->parent_id = $group_id;
                $this->product_id = $product['product_id'];
                $this->product_name = $product['product_name'];
                $this->rel_module = $rel_module;
                $this->product_type = $product['product_type'];
                $this->qty = unformat_number($product['qty']);
                $this->qty_in_stock = unformat_number($product['qty_in_stock']);
                $this->unit_price = unformat_number($product['unit_price']);
                $this->list_price = unformat_number($product['list_price']);
                if (!$this->list_price) {
                    $this->list_price = $this->unit_price;
                }
                $this->discount = unformat_number($product['discount']);
                $this->tax = $product['tax'];

                $this->net_total = ($this->qty * $this->list_price) * (100 - $this->discount) / 100;
                $this->total = $this->net_total * (100 + $this->tax) / 100;

                if ($this->net_total) {
                    $net_total += $this->net_total;
                    $group_net_total += $this->net_total;
                }

                if ($this->total) {
                    $total += $this->total;
                    $group_total += $this->total;
                }

                $this->save();

                $this->db->query("UPDATE ua_quotes_products SET net_total = '$group_net_total', total = '$group_total' WHERE id = '$group_id'");
            }
        }

        return array(
            'net_total' => $net_total,
            'total' => $total,
            'tax' => $tax
        );
    }
} 