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

        $this->db->query("
          UPDATE
            ua_quotes
          SET
            net_total_amount = '{$this->net_total_amount}',
            total_amount = '{$this->total_amount}',
            tax = '{$this->tax}'
          WHERE
            id = '$id'
        ");

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
        $QP = new UA_QuotesProducts();
        return $QP->Get_Products($id, $is_format);
    }
}
