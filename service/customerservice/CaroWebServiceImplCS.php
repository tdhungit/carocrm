<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/18/2015
 * Time: 2:59 PM
 */

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
        $result = $db->query("SELECT id FROM contacts WHERE portal_user = '$email' AND portal_password = '$password'");
        $row = $db->fetchByAssoc($result);

        if (empty($row)) {
            return self::$helperObject->caro_error_message(-1);
        }

        if ($row['deleted'] == 1) {
            return self::$helperObject->caro_error_message(-2);
        }

        $now = data('Y-m-d');
        if ($now >= $row['portal_start_date'] && $row <= $row['portal_expire_date']) {
            return self::$helperObject->caro_response($row);
        }

        return self::$helperObject->caro_error_message(-3);
    }

}