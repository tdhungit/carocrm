<?PHP

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once 'modules/UA_Quotes/UA_Quotes_sugar.php';
require_once 'modules/UA_Quotes/UA_QuotesProducts.php';

class UA_Quotes extends UA_Quotes_sugar
{

    public function UA_Quotes()
    {
        parent::UA_Quotes_sugar();
    }

    /**
     * @return String
     */
    public function save()
    {
        $id = parent::save();
        $net_total = 0.00;
        $total = 0.00;
        $tax = 0.00;

        $QP = new UA_QuotesProducts();
        $groups = $_REQUEST['group'];

        foreach ($groups as $group)
        {
            $group_id = $group['group_id'];
            $QP->id = null;
            if (strlen($group_id) == 36)
            {
                $QP->id = $group_id;
            }
            $QP->quote_id = $id;
            $QP->parent_id = '';
            $QP->product_name = $group['group_name'];
            $group_id = $QP->save();

            $group_net_total = 0.00;
            $group_total = 0.00;
            foreach ($group['products'] as $product)
            {
                $QP->id = null;
                if ($product['relate_id'])
                {
                    $QP->id = $product['relate_id'];
                }

                $QP->quote_id = $id;
                $QP->parent_id = $group_id;
                $QP->product_id = $product['product_id'];
                $QP->product_name = $product['product_name'];
                $QP->product_type = $product['product_type'];
                $QP->qty = unformat_number($product['qty']);
                $QP->qty_in_stock = unformat_number($product['qty_in_stock']);
                $QP->unit_price = unformat_number($product['unit_price']);
                $QP->list_price = unformat_number($product['list_price']);
                if (!$QP->list_price)
                {
                    $QP->list_price = $QP->unit_price;
                }
                $QP->discount = unformat_number($product['discount']);
                $QP->tax = $product['tax'];

                $QP->net_total = ($QP->qty * $QP->list_price) * (100 - $QP->discount) / 100;
                $QP->total = $QP->net_total * (100 + $QP->tax) / 100;

                if ($QP->net_total)
                {
                    $net_total += $QP->net_total;
                    $group_net_total += $QP->net_total;
                }

                if ($QP->total)
                {
                    $total += $QP->total;
                    $group_total += $QP->total;
                }

                $QP->save();

                $this->db->query("UPDATE ua_quotes_products SET net_total = '$group_net_total', total = '$group_total' WHERE id = '$group_id'");
            }
        }

        $this->net_total_amount = $net_total;
        $this->total_amount = $total;
        $this->tax = $tax;

        $this->db->query("UPDATE ua_quotes SET net_total_amount = '{$this->net_total_amount}', total_amount = '{$this->total_amount}', tax = '{$this->tax}' WHERE id = '$id'");

        return $id;
    }

    /**
     * _Get_Products
     *
     * @param string $id
     * @param bool $is_format
     * @return array
     */
    public function Get_Products($id, $is_format)
    {
        $groups = array();

        $query_group = "SELECT p.* FROM ua_quotes_products p WHERE p.quote_id = '{$id}' AND p.deleted = 0 AND (p.parent_id IS NULL OR p.parent_id = '')";
        $result_group = $this->db->query($query_group);

        while ($row_group = $this->db->fetchByAssoc($result_group))
        {
            if ($is_format)
            {
                $row_group['net_total'] = currency_format_number($row_group['net_total'], array('currency_symbol' => false));
                $row_group['total'] = currency_format_number($row_group['total'], array('currency_symbol' => false));
            }

            $groups[$row_group['id']] = $row_group;

            $query = "SELECT p.* FROM ua_quotes_products p WHERE p.quote_id = '{$id}' AND p.deleted = 0 AND p.parent_id = '". $row_group['id'] ."'";
            $result = $this->db->query($query);
            while ($row = $this->db->fetchByAssoc($result))
            {
                if ($is_format)
                {
                    $row['qty'] = currency_format_number($row['qty'], array('currency_symbol' => false));
                    $row['qty_in_stock'] = currency_format_number($row['qty_in_stock'], array('currency_symbol' => false));
                    $row['unit_price'] = currency_format_number($row['unit_price'], array('currency_symbol' => false));
                    $row['list_price'] = currency_format_number($row['list_price'], array('currency_symbol' => false));
                    $row['net_total'] = currency_format_number($row['net_total'], array('currency_symbol' => false));
                    $row['total'] = currency_format_number($row['total'], array('currency_symbol' => false));
                }
                $groups[$row_group['id']]['products'][] = $row;
            }
        }

        return $groups;
    }
}
