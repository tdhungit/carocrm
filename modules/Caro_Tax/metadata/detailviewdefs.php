<?php
/**
 * Created by carobiz.
 * User: jacky
 * Date: 6/29/2015
 * Time: 5:08 PM
 */

$viewdefs ['Caro_Tax'] = array(
    'DetailView' => array(
        'templateMeta' => array(
            'form' => array(
                'buttons' => array(
                    'EDIT',
                    'DUPLICATE',
                    'DELETE'
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