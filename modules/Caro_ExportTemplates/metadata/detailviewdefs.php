<?php
/**
 * Created by jacky.
 * User: jacky
 * Date: 7/20/2015
 * Time: 2:00 PM
 */

$viewdefs ['Caro_ExportTemplates'] = array(
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
                array('file_template'),
                array('apply_module'),
                array('status'),
                array('weight'),
                array('description'),
            )
        )
    )
);