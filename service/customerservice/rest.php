<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/18/2015
 * Time: 2:54 PM
 */

chdir('../..');
require_once('CaroWebServiceImplCS.php');
$webservice_class = 'SugarRestService';
$webservice_path = 'service/core/SugarRestService.php';
$webservice_impl_class = 'CaroWebServiceImplCS';
$registry_class = 'registry';
$location = '/service/customerservice/rest.php';
$registry_path = 'service/customerservice/registry.php';
require_once('service/core/webservice.php');