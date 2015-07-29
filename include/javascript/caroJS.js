function caro_export_template(module, record) {
    if ($('#caro_export_template_content').length <= 0) {
        $('body').append('<div id="caro_export_template_content" title="'+ SUGAR.language.get('app_strings', 'LBL_CARO_EXPORT_CHOOSE_TEMPLATES') +'"></div>');
    }

    $.get('index.php?module=Caro_ExportTemplates&action=ListTemplates&apply_module=' + module + '&record=' + record, function(html) {
        $('#caro_export_template_content').html(html);
        $('#caro_export_template_content').dialog({
            width: 600,
            modal: true
        });
    });
}