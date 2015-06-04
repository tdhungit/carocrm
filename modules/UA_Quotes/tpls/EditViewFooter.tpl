<link href="modules/UA_Quotes/css/UA_Quotes.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    var precision = "{$PRECISION}";
    var num_grp_sep = "{$NUM_GRP_SEP}";
    var dec_sep = "{$DEC_SEP}";
</script>
<script type="text/javascript" src="modules/UA_Quotes/js/UA_Quotes.js"></script>

<div id="detailpanel_item" class="edit view edit508 expanded">
    <h4 style="padding: 0 10px;">{$MOD.LBL_LINE_ITEMS}</h4>

    <div style="padding: 10px;" id="quotes-line-items">
        {foreach from=$GROUPS item=GROUP name=groups}
            {assign var="group_index" value=$smarty.foreach.groups.index}
            <div class="quotes-group-content" id="quotes-group-content-{$group_index}">
                <h5 style="padding-bottom: 5px;">
                    {$MOD.LBL_GROUP_NAME}:
                    <input type="text" name="group[{$group_index}][group_name]" value="{$GROUP.product_name}" />
                    <input type="hidden" name="group[{$group_index}][group_id]" value="{$GROUP.id}" />
                </h5>
                <table border="0" width="100%" cellspacing="0" cellpadding="0" class="quotes-line-items-table">
                    <thead>
                        <tr>
                            <td>{$MOD.LBL_PRODUCT_NAME}</td>
                            <td>{$MOD.LBL_QTY_IN_STOCK}</td>
                            <td>{$MOD.LBL_QTY}</td>
                            <td>{$MOD.LBL_UNIT_PRICE}</td>
                            <td>{$MOD.LBL_LIST_PRICE}</td>
                            <td>{$MOD.LBL_DISCOUNT}</td>
                            <td>{$MOD.LBL_TAX}</td>
                            <td>{$MOD.LBL_NET_TOTAL}</td>
                            <td>{$MOD.LBL_TOTAL}</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody id="quotes-group-content-line-items-{$group_index}">
                        {foreach from=$GROUP.products item=PRODUCT name=products}
                            {assign var="product_index" value=$smarty.foreach.products.index}
                            {if $PRODUCT.product_id}
                                <tr id="quotes-line-product-{$group_index}-{$product_index}">
                                    <td>
                                        <input type="hidden" name="group[{$group_index}][products][{$product_index}][relate_id]" value="{$PRODUCT.id}" />
                                        <input type="hidden" name="group[{$group_index}][products][{$product_index}][product_id]" id="product_id_{$group_index}_{$product_index}" value="{$PRODUCT.product_id}" />
                                        <input type="text" name="group[{$group_index}][products][{$product_index}][product_name]" id="product_name_{$group_index}_{$product_index}" value="{$PRODUCT.product_name}" readonly="readonly" class="quotes-input-name quotea-input-readonly" >
                                        <a href="javascript:open_popup_ua_product('', '{$group_index}', '{$product_index}')">
                                            {sugar_getimage name='plus' attr='border="0" align="absmiddle"' ext='.gif'}
                                        </a>
                                    </td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][qty_in_stock]" id="qty_in_stock_{$group_index}_{$product_index}" value="{$PRODUCT.qty_in_stock}" readonly="readonly" class="quotes-input-qty quotea-input-readonly" /></td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][qty]" value="{$PRODUCT.qty}" id="qty_{$group_index}_{$product_index}" class="quotes-input-qty" /></td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][unit_price]" id="unit_price_{$group_index}_{$product_index}" value="{$PRODUCT.unit_price}" readonly="readonly" class="quotes-input-price quotea-input-readonly" /></td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][list_price]" id="list_price_{$group_index}_{$product_index}" value="{$PRODUCT.list_price}" class="quotes-input-price" /></td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][discount]" value="{$PRODUCT.discount}" id="discount_{$group_index}_{$product_index}" class="quotes-input-qty" /></td>
                                    <td>
                                        <select name="group[{$group_index}][products][{$product_index}][tax]" id="tax_{$group_index}_{$product_index}">
                                            <option value="0"{if $PRODUCT.tax == 0} selected="selected"{/if}>0%</option>
                                            <option value="5"{if $PRODUCT.tax == 5} selected="selected"{/if}>5%</option>
                                            <option value="10"{if $PRODUCT.tax == 10} selected="selected"{/if}>10%</option>
                                        </select>
                                    </td>
                                    <td><input type="text" id="net_total_{$group_index}_{$product_index}" value="{$PRODUCT.net_total}" class="net_total_line_{$group_index} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
                                    <td><input id="total_{$group_index}_{$product_index}" value="{$PRODUCT.total}" class="total_line_{$group_index} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
                                    <td><a href="javascript:void(0)" onclick="remove_line_item({$group_index}, {$product_index}, 0)">X</a></td>
                                </tr>
                            {else}
                                <tr id="quotes-line-product-{$group_index}-{$product_index}">
                                    <td colspan="2">
                                        <input type="hidden" name="group[{$group_index}][products][{$product_index}][relate_id]" value="{$PRODUCT.id}" />
                                        <input type="hidden" name="group[{$group_index}][products][{$product_index}][product_id]" id="product_id_{$group_index}_{$product_index}" value="{$PRODUCT.product_id}" />
                                        <input type="text" name="group[{$group_index}][products][{$product_index}][product_name]" id="product_name_{$group_index}_{$product_index}" value="{$PRODUCT.product_name}" class="quotes-input-name" >
                                    </td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][qty]" value="{$PRODUCT.qty}" id="qty_{$group_index}_{$product_index}" class="quotes-input-qty" /></td>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="group[{$group_index}][products][{$product_index}][unit_price]" id="unit_price_{$group_index}_{$product_index}" value="{$PRODUCT.unit_price}" />
                                        <input type="text" name="group[{$group_index}][products][{$product_index}][list_price]" id="list_price_{$group_index}_{$product_index}" class="quotes-input-price" value="{$PRODUCT.list_price}" />
                                    </td>
                                    <td><input type="text" name="group[{$group_index}][products][{$product_index}][discount]" value="{$PRODUCT.discount}" id="discount_{$group_index}_{$product_index}" class="quotes-input-qty" /></td>
                                    <td>
                                        <select name="group[{$group_index}][products][{$product_index}][tax]" id="tax_{$group_index}_{$product_index}">
                                            <option value="0"{if $PRODUCT.tax == 0} selected="selected"{/if}>0%</option>
                                            <option value="5"{if $PRODUCT.tax == 5} selected="selected"{/if}>5%</option>
                                            <option value="10"{if $PRODUCT.tax == 10} selected="selected"{/if}>10%</option>
                                        </select>
                                    </td>
                                    <td><input type="text" id="net_total_{$group_index}_{$product_index}" value="{$PRODUCT.net_total}" class="net_total_line_{$group_index} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
                                    <td><input id="total_{$group_index}_{$product_index}" value="{$PRODUCT.total}" class="total_line_{$group_index} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
                                    <td><a href="javascript:void(0)" onclick="remove_line_item({$group_index}, {$product_index}, 0)">X</a></td>
                                </tr>
                            {/if}
                            <script type="text/javascript">add_product_line('{$group_index}', '{$product_index}');</script>
                        {/foreach}
                    </tbody>
                    <tr>
                        <td colspan="7"></td>
                        <td><input type="text" readonly="readonly" class="net_total_group_{$group_index} net_total_group_all quotes-input-price quotea-input-readonly" /></td>
                        <td><input type="text" readonly="readonly" class="total_group_{$group_index} total_group_all quotes-input-price quotea-input-readonly" /></td>
                        <td></td>
                    </tr>
                </table>

                <div style="height: 30px; padding: 10px;">
                    <span class="quotes-loading" id="quotes-add-product-loading-{$group_index}">{sugar_getimage name='img_loading' attr='border="0" align="absmiddle"' ext='.gif'}</span>
                    <div class="quotes-button" id="quotes-add-product-button-{$group_index}">
                        {assign var="product_row" value=$product_index+1}
                        <input type="hidden" id="product-row-{$group_index}" name="product_row[]" value="{$product_row}" />
                        <input type="button" id="quotes-add-product-{$group_index}" value="{$MOD.LBL_ADD_PRODUCT}" />
                        <input type="button" id="quotes-add-service-{$group_index}" value="{$MOD.LBL_ADD_CUSTOM_SERVICE}" />
                        <input type="button" id="quotes-remove-service-{$group_index}" value="{$MOD.LBL_REMOVE_GROUP}" onclick="remove_line_item(0, {$group_index}, 1)" />
                    </div>
                </div>
            </div>
            <script type="text/javascript">add_product('{$group_index}');calculator_quotes_amount('{$group_index}', 1);</script>
        {/foreach}
    </div>

    <div style="height: 30px; padding: 10px;">
        <span class="quotes-loading" id="quotes-add-group-loading">{sugar_getimage name='img_loading' attr='border="0" align="absmiddle"' ext='.gif'}</span>
        <div class="quotes-button" id="quotes-add-group-button">
            {assign var="group_row" value=$group_index+1}
            <input type="hidden" id="group-row" name="group_row" value="{$group_row}" />
            <input type="button" id="quotes-add-group-line-items" value="{$MOD.LBL_ADD_GROUP}" />
        </div>
    </div>

    <div id="quotes-summary-total">
        <table>
            <tr>
                <td>{$MOD.LBL_NET_TOTAL}</td>
                <td><span id="quotes_net_total_all">{$NET_TOTAL}</span></td>
            </tr>
            <tr>
                <td>{$MOD.LBL_TOTAL}</td>
                <td><span id="quotes_total_all">{$TOTAL}</span></td>
            </tr>
        </table>
        <div class="clear" style="height: 10px;"></div>
    </div>
</div>

{{include file='include/EditView/footer.tpl'}}