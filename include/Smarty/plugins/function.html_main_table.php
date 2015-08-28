<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Created by Kevin.
 * Date: 8/20/2015
 * Time: 8:02 AM
 */

function smarty_function_html_main_table($params, &$smarty)
{
    $class = !$params['authenticate'] ? 'class="noLeftColumn"' : '';
   return '<div id="main">
    <div id="content" '.$class.'>
        <table style="width:100%" id="table-content"><tr><td id="td-content">';
}