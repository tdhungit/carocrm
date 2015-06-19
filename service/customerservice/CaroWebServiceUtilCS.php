<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/18/2015
 * Time: 2:57 PM
 */

require_once('service/v4_1/SugarWebServiceUtilv4_1.php');

class CaroWebServiceUtilCS extends SugarWebServiceUtilv4_1
{
    public function caro_error_message($code)
    {
        switch ($code) {
            case 0:
                $msg = 'Empty data';
                break;
            case -1:
                $msg = 'Not exits data';
                break;
            case -2:
                $msg = 'Deleted data';
                break;
            case -3:
                $msg = 'Inactive data';
                break;
            default:
                $msg = 'Error data';
                break;
        }

        return array(
            'code' => $code,
            'msg' => $msg
        );
    }

    public function caro_response($data)
    {
        return array(
            'code' => 1,
            'data' => $data
        );
    }
}