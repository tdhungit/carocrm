<link href="modules/UA_Quotes/css/UA_Quotes.css" rel="stylesheet" type="text/css" />
<div class="detail view detail508 expanded" id="detailpanel_item">
    <h4 style="padding: 0 10px;">{$MOD.LBL_LINE_ITEMS}</h4>

    <div style="padding: 10px;" id="quotes-line-items">
        {foreach from=$GROUPS item=GROUP name=groups}
            <div class="quotes-group-content">
                <h4 style="padding-bottom: 5px; padding-left: 0 !important;">{$GROUP.product_name}</h4>
                <table border="0" width="100%" cellspacing="0" cellpadding="0" class="quotes-line-items-table">
                    <thead>
                        <tr>
                            <td width="30%">{$MOD.LBL_PRODUCT_NAME}</td>
                            <td class="text-right">{$MOD.LBL_QTY_IN_STOCK}</td>
                            <td class="text-right">{$MOD.LBL_QTY}</td>
                            <td class="text-right">{$MOD.LBL_UNIT_PRICE}</td>
                            <td class="text-right">{$MOD.LBL_LIST_PRICE}</td>
                            <td class="text-right">{$MOD.LBL_DISCOUNT}</td>
                            <td class="text-right">{$MOD.LBL_TAX}</td>
                            <td class="text-right">{$MOD.LBL_NET_TOTAL}</td>
                            <td class="text-right">{$MOD.LBL_TOTAL}</td>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$GROUP.products item=PRODUCT name=products}
                            <tr>
                                <td>{$PRODUCT.product_name}</td>
                                <td class="text-right">{$PRODUCT.qty_in_stock}</td>
                                <td class="text-right">{$PRODUCT.qty}</td>
                                <td class="text-right">{$PRODUCT.unit_price}</td>
                                <td class="text-right">{$PRODUCT.list_price}</td>
                                <td class="text-right">{$PRODUCT.discount}</td>
                                <td class="text-right">{$PRODUCT.tax}</td>
                                <td class="text-right">{$PRODUCT.net_total}</td>
                                <td class="text-right">{$PRODUCT.total}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                    <tr>
                        <td colspan="7"></td>
                        <td class="text-right">{$GROUP.net_total}</td>
                        <td class="text-right">{$GROUP.total}</td>
                    </tr>
                </table>
            </div>
        {/foreach}
    </div>

    <div id="quotes-summary-total">
        <table>
            <tr>
                <td class="text-right">{$MOD.LBL_NET_TOTAL}</td>
                <td class="text-right"><span id="quotes_net_total_all">{$NET_TOTAL}</span></td>
            </tr>
            <tr>
                <td class="text-right">{$MOD.LBL_TOTAL}</td>
                <td class="text-right"><span id="quotes_total_all">{$TOTAL}</span></td>
            </tr>
        </table>
        <div class="clear" style="height: 10px;"></div>
    </div>
</div>