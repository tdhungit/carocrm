<form name="EditView" id="EditView" method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="module" value="Caro_ExportTemplates">
    <input type="hidden" name="record" value="{$ID}">
    <input type="hidden" name="action">
    <input type="hidden" name="form">
    <input type="hidden" name="return_module" value="{$RETURN_MODULE}">
    <input type="hidden" name="return_id" value="{$RETURN_ID}">
    <input type="hidden" name="return_action" value="{$RETURN_ACTION}">
    <input type="hidden" name="inpopupwindow" value="{$INPOPUPWINDOW}">
    <input type="hidden" name="old_id" value="{$OLD_ID}">
    <input type="hidden" name="type" value="campaign">

    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
                <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accesskey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary"
                       onclick="this.form.action.value='Save';
								addUploadFiles('EditView');
								addUploadDocs('EditView');
								return check_form('EditView');"
                       type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE">
                <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accesskey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="{$CANCEL_SCRIPT}" type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL">
            </td>
            <td align="right" nowrap>
				<span class="required">
					{$APP.LBL_REQUIRED_SYMBOL}
				</span>
                {$APP.NTC_REQUIRED}
            </td>
            <td align='right'>
                {$ADMIN_EDIT}
            </td>
        </tr>
    </table>

    <div class="edit view">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="30%" scope="row">
                    {$MOD.LBL_NAME}
                    <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                </td>
                <td width="70%">
                    <input id='name' name='name' tabindex="0" type="text" size='30' maxlength="255" value="{$NAME}">
                </td>
            </tr>
            <tr>
                <td width="30%" scope="row">
                    {$MOD.LBL_FILE_TEMPLATE}
                    <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                </td>
                <td width="70%">
                    <span class="caro-file-upload-span">
                        <span>Select files...</span>
                        <input id="file_template_upload" type="file" name="files[]" class="caro-file-upload" />
                    </span>
                    <input id='file_template' name='file_template' tabindex="0" type="text" size='30' maxlength="255" value="{$FILE_TEMPLATE}" readonly>
                </td>
            </tr>
            <tr>
                <td width="30%" scope="row">
                    {$MOD.LBL_APPLY_MODULE}
                    <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                </td>
                <td width="70%">
                    <select id='apply_module' name='apply_module'>
                        {html_options options=$LIST_MODULES selected=$APPLY_MODULE}
                    </select>
                </td>
            </tr>
            <tr>
                <td width="15%" scope="row">
                    {$MOD.LBL_DESCRIPTION}
                </td>
                <td colspan="3" >
                    <textarea name='description' tabindex='0' cols="90" rows="10" style="height: 1.6.em; overflow-y:auto; font-family:sans-serif,monospace; font-size:inherit;" id="description">{$DESCRIPTION}</textarea>
                </td>
            </tr>
        </table>
    </div>
</form>

<script type="text/javascript" src="include/javascript/fileupload/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript" src="include/javascript/fileupload/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="include/javascript/fileupload/jquery.fileupload.js"></script>

<script type="text/javascript">
    var url = '{$SITE_URL}/index.php';
    var file_url = '{$FILE_URL}';
    $('#file_template_upload').fileupload({ldelim}
        url: url,
        dataType: 'json',
        formData: {ldelim}module:'Caro_ExportTemplates',action:'UploadTemplate',to_pdf:'true'{rdelim},
        done: function (e, data) {ldelim}
            $.each(data.result.files, function (index, file) {ldelim}
                    $('#file_template').val(file.name);
                {rdelim});
            {rdelim},
        progressall: function (e, data) {ldelim}
            //var progress = parseInt(data.loaded / data.total * 100, 10);
            //$('#textfileupload-'+'file_template').text(progress + '%');
        }
        {rdelim});
</script>