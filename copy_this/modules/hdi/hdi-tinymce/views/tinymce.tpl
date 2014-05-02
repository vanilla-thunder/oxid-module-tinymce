<!-- TinyMCE -->
<script type="text/javascript">
    var tinyMCE = null;
    function copyLongDescFromTinyMCE(sIdent)
    {
        var editor = tinyMCE.activeEditor;
        if (editor && editor.isHidden() !== true)
        {
            var content = editor.getContent({format : 'raw'});
            if (content !== null)
            {
                var aSmartyParts = content.split("["+"{");

                if(aSmartyParts.length > 1)
                {
                        for (var i = 0; i < aSmartyParts.length; i++)
                {
                    aSubParts = aSmartyParts[i].split("}]");
                    if (aSubParts.length > 1)
                        aSubParts[0] = aSubParts[0].replace(/&gt;/gi, ">").replace(/&lt;/gi, "<").replace(/&amp;/gi, "&").replace(/&quot;/gi, '"');
                    aSmartyParts[i] = aSubParts.join("}" + "]");
                }
                content = aSmartyParts.join("[" + "{");
                }
                document.getElementsByName('editval[' + sIdent + ']').item(0).value = content;
                return true;
            }
        }
        return false;
    }

    var origCopyLongDesc = copyLongDesc;
    copyLongDesc = function(sIdent) {
        if ( copyLongDescFromTinyMCE( sIdent ) ) return;
        origCopyLongDesc( sIdent );
    }

</script>
<script type="text/javascript" src="[{$oViewConf->getModuleUrl('hdi-tinymce','tinymce/tinymce.min.js') }]"></script>
<script type="text/javascript">
    tinyMCE.init({
        language: "[{$sEditorLang}]",
        selector: "textarea#editor_[{$sField}]",
        height: [{ $cfg->getConfigParam("sTinyMCE_height")}],
        document_base_url: "[{$oViewConf->getBaseDir()}]",
        relative_urls: [{if $cfg->getConfigParam("bTinyMCE_relative_urls") == 1}]true[{else}]false[{/if}],

        //some weird stuff
        //entity_encoding : "raw",
        plugin_preview_width: window.innerWidth,
        plugin_preview_height: window.innerHeight-90,
        code_dialog_width: window.innerWidth-50,
        code_dialog_height: window.innerHeight-130,
        moxiemanager_fullscreen: true,

        [{if $oViewConf->getTinyExtConfig()}]
            [{foreach from=$oViewConf->getTinyExtConfig() item="param"}][{oxeval var=$param }],[{/foreach}]
        [{/if}]
        [{if $cfg->getConfigParam("bTinyMCE_browser_spellcheck")}]browser_spellcheck : true,[{/if}]

        plugins: ["[{foreach from=$oViewConf->getTinyPlugins() item="plugin" }][{$plugin}] [{/foreach}]"],
    
        external_plugins: {[{strip}]
            [{foreach from=$oViewConf->getTinyExtPlugins() key="plugin" item="file" }]
                "[{$plugin}]": "[{oxeval var=$file}]",
            [{/foreach}]
            [{/strip}] },

        toolbar1: "undo redo searchreplace preview print fullscreen code paste | image media emoticons table inserttable bullist numlist outdent indent | ltr rtl | blockquote subscript superscript [{if $cfg->getConfigParam("bTinyMCE_charmap")}]charmap[{/if}] hr nonbreaking anchor link unlink [{$oViewConf->getTinyExtControls()}]",
        toolbar2: "bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect formatselect | removeformat | spellchecker visualchars | insertdatetime",
        image_advtab: true,
        menubar: false,
        insertdatetime_formats: ["%d.%m.%Y", "%H:%M"],
        nonbreaking_force_tab: true,
        [{if $cfg->getConfigParam("bTinyMCE_smallui")}]toolbar_items_size: "small"[{/if}]
    });
</script>
<textarea id="editor_[{$sField}]" name="content" style="width:[{$iWidth}]; height:[{$iHeight}];">[{$sContent}]</textarea>
[{assign var=tinyMCE value=1 }]
<!-- /TinyMCE -->
