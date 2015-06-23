<?PHP

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/UA_Contracts/UA_Contracts_sugar.php');
require_once 'modules/UA_Quotes/UA_QuotesProducts.php';

class UA_Contracts extends UA_Contracts_sugar
{

    public function UA_Contracts()
    {
        parent::UA_Contracts_sugar();
    }

    public function save()
    {
        $id = parent::save();

        global $sugar_config;

        if ($sugar_config['disable_contract_line_items'] == '0') {
            $QP = new UA_QuotesProducts();
            $groups = $_REQUEST['group'];

            $result = $QP->Update_Amount($groups, $id, 'UA_Contracts');

            $this->contract_value = $result['net_total'];
            $this->contract_after_tax = $result['total'];
            $this->contract_tax = $result['tax'];

            $this->db->query("
              UPDATE
                ua_contracts
              SET
                contract_value = '{$this->contract_value}',
                contract_after_tax = '{$this->contract_after_tax}',
                contract_tax = '{$this->contract_tax}'
              WHERE
                id = '$id'
            ");
        }

        return $id;
    }

    /**
     * ua_contracts_documents
     * This method is called by the Subpanel code (see the subpaneldefs.php of this module).
     * We named it contracts_documents so that the return_relationship hidden form value set in the Subpanel
     * widget code may be used to look up the contracts_documents relationship as defined in the
     * linked_documentsMetaData.php file.  The query in this method is customized so as to
     * do a JOIN on the document_revisions table to retrieve the latest document revision for
     * a particular document.
     *
     * @return string String SQL query to retrieve the documents to display in the subpanel
     */
    function get_contract_documents()
    {
        $this->load_relationship('ua_contracts_documents');
        $query_array = $this->ua_contracts_documents->getQuery(array('return_as_array' => true));
        $query = <<<KGB
            SELECT documents.*,
				documents.document_revision_id AS latest_revision_id,
				for_latest_revision.revision AS latest_revision_name,
				for_selected_revision.revision AS selected_revision_name,
				linked_documents.document_revision_id AS selected_revision_id,
				ua_contracts.status AS contract_status,
				for_selected_revision.filename AS selected_revision_filename,
				linked_documents.id AS linked_id,
				ua_contracts.name AS contract_name

KGB;

        $query .= $query_array['from'];
        $query .= <<<CIA
            JOIN documents ON documents.id = linked_documents.document_id
			LEFT JOIN document_revisions for_latest_revision
				ON for_latest_revision.id = documents.document_revision_id
			INNER JOIN ua_contracts
				ON ua_contracts.id = linked_documents.parent_id
			LEFT JOIN document_revisions for_selected_revision
				ON for_selected_revision.id = linked_documents.document_revision_id

CIA;
        $query .= $query_array['where'];
        return $query;
    }

    /**
     * @param $id
     * @param $is_format
     * @return array
     */
    public function Get_Products($id, $is_format)
    {
        $QP = new UA_QuotesProducts();
        return $QP->Get_Products($id, $is_format, 'UA_Contracts');
    }

}