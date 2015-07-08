{if $is_group == 1}
<div class="quotes-group-content" id="quotes-group-content-{$group_row}">
<h5 style="padding-bottom: 5px;">
    {$MOD.LBL_GROUP_NAME}:
    <input type="text" name="group[{$group_row}][group_name]" value="" />
    <input type="hidden" name="group[{$group_row}][group_id]" value="" />
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

    <tbody id="quotes-group-content-line-items-{$group_row}">
    {/if}
    {if $is_product}
    <tr id="quotes-line-product-{$group_row}-{$product_row}">
        <td>
            <input type="hidden" name="group[{$group_row}][products][{$product_row}][relate_id]" value="" />
            <input type="hidden" name="group[{$group_row}][products][{$product_row}][product_id]" id="product_id_{$group_row}_{$product_row}" />
            <input type="text" name="group[{$group_row}][products][{$product_row}][product_name]" id="product_name_{$group_row}_{$product_row}" readonly="readonly" class="quotes-input-name quotea-input-readonly" >
            <a href="javascript:open_popup_ua_product('', '{$group_row}', '{$product_row}')">
                {sugar_getimage name='plus' attr='border="0" align="absmiddle"' ext='.gif'}
            </a>
        </td>
        <td><input type="text" name="group[{$group_row}][products][{$product_row}][qty_in_stock]" id="qty_in_stock_{$group_row}_{$product_row}" readonly="readonly" class="quotes-input-qty quotea-input-readonly" /></td>
        <td><input type="text" name="group[{$group_row}][products][{$product_row}][qty]" value="1" id="qty_{$group_row}_{$product_row}" class="quotes-input-qty" /></td>
        <td><input type="text" name="group[{$group_row}][products][{$product_row}][unit_price]" id="unit_price_{$group_row}_{$product_row}" readonly="readonly" class="quotes-input-price quotea-input-readonly" /></td>
        <td><input type="text" name="group[{$group_row}][products][{$product_row}][list_price]" id="list_price_{$group_row}_{$product_row}" class="quotes-input-price" /></td>
        <td><input type="text" name="group[{$group_row}][products][{$product_row}][discount]" value="0" id="discount_{$group_row}_{$product_row}" class="quotes-input-qty" /></td>
        <td>
            <select name="group[{$group_row}][products][{$product_row}][tax]" id="tax_{$group_row}_{$product_row}">
                {html_options options=$tax selected=""}
            </select>
        </td>
        <td><input type="text" id="net_total_{$group_row}_{$product_row}" class="net_total_line_{$group_row} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
        <td><input id="total_{$group_row}_{$product_row}" class="total_line_{$group_row} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
        <td><a href="javascript:void(0)" onclick="remove_line_item({$group_row}, {$product_row}, 0)">X</a></td>
    </tr>
    {/if}
    {if $is_service}
        <tr id="quotes-line-product-{$group_row}-{$product_row}">
            <td colspan="2">
                <input type="hidden" name="group[{$group_row}][products][{$product_row}][relate_id]" value="" />
                <input type="hidden" name="group[{$group_row}][products][{$product_row}][product_id]" id="product_id_{$group_row}_{$product_row}" />
                <input type="text" name="group[{$group_row}][products][{$product_row}][product_name]" id="product_name_{$group_row}_{$product_row}" class="quotes-input-name" >
            </td>
            <td><input type="text" name="group[{$group_row}][products][{$product_row}][qty]" value="1" id="qty_{$group_row}_{$product_row}" class="quotes-input-qty" /></td>
            <td></td>
            <td>
                <input type="hidden" name="group[{$group_row}][products][{$product_row}][unit_price]" id="unit_price_{$group_row}_{$product_row}" value="0" />
                <input type="text" name="group[{$group_row}][products][{$product_row}][list_price]" id="list_price_{$group_row}_{$product_row}" class="quotes-input-price" value="0" />
            </td>
            <td><input type="text" name="group[{$group_row}][products][{$product_row}][discount]" value="0" id="discount_{$group_row}_{$product_row}" class="quotes-input-qty" /></td>
            <td>
                <select name="group[{$group_row}][products][{$product_row}][tax]" id="tax_{$group_row}_{$product_row}">
                    {html_options options=$tax selected=""}
                </select>
            </td>
            <td><input type="text" id="net_total_{$group_row}_{$product_row}" class="net_total_line_{$group_row} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
            <td><input id="total_{$group_row}_{$product_row}" class="total_line_{$group_row} quotes-input-price quotea-input-readonly" readonly="readonly" /></td>
            <td><a href="javascript:void(0)" onclick="remove_line_item({$group_row}, {$product_row}, 0)">X</a></td>
        </tr>
    {/if}
    {if $is_group == 1}
    </tbody>
    <tr>
        <td colspan="7"></td>
        <td><input type="text" readonly="readonly" class="net_total_group_{$group_row} net_total_group_all quotes-input-price quotea-input-readonly" /></td>
        <td><input type="text" readonly="readonly" class="total_group_{$group_row} total_group_all quotes-input-price quotea-input-readonly" /></td>
        <td></td>
    </tr>
</table>

<div style="height: 30px; padding: 10px;">
    <span class="quotes-loading" id="quotes-add-product-loading-{$group_row}">{sugar_getimage name='img_loading' attr='border="0" align="absmiddle"' ext='.gif'}</span>
    <div class="quotes-button" id="quotes-add-product-button-{$group_row}">
        <input type="hidden" id="product-row-{$group_row}" name="product_row[]" value="0" />
        <input type="button" id="quotes-add-product-{$group_row}" value="{$MOD.LBL_ADD_PRODUCT}" />
        <input type="button" id="quotes-add-service-{$group_row}" value="{$MOD.LBL_ADD_CUSTOM_SERVICE}" />
        <input type="button" id="quotes-remove-service-{$group_row}" value="{$MOD.LBL_REMOVE_GROUP}" onclick="remove_line_item(0, {$group_row}, 1)" />
    </div>
</div>
</div>
{/if}