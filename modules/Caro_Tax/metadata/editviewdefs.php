<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/29/2015
 * Time: 5:08 PM
 */

$viewdefs ['Caro_Tax'] = array(
    'EditView' => array(
        'templateMeta' => array(
            'form' => array(
                'buttons' => array(
                    'SAVE',
                    'CANCEL'
                )
            ),
            'maxColumns' => '1',
            'widths' => array(
                array(
                    'label' => '30',
                    'field' => '70',
                ),
            ),
            'useTabs' => false,
        ),
        'panels' => array(
            'default' => array(
                array('name'),
                array('percent'),
                array('weight')
            )
        )
    )
);