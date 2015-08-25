{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
*}

<div id="top-header">
    {include file="./_companyLogo.tpl" theme_template=true}
    {include file="./_globalLinks.tpl" theme_template=true}
    {include file="./_headerSearch.tpl" theme_template=true}
</div>
<div id="moduleList">
    <ul class="sf-menu" id="ads-main-menu">
        {foreach from=$moduleTopMenu item=module key=name name=moduleList}
            <li{if $name == $MODULE_TAB} class="current"{/if}>
                {sugar_link id="moduleTab_$name" module=$name data=$module}
                {*{if $shortcutTopMenu.$name}
                    <ul>
                        <li class="groupLabel">{$APP.LBL_LINK_ACTIONS}</li>
                        {foreach from=$shortcutTopMenu.$name item=item}
                            <li>
                                {if $item.URL == "-"}
                                    <a></a><span>&nbsp;</span>
                                {else}
                                    <a href="{$item.URL}" {if $item.TARGET} target="{$item.TARGET}"{/if}><span>{$item.LABEL}</span></a>
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                {/if}*}
            </li>
        {/foreach}
        {if count($moduleExtraMenu) > 0}
            <li id="moduleTabExtraMenu">
                <a href="#">{$APP.LBL_MORE}</a>
                <ul>
                    {foreach from=$moduleExtraMenu item=module key=name name=moduleList}
                        <li>{sugar_link id="moduleTab_$name" module=$name data=$module}</li>
                    {/foreach}
                </ul>
            </li>
        {/if}
    </ul>
</div>
{if $shortcutTopMenu.$MODULE_TAB}
    <div id="shortcut-top-menu">
        <ul>
            {foreach from=$shortcutTopMenu.$MODULE_TAB item=item}
                <li>
                    {if $item.URL == "-"}
                        <a></a><span>&nbsp;</span>
                    {else}
                        <a href="{$item.URL}" {if $item.TARGET} target="{$item.TARGET}"{/if}><span>{$item.LABEL}</span></a>
                    {/if}
                </li>
            {/foreach}
        </ul>
    </div>
{/if}
{*{include file="./_headerLastViewed.tpl" theme_template=true}*}
