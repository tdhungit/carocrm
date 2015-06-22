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

        $QP = new UA_QuotesProducts();
        $groups = $_REQUEST['group'];

        $result = $QP->Update_Amount($groups, $id, 'UA_Quotes');

        $this->net_total_amount = $result['net_total'];
        $this->total_amount = $result['total'];
        $this->tax = $result['tax'];

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
