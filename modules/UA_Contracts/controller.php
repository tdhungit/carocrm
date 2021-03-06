<?php
/**
 * Created by CaroCRM.
 * User: Jacky
 * Date: 7/28/2015
 * Time: 4:51 PM
 * Project: carocrm
 * File: controller.php
 */

/**
 * Class UA_ContractsController
 * @property UA_Contracts $bean
 */
class UA_ContractsController extends SugarController
{
    public function action_CaroExport()
    {
        $id = $_REQUEST['record'];
        $template_id = $_REQUEST['template'];

        $this->bean->retrieve($id);
        $products = $this->bean->Get_Products($this->bean->id, true);

        $template = $this->bean->db->fetchByAssoc(
            $this->bean->db->query("SELECT * FROM caro_exporttemplates WHERE deleted = 0 AND id = '$template_id'")
        );

        include_once('include/opentbs/tbs_class.php');
        include_once('include/opentbs/tbs_plugin_opentbs.php');

        $TBS = new clsTinyButStrong;
        $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
        $template = "cache/csv/" . $template['file_template'];
        $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);

        $file_name = htmlspecialchars($this->bean->name, ENT_QUOTES) . '.docx';

        $data = array(
            'name' => $this->bean->name,
            'date' => date('Y-m-d'),
            'quote_number' => $this->bean->quote_number,
            'valid_until' => $this->bean->valid_until,
            'assigned_user_name' => $this->bean->assigned_user_name,
            'billing_address' => $this->bean->billing_address,
            'billing_address_state' => $this->bean->billing_address_state,
            'billing_address_city' => $this->bean->billing_address_city,
            'billing_address_postalcode' => $this->bean->billing_address_postalcode,
            'billing_address_country' => $this->bean->billing_address_country,
            'shipping_address' => $this->bean->shipping_address,
            'shipping_address_state' => $this->bean->shipping_address_state,
            'shipping_address_city' => $this->bean->shipping_address_city,
            'shipping_address_postalcode' => $this->bean->shipping_address_postalcode,
            'shipping_address_country' => $this->bean->shipping_address_country,
            'net_total' => currency_format_number($this->bean->net_total_amount),
            'total' => currency_format_number($this->bean->total_amount),
        );

        $TBS->MergeField('data', $data);
        $TBS->MergeBlock('product', $products);

        $TBS->Show(OPENTBS_DOWNLOAD, $file_name);
        sugar_cleanup(true);
    }
}