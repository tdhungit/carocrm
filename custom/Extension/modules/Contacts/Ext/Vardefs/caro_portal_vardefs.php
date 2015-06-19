<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/19/2015
 * Time: 9:46 AM
 */

$dictionary['Contact']['fields']['portal_enable'] = array(
    'name' => 'portal_enable',
    'type' => 'bool',
    'vname' => 'LBL_PORTAL_ENABLE',
    'massupdate' => false,
    'reportable' => false,
);

$dictionary['Contact']['fields']['portal_user'] = array(
    'name' => 'portal_user',
    'type' => 'varchar',
    'len' => 255,
    'vname' => 'LBL_PORTAL_USER',
    'massupdate' => false,
    'reportable' => false,
);

$dictionary['Contact']['fields']['portal_password'] = array(
    'name' => 'portal_password',
    'type' => 'char',
    'len' => 32,
    'vname' => 'LBL_PORTAL_PASSWORD',
    'massupdate' => false,
    'reportable' => false,
);

$dictionary['Contact']['fields']['portal_start_date'] = array(
    'name' => 'portal_start_date',
    'type' => 'date',
    'vname' => 'LBL_PORTAL_START_DATE',
    'massupdate' => false,
    'reportable' => false,
);

$dictionary['Contact']['fields']['portal_expire_date'] = array(
    'name' => 'portal_expire_date',
    'type' => 'date',
    'vname' => 'LBL_PORTAL_EXPIRE_DATE',
    'massupdate' => false,
    'reportable' => false,
);

$dictionary['Contact']['indices'][] = array(
    'name' => 'idx_portal_user',
    'type' => 'unique',
    'fields' => array('portal_user')
);