<?php
require_once('service/v4_1/SugarWebServiceImplv4_1.php');
require_once('service/customerservice/CaroWebServiceUtilCS.php');
 
class CaroWebServiceImplCS extends SugarWebServiceImplv4_1
{
    public function __construct()
    {
        self::$helperObject = new CaroWebServiceUtilCS();
    }
 
    public function cs_login($session_id, $email, $password)
    {
 
        $error = new SoapError();
        if (!self::$helperObject->checkSessionAndModuleAccess($session_id, 'invalid_session', '', '', '', $error)) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->set_relationship');
            return;
        }
 
        if (!$email || !$password) {
            return self::$helperObject->caro_error_message(0);
        }
 
        global $db;
        $result = $db->query("SELECT * FROM contacts WHERE portal_user = '$email' AND portal_password = '$password'");
        $row = $db->fetchByAssoc($result);
 
        if (empty($row)) {
            return self::$helperObject->caro_error_message(-1);
        }
 
        if ($row['deleted'] == 1) {
            return self::$helperObject->caro_error_message(-2);
        }
 
        $now = time();
        if ($now >= strtotime($row['portal_start_date'])
            && $now <= strtotime($row['portal_expire_date'])) {
            return self::$helperObject->caro_response($row);
        }
 
        return self::$helperObject->caro_error_message(-3);
    }
     
    function cs_query($session, $query) {
		$error = new SoapError();
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '', $error)) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->cs_query');
            return;
        }
        global $db;
        $result = $db->query($query);
        $list = array();
        while($row = $db->fetchByAssoc($result)) {
            array_push($list, $row);
        }
        return $list;
    }
 
    function get_entry_list($session, $module_name, $query, $order_by,$offset, $select_fields, $link_name_to_fields_array, $max_results, $deleted ,$favorites   = false){
        $GLOBALS['log']->info('Begin: SugarWebServiceImpl->get_entry_list');
        global  $beanList, $beanFiles;
        $error = new SoapError();
        $using_cp = false;
        if($module_name == 'CampaignProspects'){
            $module_name = 'Prospects';
            $using_cp = true;
        }
        if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', $module_name, 'read', 'no_access', $error)) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->get_entry_list');
            return;
        } // if
 
        // If the maximum number of entries per page was specified, override the configuration value.
        if($max_results > 0){
            global $sugar_config;
            $sugar_config['list_max_entries_per_page'] = $max_results;
        } // if
 
        $class_name = $beanList[$module_name];
        require_once($beanFiles[$class_name]);
        $seed = new $class_name();
 
        if (!self::$helperObject->checkQuery($error, $query, $order_by)) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->get_entry_list');
            return;
        } // if
 
        if (!self::$helperObject->checkACLAccess($seed, 'Export', $error, 'no_access')) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->get_entry_list');
            return;
        } // if
 
        if (!self::$helperObject->checkACLAccess($seed, 'list', $error, 'no_access')) {
            $GLOBALS['log']->info('End: SugarWebServiceImpl->get_entry_list');
            return;
        } // if
 
        if($query == ''){
            $where = '';
        } // if
        if($offset == '' || $offset == -1){
            $offset = 0;
        } // if
        if($using_cp){
            $response = $seed->retrieveTargetList($query, $select_fields, $offset,-1,-1,$deleted);
        }else{
            /* @var $seed SugarBean */
           $response = $seed->get_list($order_by, $query, $offset,-1,-1,$deleted, false, $select_fields);
        } // else
        $list = $response['list'];
 
        $output_list = array();
        $linkoutput_list = array();
 
        foreach($list as $value) {
            if(isset($value->emailAddress)){
                $value->emailAddress->handleLegacyRetrieve($value);
            } // if
            $value->fill_in_additional_detail_fields();
 
            $output_list[] = self::$helperObject->get_return_value_for_fields($value, $module_name, $select_fields);
            if(!empty($link_name_to_fields_array)){
                $linkoutput_list[] = self::$helperObject->get_return_value_for_link_fields($value, $module_name, $link_name_to_fields_array);
            }
        } // foreach
 
        // Calculate the offset for the start of the next page
        $next_offset = $offset + sizeof($output_list);
 
        $GLOBALS['log']->info('End: SugarWebServiceImpl->get_entry_list');
        return array('result_count'=>sizeof($output_list), 'next_offset'=>$next_offset, 'entry_list'=>$output_list, 'relationship_list' => $linkoutput_list);
    }
}