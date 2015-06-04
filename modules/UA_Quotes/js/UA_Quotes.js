jQuery(function($){
    $(document.getElementById('quotes-add-group-line-items')).click(function(){
        $('#quotes-add-group-loading').css({display:"inline-block"});
        $('#quotes-add-group-button').css({display:"none"});
        var group_row = parseInt($('#group-row').val());
        $.get('index.php?module=UA_Quotes&action=AddLineItems&is_group=1&group_row=' + group_row, function(data){
            $('#quotes-line-items').append(data);
            $('#group-row').val((group_row + 1));
            $('#quotes-add-group-loading').css({display:"none"});
            $('#quotes-add-group-button').css({display:"inline-block"});
            add_product(group_row);
        });
    });
});

function add_product(group_row) {
    $('#quotes-add-product-' + group_row).click(function(){
        $('#quotes-add-product-loading-' + group_row).css({display:"inline-block"});
        $('#quotes-add-product-button-' + group_row).css({display:"none"});
        $this = $(this);
        group_row = parseInt(group_row);
        var product_row = $('#product-row-' + group_row).val();
        $.get('index.php?module=UA_Quotes&action=AddLineItems&is_product=1&product_row=' + product_row + '&group_row=' + group_row, function(data){
            $('#quotes-group-content-line-items-' + group_row).append(data);
            product_row = parseInt(product_row);
            $('#product-row-' + group_row).val((product_row + 1));
            $('#quotes-add-product-loading-' + group_row).css({display:"none"});
            $('#quotes-add-product-button-' + group_row).css({display:"inline-block"});

            add_product_line(group_row, product_row);
        });
    });

    $('#quotes-add-service-' + group_row).click(function(){
        $('#quotes-add-product-loading-' + group_row).css({display:"inline-block"});
        $('#quotes-add-product-button-' + group_row).css({display:"none"});
        $this = $(this);
        group_row = parseInt(group_row);
        var product_row = $('#product-row-' + group_row).val();
        $.get('index.php?module=UA_Quotes&action=AddLineItems&is_service=1&product_row=' + product_row + '&group_row=' + group_row, function(data){
            $('#quotes-group-content-line-items-' + group_row).append(data);
            product_row = parseInt(product_row);
            $('#product-row-' + group_row).val((product_row + 1));
            $('#quotes-add-product-loading-' + group_row).css({display:"none"});
            $('#quotes-add-product-button-' + group_row).css({display:"inline-block"});

            add_product_line(group_row, product_row);
        });
    });
}

function add_product_line(group_row, product_row) {
    $('#quotes-line-product-' + group_row + '-' + product_row +' input[type=text]').blur(function(){
        var list_price = $(document.getElementById('list_price_' + group_row + '_' + group_row)).val();
        list_price = unformatNumber(list_price, num_grp_sep, dec_sep);
        add_value_item('list_price_' + group_row + '_' + group_row, formatNumber(toDecimal(list_price, precision), num_grp_sep, dec_sep));

        var qty = $(document.getElementById('qty_' + group_row + '_' + group_row)).val();
        qty = parseInt(unformatNumber(qty, num_grp_sep, dec_sep));
        add_value_item('qty_' + group_row + '_' + group_row, formatNumber(toDecimal(qty, precision), num_grp_sep, dec_sep));

        calculator_quotes_item_amount(group_row, product_row);
    });
    $('#quotes-line-product-' + group_row + '-' + product_row +' select').change(function(){
        var list_price = $(document.getElementById('list_price_' + group_row + '_' + group_row)).val();
        list_price = unformatNumber(list_price, num_grp_sep, dec_sep);
        add_value_item('list_price_' + group_row + '_' + group_row, formatNumber(toDecimal(list_price, precision), num_grp_sep, dec_sep));

        var qty = $(document.getElementById('qty_' + group_row + '_' + group_row)).val();
        qty = parseInt(unformatNumber(qty, num_grp_sep, dec_sep));
        add_value_item('qty_' + group_row + '_' + group_row, formatNumber(toDecimal(qty, precision), num_grp_sep, dec_sep));

        calculator_quotes_item_amount(group_row, product_row);
    });
}

function remove_line_item(group_row, product_row, is_group) {
    if (is_group == 1) {
        $('#quotes-group-content-' + product_row).remove();
    } else {
        $('#quotes-line-product-'+ group_row + '-' + product_row).remove();
    }
    calculator_quotes_amount(group_row, 0);
}

var count = 0;
function open_popup_ua_product(value, group_count, count) {
    var popup_request_data = {
        "call_back_function": "set_ua_product_return",
        "form_name": "EditView",
        "field_to_name_array": {
            "id": "id",
            "name": "name",
            "cost": "cost",
            "list_price": "list_price",
            "qty_in_stock": "qty_in_stock",
            "unit_price": "unit_price"}, "passthru_data": {"group_row": group_count, "row_id": count}};
    open_popup('UA_Products', 600, 400, '&name=' + value, true, false, popup_request_data);
}

function set_ua_product_return(popup_reply_data) {
    var name_to_value_array = popup_reply_data.name_to_value_array;
    var row_id = popup_reply_data.passthru_data.row_id;
    var group_count = popup_reply_data.passthru_data.group_row;

    add_value_item('product_id_' + group_count + '_' + row_id, name_to_value_array['id']);

    var name = name_to_value_array['name'].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
    add_value_item('product_name_' + group_count + '_' + row_id, name);

    add_value_item('unit_price_' + group_count + '_' + row_id, formatNumber(toDecimal(name_to_value_array['unit_price'], precision), num_grp_sep, dec_sep));
    add_value_item('list_price_' + group_count + '_' + row_id, formatNumber(toDecimal(name_to_value_array['unit_price'], precision), num_grp_sep, dec_sep));
    add_value_item('qty_in_stock_' + group_count + '_' + row_id, name_to_value_array['qty_in_stock']);
    calculator_quotes_item_amount(group_count, row_id);
}

function add_value_item(id, value) {
    $(document.getElementById(id)).val(value);
}

function calculator_quotes_item_amount(group_count, row_id) {
    var unit_price = $(document.getElementById('unit_price_' + group_count + '_' + row_id)).val();
    unit_price = parseFloat(unformatNumber(unit_price, num_grp_sep, dec_sep));

    var list_price = $(document.getElementById('list_price_' + group_count + '_' + row_id)).val();
    list_price = parseFloat(unformatNumber(list_price, num_grp_sep, dec_sep));

    var price = (list_price > 0.00) ? list_price : unit_price;

    var qty = $(document.getElementById('qty_' + group_count + '_' + row_id)).val();
    qty = parseInt(unformatNumber(qty, num_grp_sep, dec_sep));

    var discount = $(document.getElementById('discount_' + group_count + '_' + row_id)).val();
    discount = parseFloat(unformatNumber(discount, num_grp_sep, dec_sep));

    var tax = parseInt($(document.getElementById('tax_' + group_count + '_' + row_id)).val());
    var net_total = price * qty * (100 - discount) / 100;
    var total = net_total * (100 + tax) / 100;
    $(document.getElementById('net_total_' + group_count + '_' + row_id)).val(formatNumber(toDecimal(net_total, precision), num_grp_sep, dec_sep));
    $(document.getElementById('total_' + group_count + '_' + row_id)).val(formatNumber(toDecimal(total, precision), num_grp_sep, dec_sep));
    calculator_quotes_amount(group_count, 0);
}

function calculator_quotes_amount(group_id, not_update_total) {
    var group_net_total = 0;
    var group_total = 0;
    $(document.getElementsByClassName('net_total_line_' + group_id)).each(function(index, value){
        var t = unformatNumber($(value).val(), num_grp_sep, dec_sep);
        group_net_total += parseFloat(t);
    });
    $(document.getElementsByClassName('total_line_' + group_id)).each(function(index, value){
        var t = unformatNumber($(value).val(), num_grp_sep, dec_sep);
        group_total += parseFloat(t);
    });
    $(document.getElementsByClassName('net_total_group_' + group_id)).val(formatNumber(toDecimal(group_net_total, precision), num_grp_sep, dec_sep));
    $(document.getElementsByClassName('total_group_' + group_id)).val(formatNumber(toDecimal(group_total, precision), num_grp_sep, dec_sep));

    if (not_update_total != 1) {
        var net_total = 0;
        var total = 0
        $(document.getElementsByClassName('net_total_group_all')).each(function(index, value){
            var t = unformatNumber($(value).val(), num_grp_sep, dec_sep);
            net_total += parseFloat(t);
        });
        $(document.getElementsByClassName('total_group_all')).each(function(index, value){
            var t = unformatNumber($(value).val(), num_grp_sep, dec_sep);
            total += parseFloat(t);
        });
        $(document.getElementById('quotes_net_total_all')).html(formatNumber(toDecimal(net_total, precision), num_grp_sep, dec_sep));
        $(document.getElementById('quotes_total_all')).html(formatNumber(toDecimal(total, precision), num_grp_sep, dec_sep));
    }
}