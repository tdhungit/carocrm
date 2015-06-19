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

    public function cs_login()
    {


    }
}