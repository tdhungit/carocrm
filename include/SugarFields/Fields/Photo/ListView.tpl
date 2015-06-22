{*
YouAddOn Team
www.youaddon.com
*}

{sugar_fetch object=$parentFieldArray key=$col assign='value'}
{sugar_fetch object=$parentFieldArray key="ID" assign='recordid'}

<div class="ua-photo-content">
    {if $value}
        <a href="{$PHOTO_URL}{$value}" class="ua-photo-popup">
            <img src="{$PHOTO_URL}thumbnail/{$value}" height="50px" />
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
    {/if}
</div>