{*
YouAddOn Team
www.youaddon.com
*}

{if strlen({{sugarvar key='value' string=true}}) <= 0}
    {assign var="value" value={{sugarvar key='default_value' string=true}}}
{else}
    {assign var="value" value={{sugarvar key='value' string=true}}}
{/if}

{assign var="max" value={{sugarvar key='max' string=true}}}

<div class="ua-photo-content">
    <a href="{{$PHOTO_URL}}{{sugarvar key='value'}}" class="ua-photo-popup">
        <img src="{{$PHOTO_URL}}thumbnail/{{sugarvar key='value'}}" height="50px" />
    </a>
    {literal}
        <script type="text/javascript">
            $('.ua-photo-popup').click(function(e){
                e.preventDefault();
                if($('#ua-photo-popup-dialog').length<=0){
                    $('#content').append('<div id="ua-photo-popup-dialog" style="text-align: center"></div>');
                }
                $('#ua-photo-popup-dialog').html('<img src="'+ $(this).attr('href') +'" style="max-width:700px;max-height:600px;" />');
                $('#ua-photo-popup-dialog').dialog({width:700, height:600});
            });
        </script>
    {/literal}
</div>

{{if !empty($displayParams.enableConnectors)}}
    {if !empty($value)}
        {{sugarvar_connector view='DetailView'}}
    {/if}
{{/if}}