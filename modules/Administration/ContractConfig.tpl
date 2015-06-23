<div class="moduleTitle">
    <h2> Contracts Config </h2>

    <div class="clear"></div>
</div>

<form action="index.php" method="post">
    <input type="hidden" name="module" value="Administration"/>
    <input type="hidden" name="action" value="ContractConfig"/>

    <table width="100%" cellpadding="0" cellspacing="1" border="0" class="actionsContainer">
        <tbody>
        <tr>

            <td>
                <input title="Save" accesskey="a" class="button primary" id="ConfigureSettings_save_button"
                       type="submit" name="saveConfig" value="  Save  ">
            </td>
        </tr>
        </tbody>
    </table>

    <table class="edit view" width="100%" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>
            <th align="left" scope="row" colspan="4"><h4>Contract Config</h4></th>
        </tr>
        <tr>
            <td scope="row" width="30%">Disable contract line items: </td>
            <td>
                {if !$CONF.disable_contract_line_items}
                    <input type="checkbox" id="ConfigureSettings_disable_contract_line_items" name="disable_contract_line_items" value="1">
                {else}
                    <input type="checkbox" id="ConfigureSettings_disable_contract_line_items" name="disable_contract_line_items" value="1" checked>
                {/if}
            </td>
        </tr>
        </tbody>
    </table>
</form>