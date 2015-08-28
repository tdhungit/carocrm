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

function smarty_function_html_footer($params, &$smarty)
{
    $output = '</td></tr></table></div><div class="clear"></div></div>';
    return $output;
}