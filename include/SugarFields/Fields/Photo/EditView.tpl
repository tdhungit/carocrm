{*
YouAddOn Team
www.youaddon.com
*}

{literal}
<style type="text/css">
    .ua-photo-content .ua-file-span {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.428571429;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
        color: #fff;
        background-color: #47a447;
        border-color: #398439;
        position: relative;
        overflow: hidden;
    }
    .ua-photo-content .ua-file-span .ua-file {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px;
        direction: ltr;
        cursor: pointer;
        display: block;
    }

    .ua-photo-content .ua-file-photo {
        display: inline-block;
        vertical-align: middle;
    }
</style>
{/literal}

{if strlen({{sugarvar key='value' string=true}}) <= 0}
    {assign var="value" value={{sugarvar key='default_value' string=true}}}
{else}
    {assign var="value" value={{sugarvar key='value' string=true}}}
{/if}

{assign var="max" value={{sugarvar key='max' string=true}}}

<div class="ua-photo-content">
    <span class="ua-file-span">
        <span>Select files...</span>
        <input id="fileupload-{{sugarvar key='name'}}" type="file" name="files[]" class="ua-file" />
    </span>
    <span id="photofileupload-{{sugarvar key='name'}}" class="ua-file-photo">
        {if $value}
            <a href="{{$PHOTO_URL}}{{sugarvar key='value'}}" target="_blank">
                <img src="{{$PHOTO_URL}}thumbnail/{{sugarvar key='value'}}" height="50px" />
            </a>
        {/if}
    </span>
    <span id="textfileupload-{{sugarvar key='name'}}"></span>
    <input type="hidden" class="ua-photo-hidden" name="{{sugarvar key='name'}}" id="{{sugarvar key='name'}}" value="{{sugarvar key='value'}}" />
</div>

<script type="text/javascript" src="include/javascript/fileupload/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript" src="include/javascript/fileupload/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="include/javascript/fileupload/jquery.fileupload.js"></script>

<script type="text/javascript">
    var url = '{{$SITE_URL}}/index.php';
    var photo_url = '{{$PHOTO_URL}}';
    $('#fileupload-'+'{{sugarvar key='name'}}').fileupload({ldelim}
        url: url,
        dataType: 'json',
        formData: {ldelim}module:'Home',action:'UAPhotoUpload',to_pdf:'true'{rdelim},
        done: function (e, data) {ldelim}
            $.each(data.result.files, function (index, file) {ldelim}
                $('#'+'{{sugarvar key='name'}}').val(file.name);
                $('#photofileupload-'+'{{sugarvar key='name'}}').html('<a href="'+photo_url+file.name+'" target="_blank"><img src="'+photo_url+'thumbnail/'+file.name+'" height="50px" /></a>');
            {rdelim});
        {rdelim},
        progressall: function (e, data) {ldelim}
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#textfileupload-'+'{{sugarvar key='name'}}').text(progress + '%');
        }
    {rdelim});
</script>